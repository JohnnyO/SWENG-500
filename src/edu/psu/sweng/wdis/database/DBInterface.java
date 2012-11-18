package edu.psu.sweng.wdis.database;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.LinkedList;
import java.util.List;

import com.mysql.jdbc.jdbc2.optional.MysqlDataSource;

public class DBInterface {

    private final MysqlDataSource datasource;
    private final Connection conn;

    public DBInterface() throws SQLException {
        datasource = new MysqlDataSource();
        datasource.setUser("root");
        datasource.setPassword("root");
        datasource.setServerName("localhost");
        datasource.setDatabaseName("wdis");
        conn = datasource.getConnection();

    }

    
    private static final String GET_ALL_ANALYSTS = "select ida, name,station from analyst";
    
    
    public List<Analyst> getKnownAnalysts() throws SQLException {
        List<Analyst> result = new LinkedList<Analyst>();
        PreparedStatement ps = conn.prepareStatement(GET_ALL_ANALYSTS);
        ResultSet rs = ps.executeQuery();
        while (rs.next()) {
            int ida = rs.getInt("ida");
            String name = rs.getString("name");
            String station = rs.getString("station");
            result.add(new Analyst(ida, name, station));
        }
        return result;
    }

    private static final String GET_ACTUAL_RESULT = 
            "SELECT player.name, player.team, actualResult.rank, actualResult.score "
            + "FROM actualResult, player " 
            + "WHERE actualResult.week=? and actualResult.position=? "
            + "AND actualResult.idp = player.idp " + "ORDER BY rank ASC";

    public ActualResult getActualResults(int week, Position position) throws SQLException {
        PreparedStatement ps = conn.prepareStatement(GET_ACTUAL_RESULT);
        ps.setInt(1, week);
        ps.setString(2, position.name());
        ResultSet rs = ps.executeQuery();
        List<Player> players = new ArrayList<Player>();
        List<Double> scores = new ArrayList<Double>();
        while (rs.next()) {
            String name = rs.getString("name");
            String team = rs.getString("team");
            int rank = rs.getInt("rank");
            players.add(new Player(name, position, team));
            scores.add(rs.getDouble("score"));
        }
        return new ActualResult(week, position, players, scores);
    }

    public Analyst getAnalyst(int analystID) {
        return new Analyst(analystID);
    }

    private static final String GET_PREDICTION = 
            "SELECT player.name, player.team, prediction.rankOrder "
            + "FROM prediction, player " 
            + "WHERE prediction.week=? " 
            + "AND prediction.position=? "
            + "AND prediction.ida = ? " 
            + "AND prediction.idp = player.idp " 
            + "ORDER BY rankOrder ASC";

    public Prediction getPrediction(Analyst analyst, int week, Position position, int limit) throws SQLException {
        PreparedStatement ps = conn.prepareStatement(GET_PREDICTION);
        ps.setInt(1, week);
        ps.setString(2, position.name());
        ps.setInt(3, analyst.getID());
        ResultSet rs = ps.executeQuery();
        List<Player> players = new ArrayList<Player>();
        while (rs.next()) {
            String name = rs.getString("name");
            String team = rs.getString("team");
            int rank = rs.getInt("rankOrder");
            players.add(new Player(name, position, team));
        }
        return new Prediction(week, position, players.subList(0, limit));
    }

    
    private static final String SAVE_PREDICTION = 
            "INSERT IGNORE INTO predictionAccuracy "
            + "(ida, week, position, accuracy, accuracyType) "
            + "VALUES (?,?,?,?,?)";
    
    public void savePrediction(Analyst analyst, int week, Position position, 
            float score, String type) throws SQLException {
        PreparedStatement ps = conn.prepareStatement(SAVE_PREDICTION);
        ps.setInt(1, analyst.getID());
        ps.setInt(2, week);
        ps.setString(3, position.name());
        ps.setDouble(4, score);
        ps.setString(5, type);
        ps.executeUpdate();
        return;
        
    }

}

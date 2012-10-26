package edu.psu.sweng.wdis.database;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
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

    public List<Analyst> getKnownAnalysts() {
        return null;
    }

    private static final String GET_ACTUAL_RESULT = "SELECT player.name, player.team, actualResult.rank "
            + "FROM actualResult, player " + "WHERE actualResult.week=? and actualResult.position=? "
            + "AND actualResult.idp = player.idp " + "ORDER BY rank ASC";

    public ActualResult getActualResults(int week, Position position) throws SQLException {
        PreparedStatement ps = conn.prepareStatement(GET_ACTUAL_RESULT);
        ps.setInt(1, week);
        ps.setString(2, position.name());
        ResultSet rs = ps.executeQuery();
        List<Player> players = new ArrayList<Player>();
        while (rs.next()) {
            String name = rs.getString("name");
            String team = rs.getString("team");
            int rank = rs.getInt("rank");
            players.add(new Player(name, position, team));
        }
        return new ActualResult(week, position, players);
    }

    public Analyst getAnalyst(int analystID) {
        return new Analyst(analystID);
    }

    private static final String GET_PREDICTION = "SELECT player.name, player.team, prediction.rankOrder "
            + "FROM prediction, player " + "WHERE prediction.week=? " + "AND prediction.position=? "
            + "AND prediction.ida = ? " + "AND prediction.idp = player.idp " + "ORDER BY rankOrder ASC";

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

}

package edu.psu.sweng.wdis.database;

import java.util.List;

public class Prediction {
    
    private int week;
    private Position position;
    private List<Player> players;

    
    public Prediction(int week, Position position, List<Player> players) {
        this.week = week;
        this.position = position;
        this.players = players;
    }
    
    
    public Player get(int rank) {
        return players.get(rank);
    }
    
    public List<Player> getAll() {
        return players;
    }
    
   

}

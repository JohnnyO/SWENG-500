package edu.psu.sweng.wdis.database;

public class Player {

    private String name;
    private Position position;
    private String team;

    
    public Player(String name) {
        this(name, Position.QB);
    }
    
    public Player(String name, Position position) {
        this(name, position, "Unknown");
    }
    
    public Player(String name, Position position, String team) {
        this.name = name;
        this.position = position;
        this.team = team;
    }


}

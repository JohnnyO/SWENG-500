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

    @Override
    public int hashCode() {
        final int prime = 31;
        int result = 1;
        result = prime * result + ((name == null) ? 0 : name.hashCode());
        result = prime * result + ((position == null) ? 0 : position.hashCode());
        result = prime * result + ((team == null) ? 0 : team.hashCode());
        return result;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj)
            return true;
        if (obj == null)
            return false;
        if (getClass() != obj.getClass())
            return false;
        Player other = (Player) obj;
        if (name == null) {
            if (other.name != null)
                return false;
        } else if (!name.equals(other.name))
            return false;
        if (position != other.position)
            return false;
        if (team == null) {
            if (other.team != null)
                return false;
        } else if (!team.equals(other.team))
            return false;
        return true;
    }
    
    
    

}

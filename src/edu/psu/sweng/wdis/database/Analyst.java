package edu.psu.sweng.wdis.database;

import java.util.List;

/**
 * Data transfer object, mapping
 * 
 * @author John
 * 
 */
public class Analyst {

    private int id;
    private String name;
    private String station;

    public Analyst(int id) {
        this(id, "Unknown", "Unknown");
    }

    public Analyst(int id, String name, String station) {
        this.id = id;
        this.name = name;
        this.station = station;
    }

    public int getID() {
        return id;
    }

}

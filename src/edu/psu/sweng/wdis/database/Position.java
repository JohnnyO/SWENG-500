package edu.psu.sweng.wdis.database;

public enum Position {
    
    QB("Quarterback"),
    RB("Running Back"),
    WR("Wide Receiver"),
    TE("Tight End"),
    DST("Defense/Special Teams"),
    K("Kicker");
    
   private String name;
    
    private Position(String name) {
        this.name = name;
    }
    
    
    public String getName() {
        return name;
    }
    

}

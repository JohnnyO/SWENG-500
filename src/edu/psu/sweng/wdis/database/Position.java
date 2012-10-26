package edu.psu.sweng.wdis.database;

public enum Position {
    
    QB("Quarterback"),
    RB("Running Back"),
    WR("Wide Receiver"),
    TE("Tight End"),
    DST("Defense/Special Teams"),
    K("Kicker");
    
   private String description;
    
    private Position(String description) {
        this.description = description;
    }
    
    
    public String getDescription() {
        return description;
    }
    

}

package edu.psu.sweng.wdis.database;

import java.util.List;

/**
 * Data transfer object, mapping 
 * @author John
 *
 */
public class Analyst {
    
    List<Prediction> predictions;
    
    
    public Prediction getPrediction(int week, Position position) {
        return null;
    }
    
    public boolean hasPrediction(int week, Position position) {
        return false;
    }

}

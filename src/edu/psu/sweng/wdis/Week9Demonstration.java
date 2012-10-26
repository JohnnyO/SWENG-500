package edu.psu.sweng.wdis;

import edu.psu.sweng.wdis.analytics.PartialOrderScorer;
import edu.psu.sweng.wdis.database.ActualResult;
import edu.psu.sweng.wdis.database.Analyst;
import edu.psu.sweng.wdis.database.DBInterface;
import edu.psu.sweng.wdis.database.Position;
import edu.psu.sweng.wdis.database.Prediction;




public class Week9Demonstration {
    
    public static void main(String [] args) throws Exception {
        
        DBInterface db = new DBInterface();
        
        Position [] positions = {Position.QB, Position.RB, Position.WR, Position.TE};
        int [] analysts = {1,3,4,5};
        for (int ida : analysts) {
            Analyst analyst = db.getAnalyst(ida);
        for(int week=1; week < 7; week++) {
            for (Position p : positions) {
                   Prediction prediction = db.getPrediction(analyst, week, p, 20);
                   ActualResult result = db.getActualResults(week, p);
                   PartialOrderScorer scorer = new PartialOrderScorer();
                   float score = scorer.evaluate(prediction, result);
                   
                   System.out.format("%d\t%s\t%s\t%.4f\n", ida, week, p.name(), score);
                   
                   
                   
               }
            }
        }
    }
    
    
  
    
    
    
    

    
    
    
}

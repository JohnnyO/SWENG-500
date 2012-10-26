package edu.psu.sweng.wdis.database;

import static org.junit.Assert.*;

import org.junit.Test;

import edu.psu.sweng.wdis.analytics.PartialOrderScorer;
import edu.psu.sweng.wdis.analytics.Scorer;
import edu.psu.sweng.wdis.analytics.SpearmanRankScorer;

public class IntegrationTest {
    
    @Test
    public void testEndToEndScoring() throws Exception {
        DBInterface database = new DBInterface();
        Analyst analyst = database.getAnalyst(1);  //Yahoo is ID #1
        Prediction prediction = database.getPrediction(analyst, 2, Position.QB, 20);
        ActualResult result = database.getActualResults(2, Position.QB);
        Scorer scorer = new PartialOrderScorer();
        float score = scorer.evaluate(prediction, result);
        assertEquals(0.0d, score, 1e-4);
    }
    
    
    @Test
    public void testActualResultRetrieval() throws Exception {
        DBInterface database = new DBInterface();
        ActualResult result = database.getActualResults(2, Position.QB);
        Player bestPlayer = result.get(0);
        Player vick = result.get(5);
        assertEquals("Robert Griffin III", bestPlayer.getName()); 
        assertEquals("Michael Vick", vick.getName());
    }
    
    @Test
    public void testPredictionRetrieval() throws Exception {
        DBInterface database = new DBInterface();
        Analyst yahoo = database.getAnalyst(1);
        Prediction prediction = database.getPrediction(yahoo, 2, Position.QB, 20);
        
        Player bestPlayer = prediction.get(0);
        Player sixthPlayer = prediction.get(5);
        assertEquals(20, prediction.size());
        assertEquals("Drew Brees", bestPlayer.getName()); 
        assertEquals("Peyton Manning", sixthPlayer.getName());
    }

}

package edu.psu.sweng.wdis.analytics;

import static org.junit.Assert.assertEquals;

import java.util.List;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

import edu.psu.sweng.wdis.database.ActualResult;
import edu.psu.sweng.wdis.database.Player;
import edu.psu.sweng.wdis.database.Position;
import edu.psu.sweng.wdis.database.Prediction;
import edu.psu.sweng.wdis.database.Ranking;

/**
 * This is an implementation of the current test plan for the statistics processing engine for the PartialOrderScorer
 * 
 * @author JohnnyO
 * 
 */
public class PartialOrderScorerTest extends ScorerTest {

    @Before
    public void setUp() {
        scorer = new PartialOrderScorer();
    }

    @After
    public void tearDown() {
        scorer = null;
    }

    @Test
    /**
     * Implementation of test case 2.1
     */
    public void testPerfectPrediction() {
        assertEquals(1.0, super.calculatePerfectPrediction(), 1e-6);
    }

    /**
     * Implementation of test case 2-2. Here, we test a prediction which predicts none of the actual results. This
     * should produce an output of -1
     */
    @Test
    public void testBadPrediction() {

        Prediction prediction = generatePrediction(1, Position.QB, "A", "B", "C", "D", "E");
        ActualResult result = generateActualResult(1, Position.QB, "F", "G", "H", "I", "J");

        float score = scorer.evaluate(prediction, result);
        assertEquals(-1.0, score, 1e-6);
    }

    /**
     * Implementation of test case 2.3
     */
    @Test
    public void testClosePrediction() {

        Prediction prediction = generatePrediction(1, Position.QB, "A", "B", "C", "D", "E");
        ActualResult result = generateActualResult(1, Position.QB, "A", "B", "C", "F", "E");

        float score = scorer.evaluate(prediction, result);
        assertEquals(0.80, score, 1e-6);
    }

    /**
     * Implementation of test case 2.4
     */
    @Test
    public void testReorderedPrediction() {

        Prediction prediction = generatePrediction(1, Position.QB, "A", "B", "C", "D", "E");
        ActualResult result = generateActualResult(1, Position.QB, "A", "C", "B", "D", "E");

        float score = scorer.evaluate(prediction, result);
        assertEquals(0.80, score, 1e-6);
    }

    /**
     * Implementation of test case 2.5
     */
    @Test
    public void testReversePrediction() {
        assertEquals(-1, super.calculateReversePrediction(), 1e-6);
        
    }
    
    
    @Test
    public void testMisguidedPrediction() {
        Prediction prediction = generatePrediction(1, Position.QB, "A", "B");
        ActualResult result = generateActualResult(1, Position.QB, "D", "E", "A", "C", "B");

        float score = scorer.evaluate(prediction, result);
        assertEquals(1.0, score, 1e-6);
    }
    
    @Test
    public void testReverseMisguidedPrediction() {
        Prediction prediction = generatePrediction(1, Position.QB, "A", "B");
        ActualResult result = generateActualResult(1, Position.QB, "D", "E", "B", "C", "A");

        float score = scorer.evaluate(prediction, result);
        assertEquals(-1.0, score, 1e-6);
    }


}

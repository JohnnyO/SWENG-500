package edu.psu.sweng.wdis.analytics;

import static org.junit.Assert.*;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

import edu.psu.sweng.wdis.database.ActualResult;
import edu.psu.sweng.wdis.database.Position;
import edu.psu.sweng.wdis.database.Prediction;
import edu.psu.sweng.wdis.database.Ranking;

public class SpearmanRankScorerTest extends ScorerTest {

    @Before
    public void setUp() {
        scorer = new SpearmanRankScorer();
    }

    @After
    public void tearDown() {
        scorer = null;
    }

    @Test
    /**
     * Test case 2.6
     */
    public void testPerfectPrediction() {
        assertEquals(1.0, super.calculatePerfectPrediction(), 1e-6);
    }

    @Test
    /**
     * Test case 2.7
     */
    public void testReversePrediction() {
        assertEquals(-1.0, super.calculateReversePrediction(), 1e-6);
    }

    /**
     * Implementation of test case 2.8
     */
    @Test
    public void testReorderedPrediction() {

        Prediction prediction = generatePrediction(1, Position.QB, "A", "B", "C", "D", "E");
        ActualResult result = generateActualResult(1, Position.QB, "A", "C", "B", "D", "E");

        float score = scorer.evaluate(prediction, result);
        assertEquals(0.90, score, 1e-6);
    }

    /**
     * Implementation of test case 2.9
     */
    @Test
    public void testTopBottomSwapPrediction() {

        Prediction prediction = generatePrediction(1, Position.QB, "A", "B", "C", "D", "E");
        ActualResult result = generateActualResult(1, Position.QB, "E", "B", "C", "D", "A");

        float score = scorer.evaluate(prediction, result);
        assertEquals(-0.60, score, 1e-6);
    }

    @Test
    /**
     * Test case 2.10
     */
    public void testMinorSwapChaining() {
        Prediction prediction = generatePrediction(1, Position.QB, "A", "B", "C", "D", "E", "F");
        ActualResult result = generateActualResult(1, Position.QB, "B", "A", "D", "C", "F", "E");

        float score = scorer.evaluate(prediction, result);
        assertEquals(0.82857, score, 1e-3);

    }

    /**
     * Test case 2.11
     */
    @Test(expected = IllegalArgumentException.class)
    public void testBadData() {
        Prediction prediction = generatePrediction(1, Position.QB, "A", "B", "C");
        ActualResult result = generateActualResult(1, Position.QB, "D", "E", "F");
        float score = scorer.evaluate(prediction, result);
    }
}

package edu.psu.sweng.wdis.analytics;

import static org.junit.Assert.assertEquals;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

public class WeightedPartialOrderTest extends ScorerTest {

    @Before
    public void setup() {
        this.scorer = new WeightedPartialOrder();

    }


    @Test
    /**
     * Test case 2.17
     */
    public void testPerfectPrediction() {
        assertEquals(20, super.calculatePerfectPrediction(), 1e-6);
    }

    @Test
    /**
     * Test Case 2.18
     */
    public void testReversePrediction() {
        assertEquals(-20, super.calculateReversePrediction(), 1e-6);
    }

    @After
    public void tearDown() {

    }

}

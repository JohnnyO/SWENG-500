package edu.psu.sweng.wdis.analytics;

import static org.junit.Assert.*;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

import edu.psu.sweng.wdis.database.ActualResult;
import edu.psu.sweng.wdis.database.Player;
import edu.psu.sweng.wdis.database.Position;
import edu.psu.sweng.wdis.database.Ranking;

public class WeightedPartialOrderTest extends ScorerTest {

    @Before
    public void setup() {
        this.scorer = new WeightedPartialOrder();

    }

    @Override
    public Ranking generateActualResult(int week, Position position, String... names) {
        List<Player> players = this.genPlayerList(names);
        List<Double> scores = new ArrayList<Double>(names.length);
        for (int i = 0; i < names.length; i++)
            scores.add((double) names.length - i);
        return new ActualResult(week, position, players, scores);

    }

    @Test
    /**
     * Test case 2.17
     */
    public void testPerfectPrediction() {
        assertEquals(15, super.calculatePerfectPrediction(), 1e-6);
    }

    @Test
    /**
     * Test Case 2.18
     */
    public void testReversePrediction() {
        assertEquals(-15, super.calculatePerfectPrediction(), 1e-6);
    }

    @After
    public void tearDown() {

    }

}

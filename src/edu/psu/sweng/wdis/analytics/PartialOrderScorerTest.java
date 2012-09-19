package edu.psu.sweng.wdis.analytics;

import static org.junit.Assert.assertEquals;

import java.util.ArrayList;
import java.util.List;

import org.junit.Test;

import edu.psu.sweng.wdis.database.ActualResult;
import edu.psu.sweng.wdis.database.Player;
import edu.psu.sweng.wdis.database.Position;
import edu.psu.sweng.wdis.database.Prediction;


/**
 * An implementation of the statistical scoring test cases in the current test plan 
 * document.  Each 
 * @author John
 *
 */
public class PartialOrderScorerTest {

    public List<Player> genPlayerList(String... names) {
        List<Player> players = new ArrayList<Player>(names.length);
        for (String name : names) {
            players.add(new Player(name));
        }
        return players;
    }

    /**
     * Implementation of test case 2.1
     */
    @Test
    public void testPerfectPrediction() {

        List<Player> input = genPlayerList("A", "B", "C", "D", "E");
        List<Player> output = genPlayerList("A", "B", "C", "D", "E");

        Prediction prediction = new Prediction(1, Position.QB, input);
        ActualResult result = new ActualResult(1, Position.QB, output);
        PartialOrderScorer scorer = new PartialOrderScorer();

        float score = scorer.evaluate(prediction, result);
        assertEquals(1, score, 1e-6);
    }

    /**
     * Implementation of test case 2.2
     */
    @Test
    public void testBadPrediction() {

        List<Player> input = genPlayerList("A", "B", "C", "D", "E");
        List<Player> output = genPlayerList("F", "G", "H", "I", "J");

        Prediction prediction = new Prediction(1, Position.QB, input);
        ActualResult result = new ActualResult(1, Position.QB, output);
        PartialOrderScorer scorer = new PartialOrderScorer();

        float score = scorer.evaluate(prediction, result);
        assertEquals(0, score, 1e-6);
    }

    /**
     * Implementation of test case 2.3
     */
    @Test
    public void testClosePrediction() {

        List<Player> input = genPlayerList("A", "B", "C", "D", "E");
        List<Player> output = genPlayerList("A", "B", "C", "D", "F");

        Prediction prediction = new Prediction(1, Position.QB, input);
        ActualResult result = new ActualResult(1, Position.QB, output);
        PartialOrderScorer scorer = new PartialOrderScorer();

        float score = scorer.evaluate(prediction, result);
        assertEquals(0.80, score, 1e-6);
    }

    /**
     * Implementation of test case 2.4
     */
    @Test
    public void testReorderedPrediction() {

        List<Player> input = genPlayerList("A", "B", "C", "D", "E");
        List<Player> output = genPlayerList("A", "C", "B", "D", "F");

        Prediction prediction = new Prediction(1, Position.QB, input);
        ActualResult result = new ActualResult(1, Position.QB, output);
        PartialOrderScorer scorer = new PartialOrderScorer();

        float score = scorer.evaluate(prediction, result);
        assertEquals(0.90, score, 1e-6);
    }

    /**
     * Implementation of test case 2.5
     */
    @Test
    public void testReversePrediction() {

        List<Player> input = genPlayerList("A", "B", "C", "D", "E");
        List<Player> output = genPlayerList("E", "D", "C", "B", "A");

        Prediction prediction = new Prediction(1, Position.QB, input);
        ActualResult result = new ActualResult(1, Position.QB, output);
        PartialOrderScorer scorer = new PartialOrderScorer();

        float score = scorer.evaluate(prediction, result);
        assertEquals(-1, score, 1e-6);
    }

}

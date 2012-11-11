package edu.psu.sweng.wdis.analytics;

import static org.junit.Assert.assertEquals;

import java.util.ArrayList;
import java.util.List;

import org.junit.Test;

import edu.psu.sweng.wdis.database.ActualResult;
import edu.psu.sweng.wdis.database.Player;
import edu.psu.sweng.wdis.database.Position;
import edu.psu.sweng.wdis.database.Prediction;
import edu.psu.sweng.wdis.database.Ranking;

public class ScorerTest {
    
    protected Scorer scorer = null;

    public List<Player> genPlayerList(String... names) {
        List<Player> players = new ArrayList<Player>(names.length);
        for (String name : names) {
            players.add(new Player(name));
        }
        return players;
    }
    
    public Prediction generatePrediction(int week, Position position, String... names) {
        return new Prediction(week, position, genPlayerList(names));
    }
    
    public Ranking generateActualResult(int week, Position position, String... names) {
        return new ActualResult(week, position, genPlayerList(names));
    }

    public float calculatePerfectPrediction() {
    
        Prediction prediction = generatePrediction(1, Position.QB, "A", "B", "C", "D", "E");
        Ranking result = generateActualResult(1, Position.QB, "A", "B", "C", "D", "E");
    
        return scorer.evaluate(prediction, result);
    }

    public float calculateReversePrediction() {
    
        Prediction prediction = generatePrediction(1, Position.QB, "A", "B", "C", "D", "E");
        Ranking result = generateActualResult(1, Position.QB, "E", "D", "C", "B", "A");
    
        return  scorer.evaluate(prediction, result);
        
    }


}

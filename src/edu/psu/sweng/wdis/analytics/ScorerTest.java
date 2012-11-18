package edu.psu.sweng.wdis.analytics;

import static org.junit.Assert.assertEquals;

import java.util.ArrayList;
import java.util.Arrays;
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
    
    public ActualResult generateActualResult(int week, Position position, String... names) {
        List<Double> scores = new ArrayList<Double>();
        for (double i=names.length; i >0; i--) {
            scores.add(i);
        }
        return new ActualResult(week, position, genPlayerList(names), scores);
    }

    public float calculatePerfectPrediction() {
    
        Prediction prediction = generatePrediction(1, Position.QB, "A", "B", "C", "D", "E");
        ActualResult result = generateActualResult(1, Position.QB, "A", "B", "C", "D", "E");
    
        return scorer.evaluate(prediction, result);
    }

    public float calculateReversePrediction() {
    
        Prediction prediction = generatePrediction(1, Position.QB, "A", "B", "C", "D", "E");
        ActualResult result = generateActualResult(1, Position.QB, "E", "D", "C", "B", "A");
    
        return  scorer.evaluate(prediction, result);
        
    }


}

package edu.psu.sweng.wdis.analytics;

import java.util.NoSuchElementException;

import edu.psu.sweng.wdis.database.ActualResult;
import edu.psu.sweng.wdis.database.Player;
import edu.psu.sweng.wdis.database.Prediction;

public class PartialOrderScorer implements Scorer {

    @Override
    public float evaluate(Prediction prediction, ActualResult actualResult) {

        int concordant = 0; // the number of correct predictions
        int discordant = 0; // the number of incorrect predictions

        int size = prediction.size();
        for (int i = 0; i < size; i++) {
            for (int j = i + 1; j < size; j++) {

                Player playerOne = actualResult.get(i);
                Player playerTwo = actualResult.get(j);

                
                

                // We know that playerOne was predicted above playerTwo, lets
                // see if that panned out.
                if (prediction.didPredict(playerOne, playerTwo)) {
                    concordant++;
                } else {
                    discordant++;
                }
            }
        }

        float numerator = (float) concordant - discordant;
        float denominator = (float) 0.5f * size * (size - 1);

        return (numerator / denominator);

    }

}

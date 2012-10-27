package edu.psu.sweng.wdis.analytics;

import java.util.NoSuchElementException;

import edu.psu.sweng.wdis.database.Player;
import edu.psu.sweng.wdis.database.Prediction;
import edu.psu.sweng.wdis.database.Ranking;

public class PartialOrderScorer implements Scorer {

    @Override
    public float evaluate(Prediction prediction, Ranking actualResult) {

        int concordant = 0; // the number of correct predictions
        int discordant = 0; // the number of incorrect predictions

        int size = prediction.size();
        for (int i = 0; i < size; i++) {
            for (int j = i + 1; j < size; j++) {

                Player playerOne = prediction.get(i);
                Player playerTwo = prediction.get(j);
                
                int playerOneRank =  actualResult.getRank(playerOne);
                if (playerOneRank == -1)
                    playerOneRank = actualResult.size();
                int playerTwoRank = actualResult.getRank(playerTwo);
                if (playerTwoRank == -1)
                    playerTwoRank = actualResult.size();

                // We know that playerOne was predicted above playerTwo, lets
                // see if that panned out.
                if (playerOneRank < playerTwoRank) {
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

    @Override
    public String getLabel() {
        return "PartialOrder";
    }

}

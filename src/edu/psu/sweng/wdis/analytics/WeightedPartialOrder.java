package edu.psu.sweng.wdis.analytics;

import edu.psu.sweng.wdis.database.ActualResult;
import edu.psu.sweng.wdis.database.Player;
import edu.psu.sweng.wdis.database.Prediction;
import edu.psu.sweng.wdis.database.Ranking;

public class WeightedPartialOrder extends PartialOrderScorer {

    @Override
    public float evaluate(Prediction prediction, ActualResult actualResult) {
        float total = 0;
        int size = prediction.size();
        for (int i = 0; i < size; i++) {
            for (int j = i + 1; j < size; j++) {

                Player playerOne = prediction.get(i);
                Player playerTwo = prediction.get(j);

                int value = compare(playerOne, playerTwo, actualResult);

                double playerOneScore = actualResult.getScore(playerOne);
                double playerTwoScore = actualResult.getScore(playerTwo);

                double delta = Math.abs(playerOneScore - playerTwoScore);

                total += (delta * value);

            }
        }
        return total;
    }

    private int compare(Player playerOne, Player playerTwo, ActualResult actualResult) {
        int playerOneRank = actualResult.getRank(playerOne);
        if (playerOneRank == -1)
            playerOneRank = actualResult.size();
        int playerTwoRank = actualResult.getRank(playerTwo);
        if (playerTwoRank == -1)
            playerTwoRank = actualResult.size();

        if (playerOneRank < playerTwoRank)
            return 1;
        else
            return -1;
    }

    @Override
    public String getLabel() {
        return "WeightedPartialOrder";
    }

}

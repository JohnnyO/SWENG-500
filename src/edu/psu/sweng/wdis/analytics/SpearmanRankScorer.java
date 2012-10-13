package edu.psu.sweng.wdis.analytics;

import edu.psu.sweng.wdis.database.Player;
import edu.psu.sweng.wdis.database.Prediction;
import edu.psu.sweng.wdis.database.Ranking;

public class SpearmanRankScorer implements Scorer {

    @Override
    public float evaluate(Prediction prediction, Ranking actualResult) {
        
        double deltaSquared = 0;
        double n = prediction.size();
        for (int i=0; i < prediction.size(); i++) {
            Player player = prediction.get(i);
            int actualPosition = actualResult.getRank(player);
            if (actualPosition == -1) {
                throw new IllegalArgumentException("ActualResult not available for "  + player);
            }
            
            deltaSquared += Math.pow(i - actualPosition, 2);
        }
        
        float result = (float) (1 - (6*deltaSquared)/(n*n*n - n));
        
        
        return result;
    }

}

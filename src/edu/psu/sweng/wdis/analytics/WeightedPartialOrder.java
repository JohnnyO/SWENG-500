package edu.psu.sweng.wdis.analytics;

import edu.psu.sweng.wdis.database.Prediction;
import edu.psu.sweng.wdis.database.Ranking;

public class WeightedPartialOrder implements Scorer{

    @Override
    public float evaluate(Prediction prediction, Ranking actualResult) {
        return 0;
    }

    @Override
    public String getLabel() {
        return "WeightedPartialOrder";
    }

}

package edu.psu.sweng.wdis.analytics;

import edu.psu.sweng.wdis.database.ActualResult;
import edu.psu.sweng.wdis.database.Prediction;

public class PartialOrderScorer implements Scorer {

    @Override
    public float evaluate(Prediction prediction, ActualResult actualResult) {
        return 42;
    }

}

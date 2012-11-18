package edu.psu.sweng.wdis.analytics;

import edu.psu.sweng.wdis.database.ActualResult;
import edu.psu.sweng.wdis.database.Prediction;
import edu.psu.sweng.wdis.database.Ranking;

public interface Scorer {

    public float evaluate(Prediction prediction, ActualResult actualResult);

    public String getLabel();
}

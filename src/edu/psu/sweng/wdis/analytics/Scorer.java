package edu.psu.sweng.wdis.analytics;

import edu.psu.sweng.wdis.database.Prediction;
import edu.psu.sweng.wdis.database.Ranking;

public interface Scorer {

    public float evaluate(Prediction prediction, Ranking actualResult);

    public String getLabel();
}

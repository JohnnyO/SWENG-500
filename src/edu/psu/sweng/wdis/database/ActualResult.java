package edu.psu.sweng.wdis.database;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.NoSuchElementException;

public class ActualResult extends Ranking {

    private final List<Double> scores;

    /**
     * Constructs an ActualResult where everyone scores a 0.
     * 
     * @param week
     * @param position
     * @param players
     */
    public ActualResult(int week, Position position, List<Player> players) {
        this.week = week;
        this.position = position;
        this.players = players;
        this.scores = Collections.nCopies(players.size(), 0d);
    }

    public ActualResult(int week, Position position, List<Player> players, List<Double> scores) {
        if (players.size() != scores.size())
            throw new IllegalArgumentException("Player list and score list are two different lengths");
        this.week = week;
        this.position = position;
        this.players = players;
        this.scores = scores;
    }

    public double getScore(Player player) {
        int rank = this.getRank(player);
        if (rank == -1)
            return 0;
        else 
        return scores.get(rank);
    }

}

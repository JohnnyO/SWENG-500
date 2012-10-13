package edu.psu.sweng.wdis.database;

import java.util.List;
import java.util.NoSuchElementException;

public class ActualResult extends Ranking {

    public ActualResult(int week, Position position, List<Player> players) {
        this.week = week;
        this.position = position;
        this.players = players;
    }
}

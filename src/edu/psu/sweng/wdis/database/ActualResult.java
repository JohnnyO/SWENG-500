package edu.psu.sweng.wdis.database;

import java.util.List;
import java.util.NoSuchElementException;

public class ActualResult {

    private int week;
    private Position position;
    private List<Player> players;

    public ActualResult(int week, Position position, List<Player> players) {
        this.week = week;
        this.position = position;
        this.players = players;
    }

    public Player getPlayer(int rank) {
        return players.get(rank);
    }

    public List<Player> getAll() {
        return players;
    }

    public int lookup(Player inputPlayer) {

        for (int i = 0; i < players.size(); i++) {
            if (players.get(i).equals(inputPlayer)) {
                return i;
            }
        }
        return -1;
    }

    public int size() {
        return players.size();
    }

    public Player get(int index) {
        return players.get(index);
    }
}

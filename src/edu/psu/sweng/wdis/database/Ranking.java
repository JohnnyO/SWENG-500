package edu.psu.sweng.wdis.database;

import java.util.List;

public class Ranking {

    protected int week;
    protected Position position;
    protected List<Player> players;

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

    public int getRank(Player player) {
        return players.indexOf(player);
    }

    protected boolean contains(Player player) {
        return players.contains(player);
    }

}

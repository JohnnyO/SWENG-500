package edu.psu.sweng.wdis.database;

import java.util.List;

public class Prediction extends Ranking {

    public Prediction(int week, Position position, List<Player> players) {
        this.week = week;
        this.position = position;
        this.players = players;
    }

    /**
     * This is where we check to see if a given prediction can be said to have
     * predicted the given result.
     * 
     * @param better
     *            - the player ranked higher in actuality
     * @param worse
     *            - the player ranked lower in actuality
     * @return
     */
    public boolean didPredict(Player better, Player worse) {
       
        //CASE 1:  This is the easiest case, you ranked both of them
        if (this.contains(better) && this.contains(worse)) {
            return this.getRank(better) <= this.getRank(worse);
        }
        //CASE 2: The second easiest case, you ranked neither of them
        if (!this.contains(better) && !this.contains(worse)) {
            return false;
        }
        
        //Case 3:  You ranked the better player, but not the worse.  In this case, we can assume
        //that you ranking was correct, because implicitly, "worse" was outside your ranking.
        if (this.contains(better) && !this.contains(worse)) {
            return true;
        }
        
        //Case 4:   You did not rank the "better" player, so we can assume your ranking did not predict
        // the outcome
        return false;
    }




}

package edu.psu.sweng.wdis;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

import edu.psu.sweng.wdis.analytics.PartialOrderScorer;
import edu.psu.sweng.wdis.database.ActualResult;
import edu.psu.sweng.wdis.database.Player;
import edu.psu.sweng.wdis.database.Position;
import edu.psu.sweng.wdis.database.Prediction;


public class Week7Demonstration {
    
    public static ActualResult getActualResults() throws IOException {
        List<Player> players = getPlayers("database/QB-2-Actual.txt");
        return new ActualResult(2, Position.QB, players);
    }
    
    public static Prediction getPrediction(String pathName) throws IOException {
        List<Player> players= getPlayers(pathName);
        return  new Prediction(2, Position.QB, players);

    }
    
    public static List<Player> getPlayers(String pathName) throws IOException {
        URL fileURL =  Week7Demonstration.class.getResource(pathName);
        BufferedReader reader = new BufferedReader(new InputStreamReader(fileURL.openStream()));
        String line = null;
        List<Player> players = new ArrayList<Player>();
        while ((line = reader.readLine()) != null) {
            Player player = new Player(line, Position.QB);
            players.add(player);
        }
        return players;

        
    }
    
    
    

    public static void main(String [] args) throws Exception {
        ActualResult result = getActualResults();
        Prediction yahoo = getPrediction("database/QB-2-Yahoo.txt");
        Prediction berry = getPrediction("database/QB-2-Berry.txt");
        Prediction harris = getPrediction("database/QB-2-Harris.txt");
        Prediction karabell = getPrediction("database/QB-2-Karabell.txt");
        Prediction cockcroft = getPrediction("database/QB-2-Cockcroft.txt");
        Prediction espn = getPrediction("database/QB-2-ESPNComposite.txt");

        
        PartialOrderScorer scorer = new PartialOrderScorer();
        
        System.out.println("Yahoo: " + scorer.evaluate(yahoo, result));
        System.out.println("Berry: " + scorer.evaluate(berry, result));
        System.out.println("Harris: " + scorer.evaluate(harris, result));
        System.out.println("Karabell: " + scorer.evaluate(karabell, result));
        System.out.println("Cockcroft: " + scorer.evaluate(cockcroft, result));
        System.out.println("ESPN: " + scorer.evaluate(espn, result));


        
    }
    
    
  
    
    
    
    

    
    
    
}

package edu.psu.sweng.wdis;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;


public class Week5Demonstration {

    public static void main(String [] args) throws Exception {
        List<Result> data = fetchData();
        int concordant = 0;
        int discordant = 0;
        for (int i=0; i < data.size(); i++) {
            for (int j=i+1; j < data.size(); j++) {
                Result x = data.get(i);
                Result y = data.get(j);
                
                int prediction = x.prediction - y.prediction;
                int actual = x.actual - y.actual;
                if (Math.signum(prediction) == Math.signum(actual)) {
                    concordant++;
                } else {
                    discordant++;
                }
            }
        }
        
        double accuracy = (concordant - discordant) / (data.size() * (data.size() - 1)*0.5);
        System.out.println(concordant + " " + discordant + " " + accuracy);
        
    }
    
    
    public static List<Result> fetchData() throws Exception {
        List<Result> results = new ArrayList<Result>(31);
        
        URL fileURL =  Week5Demonstration.class.getResource("exampleData.csv");
        BufferedReader reader = new BufferedReader(new InputStreamReader(fileURL.openStream()));
        String line = reader.readLine();
        while((line = reader.readLine()) != null) {
            Result result = new Result();
            String [] values = line.split(",");
            result.player = values[0];
            result.prediction = Integer.parseInt(values[1]);
            result.actual = Integer.parseInt(values[2]);
            results.add(result);
        
        }
        
        return results;
        
        
    }
    
    
    static class Result {
        String player;
        int prediction;
        int actual;
    }
    
    
    
    
    
    

    
    
    
}

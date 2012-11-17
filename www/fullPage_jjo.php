<!-- Web Site:      Grid Iron Grades
     File:          fullPage.php 
     Description:   This PHP file will generate the full page version of the site. 
     Company:       Team 2
     Copywrite:     N/A
     Author:        JTM
     Rev. History:  11/1/12 -- Inertial Rev. for the final site.
            
-->
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Grid Iron Grades</title>
        <link rel="stylesheet" type="text/css" href="GIG.css">
        <link type="text/css" href="jquery-ui-1.8.24.custom/css/ui-lightness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="jquery-ui-1.8.24.custom/js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8.24.custom/js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
           requestURL = "autoComplete.php?pos=QB";
            
            $(function()
            {
                $( "#player1" ).autocomplete({source: requestURL});
            });
            
            $(function()
            {
                $( "#player2" ).autocomplete({source: requestURL});
            });
            
            function changeURL(pos)
            {
                requestURL = "autoComplete.php?pos=" + pos;
                $('#player1').autocomplete("option",{source: requestURL});
                $('#player2').autocomplete("option",{source: requestURL});
                document.getElementById("player1").value = "";
                document.getElementById("player2").value = "";
                document.getElementById("label1").innerHTML = "Choose 1st " + pos;
                document.getElementById("label2").innerHTML = "Choose 2nd " + pos;
            }
        </script>
    </head>
  
    <body onload="changeURL('QB');">
        <div id="wrapper">
            <img id="Banner" src="sweng.gif">
            <p></p>
            <div id="pickPlayerDiv">
                <img src="Graphics/selectPlayers.png">
            </div>
            <br>
            <br>
            <table border="0">
                <tr>
                    <td><button id="qbBtn" onClick="changeURL('QB');"></button></td>
                    <td><button id="rbBtn" onClick="changeURL('RB');"></button></td>
                    <td><button id="wrBtn" onClick="changeURL('WR');"></button></td>
                    <td><button id="teBtn" onClick="changeURL('TE');"></button></td>
                </tr>
            </table>
            <p></p>
            <p></p>
            <p></p>
            <br>
            <br>
            <form name="btn_form" method="POST" action="">
                <table border="0">
                    <tr>
                        <td id="label1">Choose 1st Player</td>
                        <td></td>
                        <td id="label2">Choose 2nd Player</td>
                    </tr>
                    <tr>
                        <td><input id="player1" name="player1"/></td>
                        <td></td>
                        <td><input id="player2" name="player2"/></td>
                    </tr>
                    <tr>
                        <td style="height:15px"></td>
                        <td style="height:15px"></td>
                        <td style="height:15px"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><label><input type="submit" name="pButton" id="pButton" value="Submit"/></label></td>
                        <td></td>
                    </tr>
                </table>
                <p></p>
            </form>
            <p></p>
            <br>
            <br>
        <?php
            //This code is used to generate the tables based on the input to the form.       
            require_once 'DbInterface.php';    
                
            if ((isset($_POST['player1'])) and (isset($_POST['player2'])))  
            {
			
				$week=9;
				$player1 = $_POST['player1'];
				$player2 = $_POST['player2'];
		
				$query = "select      
				ida as analystID, analyst.name as aName, station,     
				(select sum(accuracy) from predictionAccuracy where ida = analystID and accuracyType = 'weightedPartialOrder') as total,
				GROUP_CONCAT(if(player.name = '$player1', rankOrder, NULL)) AS 'Player1',     
				GROUP_CONCAT(if(player.name = '$player2', rankOrder, NULL)) AS 'Player2' 
				FROM analyst NATURAL JOIN prediction 
					 JOIN player USING (idp , position) 
					 JOIN predictionAccuracy USING (week , ida , position) 
				WHERE 
					accuracyType = 'WeightedPartialOrder' 
					AND week = $week
					AND (player.name = '$player1' or player.name = '$player2') 
					GROUP BY analystID , analyst.name , station , total";
					
				


                $theDatabase = new DbInterface();
                $theDatabase->connectDb();
				
				$result = mysql_query($query);
				echo  "<table>";
				echo  "<tr>";
				echo  "<td>Analyst</td>";
				echo  "<td>".$player1." Predicted Rank</td>";
				echo  "<td>".$player2." Predicted Rank</td>";
				echo "</tr>";
				$sum=0;
				$player1Average=0;
				$player2Average=0;
				while ($row = mysql_fetch_assoc($result))  {
				    $sum += $row['total'];
					$player1Average += $row['Player1'] * $row['total'];
					$player2Average += $row['Player2'] * $row['total'];
					echo "<tr>";
					echo "<td><a href=analyst.php?ida=".$row['analystID'].">".$row['aName']."</a></td>";
					echo "<td>".$row['Player1']."</td>";
					echo "<td>".$row['Player2']."</td>";
					echo "</tr>";
				}
				$player1Average = $player1Average / $sum;
				$player2Average = $player2Average / $sum;
				echo "<tr><td>Weighted Rank:</td><td>".round($player1Average, 2)."</td><td>".round($player2Average, 2)."</td></tr>";
				echo "</table>";
				
 

				
		
                
                echo "<p></p><p></p>";
                echo "<img id=\"ResultsGraph\" src=\"graph.php?player1=".$_POST['player1']."&player2=".$_POST['player2']."\"/>";
                echo "<hr>";
           }
        ?> 
    </div>
    </body>
</html>

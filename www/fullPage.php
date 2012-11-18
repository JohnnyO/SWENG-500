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
                $theDatabase = new DbInterface();
                $theDatabase->connectDb();
                
                echo "<p></p>"; 
                echo "<img src=\"Graphics/tComp.png\">"; 
                echo "<p></p>";   
                echo "<table><tr><td>";
                echo $theDatabase->getPredictions($_POST['player1'], 7);
		        echo "</td><td>";  
                echo $theDatabase->getPredictions($_POST['player2'], 7);  
                echo "</td></tr></table>";
                echo "<p></p>";
                echo "<img src=\"Graphics/graphHis.png\">";
                echo "<p></p><p></p>";
                echo "<img id=\"ResultsGraph\" src=\"graph.php?player1=".$_POST['player1']."&player2=".$_POST['player2']."\"/>";
                echo "<hr>";
           }
        ?> 
    </div>
    </body>
</html>

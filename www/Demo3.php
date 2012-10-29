<!-- Web Site:      Grid Iron Grades
     File:          index.php 
     Description:   This PHP will act as a the starting page for the website and
                    energize the scripts required to build the page. 
     Company:       Team 2
     Copywrite:     N/A
     Author:        JTM
     Rev. History:  10/8/12 - Initial, This is for more advanced demo.
            
-->
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Grid Iron Grades</title>
        <script type="text/javascript" src="Ajax.js"></script>
        <script type="text/javascript" src="PickingPlayers.js"></script>
        <script language="javascript" type="text/javascript">
            var request = getRequest();
            var player1List = null; 
            var player2List = null; 
        </script>       
        <link type="text/css" href="jquery-ui-1.8.24.custom/css/ui-lightness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="jquery-ui-1.8.24.custom/js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8.24.custom/js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
            var requestURL = "autoComplete.php?pos=QB";
            
            $(function()
            {
                $( "#player1" ).autocomplete({
		        source: requestURL
                 });
            });
            
            $(function()
            {
                $( "#player2" ).autocomplete({
		        source: requestURL
                 });
            });
            
            function changeURL()
            {
                requestURL = "autoComplete.php?pos=" + document.getElementById("PosPick").value
                $('#player1').autocomplete("option",{source: requestURL});
                $('#player2').autocomplete("option",{source: requestURL});
            }
        </script>
    </head>
  
    <body>
<img src="sweng.gif">

       
        <hr/>
        <select name="PositionPick" id="PosPick" onChange="changeURL();">
            <option value="QB">QB</option>
            <option value="RB">RB</option>
            <option value="WR">WR</option>
            <option value="TE">TE</option>
        </select>
        <div class="ui-widget">
            <!--<h3>Step 1: Choose a Position</h3>
            <label for="pos">Position: </label>
            <input id="pos" onclick="getPlayers();"/>-->
        
            <h3>Step 2: Choose 1st Player</h3>
            <label for="player1">Player 1: </label>
            <input id="player1" />
        
            <h3>Step 3: Choose 2nd Player</h3>
            <label for="player2">Player 2: </label>
            <input id="player2" />      
        </div>
<img src="graph.php">
        <hr/>
    </body>
</html>

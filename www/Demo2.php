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
        <title>Grrid Iron Grades</title>
        <script type="text/javascript" src="Ajax.js"></script>
        <script type="text/javascript" src="PickingPlayers.js"></script>
        <script type="text/javascript" src="text-utils.js"></script>
        <script language="javascript" type="text/javascript">
            var request = getRequest();
            var player1List = null; //["Bob", "Fred", "Mary", "Joe"];
            var player2List = null; //["Blade", "Laser", "Blaser", "Chuck"];  
        </script>       
        <link type="text/css" href="jquery-ui-1.8.24.custom/css/ui-lightness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="jquery-ui-1.8.24.custom/js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8.24.custom/js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
             $(function() 
             {
                var availablePos = ["QB","WR","RB"];
                $( "#pos" ).autocomplete({
                source: availablePos
                });
            });
            
            $(function()
            {
                $( "#player1" ).autocomplete({
                source: player1List
                });
            });
            
            $(function()
            {
                $( "#player2" ).autocomplete({
                source: player2List
                });
            });
            
        </script>
    </head>
  
    <body>
        <h1>Welcome to "who Do I Start?"</h1>
        <hr/>
        <div class="ui-widget">
            <h3>Step 1: Choose a Position</h3>
            <label for="pos">Position: </label>
            <input id="pos" onChange="getPlayers();"/>
        
            <h3>Step 2: Choose 1st Player</h3>
            <label for="player1">Player 1: </label>
            <input id="player1" />
        
            <h3>Step 3: Choose 2nd Player</h3>
            <label for="player2">Player 2: </label>
            <input id="player2" />
        </div>
        <hr/>
</div>
    </body>
</html>
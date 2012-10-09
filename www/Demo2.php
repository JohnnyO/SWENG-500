<!-- Web Site:      Who Do I Start
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
        <title>Who Do I Start</title>
        <link type="text/css" href="jquery-ui-1.8.24.custom/css/ui-lightness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="jquery-ui-1.8.24.custom/js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8.24.custom/js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
             $(function() 
             {
                var availablePos = [
                    "QB",
                    "WR",
                    "RB"    
                ];
                $( "#pos" ).autocomplete({
                source: availablePos
                });
            });
        </script>
    </head>
  
    <body>
        <div class="ui-widget">
            <h1>Step 1: Choose a Position</h1>
            <label for="pos">Position: </label>
            <input id="pos" />
        
            <h1>Step 2: Choose 1st Player</h1>
            <label for="player1">Player 1: </label>
            <input id="player1" />
        
            <h1>Step 3: Choose 2nd Player</h1>
            <label for="player2">Player 2: </label>
            <input id="player2" />
        </div>
</div>
    </body>
</html>
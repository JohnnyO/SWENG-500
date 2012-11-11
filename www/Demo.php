<!-- Web Site:      Drig Iron Gra
     File:          index.php des
     Description:   This php based code will act as the initial page for the website. 
                    It will determine the browser type accessing the site and then
                    have the server supply the browser with the appropriate form of the
                    site for the browser. 
     Company:       Team 2
     Copywrite:     N/A
     Author:        JTM
     Rev. History:  9/21 - 9/22 Initial rev for demo.
-->

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  
    <head>
        <title>Grid Iron Grades</title>
    </head>
  
    <body>
        <h1>Technical Area 1: Webserver</h1>
        <p>Welcome to Who Do I Start (DEMO)</p>
        <?php 
            //This section of code loads the external files needed for the functions.
            include_once "BrowserInfo.php";
            echo "<p>Loaded BrowserInfo.php</p>";
            include_once "DbInterface.php";
            echo "<p>Loaded DbInterface.php</p>";
            
            //This section of code gets information about the client's browser.
            $ip = BrowserInfo::getIP();
            echo "<p>Your IP Address is: $ip</p>";
            $bi = BrowserInfo::getBrowserType();
            echo "<P>You are using: $bi</p>";
        ?>
        <fieldset title="Choose Two Player to Compare">
            <form action ="">
                <select name="Player1">
                    <br />
                    <option value="1">Option 1</option>
                    <br />
                    <option value="2">Option 2</option>
                    <br />
                </select>
                <select name="Player2">
                    <br />
                    <option value="1">Option 1</option>
                    <br />
                    <option value="2">Option 2</option>
                    <br />
                </select>
                <br />
                <input type="submit" value="Compare Players"/>
            </form>    
        </fieldset>
     <h1>Technical Area 2/3:  Web Scrapers and Databases</h1>

    
    <?php
        $dbCheck = DbInterface::getDemoTable();
    ?>
    
    <h1>Technical Area 4:  Statistical Analysis</h1>
    <p>
   Given 31 ranked players, there are 465 possible pairs to consider.  Of those pairs, Yahoo got 236 of them right and 229 wrong.
<p>
That gives us a Kendall Tau value of 0.0151.   [metrics run from -1 to 1, with 1 being a perfect prediction, and -1 being completely backwards]<br />
That gives us a Spearman Rank of -0.05
<p>
In other words, using Yahoo rankings to inform your decisions is no better than flipping a coin, or picking names out of a hat!  
<p>

<b>Most accurate prediction:</b>   Jake Locker (predicted 26, actual 26)
<br />
<b>Least accurate prediction:</b> Sam Bradford (predicted: 28, Actual: 4)

    


    </body>
</html>

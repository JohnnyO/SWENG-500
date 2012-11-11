<!-- Web Site:      Grid Iron Grades
     File:          index.php 
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
       <!-- <p> This first section of script will attempt to get browser information from the browser that 
            is trying to access our site. </p>
       --> 
        <?php 
            /*required_once 'phpTest.php';
            
            $ip = getIP();
            echo "<p> Your IP Address is $ip" </p>
            
            $browser = getBrowser();
            echo "<p> Your browser is $browser" </p>            
        
        
            //$ip = $_SERVER["REMOTE_ADDR"];
            //echo "<p> Your IP Address is $ip </p>"; 
            //echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
            //$browser = get_browser(null, true);
            //print_r($browser);*/
        ?>
        <?php
            require_once 'BrowserInfo.php';
            
            var $browserFunctions = new BrowserInfo();
            var $browserType = null; 
            
            $browserType = browserFunctions.getBrowserType();
            
            if ((browserType == Chrome) or (browserType == FireFox) or (browserType == MSIE))
            {
                
            } 
        ?>
        
    </body>
    
</html>
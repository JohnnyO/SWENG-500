<?php

/*================================================================================================= 
    Web Site:      Who To Pick
    File:          BrowserInfo.php 
    Description:   This PHP class will contain the functions required to get information on the 
                   clients browser. This will be used to the target the correct browser with the 
                   proper display. e.g. Mobile web interface. 
    Company:       Team 2
    Copywrite:     N/A
    Author:        JTM
    Rev. History:  9/21 - 9/22 Initial rev for demo.
===================================================================================================*/
require_once 'GlobalVars.php';

class BrowserInfo
{
    //Declarations of Local data. 
    
    //Constructor
    function BrowserInfo()
    {
    }
    
    //Gets the clients IP address. 
    function getIP()
    {
        $ip = $_SERVER["REMOTE_ADDR"]; 
        return $ip;
    }
    
    //Gets browser information and returns enumerated type for generator reference. 
    function getBrowserType()
    {
        if (isset($_SERVER['HTTP_USER_AGENT']))
        {
            if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod'))
            {
                //header('Location: http://yoursite.com/iphone');
                return iPhone;
            }
            if(strstr($_SERVER['HTTP_USER_AGENT'],'Android'))
            {
                return android;
            }
            if(strstr($_SERVER['HTTP_USER_AGENT'],'Chrome'))
            {
                return Chrome;
            }
            if(strstr($_SERVER['HTTP_USER_AGENT'],'Firefox'))
            {
                return FireFox;
            }
            if(strstr($_SERVER['HTTP_USER_AGENT'],'MSIE'))
            {
                return MSIE;
            } 
        }else{
            //Returns UB if the server agent is not set in the browser.
            return UB;
        } 
    }
}
?>
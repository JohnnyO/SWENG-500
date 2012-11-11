<?php
/*================================================================================================= 
    Web Site:      Who Do I Start
    File:          PageGenerator.php
    Description:   This PHP class will contain all functions required to generate the required page types. 
    Company:       Team 2
    Copywrite:     N/A
    Author:        JTM
    Rev. History:  9/21 - 9/22 Initial rev for demo.
===================================================================================================*/
class PageGenerator
{
    //Constructor
    function PageGenerator()
    {
    }

    //The following functions will generate full site content. 
    function genFullSiteIe()
    {
        //print "IE";
        header("Location:http://209.252.235.46/FullSite.php");
        return TRUE;
    }
    
    function genFullSiteFireFox()
    {
        //print "FireFox";
        header("Location:http://209.252.235.46/FullSite.php");
        return TRUE;
    }
    
    function genFullSiteChrome()
    {
        //print "Chrome";
        header("Location:http://209.252.235.46/FullSite.php");
        return TRUE;
    }
    
    //The following functions will generate sire content for Mobile Environments. 
    function genSiteIoS()
    {
        //print "IOS";
        header("Location:http://209.252.235.46/MobileSite.php");
        return TRUE;
    }

    function genSiteAndroid()
    {
        //print "Android";
        header("Location:http://209.252.235.46/MobileSite.php");
        return TRUE;
    }   
}
?>
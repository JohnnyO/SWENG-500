<?php
/*================================================================================================= 
    Web Site:      Who Do I Start
    File:          BrowserTest.php 
    Description:   This PHP script will initialize the PHPUnit test for the BrowserInfo.php.
    Company:       Team 2
    Copywrite:     N/A
    Author:        JTM
    Rev. History:  9/21 - 9/23 Initial rev for demo.
===================================================================================================*/

require_once 'BrowserInfo.php';

class BrowserTest extends PHPUnit_Framework_TestCase
{
    
    public function testGetIP()
    {
        //$this->bi = new BrowserInfo;
        $results = BrowserInfo::getIP();
        $expected = !NULL;
        $this->assertTrue($results == $expected);
    }
    
    function testGetBrowserType()
    {
        $results = BrowserInfo::getBrowserType();
        $expected = !NULL;
        $this->assertTrue($results == $expected);
    }   
}

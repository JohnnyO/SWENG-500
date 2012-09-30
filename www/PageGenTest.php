<?php
/*================================================================================================= 
    Web Site:      Who Do I Start
    File:          PageGenTest.php 
    Description:   This PHP script will initialize the PHPUnit test for the PageGenerator.php.
    Company:       Team 2
    Copywrite:     N/A
    Author:        JTM
    Rev. History:  9/21 - 9/23 Initial rev for demo.
===================================================================================================*/

require_once 'PageGenerator.php';

class PageGenTest extends PHPUnit_Framework_TestCase
{  
    public function testGenFullSiteIe()
    {
        $results = PageGenerator::genFullSiteIe();
        $expected = TRUE;
        $this->assertTrue($results == $expected);
    }
    
    public function testGenFullSiteFireFox()
    {
        $results = PageGenerator::genFullSiteFireFox();
        $expected = TRUE;
        $this->assertTrue($results == $expected);
    }
    
    public function testGenFullSiteChrome()
    {
        $results = PageGenerator::genFullSiteChrome();
        $expected = TRUE;
        $this->assertTrue($results == $expected);
    }
    
    public function testGenSiteIoS()
    {
        $results = PageGenerator::genSiteIoS();
        $expected = TRUE;
        $this->assertTrue($results == $expected);
    }
    
    public function testGenSiteAndroid()
    {
        $results = PageGenerator::genSiteAndroid();
        $expected = TRUE;
        $this->assertTrue($results == $expected);
    }
}
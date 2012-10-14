<?php
/*================================================================================================= 
    Web Site:      Who Do I Start
    File:          DbInterfaceTest.php 
    Description:   This PHP script will initialize the PHPUnit test for the DbInterface.php.
    Company:       Team 2
    Copywrite:     N/A
    Author:        JTM
    Rev. History:  Init 10/7/12
===================================================================================================*/

require_once 'DbInterface.php';

class DbTest extends PHPUnit_Framework_TestCase
{
    
    public function testConnect()
    {
        $results = DbInterface::connectDb();
        $expected = TRUE;
        $this->assertTrue($results == $expected);
    }
    
    function testQuery1()
    //This function tests the case where there is a nonexistant record.
    {
        $results = DbInterface::dbQueryPlayerComp("Aaron Rogers", "Mickey Mouse");
        $expected = NULL;
        $this->assertTrue($results == $expected);
    }   
  
    function testQuery2()
    //This function tests the case where the same player is being compared.
    {
        $results = DbInterface::dbQueryPlayerComp("Aaron Rogers", "Aaron Rogers");
        $expected = NULL;
        $this->assertTrue($results == $expected);
    }   
    
}
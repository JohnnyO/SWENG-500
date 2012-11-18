<?php
/*================================================================================================= 
    Web Site:      Grid Iron Grades
    File:          autoComplete.php 
    Description:   This PHP script will initialize the PHPUnit test for the BrowserInfo.php.
    Company:       Team 2
    Copywrite:     N/A
    Author:        JTM
    Rev. History:  9/21 - 9/23 Initial rev for demo.
===================================================================================================*/
require_once 'autoCompleteClass.php';

class AutoCompleteTest extends PHPUnit_Framework_TestCase
{
    
    public function testEmptyValue()
    {
        $results = autoCompleteClass::getAutoComplete("", "");
        $obj = json_decode($results, true);
        $parsedResult = $obj[0]['value'];
        $expected = NULL;
        $this->assertTrue($parsedResult == $expected);
    }
    
    function testDontExist()
    {
        $results = autoCompleteClass::getAutoComplete("QB", "XYZ ");
        $obj = json_decode($results, true);
        $parsedResult = $obj[0]['value'];
        $expected = NULL;
        $this->assertTrue($parsedResult == $expected);
    }   
    
    function testPosInputExist()
    {
        $results = autoCompleteClass::getAutoComplete("QB", "");
        $obj = json_decode($results, true);
        $parsedResult = $obj[0]['value'];
        $expected = !NULL;
        $this->assertTrue($parsedResult == $expected);
    }
    
    function testPosInputNotExist()
    {
        $results = autoCompleteClass::getAutoComplete("ZX", "");
        $obj = json_decode($results, true);
        $parsedResult = $obj[0]['value'];
        $expected = NULL;
        $this->assertTrue($parsedResult == $expected);
    }
}
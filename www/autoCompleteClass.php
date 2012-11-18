<?php
/*================================================================================================= 
    Web Site:      Grid Iron Grades
    File:          autoComplete.php 
    Description:   
    Company:       Team 2
    Copywrite:     N/A
    Author:        JTM
    Rev. History:  
===================================================================================================*/

require_once 'DbInterface.php';

class autoCompleteClass
{
    function getAutoComplete($pos, $term)
    {
        $theDatabase = new DbInterface();
        $theDatabase->connectDb();
        $position = $pos;
        $partialName = $term;
        $theResults = $theDatabase->dbQueryPlayerPosAndName($position, $partialName);
        
        return $theResults;
           
    }
}
?>
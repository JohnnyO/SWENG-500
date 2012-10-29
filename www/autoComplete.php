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

$theDatabase = new DbInterface();

$theDatabase->connectDb();

$position = $_GET['pos'];
$partialName = $_GET['term'];
$theResults = $theDatabase->dbQueryPlayerPosAndName($position, $partialName);

echo $theResults;
?>

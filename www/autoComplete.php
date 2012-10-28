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

var $theDatabase = new DbInterface;

$theDatabase->connectDb();

$searchPos = $_GET['pos'];
$theResults = $theDatabase->dbQueryPlayerPos($searchPos);

echo $theResults;
?>
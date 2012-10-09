<?php

/*================================================================================================= 
    Web Site:      Who Do I Start
    File:          DbInterface.php 
    Description:   This PHP class will contain the functions required to get information on the 
                   clients browser. This will be used to the target the correct browser with the 
                   proper display. e.g. Mobile web interface. 
    Company:       Team 2
    Copywrite:     N/A
    Author:        JTM
    Rev. History:  9/21 - 9/22 Initial rev for demo.
                   10/7/12 - Added skeletons for query and connnection. Moving past demo.
===================================================================================================*/
class DbInterface
{
    //Declarations of Local data. 
    var $dbAddress;
    var $dbLogIn;
    var $dbPassword;
    var $database;
    var $table1;
    var $con; 
    
    //Constructor
    function DbInterface()
    {
        $this->dbAddress = "localhost:3306";
        $this->dbLogIn = "root";
        $this->dbPassword = "developer1";
        $this->database = "wdis";
        $this->table = "NEED NEW ONE";
    }
    
    function connectDb()
    {
        $con = mysql_connect(dbAddress, dbLogIn, "temp");
        if (!con)
        {
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    function dbQueryPlayerComp($playerName1, $playerName2)
    {
        $qResult1 = mysql_query("SELECT $playerName1 FROM {$table}");
        $qResult2 = mysql_query("SELECT $playerName2 FROM {$table}");
        
        if (!qResult1 or !qResult2)
        {
            return NULL;
        }
        elseif (qResult1 and $qResult2)
        {
            return $finalResult;
        }
       
    }
    
    
    //This is a function to use for the demo.
   /* function getDemoTable()
    {
        $dbAddress = "localhost:3306";
        $dbLogIn = "root";
        $dbPassword = "developer1";
        
        $database = "wdis";
        $table = "website_demo";
        
        $con = mysql_connect(localhost, root, developer1);
        if (!con)
        {
            die("Could not connect: " . mysql_error());
        }else{
            if (!mysql_select_db($database))
                die("Can not connect to database");
            $result = mysql_query("SELECT * FROM {$table}");
            if (!$result)
            {
                die("Query Failed!");
            }
            $numFields = mysql_num_fields($result);
            
            echo "<h1>Table: {$table}</h1>";
            echo "<table border='1'><tr>";
            
            for ($i=0; $i<$numFields; $i++)
            {
                $field = mysql_fetch_field($result);
                echo "<td>{$field->name}</td>";
            }
            echo "</tr>\n";
            
            while($row = mysql_fetch_row($result))
            {
                echo "<tr>";
                foreach($row as $cell)
                    echo "<td>$cell</td>";
                echo "</tr>\n";
            }
            echo "</table>";
            mysql_free_result($result);    
        }
        
        return TRUE; 
    }*/
}
?>
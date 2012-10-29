<?php

/*================================================================================================= 
    Web Site:      Grid Iron Grades
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
    var $dbcon;
    
    //Constructor
    function DbInterface()
    {
        $this->dbAddress = "localhost:3306";
        $this->dbLogIn = "root";
        $this->dbPassword = "developer1";
        $this->database = "wdis";
        $this->table = "player";
    }
    
    function connectDb()
    {
        $con = mysql_connect("localhost:3306", "root", "developer1");
        $dbcon = mysql_select_db("wdis");
        if (!$con)
        {
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    function dbQueryPlayerComp($playerName1, $playerName2)
    {
        $qResult1 = mysql_query("SELECT * FROM Player WHERE name = '$playerName1'");
        $qResult2 = mysql_query("SELECT * FROM Player WHERE name = '$playerName2'");
        
        
        if (!$qResult1 or !$qResult2)
        {
            return NULL;
        }
        elseif($qResult1 == $qResult2)
        {
            return NULL;
        }
        elseif ($qResult1 and $qResult2)
        {
            $finalResult = $qResult1.$qResult2;
            return $finalResult;
        }
       
    }
    
    function dbQueryPlayerPos($position)
    {
        $arrayIndex = 0;
        $resultArray = array();
        
        $qResult = mysql_query("SELECT idp, name, team FROM player WHERE position = '$position'");
        $resultString = "[";
        while ($row = mysql_fetch_assoc($qResult))
        {
          $resultString = $resultString . "\"". $row['name'] ."\","; 
        }
        $resultString = $resultString . "\"JohnnyO\"]";
        
        return $resultString;
    }




    function dbQueryPlayerPosAndName($position, $partialName)
    {
        $arrayIndex = 0;
        $resultArray = array();

        $qResult = mysql_query("SELECT idp, name, team FROM player WHERE position = '$position' and name like '%$partialName%'");
        $resultString = "[";
        while ($row = mysql_fetch_assoc($qResult))
        {
          $resultString .= "{ \"label\": \"" .$row['name']."\",";
          $resultString .= "  \"value\": \"" .$row['name']."\"},";
        }
        $resultString .= "{\"label\": \"\", \"value\": \"\"}]";

        return $resultString;
    }




    
    function dbPositionQuery($position)
    {
        $posResult = mysql_query("SELECT $position FROM {$table}");
        
        if (!$posResult)
        {
            return NULL;
        }
        else
        {
            return $posResult;
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

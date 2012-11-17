<?php 
  require_once 'DbInterface.php';
  
  function getTableRow($value) {
	if ($value > 0) {
		return "<td style='color: green'>".round($value,3)."</td>";
    } else if ($value < 0) {
	   return "<td style='color: red'> (".round($value,3)." )</td>";
	} else {
		   return "<td style='color: yellow'>".round($value,3)."</td>";
	}
  }
  
  
  
  $analystID = $_GET['ida'];
  $dbInterface = new DbInterface();
  $dbInterface->connectDb() or die(mysql_error());
        
  $result = mysql_query("SELECT ida,name,station from analyst where ida=$analystID");
  $row = mysql_fetch_assoc($result);
?>
<html>
<head>
 <title>Gridiron Grades - Analyst Details</title>
</head>
<h1><?=$row['name']; ?></h1>
<h2><?=$row['station']; ?></h2>
<hr />
<h3>Overall Analyst Accuracy</h3>
<p>
Below is an evaluation of this analyst on a scale of -1 to 1.  Analysts with a +1 make perfect predictions every week (and also, don't exist!).
A score of 0 is the middle ground, they get things right about as much as they get them wrong.   A negative score means they are more often
wrong than right.  You can use this information to evaluate your confidence in this particular analysts predictions.
</p>
<table>
  <tr>
    <td>Week</td>
	<td>Quarterback</td>
	<td>Running Back</td>
	<td>Wide Receiver</td>
	<td>Tight End</td>
	<td>Kicker</td>
	<td>Defense/Special Teams</td>
  </tr>
<?php 
  $query="
  SELECT  ida,week,
    GROUP_CONCAT(if(position ='QB', accuracy, NULL)) AS 'QB', 
    GROUP_CONCAT(if(position='RB', accuracy, NULL)) AS 'RB',
    GROUP_CONCAT(if(position='WR', accuracy, NULL)) AS 'WR',
    GROUP_CONCAT(if(position='TE', accuracy, NULL)) AS 'TE', 
    GROUP_CONCAT(if(position='K', accuracy, NULL)) AS 'K', 
    GROUP_CONCAT(if(position='DEF', accuracy, NULL)) AS 'DEF' 
  FROM predictionAccuracy where accuracyType='PartialOrder' and ida=$analystID
  GROUP BY ida, week;";
  $result = mysql_query($query);
  
  while ($row = mysql_fetch_assoc($result))  {
    echo "<tr>";
	echo "<td>",$row['week'],"</td>";
	echo getTableRow($row['QB']);
	echo getTableRow($row['RB']);
	echo getTableRow($row['WR']);
	echo getTableRow($row['TE']);
	echo getTableRow($row['K']);
	echo getTableRow($row['DEF']);
	echo "</tr>";
   }
?>  
</table>
<h3>Weighted Analyst Accuracy</h3>
<p>
However, not all guess are created equal.  Sometimes its better to be right about a longshot and wrong about 9 close calls than it is to be 
right about the close calls and miss out on the big winner.  In that regard, we have developed a new scoring metric which takes into account
not only the accuracy of a prediction, but the number of points gained or lost by a correct prediction.   This information is summarized below.
<table>
  <tr>
    <td>Week</td>
	<td>Quarterback</td>
	<td>Running Back</td>
	<td>Wide Receiver</td>
	<td>Tight End</td>
	<td>Kicker</td>
	<td>Defense/Special Teams</td>
  </tr>
<?php 
  $query="
  SELECT  ida,week,
    GROUP_CONCAT(if(position ='QB', accuracy, NULL)) AS 'QB', 
    GROUP_CONCAT(if(position='RB', accuracy, NULL)) AS 'RB',
    GROUP_CONCAT(if(position='WR', accuracy, NULL)) AS 'WR',
    GROUP_CONCAT(if(position='TE', accuracy, NULL)) AS 'TE', 
    GROUP_CONCAT(if(position='K', accuracy, NULL)) AS 'K', 
    GROUP_CONCAT(if(position='DEF', accuracy, NULL)) AS 'DEF' 
  FROM predictionAccuracy where accuracyType='WeightedPartialOrder' and ida=$analystID
  GROUP BY ida, week;";
  $result = mysql_query($query);
  
  while ($row = mysql_fetch_assoc($result))  {
    echo "<tr>";
	echo "<td>",$row['week'],"</td>";
	echo getTableRow($row['QB']);
	echo getTableRow($row['RB']);
	echo getTableRow($row['WR']);
	echo getTableRow($row['TE']);
	echo getTableRow($row['K']);
	echo getTableRow($row['DEF']);
	echo "</tr>";
   }
?>  
</table>



  

</table>
<body>
</body>
</html>
  
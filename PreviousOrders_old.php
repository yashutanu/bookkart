<?php
	ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="main.css">
	<title>Previous Orders</title>
</head>
<body>
<?php
extract($_GET);
	
	$dbname='YummPizza';	
	
	$conn = mysql_connect("127.0.0.1","root","");
	if(!$conn){
		die("Could not establish connection to MYSQL");
	}
	else
	{	
		$db=mysql_select_db($dbname, $conn);
		$sql="SELECT * FROM OrderDetails";

		if(!$db){			
			die("Cannot connect to DB".mysql_error());
		}
		else
		{
			$results=mysql_query($sql, $conn);
			if(!$results)
			{
				die("Cannot get data".mysql_error());
			}
			else{
				$row = mysql_fetch_row($results);
			}
			
	       if($row){
		echo "<table border='2' cellspacing='2' cellpadding='6'>";
		echo "<tr style='background-color:grey;'><th>S.NO</th><th>NAME</th><th>CONTACT</th><th>SIZE</th><th>CRUST</th><th>TOPPINGS</th><th>QUANTITY</th><th>AMOUNT</th>";
		echo "<tr>";
		   foreach($row as $value){
			echo "<td>" . $value . "</td>";
		}
		echo "</tr>";
		echo "</table>";
	        }
	
			}
		}
	flush();
	ob_flush();

?>	

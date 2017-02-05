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
	$conn = mysql_connect("127.0.0.1","root","");
	if(!$conn){
		die("Could not establish connection to MYSQL");
	}
	else{
		$db=mysql_select_db("YummPizza", $conn);
		$sql="SELECT * FROM OrderDetails";
		if(!$db){	
			die("Cannot connect to DB".mysql_error());
		}
		else{
			$results=mysql_query($sql, $conn);
			if(!$results)
			{
				die("Cannot get data".mysql_error());
			}
			else{
				echo "<table border='2' cellspacing='2' cellpadding='6'>";
				echo "<tr style='background-color:grey;'>
				<th>S.NO</th><th>NAME</th><th>CONTACT</th><th>SIZE</th><th>CRUST</th><th>TOPPINGS</th><th>QUANTITY</th><th>AMOUNT</th>";
				while($row = mysql_fetch_assoc($results))
				{
					
					echo '<tr>';				
					echo '<td>' . $row['id'] . '</td>';
					echo '<td>' . $row['customername'] . '</td>';
					echo '<td>' . $row['contact'] . '</td>';
					echo '<td>' . $row['pizzasize'] . '</td>';
					echo '<td>' . $row['crust'] . '</td>';
					echo '<td>' . $row['toppings'] . '</td>';
					echo '<td>' . $row['quantity'] . '</td>';		
					echo '<td>' . $row['amount'] . '</td>';				
					echo '</tr>';
						
				}
				echo "</table><a href='YummPizza.html'>back</a>";
		      
			
			
		}
	}
	}

ob_flush();
flush();
?>	

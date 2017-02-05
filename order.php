<?php
	ob_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php

	$conn = mysql_connect("127.0.0.1","root","");
	if(!$conn)
	{
		die("Could not establish connection to MYSQL");
	}
	else{
	
		$db=mysql_select_db("YummPizza", $conn);

		extract($_POST);
	
		print ("Thank you for ordering!!!");
		print("<br> <br>");
		
		$count=0;
		$toppings="";

		foreach($_POST['topping'] as $check) {
			$toppings=$toppings.",".$check;
			$count++;
		}	
		
		// amount calculation
		
		$amount=0;
		if(strcmp($size,"small")==0)
			$amount+=50;	
		else if(strcmp($size,"medium")==0)
			$amount+=150;
		else if(strcmp($size,"large")==0)
			$amount+=300;
		
		if(strcmp($crust,"classic")==0)
			$amount+=10;	
		else if(strcmp($crust,"thin")==0)
			$amount+=20;
		else if(strcmp($crust,"extra cheese")==0)
			$amount+=50;
		
		$toppingcost=$count*5;
		$amount+=$toppingcost;
								
		//
		
		print("Your order is <br>SIZE: $size<br>CRUST: $crust<br>TOPPINGS: $toppings<br>QUANTITY: $quantity<br><b>TOTAL AMOUNT: Rs. $amount</b>");
		
		
		$sql="INSERT INTO OrderDetails(customername, contact, pizzasize, crust, toppings, quantity, amount) VALUES ('$name','$contact','$size','$crust','$toppings','$quantity','$amount')";

		if(!$db)
		{				
			die("Cannot connect to DB".mysql_error());
		}
		else{

			$qry=mysql_query($sql, $conn);
			if(!$qry)
			{
				die("Cannot insert data".mysql_error());
			}
		}	
	
	}
	

	
	
	ob_flush();
	flush();
?>  

</body>
</html>

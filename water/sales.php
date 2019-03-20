<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
<body>
		<table class="table table-hover table-secondary ">
		  <thead>
			<tr>
					<th scope="col"><a class="text-info" href="home.php">
	<?php
		if(isset($_SESSION['u_id'])){
			echo ($_SESSION['u_first']);
			echo ' ';
			echo ($_SESSION['u_last']);
		}
	?></a></th>
					</th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th>
					<th scope="col">
						<p id ="example" ></p>
						<script>
							var display=setInterval(function(){Time()},0);

							function Time()
							{
								var date=new Date();
								var time=date.toLocaleTimeString();
								document.getElementById("example").innerHTML=time;
							}
						</script>
					</th>
					
					<th scope="col"><a class="text-info" style="float: right;"><form action="includes/logout.inc.php" method="POST"><button type="submit" name="submit" class="btn btn-primary">Logout</button></form></a></th>
			</tr>
		  </thead>
		</table>
	<div class="container">
	<center>
	<form>
		<button type="submit" name="cancel" class="btn btn-light"><a href="viewproduct.php">Products</a></button>
		<button type="submit" name="cancel" class="btn btn-light"><a href="viewemployee.php">Employee</a></button>
		<button type="submit" name="cancel" class="btn btn-light"><a href="viewcustomer.php">Customer</a></button>
		<button type="submit" name="cancel" class="btn btn-light"><a href="sales.php">Sales</a></button>
			<br/><br/>
		
	</form>
</center>
	</div>
	<div class="container">
	<form>
		<button type="submit" name="cancel" class="btn btn-light"><a href="addsale.php">Add Sale</a></button>
			<br/><br/>
			
			
					<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sales ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Date and Time</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
  				<?php
				include_once 'includes/dbh.inc.php';
				$user_id = $_SESSION['u_id'];
				$sql = "SELECT * FROM sales, sales_product, customer WHERE sales.sales_id = sales_product.sales_id and sales.customer_no = customer.customer_no ORDER by date DESC;;;";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				$total=0;
				if ($resultCheck > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
					$savequantity = $row["quantity"];
					$saveprice = $row["price"];	
					$quantityprice = $savequantity*$saveprice;
					$sales_id = $row["sales_id"];
					$total += $quantityprice;


					
				?>



    <tr>
	      <td><?php echo $row["sales_id"];?></td>
	      <td><?php echo $row["first_name"];?></td>
      <td><?php echo $row["date"];?></td>
      <td>&#8369; <?php echo $quantityprice;?>.00</td>
      
    </tr>
    <?php		}
				
				}
				?>
  </tbody>
</table>
		
		
		
		
	</form>
	</div>
</body>  
</html>	
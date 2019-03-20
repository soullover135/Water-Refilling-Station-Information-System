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
		<button type="submit" name="cancel" class="btn btn-light"><a href="addemployee.php">Add Employee</a></button>
			<br/><br/>
		<table class="table table-hover">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">Emp. no</th>
			  <th scope="col">Name</th>
			  <th scope="col">Position</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
				include_once 'includes/dbh.inc.php';
				$user_id = $_SESSION['u_id'];
				$sql = "SELECT * 
						FROM employee AS p 
						JOIN users AS r 
						WHERE p.user_id = $user_id  
						AND r.user_id = $user_id;";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				if ($resultCheck > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
				?>
			<tr>
			  <th scope="row"><?php echo $row["emp_no"];?></th>
			  <td><?php echo $row["first_name"]; ?></td>
				<td><?php echo $row["position"]; 	?> </td>
			  <td><a href="includes/deleteemployee.inc.php?id=<?php echo $row["emp_no"]; ?>">Edit </a><a href="includes/deleteemployee.inc.php?id=<?php echo $row["emp_no"]; ?>"> Delete</a></td>
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
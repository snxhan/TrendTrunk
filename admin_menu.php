<!DOCTYPE html>
<html lang="en">
<head>
  <title>JavaJam Coffee House - Menu</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="master.css">
  <?php
	// Set up Connection
	// Syntax: mysqli(IP address of server, username, pwd, DB instance)
	@$db = new mysqli('localhost', 'root', '', 'javajam');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	// Prepare Query
	$query = "SELECT * FROM `products`;";
	// Querying the Database
	$stmt = $db->prepare($query);
	// replace ? with $searchterm, 's' means string value 
	$stmt->execute();
	// Retrieving number of results and all rows into associative array
	$result = $stmt->get_result();
	// Get number of rows retrieved
	$num_results = $result->num_rows;
	// Transform associative array to multidimension array for easy access
	$mdarray = array();
	while ($message = $result->fetch_assoc()) {
		$mdarray[] = $message;
	}
	// Presenting the Query Results
	echo "<script>console.log('Debug Objects: " . $num_results . " items retrieved' );</script>";
	// Disconnecting from the Database
	$result->free();
	$db->close();
	?>
  <script type = "text/javascript" src="admin_menu.js"></script>
</head>
<body>
	<header>
	  <img src="javajamlogo.png" alt="javajamlogo">
	</header>
	<div class="wrapper">
		<nav>
			<ul>
				<li><a href="admin_menu.php">Product Price Update</a></li>
			</ul>
		</nav>
		<div class="content">
			<ul class="breadcrumb">
				<li><a href="login_admin.php">Admin Tools</a></li>
				<li>Product Price Update</li>
			</ul>
			<form id="admin_menu_form" action="admin_menu_update.php" method="post">
				<h1>Click to update product prices:</h1>
				<table class="menu_page_table">
					<tr>
						<td><input type="checkbox" name="java_checkbox" id="java_checkbox" style="width:25px; height:25px;" onclick="gotoAdminMenuUpdatePage()"></td>
						<td>Just Java</td>
						<td>Regular house blend, decaffeinated coffee, or flavor of the day. <br>
							<span class="menu_page_table_pricing">
								<label id="Java_Price" style="float:none" >Endless Cup $<?php echo $mdarray[0]["price"]; ?></label>
							</span>
						</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="cafe_checkbox" id="cafe_checkbox" style="width:25px; height:25px;" onclick="gotoAdminMenuUpdatePage()"></td>
						<td>Cafe au Lait</td>
						<td>House blended coffee infused into  smooth, steamed milk. <br>
							<span class="menu_page_table_pricing">
								<label id="Cafe_Single_Price" style="float:none" >Single $<?php echo $mdarray[1]["price"]; ?></label>
								<label id="Cafe_Double_Price" style="float:none">Double $<?php echo $mdarray[2]["price"]; ?></label>
							</span>
						</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="cap_checkbox" id="cap_checkbox" style="width:25px; height:25px;" onclick="gotoAdminMenuUpdatePage()"></td>
						<td>Iced Cappuccino</td>
						<td>Sweetened espresso blended with icy-cold milk and served in a chilled glass. <br>
							<span class="menu_page_table_pricing">
								<label id="Cap_Single_Price" style="float:none">Single $<?php echo $mdarray[3]["price"]; ?></label>
								<label id="Cap_Double_Price" style="float:none">Double $<?php echo $mdarray[4]["price"]; ?></label>
							</span>	
						</td>
					</tr>
				</table>
			</form>	
		</div>
	</div>
	<footer>
		<form id = "myFooterForm" action = "">
			<tr>
				<td><br>Copyright &copy; 2014 JavaJam Coffee House<br>
					<a href="mailto:test@gmail.com">Jseeto001@ntu.edu.sg</a>
				</td>
			</tr>
		</form>
	</footer>
</body>
<html>


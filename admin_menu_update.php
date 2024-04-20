<!DOCTYPE html>
<html lang="en">
<head>
  <title>JavaJam Coffee House - Menu</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="master.css">
  <?php
	//passing over checkboxed value from previous page
	if(isset($_POST['java_checkbox']))
	{	
		$checkbox= 'java'; //if checked variable is "java"
	}
	else if(isset($_POST['cafe_checkbox'])){
		$checkbox= 'cafe'; //if checked variable is "cafe"
	}
	else if(isset($_POST['cap_checkbox'])){
		$checkbox= 'cap'; //if checked variable is "cap"
	}

	// Set up Connection
	@$db = new mysqli('localhost', 'root', '', 'javajam');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	// Prepare Query
	$query = "SELECT * FROM `products`;";
	// Querying the Database
	$stmt = $db->prepare($query);
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
	<!--creating a hidden textbox to store the value of checkbox from previous page :# not recommended but cant find other way for now-->
	<input type="hidden" id="checkboxSelection" value="<?php echo $checkbox; ?>" />
	<input type="hidden" id="Java_Price" value="<?php echo $mdarray[0]["price"]; ?>" />
	<input type="hidden" id="Cafe_Single_Price" value="<?php echo $mdarray[1]["price"]; ?>" />
	<input type="hidden" id="Cafe_Double_Price" value="<?php echo $mdarray[2]["price"]; ?>" />
	<input type="hidden" id="Cap_Single_Price" value="<?php echo $mdarray[3]["price"]; ?>" />
	<input type="hidden" id="Cap_Double_Price" value="<?php echo $mdarray[4]["price"]; ?>" />
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
			<form id = "update_form" action="admin_menu_update_results.php" method="get">
				<h1>Click to update product prices:</h1>
				<table class="menu_page_table" id="admin_menu_page_table">
				</table>
			</form>
			<script type = "text/javascript" src="admin_menu_update.js"></script>
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


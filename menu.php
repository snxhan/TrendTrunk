<!DOCTYPE html>
<html lang="en">
<head>
  <title>JavaJam Coffee House - Menu</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="master.css">
  <?php
  @$db = new mysqli('localhost', 'root', '', 'javajam');
  if (mysqli_connect_errno()) {
    echo 'Error: Could not connect to database.  Please try again later.';
    exit;
  }
  $query = "SELECT * FROM `products`;";
  $stmt = $db->prepare($query);
  $stmt->execute();
  $result = $stmt->get_result();
  $num_results = $result->num_rows;
  $mdarray = array();
  while ($message = $result->fetch_assoc()) {
    $mdarray[] = $message;
  }
  echo "<script>console.log('Debug Objects: " . $num_results . " items retrieved' );</script>";
  $result->free();
  $db->close();
  ?>
  <input type="hidden" id="jjNullCost" value="<?php echo $mdarray[0]["price"]; ?>" />
  <input type="hidden" id="calSingleCost" value="<?php echo $mdarray[1]["price"]; ?>" />
  <input type="hidden" id="calDoubleCost" value="<?php echo $mdarray[2]["price"]; ?>" />
  <input type="hidden" id="icSingleCost" value="<?php echo $mdarray[3]["price"]; ?>" />
  <input type="hidden" id="icDoubleCost" value="<?php echo $mdarray[4]["price"]; ?>" />
  <script type = "text/javascript" src="menu.js"></script>
</head>

<body>
	<header>
	  <img src="javajamlogo.png" alt="javajamlogo">
	</header>
	<div class="wrapper">
		<nav>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="menu.php">Menu</a></li>
				<li><a href="music.html">Music</a></li>
				<li><a href="jobs.html">Jobs</a></li>
			</ul>
		</nav>
		<div class="content">
			<form name="checkout_form" id = "checkout_form" action = "menu_checkout_results.php" method="post">
				<h1>Coffee at JavaJam</h1>
				<table class="menu_page_table">
					<tr>
						<td>Just Java</td>
						<td>Regular house blend, decaffeinated coffee, or flavor of the day. <br>
							<span class="menu_page_table_pricing">
								<label style="float:none"><input type="radio" checked="checked" id="itemButton_JustJava" name="itemButton_JustJava" value="0"/>Endless Cup $<?php echo $mdarray[0]["price"]; ?></label>
							</span>
						</td>
						<td> <input type="number" name="JustJavaQty" id="JustJavaQty" style="width:40px" value="0" min="0" onchange = "calculatePrice()"/></td>
						<td> <p id="Total_JustJava" style="width:50px">$0</p></td>
					</tr>
					<tr>
						<td>Cafe au Lait</td>
						<td>House blended coffee infused into  smooth, steamed milk. <br>
							<span class="menu_page_table_pricing">
								<label style="float:none"><input type="radio" checked="checked" id="itemButton_Cafe" name="itemButton_Cafe" value="0" onclick="calculatePrice()">Single $<?php echo $mdarray[1]["price"]; ?></label>
								<label style="float:none"><input type="radio" id="itemButton_Cafe" name="itemButton_Cafe" value="1" onclick="calculatePrice()"/>Double $<?php echo $mdarray[2]["price"]; ?></label>
							</span>
						</td>
						<td> <input type="number" id="CafeQty" name="CafeQty" style="width:40px" value="0" min="0" onchange = "calculatePrice()"/></td>
						<td> <p id ="Total_Cafe" style="width:50px" >$0</p></td>
					</tr>
					<tr>
						<td>Iced Cappuccino</td>
						<td>Sweetened espresso blended with icy-cold milk and served in a chilled glass. <br>
							<span class="menu_page_table_pricing">
								<label style="float:none"><input type="radio" checked="checked" id="itemButton_Cappuccino" name="itemButton_Cappuccino" value="0" onclick="calculatePrice()"/>Single $<?php echo $mdarray[3]["price"]; ?></label>
								<label style="float:none"><input type="radio" id="itemButton_Cappuccino" name="itemButton_Cappuccino" value="1" onclick="calculatePrice()"/>Double $<?php echo $mdarray[4]["price"]; ?></label>
							</span>	
						</td>
						<td> <input type="number" id="CappuccinoQty" name="CappuccinoQty" style="width:40px" value="0" min="0" onchange = "calculatePrice()"/></td>
						<td> <p id="Total_Cappuccino" style="width:50px">$0</p></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td style="width:100px;">
							Total: $<span id="Total_Price">0.00</span>
							<input type="submit" value="Check Out" id="checkout_button">
						  </td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<footer>
		<form id = "myFooterForm" action = "">
			<table class = "footer_table">
				<tr>
					<td><br>Copyright &copy; 2014 JavaJam Coffee House<br>
						<a href="mailto:test@gmail.com">Jseeto001@ntu.edu.sg</a>
					</td>
				</tr>
			</table>
		</form>
	</footer>
</body>
<html>

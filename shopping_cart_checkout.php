<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Infineon Shopping</title>
	<link rel="stylesheet" href="master.css">
	<link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Libre+Baskerville:wght@400;700&family=Merriweather+Sans:ital,wght@1,500;1,800&display=swap" rel="stylesheet">
</head>

<body>
	<header>
		<div class="topbar">
			<div class="topbar-shrink">
				<nav>
					<ul class="topbar-widgets">
						<li><a href="faq.html">FAQ</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="navbar">
			<div class="navbar-shrink">
				<a class="logo" href="index.php">TrendTrunk</a>
				<ul class="navbar-category">
					<li class="navbar-category-women">
						<a href="women.html">WOMEN</a>
					</li>
					<li class="navbar-category-men">
						<a href="men.html">MEN</a>
					</li>
				</ul>
				<div class="searchbar">
					<form method="get">
						<input type="text" class="input-search" placeholder="Type to Search...">
					</form>
				</div>
				<ul class="navbar-widgets">
					<li class="navbar-widgets-user-account">
						<div class="navbar-widgets-user-account-div">
							<button onclick="window.location.href = 'account.php'"><img src="images/user.png"></button>
							<div id="account-dropdown" class="account-dropdown">
								<a href="signup.html">Sign Up</a>
								<a href="login.php">Log In</a>
							</div>
						</div>
					</li>
					<li class="navbar-widgets-liked-items">
						<div class="navbar-widgets-liked-items-div">
							<button onclick="window.location.href = 'liked_items.php'"><img src="images/like_icon.png"></button>
						</div>
					</li>
					<li class="navbar-widgets-shopping-cart">
						<div class="navbar-widgets-shopping-cart-div">
							<button onclick="window.location.href = 'shopping_cart.php'"><img src="images/cart.png"></button>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</header>
	<div class="main">
		<div class="main-shrink">
			<h1 class="homepage_header">Purchase Outcome</h1>
			<div class="row" style="text-align:center;">
				<br>
				Thank you for shopping with us! <br><br>
				<?php
				session_start();
				// Update sales table
				// Get cart items
				echo "You have successfully purchased: <br>";
				include "dbconnect.php";
				$itemsEmail = array();

				for ($i = 0; $i < count($_SESSION['cart']); $i++) {
					$productId = $_SESSION['cart'][$i];
					$query = "SELECT * FROM products WHERE id = ?;";
					$stmt = $db->prepare($query);
					$stmt->bind_param('s', $productId);
					$stmt->execute();
					$result = $stmt->get_result();
					$num_results = $result->num_rows;
					for ($index = 0; $index < $num_results; $index++) {
						$row = $result->fetch_assoc();
						$productPrice = $row['price'];

						array_push($itemsEmail,($row['name'] . " $" . $row['price'] . "<br>"));
						echo $row['name'] . " $" . $row['price'] . "<br>";

						// Get latest sales and update!
						// Get latest sales
						$query = "SELECT 1 FROM `sales` WHERE product_id = ?";
						$stmt = $db->prepare($query);
						$stmt->bind_param('s', $productId);
						$stmt->execute();
						$result = $stmt->get_result();
						$num_results = $result->num_rows;
						if ($num_results == 0) {
							// Means no data exists
							// Insert new row
							// ? - productId, ? - sales/productPrice, quantity - 1
							$query = "INSERT INTO `sales` VALUES (?, ?, 1)";
							$stmt = $db->prepare($query);
							$stmt->bind_param('ss', $productId, $productPrice);
							$stmt->execute();
						}else{
							// Add current price to current sales
							// Get latest price and quantity and add on to it
							$query = "SELECT * FROM sales WHERE product_id = ?";
							$stmt = $db->prepare($query);
							$stmt->bind_param('s', $productId);
							$stmt->execute();
							$result = $stmt->get_result();
							$num_results = $result->num_rows;
							$currentSales = "";
							$currentQuantity = "";
							for ($index = 0; $index < $num_results; $index++) {
								$row = $result->fetch_assoc();
								$currentSales = $row['sales'];
								$currentQuantity = $row['quantity'];
							}
							$currentSales += $productPrice;
							$currentQuantity++;
							// Update
							$query = "UPDATE sales SET sales=?,quantity=? WHERE product_id = ?;";
							$stmt = $db->prepare($query);
							$stmt->bind_param('dds', $currentSales, $currentQuantity, $productId);
							$stmt->execute();
							$result = $stmt->get_result();
						}
					}
				}
				echo "<br>";
				echo "Total $" . $_POST['hiddenTP']. "<br>";



				//Unset cart
				unset($_SESSION['cart']);
				?>
				<!-- EMAIL confirmation here -->
				<?php
                // Get current email

                // Generate link to reset password 
                //$email = $_POST['email'];
                $email = "f31ee@localhost";


                $to = 'f31ee@localhost';
                $subject = 'Receipt';
                $message = json_encode($itemsEmail);
                $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To: f32ee@localhost' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

                mail($to, $subject, $message, $headers, '-ff32ee@localhost');
                
                echo ("Confirmation mail sent to: " . $to);
				
                ?>
			</div>
		</div>
	</div>
	<footer>
		<div class="footer-main">
			<div class="footer-main-shrink">
				<section class="footer-main-section">
					<h1>HELP & INFORMATION</h1>
					<ul>
						<li>
							<a class="footer-links" href="contact_us.html">Contact Us</a>
						</li>
						<li>
							<a class="footer-links" href="faq.html">FAQ</a>
						</li>
						<li>
							<a class="footer-links" href="track_order.html">Track Order</a>
						</li>
						<li>
							<a class="footer-links" href="discount.html">10% Student Discount</a>
						</li>
					</ul>
				</section>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="footer-copyright-shrink">
				<p class="footer-copyright-name">@2024 TrendTrunk</p>
				<ul class="footer-copyright-TNC">
					<li>
						<a>Terms and Conditions Apply</a>
					</li>
				</ul>
			</div>
		</div>
	</footer>
</body>

</html>
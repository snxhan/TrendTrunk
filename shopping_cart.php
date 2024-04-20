<?php  //cart.php
session_start();
// Check if user is logged on, else redirect them to login page
if (isset($_SESSION['logged_on_user_name'])) {
	// this echo line affects the header css style so i decided to omit it.
    //echo "<script>console.log('Logged in user: ". $_SESSION['logged_on_user_name'] ."')</script>";
}
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}
if (isset($_GET['empty'])) {
	unset($_SESSION['cart']);
	header('location: ' . $_SERVER['PHP_SELF']);
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TrendTrunk Shopping</title>
	<link rel="stylesheet" href="master.css">
	<link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Libre+Baskerville:wght@400;700&family=Merriweather+Sans:ital,wght@1,500;1,800&display=swap" rel="stylesheet">
	<script type="text/javascript" src="master.js"></script>
	<script>
		function computeCost() {
			var cartQuantity = <?php echo count($_SESSION['cart']); ?>;
			// Get quantity of cart items
			var total = 0;
			for (i = 0; i < cartQuantity; i++) {
				var quanity = document.getElementById("quantity" + i).value;
				var price = document.getElementById("price" + i).textContent;
				var newprice = price.replace('$', '');
				var subtotal = quanity * newprice;
				document.getElementById("subtotal" + i).textContent = subtotal;
				total += subtotal;

			}
			//show
			document.getElementById("totalPrice").textContent = total;
			// update to input for form submission
			document.getElementById("hiddenTP").value = total;
		}
	</script>
	<?php
	@$db = new mysqli('localhost', 'root', '', 'bawl');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	// If the user clicked the add to cart button on the product page we can check for the form data
	if (isset($_POST['product_id']) && is_numeric($_POST['product_id'])) {
		// Set the post variables so we easily identify them, also make sure they are integer
		$product_id = (int)$_POST['product_id'];
		// Prepare the SQL statement, we basically are checking if the product exists in our databaser
		$stmt = $db->prepare('SELECT * FROM products WHERE id = ?');
		$stmt->execute([$_POST['product_id']]);
		// Fetch the product from the database 
		$result = $stmt->get_result();
		// Result cannot be displayed as it isnt an array, so we change it to put into an array below
		$product = array();
		while ($message = $result->fetch_assoc()) {
			$product = $message;
		}
		echo "<script>console.log('Debug Objects: " . $product['id'] . " products successfully retrieved' );</script>";
	}
	
	?>
</head>
<body>
	<header>
		<div class="topbar">
			<div class="topbar-shrink">
				<nav>
					<ul class="topbar-widgets">
						<li><a href="index.php?page=faq">FAQ</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="navbar">
			<div class="navbar-shrink">
				<a class="logo" href="index.php">TrendTrunk</a>
				<ul class="navbar-category">
					<li class="navbar-category-women">
						<a href="index.php?page=women">WOMEN</a>	
					</li>
					<li class="navbar-category-men">
						<a href="index.php?page=men">MEN</a>
					</li>
				</ul>
				<div class="searchbar">
					<form class="search-form" action="search_result.php" method="post">
						<input type="text" class="input-search" name="input-search" placeholder="Type to Search..."></input>
						<button type="submit" class="input-submit" ><img src="images/search_icon.png"></button>
					</form>
				</div>
				<ul class="navbar-widgets">
					<li class="navbar-widgets-user-account">
						<div class="navbar-widgets-user-account-div">
							<button onclick="window.location.href = 'index.php?page=account'"><img src="images/user.png"></button>
                            <?php if(isset($_SESSION['logged_on_user_name'])){ ?>
							<div id="account-dropdown" class="account-dropdown">
								<a> Welcome Back <?php echo $_SESSION['logged_on_user_name']?>!</a>
								<a href="index.php?page=account">Account</a>
							</div>
                            <?php } else {?>
                            <div id="account-dropdown" class="account-dropdown">
								<a href="index.php?page=signup">Sign Up</a>
								<a href="index.php?page=login">Log In</a>
							</div>
                            <?php }?>
						</div>
					</li>
					<li class="navbar-widgets-liked-items">
						<div class="navbar-widgets-liked-items-div">
							<button onclick="window.location.href = 'index.php?page=liked_items'"><img src="images/like_icon.png"></button>
						</div>
					</li>
					<li class="navbar-widgets-shopping-cart">
						<div class="navbar-widgets-shopping-cart-div">
							<button onclick="window.location.href = 'index.php?page=shopping_cart'"><img src="images/cart.png"></button>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</header>
	<div class="main">
		<div class="main-shrink">
			<div class="breadcrumbs">
				<nav class="breadcrumbs-shrink">
					<ol class="breadcrumb-list">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<span>></span>
							<a>Shopping Cart</a>
						</li>
					</ol>
				</nav>
			</div>
			<div class="shopping-cart-header">
				<div class="shopping-cart-header-shrink">Shopping Cart</div>
				<?php if(isset($product)) {?>
				<div class="shopping-cart-description-shrink">
					<div class="shopping-cart-description-col">Product Image</div>
					<div class="shopping-cart-description-col">Product Name</div>
					<div class="shopping-cart-description-col">Unit Price</div>
					<div class="shopping-cart-description-col">Quantity</div>
					<div class="shopping-cart-description-col">Total Price</div>
					<div class="shopping-cart-description-col"></div>
				</div>
				<?php }?>
			</div>

			<!-- <div class="shopping-cart-checkout">
				<div class="shopping-cart-checkout-shrink">	
				<form name="checkout_form" action="checkout.php" method="post"> -->
				<?php
						// include "dbconnect.php";
						// if (count($_SESSION['cart']) != 0) {
						// 	$totalPrice = 0;
						// 	// Retrieve all products in shopping cart
						// 	for ($i = 0; $i < count($_SESSION['cart']); $i++) {
						// 		$productId = $_SESSION['cart'][$i];
						// 		$query = "SELECT * FROM products WHERE id = ?;";
						// 		$stmt = $db->prepare($query);
						// 		$stmt->bind_param('s', $productId);
						// 		$stmt->execute();
						// 		$result = $stmt->get_result();
						// 		$num_results = $result->num_rows;
						// 		for ($index = 0; $index < $num_results; $index++) {
						// 			$product = $result->fetch_assoc();
						// 			echo "<td>" . $product['name'] . "</td>";
						// 			echo "<td id='price" . $i . "'>$" . $product['price'] . "</td>";
						// 			echo "<td><input type='number' id='quantity" . $i . "' value='1' min='1' max='10' onchange='computeCost()'></input></td>";
						// 			echo "<td>$<span id='subtotal" . $i . "'>" . $product['price'] . "</span></td>";
						// 			echo "<script>console.log('Debug Objects: " . $product['name'] . " products successfully retrieved' );</script>";
						// 			echo "<script>console.log('Debug Objects: " . $product['price'] . " products successfully retrieved' );</script>";
						// 			echo "<script>console.log('Debug Objects: " . $product['quantity'] . " products successfully retrieved' );</script>";
						// 		}
						// 	}
						// 	$result->free();
						// 	$db->close();
						// }
						?>			
					<!-- <button class="checkout-button" onclick="window.location.href = 'index.php?page=checkout'"> Checkout</button>
				</form> -->
				<form name="checkout_form" action="shopping_cart_checkout.php" method="post">
					<table style='margin:auto;'>

						<?php
						include "dbconnect.php";

						if (count($_SESSION['cart']) != 0) {
							$totalPrice = 0;
							// Retrieve all products in shopping cart
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
									$totalPrice += $row['price'];
									echo "<th>Image</th>";
									echo "<th>Name</th>";
									echo "<th>Price</th>";
									echo "<th>Quantity</th>";
									echo "<th>Subtotal</th>";

									echo "<tr>";
									echo "<td>Not Avail</td>";
									echo "<td>" . $row['name'] . "</td>";
									echo "<td id='price" . $i . "'>$" . $row['price'] . "</td>";
									echo "<td><input type='number' id='quantity" . $i . "' value='1' min='1' max='10' onchange='computeCost()'></input></td>";
									echo "<td>$<span id='subtotal" . $i . "'>" . $row['price'] . "</span></td>";
									echo "</tr>";
								}
							}
							echo "<tr>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td>";
							echo "Shipping: $5 <br>";
							$totalPrice += 5;
							echo "Total: $<span id='totalPrice' name ='totalPrice'>" . $totalPrice . " <br></span>";
							echo "<input type='hidden' id='hiddenTP' name='hiddenTP' value=" . $totalPrice . "></input>";
							echo "<input type='submit' value='Check Out' id='checkout_button'>";
							echo "</td>";
							echo "</tr>";
							$result->free();
							$db->close();
						} else
							echo "<p style='text-align:center;'>No items in cart</p>";
						?>
					</table>
				</form>
				</div>
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
							<a class="footer-links" href="index.php?page=contact_us">Contact Us</a>
						</li>
						<li>
							<a class="footer-links" href="index.php?page=faq">FAQ</a>
						</li>
						<li>
							<a class="footer-links" href="index.php?page=track_order">Track Order</a>
						</li>
						<li>
							<a class="footer-links" href="index.php?page=discount">10% Student Discount</a>
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

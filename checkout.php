<?php
session_start();
// Check if user is logged on, else redirect them to login page
if (isset($_SESSION['logged_on_user_name'])) {
    // this echo line affects the header css style so i decided to omit it.
    // echo "<script>console.log('Logged in user: ". $_SESSION['logged_on_user_name'] ."')</script>";
} else
header('Location: login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TrendTrunk Shopping</title>
	<link rel="stylesheet" href="master.css">
	<link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Libre+Baskerville:wght@400;700&family=Merriweather+Sans:ital,wght@1,500;1,800&display=swap" rel="stylesheet">
	<script type="text/javascript" src="master.js"></script>
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
							<a>Checkout</a>
						</li>
					</ol>
				</nav>	
			</div>
			<div class="checkout-header">
				<div class="checkout-header-shrink">Checkout</div>
				<div class="shopping-cart-description-shrink">
					<div class="checkout-description-col">Product Image</div>
					<div class="checkout-description-col">Product Name</div>
					<div class="checkout-description-col">Unit Price</div>
					<div class="checkout-description-col">Quantity</div>
					<div class="checkout-description-col">Total Price</div>
				</div>
			</div>
			<div class="checkout-product">
				<div class="checkout-product-shrink">
					<div class="checkout-product-col"><img src="images/apparels.jpg"></div>
					<div class="checkout-product-col"><p>Charizard Tee</p></div>
					<div class="checkout-product-col"><p>$129.00</p></div>
					<div class="checkout-product-col"><p>$129.00</p></div>
					<div class="checkout-product-col"><p>$129.00</p></div>
				</div>
			</div>
			<div class="checkout-address">
				<div class="checkout-address-shrink">Address</div>
			</div>
			<div class="checkout-address-details">
				<div class="checkout-address-details-shrink">
					<div class="checkout-address-details-row">
						<div class="checkout-address-details-col">Address :</div>
						<div class="checkout-address-details-col"><input class="checkout-address-input" id="checkout-address-add1" placeholder="Address Line 1"></div>
					</div>
					<div class="checkout-address-details-row"><br></div>
					<div class="checkout-address-details-row">
						<div class="checkout-address-details-col"></div>
						<div class="checkout-address-details-col"><input class="checkout-address-input" id="checkout-address-add2" placeholder="Address Line 2"></div>
					</div>
					<div class="checkout-address-details-row"><br></div>
					<div class="checkout-address-details-row">
						<div class="checkout-address-details-col">Mobile Number :</div>
						<div class="checkout-address-details-col"><input class="checkout-address-input" id="checkout-address-mobile" placeholder="+65 (Singapore Registered Number Only)"></div>
					</div>
				</div>
			</div>
			<div class="checkout-payment">
				<div class="checkout-payment-shrink">Payment</div>
			</div>
			<div class="checkout-payment-details">
				<div class="checkout-payment-details-shrink">
					<div class="checkout-payment-details-row">
						<div class="radio">
							<input id="radio-apple" name="radio" type="radio">
							<label for="radio-apple" class="radio-label">Apple Pay</label>
						  </div>
					</div>
					<div class="checkout-payment-details-row">
						<div class="radio">
							<input id="radio-grab" name="radio" type="radio">
							<label for="radio-grab" class="radio-label">Grab Pay</label>
						  </div>
					</div>
					<div class="checkout-payment-details-row"><br></div>
					<div class="checkout-payment-details-row"><br></div>
					<div class="checkout-payment-details-row">Sub-total : </div>
					<div class="checkout-payment-details-row"><br></div>
					<div class="checkout-payment-details-row">Shipping : </div>
					<div class="checkout-payment-details-row"><br></div>
					<div class="checkout-payment-details-row">Grand Total : </div>
					<div class="checkout-payment-details-row"><br></div>
					<div class="checkout-payment-details-row"><br></div>
					<div class="checkout-payment-details-row">
						<button class="pay-button" onclick="window.location.href = 'index.php?page=checkout_comfirm'"> Pay</button>
					</div>
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

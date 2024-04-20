<?php
session_start();
// Check if user is logged on, else redirect them to login page
if (isset($_SESSION['logged_on_user_name'])) {
	// this echo line affects the header css style so i decided to omit it.
    //echo "<script>console.log('Logged in user: ". $_SESSION['logged_on_user_name'] ."')</script>";
}
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}
if (isset($_GET['buy'])) {
	$_SESSION['cart'][] = $_GET['buy'];
	echo "<script>alert('Item has been added to cart');</script>";
	// go back to current page after adding to cart
	header('location: ' . 'product.php?id=' . $_GET['id']);
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
	<?php
	$productId = $_GET['id'];
	// Retrieve all product details with given product id
	include "dbconnect.php";
	$query = "SELECT * FROM products WHERE id = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param('s', $productId);
	$stmt->execute();
	$result = $stmt->get_result();
	$num_results = $result->num_rows;
	for ($index = 0; $index < $num_results; $index++) {
		$product = $result->fetch_assoc();
	}
	$result->free();
	$db->close();
	?>
</head>
<style>
		.addToCart {
			float: center;
			width: 200px;
			height: 50px;
			font-family: Arial, sans-serif;
			background-color: rgb(21, 163, 21);
			color: white;
			font-size: 23px;
			font-weight: bold;
			margin-left: 120px;
			text-decoration:none;
			padding:10px;
		}

		.addToCart:hover {
			cursor: pointer;
			background-color: rgb(4, 115, 4);
		}
	</style>
<body>
	<header>
		<div class="topbar">
			<div class="topbar-shrink">
				<nav>
					<ul class="topbar-widgets">
						<li><a href="index.php?page=faq.html">FAQ</a></li>
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
							<a href="index.php?page=men">Men</a>
						</li>
						<li>
							<span>></span>
							<a href="index.php?page=apparels">Apparel</a>
						</li>
						<li>
							<span>></span>
							<a><?=$product['name']?></a>
						</li>
					</ol>
				</nav>
			</div>
			<div class="product-overall">
				<div class="product-overall-shrink">
					<div class="product_img">
						<a><img src="<?=$product['img']?>"></a>
					</div>
					<div class="product_price">
						<h1><?=$product['name']?></h1>
						<p>Price : $ <?=$product['price']?></p>
						<p>* Note that there will be shipping costs <br> added in checkout. *</p>
						<br>
						<p1>Total : $ <?=$product['price']?></p1>
						<br>
						<br>
						<form action="index.php?page=liked-items" method="post" class="like-button-form">
							<input type="hidden" name="product_id" value="<?=$product['id']?>">
							<button class="product-like-button"><img src="images/like_icon.png"></img></button>
						</form>
						<!-- <form action="index.php?page=shopping_cart" method="post" class="add-to-cart-form">
							<input type="hidden" name="product_id" value="<?=$product['id']?>">
							<button class="product-add-to-cart">Add To Cart</button>
						</form> -->
						<?php
							echo " <a class='addToCart' href='index.php?page=product&id=" . ($_GET['id']) . '&buy=' . ($_GET['id']) . "' >Add to cart</a>";
							?>
							<p>Your shopping cart contains <?php
														echo count($_SESSION['cart']); ?> items.</p>
						<p><a href="shopping_cart.php">View your cart</a></p>
					</div>
				</div>
			</div>
			<div class="product-header">
				<div class="product-header-shrink">Product Description</div>
			</div>
			<div class="product-description">
				<div class="product-description-shrink">
					<?=$product['description']?>
				</div>
			</div>
			<div class="product-header">
				<div class="product-header-shrink">Similar Products</div>
			</div>
			<div class="row">
				<div class="col-5">
					<a href="index.php?page=product"><img src="images/apparels.jpg"></a>
					<h2>Charizard Shirt</h2>
					<p>$129$</p>
				</div>
				<div class="col-5">
					<a href="index.php?page=product"><img src="images/bags.jpg"></a>
					<h2>Charizard Shirt</h2>
					<p>$129$</p>
				</div>
				<div class="col-5">
					<a href="index.php?page=product"><img src="images/Air Jordan 1 Mid Court Purple.webp"></a>
					<h2>Charizard Shirt</h2>
					<p>$129$</p>
				</div>
				<div class="col-5">
					<a href="index.php?page=accessories"><img src="images/accessories.jpg"></a>
					<h2>Charizard Shirt</h2>
					<p>$129$</p>
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

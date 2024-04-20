<?php
session_start();
// Check if user is logged on, else redirect them to login page
if (isset($_SESSION['logged_on_user_name'])) {
    // this echo line affects the header css style so i decided to omit it.
    // echo "<script>console.log('Logged in user: ". $_SESSION['logged_on_user_name'] ."')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TrendTrunk Shopping</title>
	<link rel="stylesheet" href="master.css">
	<link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Libre+Baskerville:wght@400;700&family=Merriweather+Sans:ital,wght@1,500;1,800&display=swap" rel="stylesheet">
	<?php
		@$db = new mysqli('localhost', 'root', '', 'bawl');
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
		echo "<script>console.log('Debug Objects: " . $num_results . " products successfully retrieved' );</script>";
		$result->free();
		// Get the 4 most recently added products
		$query = "SELECT * FROM `products` ORDER BY `date_added` DESC LIMIT 4;";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$num_results_recently = $result->num_rows;
		$recently_added_products = array();
		while ($message = $result->fetch_assoc()) {
			$recently_added_products[] = $message;
		}
		echo "<script>console.log('Debug Objects: " . $num_results_recently . " products successfully retrieved' );</script>";
		$result->free();
		$db->close();
		
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
						<button type="submit" class="input-submit" ><img src="images/search-icon.png"></button>
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
			<div class="row">
				<div class="col-1">
					<img src="images/homepage_cover.jpg">
					<div class="homepage_cover_text">Buy And Worry Later
					</div>
				</div>
			</div>
			<h1 class="homepage_header">Shop By Category</h1>
			<div class="row">
				<div class="col-2">
					<a href="index.php?page=apparels"><img src="images/apparels.jpg"></a>
					<h2>Apparels</h2>
				</div>
				<div class="col-2">
					<a href="index.php?page=bags"><img src="images/bags.jpg"></a>
					<h2>Bags</h2>
				</div>
				<div class="col-2">
					<a href="index.php?page=shoes"><img src="images/Air Jordan 1 Mid Court Purple.webp"></a>
					<h2>Shoes</h2>
				</div>
				<div class="col-2">
					<a href="index.php?page=accessories"><img src="images/accessories.jpg"></a>
					<h2>Accessories</h2>
				</div>
			</div>
			<h1 class="homepage_header">Latest Drops</h1>
			<div class="row">
				<?php for ($x = 0; $x <= $num_results_recently-1; $x++){?>
					<div class="col-3">
						<a href="index.php?page=product&id=<?=$recently_added_products[$x]['id']?>"><img src="<?=$recently_added_products[$x]['img']?>"></a>
						<h2><?=$recently_added_products[$x]['name']?></h2>
						<p>$<?=$recently_added_products[$x]['price']?></p>
					</div>
				<?php }?>  
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

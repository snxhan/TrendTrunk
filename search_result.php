<?php
session_start();
// Check if user is logged on, else redirect them to login page
if (isset($_SESSION['logged_on_user_name'])) {
	// this echo line affects the header css style so i decided to omit it.
    //echo "<script>console.log('Logged in user: ". $_SESSION['logged_on_user_name'] ."')</script>";
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
		@$db = new mysqli('localhost', 'root', '', 'bawl');
		if (mysqli_connect_errno()) {
			echo 'Error: Could not connect to database.  Please try again later.';
			exit;
		}
		$searched_item = $_POST["input-search"];
		//query from SQL the searched item
		$query = "SELECT * FROM `products` WHERE `name` LIKE '%".$searched_item."%'";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$searched_products_results = $result->num_rows;
		$searched_products = array();
		while ($message = $result->fetch_assoc()) {
			$searched_products[] = $message;
		}
		echo "<script>console.log('Debug Objects: " . $searched_products_results . " products successfully retrieved' );</script>";
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
							<a>Search Results</a>
						</li>
					</ol>
				</nav>
			</div>
			<div class="search-result-header">
				<div class="search-result-header-shrink">
					<div class="row">
						<div class="col-11">
							Search Results
						</div>
						<div class="col-11">
							<a><?php if($searched_products_results != 0){echo $searched_products_results;} else{echo "0";} ?> items found.</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<?php for ($x = 0; $x <= $searched_products_results-1; $x++){?>
					<div class="col-4">
						<a href="index.php?page=product&id=<?=$searched_products[$x]['id']?>"><img src="<?=$searched_products[$x]['img']?>"></a>
						<h2><?=$searched_products[$x]['name']?></h2>
						<p>$<?=$searched_products[$x]['price']?></p>
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

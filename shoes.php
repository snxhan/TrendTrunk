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
	<script type="text/javascript" src="master.js"></script>
	<?php
		@$db = new mysqli('localhost', 'root', '', 'bawl');
		if (mysqli_connect_errno()) {
			echo 'Error: Could not connect to database.  Please try again later.';
			exit;
		}
		// Get the filtered products based off the URL
		$sort = "";
		$gender = "";
		$size = "";
		$cat=" AND category='Shoes'";
		if(strpos($_SERVER['REQUEST_URI'] ,'Sort=HTL'))
		{
			$sort=" ORDER BY `price` DESC";
		}
		if(strpos($_SERVER['REQUEST_URI'] ,'Sort=LTH'))
		{
			$sort=" ORDER BY `price` ASC";
		}
		if(strpos($_SERVER['REQUEST_URI'] ,'Sort=Featured'))
		{
			$sort=" ORDER BY `date_added` DESC";
		}
		if(strpos($_SERVER['REQUEST_URI'] ,'Gender=Male'))
		{
			$gender=" AND (gender='men' OR gender='neutral')";
		}
		if(strpos($_SERVER['REQUEST_URI'] ,'Gender=Female'))
		{
			$gender=" AND (gender='women' OR gender='neutral')";
		}
		if(strpos($_SERVER['REQUEST_URI'] ,'Size=S'))
		{
			$size=" AND size='S'";
		}
		if(strpos($_SERVER['REQUEST_URI'] ,'Size=M'))
		{
			$size=" AND size='M";
		}
		if(strpos($_SERVER['REQUEST_URI'] ,'Size=L'))
		{
			$size=" AND size='L'";
		}
		if(strpos($_SERVER['REQUEST_URI'] ,'Size=XL'))
		{
			$size=" AND size='XL'";
		}
		if(strpos($_SERVER['REQUEST_URI'] ,'Cat=Apparel'))
		{
			$cat=" AND category='Apparel'";
		}
		if(strpos($_SERVER['REQUEST_URI'] ,'Cat=Accessories'))
		{
			$cat=" AND category='Accessories'";
		}
		if(strpos($_SERVER['REQUEST_URI'] ,'Cat=Shoes'))
		{
			$cat=" AND category='Shoes'";
		}
		if(strpos($_SERVER['REQUEST_URI'] ,'Cat=Bags'))
		{
			$cat=" AND category='Bags'";
		}
		$query = "SELECT * FROM products WHERE id <> 'NA'".$gender.$size.$cat.$sort;
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$filtered_products_results = $result->num_rows;
		$filtered_products = array();
		while ($message = $result->fetch_assoc()) {
			$filtered_products[] = $message;
		}
		echo "<script>console.log('Debug Objects: " . $filtered_products_results . " products successfully retrieved' <br> 'Debug Objects: " . $query . " products successfully retrieved');</script>";
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
							<a href="index.php?page=home">Home</a>
						</li>
						<li>
							<span>></span>
							<a>Shoes</a>
						</li>
					</ol>
				</nav>
			</div>
			<h1 class="category_header">Shoes</h1>
			<div class="filter">
				<ul class="filter-shrink">
					<li class="filter-box">
						<div>
							<button id="filter-button-sort" class="filter-button">
								Sort
							</button>
							<div id="filter-dropdown-sort" class="filter-dropdown-close">
								<ul>
									<li id="HTL-selection" <?php if(strpos($_SERVER['REQUEST_URI'] ,'Sort=HTL') == true){ echo 'class="filter-selection-clicked"';} else{echo 'class="filter-selection"';} ?>>
										Price High To Low
									</li>
									<li id="LTH-selection" <?php if(strpos($_SERVER['REQUEST_URI'] ,'Sort=LTH') == true){ echo 'class="filter-selection-clicked"';} else{echo 'class="filter-selection"';} ?>>
										Price Low To High
									</li>
									<li id="Feature-selection" <?php if(strpos($_SERVER['REQUEST_URI'] ,'Sort=Featured') == true){ echo 'class="filter-selection-clicked"';} else{echo 'class="filter-selection"';} ?>>
										Featured Products
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li class="filter-box">
						<div>
							<button id="filter-button-gender" class="filter-button">
								Gender
							</button>
							<div id="filter-dropdown-gender" class="filter-dropdown-close">
								<ul>
									<li id="Male-selection" <?php if(strpos($_SERVER['REQUEST_URI'] ,'Gender=Male') == true){ echo 'class="filter-selection-clicked"';} else{echo 'class="filter-selection"';} ?>>
										Male
									</li>
									<li id="Female-selection" <?php if(strpos($_SERVER['REQUEST_URI'] ,'Gender=Female') == true){ echo 'class="filter-selection-clicked"';} else{echo 'class="filter-selection"';} ?>>
									Female
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li class="filter-box">
						<div>
							<button id="filter-button-size" class="filter-button">
								Size
							</button>
							<div id="filter-dropdown-size" class="filter-dropdown-close">
								<ul>
									<li id="S-selection" <?php if(strpos($_SERVER['REQUEST_URI'] ,'Size=S') == true){ echo 'class="filter-selection-clicked"';} else{echo 'class="filter-selection"';} ?>>
										S
									</li>
									<li id="M-selection" <?php if(strpos($_SERVER['REQUEST_URI'] ,'Size=M') == true){ echo 'class="filter-selection-clicked"';} else{echo 'class="filter-selection"';} ?>>
										M
									</li>
									<li id="L-selection" <?php if(strpos($_SERVER['REQUEST_URI'] ,'Size=L') == true){ echo 'class="filter-selection-clicked"';} else{echo 'class="filter-selection"';} ?>>
										L
									</li>
									<li id="XL-selection" <?php if(strpos($_SERVER['REQUEST_URI'] ,'Size=XL') == true){ echo 'class="filter-selection-clicked"';} else{echo 'class="filter-selection"';} ?>>
										XL
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li class="filter-box">
						<div>
							<button id="filter-button-category" class="filter-button">
								Category
							</button>
							<div id="filter-dropdown-category" class="filter-dropdown-close">
								<ul>
									<li id="Apparel-selection" <?php if(strpos($_SERVER['REQUEST_URI'] ,'Cat=Apparel') == true){ echo 'class="filter-selection-clicked"';} else{echo 'class="filter-selection"';} ?>>
										Apparel
									</li>
									<li id="Accessories-selection" <?php if(strpos($_SERVER['REQUEST_URI'] ,'Cat=Accessories') == true){ echo 'class="filter-selection-clicked"';} else{echo 'class="filter-selection"';} ?>>
										Accessories
									</li>
									<li id="Shoes-selection" <?php if(strpos($_SERVER['REQUEST_URI'] ,'Cat=Shoes') == true){ echo 'class="filter-selection-clicked"';} else{echo 'class="filter-selection"';} ?>>
										Shoes
									</li>
									<li id="Bags-selection" <?php if(strpos($_SERVER['REQUEST_URI'] ,'Cat=Bags') == true){ echo 'class="filter-selection-clicked"';} else{echo 'class="filter-selection"';} ?>>
										Bags
									</li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="row">
				<?php for ($x = 0; $x <= $filtered_products_results-1; $x++){?>
					<div class="col-4">
						<a href="index.php?page=product&id=<?=$filtered_products[$x]['id']?>"><img src="<?=$filtered_products[$x]['img']?>"></a>
						<h2><?=$filtered_products[$x]['name']?></h2>
						<p>$<?=$filtered_products[$x]['price']?></p>
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
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
                    <form method="get">
                        <input type="text" class="input-search" placeholder="Type to Search...">
                    </form>
                </div>
                <ul class="navbar-widgets">
                    <li class="navbar-widgets-user-account">
                        <div class="navbar-widgets-user-account-div">
                            <button onclick="window.location.href = 'index.php?page=user_account'"><img
                                    src="images/user.png"></button>
                                    <div id="account-dropdown" class="account-dropdown">
                                        <a href="index.php?page=signup">Sign Up</a>
                                        <a href="index.php?page=login">Log In</a>
                                    </div>
                        </div>
                    </li>
                    <li class="navbar-widgets-liked-items">
                        <div class="navbar-widgets-liked-items-div">
                            <button onclick="window.location.href = 'index.php?page=liked_items'"><img
                                    src="images/like_icon.png"></button>
                        </div>
                    </li>
                    <li class="navbar-widgets-shopping-cart">
                        <div class="navbar-widgets-shopping-cart-div">
                            <button onclick="window.location.href = 'index.php?page=shopping_cart'"><img
                                    src="images/cart.png"></button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
	</header>
	<div class="main">
		<div class="main-shrink">
			<h1 class="homepage_header">Sign Up</h1>
			<div class="row">
				<div class="col-2">
					<?php
					// Check if user is logged on, else redirect them to login page
					session_start();


					include "dbconnect.php";
					$name = $_POST['name'];
					$email = $_POST['email'];
					$password = $_POST['password'];
					// Check if username already exists
					$query = "SELECT `email` FROM `users` WHERE email = ?;";
					$stmt = $db->prepare($query);
					$stmt->bind_param('s', $email);
					$stmt->execute();
					$result = $stmt->get_result();
					$value = $result->fetch_assoc();
					// If query returns any row (username already exists)
					$num_results = $result->num_rows;
					if ($num_results > 0) {
						echo "Error. Email has been used. <br><br> Please use another email. <br><br>";
						echo "<a href='signup.html'>Sign up</a>";
					} else {
						// Prepare Query
						$query = "INSERT INTO users VALUES (?, MD5(?), ?, 'cust');";
						// Querying the Database
						$stmt = $db->prepare($query);
						$stmt->bind_param('sss', $email, $password, $name);
						$stmt->execute();
						// Presenting the Query Results
						if (!$stmt)
							echo "Your query failed.";
						else {
							echo "Sign up successful<br>";
							echo "<a href='login.php'>Login now</a>";
						}
					}
					// Disconnecting from the Database
					$db->close();
					?>
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
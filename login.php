<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TrendTrunk Shopping - Login</title>
    <link rel="stylesheet" href="master.css">
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Libre+Baskerville:wght@400;700&family=Merriweather+Sans:ital,wght@1,500;1,800&display=swap" rel="stylesheet">
    <?php
    session_start();
    // Variables from Login form
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }
    include "dbconnect.php";
    // Prepare Query
    $query = "SELECT * FROM users WHERE email=? AND password = md5(?)";
    // Querying the Database
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    $mdarray = array();
    while ($message = $result->fetch_assoc()) {
        $mdarray[] = $message;
    }
    // Set session variables
    if ($num_results > 0) {
        $_SESSION['logged_on_user_name'] = $mdarray[0]['name'];
        $_SESSION['logged_on_user_type'] = $mdarray[0]["type"];
        $_SESSION['logged_on_user_email'] = $mdarray[0]["email"];
    }
    // Close connection
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
            <h1 class="homepage_header">Login</h1>
                <!-- Notice that form action pass back to this form-->
                <form class="login-form" action="login.php" method="post">
                    <br>
                    <div class="row">
                            <div class="col-7">
                                <label>Email: </label>
                            </div>
                            <div class="col-7">
                                <input type="email" id="email" name="email" required>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-7">
                                <label>Password: </label>
                            </div>
                            <div class="col-7">
                                <input type="password" id="password" name="password" required>
                            </div>
                    </div>
                    <br>
                    <?php
                            // If session already exists go to following page
                            if (isset($_SESSION['logged_on_user_name'])) {
                                if (($_SESSION['logged_on_user_type']) == 'admin')
                                    header("Location: login_admin.php" . '?' . SID);
                                else
                                    header("Location: account.php" . '?' . SID);
                            } else {
                                // If session dont exist 
                                // note that if login is successful, there will be session
                                if (isset($email))
                                    echo "<span style='color:red;'>Invalid password or username.</span><br>";
                            }
                    ?>
                    <div class="row">
                        <input class="login-button" type="submit" value="Login">
                        <a class="signup-button" href="signup.php">Sign up</a>
                    </div>
                </form>
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
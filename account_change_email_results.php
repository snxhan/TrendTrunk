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
    <title>TrendTrunk Shopping - Change Email</title>
    <link rel="stylesheet" href="master.css">
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Libre+Baskerville:wght@400;700&family=Merriweather+Sans:ital,wght@1,500;1,800&display=swap" rel="stylesheet">
    <script>

    </script>
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
                        <div>
                            <button onclick="window.location.href = 'index.php?page=user_account'"><img src="images/user.png"></button>
                        </div>
                    </li>
                    <li class="navbar-widgets-liked-items">
                        <div>
                            <button onclick="window.location.href = 'index.php?page=liked_items'"><img src="images/like_icon.png"></button>
                        </div>
                    </li>
                    <li class="navbar-widgets-shopping-cart">
                        <div>
                            <button onclick="window.location.href = 'index.php?page=shopping_cart'"><img src="images/cart.png"></button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="main">
        <div class="main-shrink">
            <h1 class="homepage_header">Change Email Outcome</h1>
            <div class="row">
                <div class="col-2">
                    <?php
                    // Variables from account_change_email.php form
                    if (isset($_POST['currentEmail'])) {
                        $currentEmail = $_POST['currentEmail'];
                    }
                    if (isset($_POST['newEmail'])) {
                        $newEmail = $_POST['newEmail'];
                    }
                    include 'dbconnect.php';
                    // Check whether supplied email is equals to current logged_on_user_email
                    // Get current user's email through session
                    if (isset($_SESSION['logged_on_user_email'])) {
                        $logged_on_user_email = $_SESSION['logged_on_user_email'];
                        // Check if same
                        if ($logged_on_user_email == $currentEmail) {
                            // Update accordingly  
                            // Prepare Query
                            $query = "UPDATE users SET email= ? WHERE email = ?";
                            // Querying the Database
                            $stmt = $db->prepare($query);
                            $stmt->bind_param('ss', $newEmail, $logged_on_user_email);
                            $stmt->execute();
                            // destroy all session variables - log them out
                            $old_user = isset($_SESSION['logged_on_user_name']);
                            unset($_SESSION['logged_on_user_name']);
                            unset($_SESSION['logged_on_user_type']);
                            unset($_SESSION['logged_on_user_email']);
                            session_destroy();
                            if (!empty($old_user)) {
                                echo "Email change successful.";
                                echo "<br>";
                                echo "You have been logout.";
                                echo "<br>";
                                echo "<a href='login.php'>Login Here</a>";
                            } else {
                                // if they weren't logged in but came to this page somehow
                                echo 'You were not logged in, and so have not been logged out.<br />';
                            }
                            // Close connection
                            $db->close();
                        } else
                            echo "Current email is wrong.";
                    } else {
                        echo "Error. No session exists.";
                    }
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
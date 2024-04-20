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
    <title>TrendTrunk Shopping - Forget Password</title>
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
                <a class="logo" href="index.html">BAWL</a>
                <ul class="navbar-category">
                    <li class="navbar-category-women">
                        <a href="women.html">WOMEN</a>
                    </li>
                    <li class="navbar-category-men">
                        <a href="men.html">MEN</a>
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
                            <button onclick="window.location.href = 'account.php'"><img src="images/user.png"></button>
                        </div>
                    </li>
                    <li class="navbar-widgets-liked-items">
                        <div>
                            <button onclick="window.location.href = 'liked_items.php'"><img src="images/like_icon.png"></button>
                        </div>
                    </li>
                    <li class="navbar-widgets-shopping-cart">
                        <div>
                            <button onclick="window.location.href = 'shopping_cart.php'"><img src="images/cart.png"></button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="main">
        <div class="main-shrink">
            <h1 class="homepage_header">Reset information has been sent to your email.</h1>
            <div class="row">
                <div class="col-2">
                <?php
                // Get current email

                // Generate link to reset password 
                //$email = $_POST['email'];
                $email = "f31ee@localhost";
                $link = "http://localhost:8000/xsoh002/Documents/IE4717-Shopping-Website/ShoppingWebsite/forget_password_change.php?email=" . $email;

                $to = 'f31ee@localhost';
                $subject = 'Reset your password';
                $message = "Click the following link to reset your password. <a href='" . $link . "'>Reset</a>";
                $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To: f32ee@localhost' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

                mail($to, $subject, $message, $headers, '-ff32ee@localhost');
                
                echo ("mail sent to: " . $to);
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
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
        function validateForm() {
            // Run validation again for submission
            if (validateCurrentEmail() && validateCurrentEmail() && checkIfEmailsMatch()) {
                return true;
            } else {
                if (!checkIfEmailsMatch()) {
                    alert('Emails should not be the same.');
                    return false;
                } else
                    return false;
            }
        }

        function checkIfEmailsMatch() {
            var currentEmail = document.getElementById('currentEmail').value;
            var newEmail = document.getElementById('newEmail').value;
            if (currentEmail !== newEmail) {
                return true;
            } else
                return false;
        }

        function validateCurrentEmail() {
            var currentEmail = document.getElementById('currentEmail').value;
            currentEmail.trim();
            if (currentEmail.length > 0) { //make sure it is not empty
                var regexp = /^([\w\.-])+@([\w]+\.){1,3}([A-z]){2,3}$/;
                if (regexp.test(currentEmail)) {
                    document.getElementById('currentEmailConstraint').innerHTML = '';
                    return true;
                } else {
                    document.getElementById('currentEmailConstraint').innerHTML = 'Invalid format. <br> Please follow email example: xxx@email.com <br>';
                    document.getElementById('currentEmailConstraint').style.color = 'red';
                    return false;
                }
            } else {
                document.getElementById('currentEmailConstraint').innerHTML = '';
            }
        }

        function validateNewEmail() {
            var newEmail = document.getElementById('newEmail').value;
            newEmail.trim();
            if (newEmail.length > 0) { //make sure it is not empty
                var regexp = /^([\w\.-])+@([\w]+\.){1,3}([A-z]){2,3}$/;
                if (regexp.test(newEmail)) {
                    document.getElementById('newEmailConstraint').innerHTML = '';
                    return true;
                } else {
                    document.getElementById('newEmailConstraint').innerHTML = 'Invalid format. <br> Please follow email example: xxx@email.com <br>';
                    document.getElementById('newEmailConstraint').style.color = 'red';
                    return false;
                }
            } else {
                document.getElementById('newEmailConstraint').innerHTML = '';
            }
        }
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
            <h1 class="homepage_header">Change Email</h1>
            <form class="account-change-email-form" action="account_change_email_results.php" method="post" onsubmit="return validateForm()">
                <br>
                <div class="row">
                    <div class="col-7">
                        <label>Current Email: </label>
                    </div>
                    <div class="col-7">
                        <input type="email" id="currentEmail" name="currentEmail" onkeyup="validateCurrentEmail()" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                    </div>
                    <div class="col-7">
                    <span id="currentEmailConstraint"></span>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-7">
                    <label>New Email: </label>
                    </div>
                    <div class="col-7">
                    <input type="email" id="newEmail" name="newEmail" onkeyup="validateNewEmail()" required>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-7">
                    </div>
                    <div class="col-7">
                    <span id="newEmailConstraint"></span>
                    </div>
                </div>  
                <br>
                <div class="row">
                    <input class="change-button" type="submit" value="Change">
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
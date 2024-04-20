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
    <title>TrendTrunk Shopping - Change Password</title>
    <link rel="stylesheet" href="master.css">
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Libre+Baskerville:wght@400;700&family=Merriweather+Sans:ital,wght@1,500;1,800&display=swap" rel="stylesheet">
    <script>
        function validateForm() {
            // Run validation again for submission
            if (validatePassword() && validateCurrentAndInputPassword()) {
                return true;
            } else {
                if (validateCurrentAndInputPassword() == false) {
                    alert('Current and new password should not be the same.')
                } else
                    alert('Please fix your errors.');
                return false;
            }
        }

        function validateCurrentAndInputPassword() {
            var current = document.getElementById('currentPassword').value;
            var input = document.getElementById('password').value;

            if (current != input)
                return true;
            else
                return false;
        }

        function validatePassword() {
            // Get values
            var password = document.getElementById('password').value;
            var cpassword = document.getElementById('cpassword').value;
            // Validation
            var checkAlphabets = false;
            var checkNumbers = false;
            var checkSpecialChar = false;
            var checkLength = false;
            var checkMatching = false;
            // PASSWORD CONSTRAINTS
            if (password.length > 0) {
                // alphabets constraint
                var alphabets = /[a-zA-Z]/;
                if (alphabets.test(password)) {
                    document.getElementById('passwordAlphabetConstraint').innerHTML = '';
                    checkAlphabets = true;
                } else {
                    document.getElementById('passwordAlphabetConstraint').innerHTML = 'Password must have at least 1 alphabet.<br>';
                    document.getElementById('passwordAlphabetConstraint').style.color = 'red';
                }
                // numbers constraint
                var numbers = /.*[0-9].*/;
                if (numbers.test(password)) {
                    document.getElementById('passwordNumbersConstraint').innerHTML = '';
                    checkNumbers = true;
                } else {
                    document.getElementById('passwordNumbersConstraint').innerHTML = 'Password must have at least 1 number.<br>';
                    document.getElementById('passwordNumbersConstraint').style.color = 'red';
                }
                // special characters constraint 
                var specialChar = /[#?!@$%^&*-]/;
                if (specialChar.test(password)) {
                    document.getElementById('passwordSpecialCharConstraint').innerHTML = '';
                    checkSpecialChar = true;
                } else {
                    document.getElementById('passwordSpecialCharConstraint').innerHTML = 'Password must contain at least one special char (#?!@$%^&*-).<br>';
                    document.getElementById('passwordSpecialCharConstraint').style.color = 'red';
                }
                // length constraint
                if (password.length >= 6) {
                    document.getElementById('passwordLengthConstraint').innerHTML = '';
                    checkLength = true;
                } else {
                    document.getElementById('passwordLengthConstraint').innerHTML = 'Password must be at least 6 characters long. <br>';
                    document.getElementById('passwordLengthConstraint').style.color = 'red';
                }
            } else {
                // Reset everything if no input
                document.getElementById('passwordAlphabetConstraint').innerHTML = '';
                document.getElementById('passwordNumbersConstraint').innerHTML = '';
                document.getElementById('passwordSpecialCharConstraint').innerHTML = '';
                document.getElementById('passwordLengthConstraint').innerHTML = '';
            }
            // PASSWORD MATCHING
            console.log(password + ' ' + cpassword);
            if (cpassword.length > 0) {
                if (password == cpassword) {
                    document.getElementById('passwordMatch').innerHTML = '';
                    checkMatching = true;
                } else {
                    document.getElementById('passwordMatch').style.color = 'red';
                    document.getElementById('passwordMatch').innerHTML = 'Passwords do not match. <br>';
                }
            } else {
                document.getElementById('passwordMatch').innerHTML = '';
            }
            // RETURN RESULT
            if (checkAlphabets && checkNumbers && checkSpecialChar && checkLength && checkMatching) {
                console.log("TRUE");
                return true;
            } else {
                console.log('FALSE');
                return false;
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
            <h1 class="homepage_header">Change Password</h1>
            <form action="index.php?page=account_change_password_results" method="post" onsubmit="return validateForm()">
                <br>
                <div class="row">
                    <div class="col-7">
                        <label>Current Password: </label>
                    </div>
                    <div class="col-7">
                        <input type="password" id="currentPassword" name="currentPassword" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label>New Password: </label>
                    </div>
                    <div class="col-7">
                        <input type="password" id="password" name="password" onkeyup="validatePassword()" required>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-7">
                    </div>
                    <div class="col-7">

                    <span id="passwordAlphabetConstraint"></span>
                        <span id="passwordNumbersConstraint"></span>
                        <span id="passwordSpecialCharConstraint"></span>
                        <span id="passwordLengthConstraint"></span>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-7">
                        <label>Confirm Password: </label>
                    </div>
                    <div class="col-7">
                        <input type="password" id="cpassword" name="cpassword" onkeyup="validatePassword()" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                    </div>
                    <div class="col-7">
                        <span id="passwordMatch"></span>
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
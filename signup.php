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
    <title>TrendTrunk Shopping - Sign up</title>
    <link rel="stylesheet" href="master.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Libre+Baskerville:wght@400;700&family=Merriweather+Sans:ital,wght@1,500;1,800&display=swap"
        rel="stylesheet">
    <script>
        function validateForm() {
            // Run validation again for submission
            if (validateEmail() && validatePassword() && validateName()) {
                return true;
            }
            else {
                alert('Please fix your errors.');
                return false;
            }
        }
        function validateName() {
            var name = document.getElementById('name').value;
            // Validation
            var checkSpecialChar = false;
            var checkWhiteSpace = false;
            name.trim(); //remove whitespaces from both ends of the string
            if (name.length > 0) { //make sure it is not empty
                var alphabets = /^[a-zA-Z ]*$/;
                if (alphabets.test(name)) {
                    document.getElementById('nameSpecialCharConstraint').innerHTML = '';
                    checkSpecialChar = true;
                } else {
                    document.getElementById('nameSpecialCharConstraint').innerHTML = 'Name should only have alphabets.<br>';
                    document.getElementById('nameSpecialCharConstraint').style.color = 'red';
                }
                var whitespace = /^\S+(?: \S+)*$/;
                if (whitespace.test(name)) {
                    document.getElementById('nameWhiteSpaceConstraint').innerHTML = '';
                    checkWhiteSpace = true;
                } else {
                    document.getElementById('nameWhiteSpaceConstraint').innerHTML = 'Name must be separated by 1 whitespace.<br>';
                    document.getElementById('nameWhiteSpaceConstraint').style.color = 'red';
                }
            } else {
                document.getElementById('nameSpecialCharConstraint').innerHTML = '';
                document.getElementById('nameWhiteSpaceConstraint').innerHTML = '';
            }
            // Return result
            if (checkSpecialChar && checkWhiteSpace) {
                return true;
            } else
                return false;
        }
        function validateEmail() {
            var email = document.getElementById('email').value;
            email.trim();
            if (email.length > 0) { //make sure it is not empty
                var regexp = /^([\w\.-])+@([\w]+\.){1,3}([A-z]){2,3}$/;
                if (regexp.test(email)) {
                    document.getElementById('emailConstraint').innerHTML = '';
                    return true;
                }
                else {
                    document.getElementById('emailConstraint').innerHTML = 'Invalid format. <br> Please follow email example: xxx@email.com <br>';
                    document.getElementById('emailConstraint').style.color = 'red';
                    return false;
                }
            } else {
                document.getElementById('emailConstraint').innerHTML = '';
            }
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
            <form class="signup-form" action="signup_results.php" method="post" onsubmit="return validateForm()">
                <br>
                <div class="row">
                    <div class="col-7">
                        <label>Name: </label>
                    </div>
                    <div class="col-7">
                        <input type="text" id="name" name="name" onkeyup="validateName()" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                    </div>
                    <div class="col-7">
                        <span id="nameWhiteSpaceConstraint"></span>
                        <span id="nameSpecialCharConstraint"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label>Email: </label>
                    </div>
                    <div class="col-7">
                        <input type="email" id="email" name="email" onkeyup="validateEmail()" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                    </div>
                    <div class="col-7">
                        <span id="emailConstraint"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label>Password: </label>
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
                    <input class="signup-comfirm-button" type="submit" value="Sign up">
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
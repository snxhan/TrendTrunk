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
        window.onclick = function(event)
        {
            var dropdown = document.getElementById("faq-dropdown");
            if(event.target.id == "faq-1")
            {
                dropdown.classList.toggle("active");
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
            <h1 class="homepage_header">FAQ</h1>
            <br>
            <br>
            <div class="row">
                <div class="col-10">
                    <a class="faq-1" id="faq-1">How do i make a purchase?</a>
                    <ul class="faq-dropdown" id="faq-dropdown">
                        <li>You must first create an account before being able to cart out your products. Simply add products into your shopping cart by going to the product page and clicking the "Add To Cart" Button.</li>
                    </ul>
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
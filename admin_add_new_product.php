<?php
session_start();
if (isset($_SESSION['logged_on_user_name']) && $_SESSION['logged_on_user_type'] == 'admin') {
    echo "Hi, Admin: ". $_SESSION['logged_on_user_name'] . " ";
    echo "<a href = 'logout.php'>Logout here</a> <br><br>";
    echo "<a href='login_admin.php'>Admin Homepage</a> &nbsp;>&nbsp; Add new product <br><br> ";
    echo "<form action='admin_add_new_product_results.php' method='post'><fieldset>";
    echo " <legend>Add new product:</legend> <br>";
    echo "<label>Product Name:</label>";
    echo "<input type='text' name='productName'></input> <br>";
    echo "<label>Product Category:</label>";
    echo "<select name='productCategory'>";
    echo "<option value='Apparels'>Apparels</option>";
    echo "<option value='Bags'>Bags</option>";
    echo "<option value='Shoes'>Shoes</option>";
    echo "<option value='Accessories'>Accessories</option>";
    echo "</select><br>";
    echo "<label>Product Price:</label>";
    echo "<input type='number' min='0' max='9999' step='1' name='productPrice'></input><br>";
    echo "<input type='submit' value='Add'></input>";
    echo "</fieldset></form>";
} else
    echo "You are not authenticated.";
?>
<?php
session_start();
if (isset($_SESSION['logged_on_user_name']) && $_SESSION['logged_on_user_type'] == 'admin') {
    echo "Hi, Admin: ". $_SESSION['logged_on_user_name'] . " ";
    echo "<a href = 'logout.php'>Logout here</a> <br><br>";
    echo "<b>Admin tools:</b><br>";

    
    echo "<a href = 'admin_add_new_product.php'>Add new product</a> <br>";
    echo "<a href = 'admin_change_product_price.php'>Change product price</a> <br>";
    echo "<a href = 'admin_sales_statistics.php'>Sales statistics</a>";
}else
echo "You are not authenticated.";

?>

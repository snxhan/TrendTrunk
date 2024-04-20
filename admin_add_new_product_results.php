<?php
session_start();
if (isset($_SESSION['logged_on_user_name']) && $_SESSION['logged_on_user_type'] == 'admin') {
    echo "Hi, Admin: " . $_SESSION['logged_on_user_name'] . " ";
    echo "<a href = 'logout.php'>Logout here</a> <br><br>";
    echo "<a href='login_admin.php'>Admin Homepage</a> &nbsp;>&nbsp; <a href='admin_add_new_product.php'>Add new product</a> &nbsp;>&nbsp; Add new product results<br><br> ";

    $newProductName = $_POST['productName'];
    $newProductCategory = $_POST['productCategory'];
    $newProductPrice = $_POST['productPrice'];

    include "dbconnect.php";
    $query = "INSERT INTO products VALUES (null,?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssd', $newProductCategory, $newProductName, $newProductPrice);
    $stmt->execute();
    $db->close();

    echo "Added 1 new product - ". $newProductName;
} else
    echo "You are not authenticated.";

?>
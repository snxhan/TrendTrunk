<?php
session_start();
if (isset($_SESSION['logged_on_user_name']) && $_SESSION['logged_on_user_type'] == 'admin') {
    echo "Hi, Admin: " . $_SESSION['logged_on_user_name'] . " ";
    echo "<a href = 'logout.php'>Logout here</a> <br> <br>";
    echo "<a href='login_admin.php'>Admin Homepage</a> &nbsp;>&nbsp; <a href='admin_change_product_price.php'>Change product price</a> &nbsp;>&nbsp; Change product price results<br><br> ";

    // get total number of products 
    include "dbconnect.php";
    $query = "SELECT * FROM products";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    for ($index = 0; $index < $num_results; $index++) {
        $row = $result->fetch_assoc();
        $name = $_POST['name'. $row['id']];
        $price = $_POST['price'. $row['id']];

        // Update
        $query = "UPDATE products SET price=?  WHERE id = ?;";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ds', $price, $row['id']);
        $stmt->execute();
    }
    echo "Price(s) have successfully been changed!";
    $result->free();
    $db->close();
} else
    echo "You are not authenticated.";

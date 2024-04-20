<?php
session_start();
if (isset($_SESSION['logged_on_user_name']) && $_SESSION['logged_on_user_type'] == 'admin') {
    echo "Hi, Admin: " . $_SESSION['logged_on_user_name'] . " ";
    echo "<a href = 'logout.php'>Logout here</a> <br> <br>";
    echo "<a href='login_admin.php'>Admin Homepage</a> &nbsp;>&nbsp; Change product price <br><br> ";

    include "dbconnect.php";
    $query = "SELECT * FROM products";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    echo "<style>table, td, th {border:1px solid;}</style>";
    echo "<form action='admin_change_product_price_results.php' method='post'><table>";
    echo "<th>Name</th>";
    echo "<th>Category</th>";
    echo "<th>Price</th>";
    for ($index = 0; $index < $num_results; $index++) {
        $row = $result->fetch_assoc();
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td><input type='hidden' name='name" .  $row['id'] . "' value='" .  $row['id'] . "'></input><input type='number' name='price" .  $row['id'] . "' value='" . $row['price'] . "'></input></td>";
        echo "</tr>";
    }
    $result->free();
    $db->close();
    echo "</table><input type='submit' value='Change'></form>";
} else
    echo "You are not authenticated.";

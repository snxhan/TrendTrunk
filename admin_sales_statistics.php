<?php
session_start();
if (isset($_SESSION['logged_on_user_name']) && $_SESSION['logged_on_user_type'] == 'admin') {
    echo "Hi, Admin: " . $_SESSION['logged_on_user_name'] . " ";
    echo "<a href = 'logout.php'>Logout here</a> <br> <br>";
    echo "<a href='login_admin.php'>Admin Homepage</a> &nbsp;>&nbsp; Sales statistics <br><br> ";

    include "dbconnect.php";

    echo "<b> By items: </b>";
    $query = "SELECT products.name, products.category, sales.sales, sales.quantity 
    FROM products 
    INNER JOIN sales
    ON products.id = sales.product_id;";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    echo "<style>table, td, th {border:1px solid;}</style>";
    echo "<table>";
    echo "<th>Name</th>";
    echo "<th>Category</th>";
    echo "<th>Sales</th>";
    echo "<th>Quantity</th>";
    for ($index = 0; $index < $num_results; $index++) {
        $row = $result->fetch_assoc();
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>$" . $row['sales'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<b> Top grossing item: </b>";
    $query = "SELECT products.name FROM products WHERE products.id IN( SELECT sales.product_id FROM sales WHERE sales =( SELECT MAX(sales) FROM sales ) )";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    for ($index = 0; $index < $num_results; $index++) {
        $row = $result->fetch_assoc();
        echo $row['name'];
    }

    echo "<b> Most popular item: </b>";
    $query = "SELECT products.name FROM products WHERE products.id IN( SELECT sales.product_id FROM sales WHERE quantity =( SELECT MAX(quantity) FROM sales ) );";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    for ($index = 0; $index < $num_results; $index++) {
        $row = $result->fetch_assoc();
        echo $row['name'];
    }

    echo "<br><br>";

    echo "<b> By category: </b>";
    $query = "SELECT products.category, sum(sales.sales), sum(sales.quantity) FROM products INNER JOIN sales ON products.id = sales.product_id GROUP BY products.category;";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    echo "<style>table, td, th {border:1px solid;}</style>";
    echo "<table>";
    echo "<th>Category</th>";
    echo "<th>Sales</th>";
    echo "<th>Quantity</th>";
    for ($index = 0; $index < $num_results; $index++) {
        $row = $result->fetch_assoc();
        echo "<tr>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>$" . $row['sum(sales.sales)'] . "</td>";
        echo "<td>" . $row['sum(sales.quantity)'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<b> Top grossing category: </b>";
    $query = "SELECT products.category FROM products WHERE products.id IN( SELECT sales.product_id FROM sales WHERE sales =( SELECT MAX(sales) FROM sales ) );";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    for ($index = 0; $index < $num_results; $index++) {
        $row = $result->fetch_assoc();
        echo $row['category'];
    }

    echo "<b> Most popular category: </b>";
    $query = "SELECT products.category FROM products WHERE products.id IN( SELECT sales.product_id FROM sales WHERE quantity =( SELECT MAX(quantity) FROM sales ) );";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    for ($index = 0; $index < $num_results; $index++) {
        $row = $result->fetch_assoc();
        echo $row['category'];
    }

    $result->free();
    $db->close();

} else
    echo "You are not authenticated.";

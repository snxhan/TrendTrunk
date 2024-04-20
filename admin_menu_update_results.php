<?php


// Create connection
@$db = new mysqli('localhost', 'root', '', 'javajam');
if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
}


// Prepared statement
$affectedRowCounter = 0;

// Checking if product prices are changed in the previous page and update the database accordingly
if(isset($_GET['Java_Price']))
{
    $Java_Price = $_GET['Java_Price'];
    $query = "UPDATE products SET price = ? WHERE id = 1;";
    $stmt = $db->prepare($query);
    $stmt->bind_param('d', $Java_Price);
    $stmt->execute();
    $affectedRowCounter = $affectedRowCounter + $stmt->affected_rows;
}
if(isset($_GET['Cafe_Single_Price']))
{
    $Cafe_Single_Price = $_GET['Cafe_Single_Price'];
    $query = "UPDATE products SET price = ? WHERE id = 2;";
    $stmt = $db->prepare($query);
    $stmt->bind_param('d', $Cafe_Single_Price);
    $stmt->execute();
    $affectedRowCounter = $affectedRowCounter + $stmt->affected_rows;
    
}
if(isset($_GET['Cafe_Double_Price']))
{
    $Cafe_Single_Price = $_GET['Cafe_Double_Price'];
    $query = "UPDATE products SET price = ? WHERE id = 3;";
    $stmt = $db->prepare($query);
    $stmt->bind_param('d', $Cafe_Single_Price);
    $stmt->execute();
    $affectedRowCounter = $affectedRowCounter + $stmt->affected_rows;
}
if(isset($_GET['Cap_Single_Price']))
{
    $Cap_Single_Price = $_GET['Cap_Single_Price'];
    $query = "UPDATE products SET price = ? WHERE id = 4;";
    $stmt = $db->prepare($query);
    $stmt->bind_param('d', $Cap_Single_Price);
    $stmt->execute();
    $affectedRowCounter = $affectedRowCounter + $stmt->affected_rows;
}
if(isset($_GET['Cap_Double_Price']))
{
    $Cap_Double_Price = $_GET['Cap_Double_Price'];
    $query = "UPDATE products SET price = ? WHERE id = 5;";
    $stmt = $db->prepare($query);
    $stmt->bind_param('d', $Cap_Double_Price);
    $stmt->execute();
    $affectedRowCounter = $affectedRowCounter + $stmt->affected_rows;
}


if($affectedRowCounter == 0){
    echo "No changes has been made to input, product prices remain the same!";
    echo "<br><a href='admin_menu.php'>Go back to Admin Menu Page</a>";
}
else{
    // $stmt will be TRUE if insertion is successful
    if ($stmt) {
        echo $affectedRowCounter ." menu price(s) have been successfully updated!";
        echo "<br><a href='admin_menu.php'>Go back to Admin Menu Page</a>";
    die();
    } else {
        echo "An error has occurred.  The price was not updated.";
        echo "<br><a href='admin_menu.php'>Go back to Admin Menu Page</a>";
    }
}
// Close connection
$db->close();
?>
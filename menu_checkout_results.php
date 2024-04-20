
<h1>Checkout Summary</h1>
<?php
  // create short variable names
  $jjC = $_POST['itemButton_JustJava'];
  $jjQ = $_POST['JustJavaQty'];
  $calC = $_POST['itemButton_Cafe'];
  $calQ = $_POST['CafeQty'];
  $icC = $_POST['itemButton_Cappuccino'];
  $icQ = $_POST['CappuccinoQty'];

  // Get latest pricing
  @$db = new mysqli('localhost', 'root', '', 'javajam');
  if (mysqli_connect_errno()) {
      echo 'Error: Could not connect to database.  Please try again later.';
      exit;
  }
  //this echos is to check whether the form passing is correct
  //echo $jjC." itemButton_JustJava<br />";
  //echo $jjQ." JustJavaQty<br />";
  //echo $calC." itemButton_Cafe<br />";
  //echo $calQ." CafeQty<br />";
  //echo $icC." itemButton_Cappuccino<br />";
  //echo $icQ." CappuccinoQty<br />";
  if($jjQ == 0 and $calQ == 0 and $icQ == 0) 
  {
    echo "You selected no products for checkout! <br />";
  }

  $query = "SELECT * FROM `products`;";
  $stmt = $db->prepare($query);
  $stmt->execute();
  $result = $stmt->get_result();
  $num_results = $result->num_rows;
  $mdarray = array();
  while ($message = $result->fetch_assoc()) {
      $mdarray[] = $message;
  }
  echo "<script>console.log('Debug Objects: " . $num_results . " items retrieved' );</script>";
  $result->free();
  $db->close();

  $jjNullCost = $mdarray[0]["price"];
  $calSingleCost = $mdarray[1]["price"];
  $calDoubleCost = $mdarray[2]["price"];
  $icSingleCost = $mdarray[3]["price"];
  $icDoubleCost = $mdarray[4]["price"];

  function getCurrentRevenue($id)
  {
      //id is product_id
      // Connect db...
      @$db = new mysqli('localhost', 'root', '', 'javajam');
      if (mysqli_connect_errno()) {
          echo "Error: Could not connect to database.  Please try again later.";
          exit;
      }
      $query = "SELECT revenue FROM sales WHERE product_id = ?;";
      $stmt = $db->prepare($query);
      $stmt->bind_param('d', $id);
      $stmt->execute();
      //get value
      $result = $stmt->get_result();
      $value = $result->fetch_object();
      $db->close();
      echo $value;
      return $value;
  }
  
  // Do a mass update for all
  if ($jjQ > 0) {
      $product_id = 1;
      $revenue = $jjQ * $jjNullCost;
      $quantity = $jjQ;
      // Connect db...
      @$db = new mysqli('localhost', 'root', '', 'javajam');
      if (mysqli_connect_errno()) {
          echo "Error: Could not connect to database.  Please try again later.";
          exit;
      }
      // Get current values first before updating
      $query = "SELECT revenue, quantity FROM sales WHERE product_id = ?;";
      $stmt = $db->prepare($query);
      $stmt->bind_param('d', $product_id);
      $stmt->execute();
      // Assignment of current values
      $result = $stmt->get_result();
      $value = $result->fetch_assoc();
      $currentRevenue = $value["revenue"];
      $currentQuantity = $value["quantity"];
      // Updating of values
      $newRevenue = $currentRevenue + $revenue;
      $newQuantity = $currentQuantity + $quantity;
      // Update db
      $query = "UPDATE sales SET revenue = ?, quantity = ? WHERE product_id = ?;";
      $stmt = $db->prepare($query);
      $stmt->bind_param('ddd', $newRevenue, $newQuantity, $product_id);
      $stmt->execute();
      // Close connection
      $db->close();
      //Present results
      echo "You have successfully bought " . $quantity . " cup(s) of Java Jam. <br>";
  }
  if ($calQ > 0) {
      switch ($calC) {
          case "0":
              $product_id = 2;
              $revenue = $calQ * $calSingleCost;
              $quantity = $calQ;
              // Connect db...
              @$db = new mysqli('localhost', 'root', '', 'javajam');
              if (mysqli_connect_errno()) {
                  echo "Error: Could not connect to database.  Please try again later.";
                  exit;
              }
              // Get current values first before updating
              $query = "SELECT revenue, quantity FROM sales WHERE product_id = ?;";
              $stmt = $db->prepare($query);
              $stmt->bind_param('d', $product_id);
              $stmt->execute();
              // Assignment of current values
              $result = $stmt->get_result();
              $value = $result->fetch_assoc();
              $currentRevenue = $value["revenue"];
              $currentQuantity = $value["quantity"];
              // Updating of values
              $newRevenue = $currentRevenue + $revenue;
              $newQuantity = $currentQuantity + $quantity;
              // Update db
              $query = "UPDATE sales SET revenue = ?, quantity = ? WHERE product_id = ?;";
              $stmt = $db->prepare($query);
              $stmt->bind_param('ddd', $newRevenue, $newQuantity, $product_id);
              $stmt->execute();
              // Close connection
              $db->close();
              //Present results
              echo "You have successfully bought " . $quantity . " cup(s) of Cafe au Lait with single shot.<br>";
              break;
          case "1":
              $product_id = 3;
              $revenue = $calQ * $calDoubleCost;
              $quantity = $calQ;
              // Connect db...
              @$db = new mysqli('localhost', 'root', '', 'javajam');
              if (mysqli_connect_errno()) {
                  echo "Error: Could not connect to database.  Please try again later.";
                  exit;
              }
              // Get current values first before updating
              $query = "SELECT revenue, quantity FROM sales WHERE product_id = ?;";
              $stmt = $db->prepare($query);
              $stmt->bind_param('d', $product_id);
              $stmt->execute();
              // Assignment of current values
              $result = $stmt->get_result();
              $value = $result->fetch_assoc();
              $currentRevenue = $value["revenue"];
              $currentQuantity = $value["quantity"];
              // Updating of values
              $newRevenue = $currentRevenue + $revenue;
              $newQuantity = $currentQuantity + $quantity;
              // Update db
              $query = "UPDATE sales SET revenue = ?, quantity = ? WHERE product_id = ?;";
              $stmt = $db->prepare($query);
              $stmt->bind_param('ddd', $newRevenue, $newQuantity, $product_id);
              $stmt->execute();
              // Close connection
              $db->close();
              //Present results
              echo "You have successfully bought " . $quantity . " cup(s) of Cafe au Lait with double shot.<br>";
              break;
      }
  }
  if ($icQ > 0) {
      switch ($icC) {
          case "0":
              $product_id = 4;
              $revenue = $icQ * $icSingleCost;
              $quantity = $icQ;
              // Connect db...
              @$db = new mysqli('localhost', 'root', '', 'javajam');
              if (mysqli_connect_errno()) {
                  echo "Error: Could not connect to database.  Please try again later.";
                  exit;
              }
              // Get current values first before updating
              $query = "SELECT revenue, quantity FROM sales WHERE product_id = ?;";
              $stmt = $db->prepare($query);
              $stmt->bind_param('d', $product_id);
              $stmt->execute();
              // Assignment of current values
              $result = $stmt->get_result();
              $value = $result->fetch_assoc();
              $currentRevenue = $value["revenue"];
              $currentQuantity = $value["quantity"];
              // Updating of values
              $newRevenue = $currentRevenue + $revenue;
              $newQuantity = $currentQuantity + $quantity;
              // Update db
              $query = "UPDATE sales SET revenue = ?, quantity = ? WHERE product_id = ?;";
              $stmt = $db->prepare($query);
              $stmt->bind_param('ddd', $newRevenue, $newQuantity, $product_id);
              $stmt->execute();
              // Close connection
              $db->close();
              //Present results
              echo "You have successfully bought " . $quantity . " cup(s) of Iced Cappucino with single shot.<br>";
              break;
          case "1":
              $product_id = 5;
              $revenue = $icQ * $icDoubleCost;
              $quantity = $icQ;
              // Connect db...
              @$db = new mysqli('localhost', 'root', '', 'javajam');
              if (mysqli_connect_errno()) {
                  echo "Error: Could not connect to database.  Please try again later.";
                  exit;
              }
              // Get current values first before updating
              $query = "SELECT revenue, quantity FROM sales WHERE product_id = ?;";
              $stmt = $db->prepare($query);
              $stmt->bind_param('d', $product_id);
              $stmt->execute();
              // Assignment of current values
              $result = $stmt->get_result();
              $value = $result->fetch_assoc();
              $currentRevenue = $value["revenue"];
              $currentQuantity = $value["quantity"];
              // Updating of values
              $newRevenue = $currentRevenue + $revenue;
              $newQuantity = $currentQuantity + $quantity;
              // Update db
              $query = "UPDATE sales SET revenue = ?, quantity = ? WHERE product_id = ?;";
              $stmt = $db->prepare($query);
              $stmt->bind_param('ddd', $newRevenue, $newQuantity, $product_id);
              $stmt->execute();
              // Close connection
              $db->close();
              //Present results
              echo "You have successfully bought " . $quantity . " cup(s) of Iced Cappucino with double shot.<br>";
              break;
      }
  }
  
  echo "<br><a href='menu.php'>Go back to Menu Page</a>";
?>

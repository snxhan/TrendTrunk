


<!DOCTYPE html>
<html lang="en">
<head>
  <title>JavaJam Coffee House - Menu</title>
  <meta charset="utf-8">
  <?php
          // Create connection
          @$db = new mysqli('localhost', 'root', '', 'javajam');
          if (mysqli_connect_errno()) {
              echo "Error: Could not connect to database.  Please try again later.";
              exit;
          }

          // Prepared statement

          $query = "UPDATE sales SET revenue=null, quantity=null;";
          $stmt = $db->prepare($query);
          $stmt->execute();

          // Close connection
          $db->close();
        ?>
  <link rel="stylesheet" href="master.css">
</head>
<body>
	<header>
	  <img src="javajamlogo.png" alt="javajamlogo">
	</header>
	<div class="wrapper">
		<nav>
			<ul>
				<li><a href="login_admin.php">Admin Page</a></li>
			</ul>
		</nav>
		<div class="content">
      <h1>Reset Sales Result</h1>
      <div class="inner-content">
        <p style="margin-left:30px">
          <?php
            // $stmt will be TRUE if insertion is successful
            if ($stmt) {
              echo "Daily sales figure have been successfully reset! <br>";
              echo "<br><a href='login_admin.php'>Go back to Admin Page</a>";
              //die();
            } 
            else {
              echo "An error has occurred.  The figures was not reset.";
            }
          ?>
        </p>
      </div>
		</div>
	</div>
	<footer>
		<form id = "myFooterForm" action = "">
			<tr>
				<td><br>Copyright &copy; 2014 JavaJam Coffee House<br>
					<a href="mailto:test@gmail.com">Jseeto001@ntu.edu.sg</a>
				</td>
			</tr>
		</form>
	</footer>
</body>
<html>


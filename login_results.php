
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JavaJam Coffee House Home - Sign Up</title>
    <link rel="stylesheet" href="master.css">
</head>

<body>
    <header>
        <a href="index.html">
            <img src="javajamlogo.png" alt="javajamlogo">
        </a>
    </header>
    <div class="wrapper">
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="music.html">Music</a></li>
                <li><a href="jobs.html">Jobs</a></li>
            </ul>
        </nav>
        <div class="content">
            <h1>User Sign Up</h1>
            <div class="inner-content">
				<?php
					// SESSION
					session_start();
					// Variables from Login form
					$username = $_POST['username'];
					$password = $_POST["password"];
					// Set up Connection
					@$db = new mysqli('localhost', 'root', '', 'javajam');
					if (mysqli_connect_errno()) {
						echo 'Error: Could not connect to database.  Please try again later.';
						exit;
					}


					// Prepare Query
					$query = "SELECT 1 FROM users WHERE username=? AND password = md5(?)";
					// Querying the Database
					$stmt = $db->prepare($query);
					$stmt->bind_param('ss', $username, $password);
					$stmt->execute();
					$result = $stmt->get_result();
					$num_results = $result->num_rows;
					// Presenting the Query Results
					if ($num_results > 0) {
						// SESSION 
						$_SESSION['valid_user'] = $username;
						echo 'login success! <br>';
						echo "<a href='login_admin.php'>Click here to go to admin page</a>";
					} else {
						echo 'Username does not exist or password is wrong. Please try again <br>';
						echo "<a href='login.php'>Return to login page</a>";
					}
					$db->close();
				?>

            </div>
        </div>
    </div>
    <footer><br>Copyright &copy; 2014 JavaJam Coffee House<br>
        <a href="mailto:test@gmail.com">Jseeto001@ntu.edu.sg</a>
    </footer>
</body>

</html>
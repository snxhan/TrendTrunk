<?php
	// Page is set to home (home.php) by default, so when the visitor visits that will be the page they see.
    // If page does noe exist then the page will be redirected to home.
	$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
	// Include and show the requested page
	include $page . '.php';
?>
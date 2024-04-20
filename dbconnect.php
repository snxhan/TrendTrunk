<?php
@$db = new mysqli('localhost','root','','bawl');
// @ to ignore error message display //
if ($db->connect_error){
	echo "Database is not online"; 
	exit;
	// above 2 statments same as die() //
	}
/*	else
	echo "Congratulations...  MySql is working..";
*/
if (!$db->select_db ("bawl"))
	exit("<p>Unable to locate the bawl database</p>");
?>	
<?php ob_start();

$host = "localhost"; // MySQL Host
$username = "root"; // MySQL Username
$password = "root"; // MySQL Password
$database = "bulletwar"; // Database name

$db = mysql_connect($host, $username, $password) or die("Error trying to connect to the database n* 1");
mysql_select_db($database, $db) or die("Error trying to connect to the database n* 2");

if(isset($_COOKIE['wrshop_username']) && isset($_COOKIE['wrshop_sessionid']))
{
	$username = $_COOKIE['wrshop_username'];
	$query = mysql_query("SELECT * FROM users WHERE username='$username'");
	$row = mysql_fetch_array($query);
	if($row['websession'] != $_COOKIE['wrshop_sessionid'])
	{
		setcookie("wrshop_username", "", time() - 1);
		setcookie("wrshop_sessionid", "", time() - 1);
		echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=login">';
	}
}
			
?>



<?php ob_start();

	if(isset($_COOKIE['wrshop_username']) && isset($_COOKIE['wrshop_sessionid']))
	{
		setcookie("wrshop_username", "", time() - 3600);
		setcookie("wrshop_sessionid", "", time() - 3600);
		echo '<title>BulletWar - Logout</title><META HTTP-EQUIV="refresh" CONTENT="0;URL=index">';
		return;
	}
	else
	{
		echo '<title>BulletWar - Logout</title><META HTTP-EQUIV="refresh" CONTENT="0;URL=login">';
	}
?>
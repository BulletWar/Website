<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/lightbox-2.6.min.js"></script>
<link href="css/lightbox.css" rel="stylesheet" />
<div id="top">
    <div class="top-wrapper">
        <a href="index" title=""><img src="images/logo.png" class="logo" alt="" /></a>
        <ul class="topnav">
			<?php
		
			include("connect.php");
		
			$nickname = "Login";
			$loginurl = 'login';
			$loggedin = false;
			
			if(isset($_COOKIE['wrshop_username']) && isset($_COOKIE['wrshop_sessionid']))
			{
				$username = $_COOKIE['wrshop_username'];
				$userquery = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='$username'"));
				$nickname = $userquery['nickname'];
				if($nickname == '')
					$nickname = "Unknown";
				$loginurl = "#";
				$loggedin = true;
			}
			
			echo '<li class="topuser">
                <a title="" href="'.$loginurl.'" data-toggle="dropdown"><span>'.$nickname.'</span></a>
            </li>';
			if($loggedin)
			{
				echo '<!--<li><a href="#" title=""><b class="settings"></b></a></li>-->
				<li class="sidebar-button"><a href="#" title=""><b class="responsive-nav"></b></a></li>
				<li><a href="logout" title=""><b class="logout"></b></a></li>';
			}
			else
			{
			echo '<li class="topuser">
                <a title="" href="register" data-toggle="dropdown"><span>Register</span></a>
            </li>';
			}
			?>
        </ul>
    </div>
</div>
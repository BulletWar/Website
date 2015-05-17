    <div class="sidebar" id="left-sidebar">
        <ul class="navigation standard"><!-- standard nav -->
            <li><a href="#" title="" class="expand"><img src="images/icons/mainnav/form-elements.png" alt="" />Menu</a>
                <ul>
			<?php
		
			include("connect.php");
			
			$loggedin = false;
			
			if(isset($_COOKIE['wrshop_username']) && isset($_COOKIE['wrshop_sessionid']))
			{
				$loggedin = true;
			}
			
            echo '<li><a href="index" title="">Home</a></li>';
			
			if($loggedin)
			{
				$username = $_COOKIE['wrshop_username'];
				$query = mysql_query("SELECT * FROM users WHERE username='$username'");
				$fetch = mysql_fetch_array($query);
				echo '<li><a href="shop" title="">Shop</a></li>';
			}
			else
			{
				echo '<li class="topuser">
					<a title="" href="login" data-toggle="dropdown"><span>Login</span></a></li>
					<li><a href="register" title="">Register</a></li>';
			}
			
			echo '	<li><a href="download" title="">Download</a></li>
					<li><a href="top" title="">Top 100</a></li>
					<li><a href="http://forum.worgin.com/" title="">Forum</a></li>';
			
			?>
                </ul>
            </li>
        </ul><!-- /standard nav -->
    </div>
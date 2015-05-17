
			<?php
							
				$onlineusers = mysql_num_rows(mysql_query("SELECT * FROM users WHERE online='1'"));
				$users = mysql_num_rows(mysql_query("SELECT * FROM users"));
				$bannedusers = mysql_num_rows(mysql_query("SELECT * FROM users WHERE rank='0'"));
				
				echo '<li>
                    <div class="left">Users: <h1>'.$users.'</h1></div><br>
                    <div class="topchart" id="balance"></div>
                </li>
                <li>
                    <div class="left">Online Users: <h1>'.$onlineusers.'</h1></div><br>
                    <div class="topchart" id="balance"></div>
                </li>
                <li>
                    <div class="left">Banned Users: <h1>'.$bannedusers.'</h1></div><br>
                    <div class="topchart" id="balance"></div>
                </li>';
			?>
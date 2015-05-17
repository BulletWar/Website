<?php ob_start(); 

if(!isset($_COOKIE['wrshop_username']) || !isset($_COOKIE['wrshop_sessionid']))
{
	echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=login">';
}

?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from demo.kopyov.com/amsterdam/1/ by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 18 Oct 2013 17:14:13 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<!--[if IE]> <link href="css/ie.css" rel="stylesheet" type="text/css"> <![endif]-->

<script type="text/javascript" src="../../../ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery_ui_custom.js"></script>

<script type="text/javascript" src="js/plugins/charts/excanvas.min.js"></script>
<script type="text/javascript" src="js/plugins/charts/jquery.flot.js"></script>
<script type="text/javascript" src="js/plugins/charts/jquery.flot.resize.js"></script>
<script type="text/javascript" src="js/plugins/charts/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="js/plugins/forms/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.inputlimiter.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.autosize.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.ibutton.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.dualListBox.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.validate.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.select2.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.cleditor.js"></script>

<script type="text/javascript" src="js/plugins/uploader/plupload.js"></script>
<script type="text/javascript" src="js/plugins/uploader/plupload.html4.js"></script>
<script type="text/javascript" src="js/plugins/uploader/plupload.html5.js"></script>
<script type="text/javascript" src="js/plugins/uploader/jquery.plupload.queue.js"></script>

<script type="text/javascript" src="js/plugins/wizard/jquery.form.wizard.js"></script>
<script type="text/javascript" src="js/plugins/wizard/jquery.form.js"></script>

<script type="text/javascript" src="js/plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.timepicker.min.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.jgrowl.min.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.pie.chart.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.fullcalendar.min.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.elfinder.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.fancybox.js"></script>

<script type="text/javascript" src="js/plugins/tables/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-bootbox.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-progressbar.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-colorpicker.js"></script>

<script type="text/javascript" src="js/functions/custom.js"></script>
<script type="text/javascript" src="js/charts/chart.js"></script>

</head>

<body>

<!-- Top nav -->
<?php include("inc/menu.php"); ?>
<!-- /top nav -->

<!-- Main wrapper -->
<div class="wrapper three-columns">

	<!-- Left sidebar -->
	<?php include("inc/sidebar.php"); ?>
    <!-- /left sidebar -->
    
    <!-- Main content -->
    <div class="content">
		
        <!-- Info notice -->
        <!-- /info notice -->
    
    	<div class="outer">
        	<div class="inner">
			
                <div class="page-header"><!-- Page header -->
                    <h5><i class="font-home"></i>Shop</h5>
                    <ul class="icons">
                        <li><a href="index" class="hovertip" title="Reload data"><i class="font-refresh"></i></a></li>
                    </ul>
                </div>
				
				
				<!-- /page header -->
                <div class="body">
                	
					<?php
					
					include("inc/connect.php");
					
					$uquery = mysql_query("SELECT * FROM users WHERE username='".$_COOKIE['wrshop_username']."'");
					
					if(mysql_num_rows($uquery) > 0)
					{
							$row = mysql_fetch_array($uquery);
							
							$uid = $row['id'];
							
							if($row['online'] > 0)
							{
								echo '<div class="inner"><div class="note note-error"> <strong>Error!</strong> You have to log out from the game! </div></div>';
							}
							else
							{
								$boughtitem = false;
								
								$usercash = $row['cash'];
								
									if(isset($_POST['buy_premium_gold']))
									{
										if($usercash - 8000 >= 0)
										{
											$boughtitem = true;
											$days = 86400 * $_POST['premium_days'];
											if($row['premium'] == 3)
												$time = $row['premiumExpire'] + $days;
											else
												$time = time() + $days;
											
											mysql_query("UPDATE users SET premium='3', premiumExpire='$time', cash=cash-8000 WHERE id='$uid'");
										}
									}
									else if(isset($_POST['buy_premium_silver']))
									{
										if($usercash - 6000 >= 50)
										{
											$boughtitem = true;
											$days = 86400 * $_POST['premium_days'];
											if($row['premium'] == 3)
												$time = $row['premiumExpire'] + $days;
											else
												$time = time() + $days;
											
											mysql_query("UPDATE users SET premium='2', premiumExpire='$time', cash=cash-6000 WHERE id='$uid'");
										}
									}
									
								
							
									echo '<center><div class="container">
										<title>LegendWar - Shop</title>
										<!-- Line chart -->
										<form method="post">
										';
										
										if($boughtitem == true)
										{
											echo '<div class="inner"><div class="note note-success"> <strong>Success!</strong> Successfully bought that item!! </div></div>';
										}
										
										echo '
											<div class="navbar">
											
												<form method="POST">Premium Gold -
													<select name="premium_days">
														<option value="30">30 Days (7500 Cash)</option>
													</select>
													<button name="buy_premium_gold" class="btn"><b class="icon-shopping-cart"></b> Buy</button>
												</form>
												
												</br>
												
												<form method="POST">Premium Silver -
													<select name="premium_days">
														<option value="30">30 Days (5000 Cash)</option>
													</select>
													<button name="buy_premium_silver" class="btn"><b class="icon-shopping-cart"></b> Buy</button>
												</form>
										</form>
								</div></center>';
							}
						}
								
						?>
						
                </div>
            </div>
        </div>
    </div>
    <!-- /main content -->

    <!-- Right sidebar -->
<div class="sidebar" id="right-sidebar">
        <div class="appendable">
        
            <!-- Sidebar stats -->            
			<ul class="topstats block">
			<?php
			
			include("inc/itemstatus.php");
			
			?>
            </ul>
                                
        </div>
    </div>
    <!-- /right sidebar -->
    
</div>
<!-- /main wrapper -->

</body>

<!-- Mirrored from demo.kopyov.com/amsterdam/1/ by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 18 Oct 2013 17:15:32 GMT -->
</html>

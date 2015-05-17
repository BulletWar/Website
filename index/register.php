<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.kopyov.com/amsterdam/1/ by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 18 Oct 2013 17:14:13 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>AW-Beta 3.0 - Register</title>
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
    
                	
					<?php
					
					include("inc/connect.php");
								
					if(isset($_COOKIE['wrshop_username']) && isset($_COOKIE['wrshop_sessionid']))
					{
						echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=index">';
					}
					function randomsalt($lunghezza2=5)
					{
						$caratteri_disponibili2 ="1234567890abcdefghijklmnopqrstuvwxyz";
						//$caratteri_disponibili ="abcdefghijklmnopqrstuvwxyz";
						$refer2 = "";
						for($i = 0; $i<$lunghezza2; $i++){
							$refer2 = $refer2.substr($caratteri_disponibili2,rand(0,strlen($caratteri_disponibili2)-1),1);
						}
						return $refer2;
					}
								
					if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))
					{
						$username = $_POST['username'];
						$password = $_POST['password'];
						$email = $_POST['email'];

						$query = mysql_query("SELECT * FROM users WHERE username='$username'");
						$count = mysql_num_rows($query);
						$equery = mysql_query("SELECT * FROM users WHERE email='$email'");
						$ecount = mysql_num_rows($equery);
						
						if($count == 0 && $ecount == 0)
						{
							if(strpos($email, '@') == false)
							{
								echo '<div class="notice outer">
									<div class="note note-danger">
										<button type="button" class="close">×</button>
										<strong>ERROR!</strong> Please insert a valid email.
									</div>
								</div>';
							}
							else
							{
								$salt = randomsalt();
								$password = strip_tags($_POST['password']);
								mysql_query("INSERT INTO users (username,password,salt,email,premium,dinar,exp,kills,deaths,premiumExpire,cash) VALUES ('$username','$password','$salt','$email',3,32500,0,0,0,1388873444,'76000')") or die(mysql_error());
									echo '<div class="notice outer">
										<div class="note note-success">
											<button type="button" class="close">×</button>
											<strong>SUCCESS!</strong> Your account has been registered! You will be redirected to login page in a few seconds.
										</div>
									</div>';
									echo '<META HTTP-EQUIV="refresh" CONTENT="3;URL=login">';
							}
						}
						else
						{
							echo '<div class="notice outer">
								<div class="note note-danger">
									<button type="button" class="close">×</button>
									<strong>ERROR!</strong> This username / email is already in our database.
								</div>
							</div>';
						}
						
					}					
								
								echo '<div class="outer">
								<div class="inner">
								
									<div class="page-header"><!-- Page header -->
										<h5><i class="font-home"></i>Register</h5>
									</div>
									
									<div class="body">';
							
					echo '<form action="register" method="post" class="form-horizontal">
                                    <div class="block well">
                                        
                                        <div class="control-group">
                                            <label class="control-label">Username: </label>
                                            <div class="controls"><input type="text" name="username" class="span12" placeholder="Username"></div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label">Password: </label>
                                            <div class="controls"><input type="password" name="password" class="span12" placeholder="Password"></div>
                                        </div>
										
										<div class="control-group">
                                            <label class="control-label">Email: </label>
                                            <div class="controls"><input type="text" name="email" class="span12" placeholder="Email"></div>
                                        </div>
										
										<div class="form-actions align-right" action="register" method="post">
                                            <button type="submit" class="btn btn-primary">Register</button>
                                            <button type="reset" class="btn">Cancel</button>
                                        </div>
                                    </div>
                                </form>';
						
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

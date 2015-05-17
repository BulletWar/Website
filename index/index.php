<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
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
                    <h5><i class="font-home"></i>Dashboard</h5>
                    <ul class="icons">
                        <li><a href="index" class="hovertip" title="Reload data"><i class="font-refresh"></i></a></li>
                    </ul>
                </div>
				
				
				<!-- /page header -->
                <div class="body">
                	
					<?php
					


					include("inc/connect.php");
				

					echo '<div class="container">
						<title>BulletWar - Home</title>
										
                        <!-- Line chart -->
<center><h2>News Headlines</h2></center>
                        <div class="block well">
                            <div class="navbar">
								<table class="table">
                                    <tbody>';

									
																			echo'<tr class"success">
												
												<front size="2"><td><span class="label label-success">News</span>We are currently hiring Web Developers, Game Developers and Forum Moderators. Also Graphic designers are warmly welcome. If you think you should be filling one of this spots in the BulletWar staff team, you can contact me on skype: Rhandy32.<br> <br>
											    <font size="0.5">Posted on 2015-06-20 - by [GM]TrollThemAll</font></td>
                                                <div class="container">
                        <div class="block well">
                            <div class="navbar">
								<table class="table">
                                    <tbody>';

									
																			echo'<tr class"success">
												
												<td><span class="label label-success">News</span>Welcome to the official web page of BulletWar<br><br>
											    <font size="0.5">Posted on 2015-06-15 - by [GM]TrollThemAll</font></td>

												
												
											</tr>';
									            
								            
								echo '</tbody>
							            </table>';
										
							
							
								
								
									
								
							
								
								
								
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
</html>

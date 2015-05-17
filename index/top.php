<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<title>BulletWar - Top 100</title>

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
                    <h5><i class="font-home"></i>Top 100</h5>
                </div>
				
				
				<!-- /page header -->
                <div class="body">
                	
					<?php
					
					include("inc/connect.php");
					
					echo '<div class="container">
					<!-- Line chart -->
                        <div class="block well">
                            <div class="navbar">
								<table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nickname</th>
                                            <th>Level</th>
											<th>EXP</th>
											<th>K/D Rate</th>
											<th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
								
								$rowcount = mysql_num_rows(mysql_query("SELECT * FROM users"));
								
								if($rowcount > 0)
								{
									$pages = ceil($rowcount/10);
										
									if(isset($_GET['page']))
									{
										$page = $_GET['page'];
									}
									else
										$page = 1;
										
									if($page >= $pages)
										$page = $pages;
									else if($page <= 0)
										$page = 1;
											
									$lim = -10 + $page * 10;

									function getLevelforExp($exp)
									{
									  $level = 1;
									  $levelarr = array(1,2250,6750,11250,16650,24750,32850,41625,50400,59175,
											67950,76725,94725,112725,130725,148725,166725,189225,211725,234225,
											256725,279225,306225,333225,360225,387225,414225,441225,497475,553725,
											609975,666225,722475,778725,857475,936225,1014975,1093725,1172475,1251225,
											1363725,1476225,1588725,1701225,1813725,1926225,2038725,2207475,2376225,2544975,
											2713725,2882475,3051225,3219975,3444975,3669975,3894975,4119975,4344975,4569975,
											4794975,5132475,5469975,5807475,6144975,6482475,6819975,7157475,7494975,7944975,
											8394975,8844975,9294975,9744975,10194975,10644975,11094975,11657475,12219975,12782475,
											13344975,13907475,14469975,15032475,15932475,17282475,18632475,19982475,21332475,22682475,
											24032475,25382475,26732475,28307475,29882475,31457475,33032475,34607475,36182475,37757475,
											2147483647
											);
										for($i = 1; $i < 101; $i++)
											if($exp > $levelarr[$i]) $level = $i;
										
										if($level == 1 && $exp < 2250)
											$level = 0;
									
									return $level +1 ;
									}							
							
									$query = mysql_query("SELECT * FROM users ORDER BY exp DESC LIMIT ".$lim.", 10");
									$rowcount = 0;
									
									$premArrayIcon = array (".png", "prembronze.png", "premsilver.png", "premgold.png","premgold.png");
									$premArray = array ("Free2Play", "PremiumBronze","PremiumSilver","PremiumGold", "PremiumGold");
									while($row = mysql_fetch_array($query))
									{	
										if($row['nickname'] != '' && $rowcount < 101)
										{
											$rowcount++;
											
											$uid = $row['id'];
											$nickname = $row['nickname'];
											$exp = $row['exp'];
											$premium = $row['premium'];
											$level = getLevelForExp($exp + 1);
											$status = ($row['online'] == 1 ? "<font color='darkgreen'>Online</font>" : "<font color='red'>Offline</font>");
											$imgsrc = "img/rank/".$premArray[$premium]."/rank".$level.$premArrayIcon[$premium];
											if($row['deaths'] > 0 && $row['kills'] > 0)
												$kdrate = substr($row['kills'] / $row['deaths'], 0, 5);
											else
												$kdrate = "0.000";
											
											echo'<tr class="normal">
													<td>'.$rowcount.'</td>
													<td><a href="profile?uid='.$uid.'">'.$nickname.'</a></td>
													<td><img src="'.$imgsrc.'"/>('.$level.')</td>
													<td>'.$exp.'</td>
													<td>'.$kdrate.'</td>
													<td>'.$status.'</td>
												</tr>';
										}
									}
								}
								
								if($rowcount == 0)
								{
									echo '<tr class="null">
									<td>No players available</td> 							
									<td>#</td> 
									<td>#</td> 
									<td>#</td>';
								}
								
								echo '</tbody>
										</table>
										</div>
										</div>';
						
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

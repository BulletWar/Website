<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<title>LegendWar - Profile</title>

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
		
		<?php
		
		$userid = 0;
		
		if(isset($_GET['uid']))
		{
			$userid = $_GET['uid'];
		}
		
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
		
		$userfound = 0;
		
		
		$query = mysql_query("select * from users where id='$userid'");
		if(mysql_num_rows($query) == 1)
			$userfound = 1;
		
		
		if($userid > 0 && $userfound > 0)
		{
			$row = mysql_fetch_array($query);
			
			$rank = $row['rank'];
			if($rank == 0) 
				$rank = "Banned";
			else if($rank == 1)
				$rank = "User";
			else if($rank == 2)
				$rank = "Donator";
			else if($rank > 4)
				$rank = "Game Master";
			else if($rank > 2)
				$rank = "Moderator";
				
			$clanid = $row['clanID'];
				
			$premium = $row['premium'];
			
			switch($premium)
			{
				case 0: $premtype = "F2P"; break;
				case 1: $premtype = "Bronze"; break;
				case 2: $premtype = "Silver"; break;
				case 3: $premtype = "Gold"; break;
				case 4: $premtype = "Platinum"; break;
			}
			
			if($row['deaths'] > 0 && $row['kills'] > 0)
				$kdrate = substr($row['kills'] / $row['deaths'], 0, 5);
			else
				$kdrate = "0.000";
			
			$clanname = "None";
			
			if($clanid > 0)
			{
				$cquery = mysql_query("SELECT * FROM clans WHERE id='$clanid'");
				if(mysql_num_rows($cquery) > 0)
				{
					$crow = mysql_fetch_array($cquery);

					$clanname = $crow['clanname'];
				}
			}
			
			$premArrayIcon = array (".png", "prembronze.png", "premsilver.png", "premgold.png","premgold.png");
			$premArray = array ("Free2Play", "PremiumBronze","PremiumSilver","PremiumGold", "PremiumGold");
			$level = getLevelForExp($row['exp'] + 1);
			$imgsrc = "img/rank/".$premArray[$premium]."/rank".$level.$premArrayIcon[$premium];
			
			echo '<div class="page-header">
				<h5><i class="font-home"></i>User Profile of '.$row['nickname'].'</h5> </div>

			<div class="body">
				<div class="well">
					<div class="table-overflow">
						<table class="table table-bordered table-block table-gradient">
							<tbody><tr>
								<td rowspan="6" style="text-align: center; width: 150px;">
									<img src="'.$imgsrc.'" width="50" height="50"> 
									<div class="experience_box" style="margin: 20px 10px;">
										<div class="experience_box_infos">
										<div style="float: center;"><b>Level: '.$level.' <br>EXP: '.$row['exp'].'</b></div>
									</div>
									</div>
								</td>
								<th>Nickname:</th> <td>'.$row['nickname'].'</td>
								<th>Group:</th> <td>'.$rank.'</td>
							</tr>
							<tr>
								<th>Level:</th> <td><img src="'.$imgsrc.'"/>('.$level.')</td>
								<th>Experience:</th> <td>'.$row['exp'].'</td>
							</tr>
							<tr>
								<th>Premium:</th> <td>'.$premtype.'</td>
								<th>K/D:</th> <td>'.$kdrate.'</td>
							</tr>
							<tr>
								<th>Kills:</th> <td>'.$row['kills'].'</td>
								<th>Deaths</th> <td>'.$row['deaths'].'</td>
							</tr>
							<tr>
								<th>Clan Name:</th> <td>'.$clanname.'</td>
								<th>Clan Tag:</th> <td>None</td>
							</tr>
						</tbody></table>
					</div>
				</div>
			</div>';
		}
		else
		{
			echo '<div class="inner"><div class="note note-error"> <strong>Error!</strong> This user does not exist! </div></div>';
		}
		?>
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

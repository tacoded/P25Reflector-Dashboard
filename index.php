<?php $time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
include "config.php";
include "tools.php";
include "functions.php";
include "init.php"; ?>
<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.6,maximum-scale=1, user-scalable=yes">
	<meta http-equiv="refresh" content="<?php echo REFRESHAFTER?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  	<style>
		h4 { display: inline }
		a:link { text-decoration:none; color: #5555ff;}
		a:visited { text-decoration: none; color: #5555ff;}
		a:hover { text-decoration: none; color: #0000ff;}
 	</style>
    <title><?php echo SITETITLE ?></title>
  </head>
  <body>
  <center>
  <table width="95%" border="0"><tr><td>
  <center><h1 style="padding-top:20px;margin:0px;"><?php echo SITETITLE ?></h1>
  <div style="position:absolute;top:0px;right:3%;"><img src="logo.png" style="width:115px; hspace="10" vspace="10" align="absmiddle"></div>
<?php
$lastReload = new DateTime();
echo "Last Reload ".$lastReload->format('Y-m-d, H:i:s')." (UTC)";?>
<br><br></center>
<?php
// Here you can feel free to disable info-sections by commenting out with // before include
include "txinfox.php";
include "sysinfo.php";
include "disk.php";
include "lh.php";
include "gateways.php";
include "allheard.php";
?>
<center>P25Reflector-Dashboard based on YSFReflector-Dashboard from <a href="https://github.com/dg9vh/YSFReflector-Dashboard" target="_new">GitHub</a><br><br></td></tr></table>
</body>
</html>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <title> Переименование </title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 </head>
 <body> 
		<?php 
			$UID = $_GET['uid'];
			$TID = $_GET['tid'];
			$FID = $_GET['fid'];

			//echo $TID."  ".$UID;
		?>
		<form action = "renameT.php" method = "post">
			<input type="hidden" name="UID" value="<?php echo $UID; ?>"/>
			<input type="hidden" name="FID" value="<?php echo $FID; ?>"/>
			<input type="hidden" name="TID" value="<?php echo $TID; ?>"/>
			<div><textarea name = "NewTheme" cols = "80" rows = "3"> </textarea><div>
			<input type = "submit" value = "Новое имя"/>
		</form>	
 </body>
</html>

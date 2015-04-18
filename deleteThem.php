
	<?php
		$UID = $_GET['uid'];
		$TID = $_GET['tid'];
		$FID = $_GET['fid'];

		if (!$link = mysql_connect('localhost', 'root', '1'))
		{
			echo "Ошибка подключения к серверу";
			exit;
		};

		@mysql_query("SET NAMES 'utf8'", $link);
		mysql_select_db('forum', $link);

		$sql = "DELETE FROM `themes` WHERE `themes`.`ThemID` = ".$TID;
		$result = mysql_query($sql, $link);

		if (!$result)
		{
			echo "Ошибка выполнения запроса";
			mysql_close($link);
			exit;
		};

	$sql = "SELECT `subForum`.`FContent` AS FContent FROM `subForum` WHERE `subForum`.`FID` = ".$FID;

		$result = mysql_Query($sql, $link);
	
		$res = mysql_fetch_object($result);
		$FContent = $res->FContent;

		echo "Темы по подфоруму: <div><b>" .$FContent."</b></div>";

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <title> Темы форума </title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 </head>
 <body> 
	<div> Список тем</div>
	<table>
		<tr>
			<th width = "200px"> дата </th>
			<th width = "200px"> пользователь </th>
			<th width = "200px"> тема </th>
		</tr>
	

	<?php	
		$sql = "SELECT `themes`.`ThemID` AS TID, `themes`.`ThemDate` AS ThemD, `users`.`UName` AS ThemUName, `themes`.`ThemContent` AS ThemC FROM `themes`, `users` WHERE (`themes`.`ThemUID` = `users`.`UID`) AND (`themes`.`ThemFID` = ".$FID.") ORDER BY ThemD";

		$result = mysql_query($sql, $link);	
		if (!$result)
		{
			echo "Ошибка выполнения запроса";
			mysql_close($link);
			exit;
		}; 
		while ($row = mysql_fetch_object($result))
		{
			echo "<tr>
					<td>".$row->ThemD."</td>
					<td>".$row->ThemUName."</td>
					<td><a href=\"thememsg.php?tid=".$row->TID."&uid=".$UID."\">".$row->ThemC."</a></td>
					<td><a href=\"renameThem.php?fid=".$FID."&tid=".$row->TID."&uid=".$UID."\"> Переименовать тему</a></td>
					<td><a href=\"deleteThem.php?fid=".$FID."&tid=".$row->TID."&uid=".$UID."\"> Удалить тему</a></td>
				</tr>";
		}
	?>
	</table>
	<br />
		<div> Добавить новую тему </div>
		<form action = "addtheme.php" method = "post">
			<input type="hidden" name="UID" value="<?php echo $UID; ?>"/>
			<input type="hidden" name="TID" value="<?php echo $TID; ?>"/>
			<input type="hidden" name="FID" value="<?php echo $FID; ?>"/>
			<div><textarea name = "NewTheme" cols = "80" rows = "3"> </textarea><div>
			<input type = "submit" value = "Новая тема"/>
			<input type = "reset" value = "Отменить"/>
			<input type = "button" value = "Выйти из форума" onclick = "javascript:document.location.href='index.php'"/>
		</form>	

	
	<?php
		mysql_free_result($result);
		mysql_close($link);
	?>

 </body>
</html>

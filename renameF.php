	<?php
		//$TID = $_POST['TID'];
		$TContent = $_POST['NewTheme'];
		$FID = $_POST['FID'];
		$UID = $_POST['UID'];


		//echo $FID." ".$TContent;
		if (!$link = mysql_connect('localhost', 'root', '1'))
		{
			echo "Ошибка подключения к серверу";
			exit;
		};

		@mysql_query("SET NAMES 'utf8'", $link);
		mysql_select_db('forum', $link);

		$sql = "UPDATE `subForum` SET `FContent`='".$TContent."' WHERE `FID`=".$FID;
		$result = mysql_Query($sql, $link);

		if (!$result)
		{
			echo "Ошибка выполнения запроса";
			mysql_close($link);
			exit;
		};



	$sql = "SELECT `subForum`.`FID` AS FID, 
				   `subForum`.`FUID` AS FUID, 
				   `users`.`UName` AS FUName, 
				   `subForum`.`FDate` AS FDate, 
				   `subForum`.`FContent` AS FContent 
						FROM `subForum`, `users` WHERE `subForum`.`FUID` = `users`.`UID` 
						ORDER BY FDate";

	$result = mysql_query($sql, $link);	
	if (!$result)
	{
		echo "Ошибка выполнения запроса";
		mysql_close($link);
		exit;
	} 
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <title> Темы форума </title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 </head>
 <body> 
		<td><a href=changepower.php> Управление правами </a></td>
		<div> Доступные подфорумы: </div>
		<table>
			<tr>
				<th width = "100px"> Дата </th>
				<th width = "100px"> Пользователь </th>
				<th> Название </th>				
			</tr>
		<?php
			while ($row = mysql_fetch_object($result))
			{
				echo "<tr> 
						<td> ".$row->FDate."</td>
						<td> ".$row->FUName."</td>
						<td><a href=\"subforums.php?fid=".$row->FID."&uid=".$UID."\">".$row->FContent."</a></td>
						<td><a href=renameForum.php?fid=".$row->FID."&uid=".$UID."> Переименовать подфорум</a></td>
						<td><a href=deleteForum.php?fid=".$row->FID."&uid=".$UID."> Удалить подфорум</a></td>
					  </tr>";
				$FID = $row->FID;
			}
		?>
		</table>
		<br />
		<div> Создать подфорум: </div>
		<form action = "addSubForum.php" method = "post">
			<input type = "hidden" name = "UID" value = "<?php echo $UID; ?>"/>
			<input type = "hidden" name = "FID" value = "<?php echo $FID; ?>"/>
			<div><textarea name = "NewSubForum" cols = "80" rows "3"> </textarea></div>
			<input type = "submit" value = "Новый подфорум"/>
			<input type = "reset" value = "Отменить"/>
			<input type = "button" value = "Выйти" onclick = "javascript:document.location.href = 'index.php'"/>
		</form>
		<?php
			mysql_free_result($result);
			mysql_close($link);
		?>
		
 </body>
</html>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <title> Сообщения по теме </title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 </head>
 <body> 

<?php

	$UID = $_GET['uid'];
	$TID = $_GET['tid'];

	//echo $UID."  ". $TID;

	if (!$link = mysql_connect('localhost', 'root', '1'))
	{
		echo "Ошибка подключения к серверу";
		exit;
	}

	@mysql_query("SET NAMES 'utf8'", $link);
	mysql_select_db ('forum', $link);


			$sql = "SELECT `Power` FROM `users` WHERE `UID` = ".$UID."";

			$result = mysql_Query($sql, $link);

			if (!$result)
			{
				echo "Ошибка получения данных";
				mysql_close($link);
				exit;
			}
			else
			{
				$row = mysql_fetch_object($result);
				//$UID = $row->UID;
				$POWER = $row->Power;
				mysql_free_result($result);
			};


	$sql = "SELECT `themes`.`ThemContent` AS TContent FROM `themes` WHERE `themes`.`ThemID` = ".$TID;

	$result = mysql_Query($sql, $link);
	
	$res = mysql_fetch_object($result);
	$TContent = $res->TContent;

	echo "Сообщения по теме: <div><b>" .$TContent."</b></div>";

	$sql = "SELECT `messages`.`MSGID` AS MID, `messages`.`MSGDate` AS MSGD, `users`.`UName` AS MSGUName, `messages`.`MSGContent` AS MSGC FROM `messages`, `users` WHERE (`messages`.`MSGUID` = `users`.`UID`) AND (`messages`.`MSGTID` = ".$TID.") ORDER BY MSGD";

	$result = mysql_Query($sql, $link);
?>

	<div> Список сообщений темы</div>
	<table>
		<tr>
			<th width = "160px"> дата </th>
			<th width = "160px"> пользователь </th>
			<th width = "160px"> сообщение </th>
		</tr>
	

	<?php
		while ($row = mysql_fetch_object($result))
		{
			if (strnatcmp($POWER, "a") == 0 || strnatcmp($POWER, "m") == 0)
			{
				echo "<tr>
						<td>".$row->MSGD."</td>
						<td>".$row->MSGUName."</td>
						<td>".$row->MSGC."</td>
						<td><a href=deleteMSG.php?tid=".$TID."&uid=".$UID."&mid=".$row->MID."> Удалить сообщение</a></td>
					</tr>";
			}
			else
			{
				echo "<tr>
						<td>".$row->MSGD."</td>
						<td>".$row->MSGUName."</td>
						<td>".$row->MSGC."</td>
					</tr>";
			};
		}
	?>
	</table>
	<br />
		<div> Добавить новое сообщение</div>
		<form action = "addmsg.php" method = "post">
			<input type="hidden" name="UID" value="<?php echo $UID; ?>"/>
			<input type="hidden" name="TID" value="<?php echo $TID; ?>"/>
			<div><textarea name = "NewMSG" cols = "80" rows = "3"> </textarea><div>
			<input type = "submit" value = "Новое сообщение"/>
			<input type = "reset" value = "Отменить"/>
			<input type = "button" value = "Выйти из форума" onclick = "javascript:document.location.href='index.php'"/>
		</form>	

	
	<?php
		mysql_free_result($result);
		mysql_close($link);
	?>

 </body>
</html>

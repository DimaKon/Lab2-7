	<?php
		$UID = $_GET['uid'];
		$FID = $_GET['fid'];

		if (!$link = mysql_connect('localhost', 'root', '1'))
		{
			echo "Ошибка подключения к серверу";
			exit;
		};

		@mysql_query("SET NAMES 'utf8'", $link);
		mysql_select_db('forum', $link);

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
				$POWER = $row->Power;
				mysql_free_result($result);
			};




		$sql = "DELETE FROM `subForum` WHERE `FID` = ".$FID;
		$result = mysql_query($sql, $link);

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
		<?php if (strnatcmp($POWER, "a") == 0 ) { echo "<td><a href=changepower.php> Управление правами </a></td>";}; ?>
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
				if (strnatcmp($POWER, "a") == 0 )
				{
					echo "<tr> 
							<td> ".$row->FDate."</td>
							<td> ".$row->FUName."</td>
							<td><a href=\"subforums.php?fid=".$row->FID."&uid=".$UID."\">".$row->FContent."</a></td>
							<td><a href=renameForum.php?fid=".$row->FID."&uid=".$UID."> Переименовать подфорум</a></td>
							<td><a href=deleteForum.php?fid=".$row->FID."&uid=".$UID."> Удалить подфорум</a></td>
						  </tr>";
				}

				else
				{
					echo "<tr> 
							<td> ".$row->FDate."</td>
							<td> ".$row->FUName."</td>
							<td><a href=\"subforums.php?fid=".$row->FID."&uid=".$UID."\">".$row->FContent."</a></td>
						  </tr>";
				};
				$FID = $row->FID;
			}
		if (strnatcmp($POWER, "a") == 0 )
		{

			echo "</table>
			<br />
			<div> Создать подфорум: </div>
			<form action = \"addSubForum.php\" method = \"post\">
				<input type = \"hidden\" name = \"UID\" value = ".$UID.">
				<input type = \"hidden\" name = \"FID\" value = ".$FID.">
				<div><textarea name = \"NewSubForum\" cols = \"80\" rows \"3\"> </textarea></div>
				<input type = \"submit\" value = \"Новый подфорум\"/>
				<input type = \"reset\" value = \"Отменить\"/>
				<input type = \"button\" value = \"Выйти\" onclick = \"javascript:document.location.href = 'index.php'\"/>
			</form>";
		}
			mysql_free_result($result);
			mysql_close($link);
		
		?>
		
 </body>
</html>


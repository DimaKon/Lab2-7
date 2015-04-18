<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <title> Форум </title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 </head>
 <body>

	<?php
		$Family = $_POST['Family']; 
		$Name = $_POST['Name']; 
		$SecName = $_POST['SecName']; 
		$UName = $_POST['UName']; 
		$UPSW = $_POST['UPSW']; 
		$UPSWapprove = $_POST['UPSWapprove']; 

		//echo $UPSWapprove;
		if ((empty($Family) || empty($Name) || empty($SecName) || empty($UName) || empty($UPSW) || empty($UPSWapprove)) || ($UPSW != $UPSWapprove))
		{
			if ($UPSW != $UPSWapprove)
			{
				echo "Подтверждение ". $UPSWapprove." ";
				echo "Пароль ". $UPSW." ";
				echo "Неверно повторен пароль!\n";
			}
			else
			{
				echo "Заполните все поля!\n";
			};
		?>
			<form action = "registrationCheck.php" method = "post">	
				<table>
					<tr>
						<td> Фамилия </td> 
						<td> <input type = "text" name ="Family" value = "<?php echo $Family; ?>"/> </td>		 
					</tr>
					<tr>
						<td> Имя </td> 
						<td> <input type = "text" name ="Name" value = "<?php echo $Name; ?>"/> </td>		 
					</tr>
					<tr>
						<td> Отчеcтво </td> 
						<td> <input type = "text" name ="SecName" value = "<?php echo $SecName; ?>"/> </td>		 
					</tr>

					<tr>
						<td> Ник </td> 
						<td> <input type = "text" name ="UName" value = "<?php echo $UName; ?>"/> </td>		
					</tr>

					<tr>
						<td> Пароль </td> 
						<td> <input type = "password" name ="UPSW"/> </td>		 
					</tr>
					<tr>
						<td> Пароль еще раз </td> 
						<td> <input type = "password" name ="UPSWapprove"/> </td>		 
					</tr>

				<table>
				<input type = "submit" value = "Зарегистрироваться"/>
		<?php
			exit;
		};

		if (!$link = mysql_connect('localhost', 'root', '1'))
		{
			echo "Ошибка подключения к серверу";
			exit;
		};

		@mysql_query("SET NAMES 'utf8'", $link);
		mysql_select_db ('forum', $link);

		$sql = "SELECT `UID` FROM `users` WHERE (`UName` = '".$UName."')";

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
			$UID = $row->UID;
			mysql_free_result($result);
		};

		if ($UID)
		{
			echo "Такой пользователь уже зарегистрирован";
			?>
				<form action = "registrationCheck.php" method = "post">	
					<table>
						<tr>
							<td> Фамилия </td> 
							<td> <input type = "text" name ="Family" value = "<?php echo $Family; ?>"/> </td>		 
						</tr>
						<tr>
							<td> Имя </td> 
							<td> <input type = "text" name ="Name" value = "<?php echo $Name; ?>"/> </td>		 
						</tr>
						<tr>
							<td> Отчеcтво </td> 
							<td> <input type = "text" name ="SecName" value = "<?php echo $SecName; ?>"/> </td>		 
						</tr>

						<tr>
							<td> Ник </td> 
							<td> <input type = "text" name ="UName" value = "<?php echo $UName; ?>"/> </td>		
						</tr>

						<tr>
							<td> Пароль </td> 
							<td> <input type = "password" name ="UPSW"/> </td>		 
						</tr>
						<tr>
							<td> Пароль еще раз </td> 
							<td> <input type = "password" name ="UPSWapprove"/> </td>		 
						</tr>

					<table>
					<input type = "submit" value = "Зарегистрироваться"/>
			<?php
			mysql_close($link);
			exit;
		}
		else
		{
			$sql = "SELECT MAX(`users`.`UID`) AS UID FROM `users`";
			$result = mysql_Query($sql, $link);

			$res = mysql_fetch_object($result);
			$UID = $res->UID + 1;

			//echo $UID." ".$UID." ".$UName." ".$UPSW." ".$Family." ".$Name." ".$SecName;
			$sql = "INSERT INTO `users` (`UID`, `UName`, `UPSW`, `Family`, `Name`, `SecName`, `Power`)
						      VALUES (".$UID.",'".$UName."','".$UPSW."','".$Family."','".$Name."','".$SecName."','u')";
			$result = mysql_Query($sql, $link);

			echo "Регистрация пройдена успешно! <input type = \"button\" value = \"На главную\" onclick = \"javascript:document.location.href = 'index.php'\"/>";
		};
	?>

 </body>
</html>

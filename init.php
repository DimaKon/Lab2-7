<?php

	if (!$link = mysql_connect('localhost', 'root', '1'))
	{
		echo "Ошибка подключения к серверу";
		exit;
	};

	@mysql_query("SET NAMES 'utf8'", $link);
	mysql_select_db ('forum', $link);

	//$sql = "INSERT INTO `users` (`UID`, `UName`, `UPSW`, `Family`, `Name`, `SecName`)
	//		VALUES (1, 'Andrey', 'Fadeev', 'Фадеев','Андрей','Михайлович'),
	//			   (2, 'Vasily', 'Vasily', 'Василий','Василий','Васильев')";
	//$result = mysql_Query($sql, $link);

	//$sql = "INSERT INTO `themes` (`ThemID`, `ThemUID`, `ThemDate`, `ThemContent`, `ThemFID`)
	//		VALUES (5,1,'2010-5-1', 'Новая тема','1')";
	//$result = mysql_Query($sql, $link);

  	//$sql = "INSERT INTO `messages` (`MSGID`, `MSGTID`, `MSGUID`, `MSGDate`, `MSGContent`) 
    //                    VALUES (1, 1, 1,'2010-04-29','Сообщение')";
  	//$result = mysql_Query($sql, $link);

  	$sql = "INSERT INTO `messages` (`MSGID`, `MSGTID`, `MSGUID`, `MSGDate`, `MSGContent`) 
                        VALUES (6, 5, 1,'2010-04-29','Сообщение')";
  	$result = mysql_Query($sql, $link);
?>

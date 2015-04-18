
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <title> Форум </title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 </head>
 <body> 
	<form action = "login.php" method = "post">
		<input type = "button" value = "Регистрация" onclick = "javascript:document.location.href = 'registration.php'"/>
		<table>
			<tr>
				<td> Имя пользователя </td> 
				<td> <input type = "text" name ="UName"/> </td>		
			</tr>

			<tr>
				<td> Пароль </td> 
				<td> <input type = "password" name ="UPSW"/> </td>		 
			</tr>
		<table>

		<input type = "submit" value = "Вход"/>
		<input type = "reset" value = "Очистить"/>
	
	</form>
 </body>
</html>

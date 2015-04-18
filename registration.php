<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <title> Регистрация </title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 </head>
 <body> 
	<form action = "registrationCheck.php" method = "post">	
		<table>
			<tr>
				<td> Фамилия </td> 
				<td> <input type = "text" name ="Family"/> </td>		 
			</tr>
			<tr>
				<td> Имя </td> 
				<td> <input type = "text" name ="Name"/> </td>		 
			</tr>
			<tr>
				<td> Отчеcтво </td> 
				<td> <input type = "text" name ="SecName"/> </td>		 
			</tr>

			<tr>
				<td> Ник </td> 
				<td> <input type = "text" name ="UName"/> </td>		
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
	</form>
 </body>
</html>

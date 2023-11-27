<!--  Login form -->
<!DOCTYPE html>
<html> 
<head> 
	<title> Log into PushingFilm </title>
</head>
<body> 
	<form action = "login.php" method = "post">
		<h3> Please input your username and password </h3>
		<label> Username: </label>
		<input type="text" name="username" size = "20" maxlength = "25" id = "username"/>
		<br>
		<br>
		<label> Password: </label>
		<input type="text" name="password" size="20" maxlength ="25" id = "password"/>
		<br>
		<br>
		<button type="submit"> Log into PushingFilm!</button>
	</form>
</body>
</html>
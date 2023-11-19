<!DOCTYPE html>
<html> 
<head> 
	<title> Log into PushingFilm </title>

</head>
<body> 
	<form action = "login.php" method = "post">
		<h2> Please input your username and password </h2>
		<?php if (isset($_POST['error'])){?>
		<p class =" error"> <?php echo $_POST['error'];?> </p>
		<?php }?>
		<label> Username: </label>
		<input type="text" name="username" size = "20" maxlength = "25"/>
		<br>
		<br>
		<label> Password: </label>
		<input type="text" name="password" size="20" maxlength ="25"/>
		<br>
		<br>
		<button type="submit"> Log into PushingFilm!</button>
	</form>
</body>
</html>
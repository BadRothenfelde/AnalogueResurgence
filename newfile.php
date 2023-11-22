<?php
session_start();
if(isset($_SESSION['id'])&& isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html>
<head>
	<title>PushingFilm - Home</title>
</head>
<body>
	<form action="2.1.php" method = "post">
	<h1>Welcome to PushingFilm - Admin View!</h1>
	<label> Name of product: </label>
	<input type="text" name = "pname" size ="20" maxlength = "25" id = "pname"/>
	<br>
	<br>
	<label> Price of product: </label>
	<input type="text" name = "pprice" size = "20" maxlength = "25" id = "pprice"/>
	<br>
	<br> 
	<label> Rating of product: </label>
	<input type="text" name = "prating" size = "20" maxlength ="25" id = "pprice"/>
	<br>
	<br>
	<button type="submit"> Submit for Admin-Review! </button>
	</form>
</body>
</html>
<?php }?>
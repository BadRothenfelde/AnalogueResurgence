<?php
session_start();
if(isset($_SESSION['id'])&& isset($_SESSION['username'])){
?>

<!DOCTYPE HTML> 
<html> 
<head>
	<title> Welcome to PushingFilm.</title>
</head>
<body> 
	<h1> Welcome back to PushingFilm,  <?php echo $_SESSION['username'];?>!</h1>
</body>
</html>
<?php }?>


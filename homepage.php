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
	<h2> Welcome back, <?php echo $_SESSION['username'];?></h2>
</body>
</html>
<?php 
}
else{
    header("Location: 1.1.php");
    exit();
}
?>


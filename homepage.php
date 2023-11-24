<?php
session_start();
if(isset($_SESSION['id'])&& isset($_SESSION['username'])){
    if ($_SESSION['username'] == 'Administrator') {
        header("Location: adminview1.php");
        exit();
    }
    
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


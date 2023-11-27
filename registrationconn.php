<?php 
$servername = "localhost";
$userName = "root";
$password = "";
$databname = "PushingFilm";
$con = mysqli_connect($servername, $userName, $password, $databname);

//Insertion of Username and PW into user DB 
if(isset($_POST['username'])&& isset($_POST['password'])){
    $sql = "INSERT INTO users (username, password) VALUES ('" . $_POST["username"] . "', '" . $_POST["password"] . "')";
    mysqli_query($con, $sql);
    mysqli_close($con); 
}
?>
<!-- Registration form -->
<!DOCTYPE html>
<html>
	<head>
	<title>Register into PushingFilm!</title>
	</head>
	<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "post">
    	<h3>Register into PushingFilm!</h3>
    	<label>Username: </label>
    	<input type="text" name="username" size = "20" maxlength="25"/>
    	<br> 
    	<br>
    	<label>Password:</label> 
    	<input type="text" name="password" size="20" maxlength ="25"/>	
    	<br>
    	<br>
    	<button type="submit" name="register"> Register!</button>
    <?php //Redirecting to Login page
    if(isset($_POST['register'])){
   	    header("Location: 1.1.php");
   	    exit(); }
   	   //If Login (1.1.php + login.php) fails, revert back to Registration page 
   	    if(isset($_GET['error']) && $_GET['error']==1) echo "Unknown user - please register!";?>
	</form>
	
</body>
</html>

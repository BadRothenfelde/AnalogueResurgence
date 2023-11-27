<?php
session_start();
$servername = "localhost";
$userName = "root";
$password = "";
$databname = "PushingFilm";
$con = mysqli_connect($servername, $userName, $password, $databname);
//cleaning input from user-logon 
if(isset($_POST['username'])&& isset($_POST['password'])){
    function überprüfung ($data){
        $data = htmlspecialchars($data);
        return $data; 
    }
}
//SQL-Query with the login data 
$sql = "SELECT * FROM users WHERE username = '" . $_POST['username'] . "' AND password = '". $_POST['password'] . "'";
$result = mysqli_query($con, $sql);
//Check if login input matches exactly to one specific user in database and assign to session variables
if(mysqli_num_rows($result)===1){
    $row = mysqli_fetch_assoc($result);
    if($row['username']=== $_POST['username'] && $row['password'] === $_POST['password']){
        echo "Logged Into PushingFilm!";
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: homepage.php");
        exit;
    }
    
}
//if authentication fails (user not found in DB), redirect back to registrationconn.php 
header("Location: registrationconn.php?error=1");

?>
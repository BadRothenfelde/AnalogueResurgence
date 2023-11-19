<?php
session_start();
include "datab.php";

if(isset($_POST['username'])&& isset($_POST['password'])){
    function überprüfung ($data){
        $data = trim($data); 
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data; 
    }
}
$username = überprüfung($_POST['username']);
$password = überprüfung($_POST['password']);

if(empty($username)){
    header("Location: 1.1.php?error=Username is required!");
    exit ();
}
else if (empty($password)){
    header("Location: 1.1.php?error=Password is required!");
    exit (); 
}

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result)===1){
    $row = mysqli_fetch_assoc($result);
    if($row['username']=== $username && $row['password'] === $password){
        echo "Logged Into PushingFilm!";
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row ['id'];
        header("Location: homepage.php");
        exit (); 
    }
    else{
        header("Location: 1.1.php?error=Incorrect Username or Password!");
       }
    }
    else {
        header("Location: 1.1.php");
    
}
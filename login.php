<?php
session_start();
//DATENBANK-Anbindung
$servername = "localhost";
$userName = "root";
$password = "";

$databname = "PushingFilm";

$con = mysqli_connect($servername, $userName, $password, $databname);

if(isset($_POST['username'])&& isset($_POST['password'])){
    function überprüfung ($data){
        $data = htmlspecialchars($data);
        return $data; 
    }
}
$sql = "SELECT * FROM users WHERE username = '" . $_POST['username'] . "' AND password = '". $_POST['password'] . "'";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result)===1){
    $row = mysqli_fetch_assoc($result);
    if($row['username']=== $_POST['username'] && $row['password'] === $_POST['password']){
        echo "Logged Into PushingFilm!";
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: homepage.php");
    }
}
?>
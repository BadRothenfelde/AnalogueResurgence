<?php

$servername = "localhost"; 
$userName = "root"; 
$password = "";

$databname = "PushingFilm";

$con = mysqli_connect($servername, $userName, $password, $databname);
if(!$con){
 echo "The connection could not be established!";
}
<?php
$servername = "localhost";
$userName = "root";
$password = "";
$databname = "PushingFilm";
$con = mysqli_connect($servername, $userName, $password, $databname);

//if signed in as admin redirect to Admin-view
session_start();
if(isset($_SESSION['id'])&& isset($_SESSION['username'])){
    if ($_SESSION['username'] == 'Administrator') {
        header("Location: adminview1.php");
        exit();
    }
    
?>
<!-- Form for user to start navigating through the categories -->
<!DOCTYPE HTML> 
<html> 
<head>
	<title> Welcome to PushingFilm.</title>
</head>
<body> 
	<h1> Welcome back to PushingFilm,  <?php echo $_SESSION['username'];?>!</h1>
	<?php }?>
	<br> 
	<form action="homepage2.php" method="post">
	<input type="text" name="selection" size="3" id="selection">
	<br>
	<button type="submit"><i>Type in <b>Category-ID</b> of choice!</i> </button>
    <br>
	<br>
	<b>Available film types:</b>
	</form>
</body>
</html>

<?php //Displaying the differenct categories 
$res = mysqli_query($con, "SELECT * FROM categories");

    echo "<table border='1'>";
    echo "<tr> <td> Category-ID </td> <td> Film Category </td> </tr>"; 
    while ($dset = mysqli_fetch_assoc($res)){
        echo "<tr>";
        echo "<td>" . $dset["cid"] . "</td>";
        echo "<td>" . $dset["filmcat"] . "</td>";;
        echo "</tr>";
        }
        echo "</table>";
        ?>


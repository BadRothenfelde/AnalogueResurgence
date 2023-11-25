<?php
$servername = "localhost";
$userName = "root";
$password = "";

$databname = "PushingFilm";
$con = mysqli_connect($servername, $userName, $password, $databname);
?>

<!DOCTYPE html>
<html>
<head>
	<title>PushingFilm - Catalogue</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "post">
	<h1>PushingFilm - Product Overview</h1>
	<br>
	<br> 
	</form>
	<br>
	<br>
	<a href="rating1.php"><button>Go to Ratings Page!</button></a>
</body>
</html>

<?php 
//Ausgabe der DB in Tabelle
$selectedCategoryId = $_POST["selection"];
$res = mysqli_query($con, "SELECT * FROM products");
$res = mysqli_query($con, "SELECT * FROM products WHERE category_id = $selectedCategoryId");



    echo "<table border='1'>";
    echo "<tr> <td>Category-ID</td> <td> Product ID </td> <td> Product Name </td>";
    echo "<td> Price </td> <td> Rating (x/10) </td> <td> User-Rating </td> </tr>"; 
    while ($dset = mysqli_fetch_assoc($res)){
        echo "<tr>";
        echo "<td>" . $dset["category_id"]. "</td>";
        echo "<td>" . $dset["product_id"] . "</td>";
        echo "<td>" . $dset["pname"] . "</td>";
        echo "<td>" . $dset["pprice"] ."</td>";
        echo "<td>" . $dset["prating"] . "</td>";
        echo "<td>" . $dset["prating2"] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
        ?>


<?php
$servername = "localhost";
$userName = "root";
$password = "";

$databname = "PushingFilm";
$con = mysqli_connect($servername, $userName, $password, $databname);

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>PushingFilm - all ratings</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<h1>PushingFilm - Specific Rating</h1>
		<br>
		<br> 
		<input type="text" name="selectProductId" size="3" id="selectProductId">
		<button type="submit"><i>Type in <b>Product-ID</b> of choice!</i></button>
		<br>
		<br>
		</form>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="prating2" size="10" id="prating2">
		<button type="submit"><i>Give this product a rating!</i></button>
		</form>

	<?php 
	// Ausgabe des spez. Produkts in Tabelle
	if (isset($_POST["selectProductId"])) {
	    $selectProductId = $_POST["selectProductId"];
	    $res = mysqli_query($con, "SELECT * FROM products WHERE product_id = $selectProductId");
	    if ($res) {
	        echo "<table border='1'>";
	        echo "<tr>  <td> Product ID </td> <td> Product Name </td>";
	        echo "<td> Rating (x/10) </td> <td> User-Rating</td> </tr>";
	        while ($dset = mysqli_fetch_assoc($res)) {
	            $_SESSION["pname"] = $dset["pname"];
	            $_SESSION["prating"] = $dset["prating"];
	            echo "<tr>";
	            echo "<td>" . $dset["product_id"] . "</td>";
	            echo "<td>" . $dset["pname"] . "</td>";
	            echo '<td><b style="color:green;">' . $dset["prating"] . '</b></td>';
	            echo '<td><b style="color:green;">' . $dset["prating2"] . '</b></td>';
	            echo "</tr>";
	        }
	        echo "</table>";
	    }
	}
	
	// Ausgabe des Ratings für spezifisches Produkt
	if (isset($_POST["prating2"])) {
	    $submitRating = $_POST["prating2"];
	    $selectProductId = $_POST["selectProductId"];
	    $res1 = mysqli_query($con, "UPDATE `products` SET `prating2` = '$submitRating' WHERE `products`.`product_id` = '$selectProductId';");
	    if ($res1) {
	        echo "<table border='1'>";
	        echo "<tr>  <td> Product ID </td> <td> Product Name </td>";
	        echo "<td> Rating (x/10) </td><td> User-Rating</td> </tr>";
	        echo "<tr>";
	        echo "<td>" . $selectProductId . "</td>";
	        echo "<td>" . $_SESSION["pname"] . "</td>";
	        echo '<td><b style="color:green;">' . $_SESSION["prating"] . '</b></td>';
	        echo '<td><b style="color:green;">' . $submitRating . '</b></td>';
	        echo "</tr>";
	        echo "</table>";
	    }
	}
	
	?>
</body>
</html>

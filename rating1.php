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
	<title>PushingFilm - all ratings</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "post">
	<h1>PushingFilm - Specific Rating</h1>
	<br>
	<br> 
	<input type="text" name="selectProduct" size="3" id="selectProduct">
	<button type="submit"><i>Type in <b>Product-ID</b> of choice!</i> </button>
	<br>
	</form>
	<a href="rating2.php"><button>Rate it yourself!</button></a>	
</body>
</html>

  <?php 
    // Ausgabe der DB in Tabelle
    if (isset($_POST["selectProduct"])) {
        $selectProduct = $_POST["selectProduct"];
        $res = mysqli_query($con, "SELECT * FROM products WHERE product_id = $selectProduct");

        if ($res) {
            echo "<table border='1'>";
            echo "<tr>  <td> Product ID </td> <td> Product Name </td>";
            echo "<td> Rating (x/10) </td> <td>User Rating</td></tr>"; 
            while ($dset = mysqli_fetch_assoc($res)) {
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
    ?>
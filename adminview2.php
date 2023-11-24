<?php
$servername = "localhost";
$userName = "root";
$password = "";

$databname = "PushingFilm";
$con = mysqli_connect($servername, $userName, $password, $databname);
if(isset($_POST['pname'])&& isset($_POST['prating'])&& isset($_POST['pprice']) && isset($_POST['category_id'])){
    $sql = "INSERT INTO products (pname, pprice, prating, category_id) VALUES ('" . $_POST["pname"] . "', '" . $_POST["pprice"] . "', '" . $_POST["prating"] . "', '" . $_POST["category_id"] . "')";
    mysqli_query($con, $sql); 
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PushingFilm - Adminview (Products)</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "post">
	<h1>Welcome to PushingFilm - Admin View!</h1>
	<label> Name of product: </label>
	<input type="text" name = "pname" size ="20" maxlength = "25" id = "pname"/>
	<br>
	<br>
	<label> Price of product: </label>
	<input type="text" name = "pprice" size = "20" maxlength = "25" id = "pprice"/>
	<br>
	<br> 
	<label> Rating of product: </label>
	<input type="text" name = "prating" size = "20" maxlength ="25" id = "prating"/>
	<br>
	<br>
	<label> Select category:</label>
	<select name="category_id">
	<?php $categories = mysqli_query($con, "SELECT * FROM categories"); 
	while($row = mysqli_fetch_assoc($categories)){
	   echo "<option value='". $row['cid'] . "'>" . $row['filmcat'] . "</option>"; 
	}?>
	</select>
	<br>
	<br>
	<button type="submit"> Submit for Admin-Review! </button>
	<br>
	<br> 
	</form>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label><b>Delete?</b> Type in the <i>Product-ID</i>!</label>
		<input type="text" name="selection" size="20" id="selection">
		<button type="submit" name="delete_product">Delete</button>
		<br>
		<br>
		<br>
	</form>
</body>
</html>

<?php
//Löschen von ausgewähltem Datensatz
if (isset($_POST["selection"])) {
        $sql = "DELETE FROM products WHERE product_id = '" . $_POST["selection"] . "'";
        mysqli_query($con, $sql);
        
        $num = mysqli_affected_rows($con);
        if ($num > 0) {
            echo "<p><b>Product successfully wiped from PushingFilm!</b></p>";
        }
    }


//Ausgabe der DB in Tabelle
$res = mysqli_query($con, "SELECT * FROM products");

    echo "<table border='1'>";
    echo "<tr> <td>Category-ID</td> <td> Product ID </td> <td> Product Name </td>";
    echo "<td> Price </td> <td> Rating (x/10) </td> </tr>"; 
    while ($dset = mysqli_fetch_assoc($res)){
        echo "<tr>";
        echo "<td>" . $dset["category_id"]. "</td>";
        echo "<td>" . $dset["product_id"] . "</td>";
        echo "<td>" . $dset["pname"] . "</td>";
        echo "<td>" . $dset["pprice"] ."</td>";
        echo "<td>" . $dset["prating"]. "</td>";
        echo "</tr>";
        }
        echo "</table>";
        ?>


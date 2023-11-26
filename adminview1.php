<?php
$servername = "localhost";
$userName = "root";
$password = "";

$databname = "PushingFilm";
$con = mysqli_connect($servername, $userName, $password, $databname);

if(isset($_POST['cid'])&& isset($_POST['filmcat'])){
    $sql = "INSERT INTO categories (cid, filmcat) VALUES ('" . $_POST["cid"] . "', '" . $_POST["filmcat"] . "')";
    mysqli_query($con, $sql); 
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PushingFilm - Categories</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "post">
	<h1>Admin View - Manage your categories</h1>
	<label> <i>ID</i> of category: </label>
	<input type="text" name = "cid" size ="20" maxlength = "25" id = "cid"/>
	<br>
	<br>
	<label> <i>Name</i> of film category: </label>
	<input type="text" name = "filmcat" size ="20" maxlength = "25" id = "filmcat"/>
	<br>
	<br>
	<button type="submit"> <b>Submit for Admin-Review!</b> </button>
	</form>
	<br>
	<form action="adminview2.php" method="get">
	<button type="submit">Go to <i>Admin-View (Products)</i> </button>
    </form>
    <br>
	<br>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label><b>Delete?</b> Type in the <i>Category-ID</i>!</label>
		<input type="text" name="selection" size="5" id="selection">
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
        $sql = "DELETE FROM categories WHERE cid = '" . $_POST["selection"] . "'";
        mysqli_query($con, $sql);
        
        $num = mysqli_affected_rows($con);
        if ($num > 0) {
            echo "<p><b>Product successfully wiped from PushingFilm!</b></p>";
        }
    }


//Ausgabe der DB in Tabelle
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


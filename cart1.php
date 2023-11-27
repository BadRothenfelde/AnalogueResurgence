<?php
$servername = "localhost";
$userName = "root";
$password = "";

//Inserting data into cart table and displaying existing cart 
$databname = "PushingFilm";
$con = mysqli_connect($servername, $userName, $password, $databname);
if(isset($_POST['product_id'])&& isset($_POST['pname'])&& isset($_POST['pcount'])){
    $query = mysqli_query($con, "SELECT product_id, pname FROM products where product_id='" . $_POST['product_id'] . "' and pname='". $_POST['pname'] . "'");
    $row = mysqli_num_rows($query);
    if($row==1){
        $sql = "INSERT INTO cart (product_id, pname, pcount) VALUES ('" . $_POST["product_id"] . "', '" . $_POST["pname"] . "', '" . $_POST["pcount"] . "')";
        mysqli_query($con, $sql);
    }
}

//QTY -1
if(isset($_POST["decrease"]) && isset($_POST["decrease-btn"])) {
    $product_id = $_POST["decrease"];
    $sql_decr = "UPDATE cart SET pcount = pcount - 1 WHERE product_id = '$product_id' AND pcount > 0";
    mysqli_query($con, $sql_decr);
}
//QTY +1
if(isset($_POST["increase"]) && isset($_POST["increase-btn"])) {
    $product_id = $_POST["increase"];
    $sql_incr = "UPDATE cart SET pcount = pcount + 1 WHERE product_id = '$product_id' ";
    mysqli_query($con, $sql_incr);
}

//Placing an order
if(isset($_POST["order"])){
    $sql_order = "SELECT * FROM cart"; 
    ?> 
    <br>
    <label><b style="color:green;">Success!! Thanks for choosing PushingFilm! Happy Shooting!</b> </label><?php  
    $resultorder = mysqli_query($con, $sql_order);
    
    //Highlighted order confirmation in a table with 
    echo "<h3>Your Order:</h3>";
    echo "<table border='1'>";
    echo '<tr> <td><b style="color:green;"> Product ID </b></td> <td><b style="color:green;"> Product Name </b></td> <td><b style="color:green;"> Quantity</b></td></tr>';
    while ($dset = mysqli_fetch_assoc($resultorder)){
        echo "<tr>";
        echo '<td><b style="color:green;">' . $dset["product_id"] . '</b></td>';
        echo '<td><b style="color:green;">' . $dset["pname"] . '</b></td>';
        echo '<td><b style="color:green;">' . $dset["pcount"] . '</b></td>';
        echo "</tr>";
    }
    echo "</table>";
    
 }
?>
<!-- Form for ID, Name and Quantity of product as well as removing, decreasing and increasing QTY of 
it via Product-ID -->


<!DOCTYPE html>
<html>
<head>
	<title>PushingFilm - Categories</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "post">
    	<h1> Select your product:</h1>
    	<label> <i>ID</i> of Product: </label>
    	<input type="text" name = "product_id" size ="20" maxlength = "25" id = "product_id"/>
    	<br>
    	<br>
    	<label><i>Name</i> of Product:</label>
    	<input type="text" name = "pname" size ="20" maxlength = "25" id = "pname"/>
    	<br>
    	<br>
    	<label><i>Quantity</i> of Product:</label>
    	<input type="text" name = "pcount" size ="20" maxlength = "25" id = "pcount"/>
    	<br>
    	<br>
    	<button type="submit"> <b>Add to cart!</b> </button>
        <br>
    	<br>
	</form>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label><b>Remove product?</b> Type in the corresponding <i>Product-ID</i>!</label>
		<input type="text" name="selection" size="5" id="selection">
		<button type="submit" name="delete_product">Delete</button>
		<br>
		<br>
	 </form>
	 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label><b>Decrease QTY?</b> Type in the corresponding <i>Product-ID</i>!</label>
        <input type="text" name="decrease" size="5" id="decrease">
        <button type="submit" name="decrease-btn">Decrease</button>
        <br>
        <br>
     </form>
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label><b>Increase QTY?</b> Type in the corresponding <i>Product-ID</i>!</label>
        <input type="text" name="increase" size="5" id="increase">
        <button type="submit" name="increase-btn">Increase</button>
     </form>
     <br>
     <br>
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label> Ready? <i>Place your order!</i></label>
		<button type="submit" name="order"> <b><h3>ORDER NOW</h3></b></button>
	</form>
	<h2>Shopping cart: </h2>
</body>
</html>

<?php
//Deleting a selected product from the cart table
if (isset($_POST["selection"])) {
        $sql = "DELETE FROM cart WHERE product_id = '" . $_POST["selection"] . "'";
        mysqli_query($con, $sql);
        
        $num = mysqli_affected_rows($con);
        if ($num > 0) {
            echo "<p><b>Product successfully wiped from cart!</b></p>";
        }
    }


//Output of current cart in a table
    $res = mysqli_query($con, "SELECT * FROM cart");
    
    echo "<table border='1'>";
    echo "<tr> <td> Product ID </td> <td> Product Name </td>";
    echo "<td> Quantity</td></tr>";
    while ($dset = mysqli_fetch_assoc($res)){
        echo "<tr>";
        echo "<td>" . $dset["product_id"] . "</td>";
        echo "<td>" . $dset["pname"] . "</td>";
        echo "<td>" . $dset["pcount"] ."</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>

    


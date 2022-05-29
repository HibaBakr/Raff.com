<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<?php
$product_query = mysql_query ( "SELECT * FROM product WHERE id = $_GET[id]" );
$product = mysql_fetch_array ( $product_query );

$quantity = $_POST['quantity'];
$price = $product['price'];
$product_id = $_GET['id'];
$customer_id = $_SESSION['user_id'];

// insert query for cart
$query = "INSERT INTO cart
(quantity, price, customer_id, product_id)
VALUES
($quantity, $price, $customer_id, $product_id)";

$result = mysql_query( $query) or die ("Can't add this cart" . mysql_error());

if (mysql_affected_rows () == 1) {
	echo "<h2  class='text-center mt-5 mb-5'>تم اضافة المنتج بنجاح </h3>";
	
} else {
	echo "<h3 align='center'>خطأ أثناء اضافة المنتج</h3>";
}
?>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php include 'footer.php';?>
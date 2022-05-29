<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>
<?php
// if there is post from the user to add product
if (isset ( $_POST ['status'] )) {
	$status = $_POST ['status'];
	$order_id = $_POST ['order_id'];
	
	$update_query = "update order_details SET status = '$status' WHERE order_id = $order_id AND order_details.product_id IN (SELECT id FROM product WHERE small_business_id = $_SESSION[user_id])";
	
	$update_result = mysql_query ( $update_query ) or die ( "Can't change this order " . mysql_error () );
	
	// if there is affected rows in the database;
	if (mysql_affected_rows () != 0) {
		echo "<h2 class='text-center mt-5 mb-5'>تم التحديث بنجاح ....</h2>";
		
		header ( "REFRESH:3; url=small_business_show_orders.php" );
	} else {
		echo "<h2>خطأ أثناء التحديث....</h2>";
		header ( "REFRESH:3; url=small_business_show_orders.php" );
	}
}

?>

<?php include 'footer.php'; ?>
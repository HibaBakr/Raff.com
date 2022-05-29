<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>

<?php
// delete the product
mysql_query ( "DELETE FROM product WHERE id = $_GET[id]" ) or die ( 'error ' . mysql_error () );

// if there is affected rows in the database;
if (mysql_affected_rows () == 1) {
	echo "<script>alert('تم الحذف بنجاح ');</script>";
	
	header ( "REFRESH:0; url=small_business_show_products.php" );
} else {
	echo "<script>alert('خطأ أثناء الحذف');</script>";
	header ( "REFRESH:0; url=small_business_show_products.php" );
}
?>

<?php include 'footer.php';?>
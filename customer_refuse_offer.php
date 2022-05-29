<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<br/>
<br/>
<br/>

<?php
mysql_query ( "UPDATE offer SET status = 'تم الرفض' WHERE id = '$_GET[id]'" ) or die ( 'error ' . mysql_error () );

// if there is affected rows in the database;
if (mysql_affected_rows () == 1) {
	echo "<script>alert('تم الرفض بنجاح ');</script>";
	
	header ( "REFRESH:0; url=customer_show_custom_orders.php" );
} else {
	echo "<script>alert('خطأ أثناء الرفض');</script>";
	header ( "REFRESH:0; url=customer_show_custom_orders.php" );
}
?>

<?php include 'footer.php';?>
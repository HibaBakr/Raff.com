<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: index.php" );
}
?>

<?php
mysql_query ( "UPDATE small_business SET status = 'تم التأكيد' WHERE id = $_GET[id]" ) or die ( 'error ' . mysql_error () );

// if there is affected rows in the database;
if (mysql_affected_rows () == 1) {
	echo "<script>alert('تم التأكيد بنجاح ');</script>";
	
	header ( "REFRESH:0; url=admin_show_small_businesss_ensure.php" );
} else {
	echo "<script>alert('خطأ أثناء التأكيد');</script>";
	header ( "REFRESH:0; url=admin_show_small_businesss_ensure.php" );
}
?>

<?php include 'footer.php';?>
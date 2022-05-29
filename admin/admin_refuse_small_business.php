<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: index.php" );
}
?>

<br/>
<br/>
<br/>

<?php
// delete the small_business
mysql_query ( "DELETE FROM small_business WHERE id = $_GET[id]" ) or die ( 'error ' . mysql_error () );

// if there is affected rows in the database;
if (mysql_affected_rows () == 1) {
	echo "<h3>تم الرفض بنجاح ....</h3>";
	
	header ( "REFRESH:3; url=admin_show_small_businesss_ensure.php" );
} else {
	echo "<h2>خطأ أثناء الرفض</h2>";
	header ( "REFRESH:3; url=admin_show_small_businesss_ensure.php" );
}
?>

<?php include 'footer.php';?>
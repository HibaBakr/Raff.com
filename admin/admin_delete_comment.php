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
// delete the comment
mysql_query ( "DELETE FROM comment WHERE id = $_GET[id]" ) or die ( 'error ' . mysql_error () );

// if there is affected rows in the database;
if (mysql_affected_rows () == 1) {
	echo "<script>alert('تم الحذف بنجاح ');</script>";
	
	header ( "REFRESH:0; url=admin_show_comments.php" );
} else {
	echo "<script>alert('خطأ أثناء الحذف');</script>";
	header ( "REFRESH:0; url=admin_show_comments.php" );
}
?>

<?php include 'footer.php';?>
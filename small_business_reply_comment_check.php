<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>

<br/>
<br/>
<br/>

<?php
mysql_query ( "INSERT INTO reply (content, comment_id) VALUES ('$_POST[reply]', '$_GET[id]')" ) or die ( 'error ' . mysql_error () );

// if there is affected rows in the database;
if (mysql_affected_rows () == 1) {
	echo "<script>alert('تم حفظ الرد بنجاح ');</script>";
	
	header ( "REFRESH:0; url=small_business_show_comments.php" );
} else {
	echo "<script>alert('خطأ أثناء حفظ الرد');</script>";
	header ( "REFRESH:0; url=small_business_show_comments.php" );
}
?>

<?php include 'footer.php';?>
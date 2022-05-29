<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business" && $_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<br/>
<br/>
<br/>
<br/>

<?php
mysql_query ( "INSERT INTO compliant (content, user_id, user_type) VALUES ('$_POST[content]', '$_SESSION[user_id]', '$_SESSION[user_type]')" ) or die ( 'error ' . mysql_error () );

// if there is affected rows in the database;
if (mysql_affected_rows () == 1) {
	echo "<script>alert('تم الارسال بنجاح');</script>";
	
	header ( "REFRESH:0; url=user_show_compliants.php" );
} else {
	echo "<script>alert('خطأ أثناء الارسال ');</script>";
	header ( "REFRESH:0; url=user_show_compliants.php" );
}
?>

<?php include 'footer.php';?>
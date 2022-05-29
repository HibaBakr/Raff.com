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
$customer_id = $_GET['customer_id'];

// send notificaiton to the customer
mysql_query ("INSERT INTO notifications (content, user_id, user_type) VALUES ('لقد تم ارسال عرض على طلبك الخاص من قبل اسرة : $_SESSION[user]', '$customer_id', 'customer') ");

mysql_query ( "INSERT INTO offer (details, custom_order_id, small_business_id) VALUES ('$_POST[details]', '$_GET[id]', '$_SESSION[user_id]')" ) or die ( 'error ' . mysql_error () );

// if there is affected rows in the database;
if (mysql_affected_rows () == 1) {
	echo "<script>alert('تم حفظ العرض بنجاح ');</script>";
	
	header ( "REFRESH:0; url=small_business_show_custom_orders.php" );
} else {
	echo "<script>alert('خطأ أثناء حفظ العرض');</script>";
	header ( "REFRESH:0; url=small_business_show_custom_orders.php" );
}
?>

<?php include 'footer.php';?>
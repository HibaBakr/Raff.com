<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<?php
// delete the cart
mysql_query ( "DELETE FROM cart WHERE customer_id = $_SESSION[user_id]" ) or die ( 'error ' . mysql_error () );

// if there is affected rows in the database;
if (mysql_affected_rows () == 1) {
	echo "<h2 class='text-center mt-5 mb-5'>تم الافراغ بنجاح ....</h3>";
	
	header ( "REFRESH:3; url=customer_show_shopping_cart.php" );
} else {
	echo "<h2>خطأ أثناء الافراغ</h2>";
	header ( "REFRESH:3; url=customer_show_shopping_cart.php" );
}
?>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php include 'footer.php';?>
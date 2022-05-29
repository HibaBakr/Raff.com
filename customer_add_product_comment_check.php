<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<?php
if (isset ( $_POST ['content'] )) {
	
	// echo "<pre>";
	// print_r ( $_POST );
	// echo "</pre>";
	
	// comment vars
	$content = $_POST ['content'];
	// $created = date ( 'Y-m-d' );
	$customer_id = $_SESSION ['user_id'];
	$product_id = $_GET ['product'];
	
	// insert query for comment
	$query = "INSERT INTO  comment
		(content, customer_id, product_id)
		VALUES
		('$content', '$customer_id', '$product_id')";
	// echo $query;
	$comment_result = mysql_query ( $query ) or die ( "Can't add this comment" . mysql_error () );
	
	// if there is affected rows in the database;
	if ($comment_result) {
		echo "<h2  class='text-center mt-5 mb-5'>تم اضافة التعليق بنجاح </h2>";
	} else {
		echo "<h2 align='center'>خطأ أثناء اضافة التعليق</h2>";
	}
}
?>
<?php include 'footer.php';?>
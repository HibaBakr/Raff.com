<?php include 'header.php'; ?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<?php
if (isset ( $_POST ['phprating'] )) {
	$user_id = $_GET ['small_business'];
	$user_type = "small_business";
	$result = $_POST ['phprating'];
	
	$query = "INSERT INTO rating (user_id, result, user_type) VALUES ('$user_id', '$result', '$user_type')";
	
	$vote_result = mysql_query ( $query ) or die ( "Can't add this rating " . mysql_error () );
	
	// if there is affected rows in the database;
	if ($vote_result) {
		echo "<h2 class='text-center mt-5 mb-5'>تم اضافة التقييم بنجاح .... </h2>";
	} else {
		echo "<h2 align='center'>خطأ أثناء التقييم .... </h2>";
	}
}
?>
<?php include 'footer.php'; ?>
<?php include 'header.php'; ?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<?php
if (isset ( $_POST ['quantity'] )) {
	$id = $_GET ['id'];
	$quantity = $_POST ['quantity'];
	
	$query = "UPDATE cart SET quantity = '$quantity' WHERE id = $id AND customer_id = $_SESSION[user_id]";
	
	$result = mysql_query ( $query ) or die ( "Can't update this quantity " . mysql_error () );
	
	// if there is affected rows in the database;
	if ($result) {
		echo "<h2  class='text-center mt-5 mb-5'>تم تحديث المنتج بنجاح </h2>";
	} else {
		echo "<h3 align='center'>خطأ أثناء التحديث</h2>";
	}
} else {
	$product_quantity = mysql_query ("SELECT * FROM product WHERE id = $_GET[product_id]") or die ("error quantity " . mysql_error ());
	$product_quantity_row = mysql_fetch_array ($product_quantity);
?>

<div class="cssignup-wrap">
	<div class="signup-html">
		<div class="signup-form">
			<h3>تحديث منتج في سلة الشراء</h3><br>
			<div id='signup' class="sign-up-htm" dir="rtl">
				<form class=" sign-up-html" method="post" enctype="multipart/form-data">
					<div class="group">
						<label for="content" class="label ">الكمية</label>
						<input type="number" name="quantity" min="1" class="input" value="<?php echo $_GET['q'];?>">
					</div>
					<div class="group">					
					<br/>
						<input id="reg" name="submit" type="submit" class="button" value="تحديث المنتج"/>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php } ?> 

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php include 'footer.php'; ?>
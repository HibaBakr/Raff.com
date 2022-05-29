<?php include 'header.php'; ?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>

<?php
// get all orders
$order_query = "SELECT order_details.*, orders.*, product.*, order_details.quantity AS order_details_quantity FROM order_details LEFT JOIN orders ON order_details.order_id = orders.id LEFT JOIN product ON order_details.product_id = product.id WHERE order_details.order_id = $_GET[id] AND order_details.product_id IN (SELECT id FROM product WHERE small_business_id = $_SESSION[user_id])";
$order_result = mysql_query ( $order_query ) or die ( "Error " . mysql_error () );
?>

<h2 class=" text-center mt-5 mb-5">تفاصيل الطلب</h2>

<br />


	<table width="100%" align="center" cellpadding=5 cellspacing=5>
		<tr>
			<th>المنتج</th>
			<th>الكمية</th>
			<th>السعر</th>
			<th>المجموع</th>
			<th>الحالة</th>
		</tr>

	<?php
	while ( $order = mysql_fetch_array ( $order_result ) ) { ?>
	<tr align="center">
			<td><?php echo $order['name'];?></td>
			<td><?php echo $order['order_details_quantity'];?></td>
			<td><?php echo $order['price'];?> ريال </td>
			<td><?php echo $order['price'] * $order['order_details_quantity'];?> ريال </td>
			<td><?php echo $order['status'];?></td>
		</tr>
	<?php
	}
	?>
</table>
<?php include 'footer.php'; ?>
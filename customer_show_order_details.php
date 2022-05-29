<?php include 'header.php'; ?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<?php
// get all orders
$order_query = "SELECT order_details.*, orders.*, product.*, product.id AS product_id, order_details.quantity AS order_details_quantity FROM order_details LEFT JOIN orders ON order_details.order_id = orders.id LEFT JOIN product ON order_details.product_id = product.id WHERE order_details.order_id = $_GET[id]";
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
			<th></th>
		</tr>

	<?php
	while ( $order = mysql_fetch_array ( $order_result ) ) { ?>
	<tr align="center">
			<td><?php echo $order['name'];?></td>
			<td><?php echo $order['order_details_quantity'];?></td>
			<td><?php echo $order['price'];?> ريال </td>
			<td><?php echo $order['price'] * $order['order_details_quantity'];?> ريال </td>
			<td><?php echo $order['status'];?></td>
			<td>
				<?php if ($order['status'] == "تم التوصيل" ) { ?>
					<?php // get small bussiness id
						$small_business = mysql_query ( "select small_business_id from product WHERE id = $order[product_id]" ) or die ( mysql_error () );
						$small_business_row = mysql_fetch_array ($small_business);
					?>
					<a href="customer_rate_small_business.php?id=<?php echo $small_business_row['small_business_id'];?>">تقييم الأسرة </a>
				<?php } ?>
			</td>
		</tr>
	<?php
	}
	?>
</table>

<?php include 'footer.php'; ?>
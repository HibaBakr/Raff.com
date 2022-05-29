<?php include 'header.php'; ?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>

<style>
table th {
	background-color: #eee;
	line-height: 20px;
	padding: 5px;
}
</style>

<?php
// get all orders
$all_order_query = "SELECT * FROM order_details WHERE product_id in ( SELECT id FROM product WHERE small_business_id = $_SESSION[user_id]) GROUP BY order_id, status";
$all_order_result = mysql_query ( $all_order_query ) or die ( "Error " . mysql_error () );

// echo mysql_num_rows ($order_result);

?>

<h2 class=" text-center mt-5 mb-5">الطلبات الخاصة بك</h2>
<table width="100%" align="center">
	<tr>
		<th>رقم الطلب</th>
		<th>تاريخ الطلب</th>
		<th>عنوان العميل</th>
		<th>جوال العميل</th>
		<th>اسم العميل</th>
		<th>السعر الاجمالي</th>
		<th>الحالة</th>
		<th></th>
	</tr>

	<?php
	while ( $all_order = mysql_fetch_array ( $all_order_result ) ) {
		// echo $order['order_id'];
		
		$order_query = "SELECT orders.*, CONCAT(customer.first_name, ' ', customer.last_name) AS user_name, customer.mobile FROM orders 
						LEFT JOIN customer ON customer.id = orders.customer_id
						WHERE orders.id = $all_order[order_id]";
		
		$order_result = mysql_query ( $order_query ) or die ( "Error " . mysql_error () );
		$order_result_row = mysql_fetch_array($order_result); ?>
	<tr align="center">
		<td><?php echo $all_order['id'];?><a></a></td>
		<td><?php echo $order_result_row['date'];?></td>
		<td><?php echo $order_result_row['address'];?></td>
		<td><?php echo $order_result_row['mobile'];?></td>
		<td><?php echo $order_result_row['user_name'];?></td>
		<td><?php echo $order_result_row['total_price'];?></td>
		<td><?php echo $all_order['status'];?></td>
		<td>
			<?php if ($all_order['status'] == "قيد التنفيذ" || $all_order['status'] == "تم الإستلام" || $all_order['status'] == "تم توصيله مع السائق" ) { ?>
				<a href="small_business_change_order_status.php?id=<?php echo $all_order['order_id'];?>">تغيير الحالة</a> | 
				<a href="small_business_show_order_details.php?id=<?php echo $all_order['order_id'];?>">تفاصيل الطلب</a>
			<?php } else { ?>
				<a href="small_business_rate_customer.php?id=<?php echo $order_result_row['customer_id'];?>">تقييم العميل </a>
			<?php } ?>
		</td>
	</tr>
	<?php
	}
	?>

</table>

<?php include 'footer.php'; ?>
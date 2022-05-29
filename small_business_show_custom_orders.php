<?php include 'header.php'; ?>

<style>
th {
	background-color: #eee;
	padding: 5px;
}
</style>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>

<h2 class=" text-center mt-5 mb-5">الطلبات الخاصة في النظام</h2>

<table align="center" width="100%">
	<tr>
		<th></th>
		<th>العميل</th>
		<th>التاريخ</th>
		<th>الوصف</th>
		<th>السعر</th>
		<th>التصنيف</th>
		<th>#</th>
	</tr>
<?php
$custom_orders = mysql_query ( "SELECT custom_order.*, custom_order.id AS custom_order_id, category.name AS category_name, customer.first_name, customer.last_name FROM custom_order 
								LEFT JOIN customer ON custom_order.customer_id = customer.id 
								LEFT JOIN category ON custom_order.category_id = category.id
								WHERE custom_order.category_id = '$_SESSION[user_category_id]'" );
while ( $custom_order = mysql_fetch_array ( $custom_orders ) ) { ?>
	<tr>
		<td><img src="images/custom_orders/<?php echo $custom_order['img']?>" width="100" height="100"></td>
		<td><?php echo $custom_order['first_name'] . ' ' . $custom_order['last_name']; ?></td>
		<td><?php echo $custom_order['date']?></td>
		<td><?php echo $custom_order['description']?> </td>
		<td><?php echo $custom_order['price']?></td>
		<td><?php echo $custom_order['category_name']?></td>
		<td>
			<a href="small_business_show_custom_order_offers.php?customer_id=<?php echo $custom_order['customer_id'];?>&id=<?php echo $custom_order['custom_order_id'];?>" class="btn">العروض</a>
		</td>
	</tr>
<?php } ?>
</table>
<br />

<?php include 'footer.php'; ?>
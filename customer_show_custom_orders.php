<?php include 'header.php'; ?>

<style>
th {
	background-color: #eee;
	padding: 5px;
}
</style>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<h2 class=" text-center mt-5 mb-5">الطلبات الخاصة بك في النظام</h2>

<table align="center" width="100%">
	<tr>
		<th></th>
		<th>التاريخ</th>
		<th>الوصف</th>
		<th>السعر</th>
		<th>التصنيف</th>
		<th>#</th>
	</tr>
<?php
// echo $_SESSION[user_id];

$custom_orders = mysql_query ( "SELECT custom_order.*, custom_order.id AS custom_order_id, category.name AS category_name FROM custom_order 
								LEFT JOIN category ON custom_order.category_id = category.id
								WHERE custom_order.customer_id = '$_SESSION[user_id]'" ) or die ("error order " . mysql_error ());
while ( $custom_order = mysql_fetch_array ( $custom_orders ) ) { ?>
	<tr>
		<td><img src="images/custom_orders/<?php echo $custom_order['img']?>" width="100" height="100"></td>
		<td><?php echo $custom_order['date']?></td>
		<td><?php echo $custom_order['description']?> </td>
		<td><?php echo $custom_order['price']?></td>
		<td><?php echo $custom_order['category_name']?></td>
		<td>
			<a href="customer_show_custom_order_offers.php?id=<?php echo $custom_order['custom_order_id'];?>" class="btn">العروض</a>
		</td>
	</tr>
<?php } ?>
	<tr>
		<td colspan="6" align="center"><a href="customer_add_custom_order.php">إضافة طلب خاص جديد</a></td>
	</tr>
</table>
<br />

<?php include 'footer.php'; ?>
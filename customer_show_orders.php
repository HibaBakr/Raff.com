<?php include 'header.php'; ?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<?php
// get all orders
$orders_query = "SELECT * FROM orders WHERE customer_id = $_SESSION[user_id] ORDER BY date ASC";
$orders_result = mysql_query ( $orders_query ) or die ( "Error " . mysql_error () );
?>

<h2 class=" text-center mt-5 mb-5">الطلبات الخاصة بك</h2>

<br />

	<table width="100%" align="center" cellpadding=5 cellspacing=5>
		<tr>
			<th>رقم الطلب</th>
			<th>تاريخ الطلب</th>
			<th>العنوان</th>
			<th>السعر الاجمالي</th>
			<th>#</th>
		</tr>

	<?php
	while ( $order = mysql_fetch_array ( $orders_result ) ) {
		?>
	<tr align="center">
			<td><?php echo $order['id'];?></td>
			<td><?php echo $order['date'];?></td>
			<td><?php echo $order['address'];?></td>
			<td><?php echo $order['total_price'];?> ريال </td>
			<td><a href="customer_show_order_details.php?id=<?php echo $order['id'];?>" >التفاصيل</a></td>
		</tr>
	<?php
	}
	?>
</table>

<br/>
<br/>
<br/>
<?php include 'footer.php'; ?>
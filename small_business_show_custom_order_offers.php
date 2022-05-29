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

<h2 class=" text-center mt-5 mb-5">العروض الخاصة بك على الطلب الخاص</h2>

<table align="center" width="100%">
	<tr>
		<th>التفاصيل</th>
		<th>الحالة</th>
	</tr>
<?php
$offers = mysql_query ( "SELECT * FROM offer WHERE custom_order_id = '$_GET[id]' AND small_business_id = '$_SESSION[user_id]'" );

while ( $offer = mysql_fetch_array ( $offers ) ) { ?>
	<tr>
		<td><?php echo $offer['details'];?></td>
		<td><?php echo $offer['status'];?></td>
	</tr>
<?php } ?>
	<tr>
		<td colspan="2" align="center">
			<a href="small_business_add_offer.php?customer_id=<?php echo $_GET['customer_id'];?>&id=<?php echo $_GET['id'];?>" class="btn">ارسال عرض</a>
		</td>
	</tr>
</table>
<br />

<?php include 'footer.php'; ?>
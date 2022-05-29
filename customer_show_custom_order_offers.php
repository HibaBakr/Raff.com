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

<h2 class=" text-center mt-5 mb-5">عرض الأسر على الطلب الخاص</h2>

<table align="center" width="100%">
	<tr>
		<th>الأسرة</th>
		<th>التفاصيل</th>
		<th>الحالة</th>
		<th>#</th>
	</tr>
<?php
$offers = mysql_query ( "SELECT offer.*, small_business.name AS small_business_name FROM offer 
						LEFT JOIN small_business ON offer.small_business_id = small_business.id 
						WHERE custom_order_id = '$_GET[id]'" );
while ( $offer = mysql_fetch_array ( $offers ) ) { ?>
	<tr>
		<td><?php echo $offer['small_business_name'];?></td>
		<td><?php echo $offer['details'];?></td>
		<td><?php echo $offer['status'];?></td>
		<?php if ($offer['status'] == "قيد التنفيذ") { ?>
		<td>
			<a href="customer_accept_offer.php?id=<?php echo $offer['id'];?>" class="btn">قبول</a>
			<a href="customer_refuse_offer.php?id=<?php echo $offer['id'];?>" class="btn">رفض</a>
		</td>
		<?php } ?>
	</tr>
<?php } ?>
</table>
<br />

<?php include 'footer.php'; ?>
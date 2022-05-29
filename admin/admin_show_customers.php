<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: index.php" );
}
?>

<?php
// get all information for the customers
$customers_query = "SELECT * FROM customer";
$customers_result = mysql_query ( $customers_query ) or die ( 'error : ' . mysql_error () );
?>

<div class="main">
	<div class="container smdata">
		<h2>بيانات العملاء</h2>
		<div class="card-box mb-30">
			<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
					<tr>
						<th>الاسم</th>
						<th>الايميل</th>
						<th>الجوال</th>
						<th>تاريخ الميلاد</th>
						<th>العنوان</th>
						<th>المدينة</th>
						<th>#</th>
					</tr>
					<?php while ($customer_row = mysql_fetch_array($customers_result)) { ?>
					<tr>
						<td><?php echo $customer_row['first_name'] . ' ' . $customer_row['last_name'];?></td>
						<td><?php echo $customer_row['email'];?></td>
						<td><?php echo $customer_row['mobile'];?></td>
						<td><?php echo $customer_row['dob'];?></td>
						<td><?php echo $customer_row['address'];?></td>
						<td><?php echo $customer_row['city'];?></td>
						<td><a href="#" onclick="if(window.confirm('هل تريد الحذف ؟ ')) window.location='admin_delete_customer.php?id=<?php echo $customer_row['id']?>'">حذف</a></td>
					</tr>
					<?php }?>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php';?>
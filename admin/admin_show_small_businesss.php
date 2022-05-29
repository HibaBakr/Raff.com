<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: index.php" );
}
?>

<?php
// get all information for the small_businesss
$small_businesss_query = "SELECT small_business.*, category.name AS category_name FROM small_business
							LEFT JOIN category ON small_business.category_id = category.id
							WHERE small_business.status = 'تم التأكيد'";
$small_businesss_result = mysql_query ( $small_businesss_query ) or die ( 'error : ' . mysql_error () );
?>

<div class="main">
	<div class="container smdata">
		<h2>الأسر الصغيرة</h2>
		<div class="card-box mb-30">
			<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
					<tr>
						<th>الاسم</th>
						<th>الايميل</th>
						<th>الجوال</th>
						<th>المدينة</th>
						<th>رقم معروف</th>
						<th>الشحن</th>
						<th>التصنيف</th>
						<th></th>
					</tr>
					<?php while ($small_business_row = mysql_fetch_array($small_businesss_result)) { ?>
					<tr>
						<td><?php echo $small_business_row['name'];?></td>
						<td><?php echo $small_business_row['email'];?></td>
						<td><?php echo $small_business_row['mobile'];?></td>
						<td><?php echo $small_business_row['city'];?></td>
						<td><?php echo $small_business_row['maroof'];?></td>
						<td><?php echo $small_business_row['shipment'];?></td>
						<td><?php echo $small_business_row['category_name'];?></td>
						<td>
							<a href="#" onclick="if(window.confirm('هل تريد الحذف ؟ ')) window.location='admin_delete_small_business.php?id=<?php echo $small_business_row['id']?>'">حذف</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php';?>
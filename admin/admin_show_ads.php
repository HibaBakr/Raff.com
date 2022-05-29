<?php include 'header.php'; ?>

<style>
th {
	background-color: #eee;
	padding: 5px;
}
</style>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: index.php" );
}
?>

<div class="main">
	<div class="container smdata">
		<h2>العروض</h2>
		<div class="card-box mb-30">
			<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
				<tr>
					<th>الصورة</th>
					<th>#</th>
				</tr>
				<?php
				$adss = mysql_query ( "SELECT * FROM ads" );
				while ( $ads = mysql_fetch_array ( $adss ) ) { ?>
					<tr>
						<td><img src="../images/adss/<?php echo $ads['img']?>" width="100" height="100"></td>
						<td>
							<a href="#" onclick="if(confirm('هل تريد الحذف ؟')) window.location='admin_delete_ads.php?id=<?php echo $ads['id'];?>'" class="btn">حذف</a> | 
							<a href="admin_edit_ads.php?id=<?php echo $ads['id'];?>" class="btn">تحديث</a>
						</td>
					</tr>
				<?php } ?>
					<tr>
						<td colspan="2" align="center"><a href="admin_add_ads.php">إضافة عرض جديد</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
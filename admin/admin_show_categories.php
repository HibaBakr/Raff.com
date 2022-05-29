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
		<h2>التصنيفات</h2>
		<div class="card-box mb-30">
			<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
				<tr>
					<th>الاسم</th>
					<th>الوصف</th>
					<th>الصورة</th>
					<th>#</th>
				</tr>
				<?php
				$categorys = mysql_query ( "SELECT * FROM category" );
				while ( $category = mysql_fetch_array ( $categorys ) ) { ?>
					<tr>
						<td><?php echo $category['name']?></td>
						<td><?php echo $category['description']?></td>
						<td><img src="../images/categories/<?php echo $category['img']?>" width="100" height="100"></td>
						<td>
							<a href="#" onclick="if(confirm('هل تريد الحذف ؟')) window.location='admin_delete_category.php?id=<?php echo $category['id'];?>'" class="btn">حذف</a> | 
							<a href="admin_edit_category.php?id=<?php echo $category['id'];?>" class="btn">تحديث</a>
						</td>
					</tr>
				<?php } ?>
					<tr>
						<td colspan="4" align="center"><a href="admin_add_category.php">إضافة تصنيف جديد</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
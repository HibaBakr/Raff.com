<?php include 'header.php';?>

<style>
td {
	text-align: center;
}

th {
	background-color: #eee;
}
</style>
<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: index.php" );
}
?>

<br />
<?php
$comments_query = "SELECT comment.*, comment.id AS comment_id, customer.*, product.name AS product_name FROM comment 
					LEFT JOIN customer ON customer.id = comment.customer_id 
					LEFT JOIN product ON product.id = comment.product_id ";
$comments_result = mysql_query ( $comments_query ) or die ( 'error : ' . mysql_error () );
// echo mysql_num_rows($comments_result);
?>
<div class="main">
	<div class="container smdata">
		<h2>التصنيفات</h2>
		<div class="card-box mb-30">
			<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
				<tr>
					<th>المنتج</th>
					<th>صاحب التعليق</th>
					<th>محتوى التعليق</th>
					<th>التاريخ</th>
					<th>#</th>
				</tr>
				<?php while ($comment_row = mysql_fetch_array($comments_result)) { ?>
				<tr>
					<td><?php echo $comment_row['product_name'];?></td>
					<td><?php echo $comment_row['first_name'] . ' ' . $comment_row['last_name'];?></td>
					<td><?php echo $comment_row['content'];?></td>
					<td><?php echo $comment_row['created']?></td>
					<td><a href="#" onclick="if(window.confirm('هل تريد الحذف ؟ ')) window.location='admin_delete_comment.php?id=<?php echo $comment_row['comment_id']?>'">حذف</a></td>
				</tr>
				<?php }?>
			</table>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php';?>
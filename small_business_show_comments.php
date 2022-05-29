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
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>

<br />
<?php
$comments_query = "SELECT comment.*, comment.id AS comment_id, customer.*, product.name AS product_name FROM comment 
					LEFT JOIN customer ON customer.id = comment.customer_id 
					LEFT JOIN product ON product.id = comment.product_id 
					WHERE product.small_business_id = '$_SESSION[user_id]'";
$comments_result = mysql_query ( $comments_query ) or die ( 'error : ' . mysql_error () );
// echo mysql_num_rows($comments_result);
?>

<h2 class=" text-center mt-5 mb-5">تعليقات المستخدمين على المنتجات</h2>

<table width="100%" align="center" cellpadding=5 cellspacing=5>
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
		<td>
			<a href="small_business_show_comment_replys.php?id=<?php echo $comment_row['comment_id']?>">عرض الردود</a> | 
			<a href="small_business_reply_comment.php?id=<?php echo $comment_row['comment_id']?>">الرد</a>
		</td>
	</tr>
	<?php }?>
</table>

<?php include 'footer.php';?>
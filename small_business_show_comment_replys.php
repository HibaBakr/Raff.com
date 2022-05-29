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
$replys_query = "SELECT * FROM reply WHERE comment_id = '$_GET[id]'";
$replys_result = mysql_query ( $replys_query ) or die ( 'error : ' . mysql_error () );
// echo mysql_num_rows($replys_result);
?>

<h2 class=" text-center mt-5 mb-5">الردود على التعليق</h2>

<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th>محتوى الرد</th>
		<th>التاريخ</th>
	</tr>
	<?php while ($reply_row = mysql_fetch_array($replys_result)) { ?>
	<tr>
		<td><?php echo $reply_row['content'];?></td>
		<td><?php echo $reply_row['created']?></td>
	</tr>
	<?php }?>
</table>

<?php include 'footer.php';?>
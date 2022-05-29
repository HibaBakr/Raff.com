<?php include 'header.php';?>

<?php

// if he not logged in ; redirect to the index pgender
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>

<?php
// get all information for the small_business2
$collaborate_query = "SELECT collaborate_message.*, small_business.name AS small_business_name FROM collaborate_message
				LEFT JOIN small_business ON collaborate_message.small_business1_id = small_business.id
				WHERE collaborate_message.small_business2_id = '$_SESSION[user_id]'";
$collaborate_result = mysql_query ( $collaborate_query ) or die ( 'error : ' . mysql_error () );
?>

<h2 class=" text-center mt-5 mb-5">التعاون الخاص بك</h2>

<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th>الأسرة</th>
		<th>المحتوى</th>
		<th></th>
	</tr>
	<?php while ($collaborate_row = mysql_fetch_array($collaborate_result)) { ?>
	<tr>
		<td><?php echo $collaborate_row['small_business_name']?></td>
		<td><?php echo $collaborate_row['content']?></td>
		<td>
			<a href="small_business_collaborate_message.php?small_business2_id=<?php echo $collaborate_row['small_business1_id']?>">تعاون</a>
		</td>
	</tr>
	<?php }?>
</table>

<?php include 'footer.php';?>
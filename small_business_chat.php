<?php include 'header.php';?>

<?php

// if he not logged in ; redirect to the index pgender
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>

<?php
// get all information for the customer
$chat_query = "SELECT message.*, CONCAT(customer.first_name, ' ', customer.last_name) AS customer_name FROM message
				LEFT JOIN customer ON message.customer_id = customer.id
				WHERE message.small_business_id = '$_SESSION[user_id]'
				GROUP BY message.customer_id";
$chat_result = mysql_query ( $chat_query ) or die ( 'error : ' . mysql_error () );
?>

<h2 class=" text-center mt-5 mb-5">الشات الخاصة بك</h2>

<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th>الاسم</th>
		<th></th>
	</tr>
	<?php while ($chat_row = mysql_fetch_array($chat_result)) { ?>
	<tr>
		<td><?php echo $chat_row['customer_name']?></td>
		<td>
			<a href="small_business_chat_messages.php?customer_id=<?php echo $chat_row['customer_id']?>">بداية الشات</a>
		</td>
	</tr>
	<?php }?>
</table>

<?php include 'footer.php';?>
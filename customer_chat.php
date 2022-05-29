<?php include 'header.php';?>

<?php

// if he not logged in ; redirect to the index pgender
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<?php
// get all information for the user
$chat_query = "SELECT message.*, small_business.name FROM message
				LEFT JOIN small_business ON message.small_business_id = small_business.id 
				WHERE message.customer_id = '$_SESSION[user_id]'
				GROUP BY message.small_business_id";
$chat_result = mysql_query ( $chat_query ) or die ( 'error : ' . mysql_error () );
?>

<h2 class=" text-center mt-5 mb-5">الشات الخاصة بك</h2>

<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th>اسم الأسرة</th>
		<th></th>
	</tr>
	<?php while ($chat_row = mysql_fetch_array($chat_result)) {?>
	<tr>
		<td><?php echo $chat_row['name']?></td>
		<td>
			<a href="customer_chat_messages.php?small_business_id=<?php echo $chat_row['small_business_id']?>">ابدأ الشات</a>
		</td>
	</tr>
	<?php }?>
</table>

<?php include 'footer.php';?>
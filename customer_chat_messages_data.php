<?php
include 'config.php';

$customer_id = $_SESSION['user_id'];
$small_business_id = $_GET['small_business_id'];

// get messages
$messages = mysql_query("SELECT * FROM message WHERE message.small_business_id = '$small_business_id' AND message.customer_id = '$customer_id' " ) or die (" error messages info " . mysql_error ());

echo '<ul class="m-b-0">';

while($message = mysql_fetch_array ($messages)) {
	// check the message owner
	if ($message['message_owner_id'] == $customer_id) {
		echo "<li class='clearfix'>
			<div class='message-data text-right'>
				<span class='message-data-time'>$message[date]</span>
			</div>
			<div class='message other-message float-right'> $message[content]</div>
		</li>";
	} else {
		echo "<li class='clearfix'>
			<div class='message-data'>
				<span class='message-data-time'>$message[date]</span>
			</div>
			<div class='message my-message'> $message[content]</div>
		</li>";
	}
}

echo '</ul>';
?>
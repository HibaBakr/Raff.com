<?php
include 'config.php';

// message vars
$content = $_POST['content'];
$customer_id = $_POST['customer_id'];
$small_business_id = $_POST['small_business_id'];

// insert message
mysql_query ("INSERT INTO message (content, small_business_id, customer_id, message_owner_id) VALUES ('$content', '$small_business_id', '$customer_id', '$small_business_id')");
    
?>
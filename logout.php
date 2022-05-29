<?php include 'headerL2.php';?>

<?php
// destroy the sessions
session_destroy();

echo "<script>alert('شكراً لك على استخدام النظام');</script>";

// redirect to the index.php
header("REFRESH:0; url=index.php");
?>


<?php include 'footerL2.php';?>
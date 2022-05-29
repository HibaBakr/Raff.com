<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer" && $_SESSION ['user_type'] != "small_business" && $_SESSION['user_type'] != 'admin') {
	header ( "Location: index.php" );
}
?>

<?php
// get all information for the notifications
$notifications_query = "SELECT * FROM notifications WHERE user_id = '$_SESSION[user_id]' AND user_type = '$_SESSION[user_type]'";

$notifications_result = mysql_query ( $notifications_query ) or die ( 'error : ' . mysql_error () );
?>

<div class="notification_div">
	<div class="min-height-200px">
		<div class="col-lg-12 col-md-12 col-sm-12 mb-30">
			<div class="pd-20 card-box height-100-p">
				<h4 class="h4">التنبيهات</h4>
				<p class="pb-20">جميع التنبيهات الخاصة بك تعرض هنا</p>
				<?php
				// if there is no notification for the student
				if (mysql_num_rows ( $notifications_result ) != 0) {
					while ( $notification_row = mysql_fetch_array ( $notifications_result ) ) { ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?php echo $notification_row['content']?> <strong>بتاريخ </strong> <?php echo $notification_row['created']?>
						</div>
					<?php }?>
				<?php }?>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php';?>
<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION['user_type'] != 'admin') {
	header ( "Location: index.php" );
}
?>

<?php
// get all information for the notifications
$notifications_query = "SELECT * FROM notifications WHERE user_id = '$_SESSION[user_id]' AND user_type = '$_SESSION[user_type]'";

$notifications_result = mysql_query ( $notifications_query ) or die ( 'error : ' . mysql_error () );
?>

<div class="main">
	<div class="container smdata">
		<h2>جميع التنبيهات الخاصة بك تعرض هنا</h2>
		<div class="card-box mb-30">
			<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
				<?php while ( $notification_row = mysql_fetch_array ( $notifications_result ) ) { ?>
						<tr>
							<td>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<?php echo $notification_row['content']?> <strong>بتاريخ </strong> <?php echo $notification_row['created']?>
								</div>
							</td>
						</tr>
					<?php }?>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php';?>
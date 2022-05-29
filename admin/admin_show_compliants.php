<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: index.php" );
}
?>

<?php
$complaints = mysql_query ( "SELECT compliant.*, CONCAT(customer.first_name, ' ', customer.last_name) AS name FROM compliant 
							LEFT JOIN customer ON customer.id = compliant.user_id 
							WHERE compliant.user_type = 'customer' 
							ORDER BY compliant.date DESC" );
?>

<div class="main">
	<div class="container smdata">
		<h2>شكاوى العملاء</h2>
		<div class="card-box mb-30">
			<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
					<tr>
						<th>العميل</th>
						<th>المحتوى</th>
						<th>الرد</th>
						<th>التاريخ</th>
						<th>#</th>
					</tr>
				<?php while ($complaint_row = mysql_fetch_array ( $complaints )) {?>
					<tr>
						<td><?php echo $complaint_row['name'];?></td>
						<td><?php echo $complaint_row['content'];?></td>
						<td><?php echo $complaint_row['reply'];?></td>
						<td><?php echo $complaint_row['date'];?></td>
						<td>
							<?php if ($complaint_row['reply'] == "") {  ?>
								<a href="admin_reply_complaint.php?id=<?php echo $complaint_row['id'];?>">الرد</a>
							<?php } ?>
						</td>
					</tr>
				<?php }?>
				</table>
			</div>
		</div>
	</div>
</div>

<br />
<br />

<?php
$complaints = mysql_query ( "SELECT compliant.*, small_business.name FROM compliant 
							LEFT JOIN small_business ON small_business.id = compliant.user_id 
							WHERE compliant.user_type = 'small_business' 
							ORDER BY compliant.date DESC" );
?>
<div class="main">
	<div class="container smdata">
		<h2>شكاوى الأسر الصغيرة</h2>
		<div class="card-box mb-30">
			<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
					<tr>
						<th>الأسرة</th>
						<th>المحتوى</th>
						<th>الرد</th>
						<th>التاريخ</th>
						<th>#</th>
					</tr>
					<?php while ($complaint_row = mysql_fetch_array ( $complaints )) {?>
						<tr>
							<td><?php echo $complaint_row['name'];?></td>
							<td><?php echo $complaint_row['content'];?></td>
							<td><?php echo $complaint_row['reply'];?></td>
							<td><?php echo $complaint_row['date'];?></td>
							<td>
								<?php if ($complaint_row['reply'] == "") {  ?>
									<a href="admin_reply_complaint.php?id=<?php echo $complaint_row['id'];?>">الرد</a>
								<?php } ?>
							</td>
						</tr>
					<?php }?>
				</table>
			</div>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>
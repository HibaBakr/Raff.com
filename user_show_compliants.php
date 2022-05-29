<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business" && $_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<h2 class=" text-center mt-5 mb-5">الشكاوى الخاصة بك</h2>

<?php
$complaints = mysql_query ( "SELECT * FROM compliant WHERE compliant.user_type = '$_SESSION[user_type]' AND user_id = '$_SESSION[user_id]' ORDER BY compliant.date DESC" );
?>

<table width="100%" align="center" cellpdding="10" cellspacing="10">
	<tr>
		<th>المحتوى</th>
		<th>الرد</th>
		<th>التاريخ</th>
	</tr>

<?php while ($complaint_row = mysql_fetch_array ( $complaints )) {?>
	<tr>
		<td><?php echo $complaint_row['content'];?></td>
		<td><?php echo $complaint_row['reply'];?></td>
		<td><?php echo $complaint_row['date'];?></td>
	</tr>
<?php }?>
	<tr>
		<td colspan="4" align="center"><a href="user_send_compliant.php">إرسال شكوى جديدة</a></td>
	</tr>
</table>
<br />
<br />

<?php require 'footer.php'; ?>
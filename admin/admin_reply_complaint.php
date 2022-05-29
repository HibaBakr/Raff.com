<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: index.php" );
}
?>

<div class="main" dir="rtl">
	<div class="BAborder">
		<h6 class="BAfont">إضافة رد على الشكوى</h6><br>
		<form method="post" enctype="multipart/form-data" action="admin_reply_complaint_check.php?id=<?php echo $_GET['id']; ?>">
			<table align="center" width="100%">
				<tr>
					<th><label for="content" class="label ">الرد *</label></th>
					<td><textarea id="reply" name="reply" class="BAlabels " required></textarea></td>
				</tr>
				<tr>
					<td align="center" colspan="2"><button class="BAbutton" type="submit">اضافة</button></td>
				</tr>
			</table>
		</form>
	</div>
</div>

<?php include 'footer.php';?>
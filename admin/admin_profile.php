<?php include "header.php" ?>

<?php 
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: index.php" );
}
?>

<?php
if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$update_query = "UPDATE admin SET email = '$email', password = '$password' WHERE id = '$_SESSION[user_id]'";
	
	$update_admin_result = mysql_query($update_query) or die ("Can't update this admin " . mysql_error());

	// if there is affected rows in the database;
	if (mysql_affected_rows() == 1) {
		echo "<script>alert('تم التحديث بنجاح');</script>";
	} else {
		echo "<script>alert('حدث خطأ في التحديث');</script>";
	}
}	
	// if the admin is loggedin
	$query = "SELECT * FROM admin WHERE id = '$_SESSION[user_id]'";
	$admin_result = mysql_query($query) or die("can't run query because " . mysql_error());

	$admin_row = mysql_fetch_array($admin_result);
?>
<div class="main" dir="rtl">
	<div class="BAborder">
		<h6 class="BAfont">الملف الشخصي</h6><br>
		<form method="post" enctype="multipart/form-data" action="admin_reply_complaint_check.php?id=<?php echo $_GET['id']; ?>">
			<table align="center" width="100%">
				<tr>
					<th><label for="email" class="label ">الايميل *</label></th>
					<td><input id="email" name="email" value="<?php echo $admin_row['email'];?>" class="BAlabels " required></textarea></td>
				</tr>
				<tr>
					<th><label for="password" class="label ">كلمة المرور *</label></th>
					<td><input id="password" name="password" value="<?php echo $admin_row['password'];?>" class="BAlabels " required  pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Capital and samll letters and numbers more than six characters" /></td>
				</tr>
				<tr>
					<td align="center" colspan="2"><button class="BAbutton" type="submit">اضافة</button></td>
				</tr>
			</table>
		</form>
	</div>
</div>

<?php include "footer.php" ?>
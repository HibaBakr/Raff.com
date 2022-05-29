<?php include "headerL2.php" ?>

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
		<!--header ends -->
        <!------------ضعي الكود هنا-------------->
        <div class="container fill_height">
                <div class="cssignup-wrap">
                    <div class="signup-html">
                        <div class="signup-form">
                            <h3>الملف الشخصي</h3><br>
                            <div id='signup' class="sign-up-htm " dir="rtl">
                                <form class=" sign-up-html" method="post">
									<div class="group ">
										<label for="email" class="label ">البريد الالكتروني *</label>
                                        <input type="email" id="email" class="input " name="email" placeholder="a@example.com" required value="<?php echo $admin_row['email'];?>"/>
										
										<label for="password" class="label">كلمة المرور *</label>
                                        <input id="password" type="password" class="input" name="password" required value="<?php echo $admin_row['password'];?>"  pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Capital and samll letters and numbers more than six characters"/>
										
										<br/>
                                        <input id="reg" type="submit" class="button" value="تحديث "/>
										
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
        </div>

        <!------------الكود ينتهي هنا-------------->
        <!-- Footer starts -->
		
<?php include "footerL2.php" ?>
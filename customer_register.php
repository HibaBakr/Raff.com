<?php include "headerL2.php" ?>

<?php 
if ($_SESSION ['user_type'] != "") {
	header ( "Location: index.php" );
}
?>

<?php
if (isset($_POST['first_name'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$mobile = $_POST['mobile'];
	$dob = $_POST['dob'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	
	$insert_query = "INSERT INTO customer (first_name, last_name, email, password, mobile, dob, address, city) VALUES ('$first_name', '$last_name', '$email', '$password', '$mobile', '$dob', '$address', '$city')";
	
	
	$insert_customer_result = mysql_query($insert_query) or die ("Can't insert this customer " . mysql_error());

	// if there is affected rows in the database;
	if (mysql_affected_rows() == 1) {
		echo "<script>alert('تم التسجيل بنجاح');</script>";

		// redirect to the home page
		header("REFRESH:0; url=index.php");
	} else {
		echo "<script>alert('حدث خطأ في التسجيل');</script>";
		
		// redirect to the home page
		header("REFRESH:0; url=index.php");
	}
} else {
?>
		<!--header ends -->
        <!------------ضعي الكود هنا-------------->
        <div class="container fill_height">
                <div class="cssignup-wrap">
                    <div class="signup-html">
                        <div class="signup-form">
                            <h3>تسجيل عميل جديد</h3><br>
                            <div id='signup' class="sign-up-htm " dir="rtl">
                                <form class=" sign-up-html" method="post">
                                    <div class="group ">
                                        <div class="row ">
                                            <div class="col-6 ">
                                                <label for="first_name" class="label ">الاسم الاول *</label>
                                                <input id="first_name" type="text" name="first_name" class="input " required />
                                            </div>
                                            <div class="col-6 ">
                                                <label for="last_name" class="label ">الاسم الاخير  *</label>
                                                <input id="last_name" type="text" name="last_name" class="input " required />
                                            </div>
                                        </div>
										<label for="email" class="label ">البريد الالكتروني *</label>
                                        <input type="email" id="email" class="input " name="email" placeholder="a@example.com" required />
										
										<label for="password" class="label">كلمة المرور *</label>
                                        <input id="password" type="password" class="input" name="password" required  pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Capital and samll letters and numbers more than six characters"/>
										
										<label for="mobile" class="label">رقم الجوال *</label>
                                        <input type="tel" id="mobile" class="input " name="mobile" placeholder="********05" pattern="05[0-9]{8}" size="10" required />
										
										<label for="dob" class="label">تاريخ الميلاد *</label>
                                        <input type="date" id="dob" class="input " name="dob" max="2000-12-31" size="10" required />
										
										<label for="address" class="label">العنوان *</label>
                                        <input type="text" id="address" class="input " name="address" size="10" required />
										
                                        <label for="city" class="label">المدينة *</label>
                                        <select id="city" class="input" name="city">
										  <option value="Medina">المدينة المنورة</option>
										  <option value="Makkah">مكة</option>
										  <option value="Riyadh">الرياض</option>
										  <option value="Jeddah">جدة</option>
										  <option value="Taif">الطائف</option>
										  <option value="Yanbu">ينبع</option>
										  <option value="Tabuk">تبوك</option>
										  <option value="Dammam">الدمام</option>
										  <option value="Hail">حائل</option>
										</select>
										<br/>
                                        <input id="reg" type="submit" class="button" value="تسجيل "/>
										
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
        </div>

<?php }  // end of check submit ?>

        <!------------الكود ينتهي هنا-------------->
        <!-- Footer starts -->
		
<?php include "footerL2.php" ?>
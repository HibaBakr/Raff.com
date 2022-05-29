<?php include "headerL2.php" ?>

<?php 
if ($_SESSION ['user_type'] != "customer") {
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
	
	$update_query = "UPDATE customer SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password', mobile = '$mobile', dob = '$dob', address = '$address', city = '$city' WHERE id = '$_SESSION[user_id]'";
	
	$update_customer_result = mysql_query($update_query) or die ("Can't update this customer " . mysql_error());

	// if there is affected rows in the database;
	if (mysql_affected_rows() == 1) {
		echo "<script>alert('تم التحديث بنجاح');</script>";
	} else {
		echo "<script>alert('حدث خطأ في التحديث');</script>";
	}
}	
	// if the customer is loggedin
	$query = "SELECT * FROM customer WHERE id = '$_SESSION[user_id]'";
	$customer_result = mysql_query($query) or die("can't run query because " . mysql_error());

	$customer_row = mysql_fetch_array($customer_result);
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
                                        <div class="row ">
                                            <div class="col-6 ">
                                                <label for="first_name" class="label ">الاسم الاول *</label>
                                                <input id="first_name" type="text" name="first_name" class="input " required value="<?php echo $customer_row['first_name'];?>"/>
                                            </div>
                                            <div class="col-6 ">
                                                <label for="last_name" class="label ">الاسم الاخير  *</label>
                                                <input id="last_name" type="text" name="last_name" class="input " required value="<?php echo $customer_row['last_name'];?>"/>
                                            </div>
                                        </div>
										<label for="email" class="label ">البريد الالكتروني *</label>
                                        <input type="email" id="email" class="input " name="email" placeholder="a@example.com" required value="<?php echo $customer_row['email'];?>"/>
										
										<label for="password" class="label">كلمة المرور *</label>
                                        <input id="password" type="password" class="input" name="password" required value="<?php echo $customer_row['password'];?>"  pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Capital and samll letters and numbers more than six characters"/>
										
										<label for="mobile" class="label">رقم الجوال *</label>
                                        <input type="tel" id="mobile" class="input " name="mobile" placeholder="********05" pattern="05[0-9]{8}" size="10" required value="<?php echo $customer_row['mobile'];?>"/>
										
										<label for="dob" class="label">تاريخ الميلاد *</label>
                                        <input type="date" id="dob" class="input " name="dob" max="2000-12-31" size="10" required value="<?php echo $customer_row['dob'];?>"/>
										
										<label for="address" class="label">العنوان *</label>
                                        <input type="text" id="address" class="input " name="address" size="10" required value="<?php echo $customer_row['address'];?>"/>
										
                                        <label for="city" class="label">المدينة *</label>
                                        <select id="city" class="input" name="city">
										  <option value="Medina" <?php if($customer_row['city'] == "Medina") echo "selected";?>>المدينة المنورة</option>
										  <option value="Makkah" <?php if($customer_row['city'] == "Makkah") echo "selected";?>>مكة</option>
										  <option value="Riyadh" <?php if($customer_row['city'] == "Riyadh") echo "selected";?>>الرياض</option>
										  <option value="Jeddah" <?php if($customer_row['city'] == "Jeddah") echo "selected";?>>جدة</option>
										  <option value="Taif" <?php if($customer_row['city'] == "Taif") echo "selected";?>>الطائف</option>
										  <option value="Yanbu" <?php if($customer_row['city'] == "Yanbu") echo "selected";?>>ينبع</option>
										  <option value="Tabuk" <?php if($customer_row['city'] == "Tabuk") echo "selected";?>>تبوك</option>
										  <option value="Dammam" <?php if($customer_row['city'] == "Dammam") echo "selected";?>>الدمام</option>
										  <option value="Hail" <?php if($customer_row['city'] == "Hail") echo "selected";?>>حائل</option>
										</select>
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
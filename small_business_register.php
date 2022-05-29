<?php include "headerL2.php" ?>

<?php 
if ($_SESSION ['user_type'] != "") {
	header ( "Location: index.php" );
}
?>

<?php
if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$mobile = $_POST['mobile'];
	$policy = $_POST['policy'];
	$iban = $_POST['iban'];
	$shipment = $_POST['shipment'];
	$city = $_POST['city'];
	$maroof = $_POST['maroof'];
	$category_id = $_POST['category_id'];
	
	$insert_query = "INSERT INTO small_business (name, policy, email, password, mobile, iban, shipment, city, maroof, category_id) VALUES ('$name', '$policy', '$email', '$password', '$mobile', '$iban', '$shipment', '$city', '$maroof', '$category_id')";
	
	$insert_small_business_result = mysql_query($insert_query) or die ("Can't insert this small_business " . mysql_error());

	// if there is affected rows in the database;
	if (mysql_affected_rows() == 1) {
		echo "<script>alert('تم التسجيل بنجاح');</script>";

	// send notificaiton to the admin
	mysql_query ("INSERT INTO notifications (content, user_id, user_type) VALUES ('لقد تم تسجيل أسرة جديدة', '1', 'admin') ");
		// redirect to the home page
		header("REFRESH:0; url=index.php");
	} else {
		echo "<script>alert('حدث خطأ في التسجيل');</script>";
		
		// redirect to the home page
		header("REFRESH:0; url=index.php");
	}
} else {
	$categories = mysql_query ("SELECT * FROM category");
?>
		<!--header ends -->
        <!------------ضعي الكود هنا-------------->
        <div class="container fill_height">
                <div class="cssignup-wrap">
                    <div class="signup-html">
                        <div class="signup-form">
                            <h3>تسجيل أسرة جديدة</h3><br>
                            <div id='signup' class="sign-up-htm " dir="rtl">
                                <form class=" sign-up-html" method="post">
                                    <div class="group ">
										<label for="name" class="label ">الاسم *</label>
										<input id="name" type="text" name="name" class="input " required />
										
										<label for="email" class="label ">البريد الالكتروني *</label>
                                        <input type="email" id="email" class="input " name="email" placeholder="a@example.com" required />
										
										<label for="password" class="label">كلمة المرور *</label>
                                        <input id="password" type="password" class="input" name="password" required  pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Capital and samll letters and numbers more than six characters"/>
										
										<label for="mobile" class="label">رقم الجوال *</label>
                                        <input type="tel" id="mobile" class="input " name="mobile" placeholder="********05" pattern="05[0-9]{8}" size="10" required />
										
										<label for="policy" class="label ">السياسة  *</label>
                                        <input id="policy" type="text" name="policy" class="input " required />
										
										<label for="iban" class="label">الأيبان *</label>
                                        <input type="text" id="iban" class="input " name="iban" size="10" required />
										
										<label for="shipment" class="label">الشحن *</label>
                                        <input type="text" id="shipment" class="input " name="shipment" size="10" required />
										
										<label for="maroof" class="label">رقم معروف *</label>
                                        <input type="number" id="maroof" class="input " name="maroof" min="1" size="10" required />
										
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
										
										<label for="category_id" class="label ">التصنيف</label>
										<select name="category_id" class="input ">
											<?php while ($category = mysql_fetch_array ($categories)) { ?>
												<option value="<?php echo $category['id']; ?>" <?php if ($small_business_row['category_id'] == $category['id']) echo "selected"; ?>><?php echo $category['name']; ?></option>
											<?php } ?>
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
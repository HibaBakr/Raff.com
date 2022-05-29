<?php include "headerL2.php" ?>

<?php 
if ($_SESSION ['user_type'] != "small_business") {
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
	$shipment = $_POST['shipment'];
	$iban = $_POST['iban'];
	$city = $_POST['city'];
	$maroof = $_POST['maroof'];
	$category_id = $_POST['category_id'];
	
	$update_query = "UPDATE small_business SET category_id = '$category_id', name = '$name', policy = '$policy', email = '$email', password = '$password', mobile = '$mobile', shipment = '$shipment', iban = '$iban', city = '$city', maroof = '$maroof' WHERE id = '$_SESSION[user_id]'";
	
	$update_small_business_result = mysql_query($update_query) or die ("Can't update this small_business " . mysql_error());

	// if there is affected rows in the database;
	if (mysql_affected_rows() == 1) {
		echo "<script>alert('تم التحديث بنجاح');</script>";
		$_SESSION ['user_category_id'] = $category_id;	// update the 
	} else {
		echo "<script>alert('حدث خطأ في التحديث');</script>";
	}
}
	// if the small_business is loggedin
	$query = "SELECT * FROM small_business WHERE id = '$_SESSION[user_id]'";
	$small_business_result = mysql_query($query) or die("can't run query because " . mysql_error());

	$small_business_row = mysql_fetch_array($small_business_result);
	
	$categories = mysql_query ("SELECT * FROM category");
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
                                        <label for="name" class="label ">الاسم *</label>
										<input id="name" type="text" name="name" class="input " required  value="<?php echo $small_business_row['name'];?>" />
												
										<label for="email" class="label ">البريد الالكتروني *</label>
                                        <input type="email" id="email" class="input " name="email" placeholder="a@example.com" required value="<?php echo $small_business_row['email'];?>"/>
										
										<label for="password" class="label">كلمة المرور *</label>
                                        <input id="password" type="password" class="input" name="password" required value="<?php echo $small_business_row['password'];?>" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Capital and samll letters and numbers more than six characters"/>
										
										<label for="mobile" class="label">رقم الجوال *</label>
                                        <input type="tel" id="mobile" class="input " name="mobile" placeholder="********05" pattern="05[0-9]{8}" size="10" required value="<?php echo $small_business_row['mobile'];?>"/>
										
										<label for="policy" class="label ">السياسة  *</label>
                                        <input id="policy" type="text" name="policy" class="input " required value="<?php echo $small_business_row['policy'];?>"/>
										
										<label for="shipment" class="label">الشحن *</label>
                                        <input type="text" id="shipment" class="input " name="shipment" size="10" required value="<?php echo $small_business_row['shipment'];?>"/>
										
										<label for="iban" class="label">الأيبان *</label>
                                        <input type="text" id="iban" class="input " name="iban" size="10" required value="<?php echo $small_business_row['iban'];?>"/>
										
										<label for="maroof" class="label">رقم معروف *</label>
                                        <input type="number" id="maroof" class="input " name="maroof" min="1" size="10" required value="<?php echo $small_business_row['maroof'];?>"/>
										
                                        <label for="city" class="label">المدينة *</label>
                                        <select id="city" class="input" name="city">
										  <option value="Medina" <?php if($small_business_row['city'] == "Medina") echo "selected";?>>المدينة المنورة</option>
										  <option value="Makkah" <?php if($small_business_row['city'] == "Makkah") echo "selected";?>>مكة</option>
										  <option value="Riyadh" <?php if($small_business_row['city'] == "Riyadh") echo "selected";?>>الرياض</option>
										  <option value="Jeddah" <?php if($small_business_row['city'] == "Jeddah") echo "selected";?>>جدة</option>
										  <option value="Taif" <?php if($small_business_row['city'] == "Taif") echo "selected";?>>الطائف</option>
										  <option value="Yanbu" <?php if($small_business_row['city'] == "Yanbu") echo "selected";?>>ينبع</option>
										  <option value="Tabuk" <?php if($small_business_row['city'] == "Tabuk") echo "selected";?>>تبوك</option>
										  <option value="Dammam" <?php if($small_business_row['city'] == "Dammam") echo "selected";?>>الدمام</option>
										  <option value="Hail" <?php if($small_business_row['city'] == "Hail") echo "selected";?>>حائل</option>
										</select>
										
										<label for="category_id" class="label ">التصنيف</label>
										<select name="category_id" class="input ">
											<?php while ($category = mysql_fetch_array ($categories)) { ?>
												<option value="<?php echo $category['id']; ?>" <?php if ($small_business_row['category_id'] == $category['id']) echo "selected"; ?>><?php echo $category['name']; ?></option>
											<?php } ?>
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
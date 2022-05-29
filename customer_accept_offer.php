<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}

if (isset ( $_POST ['submit'] )) {
	// custom_order vars
	$date = $_POST ['date'];
	$price = $_POST ['price'];
	$description = $_POST ['description'];
	$category_id = $_POST ['category_id'];
	$customer_id = $_SESSION ['user_id'];
	$img = $_FILES ["img"] ["name"];
	
	// script for upload file
	// check for img type ( gif, jpg, jpeg, png )
	// and size less than 1 mb
	if ((($_FILES ["img"] ["type"] == "image/gif") || ($_FILES ["img"] ["type"] == "image/jpeg") || ($_FILES ["img"] ["type"] == "image/jpg") || ($_FILES ["img"] ["type"] == "image/png")) && ($_FILES ["img"] ["size"] < 1000000)) {
		// if there is an error in upload files
		if ($_FILES ["img"] ["error"] > 0) {
			echo "Error: " . $_FILES ["img"] ["error"] . "<br>";
		} else // there is no errors in uploading files
{
			// save the file in the img folder
			move_uploaded_file ( $_FILES ["img"] ["tmp_name"], "images/custom_orders/" . $_FILES ["img"] ["name"] );
			
			if (mysql_query ( "INSERT INTO custom_order (date, price, description, img, category_id, customer_id) VALUES ('$date', '$price', '$description', '$img', '$category_id', '$customer_id')" )) {
				echo "<script>alert('تمت الاضافة بنجاح ');</script>";
			} else {
				echo "<script>alert('خطأ أثناء الاضافة ...');</script>";
			}
		} // end else (there is no errors in uploading file)
	}  // end if (check file types)
else // if the file type is not image; redirect to the add_custom_order.php page
{
		echo "<script>alert('خطأ في نوع الملف . حاول صورة واقل من 1 ميجا');</script>";
	}
}
?>

<div class="cssignup-wrap">
	<div class="signup-html">
		<div class="signup-form">
			<h3>بيانات الدفع</h3><br>
			<div id='signup' class="sign-up-htm" dir="rtl">
				<form action="customer_accept_offer_check.php" class=" sign-up-html" method="post" enctype="multipart/form-data">
					<input type="hidden" value="<?php echo $_GET[id];?>" name="id"/>
					
					<div class="group">
						<label for="visa_name" class="label ">صاحب البطاقة</label>
						<input type="text" id="visa_name" name="visa_name" class="input" required />
					</div>
					<div class="group">
						<label for="visa_num" class="label ">رقم البطاقة</label>
						<input type="text" id="visa_num" name="visa_num" class="input " pattern="[0-9]{14}" required="required"/>
					</div>
					<div class="group">
						<label for="visa_ccv" class="label ">رمز الأمان</label>
						<input type="text" id="visa_ccv" name="visa_ccv" class="input " pattern="[0-9]{3}" required="required"/>
					</div>
					<div class="group">
						<label for="visa_date_year" class="label ">سنة الانتهاء</label>
						<select id="visa_date_year" name="visa_date_year" class="input " required="required">
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
						</select>
					</div>
					<div class="group">
						<label for="visa_date_month" class="label ">شهر الانتهاء</label>
						<select id="visa_date_month" name="visa_date_month" class="input " required="required">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					</div>
					
					<div class="group">					
					<br/>
						<input id="reg" name="submit" type="submit" class="button" value="قبول الطلب"/>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
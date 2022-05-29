<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}

if (isset ( $_POST ['date'] )) {
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

<?php
$categories = mysql_query ("SELECT * FROM category");
?>

<div class="customorder">
	<div class="ghbig">
		<div class="ghbig2">
			<h1 id="gh2"> أنشأ طلبك الخاص </h1>
			<form id="gh" method="post" enctype="multipart/form-data">
				<br>
				<div class="ghcustom">
					<div class="ghcustom">
						<label> تاريخ تسليم الطلب <span>*</span></label><br>
						<input type="date" min="<?php echo date('Y-m-d');?>" id="date" name="date" class="ghcustom " required="required" />
					</div>
					<br>
					<div class="ghcustom">
						<label> السعر (قم باختيار أقصى قيمة تريدها)<span>*</span></label><br>
						<input type="number" id="price" name="price" class="ghcustom " required="required" min="1"/>
					</div>
					<br>
					<div class="ghcustom">
						<label> فئة الطلب<span>*</span></label><br>
						<select name="category_id" id="category" class="ghcustom" required>
							<?php while ($category = mysql_fetch_array ($categories)) { ?>
								<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
							<?php } ?>
						</select>
					</div>
					<br>

					<br>
					<div class="ghcustom">
						<label for="lname"> إضافة وصف<span>*</span></label><br>
						<textarea type="text" name="description" class="ghcustom" required></textarea>
					</div>
					<div class="ghcustom"> <br>
						<label>:ارفق صورة<span></span></label><br>

						<label class="filebutton">
							<img src="media/image/K1.png" width="50" height="50"></p>
							<span><input type="file" id="img" name="img" style="display: none;"class="ghcustom" required /></span>
						</label>
					</div>

					<div class="btn-blockgh">
						<button id="ghwhat" type="submit">نشر</button>
					</div>

			</form>
		</div>

	</div>

			<div class="ghbig3">
				<img src="media/image/mp.jpg">
 </div>
 </div>
</div>

<?php include 'footer.php'; ?>
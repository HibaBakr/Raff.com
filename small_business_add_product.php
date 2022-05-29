<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}

if (isset ( $_POST ['name'] )) {
	// product vars
	$name = $_POST ['name'];
	$price = $_POST ['price'];
	$description = $_POST ['description'];
	$category_id = $_SESSION ['user_category_id'];
	$small_business_id = $_SESSION ['user_id'];
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
			move_uploaded_file ( $_FILES ["img"] ["tmp_name"], "images/products/" . $_FILES ["img"] ["name"] );
			
			if (mysql_query ( "INSERT INTO product (name, price, description, img, category_id, small_business_id) VALUES ('$name', '$price', '$description', '$img', '$category_id', '$small_business_id')" )) {
				echo "<script>alert('تمت الاضافة بنجاح ');</script>";
			} else {
				echo "<script>alert('خطأ أثناء الاضافة ...');</script>";
			}
		} // end else (there is no errors in uploading file)
	}  // end if (check file types)
else // if the file type is not image; redirect to the add_product.php page
{
		echo "<script>alert('خطأ في نوع الملف . حاول صورة واقل من 1 ميجا');</script>";
	}
}
?>

<div class="customorder">	
		<div class="ghbig">
			<div class="ghbig2">
				<h1 id="gh2">أضف منتجاتك</h1>
				<form id="gh" method="post" enctype="multipart/form-data">
					<br>
					<div class="ghcustom">
						<div class="ghcustom">
							<label>اسم المنتج <span>*</span></label> <br>
							<input type="text" name="name" class="ghcustom" required />
						</div>
						<br>
						<div class="ghcustom">
							<label>سعر المنتج<span>*</span></label><br>
							<input type="number" min="1" name="price" class="ghcustom" required />
						</div>
						<br>
						<div class="ghcustom">
							<label for="lname">إضافة وصف<span>*</span></label><br>
							<textarea type="text" name="description" class="ghcustom" required></textarea>
						</div>
						<div class="ghcustom"> <br>
							<label>صورة المنتج<span></span></label><br>
							<label class="filebutton">
								<img src="media/image/K1.png" width="50" height="50"></p>
								<span><input type="file" id="img" name="img" style="display: none;"
										class="ghcustom" required /></span>
							</label>
						</div>

						<div class="btn-blockgh">
							<button id="ghwhat" type="submit">نشر</button>
						</div>

				</form>
			</div>

		</div>

		<div class="ghbig3">
			<img src="media/image/The1.jpg" width="540px" height="920px">
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
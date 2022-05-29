<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>

<?php

if (isset ( $_POST ['name'] )) {
	
	// product vars
	$name = $_POST ['name'];
	$price = $_POST ['price'];
	$description = $_POST ['description'];
	$category_id = $_SESSION ['user_category_id'];
	$img = $_FILES ["img"] ["name"];
	$id = $_POST ['id'];
	
	if ($img != "") {
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
				
				if (mysql_query ( "UPDATE product SET img = '$img', name = '$name', price = '$price', description = '$description', category_id = '$category_id' WHERE id = $id" )) {
					echo "<script>alert('تم التحديث بنجاح ');</script>";
				} else {
					echo "<script>alert('خطأ أثناء التحديث ...');</script>";
				}
			} // end else (there is no errors in uploading file)
		}  // end if (check file types)
else // if the file type is not image; redirect to the add_product.php page
{
			echo "<script>alert('خطأ في نوع الملف . حاول صورة واقل من 1 ميحا');</script>";
		}
	} else {
		if (mysql_query ( "UPDATE product SET name = '$name', price = '$price', description = '$description', category_id = '$category_id' WHERE id = $id" )) {
			echo "<script>alert('تم التحديث بنجاح ');</script>";
		} else {
			echo "<script>alert('خطأ أثناء التحديث ...');</script>";
		}
	}
}

?>

<?php
// get product information
$product_query = mysql_query ( "SELECT * FROM product WHERE id = $_GET[id]" );
$product = mysql_fetch_array ( $product_query );
?>

<div class="customorder">	
		<div class="ghbig">
			<div class="ghbig2">
				<h1 id="gh2">تحديث المنتج</h1>
				<form id="gh" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
					<br>
					<div class="ghcustom">
						<div class="ghcustom">
							<label>اسم المنتج <span>*</span></label> <br>
							<input type="text" name="name" class="ghcustom" value="<?php echo $product['name'];?>" required />
						</div>
						<br>
						<div class="ghcustom">
							<label>سعر المنتج<span>*</span></label><br>
							<input type="number" min="1" name="price" value="<?php echo $product['price'];?>" class="ghcustom" required />
						</div>
						<br>
						<div class="ghcustom">
							<label for="lname">إضافة وصف<span>*</span></label><br>
							<textarea type="text" name="description" class="ghcustom" required><?php echo $product['description'];?></textarea>
						</div>
						<div class="ghcustom"> <br>
							<label>صورة المنتج<span></span></label><br>

							<label class="filebutton">
								<img src="media/image/K1.png" width="50" height="50"></p>
								<span><input type="file" id="img" name="img" style="display: none;"
										class="ghcustom" /></span>
							</label>
						</div>

						<div class="btn-blockgh">
							<button id="ghwhat" type="submit">نشر</button>
						</div>
				</form>
			</div>
		</div>

		<div class="ghbig3">
			<img src="images/products/<?php echo $product['img'];?>" width="540px" height="920px">
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
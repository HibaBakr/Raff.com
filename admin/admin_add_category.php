<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: index.php" );
}

if (isset ( $_POST ['name'] )) {
	// category vars
	$name = $_POST['name'];
	$description = $_POST['description'];
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
			move_uploaded_file ( $_FILES ["img"] ["tmp_name"], "../images/categories/" . $_FILES ["img"] ["name"] );
			
			if (mysql_query ( "INSERT INTO category (name, description, img) VALUES ('$name', '$description', '$img')" )) {
				echo "<script>alert('تمت الاضافة بنجاح ');</script>";
			} else {
				echo "<script>alert('خطأ أثناء الاضافة ...');</script>";
			}
		} // end else (there is no errors in uploading file)
	}  // end if (check file types)
else // if the file type is not image; redirect to the add_category.php page
{
		echo "<script>alert('خطأ في نوع الملف . حاول صورة واقل من 1 ميجا');</script>";
	}
}
?>

<div class="main" dir="rtl">
	<div class="BAborder">
		<h6 class="BAfont">اضافة تصنيف جديد</h6><br>
		<form method="post" enctype="multipart/form-data">
			<table align="center" width="100%">
				<tr>
					<th><label for="name" class="label ">الاسم *</label></th>
					<td><input class="BAlabels" type="text" name="name" value="" required /></td>
				</tr>
				<tr>
					<th><label for="description" class="label ">الوصف *</label></th>
					<td><input class="BAlabels" type="text" name="description" required /></td>
				</tr>
				<tr>
					<th><label for="img" class="label ">الصورة *</label></th>
					<td><input class="BAlabels" type="file" name="img" required /></td>
				</tr>
				<tr>
					<td align="center" colspan="2"><button class="BAbutton" type="submit">انشاء</button></td>
				</tr>
			</table>
		</form>
	</div>
</div>

<?php include 'footer.php'; ?>
<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}

if (isset ( $_POST ['content'] )) {
	// collaborate_message vars
	$content = $_POST ['content'];
	$small_business1_id = $_SESSION ['user_id'];
	$small_business2_id = $_GET ['small_business2_id'];
	
	if (mysql_query ( "INSERT INTO collaborate_message (content, small_business1_id, small_business2_id) VALUES ('$content', '$small_business1_id', '$small_business2_id')" )) {
		// query for notification
		mysql_query ("INSERT INTO notifications (content, user_id, user_type) VALUES ('لقد جاءك تعاون من قبل اسرة : $_SESSION[user]', '$small_business2_id', 'small_business') ");
		
		echo "<script>alert('تم الإرسال بنجاح ');</script>";
		header ( "REFRESH:0; url=index.php" );
	} else {
		echo "<script>alert('خطأ أثناء الإرسال');</script>";
		header ( "REFRESH:0; url=index.php" );
	}
}
?>

<div class="customorder">	
		<div class="ghbig">
			<div class="ghbig2">
				<h1 id="gh2">تعاون مع أسرة</h1>
				<form id="gh" method="post" enctype="multipart/form-data">
					<br>
					<div class="ghcustom">
						<div class="ghcustom">
							<label>المحتوى<span>*</span></label> <br>
							<textarea rows="10" name="content" class="ghcustom" required></textarea>
						</div>
						<div class="btn-blockgh">
							<button id="ghwhat" type="submit">إرسال</button>
						</div>
				</form>
			</div>
		</div>

		<div class="ghbig3">
			<img src="media/image/The1.jpg" width="540" style="height:320px;">
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
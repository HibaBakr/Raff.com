<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>

<div class="cssignup-wrap">
	<div class="signup-html">
		<div class="signup-form">
			<h3>إضافة رد على التعليق</h3><br>
			<div id='signup' class="sign-up-htm " dir="rtl">
				<form class=" sign-up-html" action="small_business_reply_comment_check.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
					<div class="group ">
						<label for="reply" class="label ">محتوى الرد *</label>
						<textarea id="reply" name="reply" class="input " required></textarea>
						<br/>
						<input id="reg" name="submit" type="submit" class="button" value="اضافة الرد "/>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php';?>
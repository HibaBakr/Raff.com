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
			<h3>اضافة عرض على الطلب الخاص</h3><br>
			<div id='signup' class="sign-up-htm " dir="rtl">
				<form class=" sign-up-html" action="small_business_add_offer_check.php?customer_id=<?php echo $_GET['customer_id'];?>&id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
					<div class="group ">
						<label for="details" class="label ">محتوى العرض</label>
						<textarea id="details" name="details" class="input " required></textarea>
						<br/>
						<input id="reg" name="submit" type="submit" class="button" value="اضافة العرض "/>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php';?>
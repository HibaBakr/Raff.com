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
			<h3>تغيير حالة الطلب</h3><br>
			<div id='signup' class="sign-up-htm" dir="rtl">
				<form action="small_business_change_order_status_check.php" method="post" class=" sign-up-html">
					<input type="hidden" value="<?php echo $_GET['id'];?>" name="order_id" />
					
					<div class="group">
						<label for="status" class="label ">الحالة</label>
						<select id="status" name="status" class="input">
							<option value="تم الإستلام">تم الإستلام</option>
							<option value="تم توصيله مع السائق">تم توصيله مع السائق</option>
							<option value="تم التوصيل">تم التوصيل</option>
							<option value="تم رفضه">تم رفضه</option>
						</select>
					</div>
					
					<div class="group">					
					<br/>
						<input id="reg" name="submit" type="submit" class="button" value="تغيير الحالة"/>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
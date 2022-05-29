<?php include 'header.php'; ?>

<div class="cssignup-wrap">
	<div class="signup-html">
		<div class="signup-form">
			<h3>البحث عن منتج</h3><br>
			<div id='signup' class="sign-up-htm" dir="rtl">
				<form  action="search_result.php" class=" sign-up-html" method="get" enctype="multipart/form-data">
					<div class="group">
						<label for="content" class="label ">الاسم</label>
						<input type="text" name="search" class="input" required />
					</div>
					<div class="group">					
					<br/>
						<input id="reg" name="submit" type="submit" class="button" value="بحث"/>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<?php include 'footer.php'; ?>
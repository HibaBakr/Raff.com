<?php include "headerL2.php" ?>

<?php 
if ($_SESSION ['user_type'] != "") {
	header ( "Location: index.php" );
}
?>

<div class="container fill_height">



			<div class="signup-wrap">
				<div class="signup-html" dir="rtl">
					<div class="signup-form">
						<!-- sign up-->
						<div id='signup' class="sign-up-htm">
							<div class="group">
								<h3>التسجيل</h3>
								<p> يمكنك انشاء حسابك كأسرة منتجة او متسوق</p>
								<div class="row" dir="rtl">
									<div class="col-6 ">
										<a href="small_business_register.php">
											<img class="imgg" src="https://i.top4top.io/p_2237i4zby1.png"
												alt="handmade">
											<br><br> <label class="ll"
												style="border-style: none; text-shadow: grey 22px;">اسرة
												منتجة</label></a>
									</div>
									<div class="col-6">
										<a href="customer_register.php">
											<img class="imgg" src="https://j.top4top.io/p_2237yjqmg1.png"
												alt="handmade">
											<br><br> <label class="ll col-3"
												style="margin-right:103px; border-style: none;">متسوق</label></a>
									</div>
								</div>
							</div>
						</div>
						<br>
						<p>هل لديك حساب بالفعل؟ <a href="login.php">تسجيل الدخول</a></p>
					</div>
				</div>

			</div>
		</div>

<?php include "footerL2.php" ?>
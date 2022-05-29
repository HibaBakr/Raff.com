<?php include "headerL2.php" ?>

<?php 
if ($_SESSION ['user_type'] != "") {
	header ( "Location: index.php" );
}
?>

<?php
if (isset ( $_POST ['email'] ) && isset ( $_POST ['password'] )) {
		$email = $_POST ['email'];
		$password = $_POST ['password'];
		
		// die ();
		
		$query = "SELECT * FROM customer WHERE email = '$email' AND password = '$password'";
		// echo "<script>alert('$query');</script>";
		
		$member_result = mysql_query ( $query ) or die ( "cant get email and password from the user" . mysql_error () );
		$member_row = mysql_fetch_array ( $member_result );
		
		// if we find the email
		if (mysql_num_rows ( $member_result ) == 1) {
			// set the session var for the user
			$_SESSION ['user'] = $member_row ['first_name'] . ' ' . $member_row ['last_name'];
			$_SESSION ['user_id'] = $member_row ['id']; // this is for get the user_id
			$_SESSION ['user_email'] = $member_row ['email']; // this is for get the user_id
			$_SESSION ['user_type'] = "customer"; // this is for the user type
			
			// redirect to the home page
			header ( "REFRESH:0; url=index.php" );
		} else {
			$query = "SELECT * FROM small_business WHERE email = '$email' AND password = '$password' AND status = 'تم التأكيد'";
			
			$member_result = mysql_query ( $query ) or die ( "cant get email and password from the user"  . mysql_error () );
			$member_row = mysql_fetch_array ( $member_result );
			
			// if we find the email
			if (mysql_num_rows ( $member_result ) == 1) {
				// set the session var for the user
				$_SESSION ['user'] = $member_row ['name'];
				$_SESSION ['user_id'] = $member_row ['id']; // this is for get the user_id
				$_SESSION ['user_category_id'] = $member_row ['category_id']; // this is for get the category_id
				$_SESSION ['user_type'] = "small_business"; // this is for the user type
				
				// redirect to the home page
				header ( "REFRESH:0; url=index.php" );
			} else {
				$query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
				
				$member_result = mysql_query ( $query ) or die ( "cant get email and password from the user"  . mysql_error () );
				$member_row = mysql_fetch_array ( $member_result );
				
				// if we find the email
				if (mysql_num_rows ( $member_result ) == 1) {
					// set the session var for the user
					$_SESSION ['user'] = "admin";
					$_SESSION ['user_id'] = $member_row ['id']; // this is for get the user_id
					$_SESSION ['user_type'] = "admin"; // this is for the user type
					
					// redirect to the home page
					header ( "REFRESH:0; url=admin/index.php" );
				} else {
					echo "<script>alert('خطأ في الايميل او كلمة المرور او الحساب لم يتم تأكيده بعد');</script>";
					header("REFRESH:0; url=login.php");
				}
			}
		}
	} else {?>
		<!--header ends -->
		<!------------ضعي الكود هنا-------------->
		<div class="container fill_height">
			<div class="d-lg-flex login">
				<div class="bg order-1 order-md-2"
					style="background-image: url('https://j.top4top.io/p_22301hrff1.jpg');"></div>
				<div class="contents order-2 order-md-1">
					<div class="container">
						<div class="row align-items-center justify-content-center">
							<div class="col-md-7">
								<h3 >تسجيل الدخول <strong id="xx">الى رف</strong></h3>
								
								<form method="post">
									<div class="form-group first">
										<label for="email">البريد الالكتروني</label>
										<input type="text" class="form-control" name="email" id="email">
									</div>
									
									<div class="form-group last mb-3">
										<label for="password">كلمة المرور</label>
										<input type="password" class="form-control" name="password" id="password">
									</div>

									<div class="d-flex mb-5 align-items-center">
										<span class="ml-auto"><a href="forgot_pass.php" class="forgot-pass">نسيت كلمة المرور؟</a></span>
									</div>

									<input type="submit" value="تسجيل الدخول" class="btn btn-block btn-primary">

								</form>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>

<?php }  // end of check submit ?>

		<!------------الكود ينتهي هنا-------------->
		<!-- Footer starts -->
<?php include "footerL2.php" ?>
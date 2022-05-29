<?php include "headerL2.php" ?>

<?php 
if ($_SESSION ['user_type'] != "") {
	header ( "Location: index.php" );
}
?>

<?php
if (isset ( $_POST ['email'] )) {
		$email = $_POST ['email'];
		
		// die ();
		
		$query = "SELECT * FROM customer WHERE email = '$email'";
		// echo "<script>alert('$query');</script>";
		
		$member_result = mysql_query ( $query ) or die ( "cant get email from the user" . mysql_error () );
		$member_row = mysql_fetch_array ( $member_result );
		
		// if we find the email
		if (mysql_num_rows ( $member_result ) == 1) {
			
			// send email for the user with password
			$email = $member_row ['email'];
			$password = $member_row ['password'];
			
			if (mail("$email", "Raff", "Your password : $password")) {
				echo "<script>alert('تم ارسال الايميل بنجاح');</script>";
			} else {
				echo "<script>alert('حدث خطأ أثناء ارسال الايميل');</script>";
			}
			
			// redirect to the home page
			header ( "REFRESH:0; url=index.php" );
		} else {
			$query = "SELECT * FROM small_business WHERE email = '$email'";
			
			$member_result = mysql_query ( $query ) or die ( "cant get email from the user"  . mysql_error () );
			$member_row = mysql_fetch_array ( $member_result );
			
			// if we find the email
			if (mysql_num_rows ( $member_result ) == 1) {
				
				// send email for the user with password
				$email = $member_row ['email'];
				$password = $member_row ['password'];
				
				if (mail("$email", "Raff", "Your password : $password")) {
					echo "<script>alert('تم ارسال الايميل بنجاح');</script>";
				} else {
					echo "<script>alert('حدث خطأ أثناء ارسال الايميل');</script>";
				}
				
				// redirect to the home page
				header ( "REFRESH:0; url=index.php" );
			} else {
				$query = "SELECT * FROM admin WHERE email = '$email'";
				
				$member_result = mysql_query ( $query ) or die ( "cant get email from the user"  . mysql_error () );
				$member_row = mysql_fetch_array ( $member_result );
				
				// if we find the email
				if (mysql_num_rows ( $member_result ) == 1) {
					
					// send email for the user with password
					$email = $member_row ['email'];
					$password = $member_row ['password'];
					
					if (mail("$email", "Raff", "Your password : $password")) {
						echo "<script>alert('تم ارسال الايميل بنجاح');</script>";
					} else {
						echo "<script>alert('حدث خطأ أثناء ارسال الايميل');</script>";
					}
					
					// redirect to the home page
					header ( "REFRESH:0; url=index.php" );
				} else {
					echo "<script>alert('لم يتم العثور على هذا الايميل في نظامنا');</script>";
					header("REFRESH:0; url=login.php");
				}
			}
		}
	} else {?>
		<!--header ends -->
		<!------------ضعي الكود هنا-------------->
		<div class="container fill_height">

        <div class="signup-wrap">
            <div class="signup-html" dir="rtl">
                <div class="signup-form">
                    <form class="group" method="post">
                        <h3>نسيت كلمة المرور؟</h3>
                        <p>
                            أدخل بريدك الإلكتروني المسجل، وسنرسل لك رابطًا لإعادة تعيين كلمة المرور الخاصة بك.
                        </p>
                        <br><label for="email" class="label">البريد الالكتروني</label>
                        <input id="email" type="email" name="email" class="input" required />
                        <br>
						
                        <input id="reg" type="submit" class="button" value="إرسال"/>
				
                    </form>
                </div>

            </div>


        </div>
</div>

<?php }  // end of check submit ?>

		<!------------الكود ينتهي هنا-------------->
		<!-- Footer starts -->
<?php include "footerL2.php" ?>
<?php include "includes/header.php" ?>
<!--header ends -->

<!------------ضعي الكود هنا-------------->
<div class="container fill_height">

        <div class="signup-wrap">
            <div class="signup-html" dir="rtl">
                <div class="signup-form">
                    <form class="group">
                        <h3>نسيت كلمة المرور؟</h3>
                        <p>
                            أدخل بريدك الإلكتروني المسجل، وسنرسل لك رابطًا لإعادة تعيين كلمة المرور الخاصة بك.
                        </p>
                        <br><label for="email" class="label">البريد الالكتروني</label>
                        <input id="eail" type="email" class="input" required>
                        <br>
						
                        <input id="reg" type="submit" onclick="verifyPassword()" class="button" value="إرسال">
				
                    </form>
                </div>

            </div>


        </div>
</div>

<!------------الكود ينتهي هنا-------------->
<!-- Footer starts -->

<?php include "includes/footer.php" ?>

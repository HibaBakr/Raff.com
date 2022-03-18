<?php include "includes/header.php" ?>
<!--header ends -->

        <!------------ضعي الكود هنا-------------->

        <div class="container fill_height">

            

                <div class="reset-wrap">
                    <div class="signup-html" dir="rtl">
                        <div class="signup-form">
                            <form class="group">
                                <img class="imgpass" src="https://k.top4top.io/p_2244rt10n1.png" alt="change password">

                                <h3>تغيير كلمة المرور</h3><br><label for="pass" class="label">كلمة المرور الجديدة</label>
                                <input id="pass" type="password" class="input" required>
                                <span id="msg"></span>
                                <br>
                                <label for="conpass" class="label">تأكيد كلمة المرور</label>
                                <input id="conpass" type="password" class="input" required>
                                <span id="msg1"></span>

                                <br><br>
                                <input id="reg" type="submit" onclick="verifyPassword()" class="button" value="حفظ">
                            </form>
                        </div>
                    </div>


                </div>
        </div>




        <!------------الكود ينتهي هنا-------------->
        <!-- Footer starts -->

		<?php include "includes/footer.php" ?>
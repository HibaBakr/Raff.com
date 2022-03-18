<?php include "../includes/headerL2.php" ?>
        <!--header ends -->

        <!------------ضعي الكود هنا-------------->

        <div class="container fill_height">

            <body>

                <div class="smsignup-wrap">
                    <div class="signup-html">

                        <div class="signup-form">
                            <h3>التسجيل</h3><br>
                            <div id='signup' class="sign-up-htm" dir="rtl">
                                <form class=" sign-up-html" onclick="verifyPassword()" action="/action_page.php">
                                    <div class="group">
                                        <label for="SMid" class="label">اسم المتجر</label>
                                        <input id="SMid" type="text" class="input" required>

                                        <label for="ctgsb" class="label">فئة المتجر</label>
                                        <select id="ctgsb" class="input " name="category ">
                                            <option value="food">طعام</option>
                                            <option value="clothes">أزياء</option>
                                            <option value="skincare">عناية</option></select>
					    <label for="email" class="label">البريد الالكتروني</label>
                                        <input id="email" type="email" class="input" required>
                                        <label for="pass" class="label">كلمة المرور</label>
                                        <input id="pass" type="password" class="input" required>
                                        <span id="msg"></span>

                                        <label for="conpass" class="label">تأكيد كلمة المرور</label>
                                        <input id="conpass" type="password" class="input" required>
                                        <span id="msg1"></span>
                                        <label for="maarofNum" class="label">الرقم المسجل في معروف</label>
                                        <a href="confirmemail.php">
                                        <input id="maarofNum" type="text" class="input" required><br><br>
                                        <input id="reg" type="submit" class="button" value="تسجيل "></a>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
        </div>





        <!------------الكود ينتهي هنا-------------->
        <!-- Footer starts -->
        <?php include "../includes/footerL2.php" ?>
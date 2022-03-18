<?php include "../includes/headerL2.php" ?>
		<!--header ends -->

        <!------------ضعي الكود هنا-------------->

        <div class="container fill_height">

            <body>

                <div class="cssignup-wrap">
                    <div class="signup-html">
                        <div class="signup-form">
                            <h3>التسجيل</h3><br>
                            <div id='signup' class="sign-up-htm " dir="rtl">
                                <form class=" sign-up-html" onclick="verifyPassword()" action="action_page.php">
                                    <div class="group ">
                                        <div class="row ">
                                            <div class="col-6 ">

                                                <label for="user " class="label ">الاسم الاول *</label>
                                                <input id="fname " type="text " class="input " required>
                                            </div>
                                            <div class="col-6 ">
                                                <label for="user " class="label ">الاسم الاخير  *</label>
                                                <input id="lname " type="text " class="input " required>
                                            </div>
                                        </div>
                                        <label for="country " class="label ">المدينة *</label>
                                        <select id="country " class="input " name="country ">
              <option value="Medina">المدينة</option>
              <option value="Makkah">مكة</option>
              <option value="Riyadh">الرياض</option>
              <option value="Jeddah">جدة</option>
              <option value="Taif">الطائف</option>
              <option value="Yanbu">ينبع</option>
              <option value="Tabuk">تبوك</option>
              <option value="Dammam">الدمام</option>
              <option value="Hail">حائل</option>
            </select>

                                        <label for="phonenum " class="label">رقم الجوال *</label>
                                        <input type="tel " id="PhoneNum " class="input " name="phonenum " placeholder="********05" pattern="05[0-9]{8}" size="10" required>
                                        <small></small>



                                        <label for="Email " class="label ">البريد الالكتروني *</label>
                                        <input type="email" id="Email " class="input " name="Email " placeholder=" " required>

                                        <label for="pass " class="label ">كلمة المرور *</label>
                                        <input id="pass " type="password " class="input " required>
                                        <span id="msg"></span>

                                        <label for="conpass " class="label ">تأكيد كلمة المرور *</label>
                                        <input id="conpass " type="password " class="input " required>
                                        <span id="msg1"></span><br><br>
                                        <a href="confirmemail.php"><input id="reg" type="submit" class="button" value="تسجيل ">
										</a>

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
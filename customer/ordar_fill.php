<?php include "../includes/headerL2.php" ?>
		<!--header ends -->

        <!------------ضعي الكود هنا-------------->

        <div class="container fill_height">
            <div class="ordar" dir="rtl">
                <form class="ordar-info">
                    <div class="personal-info">
                        <h4>البيانات الشخصية</h4><br>
                        <div class="row">
                            <div class="col-6">
                                <label id="fname" class="label">الاسم الاول</label>
                                <input id="fname" type="text" class="input" readonly>
                            </div>
                            <div class="col-6">
                                <label id="lname" class="label">الاسم الاخير</label>
                                <input id="lname" type="text" class="input" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label id="email" class="label">البريد</label>
                                <input id="email" type="email" class="input">
                            </div>
                            <div class="col-6">
                                <label id="phone" class="label">رقم الجوال</label>
                                <input id="phone" type="tel" class="input">
                            </div>
                        </div>
                    </div>
                    <div class="sipping">
                        <br>
                        <h4>التوصيل</h4><br>
                        <div class="row">
                            <div class="col-6">
                                <label id="city" class="label">المدينة</label>
                                <input id="city" type="text" class="input">
                            </div>
                            <div class="col-6">
                                <label id="location" class="label">العنوان</label>
                                <input id="location" type="text" class="input">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label id="time" class="label">الوقت</label>
                                <input id="time" type="datetime-local" class="input">
                            </div>
                        </div>

                        <br>



                    </div>
                    <div class="prud-info">
                        <br>
                        <h4>معلومات الطلب</h4><br>
                        <div class="row">
                            <div class="table-responsive" dir="rtl">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> اسم المنتج </th>
                                            <th> السعر </th>
                                            <th> الكمية </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="numprudct">ورق عنب</td>
                                            <td id="price"> 20 </td>
                                            <td>
                                                <input id="quntity" type="number" min="1" class="input qun"> </td>
                                        </tr>
                                        <tr>
                                            <td id="numprudct">كوكيز</td>
                                            <td id="price"> 15 </td>
                                            <td><input id=" quntity " type="number " min="1 " class="input qun "> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <h4>السعر الاجمالي</h4>
                        <div class="row ">
                            <div class="col-6 ">
                                <label id="total" class="label ">30 ريال</label><br>
                            </div>

                        </div>
                    </div>
                    <br>
                    <button type="submit " class="btn-light col-12 ">الدفع</button>

                </form>

            </div>
        </div>



        <!------------الكود ينتهي هنا-------------->
        <!-- Footer starts -->
        <?php include "../includes/footerL2.php" ?>

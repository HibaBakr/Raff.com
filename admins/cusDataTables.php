<?php include "includes/headerAdmin.php"?>
<?php include "includes/sidebarAdmin.php"?>


<div class="main">
        <div class="container cusdata">
            <h2>بيانات العملاء</h2>
            <div class="card-box mb-30">
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">الاسم</th>
                                <th>العمر</th>
                                <th>الموقع</th>
                                <th>الرقم</th>
                                <th>الايميل</th>
                                <th class="datatable-nosort">خيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-plus">خالد العمري</td>
                                <td>25</td>
                                <td>Riyadh</td>
                                <td>0528261602 </td>
                                <td>khaled2004@gmail.com</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                             <!-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> عرض</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> تعديل</a>-->
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> حذف</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-plus">احمد كمون</td>
                                <td>30</td>
                                <td>jeddah</td>
                                <td>0508878159 </td>
                                <td>aaakamoon@gmail.com</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                             <!-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> عرض</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> تعديل</a>-->
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i>حذف</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                         


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
</div>
<?php include "includes/footerAdmin.php"?>
<?php include "config.php"?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: ../../index.php" );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
		integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
		integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="css/adminstyle.css">
	<link rel="stylesheet" href="css/adminResponsive.css">
	<title>Raff admin</title>
</head>

<body>
	<div class="sidenav d-flex flex-column flex-shrink-0  ">
		<div class="admin-logo flex-column nav-link text-md-center ">
			<img src="https://f.top4top.io/p_2228rsrc91.png" alt="" style="width: 60px; height: 60px;">
			R<span style="color: #ffffff;">AFF</span>
		</div>
		<br>
		<div class="nav nav-pills flex-column mb-auto">
			<div>
				<a href="index.php" class="nav-link link-dark">
					<i class="fa fa-dashboard" width="15" height="15"></i>
					لوحة البيانات
				</a>
			</div>
			<br>
			<?php if ($_SESSION ['user_type'] == "admin") {?>
				<div class="nav-item">
					<h4 href="../index.php" class="nav-link" aria-current="page">
						<i class="fa fa-mouse-pointer" width="15" height="15"></i>
						الموقع
					</h4>
					<ul>
						<li><a href="admin_show_ads.php">تحديث العروض</a></li>
						<li><a href='admin_show_compliants.php'>الشكاوى والاقتراحات</a></li>
						<li><a href='admin_show_comments.php'>التعليقات</a></li>
						<li><a href='admin_show_categories.php'>التصنيفات</a></li>
						
					</ul>
				</div>

				<div>
					<h4 href="#" class="nav-link link-dark">
						<i class="fa fa-shopping-bag" width="16" height="16"></i>
						المتاجر
					</h4>
					<ul>
						<li><a href="admin_show_small_businesss.php">البيانات</a></li>
						<li><a href="admin_show_small_businesss_ensure.php">التحقق</a></li>
					</ul>
				</div>
				<div>
					<h4 href="#" class="nav-link link-dark">
						<i class="fa fa-address-book" width="16" height="16"></i>
						العملاء
					</h4>
					<ul>
						<li><a href="admin_show_customers.php">البيانات</a></li>

					</ul>
				</div>
			<?php } ?>
		</div>

	</div>

	<div class="main">
		<nav class="navbar navbar-expand-sm  ">

			<!-- Dropdown -->
			<div class="nav-item dropdown ">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					<img src="https://via.placeholder.com/400x300" alt="" width="32" height="32" class="rounded-circle me-2">
					<strong>حسابي </strong>
				</a>
				<div class="dropdown-menu ">
					<a class="dropdown-item" href="admin_profile.php">اعدادات</a>
					<a class="dropdown-item" href="../logout.php">الخروج</a>
				</div>
			</div>

			<!-- Links -->
			<div class="navbar-nav ">
				<div class="nav-item">
					<a class="nav-link" href="user_show_notifications.php"><i class="fa fa-bell"></i></a>
				</div>
			</div>
		</nav>
		<!--HEADER AND SIDE NAV END HERE-->
	</div>
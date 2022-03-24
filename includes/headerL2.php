<!DOCTYPE html>
<html lang="en">

<head>
	<title>Raff</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Raff website for small businesses and customers in Saudi Arabia">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
		integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
		integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="../css/responsive.css">
	<link rel="stylesheet" type="text/css" href="../css/main_stylesheet.css">

</head>

<body>

	<div class="body_container">

		<!-- Header starts -->

		<header class="header transition_300">

			<!-- Top Navigation -->

			<div class="top_nav">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="top_nav_left">يوجد منتجات جديدة في قسم العناية</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="top_nav_right">
								<ul class="top_nav_menu">

									<!-- Massages / Language / Account -->
									<li class="massages">
										<a href="../chatting.php">
											<i class="fa fa-envelope"></i>
											<span id="massages_no" class="massages_no">0</span>
										</a>

									</li>
									<li class="account">
										<a href="#"><i class="fa fa-user"></i>
											حسابي
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="account_selection">
											<li><a href="../login.php"><span><i class="fa fa-sign-in"
															aria-hidden="true"></i></span>الدخول</a></li>
											<li><a href="../signup.php"><span><i class="fa fa-user-plus"
															aria-hidden="true"></i></span>التسجيل</a></li>
										</ul>
									</li>

								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Navigation -->

			<div class="main_nav_container">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-right">
							<div class="logo_container">
								<a href="../index.php"><img src="https://f.top4top.io/p_2228rsrc91.png"
										alt="The logo is not available" width="70">R<span>aff</span></a>
							</div>
							<nav class="navbar">
								<ul class="navbar_menu">
									<li><a href="../catogryGifts.php">الهدايا</a></li>
									<li><a href="../categoryFood.php">طعام</a></li>
									<li><a href="../catogryClothes.php">أزياء</a></li>
									<li><a href="../categoryCare.php">عناية</a></li>
									<li><a href="../index.php">الرئيسية</a></li>
								</ul>
								<ul class="navbar_user">
									<li><a href="../search.php"><i class="fa fa-search" aria-hidden="true"></i></a></li>
									<li><a href="../notification.php"><i class="fa fa-bell" aria-hidden="true"></i></a>
									</li>
									<li class="cart" style="display:none;">
										<a href="../cart.php">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
											<span id="cart_items" class="cart_items">0</span>
										</a>
									</li>
								</ul>
								<div class="side_container">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!-- side menu of Header-->
		<div class="side_menu_overlay"></div>
		<div class="side_menu">
			<div class="side_close"><i class="fa fa-times" aria-hidden="true"></i></div>
			<div class="side_menu_content text-right">

				<ul class="menu_top_nav">
					<li class="menu_item has-children">
						<a href="#">
							<i class="fa fa-user"></i>
							حسابي
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							<li><a href="../login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>الدخول</a></li>
							<li><a href="../signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i>التسجيل</a>
							</li>
						</ul>
					</li>
					<li class="menu_item"><a href="../index.php">الرئيسية</a></li>
					<li class="menu_item"><a href="../categoryFood.php">طعام</a></li>
					<li class="menu_item"><a href="../catogryClothes.php">أزياء</a></li>
					<li class="menu_item"><a href="../categoryCare.php">عناية</a></li>
					<li class="menu_item"><a href="../catogryGifts.php">هدايا</a></li>
					<li class="menu_item">
						<a href="../chatting.php">
							<span id="massages_no"> 0 </span>
							<i class="fa fa-envelope"></i>

						</a>

					</li>
				</ul>
			</div>

		</div>
		<!--header ends -->

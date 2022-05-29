<?php include "config.php"?>

<!DOCTYPE html>
<html lang="en">

<?php
if ($_SESSION ['user_type'] == "customer") {
	$cart_query = "SELECT * FROM cart WHERE customer_id = $_SESSION[user_id]";
	$cart_result = mysql_query ( $cart_query ) or die ( "Error " . mysql_error () );
	$cart_total = mysql_num_rows ($cart_result);
}

// get all categories
$categorys = mysql_query ( "SELECT * FROM category" );
?>

<head>
	<title>Raff</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Raff website for small businesses and customers in Saudi Arabia">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/main_stylesheet.css">
	<link href="css/chat_style.css" rel="stylesheet" type="text/css" />
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
										<?php if ($_SESSION ['user_type'] == "customer" || $_SESSION ['user_type'] == "small_business") { ?>
											<a href="<?php echo $_SESSION['user_type'];?>_chat.php">
												<i class="fa fa-envelope"></i>
											</a>
										<?php } ?>
									</li>
									<li class="account">
										<a href="#"><i class="fa fa-user"></i>
											حسابي
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="account_selection">
											<?php if ($_SESSION ['user_type'] == "") { ?>
												<li><a href="login.php"><span><i class="fa fa-sign-in" aria-hidden="true"></i></span>الدخول</a></li>
												<li><a href="register.php"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>تسجيل</a></li>
											<?php } else { ?>
												<li><a href="logout.php"><span><i class="fa fa-sign-in" aria-hidden="true"></i></span>الخروج</a></li>
												<li><a href="<?php echo $_SESSION['user_type'];?>_profile.php"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>الملف الشخصي</a></li>
											<?php } ?>
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
								<a href="index.php"><img src="images/logo.png" width="70"/>R<span>aff</span></a>
							</div>
							<nav class="navbar">
								<ul class="navbar_menu">
									<?php
									if ($_SESSION ['user_type'] == "small_business") {
										echo "<li><a href='small_business_collaborate.php'>التعاون</a></li>";
										echo "<li><a href='small_business_show_comments.php'>التعليقات</a></li>";
										echo "<li><a href='small_business_show_products.php'>المنتجات</a></li>";
										// echo "<li><a href='small_business_show_collaborations.php'>تعاون</a></li>";
										echo "<li><a href='small_business_show_custom_orders.php'>الطلبات الخاصة</a></li>";
										echo "<li><a href='small_business_show_orders.php'>الطلبات</a></li>";
										echo "<li><a href='user_show_compliants.php'>الشكاوى والاقتراحات</a></li>";
									}  else if ($_SESSION ['user_type'] == "customer") {
										// echo "<li><a href='customer_chat.php'>الشات</a></li>";
										echo "<li><a href='customer_show_custom_orders.php'>الطلبات الخاصة</a></li>";
										echo "<li><a href='customer_show_orders.php'>الطلبات</a></li>";
										// echo "<li><a href='customer_shopping_cart.php'>سلة الشراء</a></li>";
										echo "<li><a href='user_show_compliants.php'>الشكاوى والاقتراحات</a></li>";
									}
									?>
									<li><a href='index.php'>الرئيسية</a></li>
								</ul>
								<ul class="navbar_user">
									<li><a href="search.php"><i class="fa fa-search" aria-hidden="true"></i></a></li>
									<?php if ($_SESSION ['user_type'] != "") { ?>
											<li><a href="user_show_notifications.php"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
									<?php } ?>
									<?php if ($_SESSION ['user_type'] == "customer") { ?>
									<li class="cart">
										<a href="customer_show_shopping_cart.php">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
											<span id="cart_items" class="cart_items"><?php echo $cart_total;?></span>
										</a>
									</li>
									<?php } ?>
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
							<?php if ($_SESSION ['user_type'] == "") { ?>
									<li><a href="login.php"><span><i class="fa fa-sign-in" aria-hidden="true"></i></span>الدخول</a></li>
									<li><a href="register.php"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>تسجيل</a></li>
								<?php } else { ?>
									<li><a href="logout.php"><span><i class="fa fa-sign-in" aria-hidden="true"></i></span>الخروج</a></li>
									<li><a href="<?php echo $_SESSION['user_type'];?>_profile.php"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>الملف الشخصي</a></li>
								<?php } ?>
						</ul>
					</li>
					<?php
						if ($_SESSION ['user_type'] == "small_business") {
							echo "<li><a href='small_business_collaborate.php'>التعاون</a></li>";
							echo "<li><a href='small_business_show_comments.php'>التعليقات</a></li>";
							echo "<li><a href='small_business_show_products.php'>المنتجات</a></li>";
							// echo "<li><a href='small_business_show_collaborations.php'>تعاون</a></li>";
							echo "<li><a href='small_business_show_custom_orders.php'>الطلبات الخاصة</a></li>";
							echo "<li><a href='small_business_show_orders.php'>الطلبات</a></li>";
							echo "<li><a href='user_show_compliants.php'>الشكاوى والاقتراحات</a></li>";
						}  else if ($_SESSION ['user_type'] == "customer") {
							// echo "<li><a href='customer_chat.php'>الشات</a></li>";
							echo "<li><a href='customer_show_custom_orders.php'>الطلبات الخاصة</a></li>";
							echo "<li><a href='customer_show_orders.php'>الطلبات</a></li>";
							// echo "<li><a href='customer_shopping_cart.php'>سلة الشراء</a></li>";
							echo "<li><a href='user_show_compliants.php'>الشكاوى والاقتراحات</a></li>";
						}
						?>
						<li><a href='index.php'>الرئيسية</a></li>
					<li class="menu_item">
						<?php if ($_SESSION ['user_type'] != "") { ?>
							<span id="massages_no"> 0 </span>
							<i class="fa fa-envelope"></i>
						<?php } ?>
					</li>
				</ul>
			</div>
		</div>
		<!--header ends -->

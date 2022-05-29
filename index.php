<?php include "headerL2.php" ?>
<!--header ends -->

<!------------ضعي الكود هنا-------------->

<?php 
$categorys = mysql_query ( "SELECT * FROM category" );
$adss = mysql_query ( "SELECT * FROM ads ORDER BY id DESC LIMIT 1" );
$ads = mysql_fetch_array ( $adss );
?>
	<!-- slider -->

	<div class="main_slider" style="background-image:url(images/adss/<?php echo $ads['img']?>)">
		<div class="container fill_height">
			<div class="row align-items-sm-center fill_height">
				<div class="col">
					<div class="main_slider_content">
						<h1>خصومات تصل إلى %20 </h1>
						<div class="slider_button shop_now_button"><a href="catogryClothes.php">تسوق الآن</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Benefit -->

	<div class="benefit">
		<div class="container">
			<div class="row benefit_row">
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						
						<div class="benefit_content">
							<h6>منتجات تعاونية</h6>
							<p>التعاون بين الأسر المنتجة</p>
						</div>
						<div class="benefit_icon"><i class="fa fa-handshake-o" aria-hidden="true"></i></div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_content">
							<h6>اشتراك مجاني</h6>
							<p>بأسهل الطرق الممكنة</p>
						</div>
						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_content">
							<h6>طلب خاص</h6>
							<p>انشأ طلبك بمواصفاتك الخاصة</p>
						</div>
						<div class="benefit_icon"><i class="fa fa-edit" aria-hidden="true"></i></div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">	
						<div class="benefit_content">
							<h6>متاجر سعودية</h6>
							<p> منتجات صنعت بنفاني وحب</p>
						</div>
						<div class="benefit_icon"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- features -->

	<div class="features">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">
						<h2></h2>
					</div>
				</div>
			</div>
			<div class="row feature_container">
				<?php while ( $category = mysql_fetch_array ( $categorys ) ) { ?>
					<div class="col-lg-3 feature_item_col">
						<div class="feature_item">
							<div class="feature_background" style="background-image:url(images/categories/<?php echo $category['img'];?>)"></div>
							<div class="feature_content d-flex flex-column align-items-center justify-content-center text-center">
								<h4 class="feature_title"><?php echo $category['description'];?> </h4>
								
								<a class="feature_more" href="show_small_businesss.php?category_id=<?php echo $category['id'];?>">تسوق</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			
		</div>
	</div>

	<!-- motto -->

	<div class="motto" style="background-image:url(media/image/cupcake.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 align-items-md-center " >
					<div class="motto_text d-flex flex-column justify-content-center align-items-lg-center align-items-md-center text-center">
					
						<p>المكان الذي يجتمع فيه  المبدعون</p>
					</div>
				</div>
				<div class="col-lg-6 align-items-md-center " >
					<div class="motto_text d-flex flex-column justify-content-center align-items-lg-center align-items-md-center text-center">
						<h4>R<span style="color: #C4A39B;">aff</span> ر<span style="color: #C4A39B;">ف</span</h4>
						
					</div>
				</div>
			</div>
		</div>
	</div>

<!------------الكود ينتهي هنا-------------->
<!-- Footer starts -->

<?php include "footerL2.php" ?>
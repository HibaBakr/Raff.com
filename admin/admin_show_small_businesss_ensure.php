<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: index.php" );
}
?>

<?php
// get all information for the small_businesss
$small_businesss_query = "SELECT small_business.*, category.name AS category_name FROM small_business
							LEFT JOIN category ON small_business.category_id = category.id
							WHERE small_business.status = 'غير مؤكد'";
$small_businesss_result = mysql_query ( $small_businesss_query ) or die ( 'error : ' . mysql_error () );
?>

<div class="main">
	<section id="services" class="container approve">
		<h2 class=" text-center mt-5 mb-5">متاجر ترغب في الأنضمام الى رف </h2>
		<div class="row h-auto text-center">
			<?php while ($small_business_row = mysql_fetch_array($small_businesss_result)) { ?>
			<div class="col-md-3 mb-2">
				<div class="card h-80">
					<img class="card-img-top" src="../images/small_business.png" width="350" height="300"
						alt="atyle">
					<div class="card-body">
						<h4 class="card-title"><?php echo $small_business_row['name'];?></h4>
						<p class="card-text"> <?php echo $small_business_row['maroof'];?> : رقم المتجر في معروف </p>
					</div>
					<div class="card-footer py-2">
						<p>
							<button class="btn btn-secondary" onclick="window.location='admin_ensure_small_business.php?id=<?php echo $small_business_row['id']?>'" ><img src="https://c.top4top.io/p_22408mccy1.png"width="20" height="20"> قبول</button>
							<button class="btn btn-secondary" onclick="window.location='admin_refuse_small_business.php?id=<?php echo $small_business_row['id']?>'"><img src="https://d.top4top.io/p_2240n78u31.png"width="20" height="20"> رفض</button>
						</p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</section>
</div>

<?php include 'footer.php';?>
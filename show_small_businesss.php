<?php include 'header.php';?>

<?php
// get all information for the small_businesss
$small_businesss_query = "SELECT small_business.*, small_business.id AS small_business_id, category.name AS category_name FROM small_business
							LEFT JOIN category ON small_business.category_id = category.id
							WHERE small_business.category_id = '$_GET[category_id]'
							AND small_business.status = 'تم التأكيد'";
$small_businesss_result = mysql_query ( $small_businesss_query ) or die ( 'error : ' . mysql_error () );
?>

<h2 class=" text-center mt-5 mb-5">جميع الأسر الصغيرة</h2>

<?php
// check if there are small_businesss in the system
if (mysql_num_rows ( $small_businesss_result ) != 0) { ?>
	<div class="probiggh1">
		<div class="container">
			<?php while ($small_business_row = mysql_fetch_array($small_businesss_result)) { ?>
				<a href="show_small_business_products.php?id=<?php echo $small_business_row['small_business_id']; ?>">
					<div class="probiggh">
						<div class="productgh">
							<img src="images/small_business.png" width="256px" height="230px" />
							<h2 class="h2gh"><?php echo $small_business_row['name'];?> </h2>
							<p class="pgh"><?php echo $small_business_row['mobile'];?></p>
							<p class="pgh"><?php echo $small_business_row['city'];?></p>
						</div>
					</div>
				</a>
			<?php } ?>
		</div>
	</div>
	<?php
	// end of ( if there are small_businesss )
} else {
	echo "<h4 align='center'>لايوجد اسر صغيرة في النظام</h4>";
} ?>

<?php include 'footer.php';?>
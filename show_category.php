<?php include 'header.php';?>

<?php
// get all information for the products
$products_query = "SELECT product.*, product.id AS product_id, small_business.name AS small_business_name FROM product 
					LEFT JOIN small_business ON product.small_business_id = small_business.id
					WHERE product.category_id = '$_GET[category_id]'";
$products_result = mysql_query ( $products_query ) or die ( 'error : ' . mysql_error () );
?>

<p><br/></p>

<?php
// check if there are products in the system
if (mysql_num_rows ( $products_result ) != 0) { ?>
	<div class="probiggh1">
		<div class="container">
			<?php while ($product_row = mysql_fetch_array($products_result)) { ?>
				<a href="show_product_details.php?id=<?php echo $product_row['id']; ?>">
					<div class="probiggh">
						<img src="images/products/<?php echo $product_row['img'];?>" width="256px" height="230px" />
						<div class="productgh">
							<h2 class="h2gh"><?php echo $product_row['name'];?> </h2>
							<p class="pgh">متجر <?php echo $product_row['small_business_name'];?></p>
							<p class="pgh"><?php echo $product_row['price'];?> ريال</p>
						</div>
					</div>
				</a>
			<?php } ?>
		</div>
	</div>
	<?php
	// end of ( if there are products )
} else {
	echo "<h2 class='text-center mt-5 mb-5'>لايوجد منتجات لهذا التصنيف</h2>";
} ?>

<?php include 'footer.php';?>
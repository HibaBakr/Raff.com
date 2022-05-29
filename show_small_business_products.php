<?php include 'header.php';?>

<?php
// get all information for the products
$products_query = "SELECT * FROM product WHERE small_business_id = '$_GET[id]'";
$products_result = mysql_query ( $products_query ) or die ( 'error : ' . mysql_error () );

$query = "SELECT * FROM small_business WHERE id = '$_GET[id]'";
$small_business_result = mysql_query($query) or die("can't run query because " . mysql_error());
$small_business_row = mysql_fetch_array($small_business_result);

// get the small_business rating
$rating_query = "select count(*) AS count_all, sum(result) AS total from rating WHERE user_id = '$_GET[id]' AND user_type='small_business'";
$rating_result = mysql_query ( $rating_query );
$rating_row = mysql_fetch_array ( $rating_result );

?>

<p><br/></p>

<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th width="30%">الاسم</th>
		<td><?php echo $small_business_row['name'];?></td>
	</tr>
	<tr>
		<th>البريد الالكتروني</th>
		<td><?php echo $small_business_row['email'];?></td>
	</tr>
	<tr>
		<th>رقم الجوال</th>
		<td><?php echo $small_business_row['mobile'];?></td>
	</tr>
	<tr>
		<th>السياسة</th>
		<td><?php echo $small_business_row['policy'];?></td>
	</tr>
	<tr>
		<th>الشحن</th>
		<td><?php echo $small_business_row['shipment'];?></td>
	</tr>
	<tr>
		<th>المدينة</th>
		<td><?php echo $small_business_row['city'];?></td>
	</tr>
	<tr>
		<th>التقييم</th>
		<td><?php if ($rating_row['count_all'] != 0 ) { echo round(($rating_row['total'] / $rating_row['count_all']),2); } else {echo "0"; }?> من 5 </td>
	</tr>
	<?php if ($_SESSION ['user_type'] == "customer") { ?>	
		<tr>
			<td align="center" colspan="2">
				<a href="customer_chat_messages.php?small_business_id=<?php echo $small_business_row['id'];?>">تواصل</a> | 
				<a href='https://maroof.sa/' target='_blank'>شكوى معروف</a>
			</td>
		</tr>
	<?php } ?>
	<?php if ($_SESSION ['user_type'] == "small_business" && $_GET['id'] != $_SESSION['user_id']) { ?>	
		<tr>
			<td align="center" colspan="2">
				<a href="small_business_collaborate_message.php?small_business2_id=<?php echo $small_business_row['id'];?>">تعاون</a>
			</td>
		</tr>
	<?php } ?>
</table>

<?php
// check if there are products in the system
if (mysql_num_rows ( $products_result ) != 0) { ?>
	<div class="probiggh1">
		<div class="container">
			<?php while ($product_row = mysql_fetch_array($products_result)) { ?>
				<a href="show_product_details.php?id=<?php echo $product_row['id']; ?>">
					<div class="probiggh">
						<img src="images/products/<?php echo $product_row['img'];?>" width="256px" height="230px"/>
						<div class="productgh">
							<h2 class="h2gh"><?php echo $product_row['name'];?> </h2>
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
	echo "<h2 class='text-center mt-5 mb-5'>لايوجد منتجات لهذه الأسرة</h2>";
} ?>

<?php include 'footer.php';?>
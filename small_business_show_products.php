<?php include 'header.php'; ?>

<style>
th {
	background-color: #eee;
	padding: 5px;
}
</style>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>

<h2 class=" text-center mt-5 mb-5">المنتجات الخاصة بك في النظام</h2>

<table align="center" width="100%">
	<tr>
		<th></th>
		<th>الاسم</th>
		<th>الوصف</th>
		<th>السعر</th>
		<th>التصنيف</th>
		<th></th>
	</tr>
<?php
$products = mysql_query ( "SELECT product.*, product.id AS product_id, category.name AS category_name FROM product 
							LEFT JOIN category ON product.category_id = category.id 
							WHERE product.small_business_id = '$_SESSION[user_id]'" );
while ( $product = mysql_fetch_array ( $products ) ) { ?>
	<tr>
		<td><img src="images/products/<?php echo $product['img']?>" width="100" height="100"></td>
		<td><?php echo $product['name']?></td>
		<td width="40%"><?php echo $product['description']?> </td>
		<td><?php echo $product['price']?></td>
		<td><?php echo $product['category_name']?></td>
		<td>
			<a href="#" onclick="if(confirm('هل تريد الحذف ؟')) window.location='small_business_delete_product.php?id=<?php echo $product['product_id'];?>'" class="btn">حذف</a> | 
			<a href="small_business_edit_product.php?id=<?php echo $product['product_id'];?>" class="btn">تحديث</a>
		</td>
	</tr>
<?php } ?>
	<tr>
		<td colspan="6" align="center"><a href="small_business_add_product.php">إضافة منتج جديد</a></td>
	</tr>
</table>
<br />

<?php include 'footer.php'; ?>
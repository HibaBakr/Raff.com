<?php include 'header.php'; ?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<?php
// get all carts
$cart_query = "SELECT cart.*, product.name, product.img, product.id AS product_id, cart.quantity AS cart_quantity FROM cart LEFT JOIN product ON cart.product_id = product.id WHERE cart.customer_id = $_SESSION[user_id]";
$cart_result = mysql_query ( $cart_query ) or die ( "Error " . mysql_error () ); 

$total_price = 0;
?>
<?php 
// check the cart count
if (mysql_num_rows($cart_result) == 0) {
	echo "<h2 class='text-center mt-5 mb-5'>سلة الشراء فارغة</h2>";
} else {
?>
<div class="container fill_height" dir="rtl">
<div class="cart_page">
    <div class="row">
        <div class="col-md-8 cart_tit">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>السلة</b></h4>
                    </div>
                   
                </div>
            </div>
			<?php while ( $cart = mysql_fetch_array ( $cart_result ) ) { 
			$product_price = $cart['price'] * $cart['cart_quantity'];
			$total_price += $product_price;
			?>
				<div class="row border-top border-bottom">
					<div class="row main align-items-center">
						<div class="col-2"><img class="img-fluid" src="images/products/<?php echo $cart['img'];?>"></div>
						<div class="col">
							<div class="row text-muted"><?php echo $cart['name'];?></div>
						</div>
						<div class="col"><?php echo $cart['cart_quantity'];?></div>
						<div class="col"><?php echo $cart['price'];?> ريال</div>
						<div class="col"><?php echo $product_price;?> ريال</div>
						<div class="col">
							<a href="customer_update_cart_product.php?product_id=<?php echo $cart['product_id']; ?>&id=<?php echo $cart['id']; ?>&q=<?php echo $cart['cart_quantity']; ?>">تحديث</a> | 
							<a href="customer_remove_cart_product.php?id=<?php echo $cart['id']; ?>">حذف</a>	
						</div>
					</div>
				</div>
            <?php } ?>
            
            <div class="back-to-shop"><a href="index.php">&leftarrow;</a><span class="text-muted">العودة الى التسوق </span></div>
        </div>
		
        <div class="col-md-4 summary">
            <div>
                <h5><b>ملخص الطلب </b></h5>
            </div>
            <hr>
            <div class="row">
                <div class="col text-left"><?php echo $total_price;?> ريال </div>
				<div class="col">اجمالي المنتجات</div>
            </div>
            <form>
                <p>الشحن</p> <select>
					  <option class="text-muted">سمسا : 25 ريال </option>
					  <option class="text-muted">ارامكس : 25 ريال</option>
                </select>
               
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
				<div class="coltext-left"><?php echo $total_price+25;?> ريال </div>
				<div class="col text-right">الأجمـالي </div>
            </div> 
				<a href="customer_clear_cart.php"><button class="btn">افراغ سلة الشراء </button></a>
				<a href="customer_billing.php"><button class="btn">الدفع </button></a>
        </div>
    </div>
</div>
</div>
<?php } ?>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php include 'footer.php'; ?>
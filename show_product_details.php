<?php include 'header.php'; ?>

<style>
	th, td {
		border:1px solid #ccc;
		padding: 5px;
	}
</style>

<?php
$products = mysql_query ( "select product.*, product.id AS product_id, small_business.id AS small_business_id, small_business.name AS small_business_name from product 
							LEFT JOIN small_business ON product.small_business_id = small_business.id 
							WHERE product.id = '$_GET[id]'" ) or die ( mysql_error () );
$comments = mysql_query ( "SELECT comment.*, comment.id AS comment_id, CONCAT(customer.first_name, ' ', customer.last_name) AS user_name FROM comment LEFT JOIN customer ON comment.customer_id = customer.id WHERE comment.product_id = $_GET[id]" ) or die ( 'error comments : ' . mysql_error () );

$product = mysql_fetch_array ( $products ); ?>

<p><br/></p>
<p><br/></p>

<div class="container fill_height pd-detail">
	<div class="container">
			<div class="card">
				<div class="container-fliud">
					<div class="wrapper row">
						<div class="preview col-md-6">
							<div class="w3-content w3-display-container">
							<img class="mySlides" src="images/products/<?php echo $product['img']?>" width="600px" height= "450px">
						</div>
							
						</div>
						<div class="details col-md-6">
						<div class="top">
							<h3 class="product-title"><?php echo $product['name']?></h3>
							<small>أنتج بواسطة <?php echo $product['small_business_name']?></small>
							</div>
							 
							<p class="product-description"><?php echo $product['description']?> </p>
							<h4 class="price">السعر: <span><?php echo $product['price']?> ريال</span></h4>
							 <?php if ($_SESSION ['user_type'] == "customer") { ?>
								<div class="action"> 
									<form action="customer_add_to_cart.php?id=<?php echo $product[id];?>" method="post">
										<input type="number" id="quantity" name="quantity" min="1" max="50" name="quantity" required />
										<button class="add-to-cart btn btn-default" type="submit">أضف الى السلة</button>
									</form>
								</div>
								<button class="btnn" onclick="window.location='customer_chat_messages.php?small_business_id=<?php echo $product['small_business_id'];?>';"><i class="fa fa-envelope"></i> تواصل مع البائع</button>
							<?php } ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	
<br />
<br />
<?php
// if the user is logged in
// show the add comment form
if ($_SESSION ['user_type'] == "customer") { ?>
<div class="container fill_height">
	<div class="commentgh">
		<form id="formcomment" method="post" action="customer_add_product_comment_check.php?product=<?php echo $_GET[id];?>">
			<textarea name="content" class="commentuser" placeholder="شاركهم برأيك" required ></textarea><br><br>
			<button class="butcom" type="submit">نشر</button>
		</form>
	</div>
</div>
<?php } // end if  ?>
<br/>
<br/>

<div class="container fill_height">
	<div class="commentgh">
		<p class="comp"><img src="media/image/comment.jpg" width="50px" height="50px"/> أراء العملاء </p>
		<div id="divcomment">
			<?php while ( $comment = mysql_fetch_array ( $comments ) ) { ?>
				<p class="pcomment">
					<img src="media/image/user.jpg" width="30px" height="30px"/> 
					<?php echo $comment['user_name'];?> : 
					<?php echo $comment['content'];?> 
					بتاريخ :  <?php echo $comment['created'];?> 
					</p> 
					<?php 
					// get replies for the comment
					$replys_query = "SELECT * FROM reply WHERE comment_id = '$comment[comment_id]'";
					$replys_result = mysql_query ( $replys_query ) or die ( 'error : ' . mysql_error () );
					if (mysql_num_rows ($replys_result) != 0) {
						echo "<h4>الردود على التعليق</h4>";
						while ($reply_row = mysql_fetch_array($replys_result)) {
							echo '<table align="center" width="50%" class="table" style="width: 100%;">';
							echo '<tr>';
							echo '<th>المحتوى</th>';
							echo "<td>$reply_row[content]</td>";
							echo '</tr>';
							echo '<tr>';
							echo '<th>التاريخ</th>';
							echo "<td>$reply_row[created]</td>";
							echo '</tr>';
							echo '</table>';
							echo "<br/>";
						}
					}?>
				<br/>
			<?php } ?>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
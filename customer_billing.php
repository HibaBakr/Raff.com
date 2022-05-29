<?php include 'header.php'; ?>

<style>
table th {
	text-align: left;
	background-color: #fff;
	line-height: 20px;
	padding: 5px;
}
</style>


<?php
// get the total of the cart 
$total = 25;

$cart_query = mysql_query ("SELECT * FROM cart WHERE customer_id = $_SESSION[user_id]") or die ("Error cart " . mysql_error());
while ($cart_row = mysql_fetch_array ($cart_query)) {
	$total += $cart_row['price'] * $cart_row['quantity'];
}
?>

<?php
if ($_GET ['action'] == 'ok') {
	$address = $_POST ['address'];
	$date = date ('Y-m-d H:i:s');
	
	$result = mysql_query ( "insert into orders(customer_id, total_price, address) values($_SESSION[user_id], $total, '$address')" );
	$orderid = mysql_insert_id ();
	
	$cart_query = mysql_query ("SELECT * FROM cart WHERE customer_id = $_SESSION[user_id]") or die ("Error cart " . mysql_error());
	
	while ($cart_row = mysql_fetch_array ($cart_query)) {
		$pid = $cart_row ['product_id'];
		$q = $cart_row ['quantity'];
		$price = $cart_row ['price'];

		mysql_query ( "insert into order_details (order_id, product_id, quantity, price) values ($orderid, $pid, $q, $price)" ) or die ("Error details " . mysql_error ());
		
		// get the small_bussiness_id
		$small_business = mysql_query ("SELECT * FROM product WHERE id = '$pid'");
		$small_business_row = mysql_fetch_array ($small_business);
		
		// insert notification to the small_business
		mysql_query ("INSERT INTO notifications (content, user_id, user_type) VALUES ('لقد تم طلب احد المنتجات الخاصة بك', '$small_business_row[small_business_id]', 'small_business') ");
		
		// get small_business info
		$small_businesss_query = "SELECT * FROM small_business WHERE id = '$small_business_row[small_business_id]'";
		$small_businesss_result = mysql_query ( $small_businesss_query ) or die ( 'error : ' . mysql_error () );
		$small_business_row1 = mysql_fetch_array($small_businesss_result);
		
		// send email to small_business
		$to = $small_business_row1['email'];
		$subject = 'Raff - Order';
		$from = 'info@raff.com';
		
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf8' . "\r\n";
		 
		// Create email headers
		$headers .= 'From: ' . $from . "\r\n".
			'Reply-To: '.$from."\r\n" .
			'X-Mailer: PHP/' . phpversion();
		 
		// Compose a simple HTML email message
		$message = "<html><body dir='rtl'>";
		$message .= "<h1 style='color:#f40;' align='center'>RAFF</h1>";
		$message .= "<h3 style='color:#f40;' align='center'>مرحباً يا $small_business_row1[name]</h3>";
		$message .= "<p align='right'>لقد تم طلب احد المنتجات الخاصة بك</p>";
		$message .= "<table width='100%' align='center' cellpadding=10 cellspacing=10>";
		$message .= "<tr><th style='background-color: #eee;'>رقم الطلب</th><td>$orderid</td></tr>";
		$message .= "<tr><th style='background-color: #eee;'>تاريخ الطلب</th><td>$date</td></tr>";
		$message .= "<tr><th style='background-color: #eee;'>العنوان</th><td>$address</td></tr>";
		$message .= "</table>";
		$message .= "<br/>";
		$message .= "<br/>";
		
		$message .= "<p align='center'>المنتجات التي تم طلبها</p>";
		$message .= "<table width='100%' align='center' cellpadding=10 cellspacing=10>";
		$message .= "<tr align='center'>
						<th style='background-color: #eee;' align='center'>اسم المنتج</th>
						<th style='background-color: #eee;' align='center'>الكمية</th>
						<th style='background-color: #eee;' align='center'>السعر</th>
						<th style='background-color: #eee;' align='center'>السعر الاجمالي</th>
					</tr>";
					$tot = $price * $q;
		$message .= "<tr align='center'>
						<td align='center'>$small_business_row[name]</td>
						<td align='center'>$q</td>
						<td align='center'>$price</td>
						<td align='center'>$tot</td>
					</tr>";
		$message .= "</table>";
		
		$message .= "</body></html>";
		
		// echo $message;
		
		// Sending email
		mail($to, $subject, $message, $headers);
	}
	
	// send email to the customer 
	$to = $_SESSION ['user_email'];
	$subject = 'Raff Order';
	$from = 'info@raff.com';
	
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf8' . "\r\n";
	 
	// Create email headers
	$headers .= 'From: ' . $from . "\r\n".
		'Reply-To: '.$from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
	 
	// Compose a simple HTML email message
	$message = "<html><body dir='rtl'>";
	$message .= "<h1 style='color:#f40;' align='center'>RAFF</h1>";
	$message .= "<h3 style='color:#f40;' align='center'>مرحباً يا $_SESSION[user]</h3>";
	$message .= "<p align='right'>لقد قمت بعمل طلب وهذه هي التفاصيل الخاصة به </p>";
	$message .= "<table width='100%' align='center' cellpadding=10 cellspacing=10>";
	$message .= "<tr><th style='background-color: #eee;'>رقم الطلب</th><td>$orderid</td></tr>";
	$message .= "<tr><th style='background-color: #eee;'>تاريخ الطلب</th><td>$date</td></tr>";
	$message .= "<tr><th style='background-color: #eee;'>العنوان</th><td>$address</td></tr>";
	$message .= "<tr><th style='background-color: #eee;'>السعر الاجمالي</th><td>$total</td></tr>";
	$message .= "</table>";
	$message .= "<br/>";
	$message .= "<br/>";
	
	$message .= "<p align='center'>المنتجات التي قمت بطلبها</p>";
	$message .= "<table width='100%' align='center' cellpadding=10 cellspacing=10>";
	$message .= "<tr><th style='background-color: #eee;' align='center'>اسم المنتج</th></tr>";
	
	$products = mysql_query ("SELECT * FROM product WHERE id IN (SELECT product_id FROM cart WHERE customer_id = '$_SESSION[user_id]')");
	while ($product_row = mysql_fetch_array ($products)) {
		$message .= "<tr><td>$product_row[name]</td></tr>";
	}

	$message .= "</table>";
	
	$message .= "</body></html>";
	
	// echo $message;
	
	// Sending email
	mail($to, $subject, $message, $headers);
	
	// clear the cart
	mysql_query ("DELETE FROM cart WHERE customer_id = $_SESSION[user_id]") or die ("error delete cart" . mysql_error ());;
	
	echo '<script>alert("تم تأكيد الطلب بنجاح")</script>';
	// header ( "REFRESH:0; url=index.php" );
}
?>

<div class="container fill_height">
		<div class="container py-5 payment">
			<!-- For demo purpose -->
			<div class="row x">
				<div class="col-lg-8 mx-auto text-center">
					<h3 class="display-6">معلومات الـدفـع </h3>
				</div>
			</div> <!-- End -->
			<div class="row">
				<div class="col-lg-6 mx-auto">
					<div class="card ">
						<div class="card-header">
							<div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
								<!-- Credit card form tabs -->
								<ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
									<li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active ">بيانات البطاقة الأتمانيـة</a> </li>
								</ul>
							</div> <!-- End -->
							<!-- Credit card form content -->
							<div class="tab-content">
								<!-- credit card info-->
								<div id="credit-card" class="tab-pane fade show active pt-3">
									<form role="form" action="customer_billing.php?action=ok" method="post">
										<div class="form-group"> 
											<label for="username">
												<h6>مجموع الطلب </h6>
											</label> 
											<input type="text" name="total_price" disabled value="<?php echo $total ; ?> ريال" class="form-control "/> 
										</div>
										
										<div class="form-group"> 
											<label for="username">
												<h6>عنوان التوصيل </h6>
											</label> 
											<input type="text" name="address" placeholder="" required class="form-control "/> 
										</div>
										
										<div class="form-group"> 
											<label for="username">
												<h6>الاسم على البطاقة </h6>
											</label> 
											<input type="text" name="username" placeholder="rana alharbi" required class="form-control "/> 
										</div>
												
										<div class="form-group"> <label for="cardNumber">
												<h6>رقم البطاقة</h6>
											</label>
											<div class="input-group"> <input type="text" name="cardNumber" pattern="[0-9]{16}"
													placeholder="1111 2222 3333 4444" class="form-control "
													required>
												<div class="input-group-append"> <span
														class="input-group-text text-muted"> <img
															src="https://b.top4top.io/p_22406gqf61.png" width="60"
															height="25"> </span> </div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="form-group"> <label><span class="hidden-xs">
															<h6>صالح حتـى </h6>
														</span></label>
													<div class="input-group"> <input type="number" placeholder="شهر"
															name="" class="form-control" min="1" max="12" required /> 
															<input type="number" placeholder="السنة" name="" class="form-control" min="2022" max="2030" required /> </div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group mb-4"> <label data-toggle="tooltip"
														title="Three digit CV code on the back of your card">
														<h6>الرمز <i class="fa fa-question-circle d-inline"></i>
														</h6>
													</label> <input pattern="[0-9]{3}"  type="text" required class="form-control">
												</div>
											</div>
										</div>
										<div class="card-footer"> <button type="submit"
												class="subscribe btn btn-block shadow-sm"> تأكيد الدفع </button>
									</form>
								</div>
							</div> <!-- End -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
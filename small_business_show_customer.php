<?php include "header.php" ?>

<?php 
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>
<?php
// get customer info
$query = "SELECT * FROM customer WHERE id = '$_GET[customer_id]'";
$customer_result = mysql_query($query) or die("can't run query because " . mysql_error());
$customer_row = mysql_fetch_array($customer_result);

// get rating for the customer
$rating_query = "select count(*) AS count_all, sum(result) AS total from rating WHERE user_id = '$_GET[customer_id]' AND user_type='customer'";
$rating_result = mysql_query ( $rating_query );
$rating_row = mysql_fetch_array ( $rating_result );
?>

<div class="cusProPG">
	<div class="BAcontainer">
		<div class="BApadding">
			<div>
				<div>
					<div class="BAcard BAuser-card">
						<div class="BAmarginl BAmarginr">
							<div class="BAbackground BAprofile">
								<div class="BAcardblock">
									<div class="BAmarginb"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="BAimage"> </div>
									<h6 id="BAtex"><?php echo $customer_row['first_name'] . ' ' . $customer_row['last_name'];?></h6>
									<p id="BAparag"><?php echo $customer_row['city'];?></p>
								</div>
							</div>
							<div>
								<div class="BAcardblock">
									<h6 class="BAmarginb-20 BApaddingb BAborder" id="BAtex">المعلومات</h6>
									<div>
										<div>
											<p class="BAmarginb-10" id="BAparag">الايميل</p>
											<h6 class="BAtext" id="BAtex"><?php echo $customer_row['email'];?></h6>
										</div>
									</div>
									<h6 class="BAmarginb-20 BAmargint-40 BApaddingb BAborder" id="BAtex">التقييم
									</h6>
									<div>
										<?php if ($rating_row['count_all'] != 0 ) { echo round(($rating_row['total'] / $rating_row['count_all']),2); } else {echo "0"; }?> من 5 
									</div>

									<div class="BAborder BApaddingb BAmarginb-20 BAmargint"></div>
									<div>
										<div>
											<button class="BAbut" type="button"><a href="https://uei.mc.gov.sa/uei/ConsumerComplaint/index">رفع شكوى</a></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include "footer.php" ?>
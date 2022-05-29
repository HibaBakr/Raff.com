<?php include 'header.php'; ?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business") {
	header ( "Location: index.php" );
}
?>

<style>
	th, td {
		border:1px solid #ccc;
		padding: 5px;
	}
</style>

<!--  for rating system -->
<style>
.img {
    max-width: 100%;
    height: 300px;
}
.item {
    width: 300px;
    min-height: 120px;
    max-height: 300px;
    float: left;
    margin: 3px;
    padding: 3px;
}
</style>
<script type="text/javascript">
  
   function change(id)
   {
      var cname=document.getElementById(id).className;
      var ab=document.getElementById(id+"_hidden").value;
      document.getElementById(cname+"rating").value=ab;
//       alert (ab);

      for(var i=ab;i>=1;i--)
      {
         document.getElementById(cname+i).src="images/star2.png";
      }
      var id=parseInt(ab)+1;
      for(var j=id;j<=5;j++)
      {
         document.getElementById(cname+j).src="images/star1.png";
      }
   }

</script>
<!-- end script and style for rating system --> 

<script>
function check_rating () {
	if(rating_form.phprating.value == 0) {
		alert ('يجب تحديد التقييم');
		return false;
	} else {
		return true;
	}
}
</script>

<br/>

<div class="cssignup-wrap">
	<div class="signup-html">
		<div class="signup-form">
			<h3>تقييم العميل</h3><br>
			<div id='signup' class="sign-up-htm" dir="rtl">
				<form id="rating_form" name="rating_form" action="small_business_rate_customer_check.php?customer=<?php echo $_GET[id];?>" method="post" class=" sign-up-html" onsubmit="return check_rating();">
					<input type="hidden" value="<?php echo $_GET['id'];?>" name="order_id" />
					
					<div class="group">
						<label for="status" class="label ">التقييم</label>
						<input type="hidden" id="php1_hidden" value="1">
						<img style="margin-top:10px; width:50px; height:50px; float:left;" src="images/star1.png" onmouseover="change(this.id);" id="php1" class="php">
						<input type="hidden" id="php2_hidden" value="2">
						<img style="margin-top:10px; width:50px; height:50px; float:left;" src="images/star1.png" onmouseover="change(this.id);" id="php2" class="php">
						<input type="hidden" id="php3_hidden" value="3">
						<img style="margin-top:10px; width:50px; height:50px; float:left;" src="images/star1.png" onmouseover="change(this.id);" id="php3" class="php">
						<input type="hidden" id="php4_hidden" value="4">
						<img style="margin-top:10px; width:50px; height:50px; float:left;" src="images/star1.png" onmouseover="change(this.id);" id="php4" class="php">
						<input type="hidden" id="php5_hidden" value="5">
						<img style="margin-top:10px; width:50px; height:50px; float:left;" src="images/star1.png" onmouseover="change(this.id);" id="php5" class="php">
						<input type="hidden" name="phprating" id="phprating" value="0">
					</div>
					<div class="group">
						<p><br/></p>
					</div>
					
					<div class="group">
					<br/>
						<input id="reg" name="submit" type="submit" class="button" value="ارسال التقييم"/>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<?php include 'footer.php'; ?>
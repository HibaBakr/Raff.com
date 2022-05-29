<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "small_business" && $_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<div class="container fill_height">
<div class="ghcom">
 <p class="ghcom1"><img src="media/image/search.png" width="40" height="40"> الشكاوى والاقتراحات  </p> 

 <p class="ghcom2"> يسرنا استلام الإقتراحات والشكاوى لكي نتمكن من تحسين و تطوير خدماتنا و أدائنا لتجربة أفضل مع رف
</p>
 
 <form action="user_send_compliant_check.php" method="post">
<p class="ghcom3"> الشكوى أو الإقتراح </p>
<textarea name="content" class="ghcom5" rows="6" cols="50" required></textarea>
  <br><br>
  <input class="ghcom4" type="submit" value="حفظ وإرسال">
</form>
</div>

</div>

<?php include 'footer.php';?>
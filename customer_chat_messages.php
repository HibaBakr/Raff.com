<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<?php
$customer_id = $_SESSION['user_id'];
$small_business_id = $_GET['small_business_id'];

//small_business data
$query = "SELECT * FROM small_business WHERE id = '$_GET[small_business_id]'";
$small_business_result = mysql_query ( $query ) or die ( "can't run query because " . mysql_error () );
$small_business_row = mysql_fetch_array ( $small_business_result );
?>


<div class="chatting-pg">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h3 class="m-b-0"><?php echo $small_business_row['name'];?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history" id="chatbox">
                        <!-- chat here -->
                    </div>
                    <div class="chat-message clearfix">
                        <div class="input-group mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-send" id="submitmsg"></i></span>
                            </div>
                            <input type="text" class="form-control" id="message" placeholder="اكتب الرسالة هنا">                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
<?php include 'footer.php'; ?>

<script type="text/javascript">
"use strict";

$(document).ready(function(){
	// submit 
	$("#submitmsg").click(function(){
        var message = $("#message").val();
		// alert (message);
        $.post("customer_chat_post_message.php", {content: message, small_business_id: <?php echo $small_business_id;?>, customer_id: <?php echo $customer_id;?>});             
        
		// clear the message value
        document.getElementById("message").value = "";

        // focus the message again
        document.getElementById("message").focus();
        loadLog();
    	return false;
	});
});


function loadLog(){    
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
	var small_business_id = <?php echo $small_business_id;?>;
	
    $.ajax({
        url: "customer_chat_messages_data.php?small_business_id=" + small_business_id,
        cache: false,
        success: function(html){       
            $("#chatbox").html(html);     
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
            }
        },
    });
}

setInterval (loadLog, 1500);

</script>
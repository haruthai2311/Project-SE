<?php
require("../../../config.php");
	
$title = $_POST['title'];
$message = $_POST['message'];
$userid = $_POST['userid'];
$date_notice = $_POST['date_notice'];


$insert = "INSERT INTO notifications (date_notice,title,message,userid,status_notice) VALUES ('$date_notice','$title','$message','$userid','แจ้งซ่อม')"; 
$resule = mysqli_query($connect,$insert);
if($resule){
		echo '<script>alert("success")</script>';
		echo '<script>windows: location="checkrepair.php"</script>';
    }
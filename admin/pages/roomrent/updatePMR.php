<?php
include 'db.php';
$pmno=$_POST['id'];
$updatepmr = "UPDATE paymentroom SET pmrstatus = 'ชำระเสร็จสิ้น' WHERE pmrno = '$pmno'";	
$resule = mysqli_query($conn,$updatepmr);
$updateinr = "UPDATE invoicesroomrent SET status_r = 'ชำระเสร็จสิ้น' WHERE pmrno = '$pmno'";
mysqli_query($conn,$updateinr) or die(mysqli_error($conn));		
echo '<script>alert("success")</script>';
echo '<script>windows: location="checkpaymentroom.php"</script>';
  
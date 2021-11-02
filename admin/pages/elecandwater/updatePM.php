<?php
include 'db.php';
$pmno=$_POST['id'];
$updatepm = "UPDATE payment SET pmstatus = 'ชำระเสร็จสิ้น' WHERE pmno = '$pmno'";	
$resule = mysqli_query($conn,$updatepm);
$updatein = "UPDATE invoices SET status = 'ชำระเสร็จสิ้น' WHERE pmno = '$pmno'";
mysqli_query($conn,$updatein) or die(mysqli_error($conn));		
echo '<script>alert("success")</script>';
echo '<script>windows: location="checkpayment.php"</script>';
  

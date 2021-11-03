<?php include('../../../config.php');
 
 
$id = $_POST['id'];
$message = $_POST['message'];

$result = mysqli_query($connect,"SELECT * FROM notifications WHERE id  = '$id'");
$test = mysqli_fetch_array($result);

$messageuser = $test['message'];
$messagenew = $messageuser."<br>***หมายเหตุ : ".$message;

if($message==''){
    mysqli_query($connect,"UPDATE notifications SET status_notice = 'เสร็จสิ้น' WHERE id = '$id'");
	echo "<script>windows: location='checkrepair.php'</script>";	
            
}
else{
    mysqli_query($connect,"UPDATE notifications SET status_notice = 'เสร็จสิ้น' ,message  = '$messagenew' WHERE id = '$id'");
	echo "<script>windows: location='checkrepair.php'</script>";	
}                
?>
<?php include('../../../config.php');
 
 
$id = $_POST['id'];


$result = mysqli_query($connect,"SELECT * FROM notifications WHERE id  = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
else{}
    mysqli_query($connect,"UPDATE notifications SET status_notice = 'กำลังดำเนินการ' WHERE id = '$id'");
			

            echo "<script>windows: location='checkrepair.php'</script>";	
            
?>
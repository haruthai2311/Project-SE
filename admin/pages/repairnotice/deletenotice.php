<?php include('../../../config.php');
 
 
$id = $_GET['id'];


$result = mysqli_query($connect,"SELECT * FROM notifications WHERE id  = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
else{}
    mysqli_query($connect,"DELETE FROM notifications WHERE id  = '$id'");
			

            echo "<script>windows: location='checkrepair.php'</script>";	
            
?>
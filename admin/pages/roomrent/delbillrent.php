<?php session_start(); ?>
<?php
 include 'db.php';
$id =$_REQUEST['id'];

$result = mysqli_query($conn,"SELECT * FROM `invoicesroomrent` WHERE id_inroom = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
else{}
    mysqli_query($conn,"DELETE FROM `invoicesroomrent` WHERE id_inroom = '$id'");
			

            echo "<script>windows: location='billrent.php'</script>";	
            
?>
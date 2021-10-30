<?php session_start(); ?>
<?php
 include 'db.php';
$id =$_REQUEST['idin'];

$result = mysqli_query($conn,"SELECT * FROM invoices WHERE id_in  = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
else{}
    mysqli_query($conn,"DELETE FROM invoices WHERE id_in = '$id'");
			

            echo "<script>windows: location='bill.php'</script>";	
            
?>
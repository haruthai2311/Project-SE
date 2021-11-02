   
<?php 
require('../../../config.php');

$id_room=$_GET["idr"];

$sql="DELETE FROM rooms WHERE id_room =$id_room";

$result=mysqli_query($connect,$sql);

if($result){
    header("location:editinfo.php");
    exit(0);
}else{
    echo "เกิดข้อผิดพลาดเกิดขึ้น";
}

?>
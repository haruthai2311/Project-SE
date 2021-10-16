   
<?php 
require('../../../config.php');

$id_ocp=$_GET["idocp"];
$sql = "SELECT * FROM occupant WHERE id_ocp = '$id_ocp' ";
$rs = $connect->query($sql);
$row = $rs->fetch_assoc();
$id_room = $row['id_room'];

$update = "UPDATE rooms SET status_room = 'empty'  WHERE rooms.id_room = '$id_room' ";
$result=mysqli_query($connect,$update);

if($result){
    $delete="DELETE FROM occupant WHERE id_ocp =$id_ocp";
    $result=mysqli_query($connect,$delete);
    header("location:infooccupant.php");
    exit(0);
}else{
    echo "เกิดข้อผิดพลาดเกิดขึ้น";
}
?>
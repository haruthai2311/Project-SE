<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('../../../config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : ''); //รับค่าไฟล์จากฟอร์ม	
$id = $_POST['id'];
$userid = $_POST['userid'];
$totalprice = $_POST['totalprice'];


echo $id,$userid,$totalprice;
   
 
?>
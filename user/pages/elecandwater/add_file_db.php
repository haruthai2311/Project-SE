<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('../../../config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : ''); //รับค่าไฟล์จากฟอร์ม	
$id = $_POST['id'];
$userid = $_POST['userid'];
$inprice = $_POST['inprice'];


       

//ฟังก์ชั่นวันที่
date_default_timezone_set('Asia/Bangkok');
$date = date("dmy");	
//ฟังก์ชั่นสุ่มตัวเลข
     $numrand = (mt_rand());
//เพิ่มไฟล์
$upload=$_FILES['fileupload'];
    if($upload != '') {   //not select file
    //โฟลเดอร์ที่จะ upload file เข้าไป 
    $path="fileupload/";  

    //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
    $type = strrchr($_FILES['fileupload']['name'],".");
        
    //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
    $newname = $date.$numrand.$type;
    $path_copy=$path.$newname;
    $path_link="fileupload/".$newname;

//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  	
}
// เพิ่มไฟล์เข้าไปในตาราง uploadfile

    $sql = "INSERT INTO payment (id_invoices,userid,pmdate,slip,pmtotal,pmrtatus ) 
    VALUES('$id','$userid','$pm_date','$pmtotal','$newname','กำลังดำเนินการ')";
    
    $result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error($connect));


//mysqli_close($connect);
// javascript แสดงการ upload file
//SELECT pmrno FROM `paymentroom` WHERE id_inroom = '4'

if($result){
    $ss = "SELECT pmrno FROM `payment` WHERE id_in = '$id'";
    $r = mysqli_query($connect, $ss); 
    $row = mysqli_fetch_array($r);
    $pmrno = $row['pmno'];
    $update = "UPDATE invoices SET status = 'กำลังดำเนินการ' , pmno = '$pmrno' WHERE id_in = '$id'  ";
    mysqli_query($connect,$update) or die(mysqli_error($connect));
        echo "<script type='text/javascript'>";
        echo "alert('Upload File Succesfuly');";
        echo "window.location = 'bill.php'; ";
        echo "</script>";
}
else{
        
        echo "<script type='text/javascript'>";
        echo "alert('Error back to upload again');";
        echo "window.location = 'bill.php'; ";
        echo "</script>";
}
   

?>
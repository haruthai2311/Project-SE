<?php
session_start();
$con = mysqli_connect('localhost', 'root', '','datahome') or die("Error: " . mysqli_error($con));

$errors = array();
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

if (isset($_POST['subaddroom'])) {
	addroom();
}

if (isset($_POST['subeditroom'])) {
	editroom();
}


function addroom(){
    global $con,$errors;
    // get the post records
    $id_room = $_POST['id_room'];
    $type_room = $_POST['type_room'];
    $price_room = $_POST['price_room'];
    $status_room =$_POST['status_room'];
    $id_mte = $_POST['id_mte'];
    $id_mtw = $_POST['id_mtw'];

    
    // database insert SQL code
    $sql = "INSERT INTO `rooms` (`id_room`, `type_room`, `price_room`, `status_room`, `id_mtw`, `id_mte`) VALUES ('$id_room', '$type_room', '$price_room', '$status_room', '$id_mtw', '$id_mte')";

    // insert in database 
    $rs = mysqli_query($con, $sql) or  (mysqli_error($con));
    ?><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	if($rs){
        echo "<script type='text/javascript'>";
        echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
        echo "window.location = 'addroom.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('โปรดตรวจสอบว่ามีข้อมูลห้องนี้แล้วหรือไม่!!!!');";
        echo "window.location = 'addroom.php'; ";
        echo "</script>";}
}

function editroom(){
    global $con,$errors;
    $id_room = $_POST['id_room'];
    $type_room = $_POST['type_room'];
    $price_room = $_POST['price_room'];
    $status_room =$_POST['status_room'];
    $id_mte = $_POST['id_mte'];
    $id_mtw = $_POST['id_mtw'];

    $sql = " UPDATE rooms SET type_room = '$type_room', price_room = '$price_room' , status_room = '$status_room' ,id_mtw='$id_mtw',id_mte='$id_mte' WHERE id_room='$id_room'";
    $result=mysqli_query($con,$sql);

    if($result){
        header("location:editinfo.php");
        exit(0);
    }else{
        echo "เกิดข้อผิดพลาดเกิดขึ้น".mysqli_error($con);
    }
}

if (isset($_POST['canceledit'])) {
    header("location:editinfo.php");
    exit(0);
}
?>
<?php
session_start();
$con = mysqli_connect('localhost', 'root', '','datahome') or die("Error: " . mysqli_error($con));

$errors = array();
if (isset($_POST['addocp'])) {
	addoccupant();
}

if (isset($_POST['editocp'])) {
	editoccupant();
}

if(isset($_POST['edituser'])){
    edituser();
}

function addoccupant(){
    global $con;
    // get the post records
    $id_room = $_POST['id_room'];
    $id_ocp = $_POST['id_ocp'];
    $name_ocp = $_POST['name_ocp'];
    $last_ocp =$_POST['last_ocp'];
    $gender_ocp = $_POST['gender_ocp'];
    $phone_ocp = $_POST['phone_ocp'];
    $contact_per = $_POST['contact_per'];
    $contact_phone = $_POST['contact_phone'];
    $contact_rlts = $_POST['contact_rlts'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $address3 = $_POST['address3'];
    $address4 = $_POST['address4'];
    $address5 = $_POST['address5'];
    $address6 = $_POST['address6'];
   

    
    // database insert SQL code
    $sql = "INSERT INTO `occupant`  (`id_ocp` ,`name_ocp`,`last_ocp`,`gender_ocp`,`phone_ocp`,`address`,`contact_per`,`contact_phone`,`contact_rlts`,`id_room`)
    VALUES ('$id_ocp','$name_ocp','$last_ocp','$gender_ocp','$phone_ocp','$address1 $address2 $address3 $address4 $address5 $address6','$contact_per','$contact_phone','$contact_rlts','$id_room')";

    // insert in database 
   //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
   $rs = mysqli_query($con, $sql) or  (mysqli_error($con));
   ?><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <?php
   //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
   if($rs){
    $update = "UPDATE rooms SET status_room = 'rented'  WHERE rooms.id_room = '$id_room'  ";
    mysqli_query($con,$update) or die(mysqli_error($con));
    $insert = "INSERT INTO `user` (`name`, `username`, `password`, `id_room`) VALUES ('$name_ocp $last_ocp', '$id_ocp', '$id_ocp', '$id_room')";
    mysqli_query($con,$insert) or die(mysqli_error($con));
    echo "<script type='text/javascript'>";
    echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
    echo "window.location = 'addoccupant.php'; ";
    echo "</script>";
    }
    else{
    echo "<script type='text/javascript'>";
    echo "alert('โปรดตรวจสอบว่ามีข้อมูลผู้เช่านี้แล้วหรือไม่!!!!');";
    echo "window.location = 'addoccupant.php'; ";
    echo "</script>";}
}

function editoccupant(){
    global $con;
    // get the post records
    $id_room = $_POST['id_room'];
    $id_ocp = $_POST['id_ocp'];
    $name_ocp = $_POST['name_ocp'];
    $last_ocp =$_POST['last_ocp'];
    $gender_ocp = $_POST['gender_ocp'];
    $phone_ocp = $_POST['phone_ocp'];
    $contact_per = $_POST['contact_per'];
    $contact_phone = $_POST['contact_phone'];
    $contact_rlts = $_POST['contact_rlts'];
    $address1 = $_POST['address1'];
   
   

    // database insert SQL code
    $sql = "UPDATE `occupant` SET `name_ocp` = '$name_ocp' ,`last_ocp` = '$last_ocp',`gender_ocp` = '$gender_ocp',`phone_ocp` = '$phone_ocp' ,`address` =' $address1',`contact_per`='$contact_per' ,`contact_phone` ='$contact_phone' ,`contact_rlts` ='$contact_rlts' ,`id_room` ='$id_room'  WHERE `id_ocp` ='$id_ocp'";

    // insert in database 
   //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
   $rs = mysqli_query($con, $sql) or  (mysqli_error($con));
   ?><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <?php
   //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
   if($rs){
    echo "<script type='text/javascript'>";
    echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
    echo "window.location = 'infooccupant.php'; ";
    echo "</script>";
    }
    else{
    echo "<script type='text/javascript'>";
    echo "alert('โปรดตรวจสอบว่ามีข้อมูลผู้เช่านี้แล้วหรือไม่!!!!');";
    echo "window.location = 'infooccupant.php'; ";
    echo "</script>";}
}

function edituser(){
    global $con;
    // get the post records
    $id_room = $_POST['id_room'];
    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $username =$_POST['username'];
    $password = $_POST['password'];
  
   
   

    // database insert SQL code
    $sql = "UPDATE `user` SET `name` = '$name' ,`username` = '$username' ,`password` = '$password',`id_room` = '$id_room' WHERE `userid` ='$userid'";

    // insert in database 
   //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
   $rs = mysqli_query($con, $sql) or  (mysqli_error($con));
   ?><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <?php
   //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
   if($rs){
    echo "<script type='text/javascript'>";
    echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
    echo "window.location = 'infooccupant.php'; ";
    echo "</script>";
    }
    else{
    echo "<script type='text/javascript'>";
    echo "alert('Username นี้มีผู้ใช้แล้ว โปรดใช้ชื่อใหม่');";
    echo "window.location = 'infooccupant.php'; ";
    echo "</script>";}

}

if (isset($_POST['canceledit'])) {
    header("location:infooccupant.php");
    exit(0);
}
?>
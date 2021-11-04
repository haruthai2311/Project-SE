<?php
include 'db.php';
	
$id_room=$_POST['id'] ;
$rent = $_POST['rent'];
$prerent = $_POST['prerent'];
$discount = $_POST['discount'];
//$other = $_POST['other'];
$semester = $_POST['semester'];
$year = $_POST['year'];
$pricetotal = ($rent+$prerent)-$discount;
$date=$_POST['date'] ;


$res = mysqli_query($conn,"SELECT * FROM occupant WHERE id_room = '$id_room'");
$row = mysqli_fetch_array($res);
$userid = $row['userid'];
$insert = "INSERT INTO invoicesroomrent (userid,id_room,date,priceroom,prerent,discount,totalprice,semester,pmrno,status_r) VALUES ('$userid','$id_room', '$date','$rent','$prerent','$discount','$pricetotal','$semester $year','0','ค้างชำระ')"; 
$resule = mysqli_query($conn,$insert);
echo '<script>alert("success")</script>';
echo '<script>windows: location="billrent.php"</script>';
 
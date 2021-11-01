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

$insert = "INSERT INTO invoicesroomrent (id_room,date,priceroom,prerent,discount,totalprice,semester) VALUES ('$id_room', '$date','$rent','$prerent','$discount','$pricetotal','$semester $year')"; 
$resule = mysqli_query($conn,$insert);
echo '<script>alert("success")</script>';
echo '<script>windows: location="billrent.php"</script>';
 
<?php
include 'db.php';
	
$id_room=$_POST['id'] ;
$prevw = $_POST['prevw'];
$preve = $_POST['preve'];
$presw = $_POST['presw'];
$prese = $_POST['prese'];
$totalE = $prese - $preve;
$totalW = $presw - $prevw;
$price = $_POST['price'];
$pricetotal = ($totalE+$totalW) * $price;
$date=$_POST['date'] ;

$res = mysqli_query($conn,"SELECT * FROM occupant WHERE id_room = '$id_room'");
$row = mysqli_fetch_array($res);
$userid = $row['userid'];

$insert = "INSERT INTO invoices (userid,id_room,rcdate,preve,prese,prevw,presw,inprice,pmno,status) VALUES ('$userid','$id_room','$date','$preve','$prese','$prevw','$presw','$pricetotal','0','ค้างชำระ')"; 
$resule = mysqli_query($conn,$insert);
if($resule){
	$up = "UPDATE tempo_bill SET prevw = '$presw', preve= '$prese' WHERE id_room = '$id_room'";
	mysqli_query($conn,$up) or die(mysqli_error($conn));		
		echo '<script>alert("success")</script>';
		echo '<script>windows: location="bill.php"</script>';
    }
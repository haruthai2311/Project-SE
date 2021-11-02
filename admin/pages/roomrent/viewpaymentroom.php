<!--?php session_start();
if(!isset($_SESSION['idin'])){
	echo '<script>windows: location="bill.php"</script>';
	
	}
?-->
<?php
include 'db.php';

$id =$_REQUEST['id'];

$sql = "SELECT * FROM ((invoicesroomrent INNER JOIN occupant ON invoicesroomrent.id_room=occupant.id_room INNER JOIN rooms ON rooms.id_room = invoicesroomrent.id_room)) WHERE id_inroom = '$id';";
$rs = mysqli_query($conn, $sql) or  (mysqli_error($conn));
while($row = mysqli_fetch_array($rs)){

    $id_room=$row['id_room'] ;
    $rent = $row['priceroom'];
    $prerent = $row['prerent'];
    $discount = $row['discount'];
    $semester = $row['semester'];
    $pricetotal = ($rent+$prerent)-$discount;
    $id_inroom = $row['id_inroom'];
	$date = $row['date'];
    
	$id_ocp = $row['id_ocp'];
	$name_ocp = $row['name_ocp'];
	$last_ocp = $row['last_ocp'];
	$phone_ocp = $row['phone_ocp'];
	$typeroom = $row['type_room'];



  

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>Billing</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>

	<script>
	function printDiv(info) {
      	var printContents = document.getElementById('info').innerHTML;    
   		var originalContents = document.body.innerHTML;      
   		document.body.innerHTML = printContents;     
   		window.print();     
   		document.body.innerHTML = originalContents;
   }

</script>

</head>
<body>
<form id="info" name="frmprice" method="POST">

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5><strong><center>บิลค่าเช่าห้องพัก<center></strong></h3>
            </div>
            <div class="card-body">
               	<center><div class="row mb">
                    <div class="col-sm">
                        <h6><strong>หอพักพีพีโฮม สาขาหลังมอ</strong></h6>
						<div>199 หมู่ 9 ตำบลเชียงเครือ อำเภอเมือง จังหวัดสกลนคร 47000</div>
						<div>เบอร์โทรศัพท์ : 08-1399-3024</div>
                    </div>
                </div></center>
				<hr>

				<div class="row mb-4">
                    <div class="col-sm-6">
                        <strong><h7 class="mb-3">ห้องพักหมายเลข : <?php echo $id_room; ?> </h7></strong>
                        <div>ประเภทห้อง : <?php echo $typeroom; ?></div>
                    </div>
					<div class="col-sm-6">
                        <h7 class="mb-3">ชื่อ : <?php echo $name_ocp.' '. $last_ocp; ?></h7>
                        <div>เบอร์โทรศัพท์ : <?php echo $phone_ocp; ?></div>
                       
                    </div>
                </div>
				<strong><div>วันที่ <?php echo $date; ?></div></strong>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center">รายการ</th>
                                <th style="text-align:center">ค่าห้อง</th>
                                <th style="text-align:center">ค่ามัดจำ/ประกันของเสียหาย</th>
                                <th style="text-align:center">ส่วนลด</th>
                                <th style="text-align:center">รวม</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center">ค่าเช่าห้องพัก <?php echo $semester; ?></td>
                                <td style="text-align:center"><?php echo $rent; ?></td>
                                <td style="text-align:center"><?php echo $prerent;?></td>
                                <td style="text-align:center"><?php echo $discount;?></td>
                                <td style="text-align:center"><?php echo $pricetotal;?></td>
                            </tr>
                            <!-- tr>
                                <td class="center">ค่าน้ำประปา</td>
                                <td style="text-align:center">< ?php echo $presw; ?></td>
                                <td style="text-align:center">< ?php echo $prevw;?> </td>
                                <td style="text-align:center">< ?php echo $totalW;?> </td>
                                <td style="text-align:center">< ?php echo $priceW;?></td>
                            </ -->
							
                          
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-5 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>รวมทั้งสิ้น</strong>
                                    </td>
                                    <td class="right"><?php echo $pricetotal; ?></td>
                                </tr>
                                <!-- tr>
                                    <td class="left" >
                                        <h6><strong>ค่าอินเทอร์เน็ต</strong></h6>
                                    </td>
                                    <td class="right"><input type="text" class="border-0" value="0"  name="price[]" id="price[]" onkeyup="fncSum();"/></td>
                                </>
								<tr>
                                    <td class="left" >
                                        <h6><strong>อื่นๆ</strong></h6>
                                    </td>
                                    <td class="right"><input type="text" class="border-0" name="other" value="0"/></td>
                                </tr 
                                <tr>
                                    <td class="left">
                                        <strong>รวมทั้งสิ้น</strong>
                                    </td>
                                    <td class="right">
                                        <strong><strong><input type="text" name="sumprice" readonly class="border-0" value="<?php echo $pricetotal; ?>"></strong></strong>
                                    </td>
                                </tr>-->
                            </tbody>
                        </table>
                    </div>
                </div>
                <h6><div><u>หมายเหตุ</u></div></h6>
                <div>1.สามารถโอนเงินเข้าบัญชี กรุงไทย สาขาสกลนคร ที่ <strong class="text-danger">หมายเลขบัญชี <u>412-194-5514</u> ชื่อบัญชี เพิ่มพล กุดจอมศรี </strong> </div>
                <div>2.กรุณาชำระค่าห้องพัก ภายใน 7 วันที่ได้รับใบเรียกเก็บ ภายหลัง 7 วัน ปรับวันละ 20 บาท</div>
                <div>3.กรุณาดูแลความสะอาดหน้าห้องและหลังห้องพัก หากสกปรกทางหอพักจะดำเนินการจัดเก็บให้ โดยจะคิดค่าบริการเก็บขยะในใบเรียกเก็บเดือนถัดไป</div>
                <div>4.เบอร์โทรติดต่อในกรณีฉุกเฉิน 08-1399-3024,083-982-1044(พี่สงค์),08-4566-3865</div>
            </div>
        </div>
    </div>
	
</form>
<br>
<div><CENTER><button type="button"  class="btn btn-default " onclick="printDiv(info)"><span class=" glyphicon glyphicon-print"></span>&nbsp;Print Bill</button>&nbsp;&nbsp;&nbsp;<a href="billrent.php"><button class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Go back</button></a></CENTER>
	</div>
</div>
</body>
</html>
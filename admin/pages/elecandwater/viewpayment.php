<!--?php session_start();
if(!isset($_SESSION['idin'])){
	echo '<script>windows: location="bill.php"</script>';
	
	}
?-->
<?php
include 'db.php';

$id =$_REQUEST['idin'];

$sql = "SELECT * FROM ((invoices INNER JOIN occupant ON invoices.id_room=occupant.id_room INNER JOIN rooms ON rooms.id_room = invoices.id_room)) WHERE id_in = '$id'";
$rs = mysqli_query($conn, $sql) or  (mysqli_error($conn));
while($row = mysqli_fetch_array($rs)){

	$id_room = $row['id_room'];
	//echo $id_room;
	$rcdate = $row['rcdate'];
	$preve = $row['preve'];
	$prese = $row['prese'];
	$prevw = $row['prevw'];
	$presw = $row['presw'];
	$price = $row['inprice'];
	$id_ocp = $row['id_ocp'];
	$name_ocp = $row['name_ocp'];
	$last_ocp = $row['last_ocp'];
	$phone_ocp = $row['phone_ocp'];
	$id_mte = $row['id_mte'];
	$id_mtw = $row['id_mtw'];

	$totalE = $prese - $preve;
    $totalW = $presw - $prevw;
	

    $Consuption = $totalE+$totalW;  
    $ppu = $price / $Consuption;  
	$priceE =  $totalE * $ppu;
	$priceW = $totalW * $ppu;

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
	function printDiv(data) {
      	var printContents = document.getElementById('data').innerHTML;    
   		var originalContents = document.body.innerHTML;      
   		document.body.innerHTML = printContents;     
   		window.print();     
   		document.body.innerHTML = originalContents;
   }
 
   function fncSum()
   {
    var num = '';     var sum = <?php echo $price; ?>;
	num = document.frmprice['price[]'].value;
	if(num>=0){
      sum += parseFloat(num);
     }
    
    document.frmprice.sumprice.value = sum;}
</script>

</head>
<body>
<form id="data" name="frmprice" method="POST">

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5><strong><center>บิลค่าไฟฟ้า-ประปา<center></strong></h3>
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
                        <div>เลขมิเตอร์ไฟฟ้า : <?php echo $id_mte; ?></div>
                        <div>เลขมิเตอร์น้ำ : <?php echo $id_mtw; ?></div>
                    </div>
					<div class="col-sm-6">
                        <h7 class="mb-3">ชื่อ : <?php echo $name_ocp.' '. $last_ocp; ?></h7>
                        <div>เบอร์โทรศัพท์ : <?php echo $phone_ocp; ?></div>
                       
                    </div>
                </div>
				<strong><div>วันที่ <?php echo $rcdate; ?></div></strong>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center">รายการ</th>
                                <th style="text-align:center">มิเตอร์ที่อ่านได้ปัจจุบัน</th>
                                <th style="text-align:center">มิเตอร์ที่อ่านได้ก่อนหน้า</th>
                                <th style="text-align:center">จำนวนที่ใช้</th>
                                <th style="text-align:center">รวม</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center">ค่าไฟฟ้า</td>
                                <td style="text-align:center"><?php echo $prese; ?></td>
                                <td style="text-align:center"><?php echo $preve;?></td>
                                <td style="text-align:center"><?php echo $totalE;?></td>
                                <td style="text-align:center"><?php echo $priceE;?></td>
                            </tr>
                            <tr>
                                <td class="center">ค่าน้ำประปา</td>
                                <td style="text-align:center"><?php echo $presw; ?></td>
                                <td style="text-align:center"><?php echo $prevw;?> </td>
                                <td style="text-align:center"><?php echo $totalW;?> </td>
                                <td style="text-align:center"><?php echo $priceW;?></td>
                            </tr>
							
                          
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
                                        <strong>รวมเป็นเงิน</strong>
                                    </td>
                                    <td class="right"><?php echo $price; ?></td>
                                </tr>
                                <tr>
                                    <td class="left" >
                                        <h6><strong>ค่าอินเทอร์เน็ต</strong></h6>
                                    </td>
                                    <td class="right"><input type="text" class="border-0" value="0"  name="price[]" id="price[]" onkeyup="fncSum();"/></td>
                                </tr>
								<!--tr>
                                    <td class="left" >
                                        <h6><strong>อื่นๆ</strong></h6>
                                    </td>
                                    <td class="right"><input type="text" class="border-0" name="other" value="0"/></td>
                                </tr-->
                                <tr>
                                    <td class="left">
                                        <strong>รวมทั้งสิ้น</strong>
                                    </td>
                                    <td class="right">
                                        <strong><strong><input type="text" name="sumprice" readonly class="border-0" value="<?php echo $price; ?>"></strong></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
</form>

<div><CENTER><button type="button"  class="btn btn-default " onclick="printDiv(data)"><span class=" glyphicon glyphicon-print"></span>&nbsp;Print Bill</button>&nbsp;&nbsp;&nbsp;<a href="bill.php"><button class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Go back</button></a></CENTER>
	</div>
</div>
</body>
</html>
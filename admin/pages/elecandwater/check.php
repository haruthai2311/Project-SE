<?php
//$conn = mysqli_connect('localhost', 'root', '',"sourcecodester_wbsdb");
session_start();
$id = $_POST["id"];
//echo $id;
$conn = mysqli_connect('localhost', 'root', '','datahome') or die("Error: " . mysqli_error($conn));
$result = mysqli_query($conn,"SELECT * FROM ((payment
INNER JOIN invoices ON payment.pmno = invoices.pmno)
INNER JOIN occupant ON payment.userid = occupant.userid)
WHERE payment.pmno = '$id'");

$test = mysqli_fetch_array($result);
if (!$result) 
    {
      die("Error: Data not found..");
    }
        $pmno = $test['pmno'];
        $id_in = $test['id_in'];
        $id_ocp=$test['id_ocp'] ;
        $id_room = $test['id_room'];
        $pmdate = $test['pm_date'];
        $pmtotal = $test['pmtotal'];
        $status = $test['pmstatus'];
        $name_ocp = $test['name_ocp'];
        $last_ocp = $test['last_ocp'];
        $phone = $test['phone_ocp'];
        $rcdate = $test['rcdate'];
        $slip = $test['slip'];

        $price = $test['inprice'];
        $preve = $test['preve'];
	    $prese = $test['prese'];
	    $prevw = $test['prevw'];
	    $presw = $test['presw'];

	$totalE = $prese - $preve;
    $totalW = $presw - $prevw;
	

    $Consuption = $totalE+$totalW;  
    $ppu = $price / $Consuption;  
	$priceE =  $totalE * $ppu;
	$priceW = $totalW * $ppu;

?> 


<!--p >วันที่< ?php $date=date('d/m/y');
echo $date;?></p -->

<form method="post" action="updatePM.php">
<table >
  <tr><h5><strong>ข้อมูลบิล</strong></h5></tr>
  <tr>		                  
  <input type="hidden"  class="form-control " name="id" value="<?php echo $id; ?>" />
  <input type="hidden" class="form-control " name="date" value="<?php echo $date; ?>" />
  
  <td>บิลเลขที่ : <?php echo $id_in; ?></td><td>วันที่บันทึก : <?php echo $rcdate; ?></td>
  
  <td></td>
  
  </tr>
  <tr><td>ชื่อ : <?php echo $name_ocp.'&nbsp;' .$last_ocp;?></td></tr>
  <tr>
  <td>ค่าไฟฟ้า : </td><td>จำนวนที่ใช้ = <?php echo $totalE; ?></td><td> รวมเป็นเงิน <?php echo $priceE; ?> </td>
  </tr>
  <tr>
  <td>ค่าน้ำประปา : </td><td>จำนวนที่ใช้ = <?php echo $totalW; ?></td><td> รวมเป็นเงิน <?php echo $priceW; ?> </td>

  </tr>
  <tr>
  <td><strong><u>รวมทั้งสิ้น :  <?php echo $pmtotal; ?> </u></strong></td>

  </tr>
  
  <tr><td><h5><strong><br><br>ข้อมูลการชำระ</strong></h5></td></tr>
  <tr>
  <td>วันที่ชำระ : <?php echo $pmdate; ?></td>  
  </tr>
  <tr><td> จำนวนเงินทั้งสิ้น : <?php echo $pmtotal; ?> </td></tr>
  <tr>
  <td>หลักฐานการชำระ :</td>
  </tr>
  
</table>
</table>
  <center><tr>
  <td ><img src='../../../user/pages/elecandwater/fileupload/<?php echo $slip; ?>'  width='400'></td>
  </tr></center>

<div class="text-right">
    <button type="submit" class="btn btn-primary">การชำระถูกต้อง</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">การชำระไม่ถูกต้อง</button>          
</div>
</form>
	
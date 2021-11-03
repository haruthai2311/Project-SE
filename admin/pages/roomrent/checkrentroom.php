<?php
//$conn = mysqli_connect('localhost', 'root', '',"sourcecodester_wbsdb");
session_start();
$id = $_POST["id"];
$conn = mysqli_connect('localhost', 'root', '','datahome') or die("Error: " . mysqli_error($conn));
  
$result = mysqli_query($conn,"SELECT * FROM ((paymentroom
INNER JOIN invoicesroomrent ON paymentroom.pmrno = invoicesroomrent.pmrno)
INNER JOIN occupant ON paymentroom.userid = occupant.userid)
WHERE paymentroom.pmrno = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
    {
      die("Error: Data not found..");
    }
        $pmrno = $test['pmrno'];
        $id_inroom = $test['id_inroom'];
        $id_ocp=$test['id_ocp'] ;
        $id_room = $test['id_room'];
        $pmrdate = $test['pmrdate'];
        $pmrtotal = $test['pmrtotal'];
        $status = $test['pmrstatus'];
        $name_ocp = $test['name_ocp'];
        $last_ocp = $test['last_ocp'];
       
        $date = $test['date'];
        $slip_r = $test['slip_r'];
        $priceroom = $test['priceroom'];
    
        $rent = $test['priceroom'];
        $prerent = $test['prerent'];
        $discount = $test['discount'];
        $semester = $test['semester'];
        $pricetotal = ($rent+$prerent)-$discount;
       
        
   

?> 


<!--p >วันที่< ?php $date=date('d/m/y');
echo $date;?></p -->

<form method="post" action="updatePMR.php">
<table >
  <tr><h5><strong>ข้อมูลบิล</strong></h5></tr>
  <tr>		                  
  <input type="hidden"  class="form-control " name="id" value="<?php echo $id; ?>" />
  <input type="hidden" class="form-control " name="date" value="<?php echo $date; ?>" />
  
  <td>บิลเลขที่ : <?php echo $id_inroom; ?></td><td>ภาคการศึกษา : <?php echo $semester; ?></td>
  
  <td></td>
  
  </tr>
  <tr><td>ชื่อ : <?php echo $name_ocp.'&nbsp;' .$last_ocp;?></td>
  <tr>
  <td>ค่าเช่าห้องพัก : <?php echo $priceroom; ?></td><td >ค่ามัดจำ/ประกันของเสียหาย : <?php echo $prerent; ?></td>
  </tr>
  <tr><td> ส่วนลด : <?php echo $discount; ?> </td></tr>
  <tr>
  <td><strong><u>รวมทั้งสิ้น :  <?php echo $pmrtotal; ?> </u></strong></td>

  </tr>
  
  <tr><td><h5><strong><br><br>ข้อมูลการชำระ</strong></h5></td></tr>
  <tr>
  <td>วันที่ชำระ : <?php echo $pmrdate; ?></td>  
  </tr>
  <tr><td> จำนวนเงินทั้งสิ้น : <?php echo $pmrtotal; ?> </td></tr>
  <tr>
  <td>หลักฐานการชำระ :</td>
  </tr>
  
</table>
  <center><tr>
  <td ><img src='../../../user/pages/roomrent/fileupload/<?php echo $slip_r; ?>'  width='400'></td>
  </tr></center>

<div class="text-right">
    <button type="submit" class="btn btn-primary">การชำระถูกต้อง</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">การชำระไม่ถูกต้อง</button>          
</div>
</form>
	
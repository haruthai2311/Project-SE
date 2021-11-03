
<?php
session_start();
$id = $_POST["id"];
$conn = mysqli_connect('localhost', 'root', '','datahome') or die("Error: " . mysqli_error($conn));
$result = mysqli_query($conn,"SELECT * FROM occupant INNER JOIN rooms ON occupant.id_room=rooms.id_room WHERE rooms.id_room =  '$id'");



$test = mysqli_fetch_array($result);
if (!$result) 
    {
      die("Error: Data not found..");
    }
        $id_ocp=$test['id_ocp'] ;
        $name_ocp= $test['name_ocp'] ;					
        $last_ocp=$test['last_ocp'] ;
        $phone_ocp=$test['phone_ocp'] ;
        $id_mtw=$test['id_mtw'] ;
        $id_mte=$test['id_mte'] ;
        $id_room = $test['id_room'];

$q = mysqli_query($conn,"select prevw,preve from tempo_bill where id_room = '$id_room'");
$results = mysqli_fetch_array($q);
$previousw = $results['prevw'];
$previouse = $results['preve'];
?> 

<p><center><h3>บิลแจ้งชำระค่าไฟฟ้า-น้ำประปา</h3><center></p>
<h4>ชื่อ : <?php echo $name_ocp.'&nbsp;' .$last_ocp.'&nbsp;'.$id;?></h4>
<p><?php $date=date('d/m/y');
echo $date;?></p>

<h6><p style="text-align:left"><u>หมายเหตุ</u></p></h6>
<p style="text-align:left">1.สามารถโอนเงินเข้าบัญชี<strong class="text-danger">ธนาคารกรุงไทย</strong> สาขาสกลนคร ที่หมายเลขบัญชี <strong class="text-danger"> <u>412-194-5514</u></strong> ชื่อบัญชี <strong class="text-danger">เพิ่มพล กุดจอมศรี</strong></p>
<p style="text-align:left">2.กรุณาชำระค่าน้ำ-ไฟฟ้า-อินเทอร์เน็ต ภายใน 7 วันที่ได้รับใบเรียกเก็บ ภายหลัง 7 วัน ปรับวันละ 10 บาท</p>
<p style="text-align:left">3.กรุณาดูแลความสะอาดหน้าห้องและหลังห้องพัก หากสกปรกทางหอพักจะดำเนินการจัดเก็บให้ โดยจะคิดค่าบริการเก็บขยะในใบเรียกเก็บเดือนถัดไป</p>
<p style="text-align:left">4.เบอร์โทรติดต่อในกรณีฉุกเฉิน 08-1399-3024,083-982-1044(พี่สงค์),08-4566-3865 </p>
<p style="text-align:left">***เมื่อทำการชำระแล้วโปรด <strong class="text-danger">แนบสลิปการโอน </strong>เพื่อยืนยันการชำระ***</p>

<!-- partial -->
<!-- <div class="main-panel">
        <div class="content-wrapper">
          <form method="post" action="import_file.php" enctype="multipart/form-data">
            <input type="file" name="file"/>
            <input type="submit" name="submit_file" value="อัพโหลด"/>
          </form>
        </div>
</table>
<div class="text-right">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>          
</div> -->


<?php
//1. เชื่อมต่อ database: 
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง: 
$query = "SELECT * FROM uploadfile ORDER BY fileID asc" or die("Error:" . mysqli_error()); 
//3. execute the query. 
$result = mysqli_query($con, $query); 
echo "</table>";
//5. close connection
mysqli_close($con);
?>
<br/>
<form method="post" action="add_fil_db.php" enctype="multipart/form-data" name="upfile" id="upfile">
  <p>&nbsp;</p>
  <table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40" colspan="2" align="center" bgcolor="#D6D6D6">Form Upload&nbsp;File</td>
    </tr>
    <tr>
      <td width="126" bgcolor="#EDEDED">&nbsp;</td>
      <td width="574" bgcolor="#EDEDED">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" bgcolor="#EDEDED">File Browser</td>
      <td align="center" bgcolor="#EDEDED"><label>
        <input type="file" name="fileupload" id="fileupload"  required="required"/>
      </label></td>
    </tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td bgcolor="#EDEDED">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td align="center" bgcolor="#EDEDED"><input type="submit" name="button" id="button" value="Upload" /></td>
    </tr>
    <tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td bgcolor="#EDEDED">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<div class="text-right">
   <!-- <button type="submit" class="btn btn-primary">Save</button> -->
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>          
</div>
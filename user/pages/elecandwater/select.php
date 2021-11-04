<?php include('../../../config.php');
 
 
 $id = $_POST['id'];
echo "<p>". $date=date('d/m/y');"</p>";
//2. query ข้อมูลจากตาราง: 
$query = "SELECT * FROM invoices WHERE id_in  = '$id'" or die("Error:" . mysqli_error($connect)); 
//3. execute the query. 
$result = mysqli_query($connect, $query); 
//4 . แสดงข้อมูลที่ query ออกมา: 


while($row = mysqli_fetch_array($result)) { 
  $id_invoices = $row["id_in"]; 
  $id_room = $row["id_room"]; 
  $inprice = $row["inprice"] ;  
  $rcdate = $row['rcdate'];
  $id_room = $row['id_room'];
  $prese = $row['prese'];
  $preve = $row['preve'];
  $totalE = $prese - $preve;
  $presw = $row['presw'];
  $prevw = $row['prevw'];
  $totalW = $presw - $prevw;
  
 
  $Consuption = $totalE+$totalW;
  $ppu = $inprice / $Consuption;
  $priceE = $totalE*$ppu;
  $priceW = $totalW*$ppu;
      
 
  $inprice = $row["inprice"];
  $userid = $row["userid"];
  $ocp = "SELECT * FROM occupant WHERE userid  = '$userid'" or die("Error:" . mysqli_error($connect));
  $res = mysqli_query($connect, $ocp); 
  $rw = mysqli_fetch_array($res);
  $name_ocp = $rw['name_ocp'];
  $last_ocp =$rw['last_ocp'];

}
echo "</table>";
//5. close connection
mysqli_close($connect);
?>




<table >
  <tr><h5><strong>ข้อมูลบิล</strong></h5></tr>
    
<tr>		                  

  <td>บิลเลขที่ : <?php echo $id_invoices; ?></td><td>&nbsp;&nbsp;วันที่บันทึก : <?php echo $date; ?></td>
  
  
  
  </tr>
  <tr><td>ชื่อ : <?php echo $name_ocp.'&nbsp;' .$last_ocp;?></td><td>&nbsp;&nbsp;ห้อง : <?php echo $id_room; ?></tr>
  <tr>
  <td>ค่าน้ำ : <?php echo $priceE; ?></td>&nbsp;<td>&nbsp;&nbsp;ค่าไฟ : <?php echo $priceW; ?></td>
  </tr>
  <td><strong><u>รวมทั้งสิ้น :  <?php echo $inprice; ?> </u></strong></td>

  </tr>
</table>
<br/>

<h6><p style="text-align:left"><u>หมายเหตุ</u></p></h6>
<p style="text-align:left">1.สามารถโอนเงินเข้าบัญชี<strong class="text-danger">ธนาคารกรุงไทย</strong> สาขาสกลนคร ที่หมายเลขบัญชี <strong class="text-danger"> <u>412-194-5514</u></strong> ชื่อบัญชี <strong class="text-danger">เพิ่มพล กุดจอมศรี</strong></p>
<p style="text-align:left">2.กรุณาชำระค่าน้ำ-ไฟฟ้า-อินเทอร์เน็ต ภายใน 7 วันที่ได้รับใบเรียกเก็บ ภายหลัง 7 วัน ปรับวันละ 10 บาท</p>
<p style="text-align:left">*** เมื่อทำการชำระแล้วโปรด <strong class="text-danger">แนบสลิปการโอน </strong>เพื่อยืนยันการชำระ ***</p>

<br/>
<form action="add_file_db.php" method="post" enctype="multipart/form-data" name="upfile" id="upfile">
  <p>&nbsp;</p>
  <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <input type="hidden"  class="form-control mb-2" name="id" value="<?php echo $id; ?>" />
        <input type="hidden"  class="form-control mb-2" name="inprice" value="<?php echo $inprice; ?>" />
        <input type="hidden"  class="form-control mb-2" name="userid" value="<?php echo $userid; ?>" />
      <td height="40" colspan="2" align="center" bgcolor="#D6D6D6">File Browser</td>
    </tr>
    <tr>
      <td width="126" bgcolor="#EDEDED">&nbsp;</td>
      <td width="574" bgcolor="#EDEDED">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" bgcolor="#EDEDED"></td>
      <td align="right" bgcolor="#EDEDED"><label>
        <input type="file" name="fileupload" id="fileupload"  required="required"/>
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td bgcolor="#EDEDED">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td  align="center"  bgcolor="#EDEDED"><input type="submit" name="button" id="button" value="Upload" /></td>
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
</body>
</html>


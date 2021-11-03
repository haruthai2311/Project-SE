<?php include('../../../config.php');
 
 
 $id = $_POST['id'];
 echo $id;
//2. query ข้อมูลจากตาราง: 
$query = "SELECT * FROM invoicesroomrent WHERE id_inroom  = '$id'" or die("Error:" . mysqli_error($connect)); 
//3. execute the query. 
$result = mysqli_query($connect, $query); 
//4 . แสดงข้อมูลที่ query ออกมา: 

//ใช้ตารางในการจัดข้อมูล
echo "<table border='1' align='center' width='500'>";
//หัวข้อตาราง
echo "<tr align='center' bgcolor='#CCCCCC'><td> ID</td><td>price total</td><td>semester</td></tr>";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td align='center'>" .$row["id_inroom"] .  "</td> "; 
  //echo "<td><a href='.$row['fileupload']'>showfile</a></td> ";
  echo "<td>"  .$row["totalprice"] . "</td> ";  
  echo "<td align='center'>" .$row["semester"] .  "</td> ";
  echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($connect);
?>
<br/>
<form action="addslipdb.php" method="post" enctype="multipart/form-data" name="upfile" id="upfile">
  <p>&nbsp;</p>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <input type="hidden"  class="form-control mb-2" name="id" value="<?php echo $id; ?>" />
        <input type="hidden"  class="form-control mb-2" name="totalprice" value="<?php echo $row["totalprice"]; ?>" />
        <input type="hidden"  class="form-control mb-2" name="userid" value="<?php $row["userid"]; ?>" />
      <td height="40" colspan="2" align="center" bgcolor="#D6D6D6">Form Upload&nbsp;File</td>
    </tr>
    <tr>
      <td width="126" bgcolor="#EDEDED">&nbsp;</td>
      <td width="574" bgcolor="#EDEDED">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" bgcolor="#EDEDED">File Browser</td>
      <td bgcolor="#EDEDED"><label>
        <input type="file" name="fileupload" id="fileupload"  required="required"/>
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td bgcolor="#EDEDED">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td bgcolor="#EDEDED"><input type="submit" name="button" id="button" value="Upload" /></td>
    </tr>
    <tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td bgcolor="#EDEDED">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>

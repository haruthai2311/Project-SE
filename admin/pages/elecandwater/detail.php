<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h6>Note: Bill Amount = Total Consumption * Price/unit</h6><br>
<?php
include 'db.php';
session_start();
$id = $_POST["id"];
$conn = mysqli_connect('localhost', 'root', '','datahome') or die("Error: " . mysqli_error($conn));
$result = mysqli_query($conn,"SELECT * FROM `invoices` WHERE id_room = '$id'");


echo "<div class='table-responsive'>
<table class=\"table table-striped table-hover table-bordered\">
<tr>
<th>บิลเลขที่</th>
<th>วันที่</th>
<th>จำนวนไฟฟ้า-ประปาที่ใช้</th>
<th>ราคา/หน่วย</th>
<th>รวมทั้งหมด</th>
<th>สถานะ</th>
<th> </th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
    $prevw = $row['prevw'];
    $preve = $row['preve'];
    $presw = $row['presw'];
    $prese = $row['prese'];
    $totalE = $prese - $preve;
    $totalW = $presw - $prevw;
    $inprice = $row['inprice'];
    $Consuption = $totalE+$totalW;    
    $ppu = $inprice / $Consuption;
  echo "<tr>";
  echo "<td>" . $row['id_in'] . "</td>";
  echo "<td>" . $row['rcdate'] . "</td>";
  echo "<td>". $Consuption."</td>";
  echo "<td>".$ppu."</td>";
  echo "<td>".$inprice."</td>";
  echo "<td>".$row['status']."</td>";
 ?>

 
  <td><a rel='facebox' href='viewpayment.php?idin=<?php echo $row['id_in']; ?>'>View </a>|
  <a rel='facebox' href='delbill.php?idin=<?php echo $row["id_in"];?>' onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')">Del</td>
  <?php echo "</tr>";
  }
echo "</table></div>";

?>
</body>
</html>
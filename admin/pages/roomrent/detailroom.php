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
$result = mysqli_query($conn,"SELECT * FROM `invoicesroomrent` WHERE id_room = '$id'");


echo "<div class='table-responsive'>
<table class=\"table table-striped table-hover table-bordered\">
<tr>
<th>บิลเลขที่</th>
<th>ปีการศึกษา</th>
<th>ค่าเช่า</th>
<th>ค่ามัดจำ</th>
<th>ส่วนลด</th>
<th>รวมทั้งหมด</th>
<th> </th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
    $id_room=$row['id_room'] ;
    $rent = $row['priceroom'];
    $prerent = $row['prerent'];
    $discount = $row['discount'];
    $semester = $row['semester'];
    $pricetotal = ($rent+$prerent)-$discount;
    $id_inroom = $row['id_inroom'];
  
  echo "<tr>";
  echo "<td>" . $id_inroom . "</td>";
  echo "<td>" . $semester . "</td>";
  echo "<td>". $rent."</td>";
  echo "<td>".$prerent."</td>";
  echo "<td>".$discount."</td>";
  echo "<td>".$pricetotal."</td>";
 ?>

 
  <td><a rel='facebox' href='viewpaymentroom.php?id=<?php echo $row['id_inroom']; ?>'>View </a>|
  <a rel='facebox' href='delbillrent.php?id=<?php echo $row["id_inroom"];?>' onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')">Del</td>
  <?php echo "</tr>";
  }
echo "</table></div>";

?>
</body>
</html>
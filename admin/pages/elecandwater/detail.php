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


echo "<table class=\"table table-striped table-hover table-bordered\">
<tr>
<th>Id</th>
<th>Date</th>
<th>Consuption</th>
<th>Price/Unit</th>
<th>Bill Amount</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
    $prevw = $row['prevw'];
    $preve = $row['preve'];
    $presw = $row['presw'];
    $prese = $row['prese'];
    $totalE = $prese - $preve;
    $totalW = $presw - $prevw;

    $Consuption = $totalE+$totalW;    
  echo "<tr>";
  echo "<td>" . $row['id_in'] . "</td>";
  echo "<td>" . $row['rcdate'] . "</td>";
  echo "<td>". $Consuption."</td>";
  echo "<td>7</td>";
  echo "<td>". $row['inprice']."</td>";
 
 
 echo "<td><a rel='facebox' href='viewpayment.php?idin=".$row['id_in']."'>View </a>| ";
 echo "<a rel='facebox' href='delbill.php?idin=".$row['id_in']."'>Del</td>";
  echo "</tr>";
  }
echo "</table>";

?>
</body>
</html>
<!--?php session_start();
if(!isset($_SESSION['idin'])){
	echo '<script>windows: location="bill.php"</script>';
	
	}
?-->
<?php
include 'db.php';

$id =$_REQUEST['idin'];
echo $id;
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
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script>
function printDiv(data) {
      var printContents = document.getElementById('data').innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
</head>
<body style=" background-size:cover; font-family:'Courier New', Courier;">
<style type="text/css">
#data { margin: 0 auto; width:700px; padding:20px; border:#066 thin ridge; height:600px; }

</style>
<div id="data">
<center>
<h4><center><b>Water Billing System</b></center></h4>
<p>ESPSN - ESSP</p>
<p><strong>Bill Invoice</strong></p>
<p>Phone: +255 (0) 654 235</p>
<i style="text-align:right; margin-left:250px;">Date: <?php echo $rcdate; ?></i>
</center>
<div id="context">
<table class="table table-striped table-bordered">
<tr><td>Last Name:</td><td><b><i><?php echo $last_ocp; ?></i></b></td><td>Electric Meter Number</td><td><i>SMART/00<?php echo $id_mte; ?></i></td> </tr>
<tr><td>First Name</td><td><b><i><?php echo $name_ocp; ?></td><td bordercolor="#000000">Water Meter Number</td><td><?php echo $id_mtw; ?></td></tr>

<!-- <tr><td>Address: </td><td><b><i>< ?php echo $address; ? ></td></tr> -->
<tr><td bordercolor="#000000">Contact: </td><td><b><i><?php echo $phone_ocp; ?></td></tr>
<tr><td bordercolor="#000000">Electric Previous Reading :</td><td><b><i> <?php echo $preve;?> </td><td bordercolor="#000000">Electric Present Reading : </td><td><b><i><?php echo $prese; ?> </td></tr>
<tr><td bordercolor="#000000">Water Previous Reading :</td><td><b><i> <?php echo $prevw;?> </td><td bordercolor="#000000">Water Present Reading : </td><td><b><i><?php echo $presw; ?> </td></tr>

<tr><td bordercolor="#000000">Consuption: </td><td><b><i><?php echo $Consuption;?> </td><td bordercolor="#000000">Price / unit : </td>
<td><b><i>7</td>
</tr>
<tr><td colspan="4"><center><h2>Total Invoice:<b><i> <?php echo $price; ?><b><i></h2></center></td></tr>

 
</table>



</div>
</div>
<CENTER><button type="button"  class="btn btn-default " onclick="printDiv(data)"><span
class=" glyphicon glyphicon-print"></span>&nbsp;Print Bill</button>&nbsp;<a href="bill.php"><button class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Go back</button></a></CENTER>
</body>
</html>
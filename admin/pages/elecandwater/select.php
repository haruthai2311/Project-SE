<?php
//$conn = mysqli_connect('localhost', 'root', '',"sourcecodester_wbsdb");
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

$q = mysqli_query($conn,"select prevw,preve from tempo_bill where name_ocp = '$name_ocp'");
$results = mysqli_fetch_array($q);
$previousw = $results['prevw'];
$previouse = $results['preve'];
?> 

<p><center><h3>บิลแจ้งชำระค่าไฟฟ้า-น้ำประปา</h3><center></p>
<h4>ชื่อ : <?php echo $name_ocp.'&nbsp;' .$last_ocp.'&nbsp;'.$id;?></h4>
<p><?php $date=date('d/m/y');
echo $date;?></p>
<form method="post" action="addbill.php">
<table width="346">
  <tr>		                  
  <input type="hidden" name="id" value="<?php echo $id; ?>" />
  <input type="hidden" name="date" value="<?php echo $date; ?>" />
  
  <td width="118">Previous Reading:</td>
  <td width="66"><input type="text" name="prevw"  value="<?php echo $previousw; ?>" /></td>
  <td width="66"><input type="text" name="preve"  value="<?php echo $previouse; ?>" /></td>
  </tr>
  <tr>
  <td>Present Reading:</td>
  <td><input type="text" name="presw"  /></td>
  <td><input type="text" name="prese"  /></td>
  </tr>
  <tr>
  <td>ราคา/หน่วย</td>
  <td><input type="text" name="price" value="7"  /></td>

  </tr>
 
</table><br>

	
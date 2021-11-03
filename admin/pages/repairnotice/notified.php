<?php include('../../../config.php');
 
 
$id = $_POST['id'];


$sql="SELECT * FROM notifications
INNER JOIN occupant
ON notifications.userid = occupant.userid
WHERE notifications.id = '$id'";

$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);

?>
<h6>การแจ้งซ่อมเลขที่ : <?php echo  $id;?>&nbsp;&nbsp; &nbsp;วันที่แจ้ง :<?php echo $row['date_notice']; ?></h6>
<h6>ชื่อ : <?php echo $row['name_ocp'].'&nbsp;' .$row['last_ocp'];?> &nbsp;&nbsp; &nbsp; &nbsp; เบอร์โทรศัพท์ : <?php echo $row['phone_ocp']; ?> </h6>
<h6>ห้อง : <?php echo $row['id_room']; ?></h6>
<hr>
<form method="post" action="Updatestatus.php">
<table  width="346">
    
    
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="form-group">
            <input type="hidden"  class="form-control " name="id" value="<?php echo $id; ?>" />
            <input type="hidden" class="form-control " name="date_notice" value="<?php echo $date; ?>" />
                <label style="float: left;"><strong><u>ปัญหา</u></strong> : <?php echo $row['title']; ?></label> 
            </div>
        </div>
    </div>
        
 

    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="form-group">
                 <label style="float: left;"><strong><u>รายละเอียด</u></strong></label>
                 <input type="text" readonly class="form-control-plaintext"  value="<?php echo $row['message']; ?>">
        </div>
    </div>



</table>
<br>
<div class="text-right">
    <button type="submit" class="btn btn-primary">รับงาน</button> 
</div>
</form>
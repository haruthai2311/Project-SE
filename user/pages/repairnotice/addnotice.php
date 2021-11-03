<?php 
require("../../../config.php");
$userid=$_POST["id"];

$sql="SELECT * FROM `occupant` WHERE userid = '$userid'";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);
$name = $row['name_ocp'];

?>

<h5>ห้อง : <?php echo $row['id_room']; ?></h5>
<h5>ชื่อ : <?php echo $row['name_ocp'].'&nbsp;' .$row['last_ocp'];?></h5>
<p>วันที่ :<?php $date=date('d/m/y');
echo  $date;?></p>
<hr>
<form method="post" action="addtodb.php">
<table  width="346">
    
    
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="form-group">
            <input type="hidden"  class="form-control mb-2" name="userid" value="<?php echo $userid; ?>" />
            <input type="hidden" class="form-control mb-2" name="date_notice" value="<?php echo $date; ?>" />
                <label style="float: left;">ปัญหา</label>
                          
                    <select class="form-control"  name="title">
                        <option>ไฟฟ้า</option>
                        <option>น้ำประปา</option>
                        <option>อินเตอร์เน็ต</option>
                        <option>สิ่งอำนวยความสะดวก</option>
                        <option>อื่นๆ</option>
                    </select>
                          
            </div>
        </div>
    </div>
        
 

    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="form-group">
                <label style="float: left;">รายละเอียด</label>
                <textarea name="message" class="form-control"  rows="6"></textarea>
            </div>
        </div>
    </div>



</table>
<br>
<div class="text-right">
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>          
</div>
</form>
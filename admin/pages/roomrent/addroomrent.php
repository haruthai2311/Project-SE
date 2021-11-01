<?php
//$conn = mysqli_connect('localhost', 'root', '',"sourcecodester_wbsdb");
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
        $priceroom = $test['price_room'];

$q = mysqli_query($conn,"select prevw,preve from tempo_bill where id_room = '$id_room'");
$results = mysqli_fetch_array($q);

?> 

<p><center><h3>บิลแจ้งชำระค่าเช่าห้องพัก <?php echo $id;?></h3><center></p>
<h4>ชื่อ : <?php echo $name_ocp.'&nbsp;' .$last_ocp;?></h4>
<p><?php $date=date('d/m/y');
echo $date;?></p>
<hr>
<form method="post" action="addinvoicesroomrent.php">
<table  width="346">
    
    
    <div class="row justify-content-md-center">
        <div class="col-md-5">
            <div class="form-group">
            <input type="hidden"  class="form-control mb-2" name="id" value="<?php echo $id; ?>" />
            <input type="hidden" class="form-control mb-2" name="date" value="<?php echo $date; ?>" />
                <label style="float: left;">ภาคการศึกษา</label>
                          
                    <select class="form-control"  name="semester">
                        <option>ภาคต้น</option>
                        <option>ภาคปลาย</option>
                    </select>
                          
            </div>
        </div>
    <div class="col-md-5">
        <div class="form-group">
            <label style="float: left;">ปีการศึกษา</label>
            <input class="form-control" type="text" name="year">
        </div>
    </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="form-group">
                <label style="float: left;">ค่าเช่า</label>
                <input class="form-control " type="text" name="rent"  value="<?php echo $priceroom; ?>"  />
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="form-group">
                <label style="float: left;">ค่ามัดจำ/ค่าประกันของเสียหาย</label>
                <input class="form-control" type="text" name="prerent" value="0"  />
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="form-group">
                <label style="float: left;">ส่วนลด</label>
                <input class="form-control" type="text" name="discount" value="0" />
            </div>
        </div>
    </div> 


    <!--div class="row justify-content-md-center">
       
        <div class="col-md-10"> 
            <div class="form-group">
                <label style="float: left;">อื่นๆ</label>
                <input class="form-control" type="text" name="other" value="0" />
            </div>
        </div>
    </div --> 
    
    
 
</table>
<br>
<div class="text-right">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>          
</div>
</form>


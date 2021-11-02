<?php
$id = $_POST['id'];
$outp = '';
$con=mysqli_connect("localhost", "root", '', "datahome");
$sql="SELECT * FROM occupant WHERE id_ocp = '$id'";
$result=mysqli_query($con,$sql);
$outp.="<div class='table table-responsive'>
<table class='table table-sm'>";
while($row=mysqli_fetch_array($result)){ 
    $outp.='<tr><td style=" border: none" width="10%"><label><u>ห้องที่เช่า</u></label></td>
        <td style=" border: none;text-align: left" width="90%">'.$row["id_room"].'</td>
        </tr>';

    $outp.='<tr ><td style=" border: none" width="10%"><label>รหัสประจำตัวประชาชน</label></td>
            <td style=" border: none;text-align: left" width="90%" >'.$row["id_ocp"].'</td>
            </tr>';

    $outp.='<tr><td style=" border: none" width="10%"><label>ชื่อ-สกุล</label></td>
            <td style=" border: none;text-align: left" width="90%">'.$row["name_ocp"].'&nbsp;&nbsp;'.$row["last_ocp"].'</td>
            </tr>';

    $outp.='<tr><td style=" border: none" width="10%"><label>เพศ</label></td>
            <td style=" border: none;text-align: left" width="90%">'.$row["gender_ocp"].'</td>
            </tr>';

    $outp.='<tr><td style=" border: none" width="10%"><label>เบอร์โทรศัพท์</label></td>
            <td style=" border: none;text-align: left" width="90%">'.$row['phone_ocp'].'</td>
            </tr>';
    
    $outp.='<tr><td style=" border: none" width="5%"><br><label><u>ที่อยู่ตามทะเบียนบ้าน</u></label></td><br>
            </tr>';

    $outp.='<tr><td style=" border: none;text-align: left" width="90%">'.$row["address"].'</td>
            </tr>';
    

    $outp.='<tr><td style=" border: none" width="10%"><br><label><u>บุคคลที่สามารถติดต่อได้เวลาฉุกเฉิน</u></label></td>
            </tr>';
           
    $outp.='<tr><td style=" border: none" width="10%"><label>ชื่อ</label></td>
            <td style=" border: none;text-align: left" width="90%">'.$row["contact_per"].'</td>
            </tr>';

    $outp.='<tr><td style=" border: none" width="10%"><label>เบอร์โทรศัพท์</label></td>
            <td style=" border: none;text-align: left" width="90%">'.$row["contact_phone"].'</td>
            </tr>';

    $outp.='<tr><td style=" border: none" width="10%"><label>ความสัมพันธ์</label></td>
            <td style=" border: none;text-align: left" width="90%">'.$row["contact_rlts"].'</td>
            </tr>';


}
$outp.="</table></div>";
echo $outp;

?>

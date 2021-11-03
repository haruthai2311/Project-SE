<?php 
require("../../../config.php");
$id_ocp=$_POST["id"];

$sql="SELECT * FROM occupant WHERE id_ocp = $id_ocp";
$result=mysqli_query($connect,$sql);

$row=mysqli_fetch_assoc($result);
?>
<form  class="form-sample" method="POST" action="functionocp.php">
                    <strong><p class="card-description">
                      เพิ่มข้อมูลของผู้เช่า
                    </p></strong>
                    
                    <div class="row justify-content-md-center">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>หมายเลขห้องพัก</label>
                          <input type="text" class="form-control" name="id_room" value="<?php echo $row['id_room']; ?>">
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>เลขบัตรประจำตัวประชาชน</label>
                          <input type="text" class="form-control" name="id_ocp" readonly value="<?php echo $row['id_ocp']; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row justify-content-md-center">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>ชื่อ</label>
                          <input type="text" class="form-control"  name="name_ocp" value="<?php echo $row['name_ocp']; ?>" />
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>นามสกุล</label>
                          <input type="text" class="form-control" name="last_ocp" value="<?php echo $row['last_ocp']; ?>"/>
                        </div>
                      </div>
                    </div>

                    <div class="row justify-content-md-center">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>เพศ</label>
                            
                            <select class="form-control"  name="gender_ocp" >
                              <?php if($row["gender_ocp"] == "ชาย" ){?>
                                <option selected>ชาย</option>
                                <option>หญิง</option>
                              <?php } else{ ?>
                                <option >ชาย</option>
                                <option selected>หญิง</option><?php } ?>
                            </select>
                          
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>เบอร์โทรศัพท์</label>
                          <input class="form-control" type="tel" name="phone_ocp" value="<?php echo $row['phone_ocp']; ?>" pattern="[0-9]{10}" required oninvalid="this.setCustomValidity('กรุณาตรวจสอบความถูกต้องของเบอร์โทรศัพท์')"
                             oninput="this.setCustomValidity('')">
                        </div>
                      </div>
                    </div>

                   <strong><p class="card-description">
                    บุคคลที่ติดต่อได้กรณีฉุกเฉิน
                    </p></strong> 
                    <div class="row justify-content-md-center">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label>ชื่อ-สกุล</label>
                          <input type="text" class="form-control" name="contact_per"  value="<?php echo $row['contact_per']; ?>"/>
                        </div>
                      </div>
                      
                    </div>

                    <div class="row justify-content-md-center">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>เบอร์โทรศัพท์</label>
                          <input class="form-control" type="tel" name="contact_phone" value="<?php echo $row['contact_phone']; ?>" pattern="[0-9]{10}" required oninvalid="this.setCustomValidity('กรุณาตรวจสอบความถูกต้องของเบอร์โทรศัพท์')"
                          oninput="this.setCustomValidity('')">
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>ความสัมพันธ์</label>
                          <input class="form-control" type="text" name="contact_rlts" value="<?php echo $row['contact_rlts']; ?>">
                        </div>
                      </div>
                    </div>

                   
                    <strong><p class="card-description">
                      ที่อยู่ตามบัตรประชาชน
                    </p></strong>
                    <div class="row justify-content-md-center">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label>รายละเอียดที่อยู่</label>
                           <input type="text" class="form-control" name="address1" value="<?php echo $row['address']; ?>"/>
                        </div>
                      </div>
                    </div>

                    <div class="text-right">
                    <button type="submit" class="btn btn-primary mr-2" name="editocp" id="save">Save</button>
                    <button class="btn btn-light" name="canceledit">Cancel</button>
                    </div>
                  </form>
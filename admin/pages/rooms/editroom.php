<?php 
require("../../../config.php");
$id_room=$_POST["id"];

$sql="SELECT * FROM rooms WHERE id_room = $id_room";
$result=mysqli_query($connect,$sql);

$row=mysqli_fetch_assoc($result);
?>


                  <form class="form-sample " method="POST" action="connect.php" >
                    <p class="card-description text-center">
                      โปรดใส่รายละเอียดห้องพัก
                    </p>
                    <div class="row justify-content-md-center" >
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>หมายเลขห้องพัก :</label>
                          
                            <input type="text" class="form-control" name="id_room" id="id_room" readonly value="<?php echo $row["id_room"];?>"required 
                             oninvalid="this.setCustomValidity('กรุณาระบุหมายเลขห้อง')"
                             oninput="this.setCustomValidity('')"/>
                            <!--<div class="invalid-tooltip">กรุณาระบุหมายเลขห้อง</div>-->
                          
                        </div>
                      </div>
                    </div>

                    <div class="row justify-content-md-center">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label >ประเภท :</label>
                          
                            <select class="form-control" name="type_room" id="type_room"   required 
                             oninvalid="this.setCustomValidity('กรุณาเลือกประเภทห้อง')"
                             oninput="this.setCustomValidity('')">
                             <?php if($row["type_room"] == "ห้องพัดลม" ){?>
                                <option selected>ห้องพัดลม</option>
                                <option>ห้องแอร์</option>
                              <?php } else{ ?>
                                <option >ห้องพัดลม</option>
                                <option selected>ห้องแอร์</option> <?php } ?>
                            </select>
                            <!--<div class="invalid-tooltip">กรุณาเลือกประเภทห้อง</div>-->
                         
                        </div>
                      </div>
                    </div>
                    
                    <div class="row justify-content-md-center">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>ราคาเช่า :</label>
                          <input type="text" class="form-control" name="price_room" id="price_room"  value="<?php echo $row["price_room"];?>" required oninvalid="this.setCustomValidity(' กรุณาระบุราคาเช่า')"
                             oninput="this.setCustomValidity('')">
                          
                        </div>
                      </div>
                    </div>

                    <div class="row justify-content-md-center">
                      <div class="col-md-3">
                        <div class="form-group ">
                          <label>เลขมิเตอร์ไฟฟ้า :</label>
                          <input type="text" class="form-control" name="id_mtw" id="id_mtw" value="<?php echo $row["id_mtw"];?>" required oninvalid="this.setCustomValidity(' กรุณาระบุเลขมิเตอร์ไฟฟ้า')"
                             oninput="this.setCustomValidity('')">
                          
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>เลขมิเตอร์ประปา :</label>
                          <input type="text" class="form-control" name="id_mte" id="id_mte" value="<?php echo $row["id_mte"];?>" required oninvalid="this.setCustomValidity(' กรุณาระบุเลขมิเตอร์น้ำประปา')"
                             oninput="this.setCustomValidity('')">
                          
                        </div>
                      </div>
                    </div>

                    <div class="row justify-content-md-center">
                        <div class="col-md-6"> 
                            <div class="form-group row"><label class="col-sm-2 ">สถานะห้อง :</label>
                               

                              
                                <?php if($row["status_room"] == "empty" ){?>
                                      <div class="col-sm-4">
                                          <div class="form-check">
                                            <label class="radio">
                                                <input type="radio" name="status_room" id="status_room" value="empty" checked>
                                                ว่าง
                                              </label>
                                            </div>
                                      </div>
                                    <div class="col-sm-5">
                                       <div class="form-check">
                                          <label class="radio">
                                            <input type="radio" name="status_room" id="status_room1" value="rented">
                                               มีผู้เช่า
                                          </label>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                  <div class="col-sm-4">
                                          <div class="form-check">
                                            <label class="radio">
                                                <input type="radio" name="status_room" id="status_room" value="empty">
                                                ว่าง
                                              </label>
                                            </div>
                                      </div>
                                    <div class="col-sm-5">
                                       <div class="form-check">
                                          <label class="radio">
                                            <input type="radio" name="status_room" id="status_room1" value="rented" checked>
                                               มีผู้เช่า
                                          </label>
                                        </div>
                                    </div>
                                <?php } ?>
                        
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary mr-2" name="subeditroom" id="save">Submit</button>
                    
                      <button class="btn btn-light" name="canceledit" onclick="document.location='editinfo.php' ">Cancel</button>
                    </div>
                  </form>
        
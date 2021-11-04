   
<?php 
require('../../../config.php');

$id_ocp=$_POST["id"];

$sql="SELECT * FROM `occupant` INNER JOIN user ON user.userid = occupant.userid WHERE occupant.id_ocp='$id_ocp'";
$result=mysqli_query($connect,$sql);

$row=mysqli_fetch_assoc($result);
?>
<form  class="form-sample" method="POST" action="functionocp.php">
                    
                    <div class="row justify-content-md-center">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label>User ID</label>
                          <input type="text" class="form-control" readonly name="userid" value="<?php echo $row['userid']; ?>">
                        </div>
                      </div>
                    
                    </div>

                    
                    <div class="row justify-content-md-center">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label>ชื่อ-สกุล </label>
                          <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-md-center">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label>ห้อง </label>
                          <input type="text" class="form-control" name="id_room" value="<?php echo $row['id_room']; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row justify-content-md-center">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control"  name="username" value="<?php echo $row['username']; ?>" />
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-md-center">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>"/>
                        </div>
                      </div>
                    </div>



                    <div class="text-right">
                    <button type="submit" class="btn btn-primary mr-2" name="edituser" id="save">Save</button>
                    <button class="btn btn-light" name="canceledit">Cancel</button>
                    </div>
                  </form>
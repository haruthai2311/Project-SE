<?php 
require("../../../config.php");
$id_ocp=$_GET["idocp"];

$sql="SELECT * FROM occupant WHERE id_ocp = $id_ocp";
$result=mysqli_query($connect,$sql);

$row=mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <!--<link rel="shortcut icon" href="../../images/favicon.png" />-->
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../../admin.php"><img src="../../images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../admin.php"><img src="../../images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/faces1.png" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="../../../index.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
    
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../admin.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">หน้าหลัก</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">ห้องพัก</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/rooms/infomation.php">ข้อมูลห้อง</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/rooms/editinfo.php">แก้ไข/ลบข้อมูล</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/rooms/addroom.php">เพิ่มห้องพัก</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">ผู้เช่า</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../../pages/occupant/infooccupant.php||../../pages/occupant/editoccupant.php">ข้อมูลผู้เช่า</a></li>
                <li class="nav-item"><a class="nav-link" href="../../pages/occupant/addoccupant.php">เพิ่มผู้เช่า</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">ไฟฟ้าและน้ำประปา</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/elecandwater/bill.php">ทำบิล</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/elecandwater/checkpayment.php">ตรวจสอบการชำระ</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">ค่าเช่าห้องพัก</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/roomrent/billrent.php">ทำบิล</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/roomrent/checkpaymentroom.php">ตรวจสอบการชำระ</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">การแจ้งซ่อม</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/repairnotice/checkrepair.php">ตรวจสอบการแจ้ง</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">บัญชีผู้ดูแลระบบ</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/addadmin/editad.php">ข้อมูลบัญชี</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/addadmin/addad.php">เพิ่มบัญชี</a></li>
               
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper ">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card ">
                <div class="card-body">
                  <h3 class="card-title"  align="center" >แก้ไขข้อมูลผู้เช่า</h3>
                  <form  class="form-sample" method="POST" action="functionocp.php">
                    <p class="card-description">
                      เพิ่มข้อมูลของผู้เช่า
                    </p>
                    
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

                    <p class="card-description">
                    บุคคลที่ติดต่อได้กรณีฉุกเฉิน
                    </p>
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

                   
                    <p class="card-description">
                      ที่อยู่ตามบัตรประชาชน
                    </p>
                    <div class="row justify-content-md-center">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label>รายละเอียดที่อยู่</label>
                           <input type="text" class="form-control" name="address1" value="<?php echo $row['address']; ?>"/>
                        </div>
                      </div>
                    </div>

                    <div class="text-right">
                    <button type="submit" class="btn btn-primary mr-2" name="editocp" id="save">Submit</button>
                    <button class="btn btn-light" name="canceledit">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!--<footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>-->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <script src="../../js/sweetalert.min.js"></script>
  
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

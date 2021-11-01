<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
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
                <li class="nav-item"><a class="nav-link" href="../../pages/occupant/infooccupant.php">ข้อมูลผู้เช่า</a></li>
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
        <div class="content-wrapper">
          <div class="card ">
         
           
            <div class="card-body">
              <h1><center><b> Billing Roomrent</b></center></h1>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="panel-title"><h5></h5></div>
                </div>
               <?php
                include 'db.php';

                $result = mysqli_query($conn,"SELECT * FROM occupant INNER JOIN rooms ON occupant.id_room=rooms.id_room");

                echo "<table class=\"table\" >
                <tr>
                  <th>หมายเลขห้อง</th>
                  <th>ผู้เช่า</th>
                  <th>ประเภทห้อง</th>
                  <th>ค่าเช่าห้อง</th>
                  <th>Action</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                {
                  echo "<tr>";
                  echo "<td>" . $row['id_room'] . "</td>";
                  echo "<td>" . $row['name_ocp'] . "&nbsp;" . $row['last_ocp'] . "</td>";
                  echo "<td>" . $row['type_room'] . "</td>";
                  echo "<td>" . $row['price_room'] . "</td>";
                  //<button type="button" id="popup" class="btn btn-primary mb-3" data-overlay="true" data-href="contact-us.html" data-content="ajax"><i class="fa fa-fw fa-file-alt"></i> CLICK HERE AJAX</button>
                  echo "<td><button type='button' data-id='".$row['id_room']."' class='btn btn-success btn-sm billbt'>สร้างบิล</button>|";
                  //echo "<td><a  id='popup' data-overlay='true' data-href='paybill.php?id=".$row['id_room']."' data-content='ajax' ><span class=\"btn btn-info btn-xs glyphicon glyphicon-usd\">&nbsp;&nbsp;สร้างบิล&nbsp;&nbsp;</span> </a>| ";
                  //echo '<td><button type="button"  rel="facebox" id="popup" class="btn btn-info btn-xs glyphicon glyphicon-usd" data-overlay="true" data-href="paybill.php" data-content="ajax"></i>สร้างบิล</button>| ';
                  //echo "<a rel='facebox' href='viewbill.php?id=".$row['id_room']."'><span class=\"btn btn-danger  btn-xs glyphicon glyphicon-eye-open\">&nbsp;&nbsp;View&nbsp;&nbsp;</span></td>";
                  //echo '<button type="button" rel="facebox" id="popup" class="btn btn-danger  btn-xs glyphicon glyphicon-eye-open" data-overlay="true" data-href="paybill.php" data-content="ajax"></i>รายละเอียด</button></td>';
                  echo '<button type="button"  data-id="'.$row['id_room'].'" class="btn btn-warning  btn-sm detailbt" ></i>รายละเอียด</button></td>';

                  echo "</tr>";
                }
                echo "</table>";
                ?>
             
                
              </div>
           </div>
         </div>
        </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!--################################################ Add Bill ############################################################ -->
<div class="modal fade" id="billroommodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">bill</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detail">
     
      </div>
    </div>
  </div>
</div>

<!--################################################ Detail Bill ############################################################ -->
<div class="modal fade bd-example-modal-lg" id="detailbillmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail bill</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detailbill">
        
    </div>
  </div>
</div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
  $('.billbt').click(function(){
    var rid=$(this).attr("data-id");
    $.ajax({
      url:"addroomrent.php",
      method: "post",
      data:{id:rid},
      success:function(data){
        $('#detail').html(data);
        $('#billroommodal').modal('show');
      }

    });
     
  });

  $('.detailbt').click(function(){
    var rid=$(this).attr("data-id");
    $.ajax({
      url:"detailroom.php",
      method: "post",
      data:{id:rid},
      success:function(data){
        $('#detailbill').html(data);
        $('#detailbillmodal').modal('show');
      }

    });
  });
  
});
</script>
</body>

</html>

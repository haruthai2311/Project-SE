
               <!--// < ? php session_start(); ?>   -->
                  <?php
                    include 'db.php';
                    $id_room =$_REQUEST['id'];

                    $result = mysqli_query($conn,"SELECT * FROM occupant INNER JOIN rooms ON occupant.id_room=rooms.id_room WHERE rooms.id_room =  '$id_room'");
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
                  <h4>ชื่อ : <?php echo $name_ocp.'&nbsp;' .$last_ocp.'&nbsp;'.$id_room;?></h4>
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
                      <tr>
                      <td><input type="submit" name="total" value="Add"  /></td>
                      </tr>
                    </table><br>
                  </form>

              
             
<!--
<div class="p-3" id="popup">
	<form method="post">
		<div class="form-group">
			<label>First Name</label>
			<input type="text" name="name" id="name" class="form-control" placeholder="Enter your first name">
		</div>
		<div class="form-group">
			<label>Last Name</label>
			<input type="text" name="name" id="name" class="form-control" placeholder="Enter your last name">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="name" id="name" class="form-control" placeholder="Enter your email">
		</div>
		<div class="form-group">
			<label>Message</label>
			<textarea rows="5" name="message" id="message" class="form-control" placeholder="Write your message here"></textarea>
		</div>
		<div class="form-group">
			<input type="button" name="button" value="Submit" class="btn btn-danger">
		</div>
	</form>
</div>  -->
<?php 
 // โดยที่ $ชื่อตัวแปร = new mysqli($servername, $username, $password, $dbname)
 $connect = new mysqli('localhost', 'root', '', 'datahome');

 // ทำการ check connection ว่าถูกต้องหรือไม่
  if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
   }

   
   session_start();
   ?>
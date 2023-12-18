<?php

$sname= "localhost";
$uname= "id21684475_umy";
$password= "Inipassdb1!";
$db_name= "id21684475_pemweb_uas";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

// Check koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  ?>
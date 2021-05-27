<?php
include_once "koneksi.php";

$email = $_POST["email"];
$pass = $_POST["password"];

$datauser = array();

$sqldatauser = mysqli_query($koneksi, "select * from user where email = '".$email."' and password = '".$pass."'");
while($rowdatauser = mysqli_fetch_array($sqldatauser)){
$datauser[] = $rowdatauser;
}
echo json_encode($datauser);
?>
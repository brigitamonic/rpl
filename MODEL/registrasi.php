<?php
include_once "koneksi.php";

$email = $_POST["email"];
$pass = $_POST["password"];
$stat = $_POST["status"];

$sql = "SELECT * FROM user WHERE email LIKE '100'";
$result = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_array($result);

if($data[0] >= 1){
  echo json_encode("Akun sudah ada");
}else {
	$sql = "INSERT INTO user(id,email,password,status)VALUES(null,'$email','$pass','$stat')";
	$result = mysqli_query($koneksi,$sql);
  
	if($result){
		echo json_encode("sukses");
	}else{
    echo json_encode("Fail");
    }
    
}
?>
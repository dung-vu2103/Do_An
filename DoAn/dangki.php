

<?php 
  require_once "db.php";
  require_once "ran.php";
  $makhachhang="KH".generateRandomString();
		$tenkhachhang=$_POST["hoten"];
		$sdt=$_POST["sdt"];
		$diachi=$_POST["diachi"];
		$gmail=$_POST["gmail"];
		$gioitinh=$_POST["gioitinh"];
		$tendangnhap=$_POST["tendangnhap"];
		$password=$_POST["matkhau"];
		$sql="INSERT INTO khachhang VALUES ('{$makhachhang}','$tenkhachhang','$sdt','$diachi','$gmail','$gioitinh','$tendangnhap','$password')";
			$result= $conn->query($sql);
		header ("location: index.php");
?>
<?php
require_once "db.php";
$hd = $_GET['hd'];
switch ($hd) {
	case 'themkh':
		$makhachhang = $_POST["makhachhang"];
		$tenkhachhang = $_POST["tenkhachhang"];
		$sdt = $_POST["sodienthoai"];
		$diachi = $_POST["diachi"];
		$email = $_POST["email"];
		$ngaysinh = $_POST["ngaysinh"];
		$gioitinh = $_POST["gioitinh"];
		$tendangnhap = $_POST["taikhoan"];
		$password = $_POST["matkhau"];
		$sql = "INSERT INTO khachhang VALUES ('{$makhachhang}','$tenkhachhang','$sdt','$email','$diachi','$ngaysinh','$tendangnhap','$password','$gioitinh')";
		$result = $conn->query($sql);
		header("Location: QuanLyKhachHang.php");
		break;


	case 'themncc':
		$mancc = $_POST["manhacungcap"];
		$tenncc = $_POST["tennhacungcap"];
		$diachi = $_POST["diachi"];
		$sdt = $_POST["sodienthoai"];
		$sql = "INSERT INTO nhacungcap (MaNhaCungCap, TenNhaCungCap, DiaChi, SoDienThoai) VALUES ('{$mancc}','$tenncc','$diachi','$sdt')";
		$result = $conn->query($sql);
		header("Location: QuanLyNhaCungCap.php");
		break;

	case 'themmuc':
		$madanhmuc = $_POST["madanhmuc"];
		$tendanhmuc = $_POST["tendanhmuc"];
		$sql = "INSERT INTO danhmuc (MaDanhMuc, TenDanhMuc) VALUES ('{$madanhmuc}','$tendanhmuc')";
		$result = $conn->query($sql);
		header("Location: QuanLyDanhMuc.php");
		break;

	case 'themsp':
		$masanpham = $_POST["masanpham"];
		$tensanpham = $_POST["tensanpham"];
		$chitiet = $_POST["chitiet"];
		$congsuat = $_POST["congsuat"];
		$noisanxuat = $_POST["noisanxuat"];
		$thoigianbaohanh = $_POST["thoigianbaohanh"];
		$congnghe = $_POST["congnghe"];
		$congdung = $_POST["congdung"];
		$kichthuoc = $_POST["kichthuoc"];
		$cannang = $_POST["cannang"];
		$soluonghang = $_POST["soluonghang"];
		$donvitinh = $_POST["donvitinh"];
		$dongia = $_POST["dongia"];
		$madanhmuc = $_POST["madanhmuc"];
		$manhacungcap = $_POST["manhacungcap"];
		$sql = "INSERT INTO sanpham VALUES ('{$masanpham}','$tensanpham','$chitiet','$congsuat',
		'$noisanxuat','$thoigianbaohanh','$congnghe','$congdung','$kichthuoc','$cannang','$soluonghang','$donvitinh','$dongia',
		'$madanhmuc','$manhacungcap')";
		$result = $conn->query($sql);
		header("Location: QuanLySanPham.php");
		break;
	case 'thembl':
		$mabinhluan = $_POST["mabinhluan"];
		$noidung = $_POST["noidung"];
		$ngaytao = $_POST["ngaytao"];
		$masanpham = $_POST["masanpham"];
		$makhachhang = $_POST["makhachhang"];
		$sql = "INSERT INTO binhluan (MaBinhLuan, NoiDung, NgayTao, MaSanPham, MaKhachHang) VALUES ('{$mabinhluan}','$noidung','$ngaytao','$masanpham','$makhachhang')";
		$result = $conn->query($sql);
		header("Location: QuanLyBinhLuan.php");
		break;
	case 'themspgh':
		$makhachhang = $_GET["makh"];
		$magiohang = $_GET["magh"];
		$masanpham = $_GET["id"];

		$querys = "SELECT * FROM chitietgiohang WHERE MaKhachHang='{$makhachhang}'";
		$results = $conn->query($querys);
		while ($dss = $results->fetch_assoc()) {
			if ($dss['MaSanPham'] = $masanpham) {
				header("Location: giohang.php");
			}
		}

		$sql = "INSERT INTO chitietgiohang (MaSanPham, MaGioHang, MaKhachHang, SoLuong) VALUES ('{$masanpham}','$magiohang','$makhachhang',1)";
		$result = $conn->query($sql);
		header("Location: giohang.php");
		break;

	case 'themblfe':
		require_once "ran.php";
		$mabinhluan = generateRandomString(10);
		$noidung = $_POST["binhluan"];
		$ngaytao = date("Y-m-d");
		$masanpham = $_GET["id"];
		$makhachhang = $_GET["makh"];
		$sql = "INSERT INTO binhluan (MaBinhLuan, NoiDung, NgayTao, MaSanPham, MaKhachHang) VALUES ('{$mabinhluan}','$noidung','$ngaytao','$masanpham','$makhachhang')";
		$result = $conn->query($sql);
		header("Location: ChiTiet.php?id=" . $_GET["id"]);
		break;

	case 'themhdfe':
		require_once "ran.php";
		$mahoadon = generateRandomString(10);
		$tennguoinhanhang = $_POST["tennguoinhanhang"];
		$sodienthoainhanhang = $_POST["sodienthoaikhachhang"];
		$diachinhanhanh = $_POST["diachinhanhang"];
		$ngaylap = date("Y-m-d");
		$makhachhang = $_GET["id"];
		$sql = "INSERT INTO hoadon (MaHoaDon, NgayLap, MaKhachHang, DiaChiNhanHang, TenNguoiNhan,SoDienThoaiNguoiNhan, TinhTrang) VALUES ('{$mahoadon}','$ngaylap','$makhachhang','$diachinhanhanh','$tennguoinhanhang','$sodienthoainhanhang','Đã xác nhận')";
		$result = $conn->query($sql);
		$query1 = "SELECT * FROM giohang,chitietgiohang,sanpham WHERE chitietgiohang.MaSanPham=sanpham.MaSanPham AND chitietgiohang.MaKhachHang=giohang.MaKhachHang AND giohang.MaKhachHang='{$_GET['id']}'";
		$result1 = $conn->query($query1);
		while ($ds1 = $result1->fetch_assoc()) {
			$sql1 = "INSERT INTO chitiethoadon (MaSanPham, MaHoaDon, SoLuong) VALUES ('{$ds1['MaSanPham']}','$mahoadon','{$ds1['SoLuong']}')";
			$results = $conn->query($sql1);
			$queryx = "DELETE from chitietgiohang WHERE MaSanPham='{$ds1['MaSanPham']}' AND MaKhachHang='$makhachhang'";
			$resultx = $conn->query($queryx);
		}

		header("Location: index.php");
		break;

	case 'themha':
		$mahinhanh = $_POST["mahinhanh"];
		$masanpham = $_POST["masanpham"];
		// if (count($_FILES) > 0) {
		// 	if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
		// 		$imgData = file_get_contents($_FILES['userImage']['tmp_name']);
		// 		// $imgType = $_FILES['userImage']['type'];
		// 		$sql = "INSERT INTO hinhanh (MaHinhAnh,HinhAnh, MaSanPham) VALUES('{$mahinhanh}',?,'$masanpham')";
		// 		$statement = $conn->prepare($sql);
		// 		$statement->bind_param('s', $imgData, $masanpham);
		// 		$current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
		// 	}
		// }
		// $mahinhanh = $_POST["mahinhanh"];
		// $hinhanh = $_POST["myfile"];
		// $masanpham = $_POST["masanpham"];

		// $sql = "INSERT INTO hinhanh (MaHinhAnh, HinhAnh, MaSanPham) VALUES ('{$mahinhanh}','$hinhanh','$masanpham')";
		// $result = $conn->query($sql);
		// $db = mysqli_connect("lo/calhost", "root", "", "image_upload");

		// Initialize message variable
		$msg = "";

		// If upload button is clicked ...
		if (isset($_POST['_imagePost'])) {
			// Get image name
			$image = $_FILES['_imagePost']['name'];
			// Get text
			$mahinhanh = mysqli_real_escape_string($conn, $_POST['mahinhanh']);
			$masanpham = mysqli_real_escape_string($conn, $_POST['masanpham']);

			// image file directory
			$target = "images/" . basename($image);

			$sql = "INSERT INTO HinhAnh (MaHinhAnh, HinhAnh, MaSanPham) VALUES ( '$mahinhanh','$image','$masanpham')";
			// execute query
			mysqli_query($conn, $sql);

			if (move_uploaded_file($_FILES['_imagePost']['tmp_name'], $target)) {
				$msg = "Image uploaded successfully";
			} else {
				$msg = "Failed to upload image";
			}
		}
		// $result = mysqli_query($conn, "SELECT * FROM images");
		header("Location: QuanLyHinhAnh.php");
		break;

	case 'themkhfe':
		require_once "ran.php";
		$makhachhang = generateRandomString(10);
		$magiohang = generateRandomString(10);
		$tenkhachhang = $_POST["tenkhachhang"];
		$sdt = $_POST["sodienthoai"];
		$diachi = $_POST["diachi"];
		$email = $_POST["email"];
		$ngaysinh = $_POST["ngaysinh"];
		$gioitinh = $_POST["gioitinh"];
		$tendangnhap = $_POST["taikhoan"];
		$password = $_POST["matkhau"];
		$sql = "INSERT INTO khachhang VALUES ('{$makhachhang}','$tenkhachhang','$sdt','$email','$diachi','$ngaysinh','$tendangnhap','$password','$gioitinh')";
		$result = $conn->query($sql);
		$sql1 = "INSERT INTO giohang VALUES ('{$magiohang}','{$makhachhang}')";
		$result1 = $conn->query($sql1);
		header("Location: index.php");
		break;
}

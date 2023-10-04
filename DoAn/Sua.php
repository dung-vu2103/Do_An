<?php
require_once "db.php";
if (!isset($_SESSION)) {
    session_start();
  }

if (isset($_POST['sbm'])) {
    if ($_GET['hd'] == "suadm") {
        $query = "UPDATE danhmuc SET TenDanhMuc='{$_POST['tendanhmuc']}' WHERE MaDanhMuc='{$_GET['id']}'";
        $result = $conn->query($query);
        require_once "QuanLyDanhMuc.php";
    }

    if ($_GET['hd'] == "suakh") {
        $query = "UPDATE khachhang SET  TenKhachHang='{$_POST['tenkhachhang']}', SoDienThoai='{$_POST['sodienthoai']}', DiaChi='{$_POST['diachi']}', Email='{$_POST['email']}', GioiTinh='{$_POST['gioitinh']}', TaiKhoan='{$_POST['taikhoan']}',NgaySinh='{$_POST['ngaysinh']}' WHERE MaKhachHang='{$_GET['id']}'";
        $result = $conn->query($query);
        require_once "QuanLyKhachHang.php";
    }

    if ($_GET['hd'] == "suamk") {
        $que = "SELECT * FROM khachhang WHERE MaKhachHang='{$_SESSION['makh']}'";
        $res = $conn->query($que);
        $ds = $res->fetch_assoc();
        if ($ds['MatKhau'] == $_POST['mkcu']) {
            if ($_POST['mkmoi'] == $_POST['mkmoi1']) {
                $query = "UPDATE khachhang SET  MatKhau='{$_POST['mkmoi']}' WHERE MaKhachHang='{$_SESSION['makh']}'";
                $result = $conn->query($query);
            }else{
                $_SESSION['loi']=1;
            }
        }else{
            $_SESSION['loi']=0;
        }
       
        require_once "DoiMatKhau.php";
    }

    if ($_GET['hd'] == "suakhfe") {
        $query = "UPDATE khachhang SET  TenKhachHang='{$_POST['tenkhachhang']}', SoDienThoai='{$_POST['sodienthoai']}', DiaChi='{$_POST['diachi']}', Email='{$_POST['email']}', GioiTinh='{$_POST['gioitinh']}',NgaySinh='{$_POST['ngaysinh']}' WHERE MaKhachHang='{$_GET['id']}'";
        $result = $conn->query($query);
        require_once "index.php";
    }

    if ($_GET['hd'] == "suancc") {
        $query = "UPDATE nhacungcap SET TenNhaCungCap='{$_POST['tennhacungcap']}', DiaChi='{$_POST['diachi']}', SoDienThoai='{$_POST['sodienthoai']}' WHERE MaNhaCungCap='{$_GET['id']}'";
        $result = $conn->query($query);
        require_once "QuanLyNhaCungCap.php";
    }

    if ($_GET['hd'] == "suasp") {
        $query = "UPDATE sanpham SET TenSanPham='{$_POST['tensanpham']}', 
        ChiTiet='{$_POST['chitiet']}', 
        CongSuat='{$_POST['congsuat']}', 
        NoiSanXuat='{$_POST['noisanxuat']}', 
        ThoiGianBaoHanh='{$_POST['thoigianbaohanh']}', 
        CongNghe='{$_POST['congnghe']}', 
        CongDung='{$_POST['congdung']}', 
        KichThuoc='{$_POST['kichthuoc']}', 
        CanNang='{$_POST['cannang']}', 
        SoLuongHang='{$_POST['soluonghang']}', 
        DonViTinh='{$_POST['donvitinh']}', 
        DonGia='{$_POST['dongia']}', 
        MaDanhMuc='{$_POST['madanhmuc']}', 
        MaNhaCungCap='{$_POST['manhacungcap']}' 
        WHERE MaSanPham='{$_GET['id']}'";
        $result = $conn->query($query);
        require_once "QuanLySanPham.php";
    }

    if ($_GET['hd'] == "suahd") {
        $query = "UPDATE hoadon SET TinhTrang='{$_POST['tinhtrang']}' WHERE MaHoaDon='{$_GET['id']}'";
        $result = $conn->query($query);
        // $query12 = "SELECT * FROM sanpham,hoadon,chitiethoadon,khachhang WHERE hoadon.MaKhachHang=khachhang.MaKhachHang AND sanpham.MaSanPham=chitiethoadon.MaSanPham AND chitiethoadon.MaHoaDon=hoadon.MaHoaDon AND hoadon.MaHoaDon='{$_GET['id']}'";
        // $result12 = $conn->query($query12);
        // $i=0;
        // while ($ds12 = $result12->fetch_assoc()) {
        //     $text='soluong'.(string)$i;
        //     $query1 = "UPDATE chitiethoadon SET SoLuong='{$_POST[$text]}' WHERE MaHoaDon='{$_GET['id']}' AND MaSanPham='{$ds12['MaSanPham']}'";
        //     $result1 = $conn->query($query1);
        //     $i++;
        // }


        require_once "QuanLyHoaDon.php";
    }

    if ($_GET['hd'] == "suabl") {
        $query = "UPDATE binhluan SET NoiDung='{$_POST['noidung']}', NgayTao='{$_POST['ngaytao']}', MaSanPham='{$_POST['masanpham']}', MaKhachHang='{$_POST['makhachhang']}' WHERE MaBinhLuan='{$_GET['id']}'";
        $result = $conn->query($query);
        require_once "QuanLyBinhLuan.php";
    }
} else
    echo "ko tim thay post";

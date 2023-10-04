<?php
require_once "db.php";
if($_GET['hd']=='xoadm'){
    $query="DELETE from danhmuc WHERE MaDanhMuc='{$_GET['id']}'";
    $result=$conn->query($query);
    require_once "QuanLyDanhMuc.php";
}

if($_GET['hd']=='xoakh'){
    $query="DELETE from khachhang WHERE MaKhachHang='{$_GET['id']}'";
    $result=$conn->query($query);
    require_once "QuanLyKhachHang.php";
}


if($_GET['hd']=='xoancc'){
    $query="DELETE from nhacungcap WHERE MaNhaCungCap='{$_GET['id']}'";
    $result=$conn->query($query);
    require_once "QuanLyNhaCungCap.php";
}

if($_GET['hd']=='xoasp'){
    $query="DELETE from sanpham WHERE MaSanPham='{$_GET['id']}'";
    $result=$conn->query($query);
    require_once "QuanLySanPham.php";
}

if($_GET['hd']=='xoahd'){
    $query="DELETE from chitiethoadon WHERE MaHoaDon='{$_GET['id']}'";
    $result=$conn->query($query);
    $query1="DELETE from hoadon WHERE MaHoaDon='{$_GET['id']}'";
    $result1=$conn->query($query1);
    require_once "QuanLyHoaDon.php";
}

if($_GET['hd']=='xoabl'){
    $query="DELETE from binhluan WHERE MaBinhLuan='{$_GET['id']}'";
    $result=$conn->query($query);
    require_once "QuanLyBinhLuan.php";
}

if($_GET['hd']=='xoaspgh'){
    $query="DELETE from chitietgiohang WHERE MaSanPham='{$_GET['id']}' AND MaKhachHang='{$_GET['makh']}'";
    $result=$conn->query($query);
    require_once "giohang.php";
}
?>
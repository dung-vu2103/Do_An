<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> <!-- icon -->
    <link rel="stylesheet" href="reponsive.css">


    <!--link bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header>
        <div class="logo">
            <ul>
                <li><a href="QuanLySanPham.php" style="font-size: 2vw;">Sửa Hóa Đơn</a></li>
            </ul>

            <div class="container">

                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Admin Stration
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="dangxuat.php">Đăng Xuất</a>

                    </div>
                </div>
            </div>
        </div>
        <nav>
            <i class="fa-brands fa-battle-net" style="font-size:3vw;padding-left:1vw;padding-top:1.5vh;"> MK</i>
            <br><br><br><br>
            <ul>
                <!-- <li><a href="index.php"><i class="fa-solid fa-user-plus"></i> Thống Kê</a></li> -->
                <li><a href="Dashboard.php"><i class="fa-solid fa-user"></i> Dashboard</a></li>
                <li><a href="QuanLyNhaCungCap.php"><i class="fa-solid fa-user"></i> Quản Lý Nhà Cung Cấp</a></li>
                <li><a href="QuanLyDanhMuc.php"><i class="fa-solid fa-user"></i> Quản Lý Danh Mục</a></li>
                <li><a href="QuanLySanPham.php"><i class="fa-solid fa-user"></i> Quản Lý Sản Phẩm</a></li>
                <li><a href="QuanLyKhachHang.php"><i class="fa-solid fa-user"></i> Quản Lý Khách Hàng</a></li>
                <li><a href="QuanLyHoaDon.php"><i class="fa-solid fa-user"></i> Quản Lý Hóa Đơn</a></li>
                
                <li><a href="QuanLyBinhLuan.php"><i class="fa-solid fa-user"></i> Quản Lý Bình Luận</a></li>
                <li><a href="QuanLyHinhAnh.php"><i class="fa-solid fa-user"></i> Quản Lý Hình Ảnh</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        require_once "db.php";
        $query = "SELECT * FROM sanpham,hoadon,chitiethoadon,khachhang WHERE hoadon.MaKhachHang=khachhang.MaKhachHang AND sanpham.MaSanPham=chitiethoadon.MaSanPham AND chitiethoadon.MaHoaDon=hoadon.MaHoaDon AND hoadon.MaHoaDon='{$_GET['id']}'";
        $result = $conn->query($query);
        $query1 = "SELECT * FROM sanpham,hoadon,chitiethoadon,khachhang WHERE hoadon.MaKhachHang=khachhang.MaKhachHang AND sanpham.MaSanPham=chitiethoadon.MaSanPham AND chitiethoadon.MaHoaDon=hoadon.MaHoaDon AND hoadon.MaHoaDon='{$_GET['id']}'";
        $result1 = $conn->query($query1);
        $ds = $result->fetch_assoc();
        ?>
        <table >
            <form id="formquanlydanhmuc" action="Sua.php?hd=suahd&id=<?php echo $ds['MaHoaDon'] ?>" method="post" style="margin-top: -5vw; height: 25vw;">


                <tr>
                    <td><label for="makhachhang">Mã Khách Hàng:</label></td>
                    <td><input type="text" id="makhachhang" size="50" name="makhachhang" placeholder="<?php echo $ds['MaKhachHang'] ?>" required></td>
                </tr>
                <tr>
                    <td><label for="ngaylap">Ngày Lập:</label></td>
                    <td><input type="date" id="ngaylap" value="<?php echo $ds['NgayLap']?>" size="50" name="ngaylap"></td>
                </tr>
                <tr>
                    <td><label for="diachinhanhang">Địa chỉ nhận hàng:</label></td>
                    <td><input type="text" id="diachinhanhang" placeholder="<?php echo $ds['DiaChiNhanHang']?>" size="50" name="diachinhanhang"></td>
                </tr>
                <tr>
                    <td><label for="tennguoinhan">Tên người nhận:</label></td>
                    <td><input type="text" id="tennguoinhan" placeholder="<?php echo $ds['TenNguoiNhan']?>" size="50" name="tennguoinhan"></td>
                </tr>
                <tr>
                    <td><label for="sodienthoainguoinhan">Số điện thoại người nhận:</label></td>
                    <td><input type="text" id="sodienthoainguoinhan" placeholder="<?php echo $ds['SoDienThoaiNguoiNhan']?>" size="50" name="sodienthoainguoinhan"></td>
                </tr>
                <tr>
                    <td><label for="tinhtrang">Tính trạng:</label></td>
                    <td><input type="text" id="tinhtrang" placeholder="<?php echo $ds['TinhTrang']?>" size="50" name="tinhtrang"></td>
                </tr>
                
                <tr style="font-weight:bold;">
                        <td>Sản Phẩm</td>
                        <td>Số Lượng</td>
                    </tr>
                <?php
                $i=0;
               
                while ($ds1 = $result1->fetch_assoc()) { 
                    
                    
                    ?>
                    <tr style="">
                        <td style="width:300px"><?php echo $ds1['TenSanPham'] ?></td>
                        <td><input type="number" id="soluong<?php echo (string)$i?>" name="soluong<?php echo (string)$i?>" value="<?php echo $ds1['SoLuong']?>"></td>
                    </tr>
                    
                <?php $i++;} ?>

                <tr>
                    <td colspan="2"><button type="submit" name='sbm' style="margin-top: 14vw;color:aliceblue">Sửa</button></td>
                </tr>
            </form>
        </table>
    </main>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

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
                <li><a href="QuanLySanPham.php" style="font-size: 2vw;">Chi Tiết Hóa Đơn</a></li>
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

    <div style="margin-left:80px;">
        <?php
        require_once "db.php";
        $query = "SELECT * FROM sanpham,hoadon,chitiethoadon,khachhang WHERE hoadon.MaKhachHang=khachhang.MaKhachHang AND sanpham.MaSanPham=chitiethoadon.MaSanPham AND chitiethoadon.MaHoaDon=hoadon.MaHoaDon AND hoadon.MaHoaDon='{$_GET['id']}'";
        $query1 = "SELECT * FROM sanpham,hoadon,chitiethoadon,khachhang WHERE hoadon.MaKhachHang=khachhang.MaKhachHang AND sanpham.MaSanPham=chitiethoadon.MaSanPham AND chitiethoadon.MaHoaDon=hoadon.MaHoaDon AND hoadon.MaHoaDon='{$_GET['id']}'";
        $result = $conn->query($query);
        $result1 = $conn->query($query);
        $ds = $result->fetch_assoc();
        ?>

        <table border="1px" style="background-color: lightblue;width: 1050px;border-collapse: collapse;">

            <form id="formquanlydanhmuc" action="Sua.php?hd=suahd&id=<?php echo $ds['MaHoaDon'] ?>" method="post" style="">
                <tr>
                    <td>
                        <div>
                <tr>
                    <td width="150px"><label for="mahoadon">Mã Hóa Đơn:</label></td>
                    <td colspan="2"><?php echo $ds['MaHoaDon'] ?></td>
                </tr>

                <tr>
                    <td><label for="tenkhachhang">Tên Khách Hàng: </label></td>
                    <td colspan="2"><?php echo $ds['TenKhachHang'] ?></td>
                </tr>

                <tr>
                    <td><label for="ngaylap">Ngày Lập:</label></td>
                    <td colspan="2"><?php echo $ds['NgayLap'] ?></td>
                </tr>
                <tr>
                    <td><label for="tenkhachhang">Địa Chỉ Nhận Hàng: </label></td>
                    <td colspan="2"><?php echo $ds['DiaChiNhanHang'] ?></td>
                </tr>
                <tr>
                    <td><label for="tenkhachhang">Tên Người Nhận: </label></td>
                    <td colspan="2"><?php echo $ds['TenNguoiNhan'] ?></td>
                </tr>
                <tr>
                    <td><label for="tenkhachhang">Số Điện Thoại Người Nhận: </label></td>
                    <td colspan="2"><?php echo $ds['SoDienThoaiNguoiNhan'] ?></td>
                </tr>
                <tr>
                    <td><label for="tenkhachhang">Tình Trạng: </label></td>

                    <td colspan="2">

                        <select name="tinhtrang" id="tinhtrang" >
                            <?php
                            if ($ds['TinhTrang'] == "Đã xác nhận") { ?>
                                <option value="Đã xác nhận" selected>Đã xác nhận</option>
                            <?php } else { ?>
                                <option value="Đã xác nhận">Đã xác nhận</option>
                            <?php
                            }
                            ?>

                            <?php
                            if ($ds['TinhTrang'] == "Đã nhận hàng") { ?>
                                <option value="Đã nhận hàng" selected>Đã nhận hàng</option>
                            <?php } else { ?>
                                <option value="Đã nhận hàng">Đã nhận hàng</option>
                            <?php
                            }
                            ?>

                            <?php
                            if ($ds['TinhTrang'] == "Đang vận chuyển") { ?>
                                <option value="Đang vận chuyển" selected>Đang vận chuyển</option>
                            <?php } else { ?>
                                <option value="Đang vận chuyển">Đang vận chuyển</option>
                            <?php
                            }
                            ?>

                            

                        </select>

                    </td>
                </tr>


                <tr>
                    <td colspan="3" style="text-align: center;font-weight:bold;font-size:20px"><label for="noisanxuat">Danh Sách Sản Phẩm</label></td>
                </tr>
                <tr style="text-align: center;font-weight:bold;">
                    <td>Sản Phẩm</td>
                    <td>Số Lượng</td>
                    <td>Đơn Giá</td>
                </tr>
                <?php
                $tong = 0;
                while ($ds1 = $result1->fetch_assoc()) { ?>
                    <tr style="text-align: center;">
                        <td style="width:300px"><?php echo $ds1['TenSanPham'] ?></td>
                        <td><?php echo $ds1['SoLuong'] ?></td>
                        <td><?php echo $ds1['DonGia'] ?></td>
                    </tr>
                    <?php
                    $tong = $tong + ($ds1['SoLuong'] * $ds1['DonGia'])
                    ?>
                <?php } ?>
                <tr style="text-align:center">
                    <td colspan="2" style="font-weight:bold">Tổng</td>
                    <td><?php echo $tong ?></td>
                </tr>


    </div>
    </td>
    <td>
        <button type="submit" name='sbm' style="color:aliceblue;margin-left:860px;margin-top:-250px">Sửa</button>
        <button onclick="return Del()" style="color:aliceblue;margin-left:860px;margin-top:-200px;"><a style="color: white;" href="Xoa.php?hd=xoahd&id=<?php echo $ds['MaHoaDon'] ?>">Xóa</a>
        </button>
    </td>
    </tr>


    </form>

    </table>
    </div>
</body>

</html>

<script>
    function Del() {
        return confirm("Bạn co muốn xóa không?");
    }
</script>
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
                <li><a href="QuanLySanPham.php" style="font-size: 2vw;">Chi Tiết Khách Hàng</a></li>
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
        $query = "SELECT * FROM khachhang WHERE khachhang.MaKhachHang='{$_GET['id']}'";
        $result = $conn->query($query);
        $ds = $result->fetch_assoc();
        ?>

        <table border="1px" style="background-color: lightblue;width: 1050px;">

            <form id="formquanlydanhmuc" action="SuaKhachHang.php?id=<?php echo $ds['MaKhachHang'] ?>" method="post" style="">
                <tr>
                    <td>
                        <div>
                <tr>
                    <td width="150px"><label for="makhachhang">Mã Khách Hàng:</label></td>
                    <td><?php echo $ds['MaKhachHang'] ?></td>
                </tr>

                <tr>
                    <td><label for="tenkhachhang">Tên Khách Hàng: </label></td>
                    <td><?php echo $ds['TenKhachHang'] ?></td>
                </tr>
                
                <tr>
                    <td><label for="sodienthoai">Số Điện Thoại:</label></td>
                    <td><?php echo $ds['SoDienThoai'] ?></td>
                </tr>


                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><?php echo $ds['Email'] ?></td>
                </tr>
                <tr>
                    <td><label for="diachi">Địa Chỉ:</label></td>
                    <td><?php echo $ds['DiaChi'] ?></td>
                </tr>
                <tr>
                    <td><label for="ngaysinh">NgaySinh:</label></td>
                    <td><?php echo $ds['NgaySinh'] ?></td>
                </tr>
                <tr>
                    <td><label for="taikhoan">Tài Khoản:</label></td>
                    <td><?php echo $ds['TaiKhoan'] ?></td>
                </tr>
                
                <tr>
                    <td><label for="gioitinh">Giới Tính:</label></td>
                    <td><?php echo $ds['GioiTinh'] ?></td>
                </tr>
                
    </div>
    </td>
    <td>
        <button type="submit" name='sbm' style="color:aliceblue;margin-left:860px;margin-top:-250px">Sửa</button>
        <button onclick="return Del()"  style="color:aliceblue;margin-left:860px;margin-top:-200px;"><a style="color: white;" href="Xoa.php?hd=xoakh&id=<?php echo $ds['MaKhachHang'] ?>">Xóa</a>
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
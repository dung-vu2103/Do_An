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
                <li><a href="QuanLyDanhMuc.php" style="font-size: 2vw;">Thêm Bình Luận</a></li>
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

        $querysanpham = "SELECT * FROM sanpham";
        $resultsanpham = $conn->query($querysanpham);

        $querykh = "SELECT * FROM khachhang";
        $resultkh = $conn->query($querykh);
        ?>
        <table>
            <form id="formquanlydanhmuc" action="add.php?hd=thembl" method="post">
                <tr>
                    <td><label for="mabinhluan">Mã Bình Luận : </label></td>
                    <td><input type="text" id="mabinhluan" size="50" name="mabinhluan"></td>
                </tr>
                <tr>
                    <td><label for="noidung">Nội Dung : </label></td>
                    <td><textarea id="noidung" name="noidung" rows="2" cols="52"></textarea></td>

                </tr>
                <tr>
                    <td><label for="ngaytao">Ngày Tạo:</label></td>
                    <td><input type="date" id="ngaytao" size="50" name="ngaytao"></td>
                </tr>
                <tr>
                    <td><label for="masanpham">Mã Sản Phẩm:</label></td>
                    <td>
                        <select id="masanpham" name="masanpham">
                            <?php
                            while ($dssanpham = $resultsanpham->fetch_assoc()) { ?>
                                <option value="<?php echo $dssanpham['MaSanPham'] ?>" name="<?php echo $dssanpham['MaSanPham'] ?>"><?php echo $dssanpham['MaSanPham'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="makhachhang">Mã Khách Hàng:</label></td>
                    <td>
                        <select id="makhachhang" name="makhachhang">
                            <?php
                            while ($dskh = $resultkh->fetch_assoc()) { ?>
                                <option value="<?php echo $dskh['MaKhachHang'] ?>" name="<?php echo $dskh['MaKhachHang'] ?>"><?php echo $dskh['MaKhachHang'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <td colspan="2"><button type="submit" style="margin-top: 7vw;color:aliceblue">Thêm</button></td>
                </tr>


            </form>
        </table>
    </main>
</body>

</html>
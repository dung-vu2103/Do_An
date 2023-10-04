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
                <li><a href="QuanLySanPham.php" style="font-size: 2vw;">Chi Tiết Sản Phẩm</a></li>
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
        $query = "SELECT * FROM sanpham WHERE sanpham.MaSanPham='{$_GET['id']}'";
        $result = $conn->query($query);
        $ds = $result->fetch_assoc();
        ?>

        <table border="1px" style="background-color: lightblue;width: 1050px;">

            <form id="formquanlydanhmuc" action="SuaSanPham.php?id=<?php echo $ds['MaSanPham'] ?>" method="post" style="">
                <tr>
                    <td>
                        <div>
                <tr>
                    <td width="150px"><label for="masanpham">Mã Sản Phẩm:</label></td>
                    <td><?php echo $ds['MaSanPham'] ?></td>
                </tr>

                <tr>
                    <td><label for="tensanpham">Tên Sản Phẩm: </label></td>
                    <td><?php echo $ds['TenSanPham'] ?></td>
                </tr>
                <tr>
                    <td><label for="chitiet">Chi Tiết:</label></td>
                    <td>
                        <p style="overflow: scroll;height: 100px;width: 900px;margin-bottom:0px"><?php echo $ds['ChiTiet'] ?></p>
                    </td>
                </tr>
                <tr>
                    <td><label for="congsuat">Công Suất:</label></td>
                    <td><?php echo $ds['CongSuat'] ?></td>
                </tr>


                <tr>
                    <td><label for="noisanxuat">Nơi Sản Xuất:</label></td>
                    <td><?php echo $ds['NoiSanXuat'] ?></td>
                </tr>
                <tr>
                    <td><label for="thoigianbaohanh">Thời Gian Bảo Hành:</label></td>
                    <td><?php echo $ds['ThoiGianBaoHanh'] ?></td>
                </tr>
                <tr>
                    <td><label for="congnghe">Công Nghệ:</label></td>
                    <td><?php echo $ds['CongNghe'] ?></td>
                </tr>
                <tr>
                    <td><label for="congdung">Công Dụng:</label></td>
                    <td><?php echo $ds['CongDung'] ?></td>
                </tr>
                <tr>
                    <td><label for="kichthuoc">Kích Thước:</label></td>
                    <td><?php echo $ds['KichThuoc'] ?></td>
                </tr>
                <tr>
                    <td><label for="cannang">Cân Nặng:</label></td>
                    <td><?php echo $ds['CanNang'] ?></td>
                </tr>
                <tr>
                    <td><label for="soluonghang">Số Lượng Hàng:</label></td>
                    <td><?php echo $ds['SoLuongHang'] ?></td>
                </tr>
                <tr>
                    <td><label for="donvitinh">Đơn Vị Tính:</label></td>
                    <td><?php echo $ds['DonViTinh'] ?></td>
                </tr>

                <tr>
                    <td><label for="dongia">Đơn Giá:</label></td>
                    <td><?php echo $ds['DonGia'] ?></td>
                </tr>
                <tr>
                    <td><label for="madanhmuc">Mã Danh Mục:</label></td>
                    <td><?php echo $ds['MaDanhMuc'] ?></td>
                </tr>
                <tr>
                    <td><label for="manhacungcap">Mã Nhà Cung Cấp:</label></td>
                    <td><?php echo $ds['MaNhaCungCap'] ?></td>
                </tr>
    </div>
    </td>
    <td>
        <button type="submit" name='sbm' style="color:aliceblue;margin-left:860px;margin-top:-250px">Sửa</button>
        <button onclick="return Del()"  style="color:aliceblue;margin-left:860px;margin-top:-200px;"><a style="color: white;" href="Xoa.php?hd=xoasp&id=<?php echo $ds['MaSanPham'] ?>">Xóa</a>
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
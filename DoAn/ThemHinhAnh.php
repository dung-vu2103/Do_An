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
                <li><a href="QuanLyDanhMuc.php" style="font-size: 2vw;">Thêm Danh Mục</a></li>
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
    <?php
    require_once "db.php";
    // require_once __DIR__ . '/db.php';
    if (count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
            $imgData = file_get_contents($_FILES['userImage']['tmp_name']);
            // $imgType = $_FILES['userImage']['type'];
            $sql = "INSERT INTO tbl_image(HinhAnh) VALUES(?)";
            $statement = $conn->prepare($sql);
            $statement->bind_param('ss', $imgData);
            $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
        }
    }
    ?>
    <?php


    $querydanhmuc = "SELECT * FROM sanpham";
    $resultdanhmuc = $conn->query($querydanhmuc);
    ?>
    <main>
        <table>
            <form id="formquanlydanhmuc" action="add.php?hd=themha" method="post" enctype="multipart/form-data" name="frmImage">
                <tr>
                    <td><label for="mahinhanh">Mã Hình Ảnh : </label></td>
                    <td><input type="text" id="mahinhanh" size="50" name="mahinhanh"></td>
                </tr>
                <tr>
                    <td><label for="madanhmuc">Hình Ảnh : </label></td>
                    <td>
                        <div class="phppot-container tile-container" style="padding-left: 15px;">
                            <div class="row">
                                <!-- <input name="userImage" type="file" class="full-width" /> -->
                                <input name="_imagePost" type="file" class="full-width" />
                            </div>
                            
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="masanpham">Mã Sản Phẩm:</label></td>
                    <td>
                        <select id="masanpham" name="masanpham">
                            <?php
                            while ($dsdanhmuc = $resultdanhmuc->fetch_assoc()) { ?>
                                <option value="<?php echo $dsdanhmuc['MaSanPham'] ?>" name="<?php echo $dsdanhmuc['MaSanPham'] ?>"><?php echo $dsdanhmuc['MaSanPham'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" style="margin-top: 7vw;color:aliceblue" name="_imagePost">Thêm</button></td>
                </tr>


            </form>
            <!-- <form name="frmImage" enctype="multipart/form-data" action="" method="post">
                <div class="phppot-container tile-container">
                    <label>Upload Image File:</label>
                    <div class="row">
                        <input name="userImage" type="file" class="full-width" />
                    </div>
                    <div class="row">
                        <input type="submit" value="Submit" />
                    </div>
                </div>
                <div class="image-gallery">
                    <?php 
                    // require_once __DIR__ . '/listImages.php'; 
                    ?>
                </div>
            </form> -->
        </table>
    </main>
</body>

</html>
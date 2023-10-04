<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['dn'])) {
    $_SESSION['dn'] = false;
}
require_once "db.php";
if ($_SESSION['dn'] == false) {
    require_once "dangnhap.php";
} else { ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trang Chủ</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> <!-- icon -->
        <link rel="stylesheet" href="sp/reponsive.css">


        <!--link bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

        <!--slideshow-->
        <style>
            * {
                box-sizing: border-box
            }

            .mySlides1,
            .mySlides2 {
                display: none
            }

            img {
                vertical-align: middle;
            }

            /* Slideshow container */
            .slideshow-container {
                max-width: 100vw;
                position: relative;
                margin: 0;
            }

            /* Next & previous buttons */
            .prev,
            .next {
                cursor: pointer;
                position: absolute;
                top: 50%;
                width: auto;
                padding: 16px;
                margin-top: -22px;
                color: whitesmoke;
                font-weight: bold;
                font-size: 18px;
                transition: 0.6s ease;
                border-radius: 0 3px 3px 0;
                user-select: none;
                background-color: rgb(99, 131, 187);
            }

            /* Position the "next button" to the right */
            .next {
                right: 0;
                border-radius: 3px 0 0 3px;
            }

            /* On hover, add a grey background color */
            .prev:hover,
            .next:hover {
                background-color: whitesmoke;
                color: black;
            }
        </style>
    </head>
    <?php
    if (isset($_POST['add'])) {
        $query2 = "SELECT * FROM chitietgiohang WHERE MaKhachHang='{$_SESSION['makh']}'";
        $result2 = $conn->query($query2);
        $a = 1;
        while ($ds2 = $result2->fetch_assoc()) {

            $query = "UPDATE chitietgiohang SET SoLuong='{$_POST['sl' .$a]}' WHERE MaKhachHang='{$_SESSION['makh']}' AND MaSanPham ='{$ds2['MaSanPham']}'";
            $result = $conn->query($query);
            $a++;
        }
    }



    if (isset($_POST['del'])) {
        $query2 = "SELECT * FROM chitietgiohang WHERE MaKhachHang='{$_SESSION['makh']}'";
        $result2 = $conn->query($query2);
        $a = 1;
        while ($ds2 = $result2->fetch_assoc()) {

            $query = "UPDATE chitietgiohang SET SoLuong='{$_POST['sl' .$a]}' WHERE MaKhachHang='{$_SESSION['makh']}' AND MaSanPham ='{$ds2['MaSanPham']}'";
            $result = $conn->query($query);
            $a++;
        }
    }
    ?>

    <body>
        <header>
            <nav class="navbar navbar-expand-md bgcolor navbar-dark">
                <a class="navbar-brand" href="index.php" title="Minh Khai"><i class="fa-brands fa-battle-net" style="font-size:3vw;"> MK</i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <div id="search">
                        <form class="form-inline" action="TimKiem.php">
                            <input class="form-control mr-sm-2" name="key" type="text" placeholder="Search" size="50" required>
                            <button class="btn btn-success" type="submit" title="Search">Search</button>
                        </form>
                    </div>


                    <?php
                    require_once "db.php";
                    $search1 = "SELECT * FROM khachhang WHERE MaKhachHang='{$_SESSION['makh']}'";
                    $giatri1 = $conn->query($search1);
                    $ds = $giatri1->fetch_assoc();
                    $_SESSION['tenkh'] = $ds['TenKhachHang'];
                    $_SESSION['sdtkh'] = $ds['SoDienThoai'];
                    ?>
                    <div class="dropdown" style="margin-left: 100px;">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background-color:#80aaff; border: none;">
                            <a href="#" style="color: white; text-decoration: none; " title="Login"><i class="fa-solid fa-circle-user datne"></i> <?php echo $ds['TenKhachHang'] ?> </a> <!--icon-->
                        </button>
                        <div class="dropdown-menu">
                            <?php
                            if ($_SESSION['person'] == "khachhang") { ?>
                                <a class="dropdown-item" href="ThongTinCaNhan.php">Thông Tin Cá Nhân</a>
                            <?php  }  ?>

                            <a class="dropdown-item" href="ThongTinDonHang.php">Thông Tin Đơn Hàng</a>
                            <?php if ($_SESSION['person'] == "khachhang") { ?>
                                <a class="dropdown-item" href="DoiMatKhau.php">Đổi Mật Khẩu</a>
                            <?php  }  ?>
                            <?php
                            if ($_SESSION['person'] == "khach") { ?>
                                <a class="dropdown-item" href="dangnhap.php">Đăng Nhập</a>
                            <?php  } else { ?>
                                <a class="dropdown-item" href="dangxuat.php">Đăng Xuất</a>
                            <?php } ?>
                        </div>
                    </div>

                    <a href="giohang.php"><i class="fa-solid fa-cart-shopping datne"></i></a>
                </div>
            </nav>
            <br>
        </header>
        </div>
        <main>
            <section> <!--menu-->
                <nav class="navbar navbar-expand-md navbar-dark bgmenu">
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav" style="text-align:center">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php" style="color: whitesmoke; width: 7vw; margin-left: -9vw;font-size:20px">Trang Chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="AllLoa.php" style="color: whitesmoke; width: 7vw;margin-left: -1vw;font-size:20px">Loa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="AllTiVi.php" style="color: whitesmoke; width: 7vw;font-size:20px">TiVi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="AllTuLanh.php" style="color: whitesmoke; width: 7vw;font-size:20px">Tủ Lạnh</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="AllDieuHoa.php" style="color: whitesmoke; width: 7vw;font-size:20px">Điều Hòa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="AllMayGiat.php" style="color: whitesmoke; width: 7vw;font-size:20px">Máy Giặt</a>
                            </li>

                        </ul>
            </section>

            <!-- <form method="post" action="add.php?hd=themhd"> -->

            <!-- </form> -->
            <div style="margin-left:27vw;margin-top:20px">
                <?php
                require_once "db.php";
                $query = "SELECT * FROM khachhang WHERE khachhang.MaKhachHang='{$_SESSION['makh']}'";
                $result = $conn->query($query);
                $ds = $result->fetch_assoc();
                ?>
                <table style="background-color: whitesmoke; width:620px;">
                    <form id="formquanlydanhmuc" action="Sua.php?hd=suamk&id=<?php echo $ds['MaKhachHang'] ?>" method="post" style="margin-top: -5vw; height: 25vw;">

                        <tr style="height:50px">
                            <td style="width:200px;padding-left:20px"><label for="tenkhachhang">Nhập mật khẩu cũ:</label></td>
                            <td><input type="password" id="tenkhachhang" size="50" name="mkcu" required></td>
                        </tr>

                        <tr style="height:50px">
                            <td style="width:200px;padding-left:20px"><label for="sodienthoai">Nhập mật khẩu mới : </label></td>
                            <td><input type="password" id="sodienthoai" size="50" name="mkmoi" required></td>
                        </tr>

                        <tr style="height:50px">
                            <td style="width:200px;padding-left:20px"><label for="sodienthoai">Nhập lại mật khẩu mới : </label></td>
                            <td><input type="password" id="sodienthoai" size="50" name="mkmoi1" required></td>
                        </tr>




                        <tr style="text-align: center;">
                            <td colspan="2"><button onclick="return ThongBao1()" class="btn btn-primary" type="submit" name='sbm' style="margin-top: 1vw;color:aliceblue">Sửa</button></td>
                        </tr>
                    </form>
                </table>
            </div>


            <footer style="margin-top:300px;height:200px">
                <div id="cuoitrang">
                    <p class="Trangtri"><a href="index.php">Home</a> | <a href="#">About</a> </p>
                </div>
                <div class="mangxahoi">
                    <a href="https://www.facebook.com/" target="_blank" title="facebook"><i class="fa-brands fa-facebook aloalo"></i></a>
                    <a href="https://www.instagram.com/" target="_blank" title="instargram"><i class="fa-brands fa-instagram aloalo"></i></a>
                    <a href="https://www.linkedin.com/" target="_blank" title="linkedin"><i class="fa-brands fa-linkedin aloalo"></i></a>
                    <a href="https://discord.com/channels/@me" target="_blank" title="discord"><i class="fa-brands fa-discord aloalo"></i></a>
                </div>
                <div class="diachi">
                    <p>Địa Chỉ</p>
                    <ol type="i">
                        <li>148 Hoàng Hoa Thám, Phường 12, Quận Tân Bình, TP.Hồ Chí Minh</li>
                        <li>Số 180 Trường Chinh, Phường Khương Thượng, Quận Đống Đa, TP. Hà Nội</li>
                        <li>Lô A4.1 Khu dân cư Hòa Thọ, Phường Hòa Thọ Đông, Quận Cẩm Lệ, TP. Đà Nẵng</li>
                    </ol>

                </div>
                <div class="noidungchantrang">
                </div>
                <div id="like">
                </div>

            </footer>
        </main>
    </body>

    </html>





<?php } ?>
<script>
    function Del() {
        return confirm("Bạn có muốn xóa không?");
    }

    function ThongBao1() {
        var t = <?php echo $_SESSION['loi'] ?>
        if (t == 0) {
            return confirm("Mật khẩu không chính xác")

        } else {
            if (t == 1) {
                return confirm("Mật khẩu không chính xác")
            }
        }

    }
    ThongBao1()
</script>
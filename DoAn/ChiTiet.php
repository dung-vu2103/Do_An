<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['dn'])) {
    $_SESSION['dn'] = false;
}
require_once "db.php";
if (1 == 2) {
    // require_once "dangnhap.php";
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
                            <a href="#" style="color: white; text-decoration: none; " title="Login"><i class="fa-solid fa-circle-user datne"></i>
                                <?php
                                if ($_SESSION['person'] == "khach") {
                                    echo "Khách";
                                } else {
                                    echo $ds['TenKhachHang'];
                                }
                                ?>
                            </a> <!--icon-->
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


            <div style="background-color:whitesmoke;margin-left:100px;margin-right:100px">


                <div style="margin-top: 20px;display:flex;background-color:whitesmoke;">
                    <div class="w3-content" style="width:600px;height:500px;padding-top:10px">
                        <?php
                        $querys = "SELECT * FROM giohang WHERE MaKhachHang='{$_SESSION['makh']}'";
                        $results = $conn->query($querys);
                        $dss = $results->fetch_assoc();

                        $query = "SELECT * FROM sanpham, hinhanh,danhmuc WHERE danhmuc.MaDanhMuc=SanPham.MaDanhMuc AND sanpham.MaSanPham=hinhanh.MaSanPham AND sanpham.MaSanPham='{$_GET['id']}'";
                        $result = $conn->query($query);
                        $i = 0;
                        while ($ds = $result->fetch_assoc()) {
                            $i++;
                            if ($i == 2) {
                                $image = imagecreatefromstring($ds['HinhAnh']);
                                ob_start();
                                imagejpeg($image, null, 80);
                                $data = ob_get_contents();
                                ob_end_clean();
                                echo '<img class="mySlides" style="width:600px;height:300px" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                            } else {
                                $image = imagecreatefromstring($ds['HinhAnh']);
                                ob_start();
                                imagejpeg($image, null, 80);
                                $data = ob_get_contents();
                                ob_end_clean();
                                echo '<img class="mySlides" style="width:600px;display:none;height:300px" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                            }
                        }

                        ?>


                        <div class="w3-row-padding w3-section" style="display: flex; justify-content: center;">
                            <?php
                            $query = "SELECT * FROM sanpham, hinhanh,danhmuc WHERE danhmuc.MaDanhMuc=SanPham.MaDanhMuc AND sanpham.MaSanPham=hinhanh.MaSanPham AND sanpham.MaSanPham='{$_GET['id']}'";
                            $result = $conn->query($query);
                            ?>
                            <div class="w3-col s4" style="margin-left:90px">
                                <?php
                                $ds = $result->fetch_assoc();
                                $image = imagecreatefromstring($ds['HinhAnh']);
                                ob_start();
                                imagejpeg($image, null, 80);
                                $data = ob_get_contents();
                                ob_end_clean();
                                echo '<img class="demo w3-opacity w3-hover-opacity-off" style="width:50%;cursor:pointer;height:50px;" onclick="currentDiv(1)" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                                ?>
                            </div>
                            <div class="w3-col s4" style="margin-left:-70px;">
                                <?php
                                $ds = $result->fetch_assoc();
                                $image = imagecreatefromstring($ds['HinhAnh']);
                                ob_start();
                                imagejpeg($image, null, 80);
                                $data = ob_get_contents();
                                ob_end_clean();
                                echo '<img class="demo w3-opacity w3-hover-opacity-off" style="width:50%;cursor:pointer;height:50px;" onclick="currentDiv(2)" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                                ?>
                            </div>
                            <div class="w3-col s4" style="margin-left:-70px">
                                <?php
                                $ds = $result->fetch_assoc();
                                $image = imagecreatefromstring($ds['HinhAnh']);
                                ob_start();
                                imagejpeg($image, null, 80);
                                $data = ob_get_contents();
                                ob_end_clean();
                                echo '<img class="demo w3-opacity w3-hover-opacity-off" style="width:50%;cursor:pointer;height:50px;" onclick="currentDiv(3)" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                                ?>
                            </div>
                        </div>
                        <div>
                            <p style="font-weight: bold;font-size:18px;margin-top:20px">Độc quyền tại siêu thị điện tử Minh Khai</p>
                            <table style="width:600px; ">
                                <tr style="border-bottom: 1px solid red;height:50px">
                                    <td><i class="fa-solid fa-truck"></i> Giao hàng miễn phí tận nơi</td>
                                    <td><i class="fa-solid fa-box-open"></i> Đóng gói cẩn thận, an toàn</td>
                                </tr>
                                <tr style="border-bottom: 1px solid red;height:50px">
                                    <td><i class="fa-solid fa-shield-halved"> </i> Bảo hành chính hãng hỗ trợ đến tận nhà</td>
                                    <td><i class="fa-solid fa-clipboard-check"></i> Hàng chính hãng 100%</td>
                                </tr>
                                <tr style="border-bottom: 1px solid red;height:50px">
                                    <td><i class="fa-solid fa-arrow-rotate-right"></i> Đổi trả trong 30 ngày đầu</td>
                                    <td><i class="fa-regular fa-money-bill-1"></i> Chất lượng đặt nên hàng đầu</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div style="width:600px">

                        <p style="font-weight: bold;font-size:17px;padding-top:5px"><?php echo $ds['TenSanPham'] ?></p>
                        <p style="font-weight:bold">Thương Hiệu: <?php echo $ds['Hang'] ?></p>
                        <p style="font-weight:bold">Kích thước: <?php echo $ds['KichThuoc'] ?></p>
                        <p style="font-weight:bold">Công nghệ: <?php echo $ds['CongNghe'] ?></p>
                        <p style="font-weight:bold;color:red">Giá tiền: <?php echo number_format($ds['DonGia']) . ' VNĐ' ?></p>
                        <div style="border-radius: 20px;font-weight:bold">
                            <table>
                                <tr style="background-color: #80aaff;height:40px;width:300px">
                                    <td style="width:500px"> <i style="color:darkorange;margin-left:20px" class="fa-solid fa-tags"></i> Ưu đãi đi kèm</td>
                                </tr>
                                <tr style="background-color:aqua;height:40px">
                                    <td>
                                        <i style="color:darkorange;margin-left:20px" class="fa-solid fa-1"></i> Hoàn Tiền Nếu Siêu Thị Khác Rẻ Hơn (Chính sách)
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div style="text-align: center;margin-top:50px">
                            <a href="add.php?hd=themspgh&id=<?php echo $ds['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>">
                                <button type="button" class="btn btn-danger" style="width:350px;height:60px;font-size:16px;font-weight:bold">Mua Ngay<br>Giao hàng tận nơi</button></a>
                        </div>


                    </div>
                </div>

                <div style="margin-top: 150px;text-align:center;">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                        Xem thêm thông tin
                    </button><br>
                    <?php
                    $queryd = "SELECT * FROM sanpham, hinhanh,danhmuc WHERE danhmuc.MaDanhMuc=SanPham.MaDanhMuc AND sanpham.MaSanPham=hinhanh.MaSanPham AND sanpham.MaSanPham='{$_GET['id']}'";
                    $resultd = $conn->query($queryd);
                    $dsd = $resultd->fetch_array();
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Thông tin sản phẩm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div style="text-align: justify;font-weight:bold" class="modal-body">
                                    <p>Tên sản phẩm: <?php echo $dsd['TenSanPham'] ?></p>
                                    <p>Hãng: <?php echo $dsd['Hang'] ?></p>
                                    <div style="text-align: center;">
                                        <?php
                                        $image = imagecreatefromstring($dsd['HinhAnh']);
                                        ob_start();
                                        imagejpeg($image, null, 80);
                                        $data = ob_get_contents();
                                        ob_end_clean();
                                        echo '<img  style="width:600px;cursor:pointer;height:400px;"  src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                                        ?>
                                    </div>
                                    <p> <?php echo $dsd['ChiTiet'] ?></p>
                                    <div style="text-align: center;">
                                        <?php
                                        $dsd = $resultd->fetch_array();
                                        $image = imagecreatefromstring($dsd['HinhAnh']);
                                        ob_start();
                                        imagejpeg($image, null, 80);
                                        $data = ob_get_contents();
                                        ob_end_clean();
                                        echo '<img  style="width:600px;cursor:pointer;height:400px;"  src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                                        ?>
                                    </div>
                                    <p>Công suất: <?php echo $dsd['CongSuat'] ?></p>
                                    <p>Nơi sản xuất: <?php echo $dsd['NoiSanXuat'] ?></p>
                                    <p>Thời gian bảo hành: <?php echo $dsd['ThoiGianBaoHanh'] ?></p>
                                    <p>Công nghệ: <?php echo $dsd['CongNghe'] ?></p>
                                    <div style="text-align: center;">
                                        <?php
                                        $dsd = $resultd->fetch_array();
                                        $image = imagecreatefromstring($dsd['HinhAnh']);
                                        ob_start();
                                        imagejpeg($image, null, 80);
                                        $data = ob_get_contents();
                                        ob_end_clean();
                                        echo '<img  style="width:600px;cursor:pointer;height:400px;"  src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                                        ?>
                                    </div>
                                    <p>Công dụng: <?php echo $dsd['CongDung'] ?></p>
                                    <p>Kích thước: <?php echo $dsd['KichThuoc'] ?></p>
                                    <p>Cân nặng: <?php echo $dsd['CanNang'] ?></p>
                                    <p>Giá bán: <?php echo number_format($dsd['DonGia']) . 'VNĐ' ?></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div><br></div>


            </div>
            <div style="background-color:whitesmoke;margin-top: 30px;margin-left:100px;margin-right:700px">
                <p style="font-weight: bold;font-size:18px;margin-left:50px">Đánh giá về sản phẩm</p>
                <div style="max-width:600px;margin-left:100px">
                    <form method="post" action="add.php?hd=themblfe&makh=<?php echo $_SESSION['makh'] ?>&id=<?php echo $_GET['id'] ?>">
                        <textarea id="w3review" name="binhluan" rows="3" cols="60" placeholder="Đánh giá và hỏi đáp về sản phẩm"></textarea>
                        <br>
                        <input class="btn btn-primary" type="submit" value="Gửi">
                    </form>
                </div>

                <?php
                $query = "SELECT * FROM binhluan,khachhang WHERE khachhang.MaKhachHang=binhluan.MaKhachHang AND MaSanPham='{$_GET['id']}'";
                $result = $conn->query($query);

                while ($ds = $result->fetch_assoc()) { ?>
                    <div style="margin-left: 50px;margin-top:30px">
                        <p style="font-weight: bold;"><i class="fa-regular fa-circle-user fa-2xl"></i><?php echo '   ' . $ds['TenKhachHang'] ?></p>
                        <div style="margin-left: 35px;">
                            <p><?php echo $ds['NoiDung'] ?></p>
                            <p style="color:cadetblue"><?php echo $ds['NgayTao'] ?></p>
                        </div>

                    </div>
                <?php } ?>
            </div>
            <footer style="margin-top:30px;height:200px">
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

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
        }
        x[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " w3-opacity-off";
    }
</script>
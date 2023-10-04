<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> <!-- icon -->
    <link rel="stylesheet" href="sp/muahang.css">
    <script src="sp/muahang.js"></script>


    <!--Link Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--link bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header>
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        require_once "db.php";
        $search1 = "SELECT * FROM khachhang WHERE MaKhachHang='{$_SESSION['makh']}'";
        $giatri1 = $conn->query($search1);
        $ds = $giatri1->fetch_assoc();
        ?>
        <nav class="navbar navbar-expand-md bgcolor navbar-dark">
            <a class="navbar-brand" href="index.php" title="php"><i class="fa-brands fa-battle-net" style="font-size:3vw;"> MK</i></a>
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



                <!-- dropdown-->
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
                <!-- dropdown-->

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
                    <ul class="navbar-nav " style="text-align:center">
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
        <article> <!--Tìm Kiếm Sản Phẩm -->

            <div>
                <button class="baby" onmousedown="change()">Tìm Theo Giá <i class="fa-solid fa-angle-down"></i></button>
                <form method="post" action="AllMayGiat.php?check=0">
                    <ul id="sptheogia">
                        <li style="margin-top: 5px;"><input style="position: absolute;" type="checkbox" value='check1' name='check[]' id="check1"> <label style="margin-left: 20px;margin-top: 5px;" for="check1">
                                < 1,000,000 (VND)</label>
                        </li>
                        <li style="margin-top: 5px;"><input style="position: absolute;" type="checkbox" value='check2' name='check[]' id="check2"> <label style="margin-left: 20px;margin-top: 5px;" for="check2"> 1,000,000 - 3,000,000 (VND)</label></li>
                        <li style="margin-top: 5px;"><input style="position: absolute;" type="checkbox" value='check3' name='check[]' id="check3"> <label style="margin-left: 20px;margin-top: 5px;" for="check3"> 3,000,000 - 5,000,000 (VND)</label> </li>
                        <li style="margin-top: 5px;"><input style="position: absolute;" type="checkbox" value='check4' name='check[]' id="check4"> <label style="margin-left: 20px;margin-top: 5px;" for="check4"> 5,000,000 - 10,000,000 (VND)</label></li>
                        <li style="margin-top: 5px;"><input style="position: absolute;" type="checkbox" value='check5' name='check[]' id="check5"> <label style="margin-left: 20px;margin-top: 5px;" for="check5"> > 10,000,000 (VND)</label></li>
                        <li style="margin-top: 5px;"><input style="position: absolute;" type="submit" name="submitfil" value="Tìm Kiếm" class="btn btn-primary"></li>
                    </ul>
                </form>
            </div>


            <?php

            require_once "db.php";
            $querys = "SELECT * FROM giohang WHERE MaKhachHang='{$_SESSION['makh']}'";
            $results = $conn->query($querys);
            $dss = $results->fetch_assoc();

            ?>


        </article> <!--Danh Sách Sản Phẩm-->
        <aside style="height:auto;">
            <!-- dsdsfdsfdfsf-->
            <?php
            require_once "db.php";
            $per_page_record = 6;  // Number of entries to show in a page.   
            // Look for a GET variable page if not found default is 1.        
            if (isset($_GET["page"])) {
                $page  = $_GET["page"];
            } else {
                $page = 1;
            }

            $start_from = ($page - 1) * $per_page_record;
            $query = "SELECT * FROM sanpham, hinhanh,danhmuc WHERE danhmuc.MaDanhMuc=SanPham.MaDanhMuc AND sanpham.MaSanPham=hinhanh.MaSanPham AND sanpham.MaDanhMuc='DM3' limit $start_from, $per_page_record ;";
            $result = $conn->query($query);


            ?>
            <h3 class="danhsach">Danh sách sản phẩm</h3>
            <!-- <button style="margin-top: 20px;" class="khuyenmai">Tất Cả</button> <button class="khuyenmai"><i class="fa-solid fa-tag" style="color: yellow;"></i>Khuyến Mãi Trang Chủ</button> -->
            <hr>

            <!--Sản Phẩm-->


            <?php
            require_once "db.php";

            if (isset($_POST['submitfil']) && !empty($_POST['check'])) {
                $que2 = "DELETE FROM new;";
                $rs2 = mysqli_query($conn, $que2);
                $i = 0;
                foreach ($_POST['check'] as $value) {
                    if ($value == 'check1') {
                        // $query = "SELECT * FROM sanpham, hinhanh,danhmuc WHERE danhmuc.MaDanhMuc=SanPham.MaDanhMuc AND sanpham.MaSanPham=hinhanh.MaSanPham AND sanpham.MaDanhMuc='DM3' AND sanpham.DonGia<=1000000";
                        $que1 = "INSERT INTO new (TenSanPham,HinhAnh,DonGia,MaSanPham) SELECT TenSanPham,HinhAnh,DonGia,sanpham.MaSanPham FROM sanpham, hinhanh,danhmuc WHERE danhmuc.MaDanhMuc=SanPham.MaDanhMuc AND sanpham.MaSanPham=hinhanh.MaSanPham AND sanpham.MaDanhMuc='DM3' AND sanpham.DonGia<=1000000";
                        // $result = $conn->query($query);
                        $rs1 = $conn->query($que1);
                    }
                    if ($value == 'check2') {
                        $que1 = "INSERT INTO new (TenSanPham,HinhAnh,DonGia,MaSanPham) SELECT TenSanPham,HinhAnh,DonGia,sanpham.MaSanPham FROM sanpham, hinhanh,danhmuc WHERE danhmuc.MaDanhMuc=SanPham.MaDanhMuc AND sanpham.MaSanPham=hinhanh.MaSanPham AND sanpham.MaDanhMuc='DM3' AND sanpham.DonGia>=1000000 AND sanpham.DonGia<=3000000";
                        $rs1 = $conn->query($que1);
                    }
                    if ($value == 'check3') {
                        $que1 = "INSERT INTO new (TenSanPham,HinhAnh,DonGia,MaSanPham) SELECT TenSanPham,HinhAnh,DonGia,sanpham.MaSanPham FROM sanpham, hinhanh,danhmuc WHERE danhmuc.MaDanhMuc=SanPham.MaDanhMuc AND sanpham.MaSanPham=hinhanh.MaSanPham AND sanpham.MaDanhMuc='DM3' AND sanpham.DonGia>=3000000 AND sanpham.DonGia<=5000000";
                        $rs1 = $conn->query($que1);
                    }
                    if ($value == 'check4') {
                        $que1 = "INSERT INTO new (TenSanPham,HinhAnh,DonGia,MaSanPham) SELECT TenSanPham,HinhAnh,DonGia,sanpham.MaSanPham FROM sanpham, hinhanh,danhmuc WHERE danhmuc.MaDanhMuc=SanPham.MaDanhMuc AND sanpham.MaSanPham=hinhanh.MaSanPham AND sanpham.MaDanhMuc='DM3' AND sanpham.DonGia<=10000000 AND sanpham.DonGia>5000000";
                        $rs1 = $conn->query($que1);
                    }
                    if ($value == 'check5') {
                        $que1 = "INSERT INTO new (TenSanPham,HinhAnh,DonGia,MaSanPham) SELECT TenSanPham,HinhAnh,DonGia,sanpham.MaSanPham FROM sanpham, hinhanh,danhmuc WHERE danhmuc.MaDanhMuc=SanPham.MaDanhMuc AND sanpham.MaSanPham=hinhanh.MaSanPham AND sanpham.MaDanhMuc='DM3' AND sanpham.DonGia>=10000000";
                        $rs1 = $conn->query($que1);
                    }
                }
            } ?>
            <?php
            if (isset($_GET['check'])) {
                $queryn = "SELECT * FROM new limit $start_from, $per_page_record ;";
                $resultn = $conn->query($queryn);
                $i = 0;
                while ($dsn = $resultn->fetch_assoc()) {
                    $i++;
                    if ($i % 3 == 0) { ?>

                        <div class="con">
                            <?php
                            $image = imagecreatefromstring($dsn['HinhAnh']);
                            ob_start();
                            imagejpeg($image, null, 80);
                            $data = ob_get_contents();
                            ob_end_clean();
                            echo '<img style="max-width:130px; height:90px" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                            ?>
                            <a style="color:black" href="ChiTiet.php?id=<?php echo  $dsn['MaSanPham'] ?>">
                                <p><?php echo $dsn['TenSanPham'] ?></p>
                            </a>
                            <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:40px"><?php echo number_format($dsn['DonGia']) . " VNĐ" ?>
                                <a href="add.php?hd=themspgh&id=<?php echo $dsn['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                                    <i class="fa-solid fa-plus" style="width: 2.5vw"></i></a>
                            </p> <!--add php vào đây-->
                        </div>

                        </div>
                    <?php } ?>
                    <?php if ($i % 3 == 1) { ?>
                        <div class="cha">
                            <div class="con">
                                <?php
                                $image = imagecreatefromstring($dsn['HinhAnh']);
                                ob_start();
                                imagejpeg($image, null, 80);
                                $data = ob_get_contents();
                                ob_end_clean();
                                echo '<img style="max-width:130px; height:90px" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                                ?>
                                <a style="color:black" href="ChiTiet.php?id=<?php echo  $dsn['MaSanPham'] ?>">
                                    <p><?php echo $dsn['TenSanPham'] ?></p>
                                </a>
                                <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:40px"><?php echo number_format($dsn['DonGia']) . " VNĐ" ?>
                                    <a href="add.php?hd=themspgh&id=<?php echo $dsn['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                                        <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
                                </p> <!--add php vào đây-->


                            </div>
                        <?php }
                    if ($i % 3 == 2) { ?>

                            <div class="con">
                                <?php
                                $image = imagecreatefromstring($dsn['HinhAnh']);
                                ob_start();
                                imagejpeg($image, null, 80);
                                $data = ob_get_contents();
                                ob_end_clean();
                                echo '<img style="max-width:130px; height:90px" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                                ?>
                                <a style="color:black" href="ChiTiet.php?id=<?php echo  $dsn['MaSanPham'] ?>">
                                    <p><?php echo $dsn['TenSanPham'] ?></p>
                                </a>
                                <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:40px"><?php echo number_format($dsn['DonGia']) . " VNĐ" ?>
                                    <a href="add.php?hd=themspgh&id=<?php echo $dsn['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                                        <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
                                </p> <!--add php vào đây-->
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <div class="pagination">
                        <?php

                        $querynn = "SELECT COUNT(*) FROM new;";
                        $rs_result = mysqli_query($conn, $querynn);
                        $row = mysqli_fetch_row($rs_result);
                        $total_records = $row[0];

                        echo "</br>";
                        // Number of pages required.   
                        $total_pages = ceil($total_records / $per_page_record);
                        $pagLink = "";

                        if ($page >= 2) {
                            echo "<a href='AllMayGiat.php?check=0&page=" . ($page - 1) . "'>  Prev </a>";
                        }

                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == $page) {
                                $pagLink .= "<a class = 'active' href='AllMayGiat.php?check=0&page="
                                    . $i . "'>" . $i . " </a>";
                            } else {
                                $pagLink .= "<a href='AllMayGiat.php?check=0&page=" . $i . "'>   
                            " . $i . " </a>";
                            }
                        };
                        echo $pagLink;

                        if ($page < $total_pages) {
                            echo "<a href='AllMayGiat.php?check=0&page=" . ($page + 1) . "'>  Next </a>";
                        }

                        ?>
                    </div>
                    <div class="inline">
                        <input id="page" type="number" min="1" max="<?php echo $total_pages ?>" placeholder="<?php echo $page . "/" . $total_pages; ?>" required>
                        <button onClick="go2Page1();">Go</button>
                    </div>



                    <?php

                } else {

                    $i = 0;
                    while ($ds = $result->fetch_assoc()) {
                        $i++;
                        if ($i % 3 == 0) { ?>

                            <div class="con">
                                <?php
                                $image = imagecreatefromstring($ds['HinhAnh']);
                                ob_start();
                                imagejpeg($image, null, 80);
                                $data = ob_get_contents();
                                ob_end_clean();
                                echo '<img style="max-width:130px; height:90px" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                                ?>
                                <a style="color:black" href="ChiTiet.php?id=<?php echo  $ds['MaSanPham'] ?>">
                                    <p><?php echo $ds['TenSanPham'] ?></p>
                                </a>
                                <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:40px"><?php echo number_format($ds['DonGia']) . " VNĐ" ?>
                                    <a href="add.php?hd=themspgh&id=<?php echo $ds['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                                        <i class="fa-solid fa-plus" style="width: 2.5vw"></i></a>
                                </p> <!--add php vào đây-->
                            </div>

                        </div>
                    <?php } ?>
                    <?php if ($i % 3 == 1) { ?>
                        <div class="cha">
                            <div class="con">
                                <?php
                                $image = imagecreatefromstring($ds['HinhAnh']);
                                ob_start();
                                imagejpeg($image, null, 80);
                                $data = ob_get_contents();
                                ob_end_clean();
                                echo '<img style="max-width:130px; height:90px" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                                ?>
                                <a style="color:black" href="ChiTiet.php?id=<?php echo  $ds['MaSanPham'] ?>">
                                    <p><?php echo $ds['TenSanPham'] ?></p>
                                </a>
                                <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:40px"><?php echo number_format($ds['DonGia']) . " VNĐ" ?>
                                    <a href="add.php?hd=themspgh&id=<?php echo $ds['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                                        <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
                                </p> <!--add php vào đây-->


                            </div>
                        <?php }
                        if ($i % 3 == 2) { ?>

                            <div class="con">
                                <?php
                                $image = imagecreatefromstring($ds['HinhAnh']);
                                ob_start();
                                imagejpeg($image, null, 80);
                                $data = ob_get_contents();
                                ob_end_clean();
                                echo '<img style="max-width:130px; height:90px" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                                ?>
                                <a style="color:black" href="ChiTiet.php?id=<?php echo  $ds['MaSanPham'] ?>">
                                    <p><?php echo $ds['TenSanPham'] ?></p>
                                </a>
                                <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:40px"><?php echo number_format($ds['DonGia']) . " VNĐ" ?>
                                    <a href="add.php?hd=themspgh&id=<?php echo $ds['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                                        <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
                                </p> <!--add php vào đây-->
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <div class="pagination">
                        <?php
                        $queryy = "SELECT COUNT(*) FROM sanpham, hinhanh,danhmuc WHERE danhmuc.MaDanhMuc=SanPham.MaDanhMuc AND sanpham.MaSanPham=hinhanh.MaSanPham AND sanpham.MaDanhMuc='DM3' ;";
                        $rs_result = mysqli_query($conn, $queryy);
                        $row = mysqli_fetch_row($rs_result);
                        $total_records = $row[0];

                        echo "</br>";
                        // Number of pages required.   
                        $total_pages = ceil($total_records / $per_page_record);
                        $pagLink = "";

                        if ($page >= 2) {
                            echo "<a href='AllMayGiat.php?page=" . ($page - 1) . "'>  Prev </a>";
                        }

                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == $page) {
                                $pagLink .= "<a class = 'active' href='AllMayGiat.php?page="
                                    . $i . "'>" . $i . " </a>";
                            } else {
                                $pagLink .= "<a href='AllMayGiat.php?page=" . $i . "'>   
                            " . $i . " </a>";
                            }
                        };
                        echo $pagLink;

                        if ($page < $total_pages) {
                            echo "<a href='AllMayGiat.php?page=" . ($page + 1) . "'>  Next </a>";
                        }

                        ?>
                    </div>
                    <div class="inline">
                        <input id="page" type="number" min="1" max="<?php echo $total_pages ?>" placeholder="<?php echo $page . "/" . $total_pages; ?>" required>
                        <button onClick="go2Page();">Go</button>
                    </div>
                <?php } ?>


        </aside>
    </main>
    <footer style="height:200px;margin-top:450px">
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
</body>

</html>

<script>
    function go2Page1() {
        var page = document.getElementById("page").value;
        page = ((page > <?php echo $total_pages; ?>) ? <?php echo $total_pages; ?> : ((page < 1) ? 1 : page));
        window.location.href = 'AllMayGiat.php?check=0&page=' + page;
    }

    function go2Page() {
        var page = document.getElementById("page").value;
        page = ((page > <?php echo $total_pages; ?>) ? <?php echo $total_pages; ?> : ((page < 1) ? 1 : page));
        window.location.href = 'AllMayGiat.php?&page=' + page;
    }
</script>
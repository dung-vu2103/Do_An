<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['dn'])) {
  $_SESSION['dn'] = false;
  $_SESSION['person'] = "khach";
  $_SESSION['makh'] = "KH1";
  $_SESSION['loi']=0;
}
require_once "db.php";
// if ($_SESSION['dn'] == false) {
if (1 == 2) {
  // require_once "dangnhap.php";
} else { ?>
  <?php
  if ($_SESSION['person'] == 'khachhang' || $_SESSION['person'] == 'khach') { ?>

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


        /* .slideshow-container {
          max-width: 1000px;
          position: relative;
          margin: auto;
        } */

        /* Caption text */
        .text {
          color: #f2f2f2;
          font-size: 15px;
          padding: 8px 12px;
          position: absolute;
          bottom: 8px;
          width: 100%;
          text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
          color: #f2f2f2;
          font-size: 12px;
          padding: 8px 12px;
          position: absolute;
          top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbb;
          border-radius: 50%;
          display: inline-block;
          transition: background-color 0.6s ease;
        }

        .active {
          background-color: #717171;
        }

        /* Fading animation */
        .fade {
          animation-name: fade;
          animation-duration: 1.5s;
        }

        @keyframes fade {
          from {
            opacity: .4
          }

          to {
            opacity: 1
          }
        }

        .mySlides {
          display: none;
        }

        img {
          vertical-align: middle;
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
          .text {
            font-size: 11px
          }
        }
      </style>
    </head>

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
        <div class="slideshow-container">

          <div class="mySlides fade">
            <img src="image/tivi.jpg" style="width:99vw; max-height: 71vh;">
          </div>

          <div class="mySlides fade">
            <img src="image/tulanh.jpg" style="width:99vw; max-height: 71vh;">
          </div>

          <div class="mySlides fade">
            <img src="image/dieuhoa.jpg" style="width:99vw; max-height: 71vh;">
          </div>
          <div class="mySlides fade">
            <img src="image/maygiat.jpg" style="width:99vw; max-height: 71vh;">
          </div>
          <div class="mySlides fade">
            <img src="image/tivi.jpg" style="width:99vw; max-height: 71vh;">
          </div>
        </div>
        <br>

        <div style="text-align:center">
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>
        <?php
        require_once "db.php";
        $querys = "SELECT * FROM giohang WHERE MaKhachHang='{$_SESSION['makh']}'";
        $results = $conn->query($querys);
        $dss = $results->fetch_assoc();


        $queryyy = "SELECT sanpham.MaSanPham,DonGia,TenSanPham,SUM(SoLuong) as tong FROM hoadon,sanpham,chitiethoadon WHERE hoadon.MaHoaDon=chitiethoadon.MaHoaDon AND sanpham.MaSanPham=chitiethoadon.MaSanPham AND YEAR(NgayLap)='2023'   GROUP by TenSanPham ORDER BY tong DESC LIMIT 5";
        $resultyy = $conn->query($queryyy);
        $dsyy = $resultyy->fetch_assoc();
        $querya = "SELECT * FROM hinhanh WHERE MaSanPham='{$dsyy['MaSanPham']}'";
        $resulta = $conn->query($querya);
        $dsa = $resulta->fetch_assoc();
        ?>
        <aside>
          <img src="image/Capture.PNG" style="width: 98.99vw; margin-top: 3vh;">
          <br>
          <h3 style="margin-top: 5vh;margin-bottom: 5vh;margin-left: 2vw;">Sản Phẩm Nổi Bật</h3>
          <div class="cha">
            <?php
            $query = "SELECT * FROM sanpham, hinhanh WHERE sanpham.MaSanPham=hinhanh.MaSanPham;";
            $result = $conn->query($query);
            $ds = $result->fetch_assoc();
            ?>
            <div class="con">
              <?php
              $image = imagecreatefromstring($dsa['HinhAnh']);
              ob_start();
              imagejpeg($image, null, 80);
              $data = ob_get_contents();
              ob_end_clean();
              echo '<img style="max-width:150px; height:auto" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
              ?>
              <a style="color:black" href="ChiTiet.php?id=<?php echo  $dsyy['MaSanPham'] ?>">
                <p><?php echo $dsyy['TenSanPham'] ?></p>
              </a>
              <p style="font-size: 3.5vh;font-weight: 500; color: red;"><?php echo number_format($dsyy['DonGia']) . " VNĐ" ?>

                <a href="add.php?hd=themspgh&id=<?php echo $dsyy['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                  <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
              </p> <!--add php vào đây-->
            </div>
            <?php
            $dsyy = $resultyy->fetch_assoc();
            $querya = "SELECT * FROM hinhanh WHERE MaSanPham='{$dsyy['MaSanPham']}'";
            $resulta = $conn->query($querya);
            $dsa = $resulta->fetch_assoc();
            $ds = $result->fetch_assoc();
            ?>
            <div class="con">
              <?php
              $image = imagecreatefromstring($dsa['HinhAnh']);
              ob_start();
              imagejpeg($image, null, 80);
              $data = ob_get_contents();
              ob_end_clean();
              echo '<img style="max-width:150px; height:auto" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
              ?>
              <a style="color:black" href="ChiTiet.php?id=<?php echo  $dsyy['MaSanPham'] ?>">
                <p><?php echo $dsyy['TenSanPham'] ?></p>
              </a>
              <p style="font-size: 3.5vh;font-weight: 500; color: red; margin-top:65px"><?php echo number_format($dsyy['DonGia']) . " VNĐ" ?>
                <a href="add.php?hd=themspgh&id=<?php echo $dsyy['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                  <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
              </p> <!--add php vào đây-->
            </div>
            <?php
            $dsyy = $resultyy->fetch_assoc();
            $querya = "SELECT * FROM hinhanh WHERE MaSanPham='{$dsyy['MaSanPham']}'";
            $resulta = $conn->query($querya);
            $dsa = $resulta->fetch_assoc();
            $ds = $result->fetch_assoc();
            ?>
            <div class="con">
              <?php
              $image = imagecreatefromstring($dsa['HinhAnh']);
              ob_start();
              imagejpeg($image, null, 80);
              $data = ob_get_contents();
              ob_end_clean();
              echo '<img style="max-width:150px; height:auto" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
              ?>
              <a style="color:black" href="ChiTiet.php?id=<?php echo  $dsyy['MaSanPham'] ?>">
                <p><?php echo $dsyy['TenSanPham'] ?></p>
              </a>
              <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:35px"><?php echo number_format($dsyy['DonGia']) . " VNĐ" ?>
                <a href="add.php?hd=themspgh&id=<?php echo $dsyy['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                  <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
              </p> <!--add php vào đây-->
            </div>
            <?php
            $dsyy = $resultyy->fetch_assoc();
            $querya = "SELECT * FROM hinhanh WHERE MaSanPham='{$dsyy['MaSanPham']}'";
            $resulta = $conn->query($querya);
            $dsa = $resulta->fetch_assoc();
            $ds = $result->fetch_assoc();
            ?>
            <div class="con">
              <?php
              $image = imagecreatefromstring($dsa['HinhAnh']);
              ob_start();
              imagejpeg($image, null, 80);
              $data = ob_get_contents();
              ob_end_clean();
              echo '<img style="max-width:150px; height:auto" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
              ?>
              <a style="color:black" href="ChiTiet.php?id=<?php echo  $dsyy['MaSanPham'] ?>">
                <p><?php echo $dsyy['TenSanPham'] ?></p>
              </a>
              <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:65px"><?php echo number_format($dsyy['DonGia']) . " VNĐ" ?>
                <a href="add.php?hd=themspgh&id=<?php echo $dsyy['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                  <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
              </p> <!--add php vào đây-->
            </div>
          </div>
          <br><br>
          <div class="khuyenmai">
            <h2> Đề xuất cho bạn</h2>
            <br><br><br><br>
            <div class="cha1">

              <div class="con">
                <?php
                $image = imagecreatefromstring($ds['HinhAnh']);
                ob_start();
                imagejpeg($image, null, 80);
                $data = ob_get_contents();
                ob_end_clean();
                echo '<img style="max-width:150px; height:auto" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                ?>
                <a style="color:black" href="ChiTiet.php?id=<?php echo  $ds['MaSanPham'] ?>">
                  <p><?php echo $ds['TenSanPham'] ?></p>
                </a>
                <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:50px"><?php echo number_format($ds['DonGia']) . " VNĐ" ?>
                  <a href="add.php?hd=themspgh&id=<?php echo $ds['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                    <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
                </p> <!--add php vào đây-->
              </div>
              <?php
              $ds = $result->fetch_assoc();
              $ds = $result->fetch_assoc();
              $ds = $result->fetch_assoc();
              ?>
              <div class="con">
                <?php
                $image = imagecreatefromstring($ds['HinhAnh']);
                ob_start();
                imagejpeg($image, null, 80);
                $data = ob_get_contents();
                ob_end_clean();
                echo '<img style="max-width:150px; height:auto" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                ?>
                <a style="color:black" href="ChiTiet.php?id=<?php echo  $ds['MaSanPham'] ?>">
                  <p><?php echo $ds['TenSanPham'] ?></p>
                </a>
                <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:50px"><?php echo number_format($ds['DonGia']) . " VNĐ" ?>
                  <a href="add.php?hd=themspgh&id=<?php echo $ds['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                    <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
                </p> <!--add php vào đây-->
              </div>
              <?php
              $ds = $result->fetch_assoc();
              $ds = $result->fetch_assoc();
              $ds = $result->fetch_assoc();
              ?>
              <div class="con">
                <?php
                $image = imagecreatefromstring($ds['HinhAnh']);
                ob_start();
                imagejpeg($image, null, 80);
                $data = ob_get_contents();
                ob_end_clean();
                echo '<img style="max-width:150px; height:auto" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                ?>
                <a style="color:black" href="ChiTiet.php?id=<?php echo  $ds['MaSanPham'] ?>">
                  <p><?php echo $ds['TenSanPham'] ?></p>
                </a>
                <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:0px"><?php echo number_format($ds['DonGia']) . " VNĐ" ?>
                  <a href="add.php?hd=themspgh&id=<?php echo $ds['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                    <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
                </p> <!--add php vào đây-->
              </div>
              <?php
              $ds = $result->fetch_assoc();
              $ds = $result->fetch_assoc();
              $ds = $result->fetch_assoc();
              ?>
              <div class="con">
                <?php
                $image = imagecreatefromstring($ds['HinhAnh']);
                ob_start();
                imagejpeg($image, null, 80);
                $data = ob_get_contents();
                ob_end_clean();
                echo '<img style="max-width:130px; height:auto;" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                ?>
                <a style="color:black" href="ChiTiet.php?id=<?php echo  $ds['MaSanPham'] ?>">
                  <p><?php echo $ds['TenSanPham'] ?></p>
                </a>
                <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:30px"><?php echo number_format($ds['DonGia']) . " VNĐ" ?>
                  <a href="add.php?hd=themspgh&id=<?php echo $ds['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                    <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
                </p> <!--add php vào đây-->
              </div>
            </div>
            <?php
            $ds = $result->fetch_assoc();
            $ds = $result->fetch_assoc();
            $ds = $result->fetch_assoc();
            ?>
            <div class="cha1">
              <div class="con">
                <?php
                $image = imagecreatefromstring($ds['HinhAnh']);
                ob_start();
                imagejpeg($image, null, 80);
                $data = ob_get_contents();
                ob_end_clean();
                echo '<img style="max-width:150px; height:auto" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                ?>
                <a style="color:black" href="ChiTiet.php?id=<?php echo  $ds['MaSanPham'] ?>">
                  <p><?php echo $ds['TenSanPham'] ?></p>
                </a>
                <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:40px"><?php echo number_format($ds['DonGia']) . " VNĐ" ?>
                  <a href="add.php?hd=themspgh&id=<?php echo $ds['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                    <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
                </p> <!--add php vào đây-->
              </div>
              <?php
              $ds = $result->fetch_assoc();
              $ds = $result->fetch_assoc();
              $ds = $result->fetch_assoc();
              ?>
              <div class="con">
                <?php
                $image = imagecreatefromstring($ds['HinhAnh']);
                ob_start();
                imagejpeg($image, null, 80);
                $data = ob_get_contents();
                ob_end_clean();
                echo '<img style="max-width:150px; height:auto" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                ?>
                <a style="color:black" href="ChiTiet.php?id=<?php echo  $ds['MaSanPham'] ?>">
                  <p><?php echo $ds['TenSanPham'] ?></p>
                </a>
                <p style="font-size: 3.5vh;font-weight: 500; color: red;;margin-top:0px"><?php echo number_format($ds['DonGia']) . " VNĐ" ?>
                  <a href="add.php?hd=themspgh&id=<?php echo $ds['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                    <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
                </p> <!--add php vào đây-->
              </div>
              <?php
              $ds = $result->fetch_assoc();
              $ds = $result->fetch_assoc();
              $ds = $result->fetch_assoc();
              ?>
              <div class="con">
                <?php
                $image = imagecreatefromstring($ds['HinhAnh']);
                ob_start();
                imagejpeg($image, null, 80);
                $data = ob_get_contents();
                ob_end_clean();
                echo '<img style="max-width:150px; height:auto" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                ?>
                <a style="color:black" href="ChiTiet.php?id=<?php echo  $ds['MaSanPham'] ?>">
                  <p><?php echo $ds['TenSanPham'] ?></p>
                </a>
                <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:5px"><?php echo number_format($ds['DonGia']) . " VNĐ" ?>
                  <a href="add.php?hd=themspgh&id=<?php echo $ds['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                    <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
                </p> <!--add php vào đây-->
              </div>
              <?php
              $ds = $result->fetch_assoc();
              $ds = $result->fetch_assoc();
              $ds = $result->fetch_assoc();
              ?>
              <div class="con">
                <?php
                $image = imagecreatefromstring($ds['HinhAnh']);
                ob_start();
                imagejpeg($image, null, 80);
                $data = ob_get_contents();
                ob_end_clean();
                echo '<img style="max-width:150px; height:auto" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                ?>
                <a style="color:black" href="ChiTiet.php?id=<?php echo  $ds['MaSanPham'] ?>">
                  <p><?php echo $ds['TenSanPham'] ?></p>
                </a>
                <p style="font-size: 3.5vh;font-weight: 500; color: red;margin-top:5px"><?php echo number_format($ds['DonGia']) . " VNĐ" ?>
                  <a href="add.php?hd=themspgh&id=<?php echo $ds['MaSanPham'] ?>&makh=<?php echo $_SESSION['makh'] ?>&magh=<?php echo $dss['MaGioHang'] ?>" style="color: whitesmoke;background-color: #5dd16f; border-radius: 0.34vw;">
                    <i class="fa-solid fa-plus" style="width: 2.5vw;"></i></a>
                </p> <!--add php vào đây-->
              </div>
            </div>
          </div>
        </aside>
      </main>

      <footer style="height:200px">
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
            <li>148 Hoàng Hoa Thám, Phường Tân Bình, Quận Tân Bình, TP.Hải Phòng</li>
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
  <?php } else { ?>




    <?php
    require_once "Dashboard.php";
    ?>
  <?php } ?>
<?php } ?>
<script>
  let slideIndex = 0;
  showSlides();

  function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
      slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
  }
</script>
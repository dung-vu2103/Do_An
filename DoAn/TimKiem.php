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

        table {
          border-collapse: collapse;
        }

        .inline {
          display: inline-block;
          float: right;
          margin-top: -35px;
          margin-right: 50px;
          height: 45px;
        }

        input,
        button {
          height: 34px;
        }

        .pagination {
          display: inline-block;
          display: flex;
          justify-content: center;
          margin-top: 80px;
          height: 45px;
        }

        .pagination a {
          font-weight: bold;
          font-size: 18px;
          color: black;
          float: left;
          padding: 8px 16px;
          text-decoration: none;
          border: 1px solid black;
        }

        .pagination a.active {
          background-color: pink;
        }

        .pagination a:hover:not(.active) {
          background-color: skyblue;
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

        <?php
        require_once "db.php";


        ////////////////////

        $per_page_record = 8;  // Number of entries to show in a page.   
        // Look for a GET variable page if not found default is 1.        
        if (isset($_GET["page"])) {
          $page  = $_GET["page"];
        } else {
          $page = 1;
        }

        $start_from = ($page - 1) * $per_page_record;

        // $query = "SELECT * FROM student LIMIT $start_from, $per_page_record";
        // $rs_result = mysqli_query($conn, $query);
        ////////////////


        $querys = "SELECT * FROM giohang WHERE MaKhachHang='{$_SESSION['makh']}'";
        $results = $conn->query($querys);
        $dss = $results->fetch_assoc();
        ?>
        <aside style="height:1100px">
          <div>
            <?php
            require_once "db.php";
            if (isset($_GET['key'])) {
              $key = $_GET['key'];
              $_SESSION['keysear'] = $key;

              $query = "SELECT * FROM sanpham, hinhanh WHERE sanpham.MaSanPham=hinhanh.MaSanPham AND TenSanPham LIKE '%{$_SESSION['keysear']}%' limit $start_from, $per_page_record";
              $result = $conn->query($query);

            ?>
              <h3 class="danhsach" style="padding-top: 20px;margin-left:40px">Danh sách sản phẩm</h3>

              <!--Sản Phẩm-->


              <?php
              $i = 0;
              while ($ds = $result->fetch_assoc()) {
                $i++;
                if ($i % 4 == 0) { ?>

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
        <?php if ($i % 4 == 1) {
        ?>
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
                if ($i % 4 == 2 || $i % 4 == 3) { ?>

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
              } ?>
      <?php } else { ?>
        <p style="text-align:center;padding-top:200px;font-size:20px;">Không có sản phẩm nào</p><?php } ?>
          </div>
          <!-- <div style="display:flex;justify-content: center;height:45px;"> -->
          <div class="pagination">
            <?php
            $query = "SELECT COUNT(*) FROM sanpham, hinhanh WHERE sanpham.MaSanPham=hinhanh.MaSanPham AND TenSanPham LIKE '%{$_SESSION['keysear']}%'";
            $rs_result = mysqli_query($conn, $query);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];

            echo "</br>";
            // Number of pages required.   
            $total_pages = ceil($total_records / $per_page_record);
            $pagLink = "";

            if ($page >= 2) {
              echo "<a href='TimKiem.php?key=" . $_SESSION['keysear'] . "&page=" . ($page - 1) . "'>  Prev </a>";
            }

            for ($i = 1; $i <= $total_pages; $i++) {
              if ($i == $page) {
                $pagLink .= "<a class = 'active' href='TimKiem.php?key=" . $_SESSION['keysear'] . "&page="
                  . $i . "'>" . $i . " </a>";
              } else {
                $pagLink .= "<a href='TimKiem.php?key=" . $_SESSION['keysear'] . "&page=" . $i . "'>   
                                                " . $i . " </a>";
              }
            };
            echo $pagLink;

            if ($page < $total_pages) {
              echo "<a href='TimKiem.php?key=" . $_SESSION['keysear'] . "&page=" . ($page + 1) . "'>  Next </a>";
            }

            ?>
          </div>
          <div class="inline">
            <input id="page" type="number" min="1" max="<?php echo $total_pages ?>" placeholder="<?php echo $page . "/" . $total_pages; ?>" required>
            <button onClick="go2Page();">Go</button>
          </div>
          <!-- </div> -->
        </aside>


      </main>

      <footer style="height:200px;margin-top:300px">
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
  <?php } ?>
<?php } ?>

<script>
  function go2Page() {
    var page = document.getElementById("page").value;
    page = ((page > <?php echo $total_pages; ?>) ? <?php echo $total_pages; ?> : ((page < 1) ? 1 : page));
    window.location.href = 'TimKiem.php?key=' + '<?php echo $_SESSION['keysear'] ?>' + '&page=' + page;
  }
</script>
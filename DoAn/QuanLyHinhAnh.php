<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn, "db_do_an1");
?>
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
                <li><a href="QuanLyHoaDon.php" style="font-size: 2vw;">Quản Lý Hình Ảnh</a></li>
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
                <!-- <li><a href="index.php"><i class="fa-solid fa-user-plus"></i> Thống Kê</a></li>-->
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
        <table style="text-align: center">
            <form>
                <tr>

                    <th>Mã Hình Ảnh</th>
                    <th>Hình Ảnh</th>
                    <th>Mã Sản Phẩm</th>
                    <th>Sửa</th>
                    <th>Xóa</th>

                </tr>
                <?php
                require_once "db.php";


                ////////////////////

                $per_page_record = 6;  // Number of entries to show in a page.   
                // Look for a GET variable page if not found default is 1.        
                if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                } else {
                    $page = 1;
                }

                $start_from = ($page - 1) * $per_page_record;
                $query = "SELECT * FROM hinhanh limit $start_from, $per_page_record";
                $result = $conn->query($query);
                while ($dshoadon = $result->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?php echo $dshoadon['MaHinhAnh'] ?>
                        </td>
                        <td>
                            <?php
                            $image = imagecreatefromstring($dshoadon['HinhAnh']);
                            ob_start();
                            imagejpeg($image, null, 80);
                            $data = ob_get_contents();
                            ob_end_clean();
                            echo '<img style="max-width:80px; height:50px" src="data:image/jpg;base64,' . base64_encode($data) . '"/>';
                            ?>
                        </td>
                        <td>
                            <?php echo $dshoadon['MaSanPham'] ?>
                        </td>


                        <td><a href="QuanLyHoaDonSua.php?id=<?php echo $dshoadon['MaHinhAnh'] ?>" <i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                        <td><a onclick="return Del()" href="Xoa.php?hd=xoahd&id=<?php echo $dshoadon['MaHinhAnh'] ?>" <i class="fa fa-trash" aria-hidden="true"></i></a></td>

                    </tr>

                <?php } ?>
                <tr>
                    <td colspan="5">
                        <div class="pagination">
                            <?php
                            $query = "SELECT COUNT(*) FROM  hinhanh ";
                            $rs_result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_row($rs_result);
                            $total_records = $row[0];

                            echo "</br>";
                            // Number of pages required.   
                            $total_pages = ceil($total_records / $per_page_record);
                            $pagLink = "";

                            if ($page >= 2) {
                                echo "<a href='QuanLyHinhAnh.php?page=" . ($page - 1) . "'>  Prev </a>";
                            }

                            for ($i = 1; $i <= $total_pages; $i++) {
                                if ($i == $page) {
                                    $pagLink .= "<a class = 'active' href='QuanLyHinhAnh.php?page="
                                        . $i . "'>" . $i . " </a>";
                                } else {
                                    $pagLink .= "<a href='QuanLyHinhAnh.php?page=" . $i . "'>   
                                                " . $i . " </a>";
                                }
                            };
                            echo $pagLink;

                            if ($page < $total_pages) {
                                echo "<a href='QuanLyHinhAnh.php?page=" . ($page + 1) . "'>  Next </a>";
                            }

                            ?>
                        </div>
                        
                    </td>
                </tr>
                <tr>
                    <td><button type="button" style="margin-left: 8vw; margin-top: 18vw"><a href="ThemHinhAnh.php" style="color:white;">Thêm</a></button></td>



                </tr>

            </form>


        </table>

    </main>

</body>

</html>
<script>
    function Del() {
        return confirm("Bạn có muốn xóa không?");
    }

    function go2Page() {
        var page = document.getElementById("page").value;
        page = ((page > <?php echo $total_pages; ?>) ? <?php echo $total_pages; ?> : ((page < 1) ? 1 : page));
        window.location.href = 'TimKiem.php?key=' + '<?php echo $_SESSION['keysear'] ?>' + '&page=' + page;
    }
</script>
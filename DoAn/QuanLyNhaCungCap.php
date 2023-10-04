<?php
// session_start();
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
        <li><a href="QuanLyHoaDon.php" style="font-size: 2vw;">Quản Lý Nhà Cung Cấp</a></li>
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
    <table style="text-align: center">
      <form>
        <tr>

          <th>Mã Nhà Cung Cấp</th>
          <th>Tên Nhà Cung Cấp</th>
          <th style="width:2500px">Địa Chỉ</th>
          <th>SDT</th>
          <th>Sửa</th>
          <th>Xóa</th>

        </tr>
        <?php

        $query = "SELECT * FROM nhacungcap";
        $result = $conn->query($query);
        while ($dsnhacungcap = $result->fetch_assoc()) { ?>
          <tr>
            <td>
              <?php echo $dsnhacungcap['MaNhaCungCap'] ?>
            </td>
            <td style="width:2500px">
              <?php echo $dsnhacungcap['TenNhaCungCap'] ?>
            </td>
            <td>
              <?php echo $dsnhacungcap['DiaChi'] ?>
            </td>
            <td>
              <?php echo $dsnhacungcap['SoDienThoai'] ?>
            </td>

            <td><a href="SuaNhaCungCap.php?id=<?php echo $dsnhacungcap['MaNhaCungCap'] ?>" <i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td><a onclick="return Del()" href="Xoa.php?hd=xoancc&id=<?php echo $dsnhacungcap['MaNhaCungCap'] ?>" <i class="fa fa-trash" aria-hidden="true"></i></a></td>

          </tr>

        <?php } ?>
        <tr>
          <td><button type="button" style="margin-left: 8vw; margin-top: 12vw"><a href="ThemNhaCungCap.php" style="color:white;">Thêm</a></button></td>



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
</script>
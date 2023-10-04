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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header>
        <div class="logo">
            <ul>
                <li><a href="QuanLyHoaDon.php" style="font-size: 2vw;">Dashboard</a></li>
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

    <main style="background-color: #ccccff;width:1200px;margin-left:300px;margin-top:-610px;height:580px;border-radius:10px;">
        <div style="display: flex;padding-top:25px;padding-left:50px">
            <div >
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                <canvas id="myChart1" style="width:100%;max-width:600px;margin-top:50px"></canvas>

            </div>
            <div >
                <canvas id="myChart2" style="width:100%;max-width:600px;width:600px;padding-top:100px"></canvas>
            </div>
        </div>
    </main>
</body>

</html>
<script>
    function Del() {
        return confirm("Bạn có muốn xóa không?");
    }
</script>
<script>
    // var ctx = document.getElementById("my_chart").getContext("2d");
    var xValues = new Array;
    var yValues = new Array;

    <?php
    $query = "SELECT TenSanPham,SUM(SoLuong) as tong FROM hoadon,sanpham,chitiethoadon WHERE hoadon.MaHoaDon=chitiethoadon.MaHoaDon AND sanpham.MaSanPham=chitiethoadon.MaSanPham AND YEAR(NgayLap)='2023'   GROUP by TenSanPham ORDER BY tong DESC LIMIT 5";
    $result = $conn->query($query);
    while ($ds = $result->fetch_assoc()) { ?>
        xValues.push("<?php echo $ds['TenSanPham'] ?>");
        yValues.push("<?php echo $ds['tong'] ?>");
    <?php
    }
    ?>
    yValues.push(0);
    // var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    // var yValues = [100, 49, 44, 24, 15];
    var barColors = ["red", "green", "blue", "orange", "brown"];

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    ticks: {
                        display: false //this will remove only the label
                    }
                }]
            },
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Sản phẩm bán chạy trong năm 2023"
            },

        }
    });


    var xValues1 = new Array;
    var yValues1 = new Array;

    <?php
    $query1 = "SELECT MONTH(NgayLap) as mon,SUM(SoLuong*DonGia) as tong FROM hoadon,sanpham,chitiethoadon WHERE hoadon.MaHoaDon=chitiethoadon.MaHoaDon AND sanpham.MaSanPham=chitiethoadon.MaSanPham AND YEAR(NgayLap)='2023'  GROUP by mon";
    $result1 = $conn->query($query1);
    while ($ds1 = $result1->fetch_assoc()) { ?>
        xValues1.push("<?php echo 'Tháng ' . $ds1['mon'] ?>");
        yValues1.push("<?php echo $ds1['tong'] ?>");
    <?php
    }
    ?>

    // const xValues1 = ["T1","T2","T3","T4","T5","T6","T7","T8","T9","T10","T11","T12"];
    // const yValues1 = [7,8,8,9,9,9,10,11,14,14,15];

    new Chart("myChart1", {
        type: "line",
        data: {
            labels: xValues1,
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgba(0,0,255,0.1)",
                data: yValues1
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 200000000
                    }
                }],
            },
            title: {
                display: true,
                text: "Doanh thu trong năm 2023"
            }
        }
    });

    var xValues2 = new Array;
    var yValues2 = new Array;
    <?php
    $query2 = "SELECT TenDanhMuc,COUNT(TenDanhMuc) as sl FROM danhmuc,sanpham,chitiethoadon,hoadon WHERE danhmuc.MaDanhMuc=sanpham.MaDanhMuc AND sanpham.MaSanPham=chitiethoadon.MaSanPham AND hoadon.MaHoaDon=chitiethoadon.MaHoaDon AND YEAR(NgayLap)='2023'  GROUP by TenDanhMuc";
    $result2 = $conn->query($query2);
    while ($ds2 = $result2->fetch_assoc()) { ?>
        xValues2.push("<?php echo $ds2['TenDanhMuc'] ?>");
        yValues2.push("<?php echo $ds2['sl'] ?>");
    <?php
    }
    ?>
    // var xValues2 = ["$ds2[]", "France", "Spain", "USA", "Argentina"];
    // var yValues2 = [55, 49, 44, 24, 15];

    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart("myChart2", {
        type: "doughnut",
        data: {
            labels: xValues2,
            datasets: [{
                backgroundColor: barColors,
                data: yValues2
            }]
        },
        options: {
            title: {
                display: true,
                text: "Danh mục bán chạy trong năm 2023"
            }
        }
    });
</script>
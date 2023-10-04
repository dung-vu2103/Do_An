<?php
if(!isset($_SESSION)) 
{ 
      session_start(); 
} 
require_once "db.php";
if(isset($_POST['sbm'])){
  if($_POST['taikhoan'] == "Admin" && $_POST['matkhau']=="admin123"){
    $_SESSION['person']="admin";
    $_SESSION['dn']=true;
    header("Location: index.php");
  }else{
    $dem1=0;
      // Create connection
      $search1="SELECT * FROM khachhang";
      // $search="SELECT TaiKhoan, MatKhau FROM nguoiquanly";//lệnh tạo lệnh sql
      // $giatri=$conn->query($search);//thực hiện lệnh sql
      $giatri1=$conn->query($search1);
      // while($row = $giatri->fetch_assoc()){//xet tung dong trong bang nguoiquanly de doi chiếu tài khoản
        
      //   if($_POST['taikhoan'] == $row["TaiKhoan"] && $_POST['matkhau']==$row["MatKhau"]){
      //     $dem1++;
      //     $_SESSION['dn']=true;
      //     $_SESSION['person']="manager";
      //     header("Location: index.php");
      //   }
      // }
      while($row = $giatri1->fetch_assoc()){//xet tung dong trong bang nguoiquanly de doi chiếu tài khoản

        if($_POST['taikhoan'] == $row["TaiKhoan"] && $_POST['matkhau']==$row["MatKhau"]){
          $dem1++;
          $_SESSION['dn']=true;
          $_SESSION['person']="khachhang";
          $_SESSION['makh']=$row['MaKhachHang'];
          header("Location: index.php");
        }
      }
      if($dem1==0)
        require_once "dangnhap.php";  //load lại trang dăng nhập  
  }
}
  $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> <!-- icon -->
    <link rel="stylesheet" href="dangnhap.css">
<!--    <script src="dangnhap.js"></script>-->


    <!--link bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Đăng Nhập</title>
</head>
<body>
	
    <header>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark" id="hedertop">
            <p>Đăng Nhập</p>
            <a href="#" class="help" title="Clike here">bạn cần giúp đỡ ?</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
              </nav>
              
    </header>
    <main id="main">
                
                    <form id="form" action="dangnhap.php" method="post">
                      <table>
                        <tr>
                       <p class="dangnhap">Đăng Nhập </p> <br>
                      </tr>
                      <tr>
                         <label for="taikhoan">Tài Khoản : </label>
                         <input type="text" id="taikhoan" name="taikhoan" size="60" placeholder=" Enter name" required>
                         <p id="checktaikhoan"></p>
                        </tr>
                       <tr></tr>
                         <label for="matkhau">Mật Khẩu : </label>
                         <input type="password" id="matkhau" name="matkhau" size="60" placeholder=" Enter password"  required>
                         <p id="checkmatkhau"></p>
                      
                        <tr>
                       <pre><a href="dangki.html">Đăng kí</a> |  <a href="#">Quên mật khẩu</a><br></pre> <br><br>
                      </tr>
                      <tr>
                        <button name="sbm" type="submit"  id="button"> Đăng Nhập</button>
                      </tr>
                      </table>
                      </form>
                    
                
    </main>
    <footer>
        
        <div class="mangxahoi">
       <a href="https://www.facebook.com/" target="_blank" title="facebook"><i class="fa-brands fa-facebook aloalo"></i></a>
       <a href="https://www.instagram.com/" target="_blank" title="instargram"><i class="fa-brands fa-instagram aloalo"></i></a>
       <a href="https://www.linkedin.com/" target="_blank" title="linkedin"><i class="fa-brands fa-linkedin aloalo"></i></a>
       <a href="https://discord.com/channels/@me" target="_blank" title="discord"><i class="fa-brands fa-discord aloalo"></i></a>
     </div>
     <div class="noidungchantrang"><p >W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot <p></p>warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy.<p></p>
       Copyright 1999-2022 by Refsnes Data. All Rights Reserved.</p>
     </div>
     
      
      </footer>

</body>
</html>
<?php
   session_start();
   include'../../Admin/Element/Class/taiKhoanCls.php';
   if(isset($_GET['infoUser'])){
      $infoUser = $_GET['infoUser'];
      switch($infoUser){
         case 'addNew':
            $hoVaTen = $_REQUEST['hoVaTen'];
            $soDienThoai = $_REQUEST['soDienThoai'];
            $Email = $_REQUEST['Email'];
            $matKhau = $_REQUEST['matKhau'];
            $taikhoan = new TaiKhoan();
            $kq = $taikhoan->ThemTaiKhoan($hoVaTen, $soDienThoai, $Email, $matKhau);
            header('location:../../index.php?req=DangNhap');
            break;
         case 'CheckLogin':
            $Email = $_REQUEST['Email'];
            $matKhau = $_REQUEST['matKhau'];
            echo $Email . " " . $matKhau;
            $taikhoan = new TaiKhoan();
            $kq = $taikhoan->DangNhapTaiKhoan($Email, $matKhau);
            if($kq){
               session_start();
               $_SESSION['idTaiKhoan'] = $kq->Email;
               $_SESSION['hoVaTen'] = $kq->hoTen;
               // var_dump($_SESSION);
               header('location:../../index.php?req=TaiKhoan');
            }else{
               header('location:../../index.php?req=DangNhap');
            }
            break;
         case 'CheckLogout':
            $_SESSION = array();
            session_destroy();
            // echo "Đã đăng xuất thành công.";
            header('location:../../index.php');
            break;
         case 'ThemDiaChi':
            $Email = $_REQUEST['Email'];
            // echo $Email;
            $hoTen = $_REQUEST['hoTen'];
            $sdt = $_REQUEST['soDienThoai'];
            $dc = $_REQUEST['diaChi'];
            if(isset($_REQUEST['macDinh'])){
               $macDinh = $_REQUEST['macDinh'];
            }else{
               $macDinh = 'off';
            }
            // echo $hoTen . "<br>";s
            // echo $sdt . "<br>";
            // echo $dc . "<br>";
            // echo $macDinh . "<br>";
            $taikhoan = new TaiKhoan();
            $kq = $taikhoan->ThemDiaChi($Email,$hoTen, $sdt, $dc,  $macDinh);
            header('location:../../index.php?req=DiaChiTaiKhoan');
            break;
         case 'XoaDiaChi';
            $idDiaChi = $_REQUEST['idDiaChi'];
            // echo $idDiaChi;
            $taikhoan = new TaiKhoan();
            $kq = $taikhoan->XoaDiaChi($idDiaChi);
            header('location:../../index.php?req=DiaChiTaiKhoan');
            break;
         case 'CapNhatDiaChi':
            $idDiaChi = $_POST['idDiaChi'];
            $hoTen = $_POST['hoTen']; // Họ tên
            $soDienThoai = $_POST['soDienThoai'];
            $diaChi = $_POST['diaChi'];
            $macDinh = isset($_POST['macDinh']) ? 'on' : 'off';
            $email = $_POST['Email'];
            $taikhoan = new TaiKhoan();
            // Gọi hàm với các giá trị đúng
            $kq = $taikhoan->CapNhatDiaChi($idDiaChi, $hoTen, $soDienThoai, $diaChi, $macDinh, $email);
            header('location:../../index.php?req=DiaChiTaiKhoan');
            break;
      }
   }
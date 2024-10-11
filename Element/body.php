<?php
      if(isset($_GET['req'])){
         $reqAction = $_GET['req'];
         switch($reqAction){
            case 'BaoHanh':
               include'./Pages/BaoHanh.php';
               break;
            case 'CuaHang':
               include'./Pages/HeThongCuaHang.php';
               break;
            case 'SuDung':
               include'./Pages/HuongDanSuDung.php';
               break;
            case 'ThanhVien':
               include'./Pages/ChinhSachThanhVien.php';
               break;
            case 'SanPham':
               include'./Pages/SanPham/SanPham.php';
               break;
            case 'GioHang':
               include'./Pages/Cart/GioHang.php';
               break;
            case 'ThanhToan':
               include'./Pages/ThanhToan/ThanhToan.php';
               break;
            case 'ThanhToanMua':
               include'./Pages/ThanhToan/ThanhToanMua.php';
               break;
            case 'DangNhap':
               include'./Pages/TaiKhoan/DangNhap.php';
               break;
            case 'DangKy':
               include'./Pages/TaiKhoan/DangKy.php';
               break;
            case 'TaiKhoan':
               include'./Pages/TaiKhoan/TaiKhoan.php';
               break;
            case 'DiaChiTaiKhoan':
               include'./Pages/TaiKhoan/TaiKhoanDiaChi.php';
               break;
            case 'CapNhatDiaChiTaiKhoan':
               include'./Pages/TaiKhoan/DiaChiCapNhat.php';
               break;
            case 'TatCaSanPham':
               include'./Pages/SanPham/TatCaSanPham.php';
               break;
            case 'TatCaSanPhamTheoLoaiHang':
               include'./Pages/SanPham/TatCaSanPhamTheoLoaiHang.php';
               break;
         }
      }else{
         ?>
         <div class="body">
         <?php
            include'./Element/Body/session_1.php';
            include'./Element/Body/session_2.php';
            include'./Element/Body/session_3.php';
            include'./Element/Body/session_4.php';
            include'./Element/Body/session_5.php';
            include'./Element/Body/session_6.php';
      }
         ?> 
         </div>
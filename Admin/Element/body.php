<?php
   if(isset($_GET['reqAdmin'])){
      $request = $_GET['reqAdmin'];
      switch($request){
         case "LoaiHang":
            require './Element/LoaiHang/LoaiHangView.php';
            break;
         case "updateLoaiHang":
            require './Element/LoaiHang/updateLoaiHang.php';
            break;
         case "HangHoa":
            require './Element/HangHoa/HangHoaView.php';
            break;
         case "updateHangHoa":
            require './Element/HangHoa/updateHangHoa.php';
            break;
         case "DanhMuc":
            require './Element/DanhMuc/DanhMucView.php';
            break;
         case "updateDanhMuc":
            require './Element/DanhMuc/updateDanhMuc.php';
            break;
         case "HinhAnhMoTa":
            require './Element/HangHoa/AnhMoTa.php';
            break;
         case "HinhAnhMoTaUpdate":
            require './Element/HangHoa/AnhMoTaUpdate.php';
            break;
         case 'HoaDon':
            require './Element/HoaDon/hoaDon.php';
            break;
         case 'TaiKhoan':
            require './Element/TaiKhoan/TaiKhoanView.php';
            break;
         case 'LoaiHangCoHangHoa':
            require './Element/LoaiHang/ViewLoaiHangCoHangHoa.php';
            break;
      }
   }else{
      require './Element/default.php';
   }
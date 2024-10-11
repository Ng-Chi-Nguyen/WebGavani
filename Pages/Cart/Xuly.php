<?php
   include'../../Admin/Element/Class/gioHangCls.php';
   if(isset($_GET['infoSp'])){
      $infoSp = $_GET['infoSp'];
      switch($infoSp){
         case 'addNew':
            $idSanPham = $_REQUEST['idSanPham'];
            $tenSanPham = $_REQUEST['tenSanPham'];
            $gia = $_REQUEST['gia'];
            $soLuong = $_REQUEST['soLuong'];
            $size = $_REQUEST['size'];
            $anhSanPham = $_REQUEST['tenHinhAnh'];
            //  echo "Id " . $idSanPham . "<br>";
            //  echo "ten ". $tenSanPham . "<br>";
            //  echo "gia ". $gia * $soLuong . "<br>";
            //  echo "soluong ". $soLuong . "<br>";
            //  echo "size ". $size . "<br>";
            //  echo "anh ". $anhSanPham . "<br>";
            $GH = new GioHang();
            $kq = $GH->themVaoGio($idSanPham, $tenSanPham, $gia * $soLuong, $soLuong, $size, $anhSanPham);
            header('location:../../index.php?req=GioHang');
            break;
         case 'updateSoLuong':
            $action = isset($_POST['action']) ? $_POST['action'] : '';
            $idSanPham = isset($_GET['idSanPham']) ? intval($_GET['idSanPham']) : 0;
            $soLuong = isset($_POST['soLuong']) ? intval($_POST['soLuong']) : 0;
            
            if ($action === 'decrease') {
                $soLuong_Up = $soLuong - 1;
            } elseif ($action === 'increase') {
                $soLuong_Up = $soLuong + 1;
            } else {
                $soLuong_Up = $soLuong;
            }
            $soLuong_Up = max(0, $soLuong_Up);
            $GH = new GioHang();
            $kq = $GH->updateSoLuong($idSanPham, $soLuong_Up);
            header('Location: ../../index.php?req=GioHang');
            break;
         case 'delete':
            $idSanPhamCuaGioHang = $_REQUEST['idSanPhamCuaGioHang'];
            // echo $idSanPhamCuaGioHang;
            $GH = new GioHang();
            $kq = $GH->deleteGioHang($idSanPhamCuaGioHang);
            header('Location: ../../index.php?req=GioHang');
            break;
      }
   }
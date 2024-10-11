<?php
   include'../Class/loaiHangCls.php';

   if(isset($_GET['reqact'])){
      $requsetAction = $_GET['reqact'];
      switch($requsetAction){
         case 'addNew':
            $tenLoaiHang = $_REQUEST['tenLoaiHang'];
            $idDanhMuc = $_REQUEST['idDanhMuc'];
            // echo $tenLoaiHang . "<br>" . $idDanhMuc;
            $LH = new loaiHang();
            $LH->insertLoaiHang($tenLoaiHang, $idDanhMuc);
            header('location:../../index.php?reqAdmin=LoaiHang');
            break;
         case 'update':
            $idLoaiHang = $_REQUEST['idLoaiHang'];
            $tenLoaiHang = $_REQUEST['tenLoaiHang'];
            $idDanhMuc = $_REQUEST['idDanhMuc'];
            // echo $idLoaiHang . " " . $tenLoaiHang . " " . $idDanhMuc;
            $LH = new loaiHang();
            $LH->updateLoaiHang($tenLoaiHang, $idLoaiHang, $idDanhMuc);
            header('location:../../index.php?reqAdmin=LoaiHang');
            break;
         case 'delete':
            $idLoaiHang = $_REQUEST['idLoaiHang'];
            // echo $idLoaiHang;
            $LH = new loaiHang();
            $LH->deleteLoaiHang($idLoaiHang);
            header('location:../../index.php?reqAdmin=LoaiHang');
            break;
      }
   }
<?php
   include'../Class/danhMucCls.php';
   if(isset($_GET['reqact'])){
      $requsetAction = $_GET['reqact'];
      switch($requsetAction){
         case 'addNew':
            $tenDanhMuc = $_REQUEST['tenDanhMuc'];
            // echo $tenDanhMuc;
            $DM = new DanhMuc();
            $kq = $DM->insertDanhMuc($tenDanhMuc);
            header('location:../../index.php?reqAdmin=DanhMuc');
            break;
         case 'update':
            $idDanhMuc = $_REQUEST['idDanhMuc'];
            $tenDanhMuc = $_REQUEST['tenDanhMuc'];
            $DM = new DanhMuc();
            $kq = $DM->updateDanhMuc($tenDanhMuc, $idDanhMuc);
            header('location:../../index.php?reqAdmin=DanhMuc');
            break;
         case 'delete':
            $idDanhMuc = $_REQUEST['idDanhMuc'];
            $DM = new DanhMuc();
            $kq = $DM->deleteDanhMuc($idDanhMuc);
            if($kq){
               header('location:../../index.php?reqAdmin=DanhMuc');
            }else{
               header('location:../../index.php?reqAdmin=DanhMuc&notOK');
            }
            break;
      }
   }
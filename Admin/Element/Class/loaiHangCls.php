<?php
   require_once __DIR__ . '/../mod/database.php';
   class loaiHang extends Database{
      public function insertLoaiHang($tenLoaiHang, $idDanhMuc){
         $sql = "INSERT INTO loaihang(tenLoaiHang, idDanhMuc) VALUE (?, ?)";
         $data = array($tenLoaiHang, $idDanhMuc);
         $add = $this->connect->prepare($sql);
         $add->execute($data);
         return $add->rowCount();
      }
      public function showLoaiHang(){
         $sql ="SELECT * FROM loaiHang";
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute();
         return $getAll->fetchAll();
      }
      public function showDanhMuc(){
         $sql ="SELECT * FROM danhmuc";
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute();
         return $getAll->fetchAll();
      }
      public function updateLoaiHang($tenLoaiHang, $idLoaiHang, $idDanhMuc){
         $sql = "UPDATE loaihang SET tenLoaiHang = ?, idDanhMuc = ? WHERE idLoaiHang = ?";
         $data = array($tenLoaiHang, $idDanhMuc, $idLoaiHang);
         $update = $this->connect->prepare($sql);
         $update->execute($data);
         return $update->rowCount();
      }
      public function IdLoaiHang($idLoaiHang){
         $sql = "SELECT * FROM loaiHang WHERE idLoaiHang = ?";
         $data = array($idLoaiHang);
         $getOne = $this->connect->prepare($sql);
         $getOne->setFetchMode(PDO::FETCH_OBJ);
         $getOne->execute($data);
         return $getOne->fetch();
      }
      public function deleteLoaiHang($idLoaiHang){
         $sql = "DELETE FROM loaiHang WHERE idLoaiHang = ?";
         $data = array($idLoaiHang);
         $del = $this->connect->prepare($sql);
         $del->execute($data);
         return $del->rowCount();
      }
   }
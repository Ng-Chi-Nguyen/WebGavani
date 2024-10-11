<?php
   require_once __DIR__ . '/../mod/database.php';
   class DanhMuc extends Database{
      public function insertDanhMuc($tenDanhMuc){
         $sql = "INSERT INTO danhmuc(tenDanhMuc) VALUE (?)";
         $data = array($tenDanhMuc);
         $add = $this->connect->prepare($sql);
         $add->execute($data);
         return $add->rowCount();
      }
      public function showDanhMuc(){
         $sql ="SELECT * FROM danhmuc";
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute();
         return $getAll->fetchAll();
      }
      public function showLoaiHang(){
         $sql ="SELECT * FROM loaiHang";
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute();
         return $getAll->fetchAll();
      }
      public function updateDanhMuc($tenDanhMuc, $idDanhMuc){
         $sql = "UPDATE danhmuc SET tenDanhMuc = ? WHERE idDanhMuc = ?";
         $data = array($tenDanhMuc, $idDanhMuc);
         $update = $this->connect->prepare($sql);
         $update->execute($data);
         return $update->rowCount();
      }
      public function IdDanhMuc($idDanhMuc){
         $sql = "SELECT * FROM danhmuc WHERE idDanhMuc = ?";
         $data = array($idDanhMuc);
         $getOne = $this->connect->prepare($sql);
         $getOne->setFetchMode(PDO::FETCH_OBJ);
         $getOne->execute($data);
         return $getOne->fetch();
      }
      public function deleteDanhMuc($idDanhMuc){
         $sql = "DELETE FROM danhmuc WHERE idDanhMuc = ?";
         $data = array($idDanhMuc);
         $del = $this->connect->prepare($sql);
         $del->execute($data);
         return $del->rowCount();
      }
      public function getLoaiHangByDanhMuc($idDanhMuc) {
         $sql = "SELECT * FROM loaihang WHERE idDanhMuc = ?";
         $data = array($idDanhMuc);
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute($data);
         return $getAll->fetchAll(); // Sử dụng fetchAll để lấy tất cả các bản ghi
     }
   }
<?php
   require_once __DIR__ . '/../mod/database.php';
   class HangHoa extends Database{
      public function insertHangHoa($tenHangHoa, $idLoaiHang, $gia, $giaMoi, $moTa, $tenHinhAnh, $hinhAnh){
         $sql = "INSERT INTO hanghoa(tenHangHoa, idLoaiHang, gia, giaMoi, moTa, tenHinhAnh, hinhAnh) VALUE (?,?,?,?,?,?,?)";
         $data = array($tenHangHoa, $idLoaiHang, $gia, $giaMoi, $moTa, $tenHinhAnh, $hinhAnh);
         $add = $this->connect->prepare($sql);
         $add->execute($data);
         return $add->rowCount();
      }
      public function insertAnhMoTa($idHangHoa, $hinhAnhMoTa){
         $sql = "INSERT INTO hinhanhmota(idHangHoa, hinhAnhMoTa) VALUE (?,?)";
         $data = array($idHangHoa, $hinhAnhMoTa);
         $add = $this->connect->prepare($sql);
         $add->execute($data);
         return $add->rowCount();
      }
      public function showAnhMoTa($idHangHoa){
         $sql = "SELECT * FROM hinhanhmota WHERE idHangHoa = ?";
         $data = array($idHangHoa);
         $hetAll = $this->connect->prepare($sql);
         $hetAll->execute($data);
         return $hetAll->fetchAll(PDO::FETCH_OBJ); // Đảm bảo trả về mảng các đối tượng
      }
      public function deleteAnhMoTa($idHangHoa) {
         $sql = "DELETE FROM hinhanhmota WHERE idHangHoa = ?";
         $data = array($idHangHoa);
         $delete = $this->connect->prepare($sql);
         $delete->execute($data);
         return $delete->rowCount();
     }
     public function updateAnhMoTa($hinhAnhMoTa, $idHangHoa) {
      $sql = "UPDATE hinhanhmota SET hinhAnhMoTa = ? WHERE idHangHoa = ?";
      $data = array($hinhAnhMoTa, $idHangHoa); // Truyền cả hai tham số vào mảng
      $update = $this->connect->prepare($sql);
      $update->execute($data);
      return $update->rowCount();
  }
      public function showHangHoa(){
         $sql = "SELECT * FROM hanghoa";
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
      
      public function showLoaiHang(){
         $sql ="SELECT * FROM loaiHang";
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute();
         return $getAll->fetchAll();
      }
      public function IdHangHoa($idHangHoa){
         $sql = "SELECT * FROM hanghoa WHERE idHangHoa = ?";
         $data = array($idHangHoa);
         $getOne = $this->connect->prepare($sql);
         $getOne->setFetchMode(PDO::FETCH_OBJ);
         $getOne->execute($data);
         return $getOne->fetch();
      }
      public function IdLoaiHang($idLoaiHang){
         $sql = "SELECT * FROM loaiHang WHERE idLoaiHang = ?";
         $data = array($idLoaiHang);
         $getOne = $this->connect->prepare($sql);
         $getOne->setFetchMode(PDO::FETCH_OBJ);
         $getOne->execute($data);
         return $getOne->fetch();
      }
      public function getHangHoaByLoaiHang($idLoaiHang) {
         $sql = "SELECT * FROM hanghoa WHERE idLoaiHang = ?";
         $data = array($idLoaiHang);
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute($data);
         return $getAll->fetchAll(); // Sử dụng fetchAll để lấy tất cả các bản ghi
      }
      public function deleteHangHoa($idHangHoa){
         $sql = "DELETE FROM hangHoa WHERE idHangHoa = ?";
         $data = array($idHangHoa);
         $del = $this->connect->prepare($sql);
         $del->execute($data);
         return $del->rowCount();
      }
      public function updateHangHoa($tenHangHoa, $gia, $giaMoi, $moTa, $tenHinhAnh, $hinhAnh, $idLoaiHang, $idHangHoa){
         $sql = "UPDATE hangHoa SET tenHangHoa = ?, gia = ?, giaMoi = ?, moTa = ?, tenHinhAnh = ?, hinhAnh = ?, idLoaiHang = ? WHERE idHangHoa = ?";
         $data = array($tenHangHoa, $gia, $giaMoi, $moTa, $tenHinhAnh, $hinhAnh, $idLoaiHang, $idHangHoa);
         $update = $this->connect->prepare($sql);
         $update->execute($data);
         return $update->rowCount();
      }
      
}
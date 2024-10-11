<?php
   require_once __DIR__ . '/../mod/database.php';
   class DiaChi extends Database{
      public function showDiaChiTinh(){
         $sql ="SELECT * FROM tinh";
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute();
         return $getAll->fetchAll();
      }
      public function showDiaChiHuyen(){
         $sql ="SELECT * FROM huyen";
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute();
         return $getAll->fetchAll();
      }
      public function showDiaChiQuanHuyenTheoTinhTP($id_Tinh) {
         $sql = "SELECT * FROM huyen WHERE id_Tinh = ?";
         $data = array($id_Tinh);
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute($data);
         return $getAll->fetchAll();  // Trả về tất cả các huyện/quận
      }
      public function showDiaChiXaPhuongTheoHuyenQuan($id_Huyen) {
         $sql = "SELECT * FROM xa WHERE id_huyen = ?";
         $data = array($id_Huyen);
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute($data);
         return $getAll->fetchAll();  // Trả về tất cả các huyện/quận
      }
      public function showDiaChiXa(){
         $sql ="SELECT * FROM xa";
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
      public function showHoaDonTheoEmail($Email){
         $sql = "SELECT * FROM hoadon WHERE Email = ?";
         $data = array($Email);
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute($data);
         return $getAll->fetchAll(); // Lấy tất cả các bản ghi có email này
     }
     public function IdTaiKhoan($Email){
      $sql = "SELECT * FROM taikhoan WHERE Email = ?";
      $data = array($Email);
      $getOne = $this->connect->prepare($sql);
      $getOne->setFetchMode(PDO::FETCH_OBJ);
      $getOne->execute($data);
      return $getOne->fetch();
   }
   }
   function TenDonViHC($DviHC){
      switch($DviHC){
         case '1':
         case '3':
         case '4':
            $DviHC = "Thành phố";
            break;
         case '2':
            $DviHC = "Tỉnh";
            break;
         case '5':
            $DviHC = "Quận";
            break;
         case '6':
            $DviHC = "Thị xã";
            break;
         case '7':
            $DviHC = "Huyện";
            break;
         case '8':
            $DviHC = "Phường";
            break;
         case '9':
            $DviHC = "Thị trấn";
            break;
         case '10':
            $DviHC = "Xã";
            break;
      }
      return $DviHC;
   }
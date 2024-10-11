<?php
   require_once __DIR__ . '/../mod/database.php';
   class TaiKhoan extends Database{
      public function ThemTaiKhoan($hoTen, $soDienThoai, $Email, $matKhau){
         $sql = "INSERT INTO taikhoan(hoTen, soDienThoai, Email, matKhau) VALUE (?, ?, ?, ?)";
         $data = array($hoTen, $soDienThoai, $Email, $matKhau);
         $add = $this->connect->prepare($sql);
         $add->execute($data);
         return $add->rowCount();
      }
      public function ThemDiaChi($Email, $hoTen, $soDienThoai, $diaChi, $macDinh) {
         // Nếu địa chỉ này được chọn làm mặc định (macDinh = 'on')
         if ($macDinh === 'on') {
             // Cập nhật tất cả các địa chỉ của tài khoản này (dựa vào Email) thành 'off'
             $sqlUpdateAll = "UPDATE diachi SET macDinh = 'off' WHERE Email = ?";
             $stmt = $this->connect->prepare($sqlUpdateAll);
             $stmt->execute([$Email]);
         }
     
         // Thêm địa chỉ mới
         $sql = "INSERT INTO diachi (Email, hoTen, soDienThoai, diaChi, macDinh) VALUES (?, ?, ?, ?, ?)";
         $data = array($Email, $hoTen, $soDienThoai, $diaChi, $macDinh);
         $add = $this->connect->prepare($sql);
         $add->execute($data);
         return $add->rowCount();
     }
      public function DangNhapTaiKhoan($Email, $matKhau){
         $sql = "SELECT * FROM taikhoan WHERE Email = ?";
         $select = $this->connect->prepare($sql);
         $select->setFetchMode(PDO::FETCH_OBJ);
         $select->execute([$Email]);
         $user = $select->fetch();
         if ($user && $user->matKhau === $matKhau) {
            return $user;
         } else {
            return false;
      }
         }
      public function showTaiKhoan(){
         $sql ="SELECT * FROM taikhoan";
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute();
         return $getAll->fetchAll();
      }
      public function TaiKhoanTheoEmail($Email){
         $sql = "SELECT * FROM taikhoan WHERE Email = ?";
         $data = array($Email);
         $getOne = $this->connect->prepare($sql);
         $getOne->setFetchMode(PDO::FETCH_OBJ);
         $getOne->execute($data);
         return $getOne->fetch();
      }
      public function TaiKhoanTheoId($idTaiKhoan){
         $sql = "SELECT * FROM taikhoan WHERE idTaiKhoan = ?";
         $data = array($idTaiKhoan);
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
      public function showDiaChiTheoEmail($Email){
         $sql = "SELECT * FROM diachi WHERE Email = ?";
         $data = array($Email);
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute($data);
         return $getAll->fetchAll(); // Lấy tất cả các bản ghi có email này
      }
      public function showDiaChiMacDinh($Email){
         $sql = "SELECT * FROM diachi WHERE Email = ? AND macDinh = 'on'";
         $stmt = $this->connect->prepare($sql);
         $stmt->execute([$Email]);
         return $stmt->fetchAll();
      }
      public function showDiaChiCuaEmailTheoId($idDiaChi){
         $sql = "SELECT * FROM diachi WHERE idDiaChi = ?";
         $data = array($idDiaChi);
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute($data);
         return $getAll->fetchAll(); // Lấy tất cả các bản ghi có email này
      }
      public function getLoaiHangByDanhMuc($idDanhMuc) {
         $sql = "SELECT * FROM loaihang WHERE idDanhMuc = ?";
         $data = array($idDanhMuc);
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute($data);
         return $getAll->fetchAll(); // Sử dụng fetchAll để lấy tất cả các bản ghi
      }
      public function XoaDiaChi($idDiaChi){
         $sql = "DELETE FROM diachi WHERE idDiaChi = ?";
         $data = array($idDiaChi);
         $del = $this->connect->prepare($sql);
         $del->execute($data);
         return $del->rowCount();
      }
      public function CapNhatDiaChi($idDiaChi, $hoTen, $soDienThoai, $diaChi, $macDinh, $email) {
         // Nếu địa chỉ này được chọn làm mặc định, cập nhật tất cả các địa chỉ khác của email này thành 'off'
         if ($macDinh === 'on') {
             $sqlUpdateAll = "UPDATE diachi SET macDinh = 'off' WHERE email = ?";
             $stmt = $this->connect->prepare($sqlUpdateAll);
             $stmt->execute([$email]);
         }
     
         // Cập nhật địa chỉ hiện tại
         $sql = "UPDATE diachi SET hoTen = ?, soDienThoai = ?, diaChi = ?, macDinh = ? WHERE idDiaChi = ?";
         $data = array($hoTen, $soDienThoai, $diaChi, $macDinh, $idDiaChi);
         $update = $this->connect->prepare($sql);
         $update->execute($data);
     
         return $update->rowCount();
      }
}
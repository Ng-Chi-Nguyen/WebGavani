<?php
   require_once __DIR__ . '/../mod/database.php';
   class GioHang extends Database{
      public function themVaoGio($idSanPham, $tenSanPham, $gia, $soLuong, $size, $anhSanPham) {
         // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
         $sqlCheck = "SELECT soLuong FROM giohang WHERE idSanPham = ? AND size = ?";
         $stmtCheck = $this->connect->prepare($sqlCheck);
         $stmtCheck->execute([$idSanPham, $size]);
         $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);
     
         if ($result) {
             // Nếu sản phẩm đã tồn tại, cập nhật số lượng
             $soLuongHienTai = $result['soLuong'];
             $soLuongMoi = $soLuongHienTai + $soLuong;
     
             $sqlUpdate = "UPDATE giohang SET soLuong = ? WHERE idSanPham = ? AND size = ?";
             $stmtUpdate = $this->connect->prepare($sqlUpdate);
             $stmtUpdate->execute([$soLuongMoi, $idSanPham, $size]);
     
             return $stmtUpdate->rowCount();
         } else {
             // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
             $sqlInsert = "INSERT INTO giohang(idSanPham, tenSanPham, gia, soLuong, size, anhSanPham) VALUES (?,?,?,?,?,?)";
             $data = array($idSanPham, $tenSanPham, $gia, $soLuong, $size, $anhSanPham);
             $add = $this->connect->prepare($sqlInsert);
             $add->execute($data);
     
             return $add->rowCount();
         }
     }
     public function showGioHang(){
      $sql = "SELECT * FROM giohang";
      $getAll = $this->connect->prepare($sql);
      $getAll->setFetchMode(PDO::FETCH_OBJ);
      $getAll->execute();
      return $getAll->fetchAll();
     }
     public function updateSoLuong($idSanPham ,$soLuong){
      $sql = "UPDATE giohang SET soLuong = ? WHERE idSanPham = ?";
      $data = array($idSanPham ,$soLuong);
      $update = $this->connect->prepare($sql);
      $update->execute($data);
      return $update->rowCount();
     }
     public function deleteGioHang($idSanPhamCuaGioHang){
      $sql = "DELETE FROM giohang WHERE idSanPhamCuaGioHang = ?";
      $data = array($idSanPhamCuaGioHang);
      $del = $this->connect->prepare($sql);
      $del->execute($data);
      return $del->rowCount();
    }
    public function IdGioHang($idSanPhamCuaGioHang){
        $sql = "SELECT * FROM giohang WHERE idSanPhamCuaGioHang = ?";
        $data = array($idSanPhamCuaGioHang);
        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);
        return $getOne->fetch();
     }
}
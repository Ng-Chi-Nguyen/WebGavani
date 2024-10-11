<?php
   require_once __DIR__ . '/../mod/database.php';
   class HoaDon extends Database{
      public function NhapHoaDon($tenKH, $Email, $soDienThoai, $idSanPham, $tenSanPham, $size, $soLuong, $gia, $phuongThucThanhToan, $NgayDat, $ThoiGianThanhToan, $Tinh, $Huyen, $Xa, $Dc_CuThe){
         $sql = "INSERT INTO hoadon(tenKh, Email, soDienThoai, idSanPham, tenSanPham, size, soLuong, gia, phuongThucThanhToan, ngayDat, thoiGianThanhToan, Tinh, Huyen, Xa, Dc_CuThe) VALUE (?,?,?,?,?,?,?,?,?,?,?,?, ?, ?, ?)";
         $data = array($tenKH, $Email, $soDienThoai, $idSanPham, $tenSanPham, $size, $soLuong, $gia, $phuongThucThanhToan, $NgayDat, $ThoiGianThanhToan, $Tinh, $Huyen, $Xa, $Dc_CuThe);
         $add = $this->connect->prepare($sql);
         $add->execute($data);
         return $add->rowCount();
      }
      public function deleteGioHang($idSanPhamCuaGioHang){
         $sql = "DELETE FROM giohang WHERE idSanPhamCuaGioHang = ?";
         $data = array($idSanPhamCuaGioHang);
         $del = $this->connect->prepare($sql);
         $del->execute($data);
         return $del->rowCount();
      }
      public function showTenDiaChiTinh($id_Tinh){
         $sql = "SELECT * FROM tinh WHERE id_Tinh = ?";
         $data = array($id_Tinh);
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute($data);
         return $getAll->fetch();
      }
      public function showTenDiaChiHuyen($id_Huyen){
         $sql = "SELECT * FROM huyen WHERE id_Huyen = ?";
         $data = array($id_Huyen);
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute($data);
         return $getAll->fetch();
      }
      public function showTenDiaChiXa($id_Xa){
         $sql = "SELECT * FROM xa WHERE id_Xa = ?";
         $data = array($id_Xa);
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute($data);
         return $getAll->fetch();
      }
      public function InHoaDon(){
         $sql ="SELECT * FROM danhmuc";
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute();
         return $getAll->fetchAll();
      }
      public function showHoaDonSapXep(){
         $sql ="SELECT * FROM hoadon ORDER BY soDienThoai, Tinh, Huyen, Xa, Dc_CuThe";
         $getAll = $this->connect->prepare($sql);
         $getAll->setFetchMode(PDO::FETCH_OBJ);
         $getAll->execute();
         return $getAll->fetchAll();
      }
      public function updateQuaTrinhGiaoHang($idHoaDon, $capNhatDonHang) {
         // Chỉ cập nhật capNhatDonHang mà không thay đổi idHoaDon
         $sql = "UPDATE hoadon SET capNhatDonHang = ? WHERE idHoaDon = ?";
         $data = array($capNhatDonHang, $idHoaDon); // Đảm bảo thứ tự tham số đúng
         $update = $this->connect->prepare($sql);
         $update->execute($data);
         return $update->rowCount();
     }
      public function NhapNhieuSanPham($hoaDonData) {
         $sql = "INSERT INTO hoadon (tenKH, Email, soDienThoai, idSanPham, tenSanPham, size, soLuong, gia, phuongThucThanhToan, ngayDat, thoiGianThanhToan, Tinh, Huyen, Xa, Dc_CuThe) VALUES ";
         $insertValues = [];
         $data = [];
         foreach ($hoaDonData as $sanPham) {
             $insertValues[] = "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
             $data = array_merge($data, [
                 $sanPham['tenKH'], 
                 $sanPham['Email'], 
                 $sanPham['soDienThoai'], 
                 $sanPham['idSanPham'], 
                 $sanPham['tenSanPham'], 
                 $sanPham['size'], 
                 $sanPham['soLuong'], 
                 $sanPham['gia'], 
                 $sanPham['phuongThucThanhToan'], 
                 $sanPham['ngayDat'],
                 $sanPham['thoiGianThanhToan'],
                 $sanPham['Tinh'],
                 $sanPham['Huyen'],
                 $sanPham['Xa'],
                 $sanPham['Dc_CuThe']
             ]);
         }
         $sql .= implode(", ", $insertValues);
         $add = $this->connect->prepare($sql);
         $add->execute($data);
         return $add->rowCount();
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
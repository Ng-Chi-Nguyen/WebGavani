<h2>Các đơn hàng đã đặt</h2>
<?php
    include'../Class/hoaDonCls.php';
   if(isset($_REQUEST['reqact'])){
      $requsetAction = $_GET['reqact'];
      switch($requsetAction){
        case 'capNhatQuaTrinhGiaHang':
            $idHoaDon = $_REQUEST['idHoaDon'];
            $capNhatDonHang = $_REQUEST['capNhatDonHang'];
            // echo $idHoaDon . "<br>";
            // echo $capNhatDonHang . "<br>";
            $hoaDon = new HoaDon();
            $kq = $hoaDon->updateQuaTrinhGiaoHang($idHoaDon, $capNhatDonHang);
            header("location:../../index.php?reqAdmin=HoaDon");
            break;
        case 'addNew':
            ob_start();
            $sanpham = $_REQUEST['sanpham'];
            if($sanpham != 0){
                $tenKH = $_POST['hoTen'];
                $Email = $_POST['email'];
                $soDienThoai = $_POST['phone'];
        
                $idSanPham = $_POST['idSanPhamCuaGioHang'];
                $tenSanPham = $_POST['tenSanPham'];
                $soLuong = $_POST['soLuong'];
                $size = $_POST['size'];
                $gia = $_POST['gia'];
                $phuongThucThanhToan = $_POST['phuongThucThanhToan'];
                
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $NgayDat = date('d/m/Y');
                // echo $ngayHienTai;
                if($phuongThucThanhToan !== 'Thanh toán khi nhận hàng'){
                    $ThoiGianThanhToan = date('H:i:s');
                    $gia = '0';
                } else {
                    $ThoiGianThanhToan = 'Chưa thanh toán';
                }
                // echo $thoiGianHienTai;
                $id_Tinh = $_POST['id_Tinh'];
                $id_Huyen = $_POST['id_Huyen'];
                $id_Xa = $_POST['id_Xa'];
        
                $HoaDon = new HoaDon();
                $tenTinh = $HoaDon->showTenDiaChiTinh($id_Tinh);
                $tenHuyen = $HoaDon->showTenDiaChiHuyen($id_Huyen);
                $tenXa = $HoaDon->showTenDiaChiXa($id_Xa);
                $DonViHC_1 = TenDonViHC($tenTinh->id_HanhChinh);
                $DonViHC_2 = TenDonViHC($tenHuyen->id_HanhChinh);
                $DonViHC_3 = TenDonViHC($tenXa->id_HanhChinh);
                $Tinh = $DonViHC_1 . " " . $tenTinh->name;
                $Huyen = $DonViHC_2 . " " . $tenHuyen->name;
                $Xa = $DonViHC_3 . " " . $tenXa->name;
                $Dc_CuThe = $_POST['DiaChiCuThe'];
                // echo $diaChi;
                $kq = $HoaDon->NhapHoaDon($tenKH, $Email, $soDienThoai, $idSanPham, $tenSanPham, $size, $soLuong, $gia, $phuongThucThanhToan, $NgayDat, $ThoiGianThanhToan, $Tinh, $Huyen, $Xa, $Dc_CuThe);
                $del = $HoaDon->deleteGioHang($idSanPham);
                    
                ob_end_flush();
                header("location:../../../index.php?req=TaiKhoan");
                exit();
            }else{
                $tenKH = $_POST['hoTen'];
                $Email = $_POST['email'];
                $soDienThoai = $_POST['phone'];
                 
                $idSanPhamCuaGioHangAll = $_POST['idSanPhamCuaGioHangAll'];
                $tenSanPhamAll = $_POST['tenSanPhamAll'];
                $soLuongAll = $_POST['soLuongAll'];
                $sizeAll = $_POST['sizeAll'];
                $giaAll = $_POST['giaAll'];
        
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                // $ngayDat = date('d/m/Y');
                // echo $ngayHienTai;
                // if($phuongThucThanhToan !== 'Thanh toán khi nhận hàng'){
                //     $thoiGianThanhToan = date('H:i:s');
                //     $gia = '0';
                // } else {
                //     $thoiGianThanhToan = 'Chưa thanh toán';
                // }
        
                $id_Tinh = $_POST['id_Tinh'];
                $id_Huyen = $_POST['id_Huyen'];
                $id_Xa = $_POST['id_Xa'];
                $phuongThucThanhToan = $_POST['phuongThucThanhToan'];
                $Dc_CuThe = $_POST['DiaChiCuThe'];
                 
                 // Lấy thông tin địa chỉ
                $HoaDon = new HoaDon();
                $tenTinh = $HoaDon->showTenDiaChiTinh($id_Tinh);
                $tenHuyen = $HoaDon->showTenDiaChiHuyen($id_Huyen);
                $tenXa = $HoaDon->showTenDiaChiXa($id_Xa);
                 
                $DonViHC_1 = TenDonViHC($tenTinh->id_HanhChinh);
                $DonViHC_2 = TenDonViHC($tenHuyen->id_HanhChinh);
                $DonViHC_3 = TenDonViHC($tenXa->id_HanhChinh);
                 
                $Tinh = $DonViHC_1 . " " . $tenTinh->name;
                $Huyen = $DonViHC_2 . " " . $tenHuyen->name;
                $Xa = $DonViHC_3 . " " . $tenXa->name;
                 
                 // Chuẩn bị mảng dữ liệu hóa đơn
                $hoaDonData = [];
                 
                foreach ($idSanPhamCuaGioHangAll as $key => $idSanPham) {
                    $tenSanPham = $tenSanPhamAll[$key];
                    $soLuong = $soLuongAll[$key];
                    $size = $sizeAll[$key];
                    $gia = $giaAll[$key];
                    $ngayDat = date('d/m/Y');
                    if($phuongThucThanhToan !== 'Thanh toán khi nhận hàng'){
                        $thoiGianThanhToan = date('H:i:s');
                        $gia = '0';
                    } else {
                        $thoiGianThanhToan = 'Chưa thanh toán';
                    }
                     // Mỗi sản phẩm được đẩy vào mảng dữ liệu
                     $hoaDonData[] = [
                         'tenKH' => $tenKH,
                         'Email' => $Email,
                         'soDienThoai' => $soDienThoai,
                         'idSanPham' => $idSanPham,
                         'tenSanPham' => $tenSanPham,
                         'size' => $size,
                         'soLuong' => $soLuong,
                         'gia' => $gia,
                         'phuongThucThanhToan' => $phuongThucThanhToan,
                         'Tinh' => $Tinh,
                         'Huyen' => $Huyen,
                         'Xa' => $Xa,
                         'Dc_CuThe' => $Dc_CuThe,
                         'ngayDat' => $ngayDat,
                         'thoiGianThanhToan' => $thoiGianThanhToan
                     ];
                 }
                 // Gọi hàm chèn nhiều sản phẩm vào hóa đơn
                 $HoaDon->NhapNhieuSanPham($hoaDonData);
                 
                 // Xóa sản phẩm khỏi giỏ hàng sau khi đã tạo hóa đơn
                 foreach ($idSanPhamCuaGioHangAll as $idSanPham) {
                     $HoaDon->deleteGioHang($idSanPham);
                 }
                 
                 // Điều hướng về giỏ hàng hoặc trang khác
                 header("location:../../../index.php?req=TaiKhoan");
                 exit();
              }
      }
   }
?>

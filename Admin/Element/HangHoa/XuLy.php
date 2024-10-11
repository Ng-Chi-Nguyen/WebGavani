<?php
   include'../Class/hangHoaCls.php';
   if(isset($_REQUEST['reqact'])){
      $requsetAction = $_GET['reqact'];
      switch($requsetAction){
         case 'addNew':
            $tenHangHoa = $_REQUEST['tenHangHoa'];
            $idLoaiHang = $_REQUEST['idLoaiHang'];
            $gia = $_REQUEST['gia'];
            $giaMoi = $_REQUEST['giaMoi'];
            $moTa = $_REQUEST['moTa'];
            $tenHinhAnh = $_REQUEST['tenHinhAnh'];
            $hinhAnh_file = $_FILES['fileimage']['tmp_name'];
            $hinhAnh = base64_encode(file_get_contents($hinhAnh_file));
            $HH = new hangHoa();
            $kq = $HH->insertHangHoa($tenHangHoa, $idLoaiHang, $gia, $giaMoi, $moTa, $tenHinhAnh, $hinhAnh);
            header('location:../../index.php?reqAdmin=HangHoa');
            break;
         case 'update':
            $idHangHoa = $_REQUEST['idHangHoa'];
            $idLoaiHang = $_REQUEST['idLoaiHang'];
            $tenHangHoa = $_REQUEST['tenHangHoa'];
            $gia = $_REQUEST['gia'];
            $giaMoi = $_REQUEST['giaMoi'];
            $moTa = $_REQUEST['moTa'];
            $tenHinhAnh = $_REQUEST['tenHinhAnh'];
            $moTa = $_REQUEST['moTa'];
            $hinhAnh_old = $_REQUEST['fileimage'];
            if(file_exists($_FILES['fileimage']['tmp_name'])){
               $hinhAnh_file = $_FILES['fileimage']['tmp_name'];
               $hinhAnh = base64_encode(file_get_contents(addslashes($hinhAnh_file)));
            }else{
               $hinhAnh = $hinhAnh_old;
            }
            // echo $hinhAnh;
            // // echo $idLoaiHang . " " . $tenLoaiHang;
            $HH = new hangHoa();
            $kq = $HH->updateHangHoa($tenHangHoa, $gia, $giaMoi, $moTa, $tenHinhAnh, $hinhAnh, $idLoaiHang, $idHangHoa);
            header('location:../../index.php?reqAdmin=HangHoa');
            break;
         case 'delete':
            $idHangHoa = $_REQUEST['idHangHoa'];
            // echo $idLoaiHang;
            $HH = new hangHoa();
            $kq = $HH->deleteHangHoa($idHangHoa);
            header('location:../../index.php?reqAdmin=HangHoa');
            break;
         case 'addImage':
            $idHangHoa = $_REQUEST['idHangHoa'];
            if (isset($_FILES['hinhAnhMoTa']) && !empty($_FILES['hinhAnhMoTa']['tmp_name'][0])) {
               $hinhAnhMoTa = $_FILES['hinhAnhMoTa']; // Lấy toàn bộ mảng file hình ảnh mô tả
               // Lặp qua từng file hình ảnh
               foreach ($hinhAnhMoTa['tmp_name'] as $index => $tmp_name) {
                   // Đường dẫn file tạm thời
                   $fileTmpName = $hinhAnhMoTa['tmp_name'][$index];
                   // Kiểm tra nếu file tồn tại
                   if (file_exists($fileTmpName)) {
                       // Chuyển nội dung file thành base64
                       $hinhAnh = base64_encode(file_get_contents($fileTmpName));
                       // Tên file gốc
                     //   $fileName = $hinhAnhMoTa['name'][$index];
                       // Hiển thị tên file và dữ liệu base64 (hoặc lưu vào cơ sở dữ liệu)
                     //   echo "Tên file: " . $fileName . "<br>";
                     //   echo "Dữ liệu hình ảnh base64: " . $hinhAnh . "<br>";
                       // Thêm code để lưu hình ảnh vào cơ sở dữ liệu nếu cần
                       $HH = new HangHoa();
                       $kq = $HH->insertAnhMoTa($idHangHoa, $hinhAnh);
                   }
               }
            }
            header('location:../../index.php?reqAdmin=HangHoa');
            break;

         case 'updateImage':
            $idHangHoa = $_REQUEST['idHangHoa'];
            $anhMoTa_old = $_REQUEST['anhMoTa_old']; // Hình ảnh cũ được truyền qua input hidden
            // Kiểm tra nếu có ảnh mới được tải lên
            if (!empty($_FILES['hinhAnhMoTa']['tmp_name'][0])) {
               // Xóa tất cả các ảnh mô tả cũ trước khi cập nhật
               $HH = new HangHoa();
               $kq = $HH->deleteAnhMoTa($idHangHoa); // Xóa ảnh mô tả cũ khỏi cơ sở dữ liệu
               // Lặp qua tất cả các tệp ảnh đã tải lên và chèn từng ảnh mới vào cơ sở dữ liệu
               foreach ($_FILES['hinhAnhMoTa']['tmp_name'] as $key => $tmp_name) {
                     if (!empty($tmp_name)) {
                        $hinhAnh_file = $tmp_name;
                        $hinhAnh = base64_encode(file_get_contents($hinhAnh_file));
                        // Chèn từng ảnh vào cơ sở dữ liệu
                        $HH->insertAnhMoTa($idHangHoa, $hinhAnh);
                     }
               }
            } else {
               // Nếu không có ảnh mới, giữ lại ảnh cũ (không cần xóa ảnh cũ)
               echo "Giữ lại ảnh cũ";
               $HH = new HangHoa();

               // Cập nhật lại ảnh cũ nếu không có ảnh mới
               foreach ($anhMoTa_old as $hinhAnh) {
                     $HH->insertAnhMoTa($idHangHoa, $hinhAnh);
               }
            }
            header('location:../../index.php?reqAdmin=HangHoa');
            break;
         case 'deleteHinhAnhMoTa':
            $idHangHoa = $_REQUEST['idHangHoa'];
            // echo $idHangHoa;
            $HH = new HangHoa();
            $kq = $HH->deleteAnhMoTa($idHangHoa);
            header('location:../../index.php?reqAdmin=HangHoa');
            break;
         case 'addNewtuLoaiHang':
            $tenHangHoa = $_REQUEST['tenHangHoa'];
            $idLoaiHang = $_REQUEST['idLoaiHang'];
            $gia = $_REQUEST['gia'];
            $giaMoi = $_REQUEST['giaMoi'];
            $moTa = $_REQUEST['moTa'];
            $tenHinhAnh = $_REQUEST['tenHinhAnh'];
            $hinhAnh_file = $_FILES['fileimage']['tmp_name'];
            $hinhAnh = base64_encode(file_get_contents($hinhAnh_file));
            $HH = new hangHoa();
            $kq = $HH->insertHangHoa($tenHangHoa, $idLoaiHang, $gia, $giaMoi, $moTa, $tenHinhAnh, $hinhAnh);
            header('location:../../index.php?reqAdmin=LoaiHang');
            break;
      }
   }
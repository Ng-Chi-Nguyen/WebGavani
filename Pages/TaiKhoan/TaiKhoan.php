<?php
   include'./Admin/Element/Class/taiKhoanCls.php';
   $taikhoan = new TaiKhoan();
   if(isset($_SESSION['idTaiKhoan'])){
      $idTK = $_SESSION['idTaiKhoan'];
      $TK = $taikhoan->TaiKhoanTheoEmail($idTK);
      // $TK = $taikhoan->showDiaChiMacDinh($idTK);
      // echo $TK->Email;
      $diachiMacDinh = $taikhoan->showDiaChiMacDinh($TK->Email);
      $HoaDon = $taikhoan->showHoaDonTheoEmail($TK->Email);
?>
<div class="Vitri">
   <a href="index.php">Trang chủ /</a>
   <p> Tài khoản</p>
</div>
<div class="TaiKhoan BaoHanh session_1">
   <?php include'./Element/Body/menu.php'; ?>
   <div class="left_TK">
      <p class="title">TRANG TÀI KHOẢN</p>
      <p class="hoTen">Xin chào, <span><?php echo $TK->hoTen; ?></span> !</p>
      <ul>
         <li><a href="index.php?req=TaiKhoan" class="co-var">Thông tin tài khoản</a></li>
         <li><a id="DiaChi_CLick" href="index.php?req=DiaChiTaiKhoan">Địa chỉ</a></li>
         <li><a href="./Pages/TaiKhoan/XuLy.php?infoUser=CheckLogout">Đăng xuất</a></li>
      </ul>
   </div>
   <div class="right_TK">
      <div class="ThongTinTaiKhoan" id="ThongTinTaiKhoan">
         <p class="title">TÀI KHOẢN</p>
         <?php foreach($diachiMacDinh as $i){ ?>
         <p class="hoTen">Tên tài khoản: <span><?php echo $i->hoTen . "!"; ?></span></p>
         <div class="DiaChi">
            <i class="fa-solid fa-house"></i>
            <p>Địa chỉ: <?php echo $i->diaChi ?></p>
         </div>
         <div class="phone">
            <i class="fa-solid fa-mobile-screen-button"></i>
            <p>Số điện thoại: <?php echo $i->soDienThoai; ?></p>
         </div>
         <?php } ?>
         <div class="DonHang">
            <div class="title">ĐƠN HÀNG CỦA BẠN</div>
            <?php if(!empty($HoaDon)){ ?>
            <table>
               <thead>
                  <tr>
                     <td>Mã đơn hàng</td>
                     <td>Ngày đặt</td>
                     <td>Thành tiền</td>
                     <td>Thời gian thanh toán</td>
                     <td>Quá trình vận chuyển</td>
                  </tr>
               </thead>
               <?php
                  foreach($HoaDon as $i){ 
               ?>
               <tbody>
                  <tr>
                     <td><a href="" class="co-DonHang"><?php echo $i->idSanPham; ?></a></td>
                     <td><?php echo $i->ngayDat; ?></td>
                     <td><?php echo number_format($i->gia, 0, ',', '.'); ?><sup class="underline">đ</sup></span><span class="price-old"></td>
                     <td><?php echo $i->thoiGianThanhToan; ?></td>
                     <td>
                     <?php 
                        if($i->capNhatDonHang === 0){ ?>
                        <a href="" class="co-DonHang">Shop đã nhận được đơn hàng của bạn</a>
                        <a href="" class="co-red">&#10007;</a>
                     <?php } else if($i->capNhatDonHang === 1){ ?>
                        <a href="" class="co-DonHang">Shop đang chuẩn bị hàng</a>
                        <a href="" class="co-red">&#10007;</a>
                     <?php } else if($i->capNhatDonHang === 2){ ?>
                        <a href="" class="co-DonHang">Đơn hàng của bạn đã được bàn giao cho đơn vị vận chuyển</a>
                     <?php } else { ?>
                        <a href="" class="co-DonHang">Đơn hàng đã giao thành công</a>
                     <?php } ?>
                     </td>
                  </tr>
               </tbody>
               <?php } ?>
            </table>
            <div>
            <?php } else { ?>
               <p>Không có đơn hàng</p>
            <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
   }else{
      header("Location: index.php?req=DangNhap");
   }
?>

<?php
   include_once './Admin/Element/Class/taiKhoanCls.php';
   $taikhoan = new TaiKhoan();
   if(isset($_SESSION['idTaiKhoan'])){
      $idTK = $_SESSION['idTaiKhoan'];
      $TK = $taikhoan->TaiKhoanTheoEmail($idTK);
?>
<div class="Vitri">
   <a href="index.php">Trang chủ /</a>
   <a href="index.php?req=TaiKhoan">Tài khoản</a>
   <p>/ Địa chỉ</p>
</div>
<div class="TaiKhoan BaoHanh session_1">
   <?php include'./Element/Body/menu.php'; ?>
   <div class="left_TK">
      <p class="title">TRANG TÀI KHOẢN</p>
      <p class="hoTen">Xin chào, <span><?php echo $TK->hoTen; ?></span> !</p>
      <ul>
         <li><a href="index.php?req=TaiKhoan">Thông tin tài khoản</a></li>
         <li><a href="index.php?req=DiaChiTaiKhoan" class="co-var">Địa chỉ</a></li>
         <li><a href="./Pages/TaiKhoan/XuLy.php?infoUser=CheckLogout">Đăng xuất</a></li>
      </ul>
   </div>
   <div class="right_TK">
      <div class="DiaChi" id="Diahi">
         <p class="title">ĐỊA CHỈ CỦA BẠN</p>
         <button id="ThemDiaChi_TaiKhoan" class="btn-submit" onclick="showModel()">Thêm địa chỉ</button>
         <?php
            $diachi = $taikhoan->showDiaChiTheoEmail($TK->Email); 
            foreach($diachi as $i) {
         ?>
         <div class="DiaChi_TK">
            <ul>
               <li>Họ tên: <span><?php echo $i->hoTen; ?></span></li>
               <li>Địa chỉ: <span><?php echo $i->diaChi;  ?></span> </li>
               <li>Số điện thoại: <span><?php echo $i->soDienThoai; ?></span></li>
            </ul>
            <div class="right_DCTK">
               <p class="CapNhat" id="Mo_CapNhat_DiaChi" data-idDiaChi="<?php echo $i->idDiaChi ?>">Cập nhật địa chỉ</p>
            <?php if($i->macDinh === 'off'){ ?>
               <a class="Xoa" href="./Pages/TaiKhoan/XuLy.php?infoUser=XoaDiaChi&idDiaChi=<?php echo $i->idDiaChi ?>">Xóa</a>
            <?php } ?>
            </div>
            <?php if($i->macDinh === 'on'){ ?>
            <div class="MacDinh">
               <i class="fa-regular fa-circle-check"></i>
               <p>Địa chỉ mặc định</p>
            </div>
            <?php } ?>
         </div>
         <?php } ?>
      </div>
   </div>
</div>
<div class="model_ThemDiaChi" id="modelDiaChi">
   <div class="title">THÊM ĐỊA CHỈ MỚI</div>
   <form action="./Pages/TaiKhoan/XuLy.php?infoUser=ThemDiaChi" method="post">
      <input type="hidden" name="Email" value="<?php echo $TK->Email ?>">
      <input type="text" name="hoTen" id="" placeholder="Họ tên">
      <input type="phone" name="soDienThoai" id="" placeholder="Số điện thoại">
      <input type="text" name="diaChi" id="" placeholder="Địa chỉ">
      <div class="checkbox">
        <input type="checkbox" name="macDinh">
         <p>Đặc làm mặc định</p>
      </div>
      <div class="Gui">
         <input type="reset" value="Hủy">
         <input type="submit" value="Thêm">
      </div>
      <a class="close close_Model_ThemDC">&#10007;</a>
   </form>
</div>
<?php
   }
?>
<div id="CapNhat_DiaChi">
   <div class="form_CapNhat_DiaChi">
   </div>
</div>
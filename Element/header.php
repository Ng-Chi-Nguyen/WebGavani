<header class="header">
   <div class="header-top">
      <a href="index.php" class="logo">
         <img src="./Img/logo.webp" alt="logo">
      </a>
      <div class="center">
         <div class="search">
            <input type="text" id="animated-input" placeholder="">
            <i class="fa-solid fa-magnifying-glass"></i>
         </div>
         <p class="desc">áo khoác chống nắng, áo khoác đôi, áo thun nữ, áo thun nam, áo khoác nam, áo khoác nữ, áo khoác dù, áo thun kiểu, áo polo
         </p>
      </div>
      <div class="right">
         <div class="hotline">
            <img src="./Img/phone-icon.webp">
            <div class="info">
               <p>Hổ trợ khách hàng</p>
               <a href="#">0777851934</a>
            </div>
         </div>
         <div class="user">
            <img src="./Img/account-icon.webp">
            <div class="info">
               <a href="index.php?req=TaiKhoan">Tài khoản</a> <br>
               <?php if(isset($_SESSION['idTaiKhoan'])){ ?>
                  <a href="./Pages/TaiKhoan/XuLy.php?infoUser=CheckLogout">Đăng xuất</a>
               <?php } else { ?> 
                  <a href="index.php?req=DangNhap">Đăng nhập</a>
               <?php } ?>
            </div>
         </div>
         <a href="index.php?req=GioHang" class="cart">
            <img src="./Img/cart-icon.webp">
            <span>Giỏ hàng</span>
            <?php
               include'./Admin/Element/Class/gioHangCls.php';
               $GH_SL = new GioHang();
               $GioHang_SL = $GH_SL->showGioHang();
               $tongSl = 0;
               foreach($GioHang_SL as $i){
                  $tongSl += $i->soLuong;
               }
            ?>
            <p><?php echo $tongSl; ?></p>
         </a>
      </div>
   </div>
   <div class="header-bottom">
      <div class="item itemHover">
         <i class="fa-solid fa-bars"></i>
         <a href="#">Danh mục sản phẩm</a>
      </div>
      <div class="item">
         <img src="./Img/policy_header_image_1.webp" alt="">
         <a href="index.php?req=BaoHanh">Chính sách bảo hành</a>
      </div>
      <div class="item">
         <img src="./Img/policy_header_image_2.webp" alt="">
         <a href="index.php?req=CuaHang">Hệ thống cữa hàng</a>
      </div>
      <div class="item">
         <img src="./Img/policy_header_image_3.webp" alt="">
         <a href="index.php?req=SuDung">Hướng dẫn sữ dụng</a>
      </div>
      <div class="item">
         <img src="./Img/policy_header_image_4.webp" alt="">
         <a href="index.php?req=ThanhVien">Chính sách thành viên</a>
      </div>
   </div>
</header>
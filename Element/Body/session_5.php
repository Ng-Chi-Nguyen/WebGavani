<?php
   $HH_S3 = new hangHoa();
   $idLoaiHang = 20;
   $List_HH = $HH_S3->getHangHoaByLoaiHang($idLoaiHang);
   $dem = 0;
?>
<div class="session_2 session_5">
   <h2 class="title">
      <a href="#">NHÓM ĐỒ ĐÔI</a>
      <div class="right-title">
         <a href="">Áo khoát đôi</a>
         <a href="">Áo thun đôi</a>
         <a href="">Áo polo đôi</a>
      </div>
   </h2>
   <div class="row">
      <div class="image">
         <img src="./Img/product_tag_banner.webp" alt="">
      </div>
      <div class="right">
      <?php 
         foreach($List_HH as $i){ 
            if($dem >= 8){ break; }
            $dem++;
      ?>
            <form action="" class="form-cart-add">
               <div class="product-item" data-id="<?php echo $i->idLoaiHang; ?>">
                  <a href="index.php?req=SanPham&idHangHoa=<?php echo $i->idHangHoa; ?>">
                     <div class="image">
                        <img src="data:image/png;base64,<?php echo $i->hinhAnh; ?>" alt="<?php echo $i->tenHinhAnh; ?>">
                     </div>
                     <div class="content">
                        <div class="info-product">
                           <div class="shopName">GAVANI</div>
                           <div class="evaluate">
                              <i class="fa-solid fa-star"></i><span>5</span>
                              <p>Đã bán <span>18</span></p>
                           </div>
                        </div>
                        <p class="name-product">
                           <?php echo $i->tenHangHoa; ?>
                        </p>
                        <span class="price"><?php echo number_format($i->giaMoi, 0, ',', '.'); ?><span class="underline">đ</span></span><span class="price-old"><?php echo number_format($i->gia, 0, ',', '.'); ?><span class="underline">đ</span></span>
                        <button type="submit" class="cart">
                           <i class="fa-solid fa-cart-arrow-down cart"></i>
                        </button>
                     </div>
                  </a>
               </div>
            </form>
         <?php } ?>
      </div>
   </div>
   <div class="t-center">
      <a href="index.php?req=TatCaSanPham&idLoaiHang=<?php echo $idLoaiHang ?>" class="btn-all">
         <p>Xem tất cả</p>
         <i class="fa-solid fa-chevron-right"></i>
      </a>
   </div>
</div>
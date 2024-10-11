<?php
   $HH_S3 = new hangHoa();
   $idLoaiHang = 14;
   $List_HH = $HH_S3->getHangHoaByLoaiHang($idLoaiHang);
   $dem = 0;
?>
<div class="session_2 session_3">
   <div class="title">
      <a href="">ÁO THUN NỮ</a>
   </div>
   <div class="row">
      <?php 
         foreach($List_HH as $i){ 
            if($dem >= 5){ break; }
            $dem++;
      ?>
         <form action="./Pages/Cart/Xuly.php?infoSp=addNew&idSanPham=<?php echo $i->idHangHoa; ?>" class="form-cart-add" method="post" enctype="multipart/form-data" class="form-cart-add">
            
            <input type="hidden" name="idHangHoa" value="<?php echo $i->idHangHoa; ?>">
            <input type="hidden" name="tenHinhAnh" value="<?php echo $i->hinhAnh; ?>">
            <input type="hidden" name="soLuong" value="<?php echo $i->soLuong = 1; ?>">
            <input type="hidden" name="size" value="<?php echo $i->size = "S"; ?>">
            <input type="hidden" name="tenSanPham" value="<?php echo $i->tenHangHoa; ?>">
            <input type="hidden" name="gia" value="<?php echo $i->giaMoi; ?>">
               
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
   <div class="t-center">
      <a href="index.php?req=TatCaSanPham&idLoaiHang=<?php echo $idLoaiHang ?>" class="btn-all">
         <p>Xem tất cả</p>
         <i class="fa-solid fa-chevron-right"></i>
      </a>
   </div>
</div>
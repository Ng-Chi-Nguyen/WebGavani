<?php
   include_once'./Admin/Element/Class/gioHangCls.php';
   $GH = new GioHang();
   $GioHang = $GH->showGioHang();
   $sum = 0;
   $tongSl = 0;
   foreach($GioHang_SL as $i){
      $tongSl += $i->soLuong;
   }
?>
<div class="Vitri">
   <a href="index.php">Trang chủ </a>
   <p> / Giỏ hàng (<?php echo $tongSl; ?>)</p>
</div>
<div class="GioHang BaoHanh session_1">
   <?php include'./Element/Body/menu.php'; ?>
   <div class="content">
      <h2 class="title">Giỏ hàng</h2>
      <?php if($tongSl > 0){ ?>
         <div class="row">
            <div class="left-main">
               <?php
                  foreach($GioHang as $i){
               ?>
                  <form action="index.php?req=ThanhToan&idSanPhamCuaGioHang=<?php echo $i->idSanPhamCuaGioHang; ?>" class="form-cart-pay" method="post" enctype="multipart/form-data">
                     <div class="item">
                        <input type="hidden" name="odSanPhamCuaGioHang" value="<?php echo $i->idSanPhamCuaGioHang; ?>">
                        <input type="hidden" name="anhSanPham" value="<?php echo $i->anhSanPham; ?>">
                        <input type="hidden" name="tenSanPham" value="<?php echo $i->tenSanPham; ?>">
                        <input type="hidden" name="size" value="<?php echo $i->size; ?>">
                        <input type="hidden" name="soLuong" value="<?php echo $i->soLuong; ?>">
                        <input type="hidden" name="gia" value="<?php echo $i->gia; ?>">
                        <div class="item-left">
                           <a class="close" href="./Pages/Cart/Xuly.php?infoSp=delete&idSanPhamCuaGioHang=<?php echo $i->idSanPhamCuaGioHang; ?>">&#10007;</a>
                           <div class="image">
                              <img src="data:image/png;base64,<?php echo $i->anhSanPham; ?>">
                           </div>
                           <div class="infoSp">
                              <p class="tenSp">
                                 <?php echo $i->tenSanPham; ?>
                              </p>
                              <p class="size">
                                 <?php echo "Size: " . $i->size; ?>
                              </p>
                              <p class="soLuong">
                                 <?php echo "Số lượng: " . $i->soLuong; ?>
                              </p>
                           </div>
                        </div>
                        <div class="item-right">
                           <div class="gia">
                              <span class="amount"><?php echo $i->gia; ?>đ</span>
                           </div>
                           <a href="index.php?req=ThanhToan&idSanPhamCuaGioHang=<?php echo $i->idSanPhamCuaGioHang; ?>" class="btn">
                              <input type="submit" value="Mua">
                           </a>
                        </div>
                     </div>
                  </form>
               <?php
                  }
               ?>
            </div>
            <div class="right-main">
            <?php 
               foreach($GioHang as $i){
                  $sum += $i->gia;
               }
            ?>
               <div class="sum">
                  <p class="sum-title">TỔNG CỘNG: </p>
                  <p class="gia-tong amount"><?php echo $sum; ?></p>
               </div>
               <div class="ma-giam-gia">
                  <div class="left-magiamgia">
                     <img src="./Img/magiamgia-giohang-icon.webp" alt="">
                     <p>Mã giảm giá</p>
                  </div>
                  <div class="right-magiamgia">
                     <a href=""><span>Chọn mã giảm giá</span> <i class="fa-solid fa-chevron-right"></i></a>
                  </div>
               </div>
               <div class="thanhtoan">
                  <a href="index.php?req=ThanhToan">Thanh toán</a>
               </div>
               <div class="phuongthuc">
                  <p>Phương thức thanh toán</p>
                  <img src="./Img/phuongthucthanhtoan).webp" alt="">
               </div>
            </div>
            <div class="bottom-main">
               <p class="title">Ghi chú đơn hàng</p>
               <input type="text" maxlength="200">
            </div>
         </div>
      <?php } else {
         ?>
            <div class="image-emp-cart">
               <img src="./Img/empty-cart.webp" alt="">
            </div>
         <?php
      } ?>
   </div>
</div>
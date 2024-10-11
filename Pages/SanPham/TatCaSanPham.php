<?php
   include'./Admin/Element/Class/hangHoaCls.php';
   $HH_S2 = new hangHoa();
   if(isset($_GET['idLoaiHang'])){
      $idLoaiHang = $_GET['idLoaiHang'];
      $List_idLH = $HH_S2->IdLoaiHang($idLoaiHang);
   } else {
      $idLoaiHang = "";
   }
?>
<div class="Vitri">
   <a href="index.php">Trang chủ /</a> 
   <p>Tất cả sản phẩm /</p>
   <p>
      <?php 
         if(isset($idLoaiHang)){
            echo $List_idLH->tenLoaiHang ;
         } 
      ?>
   </p>
</div>
<div class="MaSanPham"></div>
<div class="BaoHanh session_1">
   <?php include'./Element/Body/menu.php'; ?>
</div>
<div class="All_SP">
   <div class="left">
      <p class="title">LOẠI</p>
         <a href="index.php?req=TatCaSanPham" class="item">
            Tất cả sản phẩm
         </a>
         <?php
            $List_LH = $HH_S2->showLoaiHang();
            foreach($List_LH as $i){ 
               if($i->idLoaiHang == $idLoaiHang){
                  ?>
                  <a href="index.php?req=TatCaSanPham&idLoaiHang=<?php echo $i->idLoaiHang ?>" class="item co-blue" >
                     <?php echo $i->tenLoaiHang ?>
                  </a>
                  <?php
               } else {
                  ?>
                  <a href="index.php?req=TatCaSanPham&idLoaiHang=<?php echo $i->idLoaiHang ?>" class="item" >
                     <?php echo $i->tenLoaiHang ?>
                  </a>
                  <?php
               }
         ?>
        
            <?php } ?>
   </div>
   <div class="right">
      <div class="right-top">
         <p class="title">Tất cả sản phẩm</p>
         <div class="SapXep">
            <p>Sắp xếp: </p>
            <a href="">Từ A->Z</a>
            <a href="">Từ Z->A</a>
            <a href="">Gia giảm giần</a>
            <a href="">Giá tăng dần</a>
         </div>
      </div>
      <div class="right-body">
         <?php
            if(isset($_GET['idLoaiHang'])){
               $List_HH = $HH_S2->getHangHoaByLoaiHang($idLoaiHang);
               foreach($List_HH as $i){ 
         ?> 
         <div class="item">
            <form action="./Pages/Cart/Xuly.php?infoSp=addNew&idSanPham=<?php echo $i->idHangHoa; ?>" class="form-cart-add" method="post" enctype="multipart/form-data">
               <input type="hidden" name="idHangHoa" value="<?php echo $i->idHangHoa; ?>">
               <input type="hidden" name="tenHinhAnh" value="<?php echo $i->hinhAnh; ?>">
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
         </div>
         <?php } 
         } else {
            $List_HH = $HH_S2->showHangHoa();
            foreach($List_HH as $i){ 
               ?> 
               <div class="item">
                  <form action="./Pages/Cart/Xuly.php?infoSp=addNew&idSanPham=<?php echo $i->idHangHoa; ?>" class="form-cart-add" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="idHangHoa" value="<?php echo $i->idHangHoa; ?>">
                     <input type="hidden" name="tenHinhAnh" value="<?php echo $i->hinhAnh; ?>">
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
               </div>
               <?php } 
         }
         
         ?>
      </div>
   </div>
</div>
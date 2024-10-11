<?php
   include'./Element/Class/hoaDonCls.php';
   $HoaDon = new HoaDon();
   $List_HoaDon = $HoaDon->showHoaDonSapXep();
?>
<h2>Hóa đơn khách hàng</h2>
<div class="HoaDon">
<?php
   foreach($List_HoaDon as $i){
?>
   <div class="List_HoaDon">
         <div class="idHoaDon">
            <ul class="title_item">
               <li>Mã hóa đơn: </li>
               <li><?php echo $i->idHoaDon; ?></li>
            </ul>
         </div>
         <div class="TenKH">
            <ul class="title_item">
               <li>Tên khách hàng: </li>
               <li><?php echo $i->tenKH; ?></li>
            </ul>
         </div>
         <div class="Email">
            <ul class="title_item">
               <li>Email: </li>
               <li><?php echo $i->Email; ?></li>
            </ul>
         </div>
         <div class="phone">
            <ul class="title_item">
               <li>Số điện thoại: </li>
               <li><?php echo $i->soDienThoai; ?></li>
            </ul>
         </div>
         <div class="idSanPjam">
            <ul class="title_item">
               <li>Mã sản phẩm: </li>
               <li><?php echo $i->idSanPham; ?></li>
            </ul>
         </div>
         <div class="tenSanPham">
            <ul class="title_item">
               <li>Tên sản phẩm: </li>
               <li><?php echo $i->tenSanPham; ?></li>
            </ul>
         </div>
         <div class="size">
            <ul class="title_item">
               <li>Size: </li>
               <li><?php echo $i->size; ?></li>
            </ul>
         </div>
         <div class="soLuong">
            <ul class="title_item">
               <li>Số lượng: </li>
               <li><?php echo $i->soLuong; ?></li>
            </ul>
         </div>
         <div class="gia">
            <ul class="title_item">
               <li>Giá: </li>
               <li class="amount"><?php echo number_format($i->gia, 0, ',', '.'); ?><span class="underline">đ</span></li>
            </ul>
         </div>
         <div class="phuongThucThanhToan">
            <ul class="title_item">
               <li>Phương thức thanh toán: </li>
               <li><?php echo $i->phuongThucThanhToan; ?></li>
            </ul>
         </div>
         <div class="thoiGIanThahToan">
            <ul class="title_item">
               <li>Thời gian thanh toán: </li>
               <li><?php echo $i->thoiGianThanhToan; ?></li>
            </ul>
         </div>
         <div class="phuongThucThanhToan">
            <ul class="title_item">
               <li>Ngày đặt hàng: </li>
               <li><?php echo $i->ngayDat; ?></li>
            </ul>
         </div>
         <div class="diaChi">
            <ul class="title_item">
               <li>Địa chỉ: </li>
               <li><?php echo $i->Tinh . ", " . $i->Huyen . ", " . $i->Xa . ", " . $i->Dc_CuThe; ?></li>
            </ul>
         </div>
         <div class="CapNhatQuaTrinhGiaoHang">
            <?php if($i->capNhatDonHang == 0){ ?>
            <div class="GD Sang_GD1">
               <button class="co-red" onclick="showModelQTGH(<?php echo $i->idHoaDon; ?>)">Shop đã nhận được đơn hàng của bạn</button>
            </div>
            <?php } else if($i->capNhatDonHang == 1){?>
            <div class="GD Sang_GD2 co-red">
               <button class="co-red" onclick="showModelQTGH(<?php echo $i->idHoaDon; ?>)">Shop đang chuẩn bị hàng</button>
            </div>
            <?php } else if($i->capNhatDonHang == 2){?>
            <div class="GD Sang_GD3">
               <button onclick="closeModelQTGH(<?php echo $i->idHoaDon; ?>)" class="co-blue">Shop đã giao cho đơn vị vận chuyển</button>
            </div>
            <?php } else { ?>
               <div class="GD Sang_GD4">
                  <button onclick="closeModelQTGH(<?php echo $i->idHoaDon; ?>)" class="co-blue">Hoàn tất đơn hàng</button>
                  <i class="fa-solid fa-check co-blue"></i>
               </div>
            <?php }  ?>
         </div>
         <form class="model" id="modelQTGH_<?php echo $i->idHoaDon; ?>" action="./Element/HoaDon/XuLy.php?reqact=capNhatQuaTrinhGiaHang" method="post">
            <input type="hidden" name="idHoaDon" value="<?php echo $i->idHoaDon ?>">
            <input type="hidden" name="capNhatDonHang" value="<?php echo $i->capNhatDonHang ?>">
            <?php if($i->capNhatDonHang == 0) { ?>
               <p class="title">Hoàn thành xác nhận đơn hàng</p>
               <input type="hidden" name="capNhatDonHang" value="1">
            <?php } else if($i->capNhatDonHang == 1) { ?>
               <p class="title">Chuẩn bị hàng hoàn tất</p>
               <input type="hidden" name="capNhatDonHang" value="2">
            <?php } else if($i->capNhatDonHang == 2) { ?>
               <p class="title">Sẵn sàng giao cho đơn vị vận chuyển</p>
            <?php } ?>
            <div class="List_HoaDon_Model">
               <!-- Hiển thị thông tin hóa đơn như ở trên -->
               <div class="idHoaDon">
                  <ul class="title_item">
                     <li>Mã hóa đơn: </li>
                     <li><?php echo $i->idHoaDon; ?></li>
                  </ul>
               </div>
               <div class="TenKH">
                  <ul class="title_item">
                     <li>Tên khách hàng: </li>
                     <li><?php echo $i->tenKH; ?></li>
                  </ul>
               </div>
               <div class="phone">
                  <ul class="title_item">
                     <li>Số điện thoại: </li>
                     <li><?php echo $i->soDienThoai; ?></li>
                  </ul>
               </div>
               <div class="idSanPjam">
                  <ul class="title_item">
                     <li>Mã sản phẩm: </li>
                     <li><?php echo $i->idSanPham; ?></li>
                  </ul>
               </div>
               <div class="tenSanPham">
                  <ul class="title_item">
                     <li>Tên sản phẩm: </li>
                     <li><?php echo $i->tenSanPham; ?></li>
                  </ul>
               </div>
               <div class="size">
                  <ul class="title_item">
                     <li>Size: </li>
                     <li><?php echo $i->size; ?></li>
                  </ul>
               </div>
               <div class="soLuong">
                  <ul class="title_item">
                     <li>Số lượng: </li>
                     <li><?php echo $i->soLuong; ?></li>
                  </ul>
               </div>
               <div class="gia">
                  <ul class="title_item">
                     <li>Giá: </li>
                     <li class="amount"><?php echo number_format($i->gia, 0, ',', '.'); ?><span class="underline">đ</span></li>
                  </ul>
               </div>
               <div class="phuongThucThanhToan">
                  <ul class="title_item">
                     <li>Phương thức T.Toán: </li>
                     <li><?php echo $i->phuongThucThanhToan; ?></li>
                  </ul>
               </div>
               <div class="thoiGIanThahToan">
                  <ul class="title_item">
                     <li>Thời gian thanh toán: </li>
                     <li><?php echo $i->thoiGianThanhToan; ?></li>
                  </ul>
               </div>
               <div class="phuongThucThanhToan">
                  <ul class="title_item">
                     <li>Ngày đặt hàng: </li>
                     <li><?php echo $i->ngayDat; ?></li>
                  </ul>
               </div>
               <div class="diaChi">
                  <ul class="title_item">
                     <li>Địa chỉ: </li>
                     <li><?php echo $i->Tinh . ", " . $i->Huyen . ", " . $i->Xa . ", " . $i->Dc_CuThe; ?></li>
                  </ul>
               </div>
               <!-- Các thông tin khác -->
            </div>
            <div class="HoanThanh">
               <input type="submit" class="btn-submit" value="Hoàn thành">
            </div>
            <p class="close" onclick="closeModelQTGH(<?php echo $i->idHoaDon; ?>)" class="co-red">&#10007;</p>
         </form>
      </div>
<?php
   }
?>
</div>

<script></script>
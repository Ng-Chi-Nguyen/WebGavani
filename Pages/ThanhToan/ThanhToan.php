<?php
   include './Admin/Element/Class/diaChiCls.php';
   $DC_2 = new DiaChi();
   $GioHang = new GioHang();
   $List_DC = $DC_2->showDiaChiTinh();
   $sum = 0;
   if(isset($_GET['idSanPhamCuaGioHang'])){
      $idSanPhamCuaGioHang = $_GET['idSanPhamCuaGioHang'];
      // echo $idSanPhamCuaGioHang;
      $idSanPham = $GioHang->IdGioHang($idSanPhamCuaGioHang);
   }
?>
      <div class="Vitri">
         <a href="index.php">Trang chủ </a>
         <p> / Thông tin giao hàng </p>
      </div>
      <form action="./Admin/Element/HoaDon/XuLy.php?req=HoaDon&sanpham=<?php 
         if(isset($_GET['idSanPhamCuaGioHang'])){
            echo $idSanPham->idSanPhamCuaGioHang;
         }else{
            echo 0;
         }
      ?>&reqact=addNew" method="post">
         <div class="ThanhToan row">
            <div class="left">
               <h2 class="title">Thông tin giao hàng</h2>
               <p class="noteLogin">Bạn đã có tài khoản? <a href="index.php?req=DangNhap">Đăng nhập</a> để tích điểm ưu đải nhé.</p>
               <div class="form-thanhtoan row">
               <?php if(!isset($_SESSION['idTaiKhoan'])){ ?>
                  <input type="text" class="hoTen" name="hoTen" placeholder="Họ và tên">
                  <input type="email" class="email"  name="email" placeholder="Email">
                  <input type="phone" class="phone"  name="phone" placeholder="Số điện thoại">
                     <div class="inputDiaChi">
                     <select name="id_Tinh" class="diaChi id_Tinh" id="id_Tinh">
                        <option>Tỉnh - thành</option>
                        <?php 
                           foreach($List_DC as $i){ 
                              $DviHC_1 = TenDonViHC($i->id_HanhChinh);
                        ?>
                           <option value="<?php echo $i->id_Tinh; ?>"><?php echo $DviHC_1 . " " . $i->name; ?></option>
                        <?php } ?>
                     </select>
                     <select name="id_Huyen" class="diaChi id_Huyen" id="id_Huyen">
                        <option>Quận - huyện</option>
                        <!-- Sẽ được cập nhật qua AJAX -->
                     </select>
                     <select name="id_Xa" class="diaChi id_Xa" id="id_Xa">
                        <option>Xã - phường</option>
                        <!-- Sẽ được cập nhật qua AJAX -->
                     </select>
                  </div>
                  <input class="DiaChiCuThe" name="DiaChiCuThe" type="text" placeholder="Địa chỉ">
                  <?php } else {
                        $idTK = $_SESSION['idTaiKhoan'];
                        $TK = $DC_2->IdTaiKhoan($idTK);
                  ?>
                     <input type="text" class="hoTen" name="hoTen" placeholder="Họ và tên" value="<?php echo $TK->hoTen ?>">
                     <input type="email" class="email"  name="email" placeholder="Email"value="<?php echo $TK->Email ?>">
                     <input type="phone" class="phone"  name="phone" placeholder="Số điện thoại" value="<?php echo $TK->soDienThoai ?>">  
                     <div class="inputDiaChi">
                     <select name="id_Tinh" class="diaChi id_Tinh" id="id_Tinh">
                        <option>Tỉnh - thành</option>
                        <?php 
                           foreach($List_DC as $i){ 
                              $DviHC_1 = TenDonViHC($i->id_HanhChinh);
                        ?>
                           <option value="<?php echo $i->id_Tinh; ?>"><?php echo $DviHC_1 . " " . $i->name; ?></option>
                        <?php } ?>
                     </select>
                     <select name="id_Huyen" class="diaChi id_Huyen" id="id_Huyen">
                        <option>Quận - huyện</option>
                        <!-- Sẽ được cập nhật qua AJAX -->
                     </select>
                     <select name="id_Xa" class="diaChi id_Xa" id="id_Xa">
                        <option>Xã - phường</option>
                        <!-- Sẽ được cập nhật qua AJAX -->
                     </select>
                  </div>
                  <input class="DiaChiCuThe" name="DiaChiCuThe" type="text" placeholder="Địa chỉ">
                  <?php } ?>
                  <p class="title-pttt">Phương thức thanh toán</p>
         
                  <label for="thanhtoan_khinhan">
                     <input type="radio" name="phuongThucThanhToan" id="thanhtoan_khinhan" value="Thanh toán khi nhận hàng">
                     <img src="./Img/thanhtoannhanhang.svg" alt="">
                     <p>Thanh toán khi giao hàng (COD)</p>
                  </label>
         
                  <label for="thanhtoan_quanganhang">
                     <input type="radio" name="phuongThucThanhToan" id="thanhtoan_quanganhang" value="Thanh toán qua app ngân hàng">
                     <img src="./Img/bank.svg" alt="">
                     <p>Chuyển khoản qua ngân hàng</p>
                  </label>
         
                  <label for="thanhtoan_momo">
                     <input type="radio" name="phuongThucThanhToan" id="thanhtoan_momo" value="Thanh toán bằng ví momo">
                     <img src="./Img/momo.svg" alt="">
                     <p>Ví MoMo</p>
                  </label>
         
                  <label for="thanhtoan_vnpay">
                     <input type="radio" name="phuongThucThanhToan" id="thanhtoan_vnpay" value="Thanh toán bằng vnpay">
                     <img src="./Img/vnpay.svg" alt="">
                     <div class="right-tt-vnpay">
                        <p>Thẻ ATM/Visa/Master/JCB/QR Pay qua cổng VNPAY</p>
                        <img src="./Img/atm_visa_master_jcb.svg" alt="">
                     </div>
                  </label>
                  <div class="left-bottom-tt">
                     <a href="index.php?req=GioHang">Giỏ hàng</a>
                     <input class="btn-submit" type="submit" value="Hoàn tất đơn hàng">
                  </div>
               </div>
            </div>
            <div class="right">
               <?php
                  if(isset($_GET['idSanPhamCuaGioHang'])){
               ?>
                  <div class="Sanpham">
                     <input type="hidden" name="idSanPhamCuaGioHang" value="<?php echo $idSanPham->idSanPhamCuaGioHang ?>">
                     <input type="hidden" name="tenSanPham" value="<?php echo $idSanPham->tenSanPham ?>">
                     <input type="hidden" name="size" value="<?php echo $idSanPham->size ?>">
                     <input type="hidden" name="soLuong" value="<?php echo $idSanPham->soLuong ?>">
                     <input type="hidden" name="gia" value="<?php echo $idSanPham->gia ?>">
                     <div class="left-Sanpham">
                        <div class="image">
                           <img src="data:image/png;base64,<?php echo $idSanPham->anhSanPham; ?>">
                        </div>
                        
                        <div class="infoSp">
                           <p class="tenSp"><?php echo $idSanPham->tenSanPham; ?></p>
                           <p class="size"> <?php echo "Size: " . $idSanPham->size; ?> </p>
                        </div>
                        <p class="soLuong"><?php echo $idSanPham->soLuong; ?></p>
                     </div>
                     <div class="right-Sanpham">
                     <li class="amount"><?php echo number_format($idSanPham->gia, 0, ',', '.'); ?><span class="underline">đ</span></li>
                     </div>
                  </div>
                  <div class="maGiamGia">
                     <div class="nhapMa">
                        <input type="text" name="" id="" placeholder="Mã giảm giá">
                        <div class="btn-submit">Sữ dụng</div>
                     </div>
                     <div class="xemThemMa">
                        <p>Xem thêm mã giảm giá</p>
                        <div class="ma">
                           <span>
                              <span>Giảm 50.000đ</span>
                           </span>
                           <span>
                              <span>Giảm 30.000đ</span>
                           </span>
                           <span>
                              <span>Giảm 100.000đ</span>
                           </span>
                           <span>
                              <span>Freeship 100%</span>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="tongTien">
                     <ul class="item-right">
                        <li>Tạm tính</li>
                        <li class="amount"><?php echo number_format($idSanPham->gia, 0, ',', '.'); ?><span class="underline">đ</span></li>
                     </ul>
                     <ul class="item-right">
                        <li>Phí vận chuyển</li>
                        <li>Miễn phí</li>
                     </ul>
                     <ul class="item-right">
                        <li>Tổng cộng</li>
                        <li class="amount co-red"><?php echo number_format($idSanPham->gia, 0, ',', '.'); ?><span class="underline">đ</span></li>
                     </ul>
                  </div>
               <?php
               } else {
                  $List_GH = $GioHang->showGioHang();
                  foreach($List_GH as $i){
                     $sum+=$i->gia;
                  ?>
                     <div class="Sanpham">
                        <input type="hidden" name="idSanPhamCuaGioHangAll[]" value="<?php echo $i->idSanPhamCuaGioHang ?>">
                        <input type="hidden" name="tenSanPhamAll[]" value="<?php echo $i->tenSanPham ?>">
                        <input type="hidden" name="sizeAll[]" value="<?php echo $i->size ?>">
                        <input type="hidden" name="soLuongAll[]" value="<?php echo $i->soLuong ?>">
                        <input type="hidden" name="giaAll[]" value="<?php echo $i->gia ?>">
                           <div class="left-Sanpham">
                              <div class="image">
                                 <img src="data:image/png;base64,<?php echo $i->anhSanPham; ?>">
                              </div>
                              
                              <div class="infoSp">
                                 <p class="tenSp"><?php echo $i->tenSanPham; ?></p>
                                 <p class="size"> <?php echo "Size: " . $i->size; ?> </p>
                              </div>
                              <p class="soLuong"><?php echo $i->soLuong; ?></p>
                           </div>
                           <div class="right-Sanpham">
                           <span class="amount"><?php echo number_format($i->gia, 0, ',', '.'); ?><span class="underline">đ</span></span>
                           </div>
                        </div>
                  <?php
                  }
                  ?> 
                        <div class="maGiamGia">
                           <div class="nhapMa">
                              <input type="text" name="" id="" placeholder="Mã giảm giá">
                              <div class="btn-submit">Sữ dụng</div>
                           </div>
                           <div class="xemThemMa">
                              <p>Xem thêm mã giảm giá</p>
                              <div class="ma">
                                 <span>
                                    <span>Giảm 50.000đ</span>
                                 </span>
                                 <span>
                                    <span>Giảm 30.000đ</span>
                                 </span>
                                 <span>
                                    <span>Giảm 100.000đ</span>
                                 </span>
                                 <span>
                                    <span>Freeship 100%</span>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class="tongTien">
                           <ul class="item-right">
                              <li>Tạm tính</li>
                              <li class="amount"><?php echo number_format($sum, 0, ',', '.'); ?><span class="underline">đ</span></li>
                           </ul>
                           <ul class="item-right">
                              <li>Phí vận chuyển</li>
                              <li>Miễn phí</li>
                           </ul>
                           <ul class="item-right">
                              <li>Tổng cộng</li>
                              <li class="amount co-red"><?php echo number_format($sum, 0, ',', '.'); ?><span class="underline">đ</span></li>
                           </ul>
                        </div>
                     
               <?php
               }
               ?>
            </div>
         </div>
      </form>

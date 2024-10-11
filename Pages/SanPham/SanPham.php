<script>
    const idSanPham = <?php echo $List_HH->idHangHoa; ?>;
</script>
<?php
   include'./Admin/Element/Class/hangHoaCls.php';
   $HH_S2 = new hangHoa();
   $idHangHoa = $_GET['idHangHoa'];
   $List_HH = $HH_S2->IdHangHoa($idHangHoa);
?>
<div class="Vitri">
   <a href="index.php">Trang chủ /</a>
   <a href="">Tất cả sản phẩm</a>
   <p> / <?php echo $List_HH->tenHangHoa; ?> /</p>
</div>
<div class="SanPham session_1 BaoHanh">
   <form action="./Pages/Cart/Xuly.php?infoSp=addNew" method="post" enctype="multipart/form-data" id="formSanPham">
      <div class="body">
         <div class="left-body">
            <input type="hidden" name="tenHinhAnh" value="<?php echo $List_HH->hinhAnh; ?>">
            <?php
               $List_HH_2 = $HH_S2->showAnhMoTa($idHangHoa);
               foreach($List_HH_2 as $i){
                  ?> 
                     <img src="data:image/png;base64,<?php echo $i->hinhAnhMoTa; ?>" alt="Ảnh mô tả">
                  <?php
               }
               ?>
         </div>
         <div class="right">
            <span class="title-item">Gavani</span>
            <p class="ten-Sp"><?php echo $List_HH->tenHangHoa; ?></p>
            <input type="hidden" name="tenSanPham" value="<?php echo $List_HH->tenHangHoa; ?>">
            <div class="info-Sp">
               <p class="tinhtrang">
                  Tình trạng: <span class="co-red">còn hàng</span>
               </p>
               <p class="ma-Sp">
                  <input type="hidden" name="idSanPham" value="<?php echo $List_HH->idHangHoa; ?>">
                  Mã sản phẩm: <span class="co-red"><?php echo $List_HH->idHangHoa; ?></span>
               </p>
            </div>
            <div class="price">
               <span class="priceNew amount"><?php echo $List_HH->giaMoi; ?><span class="underline">đ</span></span>
               <input type="hidden" name="gia" value="<?php echo $List_HH->giaMoi; ?>">
               <span class="priceOld amount"><?php echo $List_HH->gia; ?><span class="underline">đ</span></span>
               <span class="phantram">
                  <?php
                     $kq = round((($List_HH->gia - $List_HH->giaMoi) / $List_HH->gia) * 100, 1);
                     echo "-" . $kq . "%";
                  ?>
               </span>
            </div>
            <div class="tietkiem">(Tiết kiệm <span class="co-red amount"><?php echo $List_HH->gia - $List_HH->giaMoi; ?><span class="underline">đ</span></span>)
            </div>
            <div class="sale">
               <p>MEGA SALE 8-10.09</p>
            </div>
            <div class="size">
               <p class="title-item">Kích thước: <span class="co-red">*</span></p>
               <ul>
                  <label for="sizeS"><input type="radio" name="size" id="sizeS" value="S" required>S</label>
                  <label for="sizeM"><input type="radio" name="size" id="sizeM" value="M" required>M</label>
                  <label for="sizeL"><input type="radio" name="size" id="sizeL" value="L" required>L</label>
                  <label for="sizeXL"><input type="radio" name="size" id="sizeXL" value="XL" required>XL</label>
                  <label for="sizeXXL"><input type="radio" name="size" id="sizeXXL" value="XXL" required>XXL</label>
               </ul>
            </div>
            <p class="title-item chonSize">Hướng dẫn chọn size</p>
            <div class="soluong">
               <p class="title-item">Số lượng:</p>
               <span>
                  <p id="giam"><i class="fa-solid fa-minus"></i></p>
                  <input type="number" id="quantity" value="1" name="soLuong">
                  <p id="them"><i class="fa-solid fa-plus"></i></p>
               </span>
            </div>
            <div class="btn">
               <a href="" class="pay" id="muaNgay">
                  Mua ngay
               </a>
               <input type="submit" class="addCart" value="Thêm vào giỏ">
            </div>
            <div class="pay">
               <p>Phương thức thanh toán</p>
               <img src="./Img/phuongthucthanhtoan).webp" alt="">
            </div>
            <div class="quyenloi">
               <div class="item">
                  <img src="./Img/BaoHanh.webp" alt="">
                  <p>Bảo hành dây kéo áo khoát trọn đời</p>
               </div>
               <div class="item">
                  <img src="./Img/Camket.webp" alt="">
                  <p>Cam kết 1 đổi 1 nếu hàng lỗi</p>
               </div>
               <div class="item">
                  <img src="./Img/ThietkeGiong.webp" alt="">
                  <p>Sản phẩm giống thiết kế</p>
               </div>
            </div>
         </div>
         <div class="right-code">
            <div class="item">
               <p class="title-code">FREESHIP</p>
               <p class="desc">Miễn phí ship đơn hàng từ 299K</p>
               <div class="thaotac">
                  <button>Sao chép mã</button>
                  <a href="" id="open-dialog" data-target="dialog-1">Điều kiện</a>
               </div>
            </div>
            <div class="item">
               <p class="title-code">MÃ GIẢM 50K</p>
               <p class="desc">Mã giảm 50K cho hóa đơn từ 799K</p>
               <div class="thaotac">
                  <button>Sao chép mã</button>
                  <a href="" id="open-dialog" data-target="dialog-2">Điều kiện</a>
               </div>
            </div>
            <div class="item">
               <p class="title-code">MÃ GIẢM 30K</p>
               <p class="desc">Mã giảm 30K cho hóa đơn từ 579K</p>
               <div class="thaotac">
                  <button>Sao chép mã</button>
                  <a href="" id="open-dialog" data-target="dialog-3">Điều kiện</a>
               </div>
            </div>
            <div class="item">
               <p class="title-code">MÃ GIẢM 10K</p>
               <p class="desc">Mã giảm 10K cho hóa đơn từ 359K</p>
               <div class="thaotac">
                  <button>Sao chép mã</button>
                  <a href="" id="open-dialog" data-target="dialog-3">Điều kiện</a>
               </div>
            </div>
         </div>
      </div>
      <div class="bottom">
         <div class="row title-top">
            <div class="content-title mota">
               <p>Mô tả sản phẩm</p>
            </div>
            <div class="content-title thanhvien">
               <p>Chính sách thành viên</p>
            </div>
            <div class="content-title baohanh">
               <p>Đổi trả và bảo hành</p>
            </div>
         </div>
         <div class="content content-mota">
            <p class="desc"><?php echo $List_HH->moTa; ?></p>
         </div>
         <div class="content content-thanhvien active-content">
            <p><?php include'./Pages/ChinhSachThanhVien.php'; ?></p>
         </div>
         <div class="content content-baohanh active-content">
            <img src="./Img/chinh_sach_thanh_vien_2023.webp" alt="">
         </div>
      </div>
   </form>
</div>
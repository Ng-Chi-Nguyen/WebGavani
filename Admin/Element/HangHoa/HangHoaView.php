<?php
   include'./Element/Class/hangHoaCls.php';
   $HH = new hangHoa();
   $List_HH = $HH->showLoaiHang();
?>
<form action="./Element/HangHoa/XuLy.php?reqact=addNew" class="hangHoa" method="post" enctype="multipart/form-data">
   <h3 class="title">Hàng hóa</h3>
   <table>
      <div class="mg-bottom">
         <p>Tên hàng hóa</p>
         <input name="tenHangHoa" type="text">
      </div>
      <div class="mg-bottom">
         <p>Chọn loại hàng</p>
         <select name="idLoaiHang">
            <option>Chọn loại hàng</option>
            <?php foreach($List_HH as $i){ ?>
               <option value="<?php echo $i->idLoaiHang; ?>"><?php echo $i->idLoaiHang . ". " . $i->tenLoaiHang; ?></option>
            <?php
            }   
            ?>
         </select>
      </div>
      <div class="mg-bottom">
         <p>Giá</p>
         <input name="gia" type="number">
      </div>
      <div class="mg-bottom">
         <p>Giá mới</p>
         <input name="giaMoi" type="number">
      </div>
      <div class="mg-bottom">
         <p>Mô tả</p>
         <textarea name="moTa" id="content" cols="30" rows="10"></textarea>
      </div>
      <div class="mg-bottom">
         <p>Tên hình ảnh</p>
         <input name="tenHinhAnh" type="text">
      </div>
      <div class="mg-bottom">
         <p>Hình ảnh</p>
         <input type="file" name="fileimage">
      </div>
      <div class="mg-bottom">
         <p></p>
         <input type="submit" value="Thêm" class="btn-submit">
      </div>
   </table>
</form>
<div class="List_HH">
   <?php
      $List_HH = $HH->showHangHoa();
      $soLuongHangHoa = count($List_HH);
   ?>
   <h3 class="title">Tổng số hàng hóa: <?php echo $soLuongHangHoa; ?></h3>
   <table class="tbl_hanghoa">
      <h3 class="title">Danh sách loại hàng</h3>
      <tr class="thead">
         <th>Id hàng hóa</th>
         <th>Tên hàng hóa</th>
         <th>Id loại hàng</th>
         <th>Giá</th>
         <th>Giá mới</th>
         <th>Mô tả</th>
         <th>Tên hình ảnh</th>
         <th>Hình ảnh</th>
         <th>Thao tác</th>
      </tr>
      <?php foreach($List_HH as $i){ ?>
         <tr class="tbody">
            <th><?php echo $i->idHangHoa; ?></th>
            <th><?php echo $i->tenHangHoa; ?></th>
            <th><?php echo $i->idLoaiHang; ?></th>
            <th><?php echo $i->gia; ?>đ</th>
            <th><?php echo $i->giaMoi; ?>đ</th>
            <th>
               <div class="scrollable-content">
                  <?php echo $i->moTa; ?>
               </div>
            </th>
            <th><?php echo $i->tenHinhAnh; ?></th>
            <th class="th-img">
               <a href="index.php?reqAdmin=HinhAnhMoTa&idHangHoa=<?php echo $i->idHangHoa; ?>">
                  <img src="data:image/png;base64,<?php echo $i->hinhAnh; ?>" alt="<?php echo $i->tenHinhAnh; ?>">
               </a>
            </th>
            <th class="thaotac">
               <a href="index.php?reqAdmin=updateHangHoa&idHangHoa=<?php echo $i->idHangHoa; ?>">
                  <img src="./Img/Sua.png" alt="sua">
               </a>
               <a href="./Element/HangHoa/XuLy.php?reqact=delete&idHangHoa=<?php echo $i->idHangHoa; ?>">
                  <img src="./Img/Xoa.png" alt="xoa">
               </a>
               <a href="index.php?reqAdmin=HinhAnhMoTa&idHangHoa=<?php echo $i->idHangHoa; ?>">
                  <img src="./Img/ThemAnh.png" alt="Them Anh">
               </a>
            </th>
         </tr>
      <?php } ?>
   </table>
</div>
<?php
   include'./Element/Class/hangHoaCls.php';
   $HH = new hangHoa();
   $idHangHoa = $_GET['idHangHoa'];
   $List_HH = $HH->IdHangHoa($idHangHoa);
   $List_LH = $HH->showLoaiHang();
   // echo $List_HH->hinhAnh;
   // echo $List_HH->idHangHoa;
?>
<form action="./Element/HangHoa/XuLy.php?reqact=update&idHangHoa=<?php echo $List_HH->idHangHoa; ?>" class="hangHoa updateHangHoa" method="post" enctype="multipart/form-data">
   <h3 class="title">Hàng hóa</h3>
   <table>
      <div class="mg-bottom">
         <p>Tên hàng hóa</p>
         <input name="tenHangHoa" value="<?php echo $List_HH->tenHangHoa; ?>" type="text">
      </div>
      <div class="mg-bottom">
         <p>Chọn loại hàng</p>
         <select name="idLoaiHang">
            <?php foreach($List_LH as $i){ ?>
               <option value="<?php echo $i->idLoaiHang; ?>" <?php echo ($i->idLoaiHang == $List_HH->idLoaiHang) ? 'selected' : ''; ?>>
            <?php echo $i->idLoaiHang . ". " . $i->tenLoaiHang; ?>
      </option>
            <?php
            }   
            ?>
         </select>
      </div>
      <div class="mg-bottom">
         <p>Giá</p>
         <input name="gia" value="<?php echo $List_HH->gia; ?>" type="number">
      </div>
      <div class="mg-bottom">
         <p>Giá mới</p>
         <input name="giaMoi" value="<?php echo $List_HH->giaMoi; ?>" type="number">
      </div>
      <div class="mg-bottom">
         <p>Mô tả</p>
         <textarea name="moTa" id="content" cols="30" rows="10"><?php echo $List_HH->moTa; ?></textarea>
      </div>
      <div class="mg-bottom">
         <p>Tên hình ảnh</p>
         <input name="tenHinhAnh" value="<?php echo $List_HH->tenHinhAnh; ?>" type="text">
      </div>
      <div class="mg-bottom">
         <p>Hình ảnh</p>
         <input type="file" name="fileimage">
         <br>
         <div class="image">
            <img src="data:image/png;base64,<?php echo $List_HH->hinhAnh; ?>" alt="<?php echo $List_HH->tenHinhAnh; ?>">
         </div>
         <input type="hidden" name="fileimage" value="<?php echo $List_HH->hinhAnh; ?>">
      </div>
      <div class="mg-bottom">
         <p></p>
         <input type="submit" value="Cập nhật" class="btn-submit">
      </div>
   </table>
</form>
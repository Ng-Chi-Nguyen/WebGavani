<?php
   include'./Element/Class/loaiHangCls.php';
   $loaiHang = new loaiHang();
   $idLoaiHang = $_REQUEST['idLoaiHang'];
   $getLoaiHang = $loaiHang->IdLoaiHang($idLoaiHang);
   $getLoaiHang_DM = $loaiHang->showDanhMuc();
?>
<form name="loaiHang" class="loaiHang" action="./Element/LoaiHang/XuLy.php?reqact=update&idLoaiHang=<?php echo $getLoaiHang->idLoaiHang; ?>" method="post">
   <h2 class="title">Cập nhật loại hàng</h2>
   <select name="idDanhMuc">
   <?php foreach($getLoaiHang_DM as $i){ ?>
      <option value="<?php echo $i->idDanhMuc; ?>" <?php echo ($i->idDanhMuc == $getLoaiHang->idDanhMuc) ? 'selected' : ''; ?>>
         <?php echo $i->idDanhMuc . ". " . $i->tenDanhMuc; ?>
      </option>
   <?php } ?>
</select>
   <br>
   <input name="tenLoaiHang" value="<?php echo $getLoaiHang->tenLoaiHang; ?>" type="text">
   <input class="btn-submit" type="submit" value="Cập nhật">
</form>

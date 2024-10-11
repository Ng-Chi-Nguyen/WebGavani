<?php
   include'./Element/Class/danhMucCls.php';
   $danhmuc = new DanhMuc();
   $idDanhMuc = $_REQUEST['idDanhMuc'];
   $getDanhMuc = $danhmuc->IdDanhMuc($idDanhMuc);
?>
<form name="danhmuc" class="danhMuc" action="./Element/DanhMuc/XuLy.php?reqact=update&idDanhMuc=<?php echo $getDanhMuc->idDanhMuc; ?>" method="post">
   <h2 class="title">Cập nhật danh mục</h2>
   <input name="tenDanhMuc" value="<?php echo $getDanhMuc->tenDanhMuc; ?>" type="text">
   <input class="btn-submit" type="submit" value="Cập nhật">
</form>

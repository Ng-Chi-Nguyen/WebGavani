<?php
   include'./Element/Class/hangHoaCls.php';
   $HH = new hangHoa();
   $idHangHoa = $_GET['idHangHoa'];
   $List_HH = $HH->IdHangHoa($idHangHoa);
   $List_LH = $HH->showLoaiHang();
   $List_HH_2 = $HH->showAnhMoTa($idHangHoa);

?>
<form action="./Element/HangHoa/XuLy.php?reqact=updateImage&idHangHoa=<?php echo $List_HH->idHangHoa ?>" class="hangHoa updateHangHoa_MoTa" method="post" enctype="multipart/form-data">
   <h3 class="title">Thêm ảnh mô tả cho hàng hóa "<?php echo $List_HH->tenHangHoa; ?>"</h3>
   <label>Ảnh mô tả</label>
   <input name="hinhAnhMoTa[]" multiple type="file"> <br>
   <?php 
   foreach ($List_HH_2 as $i) {
      ?>
         <img src="data:image/png;base64,<?php echo $i->hinhAnhMoTa; ?>">
      <?php
      }
   ?>
<br>
<?php 
   foreach ($List_HH_2 as $i) {
      ?>
         <input type="hidden" name="anhMoTa_old" value="<?php echo $i->hinhAnhMoTa?>">
      <?php
      }
   ?>
   <br>
   <input type="submit"  class="btn-submit">
</form>
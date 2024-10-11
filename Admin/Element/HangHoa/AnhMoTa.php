<?php
   include'./Element/Class/hangHoaCls.php';
   $HH = new hangHoa();
   $idHangHoa = $_GET['idHangHoa'];
   $List_HH = $HH->IdHangHoa($idHangHoa);
   $List_HH_2 = $HH->showAnhMoTa($List_HH->idHangHoa);
?>
<form action="./Element/HangHoa/XuLy.php?reqact=addImage&idHangHoa=<?php echo $List_HH->idHangHoa ?>" class="hangHoa updateHangHoa" method="post" enctype="multipart/form-data">
   <h3 class="title">Thêm ảnh mô tả cho hàng hóa "<?php echo $List_HH->tenHangHoa; ?>"</h3>
   <label>Ảnh mô tả</label>
   <input name="hinhAnhMoTa[]" multiple type="file"> <br>
   <br>
   <input type="submit"  class="btn-submit">
</form>
<div class="List_HH_MoTa_Img List_HH">
<table class="tbl_hanghoa">
      <h3 class="title">Danh sách loại hàng</h3>
      <tr class="thead">
         <th>Id hàng hóa</th>
         <th>Tên hàng hóa</th>
         <th>Hình ảnh</th>
         <th>Hình ảnh mô tả</th>
         <th>Thao tác</th>
      </tr>
      <tr class="tbody">
         <th><?php echo $List_HH->idHangHoa; ?></th>
         <th><?php echo $List_HH->tenHangHoa; ?></th>
         <th class="th-img">
            <img src="data:image/png;base64,<?php echo $List_HH->hinhAnh; ?>" alt="<?php echo $List_HH->tenHinhAnh; ?>">
         </th>
         <th class="image_mota">
            <?php 
               foreach ($List_HH_2 as $i) {
            ?>
               <img src="data:image/png;base64,<?php echo $i->hinhAnhMoTa; ?>" alt="Ảnh mô tả">
            <?php
               }
            ?>
            </th>
            <th class="thaotac">
               <a href="index.php?reqAdmin=HinhAnhMoTaUpdate&idHangHoa=<?php echo $List_HH->idHangHoa; ?>">
                  <img src="./Img/Sua.png" alt="sua">
               </a>
               <a href="./Element/HangHoa/XuLy.php?reqact=deleteHinhAnhMoTa&idHangHoa=<?php echo $List_HH->idHangHoa; ?>">
                  <img src="./Img/Xoa.png" alt="xoa">
               </a>
            </th>
         </tr>
   </table>
</div>
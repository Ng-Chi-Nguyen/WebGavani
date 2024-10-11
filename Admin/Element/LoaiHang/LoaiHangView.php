<!-- Danh sach loai hang -->
<?php
   include'./Element/Class/loaiHangCls.php';
   $list_LH = new loaiHang();
   $loaiHangList = $list_LH->showLoaiHang();
   $loaiHangList_DM = $list_LH->showDanhMuc();
   
?>

<form name="loaiHang" class="loaiHang" action="./Element/LoaiHang/XuLy.php?reqact=addNew" method="post">
   <h2 class="title">Loại hàng</h2>
   <select name="idDanhMuc">
      <option>Chọn tên danh mục</option>
      <?php foreach($loaiHangList_DM as $i){ ?>
         <option  value="<?php echo $i->idDanhMuc; ?>"><?php echo $i->idDanhMuc .". ". $i->tenDanhMuc; ?></option>
      <?php } ?>
   </select>
   <br>
   <input class="addLH" name="tenLoaiHang" type="text" placeholder="Tên loại hàng">
   <input class="btn-submit" type="submit" value="Thêm">
</form>
<div class="list_LH">
   <h3 class="title">Danh sách loại hàng</h3>
   <table class="tbl_loaihang">
      <tr class="thead">
         <th>ID</th>
         <th>Id danh mục</th>
         <th>Tên loại hàng</th>
         <th>Thao tác</th>
      </tr>
      <tr class="tbody">
      <?php foreach($loaiHangList as $i){ ?>
         <th><?php echo $i->idLoaiHang; ?></th>
         <th><?php echo $i->idDanhMuc; ?></th>
         <th><a href="index.php?reqAdmin=LoaiHangCoHangHoa&idLoaiHang=<?php echo $i->idLoaiHang; ?>" class="co-black"><?php echo $i->tenLoaiHang; ?></a></th>
         <th>
            <a href="index.php?reqAdmin=updateLoaiHang&idLoaiHang=<?php echo $i->idLoaiHang; ?>">
               <img src="./Img/Sua.png" alt="sua">
            </a>
            <a href="./Element/LoaiHang/XuLy.php?reqact=delete&idLoaiHang=<?php echo $i->idLoaiHang; ?>">
               <img src="./Img/Xoa.png" alt="xoa">
            </a>
         </th>
      </tr>
      <?php
      }
      ?>
   </table>
</div>
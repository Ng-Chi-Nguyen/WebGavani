<form name="danhMuc" class="danhMuc" action="./Element/DanhMuc/XuLy.php?reqact=addNew" method="post">
   <h3 class="title">Danh mục</h3>
   <input name="tenDanhMuc" type="text" placeholder="Tên danh mục">
   <input class="btn-submit" type="submit" value="Thêm">
</form>

<!-- Danh sach loai hang -->
<?php
   include'./Element/Class/danhMucCls.php';
   $list_DM = new DanhMuc();
   $danhMucList = $list_DM->showDanhMuc();
   
?>
<div class="list_DM">
   <h3 class="title">Danh sách danh mục</h3>
   <table class="tbl_danhmuc">
      <tr class="thead">
         <th>ID</th>
         <th>Tên danh mục</th>
         <th>Thao tác</th>
      </tr>
      <tr class="tbody">
      <?php foreach($danhMucList as $i){ ?>
         <th><?php echo $i->idDanhMuc; ?></th>
         <th><?php echo $i->tenDanhMuc; ?></th>
         <th>
            <a href="index.php?reqAdmin=updateDanhMuc&idDanhMuc=<?php echo $i->idDanhMuc; ?>">
               <img src="./Img/Sua.png" alt="sua">
            </a>
            <a href="./Element/DanhMuc/XuLy.php?reqact=delete&idDanhMuc=<?php echo $i->idDanhMuc; ?>">
               <img src="./Img/Xoa.png" alt="xoa">
            </a>
         </th>
      </tr>
      <?php
      }
      ?>
   </table>
</div>
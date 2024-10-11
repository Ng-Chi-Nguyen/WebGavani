<?php
      include'./Admin/Element/Class/danhMucCls.php';
      $DM = new DanhMuc();
      $List_DM = $DM->showDanhMuc();
   ?>
<ul class="left">
   <?php foreach($List_DM as $i){ ?>
   <li class="danhMucHover" data-id="<?php echo $i->idDanhMuc; ?>">
      <a href="#"><?php echo $i->tenDanhMuc; ?></a>
      <i class="fa-solid fa-chevron-right"></i>
      <?php
         $idDanhMuc = $i->idDanhMuc;
         $List_LH = $DM->getLoaiHangByDanhMuc($idDanhMuc);
         if(!empty($List_LH)){
      ?>
      <ul class="category">
         <?php foreach($List_LH as $lh){ ?>
            <li><?php echo $lh->tenLoaiHang; ?></li>
         <?php } ?>
      </ul>
   </li>
   <?php 
         } 
      }
   ?>
</ul>
<?php
   include'../../Admin/Element/Class/diaChiCls.php';

   if (isset($_GET['id_Tinh'])) {
      $id_Tinh = $_GET['id_Tinh'];
      $DiaChi = new DiaChi();
      $List_DC_Huyen = $DiaChi->showDiaChiQuanHuyenTheoTinhTP($id_Tinh);
      if ($List_DC_Huyen) {
         foreach ($List_DC_Huyen as $i) {
            $DviHC_2 = TenDonViHC($i->id_HanhChinh);
         ?>
            <option value="<?php echo $i->id_Huyen?>"><?php echo $DviHC_2 . " " . $i->name ?></option>
         <?php
         }
      }
   }
   if (isset($_GET['id_Huyen'])) {
      $id_Huyen = $_GET['id_Huyen'];  
      $DiaChi = new DiaChi();
      $List_DC_Xa = $DiaChi->showDiaChiXaPhuongTheoHuyenQuan($id_Huyen);
      if ($List_DC_Xa) {
         foreach ($List_DC_Xa as $i) {
            $DviHC_3 = TenDonViHC($i->id_HanhChinh);
         ?>
            <option value="<?php echo $i->id_Xa?>"><?php echo $DviHC_3 . " " .  $i->name ?></option>
         <?php
         }
      }
   }

   
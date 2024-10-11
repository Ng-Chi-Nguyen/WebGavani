<?php
session_start();
include_once '../../Admin/Element/Class/taiKhoanCls.php';
$taikhoan = new TaiKhoan();

if(isset($_SESSION['idTaiKhoan'])){
    $idTK = $_SESSION['idTaiKhoan'];
    $TK = $taikhoan->TaiKhoanTheoEmail($idTK);

    if ($TK) {
   //  echo  $_REQUEST['idDiaChi'];
?>
<div class="DiaChiCapNhat model_ThemDiaChi">
   <div class="title">CẬP NHẬT ĐỊA CHỈ MỚI</div>
<?php
   if(isset($_REQUEST['idDiaChi'])){

      $idDiaChi = $_REQUEST['idDiaChi'];
      $showDiaChiId = $taikhoan->showDiaChiCuaEmailTheoId($idDiaChi);
            foreach($showDiaChiId as $i){
            ?>
            <form action="./Pages/TaiKhoan/XuLy.php?infoUser=CapNhatDiaChi" method="post">
                <input type="hidden" name="idDiaChi" value="<?php echo $i->idDiaChi ?>">
                <input type="hidden" name="Email" value="<?php echo $i->Email ?>">
                <input type="text" name="hoTen" value="<?php echo $i->hoTen ?>">
                <input type="phone" name="soDienThoai" value="<?php echo $i->soDienThoai ?>">
                <input type="text" name="diaChi" value="<?php echo $i->diaChi ?>">
                <div class="checkbox">
                    <input type="checkbox" name="macDinh" <?php echo ($i->macDinh === 'on') ? 'checked' : ''; ?>>
                    <p>Đặc làm mặc định</p>
                </div>
                <div class="Gui">
                    <input type="reset" value="Hủy">
                    <input type="submit" value="Cập nhật">
                </div>
                <p class="close close_CN_DC">&#10007;</p>
            </form>
            <?php
            }
   }
      ?>
</div>
      <?php
   } else {
      echo "K thay TK";
   }
}else{
   echo "idDia chi k ton tai";
}
?>


<?php
   include'./Element/Class/taiKhoanCls.php';
   $taikhoan = new TaiKhoan();
   $List_TK = $taikhoan->showTaiKhoan();
?>


<div class="TaiKhoan">
   <h2>Tài khoản</h2>
   <table>
      <tr>
         <td class="co-red">Email</td>
         <td class="co-red">Mật khẩu</td>
         <td>Số điện thoại</td>
         <td>Tên tài khoản</td>
      </tr>
      <?php foreach($List_TK as $i){ ?>
      <tr>
         <td><?php echo $i->Email; ?></td>
         <td><?php echo $i->matKhau; ?></td>
         <td><?php echo $i->soDienThoai; ?></td>
         <td><?php echo $i->hoTen; ?></td>
      </tr>
      <?php } ?>
   </table>
</div>
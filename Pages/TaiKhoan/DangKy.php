<div class="Vitri">
   <a href="index.php">Trang chủ /</a>
   <a href="index.php?req=Login"> Tài khoản</a>
   <p> / Đăng ký /</p>
</div>
<div class="Login">
   <form class="formLogin" action="./Pages/TaiKhoan/XuLy.php?infoUser=addNew" method="post">
      <p class="title">ĐĂNG KÝ TÀI KHOẢN</p>
      <p class="noteDK">Bạn đã có tài khoản ? <a href="index.php?req=DangNhap">Đăng nhập tại đây</a></p>
      <p class="info">THÔNG TIN CÁ NHÂN</p>
      <label >Họ và tên <span class="co-red">*</span></label> <br>
      <input type="text" name="hoVaTen" placeholder="Họ và tên"><br>
      <label >Số điện thoại <span class="co-red">*</span></label> <br>
      <input type="phone" name="soDienThoai" placeholder="Số điện thoại"><br>
      <label >Email <span class="co-red">*</span></label> <br>
      <input type="email" name="Email"  placeholder="Email"><br>
      <label >Mất khẫu <span class="co-red">*</span></label> <br>
      <input type="password" name="matKhau"  placeholder="Mất khẫu">
      <input type="submit" name="" value="Đăng ký">
      <p class="phuongAnKhac-title">Hoặc đăng ký bằng</p>
      <div class="phuongAnKhac">
         <div class="image-login">
            <img src="./Img/Login-google.webp" alt="Google Login">
            <p>Đăng nhập google</p>
         </div>
         <div class="image-login">
            <img src="./Img/Login-fb.png" alt="Fakebook Login">
            <p>Đăng nhập fakebook</p>
         </div>
      </div>
   </form>
</div>
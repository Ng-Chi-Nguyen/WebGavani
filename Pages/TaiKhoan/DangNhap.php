<div class="Vitri">
   <a href="index.php">Trang chủ /</a>
   <a href="index.php?req=TaiKhoan"> Tài khoản</a>
   <p> / Đăng nhập /</p>
</div>
<div class="Login">
   <form class="formLogin"  action="./Pages/TaiKhoan/XuLy.php?infoUser=CheckLogin" method="post">
      <p class="title">ĐĂNG NHẬP TÀI KHOẢN</p>
      <p class="noteDK">Bạn chưa có tài khoản ? <a href="index.php?req=DangKy">Đăng ký tại đây</a></p>
      <label for="Email">Email <span class="co-red">*</span></label> <br>
      <input type="email" name="Email" id="Email" placeholder="Email"><br>
      <label for="MatKhau">Mất khẫu <span class="co-red">*</span></label> <br>
      <input type="password" name="matKhau" id="password" placeholder="Mất khẫu">
      <p class="noteQuen">Quên mật khẩu? <a href="">Nhấn vào đây</a></p>
      <input type="submit" name="" id="" value="Đăng nhập">
      <p class="phuongAnKhac-title">Hoặc đăng nhập bằng</p>
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
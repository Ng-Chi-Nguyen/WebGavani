$(document).ready(function () {
   $('.id_Tinh').change(function () {
      var x = $(this).val();
      // alert($(this).val());
      $.get("./Pages/ThanhToan/DiaChi_ajax.php", { id_Tinh: x }, function (data) {
         $(".id_Huyen").html('<option>Quận - huyện</option>' + data);
      });
   });
});
$(document).ready(function () {
   $('.id_Huyen').change(function () {
      var x = $(this).val();
      $.get("./Pages/ThanhToan/DiaChi_ajax.php", { id_Huyen: x }, function (data) {
         $(".id_Xa").html('<option>Xã - phường</option>' + data);
      });
   });
});
// Cap nhat dia chi
$(document).ready(function () {
   $("#CapNhat_DiaChi").hide();
   // Sử dụng 'on' để gán sự kiện click cho tất cả các thẻ <p> có id Mo_CapNhat_DiaChi
   $(document).on('click', '#Mo_CapNhat_DiaChi', function (e) {
      e.preventDefault();
      // Lấy giá trị từ thuộc tính data-idDiaChi
      var $idDiaChi = $(this).attr('data-idDiaChi');
      // alert($idDiaChi);
      $('.form_CapNhat_DiaChi').load("./Pages/TaiKhoan/DiaChiCapNhat.php", { idDiaChi: $idDiaChi }, function (response, status, request) {
         this;
      })
      $('#CapNhat_DiaChi').show(); // Khi click vao se show ra
   });
   $(document).on('click', '.close_CN_DC', function (e) {
      e.preventDefault();
      $("#CapNhat_DiaChi").hide();
   })
});
// Them dia chi
$(document).ready(function () {
   $("#modelDiaChi").hide();
   // Sử dụng 'on' để gán sự kiện click cho tất cả các thẻ <p> có id Mo_CapNhat_DiaChi
   $(document).on('click', '#ThemDiaChi_TaiKhoan', function (e) {
      e.preventDefault();
      $('#modelDiaChi').show(); // Khi click vao se show ra
   });
   $(document).on('click', '.close_Model_ThemDC', function (e) {
      e.preventDefault();
      $("#modelDiaChi").hide();
   })
});


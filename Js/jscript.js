document.addEventListener('DOMContentLoaded', function () {
   const input = document.getElementById('animated-input');
   const placeholderText = "Tìm kiếm sản phẩm ...";
   let index = 0;

   function typePlaceholder() {
      if (index < placeholderText.length) {
         input.setAttribute('placeholder', input.getAttribute('placeholder') + placeholderText.charAt(index));
         index++;
         setTimeout(typePlaceholder, 100); // Tốc độ gõ chữ
      } else {
         setTimeout(() => {
            input.setAttribute('placeholder', '');
            index = 0;
            setTimeout(typePlaceholder, 100); // Khoảng dừng trước khi lặp lại
         }, 1000); // Thời gian dừng trước khi lặp lại
      }
   }

   typePlaceholder(); // Bắt đầu hiệu ứng
});
// the icon-fixed
window.addEventListener('scroll', function () {
   var firstImg = document.querySelector('.info-fixed .first-img');
   if (window.scrollY > 500) {
      firstImg.classList.add('visible');
      firstImg.classList.remove('hidden');
   } else {
      firstImg.classList.remove('visible');
      firstImg.classList.add('hidden');
   }
});
// Scroll len dau trang
document.getElementById('scrollToTop').addEventListener('click', function (e) {
   e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
   window.scroll({
      top: 0,
      behavior: 'smooth'
   });
});
// Lấy phần tử .itemHover và .menu
var itemHover = document.querySelector('.header .header-bottom .itemHover');
var menu = document.querySelector('.BaoHanh .left');
// Hàm hiển thị menu
function showMenu() {
   menu.style.display = 'block';
}
// Hàm ẩn menu
function hideMenu() {
   menu.style.display = 'none';
}
// Thêm sự kiện hover vào .itemHover
itemHover.addEventListener('mouseenter', showMenu);
itemHover.addEventListener('mouseleave', function () {
   // Kiểm tra nếu chuột không nằm trên menu thì ẩn menu
   setTimeout(function () {
      if (!menu.matches(':hover')) {
         hideMenu();
      }
   }, 200); // Đặt một chút thời gian chờ để kiểm tra hover trên menu
});
menu.addEventListener('mouseleave', function () {
   setTimeout(function () {
      if (!menu.matches(':hover') && !itemHover.matches(':hover')) {
         hideMenu();
      }
   }, 200); // Thời gian chờ để kiểm tra hover trên menu
});
// Dieu kien ma giam gia 1.000.000
document.addEventListener('DOMContentLoaded', () => {
   const amountElements = document.querySelectorAll('.amount');
   const formatter = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' });

   amountElements.forEach(element => {
      // Lấy nội dung văn bản và loại bỏ ký hiệu "đ" nếu có
      let textContent = element.textContent.replace('đ', '').trim();

      // Loại bỏ dấu phân cách nghìn và chuyển đổi thành số
      let amount = parseInt(textContent.replace(/\./g, ''));

      // Định dạng số tiền và thay thế ký hiệu "₫" bằng "đ"
      let formattedAmount = formatter.format(amount).replace('đ', '₫');

      // Cập nhật nội dung của phần tử
      element.textContent = formattedAmount;
   });
});
// Click chon size
document.addEventListener("DOMContentLoaded", function () {
   const sizes = document.querySelectorAll(".SanPham .body .right .size ul label");

   sizes.forEach(size => {
      size.addEventListener("click", function () {
         // Xóa lớp active từ tất cả các phần tử
         sizes.forEach(item => item.classList.remove("active"));

         // Thêm lớp active vào phần tử được nhấp
         this.classList.add("active");
      });
   });
});
// Khi không chọn size, in ra thông báo
var formSanPham = document.getElementById('formSanPham');
var thongBaoLoi = document.getElementById('thong-bao-loi');

formSanPham.addEventListener('submit', function (event) {
   var kichThuocDaChon = document.querySelector('input[name="size"]:checked');

   if (!kichThuocDaChon) {
      thongBaoLoi.style.display = 'block'; // Hiển thị thông báo lỗi
      event.preventDefault(); // Ngăn chặn việc gửi form
   } else {
      thongBaoLoi.style.display = 'none'; // Ẩn thông báo lỗi nếu đã chọn
   }
});


document.addEventListener("DOMContentLoaded", function () {
   const sizes = document.querySelectorAll(".SanPham .body .right .size ul label input[type='radio']");
   const coRed = document.querySelector(".SanPham .body .right .size .co-red");

   sizes.forEach(size => {
      size.addEventListener("change", function () {
         if (document.querySelector('input[name="size"]:checked')) {
            coRed.style.display = 'none'; // Ẩn phần tử co-red khi chọn kích thước
         } else {
            coRed.style.display = 'inline'; // Hiển thị phần tử co-red nếu không chọn kích thước
         }
      });
   });
});
// An hien bottom 
document.addEventListener("DOMContentLoaded", function () {
   // Lấy các phần tử tiêu đề
   const motaTab = document.querySelector(".content-title.mota");
   const thanhvienTab = document.querySelector(".content-title.thanhvien");
   const baohanhTab = document.querySelector(".content-title.baohanh");
   // Lấy các phần tử nội dung
   const motaContent = document.querySelector(".content-mota");
   const thanhvienContent = document.querySelector(".content-thanhvien");
   const baohanhContent = document.querySelector(".content-baohanh");
   // Hàm để làm sạch lớp active từ tất cả các tab
   function removeActiveClassFromTabs() {
      motaTab.classList.remove("active");
      thanhvienTab.classList.remove("active");
      baohanhTab.classList.remove("active");
   }
   // Hàm để cập nhật nội dung và lớp active
   function updateContentAndActiveTab(activeTab, activeContent) {
      removeActiveClassFromTabs(); // Xóa lớp active từ tất cả các tab
      activeTab.classList.add("active"); // Thêm lớp active vào tab hiện tại
      // Hiện phần nội dung và ẩn các phần khác
      motaContent.style.display = "none";
      thanhvienContent.style.display = "none";
      baohanhContent.style.display = "none";
      activeContent.style.display = "block";
   }
   // Thêm sự kiện click vào mỗi phần tử tiêu đề
   motaTab.addEventListener("click", function () {
      updateContentAndActiveTab(motaTab, motaContent);
   });
   thanhvienTab.addEventListener("click", function () {
      updateContentAndActiveTab(thanhvienTab, thanhvienContent);
   });
   baohanhTab.addEventListener("click", function () {
      updateContentAndActiveTab(baohanhTab, baohanhContent);
   });
   // Thiết lập tab đầu tiên là mặc định khi trang tải
   updateContentAndActiveTab(motaTab, motaContent);
});
// Menu SanPham
//Tang giam so luong page gio hang

// Tong tien
document.addEventListener('DOMContentLoaded', () => {
   // Lấy tất cả các phần tử có lớp .item
   const itemElements = document.querySelectorAll('.item');
   let total = 0;

   itemElements.forEach(item => {
      // Lấy phần tử chứa giá tiền
      const priceElement = item.querySelector('.amount');
      if (priceElement) {
         const priceText = priceElement.textContent;
         // Loại bỏ ký tự 'đ' và chuyển đổi giá trị thành số
         const price = parseFloat(priceText.replace('đ', '').replace(',', '').trim());
         if (!isNaN(price)) {
            total += price;
         }
      }
   });

   // Cập nhật tổng tiền vào phần tử với ID 'tongtien'
   const totalPriceElement = document.getElementById('tongtien');
   if (totalPriceElement) {
      totalPriceElement.textContent = `${total.toLocaleString()}đ`;
   }
});
// Them index item vao gio hang
// Hiển thị các tùy chọn "size" và "số lượng" khi nhấn nút "Thêm vào giỏ hàng"
document.querySelectorAll('.show-options-btn').forEach(function (button) {
   button.addEventListener('click', function () {
      // Hiển thị các trường size và số lượng
      var form = this.closest('form');
      form.querySelector('.size-quantity').style.display = 'block';

      // Hiển thị nút submit và ẩn nút "Thêm vào giỏ hàng"
      form.querySelector('.cart').style.display = 'inline-block';
      this.style.display = 'none';
   });
});

// Kiểm tra form trước khi gửi
function validateForm(form) {
   var size = form.querySelector('[name="size"]').value;
   var soLuong = form.querySelector('[name="soLuong"]').value;

   if (size === "" || soLuong === "") {
      alert("Vui lòng chọn size và số lượng trước khi thêm vào giỏ hàng.");
      return false;
   }
   return true;
}

document.addEventListener('DOMContentLoaded', function () {
   const quantityInput = document.getElementById('quantity');
   const decreaseButton = document.getElementById('giam');
   const increaseButton = document.getElementById('them');


   // Sự kiện click cho nút giảm
   decreaseButton.addEventListener('click', function () {
      let currentValue = parseInt(quantityInput.value);
      if (currentValue > 1) {
         quantityInput.value = currentValue - 1;
      }
   });

   // Sự kiện click cho nút tăng
   increaseButton.addEventListener('click', function () {
      let currentValue = parseInt(quantityInput.value);
      quantityInput.value = currentValue + 1;
   });
});

function showModel() {
   const modelDiaChi = document.getElementById('modelDiaChi'); // Lấy phần tử mô hình
   modelDiaChi.style.display = "block"; // Thay đổi thuộc tính display thành "block"
}

function closeModel() {
   const modelDiaChi = document.getElementById('modelDiaChi'); // Lấy phần tử mô hình
   modelDiaChi.style.display = "none"; // Đặt thuộc tính display thành "none" để ẩn mô hình
}

function showModelQTGH(id) {
   // Ẩn tất cả các modal
   const modals = document.querySelectorAll('.model');
   modals.forEach(modal => {
      modal.style.display = 'none';
   });

   // Hiện modal tương ứng
   const modalToShow = document.getElementById('modelQTGH_' + id);
   if (modalToShow) {
      modalToShow.style.display = 'block';
   }
}

function closeModelQTGH(id) {
   const modalToClose = document.getElementById('modelQTGH_' + id);
   if (modalToClose) {
      modalToClose.style.display = 'none';
   }
}

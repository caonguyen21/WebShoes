// Lấy phần tử chứa sản phẩm
const productContainer = document.getElementById("product-container");

// Nút xem thêm
const loadMoreBtn = document.getElementById("load-more-btn");

// Số lượng sản phẩm cần tải thêm
const loadCount = 8;

// Số sản phẩm đã hiển thị
let visibleCount = 0;

// Khi người dùng nhấp vào nút "Xem thêm"
loadMoreBtn.addEventListener("click", () => {
  // Gọi API để lấy sản phẩm
  fetch("api/getproduct_trangthai.php")
    .then((response) => response.json())
    .then((data) => {
      // Tạo các phần tử sản phẩm và thêm chúng vào phần tử chứa sản phẩm
      data.forEach((product) => {
        const productDiv = document.createElement("div");
        productDiv.classList.add("product");
        productDiv.innerText = product.TenSP;
        productContainer.appendChild(productDiv);
      });

      // Cập nhật số sản phẩm đã hiển thị
      visibleCount += data.length;

      // Kiểm tra xem còn sản phẩm để tải hay không
      if (visibleCount >= data[0].Total) {
        loadMoreBtn.style.display = "none";
      }
    })
    .catch((error) => console.error(error));
});

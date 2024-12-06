document.addEventListener("DOMContentLoaded", function () {
  const quantityInput = document.getElementById("quantity");
  const priceElement = document.getElementById("price");
  const basePrice = parseFloat(priceElement.dataset.price); // Lấy giá cơ bản từ data-price

  // Hàm cập nhật giá
  function updatePrice() {
    const quantity = parseInt(quantityInput.value) || 1;
    const totalPrice = basePrice * quantity;
    priceElement.textContent = new Intl.NumberFormat("vi-VN", {
      style: "currency",
      currency: "VND",
    }).format(totalPrice);
  }

  // Sự kiện giảm số lượng
  document
    .querySelector(".decrease")
    .addEventListener("click", function (event) {
      console.log("hello");
      event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>
      if (quantityInput.value > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
        updatePrice();
      }
    });

  // Sự kiện tăng số lượng
  document
    .querySelector(".increase")
    .addEventListener("click", function (event) {
      event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>
      quantityInput.value = parseInt(quantityInput.value) + 1;
      updatePrice();
    });

  // Cập nhật giá khi người dùng thay đổi số lượng
  quantityInput.addEventListener("input", updatePrice);

  // Cập nhật giá ban đầu khi trang tải
  updatePrice();
});

//

document.addEventListener("DOMContentLoaded", function () {
  const smallImages = document.querySelectorAll(".small-img");
  const mainImage = document.getElementById("main-image");

  smallImages.forEach((image) => {
    image.addEventListener("click", function () {
      // Thay đổi src của ảnh lớn thành src của ảnh được click
      mainImage.src = this.src;

      mainImage.style.opacity = 0;
      setTimeout(() => {
        mainImage.style.opacity = 1;
      }, 200);
    });
  });
});

// Select all checkboxes and the delete button
const checkboxes = document.querySelectorAll(
  '.cart-table input[type="checkbox"]'
);
const deleteButton = document.querySelector(".cart-delete-conti .btn");

// Function to toggle the active class on the delete button
function toggleDeleteButton() {
  const anyChecked = Array.from(checkboxes).some(
    (checkbox) => checkbox.checked
  );
  if (anyChecked) {
    deleteButton.classList.add("active");
    deleteButton.disabled = false;
  } else {
    deleteButton.classList.remove("active");
    deleteButton.disabled = true;
  }
}

// Add event listeners to each checkbox
checkboxes.forEach((checkbox) => {
  checkbox.addEventListener("change", toggleDeleteButton);
});
toggleDeleteButton();

///

// cập nhật cart giỏ hàng

//
document.addEventListener("DOMContentLoaded", function () {
  const cartTable = document.querySelector(".cart-table");
  const subtotalElement = document.querySelector(".price-start p");
  const totalElement = document.querySelector(".total-end p");

  // Hàm cập nhật tổng giá cho từng hàng
  function updateTotalPrice(row, quantityInput) {
    const priceElement = row.querySelector(".price");
    const totalElement = row.querySelector(".total");
    const quantity = parseInt(quantityInput.value);
    const price = parseFloat(priceElement.dataset.price);

    if (!isNaN(quantity) && quantity > 0) {
      const totalPrice = price * quantity;
      totalElement.textContent = new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
      }).format(totalPrice);
    }
  }

  // Hàm tính tổng giá trị của giỏ hàng
  function calculateCartTotal() {
    let subtotal = 0;
    const totalRows = cartTable.querySelectorAll(".total");
    totalRows.forEach((row) => {
      const totalPriceText = row.textContent.replace(/[^\d]/g, ""); // Lấy số từ chuỗi
      const totalPrice = parseInt(totalPriceText);
      if (!isNaN(totalPrice)) {
        subtotal += totalPrice;
      }
    });

    // Cập nhật tạm tính và tổng cộng
    subtotalElement.textContent = new Intl.NumberFormat("vi-VN", {
      style: "currency",
      currency: "VND",
    }).format(subtotal);

    totalElement.textContent = new Intl.NumberFormat("vi-VN", {
      style: "currency",
      currency: "VND",
    }).format(subtotal); // Tổng có thể bao gồm thêm phí ship nếu cần
  }

  // Xử lý sự kiện input để cập nhật giá
  cartTable.addEventListener("input", function (e) {
    if (e.target && e.target.classList.contains("quantity-input")) {
      const row = e.target.closest("tr");
      updateTotalPrice(row, e.target);
      calculateCartTotal(); // Cập nhật tổng giá trị giỏ hàng
    }
  });

  // Xử lý sự kiện click để tăng/giảm số lượng
  cartTable.addEventListener("click", function (e) {
    if (e.target) {
      const row = e.target.closest("tr");
      const input = row.querySelector(".quantity-input");

      if (e.target.classList.contains("decre")) {
        e.preventDefault();
        let quantity = parseInt(input.value);
        if (quantity > 1) {
          input.value = quantity - 1;
          updateTotalPrice(row, input);
          calculateCartTotal(); // Cập nhật tổng giá trị giỏ hàng
        }
      }

      if (e.target.classList.contains("incre")) {
        e.preventDefault();
        let quantity = parseInt(input.value);
        input.value = quantity + 1;
        updateTotalPrice(row, input);
        calculateCartTotal(); // Cập nhật tổng giá trị giỏ hàng
      }
    }
  });
});

//

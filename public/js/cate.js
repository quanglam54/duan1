let currentIndex = 0;
const itemsToShow = 3;
const newsContainer = document.querySelectorAll(".news-container");
const listItemNews = document.querySelector(".list-item-news");
const itemWidth = newsContainer[0].offsetWidth + 10; // Cộng thêm khoảng cách giữa các sản phẩm
const totalItems = newsContainer.length;
console.log(totalItems);
// Nút mũi tên phải
document
  .querySelector(".news-icon .fa-arrow-right")
  .addEventListener("click", () => {
    if (currentIndex < totalItems - itemsToShow) {
      currentIndex++;
      listItemNews.style.transform = `translateX(-${
        currentIndex * itemWidth
      }px)`;
    }
  });

// Nút mũi tên trái
document
  .querySelector(".news-icon .fa-arrow-left")
  .addEventListener("click", () => {
    if (currentIndex > 0) {
      currentIndex--;
      listItemNews.style.transform = `translateX(-${
        currentIndex * itemWidth
      }px)`;
    }
  });

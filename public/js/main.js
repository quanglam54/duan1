function sliderShow() {
  const btnPre = document.getElementById("prev");
  const btnNext = document.getElementById("next");
  const slide = document.querySelector(".banner-container");
  const imgItem = document.querySelectorAll(".img-item");
  const dots = document.querySelectorAll(".dots li");

  let index = 0;
  const lengthImg = imgItem.length - 1;

  let autoReload = setInterval(() => btnNext.click(), 2500);

  function reloadSlider() {
    slide.style.transform = `translateX(-${imgItem[index].offsetLeft}px)`;
    document.querySelector(".dots li.active").classList.remove("active");
    dots[index].classList.add("active");
  }

  dots.forEach((li, key) =>
    li.addEventListener("click", () => {
      index = key;
      reloadSlider();
    })
  );

  btnNext.onclick = () => {
    index = index === lengthImg ? 0 : index + 1;
    reloadSlider();
    clearInterval(autoReload);
  };

  btnPre.onclick = () => {
    index = index === 0 ? lengthImg : index - 1;
    reloadSlider();
    clearInterval(autoReload);
  };
}

sliderShow();

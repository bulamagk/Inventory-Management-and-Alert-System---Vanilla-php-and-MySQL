const carouselImg = document.querySelector("#carousel-img");

let imageIndex = 2;

const changeCarouselImage = (i) => {
  carouselImg.src = `./assets/carousel/${i}.jpg`;
  i = i + 1;
  if (i > 4) {
    i = 1;
  }
  console.log(i);
};

setInterval(() => {
  changeCarouselImage(imageIndex);
  imageIndex++;
  imageIndex = imageIndex > 4 ? 1 : imageIndex++;
}, 3000);

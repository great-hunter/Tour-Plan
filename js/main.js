const swiper = new Swiper('.swiper-container', {
  // Optional parameters
  loop: true,

  // Navigation arrows
  navigation: {
    nextEl: '.slider-button--next',
    prevEl: '.slider-button--prev',
  },
});

document.addEventListener('keydown', function(event) {
  
  if (event.code == 'ArrowRight') {
    document.querySelector('.slider-button--next').click();
  }
  if (event.code == 'ArrowLeft') {
    document.querySelector('.slider-button--prev').click();
  }
});
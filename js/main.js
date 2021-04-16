$(document).ready(function () {


  //Слайдеры

  const hotelSlider = new Swiper('.hotel-slider', {
  // Optional parameters
    loop: true,
    // Navigation arrows
    navigation: {
      nextEl: '.hotel-slider__button--next',
      prevEl: '.hotel-slider__button--prev',
    },
    effect: 'coverflow',
  });

  const reviewsSlider = new Swiper('.reviews-slider', {
    // Optional parameters
    loop: true,
    // Navigation arrows
    navigation: {
      nextEl: '.reviews-slider__button--next',
      prevEl: '.reviews-slider__button--prev',
    },
  });


  //Мобильное меню

  var menuButton = $(".menu-button");
  menuButton.on('click', function () {
    $(".navbar-bottom").toggleClass('navbar-bottom--visible');
  });


  //Параллакс

  $('.parallax-window').parallax({
    imageSrc: 'img/newsletter-bg.jpg',
    speed: 0.5
  });


  //Модальное окно

  var modalButton = $('[data-togle="modal"]');
  var closeModalButton = $('.modal__close');
  modalButton.on('click', openModal);
  closeModalButton.on('click', closeModal);
  $(document).keyup(function(evet) {
    if (evet.key === "Escape" || evet.keyCode === 27) {
      closeModal(evet);
    }
  });

  function openModal() {
    var modalOverlay = $('.modal__overlay');
    var modalDialog = $('.modal__dialog');
    modalOverlay.addClass('modal__overlay--visible');
    modalDialog.addClass('modal__dialog--visible');
  }

  function closeModal(event) {
    event.preventDefault();
    var modalOverlay = $('.modal__overlay');
    var modalDialog = $('.modal__dialog');
    modalOverlay.removeClass('modal__overlay--visible');
    modalDialog.removeClass('modal__dialog--visible');
  }


  //Обработка форм

  $('.form').each(function() {
    $(this).validate({
      errorClass: "invalid",
      messages: {
        name: {
          required: "Please specify your name",
          minlength: "At least 2 characters required",
        },
        email: {
          required: "We need your email address to contact you",
          email: "Your email address must be in the format of name@domain.com",
        },
        phone: {
          required: "Phone number required",
        },
      },
    });
  });


  //Обработка форм

  $('.input-phone').mask('+7 (000) 000-00-00');

});
// Import JS
import '../../common';
import 'slick-carousel';

import AOS from 'aos';
import 'aos/dist/aos.css';

// Import css
import './home.scss';

import './map';

//***************************************
//      Main program
//***************************************

$(document).ready(function() {
  //==================== main banner
  $('.mainbanner__slider__wrapper').slick({
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 5000,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
  });

  $('.mainbanner__slider__down').on('click', function() {
    $('body, html')
      .stop()
      .animate(
        {
          scrollTop: $(window).height() + 'px',
        },
        1000,
      );
  });

  //=============== color select banner

  const slider = $('.color_select__slider').slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
  });

  $('.color_select__selector__item').on('click', function() {
    const index = $(this).data('index');
    slider.slick('slickGoTo', index);
  });

  //================== featured_products__list

  $('.featured_products__list').slick({
    dots: true,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    arrows: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
    ],
  });

  //=================== news slider
  $('.home_news__content').slick({
    dots: false,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    arrows: true,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: true,
          arrows: false,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true,
          arrows: false,
        },
      },
    ],
  });
  // ================ map init
  $('.home_map').mapview();

  //=============== animation init
  AOS.init({
    duration: 1200,
    // once: true,
  });
});

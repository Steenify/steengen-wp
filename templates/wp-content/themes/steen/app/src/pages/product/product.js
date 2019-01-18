import './product.scss';
// Import JS
import '../../common';
import 'slick-carousel';
import 'tilt.js';

//***************************************
//      Main program
//***************************************
$(document).ready(function(event) {
  // TODO: Code here

  $('.product__image__img').tilt({
    maxTilt: 20,
    scale: 1.1,
  });

  $('.product__similar__list').slick({
    dots: false,
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
        },
      },
      {
        breakpoint: 568,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
        },
      },
    ],
  });
});

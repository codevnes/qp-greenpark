import $ from 'jquery';

// Import Owl Carousel CSS and JS
import 'owl.carousel/dist/assets/owl.carousel.min.css';
import 'owl.carousel/dist/assets/owl.theme.default.min.css';
import 'owl.carousel';

export function initAdvantageCarousel() {
  $('.section-advantage__carousel').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
    dots: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 2
      },
      992: {
        items: 4
      },
      1200: {
        items: 5
      }
    }
  });
}

export function initNewsCarousel() {
  $('.news-carousel').each(function () {
    $(this).owlCarousel({
      loop: true,
      margin: 30,
      nav: false, 
      dots: true,
      dotsEach: true,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 2
        },
        992: {
          items: 3
        }
      }
    });
  });
}

export function initPerspectiveCarousel() {
  $('.perspective-carousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    smartSpeed: 700,
    fluidSpeed: 700,
    navText: [
      '<i class="fa-light fa-arrow-left"></i>',
      '<i class="fa-light fa-arrow-right"></i>'
    ],
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 1.8
      },
      992: {
        items: 2.5
      }
    }
  });
}

export function initDocumentsCarousel() {
  $('.documents-carousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    smartSpeed: 700,
    navText: [
      '<i class="fa-light fa-arrow-left"></i>',
      '<i class="fa-light fa-arrow-right"></i>'
    ],
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      992: {
        items: 2
      }
    }
  });
}

export default function initCarousels() {
  initAdvantageCarousel();
  initNewsCarousel();
  initPerspectiveCarousel();
  initDocumentsCarousel();
} 
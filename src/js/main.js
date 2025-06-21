// Import SCSS main file
import '../scss/main.scss';

// Import Bootstrap CSS
import 'bootstrap/dist/css/bootstrap.min.css';

// Import jQuery
import $ from 'jquery';
window.jQuery = window.$ = $;

// Import Bootstrap JS
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

// Import modules
import initAOS from './libs/aos-init';
import initCarousels from './libs/carousels';
import initMasterplanTabs from './libs/masterplan-tabs';
import initFancybox from './libs/fancybox-init';
import initVideoJS from './libs/video-init';
import initPagepiling from './libs/pagepiling-init';
import './libs/offcanvas-menu';

// Make sure jQuery is working
$(function () {
  // Initialize basic modules first
  initCarousels();
  initMasterplanTabs();
  initFancybox();
  initVideoJS();
  
  // First initialize AOS
  const aos = initAOS();
  
  // Initialize scroll-to-top button
  initScrollToTop();
  
  // Wait a moment for the DOM to be ready
  setTimeout(function() {
    // Then initialize pagepiling which will handle AOS animations
    initPagepiling();
    
    // Ensure animations are visible in the first section
    if ($('#pagepiling').length && $('.section.active').length) {
      // For pagepiling pages
      $('.section.active [data-aos]').addClass('aos-animate');
    }
    
    // Refresh AOS to ensure everything is properly initialized
    aos.refresh();
  }, 100);
  
  // Scroll to top functionality
  function initScrollToTop() {
    const scrollToTopBtn = $('#scroll-to-top');
    const rootElement = $('html, body');
    
    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        scrollToTopBtn.addClass('show');
      } else {
        scrollToTopBtn.removeClass('show');
      }
    });
    
    scrollToTopBtn.on('click', function() {
      rootElement.animate({
        scrollTop: 0
      }, 800);
      return false;
    });
  }
}); 
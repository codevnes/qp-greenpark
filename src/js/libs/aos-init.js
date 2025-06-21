// Import AOS (Animate On Scroll)
import AOS from 'aos';
import 'aos/dist/aos.css';

export default function initAOS() {
  // Basic AOS configuration
  AOS.init({
    duration: 800,
    easing: 'ease-out',
    once: false,      // Allow animations to trigger again when navigating
    mirror: false,
    disable: false,   // Don't disable on any device
    offset: 50,       // Smaller offset to trigger earlier
    delay: 0,         // No delay
    anchorPlacement: 'center-bottom'  // Element position to trigger animation
  });
  
  // Make AOS accessible globally
  window.AOS = AOS;
  
  // For pagepiling pages, ensure all elements are initialized with 'aos-init'
  if (document.querySelector('#pagepiling')) {
    // Pre-initialize all animation elements
    document.querySelectorAll('[data-aos]').forEach(function(el) {
      el.classList.add('aos-init');
    });
    
    // But don't automatically trigger animations - pagepiling will handle this
    document.querySelectorAll('[data-aos]').forEach(function(el) {
      el.classList.remove('aos-animate');
    });
  }

  return AOS;
} 
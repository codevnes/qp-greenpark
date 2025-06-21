/**
 * Offcanvas Menu Functionality
 */
(function() {
    // Elements
    const menuToggle = document.querySelector('.js-toggle-menu');
    const closeBtn = document.querySelector('.js-close-menu');
    const offcanvasMenu = document.getElementById('offcanvasMenu');
    const body = document.body;
    
    // Toggle menu function
    function toggleMenu() {
        offcanvasMenu.classList.toggle('is-active');
        body.classList.toggle('menu-is-active');
        
        // Add animation to menu items with delay if menu is active
        if (offcanvasMenu.classList.contains('is-active')) {
            const menuItems = offcanvasMenu.querySelectorAll('.offcanvas-menu__nav li');
            menuItems.forEach((item, index) => {
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 300 + (index * 100));
            });
        }
    }
    
    // Open menu
    if (menuToggle) {
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            toggleMenu();
        });
    }
    
    // Close menu
    if (closeBtn) {
        closeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            toggleMenu();
        });
    }
    
    // Close menu on overlay click
    if (offcanvasMenu) {
        const overlay = offcanvasMenu.querySelector('.offcanvas-menu__overlay');
        if (overlay) {
            overlay.addEventListener('click', function() {
                toggleMenu();
            });
        }
    }
    
    // Close menu on ESC key press
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && offcanvasMenu.classList.contains('is-active')) {
            toggleMenu();
        }
    });
})(); 
/**
 * Initialize PagePiling for fullpage scrolling
 * Only activates on desktop devices
 */
import $ from 'jquery';
import 'pagepiling.js';
import 'pagepiling.js/jquery.pagepiling.css';
import AOS from 'aos'; // Import AOS

export default function initPagepiling() {
    if (!$('#pagepiling').length) return;
    
    // Check if we're on the news pagepiling page
    const isNewsPagepiling = $('#pagepiling').hasClass('news-pagepiling');
    
    // Default config for pagepiling
    let ppConfig = {
        menu: null,
        direction: 'vertical',
        verticalCentered: true,
        sectionsColor: [],
        anchors: isNewsPagepiling && typeof newsAnchors !== 'undefined' ? newsAnchors : 
                ['video', 'overview', 'introduction', 'masterplan', 'location', 'advantage', 'news', 'contact'],
        scrollingSpeed: 700,
        easing: 'swing',
        loopBottom: false,
        loopTop: false,
        css3: true,
        navigation: {
            'textColor': '#000',
            'bulletsColor': '#000',
            'position': 'right',
            'tooltips': isNewsPagepiling && typeof newsAnchors !== 'undefined' ? 
                        newsAnchors.map(anchor => anchor.charAt(0).toUpperCase() + anchor.slice(1)) : 
                        ['Video', 'Tổng Quan', 'Giới Thiệu', 'Mặt Bằng', 'Vị Trí', 'Tiện Ích', 'Tin Tức', 'Liên Hệ']
        },
        normalScrollElements: null,
        normalScrollElementTouchThreshold: 5,
        touchSensitivity: 5,
        keyboardScrolling: true,
        sectionSelector: '.section',
        animateAnchor: true,
        
        // Add simplified callbacks for AOS
        onLeave: function(index, nextIndex, direction) {
            // Reset all animations
            $('[data-aos]').removeClass('aos-animate');
            
            // If we're on the news page with carousels, destroy and reinitialize them
            if (isNewsPagepiling) {
                // We'll handle this in afterLoad
            }
        },
        afterLoad: function(anchorLink, index) {
            // Show animations for current section
            $('.section').eq(index-1).find('[data-aos]').addClass('aos-animate');
            
            // If we're on the news page, reinitialize the carousel for the current section
            if (isNewsPagepiling) {
                // Refresh the current section's carousel
                setTimeout(function() {
                    $('.section').eq(index-1).find('.news-carousel').trigger('refresh.owl.carousel');
                }, 100);
            }
        },
        afterRender: function() {
            // Make sure AOS is initialized properly
            AOS.refresh();
            
            // Show animations for first section
            $('.section.active [data-aos]').addClass('aos-animate');
            
            // If we're on the news page, initialize all carousels
            if (isNewsPagepiling) {
                // Give a little time for the page to render
                setTimeout(function() {
                    $('.section.active .news-carousel').trigger('refresh.owl.carousel');
                }, 100);
            }
        }
    };
    
    // Function to initialize or destroy pagepiling based on screen width
    function setupPagepiling() {
        const isDesktop = $(window).width() >= 992;
        const isInitialized = !!$('#pagepiling').data('pagepiling');
        
        if (isDesktop && !isInitialized) {
            // Add desktop class
            $('body').addClass('is-desktop').removeClass('is-mobile');
            
            // Initialize pagepiling
            $('#pagepiling').pagepiling(ppConfig);
            
            // Make sure first section animations are shown
            $('.section.active [data-aos]').addClass('aos-animate');
        } else if (!isDesktop && isInitialized) {
            // Destroy pagepiling and ensure scrolling is enabled
            $.fn.pagepiling.destroy('all');
            // Add mobile class
            $('body').addClass('is-mobile').removeClass('is-desktop');
            // Force enable scrolling
            $('html, body').css({
                'overflow': 'auto',
                'height': 'auto'
            });
            // Reset any sections that might have fixed positioning
            $('.section').css({
                'position': 'relative',
                'top': 'auto',
                'left': 'auto',
                'right': 'auto',
                'bottom': 'auto',
                'transform': 'none',
                'height': 'auto',
                'z-index': 'auto'
            });
            
            // Reset AOS for normal scrolling mode
            AOS.refresh();
        } else if (!isDesktop) {
            // Ensure mobile styling even on first load
            $('body').addClass('is-mobile').removeClass('is-desktop');
            // Force enable scrolling
            $('html, body').css({
                'overflow': 'auto',
                'height': 'auto'
            });
        }
    }
    
    // Initial setup
    setupPagepiling();
    
    // Handle resize events
    $(window).on('resize', function() {
        setupPagepiling();
    });
}

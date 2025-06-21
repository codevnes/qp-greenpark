<?php
/**
 * QP Green Park functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package QP_GreenPark
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function qp_greenpark_setup()
{
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on QP Green Park, use a find and replace
     * to change 'qp-greenpark' to the name of your theme in all the template files.
     */
    load_theme_textdomain('qp-greenpark', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'qp-greenpark'),
            'footer-menu' => esc_html__('Footer Menu', 'qp-greenpark'),
        )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'qp_greenpark_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'qp_greenpark_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function qp_greenpark_content_width()
{
    $GLOBALS['content_width'] = apply_filters('qp_greenpark_content_width', 1140);
}
add_action('after_setup_theme', 'qp_greenpark_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function qp_greenpark_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'qp-greenpark'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'qp-greenpark'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}
add_action('widgets_init', 'qp_greenpark_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function qp_greenpark_scripts()
{
    wp_enqueue_style('qp-greenpark-style', get_stylesheet_uri(), array(), _S_VERSION);

    // FontAwesome
    wp_enqueue_style('font-awesome', get_theme_file_uri('/static-assets/font-awesome/css/all.min.css'), array(), '6.4.0');

    // Font
    wp_enqueue_style('qp-font', get_theme_file_uri('/static-assets/fonts/stylesheet.css'), array(), _S_VERSION);

    // Main CSS file (compiled from SCSS)
    wp_enqueue_style('qp-greenpark-main', get_theme_file_uri('/dist/css/main.css'), array(), _S_VERSION);


    // Bootstrap JS
    wp_enqueue_script('bootstrap-bundle', get_theme_file_uri('/dist/js/main.js'), array('jquery'), _S_VERSION, true);

}
add_action('wp_enqueue_scripts', 'qp_greenpark_scripts');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/theme-helpers.php';
require get_template_directory() . '/inc/admin-library.php';

/**
 * Enable SVG upload support
 */
function qp_greenpark_enable_svg_upload($mimes)
{
    // Add SVG MIME type to allowed file uploads
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'qp_greenpark_enable_svg_upload');

/**
 * Fix SVG thumbnail preview in media library
 */
function qp_greenpark_fix_svg_thumbnail_display($response, $attachment, $meta)
{
    if ($response['mime'] === 'image/svg+xml') {
        // Get SVG file path
        $attachment_url = $response['url'];
        $file_path = get_attached_file($attachment->ID);

        if (!file_exists($file_path)) {
            return $response;
        }

        // Add SVG dimensions if missing
        if (empty($response['sizes'])) {
            $svg_content = file_get_contents($file_path);

            // Simple regex to extract width and height from SVG
            $svg_width = 0;
            $svg_height = 0;

            // Try to get viewBox dimensions
            if (preg_match('/viewBox=["\']([^"\']*)["\']/', $svg_content, $viewbox_matches)) {
                $viewbox = explode(' ', $viewbox_matches[1]);
                if (count($viewbox) === 4) {
                    $svg_width = intval($viewbox[2]);
                    $svg_height = intval($viewbox[3]);
                }
            }

            // If viewBox not found, try to get width/height attributes
            if (!$svg_width || !$svg_height) {
                if (preg_match('/width=["\']([0-9.]*)[a-z%]*["\']/', $svg_content, $width_matches)) {
                    $svg_width = intval($width_matches[1]);
                }
                if (preg_match('/height=["\']([0-9.]*)[a-z%]*["\']/', $svg_content, $height_matches)) {
                    $svg_height = intval($height_matches[1]);
                }
            }

            // Default dimensions if we couldn't extract them
            if (!$svg_width || !$svg_height) {
                $svg_width = 100;
                $svg_height = 100;
            }

            // Set default dimensions for media library
            $response['sizes'] = array(
                'full' => array(
                    'url' => $attachment_url,
                    'width' => $svg_width,
                    'height' => $svg_height,
                    'orientation' => ($svg_width >= $svg_height) ? 'landscape' : 'portrait'
                ),
                'thumbnail' => array(
                    'url' => $attachment_url,
                    'width' => $svg_width,
                    'height' => $svg_height,
                    'orientation' => ($svg_width >= $svg_height) ? 'landscape' : 'portrait'
                ),
                'medium' => array(
                    'url' => $attachment_url,
                    'width' => $svg_width,
                    'height' => $svg_height,
                    'orientation' => ($svg_width >= $svg_height) ? 'landscape' : 'portrait'
                ),
                'large' => array(
                    'url' => $attachment_url,
                    'width' => $svg_width,
                    'height' => $svg_height,
                    'orientation' => ($svg_width >= $svg_height) ? 'landscape' : 'portrait'
                )
            );

            // Add dimensions to the response
            $response['width'] = $svg_width;
            $response['height'] = $svg_height;
        }
    }

    return $response;
}
add_filter('wp_prepare_attachment_for_js', 'qp_greenpark_fix_svg_thumbnail_display', 10, 3);

/**
 * Sanitize SVG uploads to prevent security issues
 */
function qp_greenpark_sanitize_svg_uploads($file)
{
    // Check if the file is an SVG
    if ($file['type'] === 'image/svg+xml') {
        // Read file content
        $file_content = file_get_contents($file['tmp_name']);

        // Basic security checks
        if (strpos($file_content, '<?xml') === false && strpos($file_content, '<svg') === false) {
            // Not a valid SVG
            $file['error'] = __('This file doesn\'t seem to be a valid SVG.', 'qp-greenpark');
            return $file;
        }

        // Check for potentially harmful content
        $harmful_patterns = array(
            '/<script.*?>/',
            '/javascript:/',
            '/eval\(/',
            '/expression\(/',
            '/onclick/',
            '/onload/',
            '/onerror/',
            '/onmouseover/',
            '/onmouseout/',
            '/onmousemove/',
            '/onmousedown/',
            '/onmouseup/',
            '/onfocus/',
            '/onblur/'
        );

        foreach ($harmful_patterns as $pattern) {
            if (preg_match($pattern, $file_content)) {
                // Potentially harmful SVG
                $file['error'] = __('For security reasons, SVG files with scripts or event handlers are not allowed.', 'qp-greenpark');
                return $file;
            }
        }
    }

    return $file;
}
add_filter('wp_handle_upload_prefilter', 'qp_greenpark_sanitize_svg_uploads');

/**
 * Add SVG to allowed file types for Media Library Filtering
 */
function qp_greenpark_add_svg_to_upload_filters($post_mime_types)
{
    $post_mime_types['image/svg+xml'] = array(
        __('SVG Images', 'qp-greenpark'),
        __('Manage SVGs', 'qp-greenpark'),
        _n_noop('SVG Image <span class="count">(%s)</span>', 'SVG Images <span class="count">(%s)</span>', 'qp-greenpark')
    );

    return $post_mime_types;
}
add_filter('post_mime_types', 'qp_greenpark_add_svg_to_upload_filters');

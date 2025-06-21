<?php
/**
 * Theme helper functions
 *
 * @package QP_Green_Park
 */

if ( ! function_exists( 'qp_greenpark_get_image' ) ) :
    /**
     * Get image from static-assets/images directory
     * 
     * @param string $image_name   The image name with extension (e.g., 'bds.webp')
     * @param string $alt          Optional. Alt text for the image
     * @param string $class        Optional. CSS class(es) for the image
     * @param array  $attributes   Optional. Additional HTML attributes as key-value pairs
     * @return string              HTML img tag
     */
    function qp_greenpark_get_image( $image_name, $alt = '', $class = '', $attributes = array() ) {
        // Build the image URL
        $image_url = get_template_directory_uri() . '/static-assets/images/' . $image_name;
        
        // Start building the image tag
        $html = '<img src="' . esc_url( $image_url ) . '"';
        
        // Add alt attribute (empty alt is valid for decorative images)
        $html .= ' alt="' . esc_attr( $alt ) . '"';
        
        // Add class if provided
        if ( ! empty( $class ) ) {
            $html .= ' class="' . esc_attr( $class ) . '"';
        }
        
        // Add any additional attributes
        if ( ! empty( $attributes ) && is_array( $attributes ) ) {
            foreach ( $attributes as $attr_name => $attr_value ) {
                $html .= ' ' . esc_attr( $attr_name ) . '="' . esc_attr( $attr_value ) . '"';
            }
        }
        
        // Close the image tag
        $html .= '>';
        
        return $html;
    }
endif;


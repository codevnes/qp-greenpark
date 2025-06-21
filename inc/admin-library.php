<?php
/**
 * Admin Library functionality
 * 
 * @package QP_GreenPark
 */

/**
 * Register ACF options page for the library (Photo Albums and Project Documents)
 */
function qp_greenpark_register_library_options_page() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title'    => __('Thư Viện Dự Án', 'qp-greenpark'),
            'menu_title'    => __('Thư Viện Dự Án', 'qp-greenpark'),
            'menu_slug'     => 'project-library',
            'capability'    => 'edit_posts',
            'icon_url'      => 'dashicons-images-alt2',
            'position'      => 20,
            'redirect'      => false
        ));
    }
}
add_action('acf/init', 'qp_greenpark_register_library_options_page');

/**
 * Register ACF fields for the library
 */
function qp_greenpark_register_library_fields() {
    if (function_exists('acf_add_local_field_group')) {
        // Photo Album Field Group
        acf_add_local_field_group(array(
            'key' => 'group_photo_album',
            'title' => 'Album Ảnh',
            'fields' => array(
                array(
                    'key' => 'field_album_title',
                    'label' => 'Tên Album',
                    'name' => 'album_title',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_album_description',
                    'label' => 'Mô Tả',
                    'name' => 'album_description',
                    'type' => 'textarea',
                    'rows' => 3,
                    'required' => 0,
                ),
                array(
                    'key' => 'field_album_images',
                    'label' => 'Hình Ảnh',
                    'name' => 'album_images',
                    'type' => 'gallery',
                    'required' => 1,
                    'return_format' => 'array',
                    'library' => 'all',
                    'min' => 1,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'project-library',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
        ));
        
        // Project Documents Field Group
        acf_add_local_field_group(array(
            'key' => 'group_project_documents',
            'title' => 'Tài Liệu Dự Án',
            'fields' => array(
                array(
                    'key' => 'field_project_documents',
                    'label' => 'Tài Liệu Dự Án (PDF)',
                    'name' => 'project_documents',
                    'type' => 'repeater',
                    'instructions' => 'Thêm các tài liệu dự án',
                    'required' => 0,
                    'layout' => 'block',
                    'button_label' => 'Thêm Tài Liệu',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_document_title',
                            'label' => 'Tên Tài Liệu',
                            'name' => 'document_title',
                            'type' => 'text',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_document_description',
                            'label' => 'Mô Tả',
                            'name' => 'document_description',
                            'type' => 'textarea',
                            'rows' => 3,
                            'required' => 0,
                        ),
                        array(
                            'key' => 'field_document_thumbnail',
                            'label' => 'Ảnh Đại Diện',
                            'name' => 'document_thumbnail',
                            'type' => 'image',
                            'required' => 1,
                            'return_format' => 'array',
                            'preview_size' => 'medium',
                            'library' => 'all',
                            'instructions' => 'Chọn ảnh đại diện cho tài liệu PDF',
                        ),
                        array(
                            'key' => 'field_document_file',
                            'label' => 'File PDF',
                            'name' => 'document_file',
                            'type' => 'file',
                            'required' => 1,
                            'return_format' => 'array',
                            'library' => 'all',
                            'mime_types' => 'pdf',
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'project-library',
                    ),
                ),
            ),
            'menu_order' => 1,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
        ));
    }
}
add_action('acf/init', 'qp_greenpark_register_library_fields');

/**
 * Get photo album
 * 
 * @return array Photo album data or empty array if none
 */
function qp_greenpark_get_photo_album() {
    $album = array(
        'title' => '',
        'description' => '',
        'images' => array()
    );
    
    if (function_exists('get_field')) {
        $album = array(
            'title' => get_field('album_title', 'option'),
            'description' => get_field('album_description', 'option'),
            'images' => get_field('album_images', 'option') ?: array(),
        );
    }
    
    return $album;
}

/**
 * Get project documents
 * 
 * @return array Array of project documents or empty array if none
 */
function qp_greenpark_get_project_documents() {
    $documents = array();
    
    if (function_exists('get_field') && have_rows('project_documents', 'option')) {
        while (have_rows('project_documents', 'option')) {
            the_row();
            $documents[] = array(
                'title' => get_sub_field('document_title'),
                'description' => get_sub_field('document_description'),
                'thumbnail' => get_sub_field('document_thumbnail'),
                'file' => get_sub_field('document_file'),
            );
        }
    }
    
    return $documents;
} 
<?php
/**
 * Section Documents
 * 
 * @package QP_GreenPark
 */

// Get the documents data
$documents = qp_greenpark_get_project_documents();
if (!$documents || empty($documents)) return;
?>

<div class="section-documents section pp-section" data-anchor="documents">
    <div class="section-content">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="section-title">
                    <span>Tổng hợp</span>
                    <br/>
                    <strong>TÀI LIỆU DỰ ÁN</strong>
                </h2>
                <div class="section-divider mx-auto"></div>
            </div>
            
            <div class="documents-carousel gp-carousel owl-carousel">
                <?php foreach ($documents as $document) : 
                    // Get the file URL
                    $file_url = isset($document['file']['url']) ? esc_url($document['file']['url']) : '#';
                    
                    // Get the thumbnail image
                    $thumbnail_image = '';
                    if (isset($document['thumbnail']['url'])) {
                        $thumbnail_image = $document['thumbnail']['url'];
                    } else if (isset($document['file']['ID'])) {
                        // Fallback to file thumbnail if exists
                        $thumbnail_id = get_post_thumbnail_id($document['file']['ID']);
                        if ($thumbnail_id) {
                            $thumbnail_image = wp_get_attachment_image_url($thumbnail_id, 'medium');
                        }
                    }
                    
                    // Use default image if no thumbnail is available
                    if (empty($thumbnail_image)) {
                        $thumbnail_image = get_template_directory_uri() . '/static-assets/images/QP Green Park 1.jpg';
                    }
                ?>
                <div class="document-item">
                    <a href="<?php echo $file_url; ?>" class="document-link" target="_blank">
                        <div class="document-image">
                            <img src="<?php echo esc_url($thumbnail_image); ?>" 
                                 alt="<?php echo esc_attr($document['title']); ?>" 
                                 class="img-fluid">
                            <div class="document-overlay"></div>
                            <span class="document-icon">
                                <i class="fa-light fa-file-pdf"></i>
                            </span>
                        </div>
                        <div class="document-title">
                            <h3><?php echo esc_html($document['title']); ?></h3>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div> 
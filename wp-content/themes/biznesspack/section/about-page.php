<?php
$biznesspack_about_page_image = biznesspack_get_option('biznesspack_about_page_image');
$biznesspack_about_page_title	= biznesspack_get_option('biznesspack_about_page_title');
$biznesspack_about_page_content = biznesspack_get_option( 'biznesspack_about_page_content' );
$biznesspack_about_page_button = biznesspack_get_option( 'biznesspack_about_page_button' );
$biznesspack_about_page_button_link = biznesspack_get_option( 'biznesspack_about_page_button_link' );

?>		
<section class="biznesspack-about-page section bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="image-wrapper">
                    <?php if( !empty( $biznesspack_about_page_image ) ): ?>
                        <div class="post-thumbnail">
                            <img src="<?php echo esc_url( $biznesspack_about_page_image )?>" class="img-responsive" height="650" width="780" />
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-wrapper">
                    
					<?php if( !empty( $biznesspack_about_page_title ) ):?>
                        <header class="entry-header">
                            <h2 class="entry-title feature-bottom-line"><?php echo esc_html( $biznesspack_about_page_title ); ?></h2>
                        </header><!-- .entry-header -->
                    <?php endif; ?>
					
					<?php if( !empty( $biznesspack_about_page_content ) ): ?>
                    <div class="entry-content">
						<?php echo wp_kses_post( $biznesspack_about_page_content ); ?>
                    </div>
					<?php endif; ?>

                    <?php if( !empty( $biznesspack_about_page_button_link ) ): ?>
                        <p class="read-more">
                            <a href="<?php echo esc_url( $biznesspack_about_page_button_link ); ?>" class="btn">
                                <?php echo esc_html( $biznesspack_about_page_button ); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
	
	
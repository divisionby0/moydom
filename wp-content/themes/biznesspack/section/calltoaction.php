<?php 
$biznesspack_callto_action_content = biznesspack_get_option( 'biznesspack_callto_action_content' );
$biznesspack_callto_action_button = biznesspack_get_option( 'biznesspack_callto_action_button' );
$biznesspack_callto_action_link = biznesspack_get_option( 'biznesspack_callto_action_link' );
?>
<section class="biznesspack-call-to-action section theme-color-bg">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-8">
				<?php if( !empty( $biznesspack_callto_action_content ) ): ?>
					<p class="content text-white"><?php echo esc_html( $biznesspack_callto_action_content ); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-lg-4">
            	<?php if( !empty( $biznesspack_callto_action_button ) ): ?>
            	<div class="action-btn">
                	<a href="<?php echo esc_url( $biznesspack_callto_action_link ); ?>" class="btn">
						<?php echo esc_html( $biznesspack_callto_action_button );?>
                    </a>
                </div>
            	<?php endif; ?>
            </div>
        </div>
    </div>
</section>
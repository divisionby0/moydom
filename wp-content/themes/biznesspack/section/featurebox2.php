<?php
$biznesspack_featurebox_one = biznesspack_get_option( 'biznesspack_featurebox_type2_one' );
$biznesspack_featurebox_two = biznesspack_get_option( 'biznesspack_featurebox_type2_two' ); 
$biznesspack_featurebox_three = biznesspack_get_option( 'biznesspack_featurebox_type2_three' ); 
$biznesspack_featurebox_four = biznesspack_get_option( 'biznesspack_featurebox_type2_four' );

$biznesspack_featurebox_one_icon = biznesspack_get_option( 'biznesspack_featurebox_type2_one_icon' );
$biznesspack_featurebox_one_title = biznesspack_get_option( 'biznesspack_featurebox_type2_one_title' );
$biznesspack_featurebox_one_content = biznesspack_get_option( 'biznesspack_featurebox_type2_one_content' );
$biznesspack_featurebox_two_icon = biznesspack_get_option( 'biznesspack_featurebox_type2_two_icon' );
$biznesspack_featurebox_two_title = biznesspack_get_option( 'biznesspack_featurebox_type2_two_title' );
$biznesspack_featurebox_two_content = biznesspack_get_option( 'biznesspack_featurebox_type2_two_content' );
$biznesspack_featurebox_three_icon = biznesspack_get_option( 'biznesspack_featurebox_type2_three_icon' );
$biznesspack_featurebox_three_title = biznesspack_get_option( 'biznesspack_featurebox_type2_three_title' );
$biznesspack_featurebox_three_content = biznesspack_get_option( 'biznesspack_featurebox_type2_three_content' );
$biznesspack_featurebox_four_icon = biznesspack_get_option( 'biznesspack_featurebox_type2_four_icon' );
$biznesspack_featurebox_four_title = biznesspack_get_option( 'biznesspack_featurebox_type2_four_title' );
$biznesspack_featurebox_four_content = biznesspack_get_option( 'biznesspack_featurebox_type2_four_content' );

$featurebox_collection = array(
	$biznesspack_featurebox_one, 
	$biznesspack_featurebox_two, 
	$biznesspack_featurebox_three,
	$biznesspack_featurebox_four
);

$featurebox_count = count( array_filter( $featurebox_collection ) );
	
	if( $featurebox_count == '4' ){
		$size = 'col-lg-3 col-md-6' ;
	}
	elseif( $featurebox_count == '3' ){
		$size = 'col-lg-4 col-md-12';
	}
	elseif( $featurebox_count == '2' ){
		$size = 'col-lg-6 col-md-6';
	}
	else{
		$size = 'col-lg-12 col-md-12';
	}
?> 

<section class="biznesspack-featurebox-2 section">
	<div class="container">
    	<div class="row featurebox-inner-wrapper">
        	
        	<?php if( $biznesspack_featurebox_one ) : ?>
        		<div class="<?php echo esc_attr( $size ); ?>">
        			<div class="featurebox-wrapper">
                        <?php if( !empty( $biznesspack_featurebox_one_icon ) ): ?>
        				    <div class="featurebox-icon text-white">
                                <i class="<?php echo esc_attr( $biznesspack_featurebox_one_icon ); ?>"></i>
                            </div>
        				<?php endif; ?>
                        <?php if( !empty( $biznesspack_featurebox_one_title ) ): ?>
                            <div class="featurebox-title">
                                <h5 class="title feature-bottom-line">
                                    <?php echo esc_html( $biznesspack_featurebox_one_title ); ?>
                                </h5>
                            </div>
        			    <?php endif; ?>
                        <?php if( !empty( $biznesspack_featurebox_one_content ) ): ?>
                            <p class="featurebox-content">
                                <?php echo esc_html( $biznesspack_featurebox_one_content ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
        		</div>
        	<?php endif; ?>

			<?php if( $biznesspack_featurebox_two ) : ?>
        		<div class="<?php echo esc_attr( $size ); ?>">
        			<div class="featurebox-wrapper">
        				<?php if( !empty( $biznesspack_featurebox_two_icon ) ): ?>
                            <div class="featurebox-icon text-white">
                                <i class="<?php echo esc_attr( $biznesspack_featurebox_two_icon ); ?>"></i>
                            </div>
        				<?php endif; ?>
                        <?php if( !empty( $biznesspack_featurebox_two_title ) ): ?>
                            <div class="featurebox-title">
                                <h5 class="title feature-bottom-line">
                                    <?php echo esc_html( $biznesspack_featurebox_two_title ); ?>
                                </h5>
                            </div>
        			    <?php endif; ?>
                        <?php if( !empty( $biznesspack_featurebox_two_content ) ): ?>
                            <p class="featurebox-content">
                                <?php echo esc_html( $biznesspack_featurebox_two_content ) ;?>
                            </p>
                        <?php endif; ?>
                    </div>
        		</div>
        	<?php endif; ?>

        	<?php if( $biznesspack_featurebox_three ) : ?>
        		<div class="<?php echo esc_attr( $size ); ?>">
        			<div class="featurebox-wrapper">
                        <?php if( !empty( $biznesspack_featurebox_three_icon ) ): ?>
        				    <div class="featurebox-icon text-white">
								<i class="<?php echo esc_attr( $biznesspack_featurebox_three_icon ); ?>"></i>
                            </div>
        				<?php endif; ?>
                        <?php if( !empty( $biznesspack_featurebox_three_title ) ): ?>
                            <div class="featurebox-title">
                                <h5 class="title feature-bottom-line">
                                    <?php echo esc_html( $biznesspack_featurebox_three_title ); ?>
                                </h5>
                            </div>
        			    <?php endif; ?>
                        <?php if( !empty( $biznesspack_featurebox_three_content ) ): ?>
                            <p class="featurebox-content">
                                <?php echo esc_html( $biznesspack_featurebox_three_content ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
        		</div>
        	<?php endif; ?>

        	<?php if( $biznesspack_featurebox_four ) : ?>
        		<div class="<?php echo esc_attr( $size ); ?>">
        			<div class="featurebox-wrapper">
                        <?php if( !empty( $biznesspack_featurebox_four_icon ) ):?>
        				    <div class="featurebox-icon text-white">
                                <i class="<?php echo esc_attr( $biznesspack_featurebox_four_icon ); ?>"></i>
                            </div>
                        <?php endif; ?>
        				<?php if( !empty( $biznesspack_featurebox_four_title ) ): ?>
                            <div class="featurebox-title">
                                <h5 class="title feature-bottom-line">
                                    <?php echo esc_html( $biznesspack_featurebox_four_title ); ?>
                                </h5>
                            </div>
        			    <?php endif; ?>
                        <?php if( !empty( $biznesspack_featurebox_four_content ) ): ?>
                            <p class="featurebox-content">
                                <?php echo esc_html( $biznesspack_featurebox_four_content ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
        		</div>
        	<?php endif; ?>

        </div>
    </div>
</section>
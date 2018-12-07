<?php
$biznesspack_featurebox_type3_section_title = biznesspack_get_option('biznesspack_featurebox_type3_section_title');
$biznesspack_featurebox_type3_one = biznesspack_get_option('biznesspack_featurebox_type3_one');
$biznesspack_featurebox_type3_one_title = biznesspack_get_option('biznesspack_featurebox_type3_one_title');
$biznesspack_featurebox_type3_one_content = biznesspack_get_option('biznesspack_featurebox_type3_one_content');
$biznesspack_featurebox_type3_two = biznesspack_get_option('biznesspack_featurebox_type3_two');
$biznesspack_featurebox_type3_two_title = biznesspack_get_option('biznesspack_featurebox_type3_two_title');
$biznesspack_featurebox_type3_two_content = biznesspack_get_option('biznesspack_featurebox_type3_two_content');
$biznesspack_featurebox_type3_three = biznesspack_get_option('biznesspack_featurebox_type3_three');
$biznesspack_featurebox_type3_three_title = biznesspack_get_option('biznesspack_featurebox_type3_three_title');
$biznesspack_featurebox_type3_three_content = biznesspack_get_option('biznesspack_featurebox_type3_three_content');
$biznesspack_featurebox_type3_four = biznesspack_get_option('biznesspack_featurebox_type3_four');
$biznesspack_featurebox_type3_four_title = biznesspack_get_option('biznesspack_featurebox_type3_four_title');
$biznesspack_featurebox_type3_four_content = biznesspack_get_option('biznesspack_featurebox_type3_four_content');
$biznesspack_featurebox_type3_five = biznesspack_get_option('biznesspack_featurebox_type3_five');
$biznesspack_featurebox_type3_five_title = biznesspack_get_option('biznesspack_featurebox_type3_five_title');
$biznesspack_featurebox_type3_five_content = biznesspack_get_option('biznesspack_featurebox_type3_five_content');
$biznesspack_featurebox_type3_six = biznesspack_get_option('biznesspack_featurebox_type3_six');
$biznesspack_featurebox_type3_six_title = biznesspack_get_option('biznesspack_featurebox_type3_six_title');
$biznesspack_featurebox_type3_six_content = biznesspack_get_option('biznesspack_featurebox_type3_six_content');

$featurebox_collection = array(
	$biznesspack_featurebox_type3_one, 
	$biznesspack_featurebox_type3_two, 
	$biznesspack_featurebox_type3_three,
	$biznesspack_featurebox_type3_four,
	$biznesspack_featurebox_type3_five,
	$biznesspack_featurebox_type3_six
);

$featurebox_count = count( array_filter( $featurebox_collection ) );
	
	if( $featurebox_count == '6' ){
		$size = 'col-lg-4 col-md-6' ;
	}
	elseif( $featurebox_count == '5' ){
		$size = 'col-lg-4 col-md-6' ;
	}
	elseif( $featurebox_count == '4' ){
		$size = 'col-lg-4 col-md-6' ;
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
<section class="biznesspack-featurebox3 theme-color-bg">
	<div class="container">
    	<?php if( !empty( $biznesspack_featurebox_type3_section_title ) ): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper text-center feature-bottom-line text-white">
                        <h2 class="title"><?php echo esc_html( $biznesspack_featurebox_type3_section_title ); ?></h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row featurebox-inner-wrapper">
        	
        	<?php if( $biznesspack_featurebox_type3_one ): ?>
            	<div class="<?php echo esc_attr( $size ); ?>">
                	<div class="featurebox-wrapper">
						<?php if( !empty( $biznesspack_featurebox_type3_one_title ) ): ?>
                            <div class="featurebox-title">
                                <h5 class="title">
                                    <?php echo esc_html( $biznesspack_featurebox_type3_one_title ); ?>
                                </h5>
                            </div>
                        <?php endif; ?>
                        <?php if( !empty( $biznesspack_featurebox_type3_one_content ) ): ?>
                            <p class="featurebox-content">
                                <?php echo esc_html( $biznesspack_featurebox_type3_one_content ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
			<?php endif; ?>
            
            <?php if( $biznesspack_featurebox_type3_two ): ?>
            	<div class="<?php echo esc_attr( $size ); ?>">
                	<div class="featurebox-wrapper">
						<?php if( !empty( $biznesspack_featurebox_type3_two_title ) ): ?>
                            <div class="featurebox-title">
                                <h5 class="title">
                                    <?php echo esc_html( $biznesspack_featurebox_type3_two_title ); ?>
                                </h5>
                            </div>
                        <?php endif; ?>
                        <?php if( !empty( $biznesspack_featurebox_type3_two_content ) ): ?>
                            <p class="featurebox-content">
                                <?php echo esc_html( $biznesspack_featurebox_type3_two_content ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
			<?php endif; ?>
            
            <?php if( $biznesspack_featurebox_type3_three ): ?>
            	<div class="<?php echo esc_attr( $size ); ?>">
                	<div class="featurebox-wrapper">
						<?php if( !empty( $biznesspack_featurebox_type3_three_title ) ): ?>
                            <div class="featurebox-title">
                                <h5 class="title">
                                    <?php echo esc_html( $biznesspack_featurebox_type3_three_title ); ?>
                                </h5>
                            </div>
                        <?php endif; ?>
                        <?php if( !empty( $biznesspack_featurebox_type3_three_content ) ): ?>
                            <p class="featurebox-content">
                                <?php echo esc_html( $biznesspack_featurebox_type3_three_content ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
			<?php endif; ?>
            
            <?php if( $biznesspack_featurebox_type3_four ): ?>
            	<div class="<?php echo esc_attr( $size ); ?>">
                	<div class="featurebox-wrapper">
						<?php if( !empty( $biznesspack_featurebox_type3_four_title ) ): ?>
                            <div class="featurebox-title">
                                <h5 class="title">
                                    <?php echo esc_html( $biznesspack_featurebox_type3_four_title ); ?>
                                </h5>
                            </div>
                        <?php endif; ?>
                        <?php if( !empty( $biznesspack_featurebox_type3_four_content ) ): ?>
                            <p class="featurebox-content">
                                <?php echo esc_html( $biznesspack_featurebox_type3_four_content ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
			<?php endif; ?>
            
            <?php if( $biznesspack_featurebox_type3_five ): ?>
            	<div class="<?php echo esc_attr( $size ); ?>">
                	<div class="featurebox-wrapper">
						<?php if( !empty( $biznesspack_featurebox_type3_five_title ) ): ?>
                            <div class="featurebox-title">
                                <h5 class="title">
                                    <?php echo esc_html( $biznesspack_featurebox_type3_five_title ); ?>
                                </h5>
                            </div>
                        <?php endif; ?>
                        <?php if( !empty( $biznesspack_featurebox_type3_five_content ) ): ?>
                            <p class="featurebox-content">
                                <?php echo esc_html( $biznesspack_featurebox_type3_five_content );?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
			<?php endif; ?>
         	
         	<?php if( $biznesspack_featurebox_type3_six ): ?>
            	<div class="<?php echo esc_attr( $size ); ?>">
                	<div class="featurebox-wrapper">
						<?php if( !empty( $biznesspack_featurebox_type3_six_title ) ): ?>
                            <div class="featurebox-title">
                                <h5 class="title">
                                    <?php echo esc_html( $biznesspack_featurebox_type3_six_title ); ?>
                                </h5>
                            </div>
                        <?php endif; ?>
                        <?php if( !empty( $biznesspack_featurebox_type3_six_content ) ): ?>
                            <p class="featurebox-content">
                                <?php echo esc_html( $biznesspack_featurebox_type3_six_content ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
			<?php endif; ?>
            
        </div>
    </div>
</section>

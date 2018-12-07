<?php
$biznesspack_featurebox_one = biznesspack_get_option( 'biznesspack_featurebox_type1_one' );
$biznesspack_featurebox_two = biznesspack_get_option( 'biznesspack_featurebox_type1_two' ); 
$biznesspack_featurebox_three = biznesspack_get_option( 'biznesspack_featurebox_type1_three' ); 
$biznesspack_featurebox_four = biznesspack_get_option( 'biznesspack_featurebox_type1_four' );

$biznesspack_featurebox_one_icon = biznesspack_get_option( 'biznesspack_featurebox_type1_one_icon' );
$biznesspack_featurebox_one_title = biznesspack_get_option( 'biznesspack_featurebox_type1_one_title' );
$biznesspack_featurebox_two_icon = biznesspack_get_option( 'biznesspack_featurebox_type1_two_icon' );
$biznesspack_featurebox_two_title = biznesspack_get_option( 'biznesspack_featurebox_type1_two_title' );
$biznesspack_featurebox_three_icon = biznesspack_get_option( 'biznesspack_featurebox_type1_three_icon' );
$biznesspack_featurebox_three_title = biznesspack_get_option( 'biznesspack_featurebox_type1_three_title' );
$biznesspack_featurebox_four_icon = biznesspack_get_option( 'biznesspack_featurebox_type1_four_icon' );
$biznesspack_featurebox_four_title = biznesspack_get_option( 'biznesspack_featurebox_type1_four_title' );  

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

<section class="biznesspack-featurebox section theme-color-bg text-white text-center">
	<div class="container">
    	<div class="row featurebox-inner-wrapper">
        	
        	<?php if( $biznesspack_featurebox_one ) : ?>
        		<div class="<?php echo esc_attr( $size ); ?>">
        			<div class="featurebox-wrapper">
        				<?php if( !empty( $biznesspack_featurebox_one_icon ) ): ?>
        					<div class="featurebox-icon">
        						<i class="<?php echo esc_attr( $biznesspack_featurebox_one_icon ); ?>"></i>
        					</div>
        				<?php endif; ?>
        				<?php if(!empty( $biznesspack_featurebox_one_title )): ?>
        					<div class="featurebox-title">
        						<h5 class="title">
        							<?php echo esc_html( $biznesspack_featurebox_one_title ); ?>
        						</h5>
        					</div>
        				<?php endif; ?>
        			</div>
        		</div>
        	<?php endif; ?>

			<?php if( $biznesspack_featurebox_two ) : ?>
        		<div class="<?php echo esc_attr( $size ); ?>">
        			<div class="featurebox-wrapper">
        				<?php if( !empty( $biznesspack_featurebox_two_icon ) ): ?>
        					<div class="featurebox-icon">
        						<i class="<?php echo esc_attr( $biznesspack_featurebox_two_icon ); ?>"></i>
        					</div>
        				<?php endif; ?>
        				<?php if( !empty( $biznesspack_featurebox_two_title ) ): ?>
        					<div class="featurebox-title">
        						<h5 class="title">
        							<?php echo esc_html( $biznesspack_featurebox_two_title ); ?>
        						</h5>
        					</div>
        				<?php endif; ?>
        			</div>
        		</div>
        	<?php endif; ?>

        	<?php if( $biznesspack_featurebox_three ) : ?>
        		<div class="<?php echo esc_attr( $size ); ?>">
        			<div class="featurebox-wrapper">
        				<?php if( !empty( $biznesspack_featurebox_three_icon ) ): ?>
        					<div class="featurebox-icon">
        						<i class="<?php echo esc_attr( $biznesspack_featurebox_three_icon ); ?>"></i>
        					</div>
        				<?php endif; ?>
        				<?php if( !empty( $biznesspack_featurebox_three_title) ): ?>
        					<div class="featurebox-title">
        						<h5 class="title">
        							<?php echo esc_html( $biznesspack_featurebox_three_title ); ?>
        						</h5>
        					</div>
        				<?php endif; ?>
        			</div>
        		</div>
        	<?php endif; ?>

        	<?php if( $biznesspack_featurebox_four ) : ?>
        		<div class="<?php echo esc_attr( $size ); ?>">
        			<div class="featurebox-wrapper">
        				<?php if( !empty( $biznesspack_featurebox_four_icon ) ): ?>
        					<div class="featurebox-icon">
        						<i class="<?php echo esc_attr( $biznesspack_featurebox_four_icon ); ?>"></i>
        					</div>
        				<?php endif; ?>
        				<?php if( !empty( $biznesspack_featurebox_four_title ) ): ?>
        					<div class="featurebox-title">
        						<h5 class="title">
        							<?php echo esc_html( $biznesspack_featurebox_four_title ); ?>
        						</h5>
        					</div>
        				<?php endif; ?>
        			</div>
        		</div>
        	<?php endif; ?>

        </div>
    </div>
</section>
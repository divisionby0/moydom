<?php
get_header();
echo "<span id='frontPageAnchor'></span>";
$biznesspack_featured_status  = biznesspack_get_option( 'biznesspack_featured_status' );
$biznesspack_callto_action	= biznesspack_get_option( 'biznesspack_callto_action_status' );
$biznesspack_latest_post_section = biznesspack_get_option( 'biznesspack_latest_post_section_status' );
$biznesspack_about_page_section = biznesspack_get_option( 'biznesspack_about_page_section_status' );
$biznesspack_featurebox_section  = biznesspack_get_option( 'biznesspack_featurebox_type1_section_status' );
$biznesspack_featurebox_type2_section = biznesspack_get_option( 'biznesspack_featurebox_type2_section_status' );
$biznesspack_featurebox_type3_section = biznesspack_get_option( 'biznesspack_featurebox_type3_section_status' );

	if( is_front_page() ):  
		if ( has_header_image() ) { ?>
            <div class="header-image" style="position: relative!important;">
                <img src="<?php esc_url( header_image() ); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
				<?php
				//echo "<div class='container' id='catalogFiltersDesktop' style='position: absolute!important; top: 0;'><div class='row'><h2 style='width: 100%; text-align: center;'>Каталог</h2></div>";
				//new CatalogController();
				//echo "</div>";
				?>
            </div>

		<?php } 
		elseif( $biznesspack_featured_status == 1 ){
			get_template_part( 'template-parts/page/slider' ); 
       } 
	endif;
	if( $biznesspack_featurebox_section ):
		get_template_part( 'section/featurebox' );
	endif;
	if( $biznesspack_about_page_section ):
		get_template_part( 'section/about', 'page' );
	endif;
	if( $biznesspack_featurebox_type2_section ):
		get_template_part( 'section/featurebox2' );
	endif;
	if($biznesspack_featurebox_type3_section):
		get_template_part( 'section/featurebox3' );
	endif; 
	if( $biznesspack_latest_post_section ):
		get_template_part( 'section/post', 'slider' );
	endif;
    if( $biznesspack_callto_action ):
		get_template_part( 'section/calltoaction' );
	endif;

echo "<div class='container'><div class='row'>";
get_search_form();
echo "</div></div>";

echo "<div class='container'><div class='row'><h2 style='width: 100%; text-align: center;'>Горячая продажа</h2></div></div>";
new HotSaleController();
echo "<div class='container' style='padding-top: 20px;' id='hotSaleListContainer'></div>";

echo "<div class='container' id='catalogFiltersMobile'><div class='row'><h2 style='width: 100%; text-align: center;'>Каталог</h2></div>";
new CatalogController();
echo "</div>";
echo "<div class='container' style='padding-top: 20px;' id='estatesListContainer'></div>";

get_footer(); ?>
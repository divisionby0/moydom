<?php
/**
 * The header for our theme
 *
 * @package Biznesspack
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Агентство недвижимости 'Мой дом' в Феодосии. Недвижимость по всему Крыму. ">
    <meta property="og:site_name" content="Продажа, аренда, консультации">
    <meta property="og:url" content="http://mdfeo.ru">
    <meta property="og:description" content="Продажа, аренда, консультации">
    <meta property="og:image" content="http://mdfeo.ru/wp-content/uploads/2018/12/logo2.png">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php 
		// For top header
		$header_status = biznesspack_get_option( 'show_top_header' );
		$breadcrumb_type = biznesspack_get_option( 'breadcrumb_type' );
	?>
    
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrapper">
			<?php if($header_status == '1'): ?>
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <?php get_template_part( 'template-parts/header/top' ); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="header-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
                            <?php
                                $address = get_option( 'address_text', '' );
                                $url = site_url()."/контакты/";
                                $phone1 = get_option( 'admin_phone_1_text', '' );
                                $phone2 = get_option( 'admin_phone_2_text', '' );
                                $admin_email = get_option('admin_email');
                                echo "<div class='addressAndPhones'><div>";
                                echo "<a style='vertical-align:-webkit-baseline-middle;' href='".$url."'>".$address."</a>";
                                echo "<br/><a style='vertical-align:-webkit-baseline-middle;' href='tel:$phone1'>$phone1</a>    <a style='vertical-align:-webkit-baseline-middle;' href='tel:$phone2'>$phone2</a>";
                                echo "<br/><a style='vertical-align:-webkit-baseline-middle;' href='mailto:".$admin_email."'>".$admin_email."</a>";
                                echo "</div></div>";
                            ?>

                            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                                <div class="navigation-section">
                                	<div class="mobile-menu-wrapper">
                                    	<span class="mobile-menu-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                                    </div>
                                    <nav id="site-navigation" class="main-navigation" role="navigation">
                                        <?php wp_nav_menu( array(
                                            'theme_location' => 'primary',
                                            'menu_id'        => 'primary-menu',
                                            'menu_class' 	 => 'main-menu',
                                        ) ); 
                                        ?>
                                    </nav>
                                </div><!-- .navigation-section -->
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</header><!-- #masthead -->
	
<?php if( !is_front_page()):  ?>
    <section class="page-header jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if(is_page() || is_single() ){ ?>
                            <h2 class="page-title"><?php echo esc_html( get_the_title() ); ?></h2>

                        <?php } elseif( is_search() ){ ?>
    
                        <h2 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'biznesspack' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
    
                        <?php }elseif( is_404() ){ ?>
    
                        <h2 class="page-title"><?php echo esc_html( 'Page Not Found: 404', 'biznesspack'); ?></h2>
    
                        <?php }elseif( is_home() ){ ?>
    
                        <h2 class="page-title"><?php single_post_title(); ?></h2>
    
                        <?php } else{
    
                            the_archive_title( '<h2 class="page-title">', '</h2>' );
                        }
                    ?>
                    <?php if($breadcrumb_type == 'normal'): ?>
                        <div class="header-breadcrumb">
                            <?php biznesspack_breadcrumb_trail(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


	

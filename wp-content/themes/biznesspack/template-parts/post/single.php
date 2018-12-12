<?php
/**
 * Template part for displaying posts
 * @package Biznesspack
 * @version 1.5.1
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <ul class="entry-meta list-inline">
        <?php if( has_category()):
                echo '<li class="meta-categories list-inline-item"><i class="fa fa-folder-open-o" aria-hidden="true"></i>';
                    the_category( ',' );
                echo '</li>';
        endif; ?>
	</ul>
    
    <div class="post-inner-wrapper">
        <!--
		<?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'biznesspack-featured-image' ); ?>
            </div>
		<?php endif; ?>
        -->
        <div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->

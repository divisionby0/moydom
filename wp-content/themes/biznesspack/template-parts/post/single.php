<?php
/**
 * Template part for displaying posts
 * @package Biznesspack
 * @version 1.5.1
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <ul class="entry-meta list-inline">
            
		<?php biznesspack_posted_on(); ?>
        
        <?php if( has_category()):
                echo '<li class="meta-categories list-inline-item"><i class="fa fa-folder-open-o" aria-hidden="true"></i>';
                    the_category( ',' );
                echo '</li>';
        endif; ?>
            
        <li class="meta-comment list-inline-item">
            <?php $cmt_link = get_comments_link(); 
                  $num_comments = get_comments_number();
                    if ( $num_comments == 0 ) {
                        $comments = __( 'No Comments', 'biznesspack' );
                    } elseif ( $num_comments > 1 ) {
                        $comments = $num_comments . __( ' Comments', 'biznesspack' );
                    } else {
                        $comments = __('1 Comment', 'biznesspack' );
                    }
            ?>	
            <i class="fa fa-comments-o" aria-hidden="true"></i>
            <a href="<?php echo esc_url( $cmt_link ); ?>"><?php echo esc_html( $comments );?></a>
        </li>
            
	</ul>
    <div class="post-inner-wrapper">
		<?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'biznesspack-featured-image' ); ?>
            </div>
		<?php endif; ?>

        <div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->

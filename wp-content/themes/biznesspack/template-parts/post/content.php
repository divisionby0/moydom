<?php
/**
 * Template part for displaying posts
 * @package Biznesspack
 * @version 1.5.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-inner-wrapper">
    	<div class="row">
        	<div class="col-md-4">
            	<header class="entry-header">
            		<ul class="entry-meta list-inline">
                        
                        <?php if ( 'post' === get_post_type() ): biznesspack_posted_on(); endif; ?>
                        
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
                            <a href="<?php echo esc_url( $cmt_link ); ?>"><?php echo esc_html( $num_comments );?></a>
                        </li>
                    </ul>
					
					<?php 
						
						the_title( '<h2 class="entry-title feature-bottom-line">
										<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' 
								 ); 
					
					?>
                    
                    <?php if( has_category()):
							
							echo '<div class="meta-categories list-inline-item">
									<i class="fa fa-folder-open-o" aria-hidden="true"></i>';
                                    the_category( ',' );
							echo '</div>';
					
						endif;
					?>
                        
        		</header><!-- .entry-header -->
            </div><!-- .col-md-4 -->
            
            <div class="col-md-8">
            	<div class="row">
                	<?php if ( has_post_thumbnail() ) : ?>
                    	<div class="col-md-6">
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div><!-- .post-thumbnail -->
       		 			</div>
                        <div class="col-md-6">
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div><!-- .entry-content -->
                        </div>
                    <?php else: ?>
                    	<div class="col-md-12">
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div><!-- .entry-content -->
                        </div>
                    <?php endif; ?>	
				</div>
			</div><!-- .col-md-8 -->
            
        </div>
    </div>
</article><!-- #post-## -->

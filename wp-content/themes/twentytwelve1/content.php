<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<div class="article_info">
			<?php the_post_thumbnail(); ?>
            <div class="big_date">
                <div class="day"><?php echo esc_html(get_the_date('d')) ?></div>
                <div class="month"><?php echo esc_html(get_the_date('F')) ?></div>
            </div>
			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'twentytwelve' ) . '</span>', __( '1 Comments', 'twentytwelve' ), __( '% Comments', 'twentytwelve' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
		</div><!-- article_info -->
        <div class="article_content">
            <?php if ( is_single() ) : ?>
            <h2 class="entry-title"><?php the_title(); ?></h2>
            <?php else : ?>
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h2>
            <?php endif; // is_single() ?>
            <?php twentytwelve_entry_meta(); ?>
            <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
            <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
            <?php else : ?>
            <div class="entry-content">
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
            </div><!-- .entry-content -->
            <?php endif; ?>

            <?php if ( !is_single() ) : ?>
            <div class="date"><?php echo esc_html(get_the_date('d.m.Y')) ?><span class="time"><?php echo esc_html(get_the_date('H:i'))?></span></div>
            <a class="read-more" href="<?php echo the_permalink(); ?>">Read more</a>
            <?php endif; ?>

            <?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
            <div class="author-info">
                <div class="author-avatar">
                    <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
                </div><!-- .author-avatar -->
                <div class="author-description">
                    <h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
                    <p><?php the_author_meta( 'description' ); ?></p>
                    <div class="author-link">
                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                            <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
                        </a>
                    </div><!-- .author-link	-->
                </div><!-- .author-description -->
            </div><!-- .author-info -->
            <?php endif; ?>
        </div><!-- article_content -->
	</article><!-- #post -->

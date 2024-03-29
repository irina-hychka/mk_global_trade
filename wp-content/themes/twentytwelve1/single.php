<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

<!--                --><?php //echo get_post_format();
//                die();
//            ?>
				<?php get_template_part( 'content', get_post_format() ); ?>

                <nav class="nav-single">
                    <div class="previous_links">
                        <span class="nav-previous-tags"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
                        <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '', 'Previous post link', 'twentytwelve' ) . '</span> previous' ); ?></span>
    <!--					<span class="nav-next">--><?php //next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?><!--</span>-->
                    </div>
                    <div class="adding_comments">
                        <span class="comments-number"><?php echo comments_popup_link( '<span class="leave-reply">' . __( '0 Comments', 'twentytwelve' ) . '</span>', __( '', 'twentytwelve' ), __( '% Comments', 'twentytwelve' ) ); ?></span>
                        <span class="comments-add"><?php echo comments_popup_link( '<span class="leave-reply">' . __( '+ Add Yours', 'twentytwelve' ) . '</span>', __( '', 'twentytwelve' ), __( '+ Add Yours', 'twentytwelve' ) ); ?></span>
                    </div>
                        <!-- .comments-link -->
                </nav><!-- .nav-single -->






				<?php comments_template( '', true ); ?>


			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
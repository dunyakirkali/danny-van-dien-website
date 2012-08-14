<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */


	$catID = 0;
	if (is_page('media')) {
	  $catID=6;
	} elseif (is_page('photo')) {
	  $catID=5;
	} elseif (is_page('video-2')) {
	  $catID=4;
	} elseif (is_page('audio-2')) {
	  $catID=3;
	} elseif (is_page('live')) {
	  $catID=7;
	}

	if ($catID) {
	   	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	   	query_posts( array ( 'cat' => $catID, 'posts_per_page' => -1 ) );
	} 


get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php 
						if ($catID != 0) {
							get_template_part( 'content', get_post_format() );
						} else {
							get_template_part( 'content',  'page');
						}
					?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
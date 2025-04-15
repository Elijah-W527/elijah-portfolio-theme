<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yalo
 */

get_header();
 ?>
 
	 <main id="primary" class="site-main">
		<div class="front-page-container">
		 <?php
			 while ( have_posts() ) :
				 the_post();
 
				 // Check value exists.
				 if( have_rows('modules') ):
 
					 // Loop through rows.
					 while ( have_rows('modules') ) : the_row();
 
						 get_template_part( 'template-parts/sections', get_row_layout() );

 
 
					 // End loop.
					 endwhile;
 
				 // No value.
				 else :
					 // Do something...
				 endif;
 
			 endwhile; // End of the loop.
		 ?>
		</div><!-- .front-page-container -->
 
	 </main><!-- #main -->
 
 <?php
 get_footer();
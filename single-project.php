<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			

		endwhile; // End of the loop.
		?>

		<?php
			$i = 0;
			if( have_rows('sections') ) : while( have_rows('sections') ) : the_row();

			    	$i++;

			    	$pageContent = get_sub_field('section_copy');
			    	$featImg = get_sub_field('section_image');
			    	
			    	if( $i == 2 ) { $i = 0; } 
			    	if( $i == 1 ) {
			    		$slide = 'fadeInLeft';
			    		$align = '-left';
			    	} else {
			    		$slide = 'fadeInRight';
			    		$align = '-right';
			    	}
	 			?>
			    <section class="projects">	
		 			<section class="image<?php echo $align; ?> wow <?php echo $slide; ?> js-blocks">
		 				<img src="<?php echo $featImg['url']; ?>" alt="<?php echo $featImg['alt']; ?>">
		 			</section>
		 			<section class="copy<?php echo $align; ?> wow <?php echo $slide; ?> js-blocks">
		 				<div class="centered-copy">
			 				<!-- <header class="sub-page-title">
					 			<h2><?php the_title(); ?></h2>
					 		</header> -->
					 		<article class="sub-projects">
					 			<?php 
						 			if( $excerpt ) {
					 					echo $excerpt;
					 				} else {
					 					echo $pageContent;
					 				}
								?>
					 			<div class="clear margin-205">
					 				
					 			</div>
					 		</article>
				 		</div>
		 			</section>
			    </section>

			    <?php endwhile; ?>
			    
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

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
			    <section class="child-pages">	
		 			<section class="image<?php echo $align; ?> wow <?php echo $slide; ?>">
		 				<img src="<?php echo $featImg['url']; ?>" alt="<?php echo $featImg['alt']; ?>">
		 			</section>
		 			<section class="copy<?php echo $align; ?> wow <?php echo $slide; ?>">
		 				<article class="sections">
				 			<?php echo $pageContent; ?>
				 		</article>
		 			</section>
			    </section>

			    <?php endwhile; ?>
			    
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

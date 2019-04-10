<?php
/**
 * Template Name: Current Projects
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php
			$i = 0;
			$parent = new WP_Query(array(

			    'post_type'      => 'project',
			    'posts_per_page' => -1,
			    'order'          => 'ASC',
			    'orderby'        => 'menu_order'

			));

			if ($parent->have_posts()) : ?>
				
					
			
			    <?php while ($parent->have_posts()) : $parent->the_post(); 

			    	$i++;

			    	$pageContent = get_field('excerpt');
			    	$featImg = get_field('header_image');
			    	
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
			 				<header class="sub-page-title">
					 			<h2><?php the_title(); ?></h2>
					 		</header>
					 		<article class="sub-projects">
					 			<?php echo $pageContent; ?>
					 			<div class="clear margin-20">
					 				<div class="learnmore right">
						 				<a href="<?php the_permalink(); ?>">Learn More</a>
						 			</div>
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

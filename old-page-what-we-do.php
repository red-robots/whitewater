<?php
/**
 * Template Name: What We Do
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

			    'post_type'      => 'page',
			    'posts_per_page' => -1,
			    'post_parent'    => $post->ID,
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
			    <section class="child-pages">	
		 			<section class="image<?php echo $align; ?> wow <?php echo $slide; ?>">
		 				<img src="<?php echo $featImg['url']; ?>" alt="<?php echo $featImg['alt']; ?>">
		 			</section>
		 			<section class="copy<?php echo $align; ?> wow <?php echo $slide; ?>">
		 				<header class="sub-page-title">
				 			<h2><?php the_title(); ?></h2>
				 		</header>
				 		<article class="sub-pages">
				 			<?php echo $pageContent; ?>
				 			<div class="learnmore">
				 				<a href="<?php the_permalink(); ?>">Learn More</a>
				 			</div>
				 		</article>
		 			</section>
			    </section>

			    <?php endwhile; ?>
			    
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

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

			$parent = new WP_Query(array(

			    'post_type'      => 'page',
			    'posts_per_page' => -1,
			    'post_parent'    => $post->ID,
			    'order'          => 'ASC',
			    'orderby'        => 'menu_order'

			));

			if ($parent->have_posts()) : ?>
				<section class="child-pages">
					
			
			    <?php while ($parent->have_posts()) : $parent->the_post(); 
			    	$pageContent = get_field('page_intro');
			    	$featImg = get_field('header_image');
	 			?>
			    	
	 			<section class="image">
	 				<img src="<?php echo $featImg['url']; ?>" alt="<?php echo $featImg['alt']; ?>">
	 			</section>
	 			<section class="copy">
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
			    	

			    <?php endwhile; ?>
			    </section>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

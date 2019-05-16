<?php
/**
 * Template Name: Who We Are
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


			<?php
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'team',
				'posts_per_page' => -1,
				'order_by' => 'menu_order',
				'order' => 'DESC'
			));
			if ($wp_query->have_posts()) : ?>
				<section class="team-members">
					<h2>Our Team</h2>
					<div class="flexwrap">
						<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

							$position = get_field('position');
							$photo = get_field('photo');
						?>

							<div class="player">
								<a href="<?php the_permalink(); ?>">
									<?php if( $photo ) { ?>
										<div class="photo">
											<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>">
										</div>
									<?php } ?>
									<h3><?php the_title(); ?></h3>
									<?php if( $position ) { ?>
										<div class="position">
											<?php echo $position; ?>
										</div>
									<?php } ?>
								</a>
							</div>

						<?php endwhile; ?>
					</div>
				</section>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

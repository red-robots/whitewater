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

			<?php get_template_part('inc/the-page-loop'); ?>


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

<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>
	<section class="page-header wow fadeIn">
	<?php
		while ( have_posts() ) : the_post(); 
			$position = get_field('position');
			$photo = get_field('photo');
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<div class="info">
				<?php if( $position ) { ?>
					<div class="position">
						<?php echo $position; ?>
					</div>
				<?php } ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			</div>
			
		</article><!-- #post-## -->
		<?php endwhile; // End of the loop. ?>
	</section>


	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

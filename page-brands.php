<?php
/**
 * Template Name: Brands
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php get_template_part('inc/the-brand-loop'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

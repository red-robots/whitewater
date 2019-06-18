<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>

<link rel="stylesheet" href="https://use.typekit.net/jcg7ghc.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142152281-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-142152281-1');
</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrapper">
			
			<?php if(is_home()) { ?>
	            <h1 class="logo">
		            <a href="<?php bloginfo('url'); ?>">
		            	<img src="<?php bloginfo('template_url'); ?>/images/Whitewater.png" alt="<?php bloginfo('name'); ?>">
		            </a>
	            </h1>
	        <?php } else { ?>
	            <div class="logo">
	            	<a href="<?php bloginfo('url'); ?>">
		            	<img src="<?php bloginfo('template_url'); ?>/images/Whitewater.png" alt="<?php bloginfo('name'); ?>">
		            </a>
	            </div>
	        <?php } ?>

			<?php get_template_part('template-parts/nav-mobile'); ?>

	</div><!-- wrapper -->
	</header><!-- #masthead -->

	<div id="content" class="site-content wrapper">

	<?php get_template_part('template-parts/nav'); ?>

	<?php 
		if( is_front_page() ) {
			$post = get_post(12); // Homepage
			setup_postdata( $post );
				$featImg = get_field('header_image');
				$featImgM = get_field('header_image_mobile');
			wp_reset_postdata();
		} elseif(get_post_type() == 'team' ) {
			$featImg = get_field('photo');
		} else {
			$featImg = get_field('header_image');
			$featImgM = get_field('header_image_mobile');
			$featImgSingle = get_field('header_image_single');
		}

		if(get_post_type() == 'page' ) {
			$pType = 'page';
		} elseif(get_post_type() == 'project' ) {
			$pType = 'project';
		} elseif(get_post_type() == 'team' ) {
			$pType = 'team';
			$position = get_field('position');
		} else {
			$pType = 'post';
		}

		// Pages
		if( is_page('contact') ) {
			$pClass = 'contact';
		} elseif( is_page('who-we-are') ) {
			$pClass = 'who-we-are';
		} else {
			$pClass = 'default';
		}

		// set the class for mobile
		// if( $featImgM ) {
		// 	$class = 'mobile';
		// } else {
		// 	$class = 'desktop';
		// }

		if( $featImg ) {
	 ?>
	 	<section class="page-header wow fadeIn">
	 		<?php if( $featImgM ) { ?>
	 			<img class="mobile" src="<?php echo $featImgM['url']; ?>" alt="<?php echo $featImgM['alt']; ?>">
	 			<img class="desktop" src="<?php echo $featImg['url']; ?>" alt="<?php echo $featImg['alt']; ?>">
	 		<?php } else { ?>
	 			<img class="desktop-no" src="<?php echo $featImg['url']; ?>" alt="<?php echo $featImg['alt']; ?>">
	 		<?php } ?>
	 		<?php if( !is_front_page() ) { ?>
		 		<header class="page-title">
		 			<h1><?php the_title(); ?></h1>
		 		</header>
	 		<?php } ?>
	 		<?php if( get_post_type() != 'team' ) { ?>
		 		<article class="<?php echo $pType.' '.$pClass; ?>">
		 			<?php  
		 				$pageContent = get_field('page_intro');
		 				echo $pageContent;
					?>
		 				
		 		</article>
	 		<?php } ?>
	 	</section>
	 	
	 <?php } ?>



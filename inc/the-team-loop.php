<?php
$i = 0;
$parent = new WP_Query(array(

    'post_type'      => 'team',
    'posts_per_page' => -1,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'

));

if ($parent->have_posts()) : ?>
	
		

    <?php while ($parent->have_posts()) : $parent->the_post(); 

    	$i++;

    	$pageContent = get_field('page_intro');
    	$excerpt = get_field('excerpt');
    	$featImg = get_field('header_image');
    	$btn = get_field('learn_btn');
    	$photo = get_field('photo');
    	
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
				<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>">
			</section>
			<section class="copy<?php echo $align; ?> wow <?php echo $slide; ?> js-blocks">
				<div class="centered-copy">
 				<header class="sub-page-title">
		 			<h2><?php the_title(); ?></h2>
		 		</header>
		 		<?php echo $j; ?>
		 		<article class="sub-projects">
		 			<?php the_content(); ?>
		 			<div class="clear margin-205">
		 				<?php if( $btn == 'Yes' ) { ?>
			 				<div class="learnmore right">
				 				<a href="<?php the_permalink(); ?>">Learn More</a>
				 			</div>
			 			<?php } ?>
		 			</div>
		 		</article>
	 		</div>
			</section>
    </section>

    <?php endwhile; ?>
    
<?php endif; ?>
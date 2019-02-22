<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */


$address = get_field('address', 'option');
$csz = get_field('city_state_zip', 'option');
$phone = get_field('phone', 'option');
$email = get_field('email', 'option');
$spam = antispambot($email);

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="site-info">
				<?php echo $address.' | '.$csz.' | '.$phone.' | <a href="mailto:'.$spam.'">'.$spam.'</a>'; ?>
			</div><!-- .site-info -->
	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

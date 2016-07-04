<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="content-area">Get in touch with us</div>
</footer>
<div class="bottom">
	<div class="content-area">
		<img src="<?php echo do_shortcode('[logo_footer]') ?>" />
	</div>
</div>

<!-- .site-footer -->
	<?php wp_footer(); ?>
</body>
</html>

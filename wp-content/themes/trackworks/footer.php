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
<footer id="colophon" class="site-footer" role="contentinfo" style="background:url('<?php echo get_option('image_footer_bg') ?>'); background-size:cover;">
	<div class="container"><?php echo get_option('footer_text'); ?></div>
</footer>
<div class="bottom">
	<div class="container">
		<div class="wpb_column vc_column_container vc_col-sm-6">
			
			<?php
			if(!wp_is_mobile()){
			?>
			<img src="<?php echo get_option('image_footer_logo'); ?>" />
			<?php
			}
			else{
			?>
			<img src="<?php echo get_option('image_footer_logo_mobile'); ?>" />
			<?php
			}
			?>
			
		</div>
		<div class="wpb_column vc_column_container vc_col-sm-6">
			<p class="right"><?php echo get_option('copyright_text') ?></p>
		</div>
		<div id="toTop" class="gotop"></div>		
	</div>
</div>

<!-- .site-footer -->
	<?php wp_footer(); ?>
</body>
</html>

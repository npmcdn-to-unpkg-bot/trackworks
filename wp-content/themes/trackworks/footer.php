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
<div class="footer-wrapper">
<footer id="colophon" class="site-footer" style="background:url('<?php echo get_option('image_footer_bg') ?>'); background-size:cover;">
	<div class="container"><?php echo do_shortcode(get_option('footer_text')); ?></div>
</footer>
<div class="bottom">
	<div class="container">
		<div class="wpb_column vc_column_container vc_col-sm-6">
			
			<?php
			if(!wp_is_mobile()){
			?>
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_option('image_footer_logo'); ?>" alt=""/></a>
			<?php
			}
			else{
			?>
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_option('image_footer_logo_mobile'); ?>" alt="" /></a>
			<?php
			}
			?>
			
		</div>
		<div class="wpb_column vc_column_container vc_col-sm-6">
			<p class="right copyright">
			<?php
			if(wp_is_mobile()){
				echo do_shortcode(get_option('copyright_text_mobile'));
			}
			else{
				echo do_shortcode(get_option('copyright_text'));
			}
			
			
			?>
			</p>
		</div>
		<div id="toTop" class="gotop"></div>		
	</div>
</div>
</div>
<script type="text/javascript">
		jQuery(window).load(function(){
			jQuery(".btn-menu").click(function(){
				jQuery("#menu-mainmenu").slideToggle(); 
				if(jQuery(".custom-logo-link").hasClass('open')){
					jQuery(".custom-logo-link").removeClass('open');
					jQuery(".custom-logo-link").find('img').attr('src',jQuery(".custom-logo-link").attr('data-black'));
					//jQuery(".btn-menu").find('img').attr('src',jQuery(".btn-menu").attr('data-black'));
					jQuery(".btn-menu").html(jQuery(".btn-menu").attr('data-black'));
				}
				else{
					jQuery(".custom-logo-link").addClass('open');
					jQuery(".custom-logo-link").find('img').attr('src',jQuery(".custom-logo-link").attr('data-white'));
					//jQuery(".btn-menu").find('img').attr('src',jQuery(".btn-menu").attr('data-white'));
					jQuery(".btn-menu").html(jQuery(".btn-menu").attr('data-white'));
				}
				return false;
			})
			
			jQuery("a").each(function(){
				jQuery(this).removeAttr('itemprop');
			})
		})
		
	</script>
	<script>
		jQuery(window).load(function(){
			<?php
			if(!wp_is_mobile()){
			?>
			jQuery('.click-dow').click(function(){
				var down=jQuery(".bg_whille").offset();
				jQuery('html, body').animate({scrollTop : down['top']},800);
				return false;
			});
			<?php
			}
			else{
			?>
			jQuery('.click-dow').click(function(){
				var down=jQuery(".mobile").offset();
				jQuery('html, body').animate({scrollTop : down['top']},800);
				return false;
			});
			<?php
			}
			?>
			
		})
			
	</script>
	

<!-- .site-footer -->
	<?php wp_footer(); ?>
</body>
</html>
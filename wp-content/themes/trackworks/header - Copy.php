<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
	<div class="container">
		<div class="logo wpb_column vc_column_container vc_col-sm-4" >
			<?php 
			if(!wp_is_mobile()){
				$custom= str_replace('itemprop="url"','',get_custom_logo());
				echo str_replace('itemprop="logo"','',$custom);
			}
			else{
				?>
				<a href="<?php echo home_url(); ?>" class="custom-logo-link" rel="home" data-black="<?php echo get_option('image_mobile_logo'); ?>" data-white="<?php echo get_option('image_mobile_logo_white'); ?>">
					<img src="<?php echo get_option('image_mobile_logo'); ?>" class="custom-logo-mobile" alt="logo" ></a>
				<?php
			}
			?>
		</div>
		<div class="wpb_column vc_column_container vc_col-sm-8 class_menu_mobile">
		<?php
			wp_nav_menu(array('wp_nav_menu'));
		?>
		</div>
		<a href="#" class="btn-menu" data-black="<?php echo get_template_directory_uri(); ?>/images/btn-menu-mobile.png" data-white="<?php echo get_template_directory_uri(); ?>/images/close-menu.png" ><img src="<?php echo get_template_directory_uri(); ?>/images/btn-menu-mobile.png" alt="logo"/></a>
		<div class="clear"></div>
	</div>
</header>

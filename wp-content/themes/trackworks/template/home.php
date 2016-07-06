<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
?>
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="pro_right width795">
				<!--<div class="title-user">
					<h3><?php the_title(); ?></h3>
				</div>-->
				<div class="content-user">
					<div class="content-blog"><?php echo apply_filters('the_content', $post->post_content); ?></div>
				</div>
			</div>
			<div class="clear"></div>
		</main>
</div>
<?php get_footer(); ?>
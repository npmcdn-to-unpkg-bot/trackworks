<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="pro_right width795">
				<!--<div class="title-user">
					<h3><?php the_title(); ?></h3>
				</div>-->
				<div class="pages">
					<div class="content-user">
						<div class="content-blog  container"><?php echo apply_filters('the_content', $post->post_content); ?></div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</main>
</div>
<?php get_footer(); ?>

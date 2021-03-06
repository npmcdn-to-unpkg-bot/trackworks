<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri().'/js/jquery.masonry.js';?>"></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.js"></script>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">
			<div class="top-content">
				<div class="left-content wpb_column vc_column_container vc_col-sm-6">
					<div class="title">	<?php echo $post->post_title; ?></div>
				</div>
				<div class="title right-content wpb_column vc_column_container vc_col-sm-6"><?php echo apply_filters('the_content', $post->post_content); ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="bottom-content">
					<?php
						$datas = json_decode(get_post_meta($post->ID ,"album_json_data", true));
						if(!empty($datas)){
							?>
							<div class="grid">
							<?php
							foreach($datas as $num=>$data){
							$url=wp_get_attachment_url($data->id);
							$rand=rand(1,5);
							$class="";
							if($rand==2){
								$class="";
							}
							if($rand==3){
								$class="";
							}
							?>
							<div class="grid-item item single-project <?php echo $class;  ?>">
								<img src="<?php echo $url; ?>" alt="" />
							</div>
							<?php
							}
							?>
							</div>
							<?php
						}
					?>
					<div style="clear:both"></div>				
			</div>
			
			<?php
			if(wp_is_mobile()){
				?>
				<div class="pag-content pag-content-mobile">
				<?php
				$next_post = get_previous_post();
				$prev_post= get_next_post();
				?>
				<?php
				if(!empty($prev_post)){
				?>
				<div class="pre-pag">
					<a href="<?php echo get_page_link($prev_post->ID); ?>" ><?php _e('Previous','trackworks'); ?></a>
				</div>
				<?php
				}
				?>
				<?php
				if(!empty($next_post)){
				?>
				<div class="next-pag">
					<a href="<?php echo get_page_link($next_post->ID); ?>" ><?php _e('Next','trackworks'); ?></a>
				</div>
				<?php
				}
				?>
				</div>
				<?php
			
			}
			else{
			?>
			<div class="pag-content">
				<?php
				$next_post = get_previous_post();
				$prev_post= get_next_post();
				?>
				<?php
				if(!empty($prev_post)){
				?>
				<div class="pre-pag">
					<a href="<?php echo get_page_link($prev_post->ID); ?>" ><?php _e('Previous Project','trackworks'); ?></a>
				</div>
				<?php
				}
				?>
				<?php
				if(!empty($next_post)){
				?>
				<div class="next-pag">
					<a href="<?php echo get_page_link($next_post->ID); ?>" ><?php _e('Next Project','trackworks'); ?></a>
				</div>
				<?php
				}
				?>
				</div>
			<?php
			}
			?>
			
		</div>

	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
em sửa hai file single-project.php và style.css

<script type="text/javascript">
		//jQuery(document).ready(function(){
			/*
			var $grid=jQuery('.grid').masonry({
			  itemSelector: '.grid-item',
			  isFitWidth: true,
			});
			$grid.imagesLoaded().progress( function() {
			  $grid.masonry('layout');
			});
			*/
			
			var $grid = jQuery('.grid').imagesLoaded( function() {
			  // init Masonry after all images have loaded
			  $grid.masonry({
				itemSelector: '.grid-item',
			  	isFitWidth: true,
			  });
			});
		//});
</script>

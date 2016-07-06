<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<style>
	
		/* ---- grid ---- */
		
		.grid {
		  /* center */
		  margin: 0 auto;
		}
		
		/* clearfix */
		.grid:after {
		  content: '';
		  display: block;
		  clear: both;
		}
		
		/* ---- grid-item ---- */
		
		.grid-item {
		  width: 33.33333333%;
		  padding: 15px;
		}

		.grid-item img{ width:100%;}
		
		.bottom-content{ position:relative}
		.top-content{ padding-bottom: 98px}
</style>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
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
								$class=".grid-item--height2";
							}
							if($rand==3){
								$class=".grid-item--height3";
							}
							?>
							<div class="grid-item <?php echo $class;  ?>">
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
			
			<div class="pag-content">
				<?php
				$next_post = get_next_post();
				$prev_post= get_previous_post();
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
		</div>

	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
<script type="text/javascript">
		jQuery(window).load(function(){
			jQuery('.grid').masonry({
			  itemSelector: '.grid-item',
			  isFitWidth: true,
			});
		});
		</script>
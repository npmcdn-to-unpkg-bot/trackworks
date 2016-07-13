<?php
add_shortcode('logo_footer','logo_footer_f');
function logo_footer_f(){
	return get_option('image_footer_logo'); 
}

add_shortcode('page_link','page_link_f');
function page_link_f($attr){
	return get_page_link($attr['id']); 
}

add_shortcode('last_projects','last_projects_f');
function last_projects_f($attr){
	ob_start();
	$arrs = get_posts(array('post_type'=>'project','posts_per_page'=>3));
	foreach($arrs as $arr){
		$url = wp_get_attachment_url( get_post_thumbnail_id($arr->ID) );
		//$url=get_the_post_thumbnail($arr->ID,array(370,450));
		$title=$arr->post_title;
		if(strlen($title)<=20){
			$title='<p><span>'.$title.'</span></p>';
		}
		else{
			$k=0;
			$akk=explode(' ',$title);
			$str=array();
			for($i=0;$i<=count($akk);$i++){
				$temp=$str[$k].' '.$akk[$i];
				if(strlen($temp)<=20){
					$str[$k]=$temp;
				}
				else{
					$k++;
					$str[$k]=$akk[$i];
				}
			}
			$str[count($str)-1]='<p><span>'.$str[count($str)-1].'</span></p>';
			$title=implode(' ',$str);
		}
	?>
		<div class="last_project_item wpb_column vc_column_container vc_col-sm-4">
			<a href="<?php echo get_permalink($arr->ID); ?>"><img class="alignnone wp-image-36 size-full" src="<?php echo $url; ?>" alt="" width="370" height="450" /></a>
			<a class="title" href="<?php echo get_permalink($arr->ID); ?>"><div class="position"><div class="class_sos"><span><?php echo $title; ?></span></div></div></a>
		</div>
	<?php
	}
	return ob_get_clean();
}


add_shortcode('list_projects','list_projects_f');
function list_projects_f($attr){
	ob_start();
	$arrs = get_posts(array('post_type'=>'project','posts_per_page'=>-1));
	if(!empty($arrs)){
	?>
	<div class="projects">
		<div class="container">
			<h2 class="title"><?php echo the_title(); ?></h2>
			<?php
			foreach($arrs as $arr){
				$url = wp_get_attachment_url( get_post_thumbnail_id($arr->ID) );
				$title=$arr->post_title;
				if(strlen($title)<=20){
					$title='<p><span>'.$title.'</span></p>';
				}
				else{
					$k=0;
					$akk=explode(' ',$title);
					$str=array();
					for($i=0;$i<=count($akk);$i++){
						$temp=$str[$k].' '.$akk[$i];
						if(strlen($temp)<=20){
							$str[$k]=$temp;
						}
						else{
							$k++;
							$str[$k]=$akk[$i];
						}
					}
					$str[count($str)-1]='<p><span>'.$str[count($str)-1].'</span></p>';
					$title=implode(' ',$str);
				}
				
				
			?>
				<div class="wpb_column vc_column_container vc_col-sm-4 projects_item">
					<a href="<?php echo get_permalink($arr->ID); ?>">
						<div class="img">
							<img class="alignnone wp-image-36 size-full" src="<?php echo $url; ?>" alt="" />
						</div>
				    </a>
					<a class="title-project" href="<?php echo get_permalink($arr->ID); ?>"><div class="position"><div class="class_sos"><?php echo $title; ?></div></div></a>
				</div>
			<?php
			}
			?>
		</div>
	</div>
	<?php
	}
	return ob_get_clean();
}


add_shortcode('list_services','list_services_f');
function list_services_f($attr){
	ob_start();
	$arrs = get_posts(array('post_type'=>'service','posts_per_page'=>-1));
	if(!empty($arrs)){
	?>
	<div class="services">
		<div class="container">
			<h2 class="title">Services</h2>
		<?php
		foreach($arrs as $num=>$arr){
			$url = wp_get_attachment_url( get_post_thumbnail_id($arr->ID) );
			echo ($num%4==0)?'<div class="row">':'';
		?>
			<div class="col-md-3 col-sm-6">
				<div class="item">
					<div class="image"><a href="javascript:void(0)"><img src="<?php echo $url ?>" alt="" /></a></div>
					<div class="content">
						<h2 class="title"><?php echo $arr->post_title; ?></h2>
						<?php
							echo apply_filters('the_content', $arr->post_content);
						?>
					</div>
				</div>
			</div>
			
		<?php
			echo (($num+1)%4==0)?'</div>':'';
		}
		?>
		</div>
	</div>
	<?php
	}
	return ob_get_clean();
}




?>
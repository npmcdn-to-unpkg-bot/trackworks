<?php
	add_action('init', 'myStartSession', 1);
	function myStartSession() {
		if(!session_id()) {
			session_start();
		}
		
	}
	add_action( 'wp_enqueue_scripts', 'theme_th_scripts' );
	function theme_th_scripts() {
		wp_enqueue_script('labory',get_template_directory_uri().'/js/labory.js');
		wp_localize_script('labory', 'wnm_labory_p_url', array('p_url' => get_template_directory_uri().'/images/','a_url'=>admin_url('admin-ajax.php')));
		wp_enqueue_script('frontend',get_template_directory_uri().'/js/frontend.js',array(),'', true);
		wp_localize_script('frontend', 'wnm_th', array('p_url' => get_template_directory_uri(),'a_url'=>admin_url('admin-ajax.php')));
		wp_enqueue_style('frontend', get_template_directory_uri().'/css/frontend.css');
		wp_enqueue_style( 'customcss', get_template_directory_uri() . '/css/customcss.css');
		//wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
		wp_enqueue_script('jquery.masonry',get_template_directory_uri().'/js/jquery.masonry.js');
				
	}		
	add_action('admin_enqueue_scripts', 'admin_th_script');
	function admin_th_script() {
		wp_enqueue_script('backend',get_template_directory_uri().'/js/backend.js');
		wp_enqueue_style('backend', get_template_directory_uri().'/css/backend.css');	
	}
	
	$name="Projects";
	$slug="project";
	$support_arr=array("title","editor","thumbnail");
	$labels = array(
            'name' => _x($name, $name.' General Name'),
            'singular_name' => _x('News Item', $name.' Singular Name'),
            'add_new' => _x('Add New Project', 'Add New Project'),
            'add_new_item' => __('Add New '.$name),
            'edit_item' => __('Edit '.$name),
            'new_item' => __('New '.$name),
            'view_item' => __('View '.$name),
            'search_items' => __('New'),
            'not_found' =>  __('Nothing found', 'u-design'),
            'not_found_in_trash' => __('Nothing found in Trash'),
            'parent_item_colon' => ''
			);
	$args = array(
					'labels' => $labels,
					'public' => true,
					'publicly_queryable' => true,
					'show_ui' => true,
					'query_var' => true,
					'rewrite' => true,
					'capability_type' => 'post',
					'hierarchical' => false,
					'menu_position' => 7,
					'taxonomies' => array('post_tag'),
					'supports'=>$support_arr
				); 
	register_post_type( $slug , $args);
	
	$name="Services";
	$slug="service";
	$support_arr=array("title","editor","thumbnail");
	$labels = array(
            'name' => _x($name, $name.' General Name'),
            'singular_name' => _x('News Item', $name.' Singular Name'),
            'add_new' => _x('Add New '.$name, 'Add New '.$name),
            'add_new_item' => __('Add New '.$name),
            'edit_item' => __('Edit '.$name),
            'new_item' => __('New '.$name),
            'view_item' => __('View '.$name),
            'search_items' => __('New'),
            'not_found' =>  __('Nothing found', 'u-design'),
            'not_found_in_trash' => __('Nothing found in Trash'),
            'parent_item_colon' => ''
			);
	$args = array(
					'labels' => $labels,
					'public' => true,
					'publicly_queryable' => true,
					'show_ui' => true,
					'query_var' => true,
					'rewrite' => true,
					'capability_type' => 'post',
					'hierarchical' => false,
					'menu_position' => 7,
					'taxonomies' => array('post_tag'),
					'supports'=>$support_arr
				); 
	//register_post_type( $slug , $args);
	
	add_action( 'add_meta_boxes', 'create_album_in_post_type' );
	function create_album_in_post_type(){
			$type="project";
			add_meta_box(
				"album-".$type, 
				"Gallery", 
				"show_album_meta_box", 
				$type, 
				"advanced"
			);
	}
	function show_album_meta_box($post_type){
		$str_json = get_post_meta($post_type->ID,"album_json_data", true);
		$albums = json_decode($str_json); 
		wp_nonce_field( 'album_inner_custom_box', 'album_inner_custom_box_nonce' );
		?>
		<div class="w-album">
			<textarea class="album_json_data" name="album_json_data"><?php echo $str_json;?></textarea>
			<ul class="album-list-image">
			<?php if($albums && is_array($albums) ){
				foreach($albums as $attch){?>
				<li>
					<input class="idattch" type="hidden" value="<?php echo $attch->id;?>" />
					<?php echo wp_get_attachment_image($attch->id,"medium",false,"class=album-img");?>
					<input placeholder="Caption.." type="text" class="album-title" value="<?php echo $attch->caption;?>" />
					<a onclick="return remove_image_album(this)" class="album-remove" href="#">x</a>
				</li>
				<?php }
			} ?>
			</ul>
			<a onclick="return open_wp_media_ablum(this)" title="Add images" href="#" class="add_image_to_album button">+ Add image</a>
		</div>
		<?php
	}
	function save_album_on_save_post($post_id){
		if ( ! isset( $_POST['album_inner_custom_box_nonce'] ) )
			return $post_id;
		$nonce = $_POST['album_inner_custom_box_nonce'];
		if ( ! wp_verify_nonce( $nonce, 'album_inner_custom_box' ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		  return $post_id;
		if(! isset( $_POST['album_json_data'] ) )
			return $post_id;
		update_post_meta($post_id,"album_json_data",$_POST['album_json_data']);
	}
	add_action("save_post","save_album_on_save_post");
	function jv_get_album($post_id){
		$result="";
		global $post;
		if($post_id==null){
			$post_id = $post->ID;
		}
		$datas = json_decode(get_post_meta($post_id ,"album_json_data", true));
		
		$result.=(count($datas)>1)?'<div class="blog-gellary">':'';
		if($datas) foreach($datas as $data){
			if($data->id<>NULL){
			$url=wp_get_attachment_url($data->id);
			$result.='<div class="item"><img src="'.$url.'" alt="" /></div>';
			}
		}
		$result.=(count($datas)>1)?'</div>':'';
		return $result;
	}
	
	
	function themename_customize_register($wp_customize){	 
		
		//  =============================
		//  = Logo mobile            =
		//  =============================
		$wp_customize->add_setting('image_mobile_logo', array(
			'default'           => get_template_directory_uri().'/images/logo_default.png',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
	 
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_mobile_logo', array(
			'label'    => __('Mobile logo', 'themename'),
			'section'  => 'title_tagline',
			'settings' => 'image_mobile_logo',
		)));
		//  =============================
		//  = Footer logo             =
		//  =============================
		$wp_customize->add_setting('image_footer_logo', array(
			'default'           => get_template_directory_uri().'/images/logo_default.png',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
	 
		));
	 
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_footer_logo', array(
			'label'    => __('Footer logo', 'themename'),
			'section'  => 'title_tagline',
			'settings' => 'image_footer_logo',
		)));
		
		//  =============================
		//  = Footer logo             =
		//  =============================
		$wp_customize->add_setting('image_footer_logo_mobile', array(
			'default'           => get_template_directory_uri().'/images/logo_default.png',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
	 
		));
	 
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_footer_logo_mobile', array(
			'label'    => __('Footer logo mobile', 'themename'),
			'section'  => 'title_tagline',
			'settings' => 'image_footer_logo_mobile',
		)));
		//  =============================
		//  = background footer             =
		//  =============================
		$wp_customize->add_setting('image_footer_bg', array(
			'default'           => get_template_directory_uri().'/images/logo_default.png',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
	 
		));
	 
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_footer_bg', array(
			'label'    => __('Background Footer Image', 'themename'),
			'section'  => 'title_tagline',
			'settings' => 'image_footer_bg',
		)));
		
		
		//  =============================
		//  = Footer text                =
		//  =============================
		$wp_customize->add_setting('footer_text', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'option',
	 
		));
	 
		$wp_customize->add_control('footer_text', array(
			'label'      => __('Text footer', 'themename'),
			'section'    => 'title_tagline',
			'settings'   => 'footer_text',
		));
		
		//  =============================
		//  = Copy right              =
		//  =============================
		$wp_customize->add_setting('copyright_text', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'option',
	 
		));
	 
		$wp_customize->add_control('copyright_text', array(
			'label'      => __('Copyright', 'themename'),
			'section'    => 'title_tagline',
			'settings'   => 'copyright_text',
		));
		
    
	}
 
	add_action('customize_register', 'themename_customize_register');
	
?>
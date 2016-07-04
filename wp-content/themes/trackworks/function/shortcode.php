<?php
add_shortcode('logo_footer','logo_footer_f');
function logo_footer_f(){
	return get_option('image_footer_logo'); 
}
?>
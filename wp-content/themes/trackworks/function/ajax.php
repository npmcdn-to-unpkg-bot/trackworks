<?php
add_action('wp_ajax_add_avatar','add_avatar');
add_action('wp_ajax_nopriv_add_avatar','add_avatar');
function add_avatar(){
	$_SESSION['avatar']=$_POST['avatar'];
	exit;
}
?>
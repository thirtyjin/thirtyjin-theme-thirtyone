<?php
/*
Function Name: Like This
Description: Integrates a "Like This" option for posts. 
Version: 1.0
Author: Rose Pritchard & thirtyjin

*/

function likeThis($post_id,$action = 'get') {

	if(!is_numeric($post_id)) {
		error_log("Error: Value submitted for post_id was not numeric");
		return;
	} //if

	switch($action) {
	
	case 'get':
		$data = get_post_meta($post_id, '_likes');
		
		if(!is_numeric($data[0])) {
			$data[0] = 1;
			add_post_meta($post_id, '_likes', '1', true);
		} //if
		
		return $data[0];
	break;
	
	
	case 'update':
		if(isset($_COOKIE["like_" . $post_id])) {
			return;
		} //if
		
		$currentValue = get_post_meta($post_id, '_likes');
		
		if(!is_numeric($currentValue[0])) {
			$currentValue[0] = 0;
			add_post_meta($post_id, '_likes', '10', true);
		} //if
		
		
		
		$currentValue[0]++;
		update_post_meta($post_id, '_likes', $currentValue[0]);
		
		setcookie("like_" . $post_id, $post_id,time()+(60*60*24*365));
	break;

	} //switch

} //likeThis

function printLikes($post_id) {
	$likes = likeThis($post_id);
	
	if(isset($_COOKIE["like_" . $post_id])) {
	print '<a href="#" class="likeThis done icon icon-like" id="like-'.$post_id.'" title="Like This">'.$likes.'</a>';
		return;
	} //if
	
	print '<a href="#" class="likeThis icon icon-like" id="like-'.$post_id.'" title="Like This">'.$likes.'</a>';

	
} //printLikes


function setUpPostLikes($post_id) {
	if(!is_numeric($post_id)) {
		error_log("Error: Value submitted for post_id was not numeric");
		return;
	} //if
	
	add_post_meta($post_id, '_likes', '1', true);

} //setUpPost


function checkHeaders() {
	if(isset($_POST["likepost"])) {
		likeThis($_POST["likepost"],'update');
	} //if

} //checkHeaders




add_action ('publish_post', 'setUpPostLikes');
add_action ('init', 'checkHeaders');

?>
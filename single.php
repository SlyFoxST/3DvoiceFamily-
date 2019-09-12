<?php
 get_header();
$post = $wp_query->post;
//var_dump($post);
$name = $post->post_type;
// $post_type = get_post_types();
  if (!empty($name)) {
      include(TEMPLATEPATH.'/parts/single/'.$name.'.php');
}
else{
	include(TEMPLATEPATH.'/parts/single/post.php');
}


get_footer();
?>
<?php
$img =  get_the_post_thumbnail_url($post->ID,"post_previe");
if(!empty($img)){
	$img_url = $img;
}
else{
	$img_url = get_template_directory_uri() . "/img/noimg-300-190.jpg";
}

?>
<div class="slides">
	<div class="wrap-img-slide">
		<div class="overlay-slide">
				<div class="button-parent2">
		<div class="button-parent--inner2">
			<div class="button-item2">
				<a href="<?php the_permalink(get_the_ID())?>" class="btn-2s" alt="<?php echo $post->post_title;?>"><?php _e("Узнать больше",WP_HOME);?></a>
			</div>
		</div>
	</div>
		</div>
		<img src="<?php echo $img_url;?>" alt="<?php echo $post->post_title;?>"/>
		
	</div>
	
	<div class="title-slide poiret">
		<a href="<?php echo the_permalink(get_the_ID())?>" alt="<?php echo $post->post_title;?>">
			<?php echo $post->post_title; ?>			
		</a>
	</div>
	<div class="description-slider">
		<p><?php echo the_excerpt();?></p>
	</div>
	<div class="button-parent">
		<div class="button-parent--inner">
			<div class="button-item">
				<a href="<?php the_permalink(get_the_ID())?>" class="btn-2" alt="<?php echo $post->post_title;?>"><?php _e("Подробнее",WP_HOME);?></a>
			</div>
		</div>
	</div>
</div>

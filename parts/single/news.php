<?php
$phone = get_post_meta($post->ID,'_add_phone_user',true);
$phone2 = get_post_meta($post->ID,'_add_phone_user2',true);
$insta  = get_post_meta($post->ID,'_add_user_instagram',true);
$vk = get_post_meta($post->ID,'_add_user_vk',true);
$fb = get_post_meta($post->ID,'_add_user_facebook',true);
$yb = get_post_meta($post->ID,'_add_url_youtub',true);
$sk = get_post_meta($post->ID,'skype',true);
$twitter = get_post_meta($post->ID,'_add_user_twitter',true);
$email = get_post_meta($post->ID,'_add_user_email',true);
$url_user = get_post_meta($post->ID,'_add_url_user',true);
?>
<div id="particles-js">	
</div>
<div class="content content-single" style="margin-top: <?php is_user_logged_in() ? $margin = "20px" : $margin = "100px"; echo $margin;?>" >
	<div class="breadcrambs">
		<?php
		if( function_exists('breadcrumbs') ) breadcrumbs();
		?>
	</div>
	<div class="flex df-parametrs-artist">
		<div class="previe-info news-previe">
			<h1><?php the_title();?></h1>
			<?php 
			$post_thumbnail = get_the_post_thumbnail_url($post->ID,'post_previe');
			if(empty($post_thumbnail)){?>
			<div class="image-previe-post">
				<img src="<?php echo get_template_directory_uri() . '/img/default/noimage_previe.png';?>" alt="<?php the_title();?>" /> 
			</div>         	
			<?	
		}
		else{
			?>
			<div class="image-previe-post">
				<img src="<?php echo   $post_thumbnail;?>" alt="<?php the_title();?>" /> 
			</div>
			
			<div class="raiting-post">
				<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
			</div>
			<?php
		}
		?>
		<div class="share">
			<?php get_template_part('parts/layouts/shares');?> 
		</div>
		
	</div>

	<div class="info-artist">
		<h1><?php the_title();?></h1>
		<?
		$gallery = get_post_meta($post->ID,'_add_gallery',true);?>
		<?php 	if(!empty($gallery)){?>
		<div class="df-gallery">
			<?php
			$gallery = array_combine(array_merge(array_slice(array_keys($gallery), 1), array(count($gallery))), array_values($gallery));
			?>
			<div class="over-slider">
				<?php
				foreach ($gallery as $value) {
					?>
					<a href="<?php echo wp_get_attachment_image_url($value,true);?>" data-fancybox="images"><img src="<?php echo wp_get_attachment_image_url($value,true);?>"></a>	
					<?
				}
				?>
				
			</div>			
		</div>
		<?php	}
		
		?>
		<?php while(have_posts()):
		the_post();
		the_content();
		endwhile;?>
	</div>
</div>
</div>

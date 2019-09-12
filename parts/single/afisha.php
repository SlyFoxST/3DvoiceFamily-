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
		<div class="previe-info">
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
			<?php
		}
		?>

		<div class="raiting-post">
			<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
		</div>
		<div class="share">
			<?php get_template_part('parts/layouts/shares');?> 
		</div>
		<?php
		$cat = get_the_terms( $post->ID, 'categorys' );
		if(!empty($cat)):?>
		<div class="flex parametrs">
			<div class="span-color">Категория:</div>
			<div class="term-param">
				<?
				if( is_array( $cat ) ){
					foreach( $cat as $category ){
						echo '&rarr;<a href="'. get_term_link( $category->term_id, $category->taxonomy ) .'">'. $category->name .'</a><br />';
					}
				}?>
			</div>
		</div>
		<?
	endif;
	$country = get_the_terms( $post->ID, 'country' );
	if(!empty($country)):?>
	<div class="flex parametrs space-between">
		<div class="span-color">Страна:</div>
		<div class="term-param">
			<?
			if( is_array($country) ){
				foreach($country as $countr ){
					echo '&rarr;<a href="'. get_term_link( $countr->term_id, $countr->taxonomy ) .'">'. $countr->name .'</a><br />';
				}
			}?>
		</div>
	</div>
	<?
endif;
$cur_terms = get_the_terms( $post->ID, 'city' );
if(!empty($cur_terms)):?>
<div class="flex parametrs space-between">
	<div class="span-color">Город:</div>
	<div class="term-param">
		<?
		if( is_array( $cur_terms ) ){
			foreach( $cur_terms as $cur_term ){
				echo '&rarr;<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a><br />';
			}
		}?>
	</div>
</div>
<?
endif;
if(is_super_admin()){
	if(!empty($phone) || !empty($phone2) || !empty($insta) || !empty($vk) || !empty($twitter) || !empty($sk) || !empty($fb) || !empty($email) || !empty($yb)){?>
	<div class="parametrs">
		<div class="span-color">Контакты:</div>
		<div class="term-param user-contact">
			<a href="tel:<?php echo $phone;?>" alt="<?php echo $phone;?>"><?php echo $phone;?></a>
			<a href="tel:<?php echo $phone2;?>" alt="<?php echo $phone2;?>"><?php echo $phone2;?></a>
			<a href="mailto:<?php echo $email?>" alt="<?php echo $email;?>"><?php echo $email;?></a>
			<div class="flex df-user-social">
				<a href="<?php echo $insta?>" alt="instagram" target="_blank"><img src="<?php echo get_template_directory_uri()?>/img/in.png" alt="instagram" ></a>
				<a href="<?php echo $fb;?>" alt="facebook" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/fb.png" alt="facebook" ></a>
				<a href="<?php echo $vk;?>" alt="vk" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/vk.png" alt="vk" ></a>
				<a href="<?php echo $twitter;?>" alt="twitter" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/twitter.png" alt="twitter" ></a>
				<a href="skype:<?php echo $sk;?>" alt="skyper" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/skype.png" alt="skype" ></a>
				<a href="<?php echo $yb;?>" alt="youtub" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/yb.png" alt="youtub" ></a>
			</div>
		</div>
	</div>
	<?php
}
}
?>
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

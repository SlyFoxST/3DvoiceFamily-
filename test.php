if(is_front_page() || is_home() || is_category()){
	$class_wrap = "wrap-content";
}
else if(is_single()){
	$class_wrap = "wrap-single";
}
?>
<div class="background-content-top">
	<div class="<?php echo $class_wrap;?> padding">
		<div class="scroll1">
		</div>

		<div class="title poiret center"><?php _e("Последние новости",WP_HOME);?></div>
		<div class="loop-slider">
			<?
			$args_news = array(
				"post_type" => 'news',
	//"posts_per_page" => -1,
				"orderby" => "DESC",
			);
			$news = new WP_Query($args_news);
			while($news->have_posts()):
				$news->the_post();
				get_template_part("parts/slider","part");
			endwhile;
			wp_reset_postdata();
			wp_reset_query();?>
		</div>
	</div>
</div>
<div class="section-zakazi">

	<div class="title-zakazi poiret padding">
		<?php 		
		echo get_post_meta($post->ID,"_title_uslygi",true);		?>
	</div>
	<div class="description-section2 padding">
		<?php  echo get_post_meta($post->ID,"_description_uslygi",true); ?>				
	</div>

	<div class="container uslugi flex padding space-between">
		<?php
		$img1 =  get_post_meta($post->ID,"_img_usluga1",true);
		$img2 =  get_post_meta($post->ID,"_img_usluga2",true);
		$img3 =  get_post_meta($post->ID,"_img_usluga3",true);
		$img4 =  get_post_meta($post->ID,"_img_usluga4",true);
		$title_u = get_post_meta($post->ID,"_title_usluga1",true);
		$title_u2 = get_post_meta($post->ID,"_title_usluga2",true);
		$title_u3 = get_post_meta($post->ID,"_title_usluga3",true);
		$title_u4 = get_post_meta($post->ID,"_title_usluga4",true);
		?>
		<div class="usluga">
			<div class="img-usl">
				<img src="<?php if(empty($img1)): echo get_template_directory_uri() . '/img/noimg-260-165.jpg'; else: echo wp_get_attachment_url($img1,'previe_img_previe',true); endif;?>" alt="<?php  if(!empty($title_u)): echo $title_u; else: echo get_the_title(); endif;?>"/>
			</div>
			<div class="title-usl poiret padding">
				<?php echo 	$title_u;?>
			</div>
			<div class="description-usl padding">
				<?php echo get_post_meta($post->ID,'_description_usluga1',true);?>
			</div>
			<div class="btn-zakas">
				<?php _e("Заказать",WP_HOME);?>
			</div>
		</div>
		<div class="usluga">
			<div class="img-usl">
				<img src="<?php if(empty($img2)): echo get_template_directory_uri() . '/img/noimg-260-165.jpg'; else: echo wp_get_attachment_url($img2,'previe_img_previe',true); endif;?>" alt="<?php  if(!empty($title_u2)): echo $title_u2; else: echo get_the_title(); endif;?>"/>
			</div>
			<div class="title-usl poiret padding">
				<?php echo 	$title_u2;?>
			</div>
			<div class="description-usl padding">
				<?php echo get_post_meta($post->ID,'_description_usluga2',true);?>
			</div>
			<div class="btn-zakas">
				<?php _e("Заказать",WP_HOME);?>
			</div>
		</div>
		<div class="usluga">
			<div class="img-usl">
				<img src="<?php if(empty($img3)): echo get_template_directory_uri() . '/img/noimg-260-165.jpg'; else: echo wp_get_attachment_url($img3,'previe_img_previe',true); endif;?>" alt="<?php  if(!empty($title_u3)): echo $title_u3; else: echo get_the_title(); endif;?>"/>
			</div>
			<div class="title-usl poiret padding">
				<?php echo 	$title_u3;?>
			</div>
			<div class="description-usl padding">
				<?php echo get_post_meta($post->ID,'_description_usluga3',true);?>
			</div>
			<div class="btn-zakas">
				<?php _e("Заказать",WP_HOME);?>
			</div>
		</div>
		<div class="usluga">
			<div class="img-usl">
				<img src="<?php if(empty($img4)): echo get_template_directory_uri() . '/img/noimg-260-165.jpg'; else: echo wp_get_attachment_url($img4,'previe_img_previe',true); endif;?>" alt="<?php  if(!empty($title_u4)): echo $title_u4; else: echo get_the_title(); endif;?>"/>
			</div>
			<div class="title-usl poiret padding">
				<?php echo 	$title_u4;?>
			</div>
			<div class="description-usl padding">
				<?php echo get_post_meta($post->ID,'_description_usluga4',true);?>
			</div>
			<div class="btn-zakas">
				<?php _e("Заказать",WP_HOME);?>
			</div>
		</div>
	</div>
	<div class="scroll3">
	</div>
</div>
<?php get_template_part('parts/mail');?>



<div class="section-artist">
	<div class="slider-artist container padding">
		<div class="scroll2">
		</div>
		<div class="title poiret center">В нашей базе самый большой выбор артистов</div>
		<div class="loop-slider">
			<?
			$args_news = array(
				"post_type" => 'artysts',
	//"posts_per_page" => -1,
				"orderby" => "DESC",
			);
			$news = new WP_Query($args_news);
			while($news->have_posts()):
				$news->the_post();
				get_template_part("parts/slider","part");
			endwhile;
			wp_reset_postdata();
			wp_reset_query();?>
		</div>
	</div>
</div>
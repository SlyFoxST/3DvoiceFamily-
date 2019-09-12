<?php
/*Template name: front*/

//var_dump($news);
get_header();
if(is_front_page() || is_home() || is_category() || is_page()){
	$class_wrap = "wrap-content";
}
else if(is_single()){
	$class_wrap = "wrap-single";
}
?>
<div class="background-content-top">
	<div class="<?php echo $class_wrap;?> padding df-top-slider">
		<a href="#yakor" <?php the_title();?>><div class="scroll1">
		</div></a>

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
<div class="section-zakazi" id="yakor">
	<div class="title-zakazi poiret padding">
		<?php 		
		echo get_post_meta($post->ID,"_title_uslygi",true);		?>
	</div>
	<div class="description-section2 padding">
		<?php  echo get_post_meta($post->ID,"_description_uslygi",true); ?>				
	</div>

	<div class="container uslugi flex padding space-between flex-wrap">
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
	<a href="#yakor2"><div class="scroll3">
	</div></a>
</div>
<?php get_template_part('parts/mail');?>



<div class="section-artist">
	<div class="slider-artist container padding" id="yakor2">
		<a href="#yakor3" alt="<?php the_title();?>"><div class="scroll2">
		</div></a>
		<div class="title poiret center">В нашей базе самый большой выбор артистов</div>
		<div class="loop-slider">
			<?
			$args_news = array(
				"post_type" => 'artysts',
				"posts_per_page" => 10,
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
<div class="section-partners-front">

	<div class="title poiret center partners-section">
		<h2>Партнеры</h2>
	</div>
	<div class="slider-artist container padding">
		<div class="slider single-item">
			<?php
			$gal = get_post_meta($post->ID,'_add_partners_',true);
//var_dump($gal);
			foreach ($gal as $value) {
				$imgs = wp_get_attachment_url($value,'thumbnails',true); 
				echo '<div><img src="'.$imgs.'"></div>';
			}
			?>

		</div>
	</div>

</div>

<div class="contact-front-bottom">
	<div class="front-form flex container">
		<div class="bottom-form">
			<div class="title-form-bottom">
				<?php _e('Если у вас есть вопрос,
				предложение или комментарий, напишите нам сообщение и наш менеджер вскоре с вами свяжется');?>
			</div>
			<?php 
			echo do_shortcode('[contact-form-7 id="484" title="Front-bottom"]');
			?>
		</div>
		<div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5250.8627516998295!2d37.617322!3d48.849984!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x71a9008eeebf8317!2z0JrQvtC90YbQtdGA0YLQvdC-0LUg0LDQs9C10L3RgtGB0YLQstC-ICIzRFZvaWNlIEZhbWlseSI!5e0!3m2!1sru!2sua!4v1555250111160!5m2!1sru!2sua" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</div>

<?
get_footer();
?>
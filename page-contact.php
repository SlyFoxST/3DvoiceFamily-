<?php
/*Template name: contact*/
get_header();
$phone1 = get_post_meta($post->ID,"admin_phone",true);
$phone2 = get_post_meta($post->ID,"admin_phone2",true);
$phone3 = get_post_meta($post->ID,"admin_phone3",true);
$mail1  = get_post_meta($post->ID,"admin_mail1",true);
$mail2  = get_post_meta($post->ID,"admin_mail2",true);
$soc    = get_post_meta($post->ID,"admin_instagramm",true);
$soc2   = get_post_meta($post->ID,"admin_facebook",true);
$soc3   = get_post_meta($post->ID,"admin_vk",true);

?>
<div id="particles-js">	
</div>

<div class="content-contact" style="margin-top: <?php is_user_logged_in() ? $margin = "0px" : $margin = "100px"; echo $margin;?> ">
	<?
	if(have_posts()){
		while(have_posts()){
			the_post();?>
			<h1><?php the_title();?></h1>
			<div class="flex txt-contact">
				<div class="maps">
					<?php $iframe = get_post_meta($post->ID,"_maps",true);
					echo $iframe['url'];
					?>
				</div>
				<div class="df-phones-mail">
					<div class="df-wp-content contact-content">
						<?php the_content();?>
					</div>
					<?php
					if(!empty($mail1)){?>
					<div class="df-info-site">
						<div class="df-txt-if">Вопросы сотрудничества:</div>
						<a href="mailto:<?php echo $mail1?>">&#9993; <?php echo $mail1?></a>
					</div>
					<?php }

					if(!empty($mail2)){
						?>
						<div class="df-info-site">
							<div class="df-txt-if">Oстальные вопросы:</div>
							<a href="mailto:<?php echo $mail2?>">&#9993; <?php echo $mail2;?></a>
						</div>
						<?
					}
					if(!empty($phone1 || $phone2 || $phone3)){
						?>
						<div class="df-info-site">
							<div class="df-txt-if">Для того чтобы сделать заказ позвоните по номеру:</div>
							<a href="tel:<?php echo $phone1?>">&#9742; <?php echo $phone1;?></a>
							<a href="tel:<?php echo $phone2?>">&#9742; <?php echo $phone2;?></a>
							<a href="tel:<?php echo $phone3?>">&#9742; <?php echo $phone3;?></a>
						</div>
						<?
					}
					?>
					<?php
					if(!empty($soc || $soc2 || $soc3)){
						?>
						<div class="df-info-site">
							<div class="df-txt-if">Мы в соц.сетях:</div>
							<div class="df-social">
								<a href="<?php echo $soc;?>" alt="instagram"><img src="<?php echo get_template_directory_uri() ?>/img/in.png" alt="instagramm"></a>
								<a href="<?php echo $soc2;?>" alt="facebook"><img src="<?php echo get_template_directory_uri() ?>/img/fb.png" alt="facebook"></a>
								<a href="<?php echo $soc3;?>" alt="контакты" style="width: 27px;height: 27px"><img src="<?php echo get_template_directory_uri() ?>/img/vk.png" style="width: 27px; height: 27px" alt="контакты"></a>
							</div>
						</div>
						<?
					}
					?>
				</div>
				
			</div>
		</div>
		<?
	}
}?>
</div>
<?
get_footer();
?>
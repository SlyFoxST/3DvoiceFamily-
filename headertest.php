<?php
$obj = get_queried_object();
//var_dump($obj);
if(is_category()){
	$id = $obj->term_id;
}

$position = "";
$title = "";
$description = "";
$logo = "";
 // echo $id;
$img         = get_field("img");
$title       = get_post_meta($id,"_title",true);
$description = get_post_meta($id,"_description",true);
$color       = get_post_meta($id,"color",true);
$logo        = get_field("_logo");
if(!empty($logo)){
	$logo   = wp_get_attachment_image_src($logo["ID"],'logo',true);
	$logo_size   = $logo[0];
	$width_logo  = $logo[1];
	$height_logo = $logo[2];
}
else{
	$logo_size = get_template_directory_uri(). "/img/logo.png";
	$width_logo = 395;
	$height_logo = 235;
}
if(empty($img)){
	$img = get_template_directory_uri() . "/img/background.jpg";
}
else{
	$img = $img["url"];
}
$video = get_field("_video_header");
if(empty($video)){
	$video = get_template_directory_uri() . '/img/Dj2.mp4';
}else{
	$video = $video["url"];
}
if(empty($title)){
	$title = get_the_title();
}

else if(empty($description)){
	$description = get_bloginfo("description");
}

?>
<!Doctype html>
<html  lang="<?php bloginfo("language");?>" >
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo wp_get_document_title(); ?></title>
	<link  rel="stylesheet" href="<?php echo get_stylesheet_uri();?>"  />
	<link   rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/jquery.bxslider.min.css" />
	<link  rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/media.css" />
	<?php wp_head();?>
</head>
<body <?php body_class();?> style="background: <?php echo $color;?> url(<?php echo $img;?>)fixed;">
	<header>
		<nav class="top-navigation flex space-between align-center" style="position: <?php is_user_logged_in() ? $position = "static" : $position = "fixed"; echo $position;?> ">
			<div class="burger">
				<div class="burger-line"></div>
			</div>
			<?php
			wp_nav_menu(array(
				'theme_location'  => 'header_menu',
				'container'       => 'div', 
				'container_class' => 'heade-mnu', 
				'container_id'    => 'header-mnu',
				'menu_class'      => 'menu', 
				'menu_id'         => 'menu',
				'echo'            => true,
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'walker'          => '',
				));?>
				<div class="nav-register flex poiret margin">
					<?php
					if(is_user_logged_in()):?>
					<a href="/wp-admin/post-new.php"><?php _e("Добавить+",WP_HOME);?></a>
					<?
					else:?>
					<div class="add"><?php _e("Добавить+",WP_HOME);?></div>
					<?
					get_template_part("parts/add","part");
				endif;
				if(is_user_logged_in()):
					wp_loginout();
				else:
					get_template_part("parts/login","part");?>
					<div class="login">
						<img src='<?php echo get_template_directory_uri();?>/img/login.svg' alt="<?php echo _e("Вход",WP_HOME);?>" />
						<?php _e("Вход",WP_HOME);?>				
					</div>
					<?
				endif;
				if(!is_user_logged_in()):
					get_template_part("parts/register","part");	
					?>
					<div class="registrate-btn"><?php _e("Регистрация",WP_HOME);?></div>
				<?php endif;?>
			</div>
		</nav>

		<?php if(is_home() || is_front_page()):?>
			<div class="fullscreen-bg video-fon relative">
				<div class="overlay-fon absolute"></div>
				<video loop muted autoplay class="fullscreen-bg__video" poster="<?php echo get_template_directory_uri();?>/img/poster.jpg">
					<source src="<?php echo $video;?>" type="video/mp4">
					</video>
					<div class="absolute wrap-header-info">
						<div class="conteiner flex info-front-top space-between">
							
							<?php 
							if(is_home() || is_front_page()):
								?>
								<div class="title-top padding">
									<div class="site-title akcent">
										<?php echo $title;?>
									</div>
									<div class="site-description"><?php echo $description;?></div>
								</div>
								<?
							endif;
							?>
							<div class="logo padding">
								<img src="<?php echo $logo_size;?>" width="<?php echo $width_logo;?>" height="<?php echo $height_logo;?>" alt="<?php echo bloginfo("name");?>"/>
							</div>
						</div>
					</div>
				</div>

				<?php
				elseif(is_category()):?>
				<div class="conteiner-fluid video-fon relative">
					<div class="overlay-fon absolute"></div>
					<video loop muted autoplay class="fullscreen-bg__video" poster="<?php echo get_template_directory_uri();?>/img/poster.jpg">
						<source src="<?php echo $video;?>" type="video/mp4">
						</video>
						<div class="absolute wrap-header-info">
							<div class="conteiner flex info-front-top space-between">
								<div class="title-top padding">
									<div class="site-title akcent">
										<?php echo $title;?>
									</div>
									<div class="site-description"><?php echo $description;?></div>
								</div>
								<div class="logo padding">
									<img src="<?php echo $logo_size;?>" width="<?php echo $width_logo;?>" height="<?php echo $height_logo;?>" alt="<?php echo bloginfo("name");?>"/>
								</div>
							</div>
						</div>
					</div>
					<?php
				endif;
				?>
			</header>
			<?php get_template_part('parts/form-zakaz','part');?>
			
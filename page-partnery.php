<?php
get_header();?>
<div id="particles-js">	
</div>
<div class="container content-pages" style="margin-top: <?php is_user_logged_in() ? $margin = "0px" : $margin = "100px"; echo $margin;?> ">
	<?
	if(have_posts()){
		while(have_posts()){
			the_post();?>
			<div class="my-breadcrambs">
				<?php
				if( function_exists('breadcrumbs') ) breadcrumbs();
				?>
			</div>
			<h1><?php the_title();?></h1>
			
			<?
			the_content();
		}
	}?>
</div>
<?
get_footer();
?>
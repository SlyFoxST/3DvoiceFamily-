<?php
/*Template name: comment*/
get_header();
?>
<div id="particles-js">	
</div>
<div class="container comment-page" style="margin-top: <?php is_user_logged_in() ? $margin = "0px" : $margin = "100px"; echo $margin;?> ">
	<div class="my-breadcrambs">
		<?php
		if( function_exists('breadcrumbs') ) breadcrumbs();
		?>
	</div>
	<div class="wrap-comment">
		<!-- <div class="first-com"></div>
 -->		<?
		if(have_posts()):
			while(have_posts()):
				the_post();?>
				<h1><?php the_title();?></h1>
				<?php
			//the_title();
				comments_template();
				the_content();

			endwhile;
		endif;
		?>
	</div>
</div>
<?
get_footer();
?>
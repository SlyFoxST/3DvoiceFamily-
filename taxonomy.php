<?php
get_header();
$obj = get_queried_object();
?>
<div id="particles-js">	
</div>
<div class="content content-single df-tax"  style="margin-top: <?php is_user_logged_in() ? $margin = "20px" : $margin = "100px"; echo $margin;?>">
	<div class="my-breadcrambs">
		<?php
		if( function_exists('breadcrumbs') ) breadcrumbs();
		?>
	</div>
	<h1><?php echo $obj->name;?></h1>
	<?php echo category_description($obj->term_id);?>
	<div class="flex flex-wrap flex-start df-taxa-loop">
	<?php
	while(have_posts()){
		the_post();
		
		?>
		
			<?php
			get_template_part('parts/layouts/loop-post');
		}
		?>
	</div>
</div>

<?php
get_footer();
?>
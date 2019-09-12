<?php get_header();
?>
<div id="particles-js">	
</div>
<div class="archive-section" style="margin-top: <?php is_user_logged_in() ? $margin = "20px" : $margin = "100px"; echo $margin;?> ">
	<div class="content flex df-category">
		<?php
		$obj = get_queried_object();
//echo $obj->name;
		if($obj->name == 'artysts'){
			include(TEMPLATEPATH.'/parts/category/category-artysts.php');
		}
		else if($obj->name == "news"){
			include(TEMPLATEPATH.'/parts/category/category-news.php');
		}
		else if($obj->name == "afisha"){
			include(TEMPLATEPATH.'/parts/category/category-afisha.php');
		}
		else {
			include(TEMPLATEPATH.'/parts/category/category-default.php');
		}?>
	</div>
</div>
<?
get_footer();?>
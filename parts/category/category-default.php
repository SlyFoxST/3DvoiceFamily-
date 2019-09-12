<div class="sidebar">
	<div class="my-breadcrambs none">
		<?php
		if( function_exists('breadcrumbs') ) breadcrumbs();
		?>
	</div>
	<?php
	get_sidebar();
	?>
</div>
<div class="wrap-posts-artists">
	<div class="my-breadcrambs">
		<?php
		if( function_exists('breadcrumbs') ) breadcrumbs();
		?>
	</div>
	<div class="loop-artist flex flex-wrap">

		<?php
		if(isset($_GET['artist']) && !empty($_GET['artist'])):
			$args =  array(
				'post_type' => 'artysts',
				'tax_query' => [
					'relation' => 'OR',
					[
						'taxonomy' => 'country',
						'field' => 'id',
						'terms' => $_GET['artist']
					],
					[
						'taxonomy' => 'categorys',
						'field' => 'id',
						'terms' => $_GET['artist']
					],
					[
						'taxonomy' => 'city',
						'field' => 'id',
						'terms' => $_GET['artist']
					]


				]
			);
		elseif(empty($_GET['artist'])):
			$args =  array(
				'post_type' => 'artysts',
			);
		endif;
		$query = new WP_Query($args);
		while($query->have_posts()){
			$query->the_post();
			get_template_part('parts/layouts/loop-post');
		}
		wp_reset_query();
		wp_reset_postdata();
		?>
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			<script>
				var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
				console.log(ajaxurl);
				var true_posts = '<?php echo serialize($wp_query->query); ?>';
				console.log(true_posts);
				var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
				console.log(current_page );
				var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
				console.log(max_pages);
			</script>
			<div id="true_loadmore">Загрузить ещё</div>
		<?php endif; ?>
	</div>
</div>
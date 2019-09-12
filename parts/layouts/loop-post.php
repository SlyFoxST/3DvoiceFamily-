<div class="post-artist">
	<div class="image-previe">
		<div class="overlay_previe">
			<!-- I got these buttons from simplesharebuttons.com -->
			<div id="share-buttons">  
				<?php get_template_part('parts/layouts/shares');?>   
			</div>
		</div>
		<div class="buttoon-view-artist">
			<a href="<?php the_permalink();?>">Подробнее</a>
		</div>
		<?php
		$thumbnail = get_the_post_thumbnail(get_the_ID(),'thumbnails');
		if(!empty($thumbnail )):
			echo $thumbnail;
		else:
			?>
			<img src="<?php echo get_template_directory_uri().'/img/default/noimg.png';?>" alt="<?php echo the_title();?>">

			<?
		endif;
		?>
	</div>
	<div class="title-previe">
		<div class="raiting">
			<?
			if(function_exists('the_ratings')) { the_ratings(); } ?>
		</div>
		<a href="<?php the_permalink();?>">	<?the_title();
		?></a>
	</div>
</div>
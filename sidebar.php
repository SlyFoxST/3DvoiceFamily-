<?php
$args_terms = array(
	'taxonomy' => 'categorys',
);
$terms = get_terms($args_terms);
//var_dump($v);
?>
<form  method="get" class="filters">
	<div class="sidebar-terms">Категория</div>
	<div class="list-term">
		<?
		foreach($terms as $term):?>
		<input type="checkbox" name="artist" value="<?php echo $term->term_id; ?>" onchange="this.form.submit()"" >
			<?php echo $term->name;?>
			(<?php echo $term->count;?>)
		<br />
		<?
		endforeach;
		?>
	</div>
<div class="sidebar-country">Страна</div>
<div class="list-country">
<?php
$term_country = get_terms(array('taxonomy' => 'country'));
	//var_dump($term_country );
	foreach($term_country as $contr):?>
	<input type="checkbox" name="artist" value="<?php echo $contr->term_id;?>" onchange="this.form.submit()" >
		<?php echo $contr->name;?>
		(<?php echo $contr->count;?>)
		<br />
	<?php 
	endforeach;?>
</div>
<div class="sidebar-city">Город</div>
<div class="list-city">
	<?php
	$term_city = get_terms(array('taxonomy' => 'city'));
	//var_dump($term_country );
	foreach($term_city as $city):?>
	<input type="checkbox" name="artist" value="<?php echo $city->term_id;?>" onchange="this.form.submit()" >
		<?php echo $city->name;?>
		(<?php echo $city->count;?>)
		<br />
		<?php 
	endforeach;?>
</div>
</form>


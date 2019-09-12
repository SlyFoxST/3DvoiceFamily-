<?php

define("WP_HOME",'http://3dvoicefamily.ru/');
//===== отключить уведомление об обновлении плагинов и вордпресс=====//
function my_func_remove_menu(){
	remove_submenu_page( 'index.php', 'update-core.php' );
}
add_action( 'admin_menu', 'my_func_remove_menu' );

add_image_size("body_image",1920,700,true);
add_image_size("logo",395,235,true);
add_image_size("post_previe",300,230,true);
add_image_size("previe_img_previe",266,165,true);
add_image_size('thumbnails',215,161,true); 
add_image_size('big_slider',680,360,true);
add_theme_support( 'post-thumbnails' );
add_filter( 'excerpt_length', function(){
	return 13;
} );
//удаление из панели элементов меню start
function wph_new_toolbar() {
	global $wp_admin_bar;
$wp_admin_bar->remove_menu('updates'); //меню "обновления"
}
add_action('wp_before_admin_bar_render', 'wph_new_toolbar');


//регестрируем менюхи
add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header_menu' => 'Меню в шапке',
		'sidebar_menu' => 'Меню в сайдбаре',
		'footer_menu' => 'Меню в подвале'
	) );
});

add_action('wp_enqueue_scripts','wp_deregister_jquery');
//дерегистер jquery
function wp_deregister_jquery(){
	wp_deregister_script("jquery");
	wp_register_script("jquery",get_template_directory_uri()."/js/jquery.js",false,null,true);
	wp_enqueue_script("jquery");
}

add_filter('acf/settings/remove_wp_meta_box', '__return_false');
add_action( 'wp_ajax_mail;', 'test_function' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_mail', 'test_function' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
// первый хук для авторизованных, второй для не авторизованных пользователей

function test_function(){
	$a = trim(htmlspecialchars($_POST['param']));
	$b = trim(htmlspecialchars($_POST['param2']));
	$z = trim(htmlspecialchars($_POST['param3']));
	mail();
	//echo $a . $b . $z;
	die; // даём понять, что обработчик закончил выполнение
}
add_action( 'init', 'dvoice_news_register_post_types' );
function dvoice_news_register_post_types(){
	register_post_type('news', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Новости', // основное название для типа записи
			'singular_name'      => 'new', // название для одной записи этого типа
			'add_new'            => 'Добавить новость', // для добавления новой записи
			'add_new_item'       => 'Добавление новости', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование  новость', // для редактирования типа записи
			'new_item'           => 'Новое ', // текст новой записи
			'view_item'          => 'Смотреть новость', // для просмотра записи этого типа.
			'search_items'       => 'Искать новость', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено новости', // если не было найдено в корзине
			//'parent_item_colon'  => '', // для родителей (у древовидных типов)
			//'menu_name'          => '____', // название меню
		),
		'public' => true,
		'menu_position' => 3,
		'menu_icon'   => 'dashicons-pressthis',
		'supports' => array('title','editor','thumbnail','custom-fields','comments'),
		'has_archive' => true,
		'rewrite' => array('slug' => 'news'),
		'hierarchical' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var'           => true,
	) );
}
add_action( 'init', 'dvoice_register_post_types' );
function dvoice_register_post_types(){
	register_post_type('artysts', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Артисты', // основное название для типа записи
			'singular_name'      => 'artyst', // название для одной записи этого типа
			'add_new'            => 'Добавить артиста', // для добавления новой записи
			'add_new_item'       => 'Добавление артиста', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование  артиста', // для редактирования типа записи
			'new_item'           => 'Новое ', // текст новой записи
			'view_item'          => 'Смотреть артиста', // для просмотра записи этого типа.
			'search_items'       => 'Искать артиста', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			//'parent_item_colon'  => '', // для родителей (у древовидных типов)
			//'menu_name'          => '____', // название меню
		),
		'public' => true,
		'menu_position' => 2,
		'menu_icon'   => 'dashicons-businessman',
		'supports' => array('title','editor','thumbnail','custom-fields','comments'),
		'has_archive' => true,
		'rewrite' => array('slug' => 'artysts'),
		'hierarchical' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var'           => true,
	) );
}

add_action( 'init', 'gallery_register_post_types' );
function gallery_register_post_types(){
	register_post_type('afisha', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Aфиша', // основное название для типа записи
			'singular_name'      => 'afisha', // название для одной записи этого типа
			'add_new'            => 'Добавить новую афишу', // для добавления новой записи
			'add_new_item'       => 'Добавление афиши', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование  афишу', // для редактирования типа записи
			'new_item'           => 'Новая афиша ', // текст новой записи
			'view_item'          => 'Смотреть афишу', // для просмотра записи этого типа.
			'search_items'       => 'Искать афишу', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			//'parent_item_colon'  => '', // для родителей (у древовидных типов)
			//'menu_name'          => '____', // название меню
		),
		'public' => true,
		'menu_position' => 4,
		'menu_icon'   => 'dashicons-format-gallery',
		'supports' => array('title','editor','thumbnail','custom-fields'),
		'has_archive' => true,
		'rewrite' => array('slug' => 'afisha'),
		'hierarchical' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var'           => true,
	) );
}
// хук для регистрации
add_action('init', 'city_create_taxonomy');
function city_create_taxonomy(){
	// список параметров: http://wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy(
		'city',
		'artysts',
		array(
			'label' => __( 'Город' ),
			'rewrite' => array( 'slug' => 'city', 'hierarchical'=>True, ),
			'hierarchical'=>True
		) );
}

add_action('init', 'cat_create_taxonomy');
function cat_create_taxonomy(){
	// список параметров: http://wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy(
		'categorys',
		'artysts',
		array(
			'label' => __( 'Категория' ),
			'rewrite' => array( 'slug' => 'cat', 'hierarchical'=>True, ),
			'hierarchical'=>True
		) );
}
add_action('init', 'country_create_taxonomy');
function country_create_taxonomy(){
	// список параметров: http://wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy(
		'country',
		'artysts',
		array(
			'label' => __( 'Страна' ),
			'rewrite' => array( 'slug' => 'country', 'hierarchical'=>True, ),
			'hierarchical'=>True
		));
}
add_action('init', 'pol_create_taxonomy');
function pol_create_taxonomy(){
	// список параметров: http://wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy(
		'pol',
		'artysts',
		 array(
			'label' => __( 'Пол' ),
			'rewrite' => array( 'slug' => 'pol', 'hierarchical'=>True, ),
			'hierarchical'=>True
		));
}


// Область виджетов на странице в footer
add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => "sidebar-inst",
		'description'   => 'for instagramm',
		'class'         => 'footer-insta',
		'before_widget' => '<li id="li-insta" class="li-insta">',
		'after_widget'  => "</li>\n",
		'before_title'  => '<h2 class="title-insta">',
		'after_title'   => "</h2>\n",
	) );
}

//фильтры для пост типа артисты по таксам 
add_action( 'restrict_manage_posts', 'true_taxonomy_filter' );   
function true_taxonomy_filter() {
	global $typenow; // тип поста
	if( $typenow == 'artysts' ){ // для каких типов постов отображать
		$taxes = array('categorys', 'country','pol'); // таксономии через запятую
		foreach ($taxes as $tax) {
			$current_tax = isset( $_GET[$tax] ) ? $_GET[$tax] : '';
			$tax_obj = get_taxonomy($tax);
			$tax_name = mb_strtolower($tax_obj->labels->name);
			// функция mb_strtolower переводит в нижний регистр
			// она может не работать на некоторых хостингах, если что, убирайте её отсюда
			$terms = get_terms($tax);
			if(count($terms) > 0) {
				echo "<select name='$tax' id='$tax' class='postform'>";
				echo "<option value=''>Все $tax_name</option>";
				foreach ($terms as $term) {
					echo '<option value='. $term->slug, $current_tax == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
				}
				echo "</select>";
			}
		}
	}
}
 

/**
 * Хлебные крошки для WordPress (breadcrumbs)
 *
 * @param  string [$sep  = '']      Разделитель. По умолчанию ' » '
 * @param  array  [$l10n = array()] Для локализации. См. переменную $default_l10n.
 * @param  array  [$args = array()] Опции. См. переменную $def_args
 * @return string Выводит на экран HTML код
 *
 * version 3.3.2
 */
function breadcrumbs( $sep = ' » ', $l10n = array(), $args = array() ){
	$kb = new My_Breadcrumbs;
	echo $kb->get_crumbs( $sep, $l10n, $args );
}

class My_Breadcrumbs {

	public $arg;

	// Локализация
	static $l10n = array(
		'home'       => 'Главная',
		'paged'      => 'Страница %d',
		'_404'       => 'Ошибка 404',
		'search'     => 'Результаты поиска по запросу - <b>%s</b>',
		'author'     => 'Архив автора: <b>%s</b>',
		'year'       => 'Архив за <b>%d</b> год',
		'month'      => 'Архив за: <b>%s</b>',
		'day'        => '',
		'attachment' => 'Медиа: %s',
		'tag'        => 'Записи по метке: <b>%s</b>',
		'tax_tag'    => '%1$s из "%2$s" по тегу: <b>%3$s</b>',
		// tax_tag выведет: 'тип_записи из "название_таксы" по тегу: имя_термина'.
		// Если нужны отдельные холдеры, например только имя термина, пишем так: 'записи по тегу: %3$s'
	);

	// Параметры по умолчанию
	static $args = array(
		'on_front_page'   => true,  // выводить крошки на главной странице
		'show_post_title' => true,  // показывать ли название записи в конце (последний элемент). Для записей, страниц, вложений
		'show_term_title' => true,  // показывать ли название элемента таксономии в конце (последний элемент). Для меток, рубрик и других такс
		'title_patt'      => '<span class="kb_title">%s</span>', // шаблон для последнего заголовка. Если включено: show_post_title или show_term_title
		'last_sep'        => true,  // показывать последний разделитель, когда заголовок в конце не отображается
		'markup'          => 'schema.org', // 'markup' - микроразметка. Может быть: 'rdf.data-vocabulary.org', 'schema.org', '' - без микроразметки
										   // или можно указать свой массив разметки:
										   // array( 'wrappatt'=>'<div class="kama_breadcrumbs">%s</div>', 'linkpatt'=>'<a href="%s">%s</a>', 'sep_after'=>'', )
		'priority_tax'    => array('category'), // приоритетные таксономии, нужно когда запись в нескольких таксах
		'priority_terms'  => array(), // 'priority_terms' - приоритетные элементы таксономий, когда запись находится в нескольких элементах одной таксы одновременно.
									  // Например: array( 'category'=>array(45,'term_name'), 'tax_name'=>array(1,2,'name') )
									  // 'category' - такса для которой указываются приор. элементы: 45 - ID термина и 'term_name' - ярлык.
									  // порядок 45 и 'term_name' имеет значение: чем раньше тем важнее. Все указанные термины важнее неуказанных...
		'nofollow' => false, // добавлять rel=nofollow к ссылкам?

		// служебные
		'sep'             => '',
		'linkpatt'        => '',
		'pg_end'          => '',
	);

	function get_crumbs( $sep, $l10n, $args ){
		global $post, $wp_query, $wp_post_types;

		self::$args['sep'] = $sep;

		// Фильтрует дефолты и сливает
		$loc = (object) array_merge( apply_filters('kama_breadcrumbs_default_loc', self::$l10n ), $l10n );
		$arg = (object) array_merge( apply_filters('kama_breadcrumbs_default_args', self::$args ), $args );

		$arg->sep = '<span class="kb_sep">'. $arg->sep .'</span>'; // дополним

		// упростим
		$sep = & $arg->sep;
		$this->arg = & $arg;

		// микроразметка ---
		if(1){
			$mark = & $arg->markup;

			// Разметка по умолчанию
			if( ! $mark ) $mark = array(
				'wrappatt'  => '<div class="kama_breadcrumbs">%s</div>',
				'linkpatt'  => '<a href="%s">%s</a>',
				'sep_after' => '',
			);
			// rdf
			elseif( $mark === 'rdf.data-vocabulary.org' ) $mark = array(
				'wrappatt'   => '<div class="kama_breadcrumbs" prefix="v: http://rdf.data-vocabulary.org/#">%s</div>',
				'linkpatt'   => '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">%s</a>',
				'sep_after'  => '</span>', // закрываем span после разделителя!
			);
			// schema.org
			elseif( $mark === 'schema.org' ) $mark = array(
				'wrappatt'   => '<div class="kama_breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">%s</div>',
				'linkpatt'   => '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%s" itemprop="item"><span itemprop="name">%s</span></a></span>',
				'sep_after'  => '',
			);

			elseif( ! is_array($mark) )
				die( __CLASS__ .': "markup" parameter must be array...');

			$wrappatt  = $mark['wrappatt'];
			$arg->linkpatt  = $arg->nofollow ? str_replace('<a ','<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];
			$arg->sep      .= $mark['sep_after']."\n";
		}

		$linkpatt = $arg->linkpatt; // упростим

		$q_obj = get_queried_object();

		// может это архив пустой таксы?
		$ptype = null;
		if( empty($post) ){
			if( isset($q_obj->taxonomy) )
				$ptype = & $wp_post_types[ get_taxonomy($q_obj->taxonomy)->object_type[0] ];
		}
		else $ptype = & $wp_post_types[ $post->post_type ];

		// paged
		$arg->pg_end = '';
		if( ($paged_num = get_query_var('paged')) || ($paged_num = get_query_var('page')) )
			$arg->pg_end = $sep . sprintf( $loc->paged, (int) $paged_num );

		$pg_end = $arg->pg_end; // упростим

		$out = '';

		if( is_front_page() ){
			return $arg->on_front_page ? sprintf( $wrappatt, ( $paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home ) ) : '';
		}
		// страница записей, когда для главной установлена отдельная страница.
		elseif( is_home() ) {
			$out = $paged_num ? ( sprintf( $linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title) ) . $pg_end ) : esc_html($q_obj->post_title);
		}
		elseif( is_404() ){
			$out = $loc->_404;
		}
		elseif( is_search() ){
			$out = sprintf( $loc->search, esc_html( $GLOBALS['s'] ) );
		}
		elseif( is_author() ){
			$tit = sprintf( $loc->author, esc_html($q_obj->display_name) );
			$out = ( $paged_num ? sprintf( $linkpatt, get_author_posts_url( $q_obj->ID, $q_obj->user_nicename ) . $pg_end, $tit ) : $tit );
		}
		elseif( is_year() || is_month() || is_day() ){
			$y_url  = get_year_link( $year = get_the_time('Y') );

			if( is_year() ){
				$tit = sprintf( $loc->year, $year );
				$out = ( $paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit );
			}
			// month day
			else {
				$y_link = sprintf( $linkpatt, $y_url, $year);
				$m_url  = get_month_link( $year, get_the_time('m') );

				if( is_month() ){
					$tit = sprintf( $loc->month, get_the_time('F') );
					$out = $y_link . $sep . ( $paged_num ? sprintf( $linkpatt, $m_url, $tit ) . $pg_end : $tit );
				}
				elseif( is_day() ){
					$m_link = sprintf( $linkpatt, $m_url, get_the_time('F'));
					$out = $y_link . $sep . $m_link . $sep . get_the_time('l');
				}
			}
		}
		// Древовидные записи
		elseif( is_singular() && $ptype->hierarchical ){
			$out = $this->_add_title( $this->_page_crumbs($post), $post );
		}
		// Таксы, плоские записи и вложения
		else {
			$term = $q_obj; // таксономии

			// определяем термин для записей (включая вложения attachments)
			if( is_singular() ){
				// изменим $post, чтобы определить термин родителя вложения
				if( is_attachment() && $post->post_parent ){
					$save_post = $post; // сохраним
					$post = get_post($post->post_parent);
				}

				// учитывает если вложения прикрепляются к таксам древовидным - все бывает :)
				$taxonomies = get_object_taxonomies( $post->post_type );
				// оставим только древовидные и публичные, мало ли...
				$taxonomies = array_intersect( $taxonomies, get_taxonomies( array('hierarchical' => true, 'public' => true) ) );

				if( $taxonomies ){
					// сортируем по приоритету
					if( ! empty($arg->priority_tax) ){
						usort( $taxonomies, function($a,$b)use($arg){
							$a_index = array_search($a, $arg->priority_tax);
							if( $a_index === false ) $a_index = 9999999;

							$b_index = array_search($b, $arg->priority_tax);
							if( $b_index === false ) $b_index = 9999999;

							return ( $b_index === $a_index ) ? 0 : ( $b_index < $a_index ? 1 : -1 ); // меньше индекс - выше
						} );
					}

					// пробуем получить термины, в порядке приоритета такс
					foreach( $taxonomies as $taxname ){
						if( $terms = get_the_terms( $post->ID, $taxname ) ){
							// проверим приоритетные термины для таксы
							$prior_terms = & $arg->priority_terms[ $taxname ];
							if( $prior_terms && count($terms) > 2 ){
								foreach( (array) $prior_terms as $term_id ){
									$filter_field = is_numeric($term_id) ? 'term_id' : 'slug';
									$_terms = wp_list_filter( $terms, array($filter_field=>$term_id) );

									if( $_terms ){
										$term = array_shift( $_terms );
										break;
									}
								}
							}
							else
								$term = array_shift( $terms );

							break;
						}
					}
				}

				if( isset($save_post) ) $post = $save_post; // вернем обратно (для вложений)
			}

			// вывод

			// все виды записей с терминами или термины
			if( $term && isset($term->term_id) ){
				$term = apply_filters('kama_breadcrumbs_term', $term );

				// attachment
				if( is_attachment() ){
					if( ! $post->post_parent )
						$out = sprintf( $loc->attachment, esc_html($post->post_title) );
					else {
						if( ! $out = apply_filters('attachment_tax_crumbs', '', $term, $this ) ){
							$_crumbs    = $this->_tax_crumbs( $term, 'self' );
							$parent_tit = sprintf( $linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent) );
							$_out = implode( $sep, array($_crumbs, $parent_tit) );
							$out = $this->_add_title( $_out, $post );
						}
					}
				}
				// single
				elseif( is_single() ){
					if( ! $out = apply_filters('post_tax_crumbs', '', $term, $this ) ){
						$_crumbs = $this->_tax_crumbs( $term, 'self' );
						$out = $this->_add_title( $_crumbs, $post );
					}
				}
				// не древовидная такса (метки)
				elseif( ! is_taxonomy_hierarchical($term->taxonomy) ){
					// метка
					if( is_tag() )
						$out = $this->_add_title('', $term, sprintf( $loc->tag, esc_html($term->name) ) );
					// такса
					elseif( is_tax() ){
						$post_label = $ptype->labels->name;
						$tax_label = $GLOBALS['wp_taxonomies'][ $term->taxonomy ]->labels->name;
						$out = $this->_add_title('', $term, sprintf( $loc->tax_tag, $post_label, $tax_label, esc_html($term->name) ) );
					}
				}
				// древовидная такса (рибрики)
				else {
					if( ! $out = apply_filters('term_tax_crumbs', '', $term, $this ) ){
						$_crumbs = $this->_tax_crumbs( $term, 'parent' );
						$out = $this->_add_title( $_crumbs, $term, esc_html($term->name) );                     
					}
				}
			}
			// влоежния от записи без терминов
			elseif( is_attachment() ){
				$parent = get_post($post->post_parent);
				$parent_link = sprintf( $linkpatt, get_permalink($parent), esc_html($parent->post_title) );
				$_out = $parent_link;

				// вложение от записи древовидного типа записи
				if( is_post_type_hierarchical($parent->post_type) ){
					$parent_crumbs = $this->_page_crumbs($parent);
					$_out = implode( $sep, array( $parent_crumbs, $parent_link ) );
				}

				$out = $this->_add_title( $_out, $post );
			}
			// записи без терминов
			elseif( is_singular() ){
				$out = $this->_add_title( '', $post );
			}
		}

		// замена ссылки на архивную страницу для типа записи
		$home_after = apply_filters('kama_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype );

		if( '' === $home_after ){
			// Ссылка на архивную страницу типа записи для: отдельных страниц этого типа; архивов этого типа; таксономий связанных с этим типом.
			if( $ptype && $ptype->has_archive && ! in_array( $ptype->name, array('post','page','attachment') )
				&& ( is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)) )
			){
				$pt_title = $ptype->labels->name;

				// первая страница архива типа записи
				if( is_post_type_archive() && ! $paged_num )
					$home_after = sprintf( $this->arg->title_patt, $pt_title );
				// singular, paged post_type_archive, tax
				else{
					$home_after = sprintf( $linkpatt, get_post_type_archive_link($ptype->name), $pt_title );

					$home_after .= ( ($paged_num && ! is_tax()) ? $pg_end : $sep ); // пагинация
				}
			}
		}

		$before_out = sprintf( $linkpatt, home_url(), $loc->home ) . ( $home_after ? $sep.$home_after : ($out ? $sep : '') );

		$out = apply_filters('kama_breadcrumbs_pre_out', $out, $sep, $loc, $arg );

		$out = sprintf( $wrappatt, $before_out . $out );

		return apply_filters('kama_breadcrumbs', $out, $sep, $loc, $arg );
	}

	function _page_crumbs( $post ){
		$parent = $post->post_parent;

		$crumbs = array();
		while( $parent ){
			$page = get_post( $parent );
			$crumbs[] = sprintf( $this->arg->linkpatt, get_permalink($page), esc_html($page->post_title) );
			$parent = $page->post_parent;
		}

		return implode( $this->arg->sep, array_reverse($crumbs) );
	}

	function _tax_crumbs( $term, $start_from = 'self' ){
		$termlinks = array();
		$term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;
		while( $term_id ){
			$term       = get_term( $term_id, $term->taxonomy );
			$termlinks[] = sprintf( $this->arg->linkpatt, get_term_link($term), esc_html($term->name) );
			$term_id    = $term->parent;
		}

		if( $termlinks )
			return implode( $this->arg->sep, array_reverse($termlinks) ) /*. $this->arg->sep*/;
		return '';
	}

	// добалвяет заголовок к переданному тексту, с учетом всех опций. Добавляет разделитель в начало, если надо.
	function _add_title( $add_to, $obj, $term_title = '' ){
		$arg = & $this->arg; // упростим...
		$title = $term_title ? $term_title : esc_html($obj->post_title); // $term_title чиститься отдельно, теги моугт быть...
		$show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;

		// пагинация
		if( $arg->pg_end ){
			$link = $term_title ? get_term_link($obj) : get_permalink($obj);
			$add_to .= ($add_to ? $arg->sep : '') . sprintf( $arg->linkpatt, $link, $title ) . $arg->pg_end;
		}
		// дополняем - ставим sep
		elseif( $add_to ){
			if( $show_title )
				$add_to .= $arg->sep . sprintf( $arg->title_patt, $title );
			elseif( $arg->last_sep )
				$add_to .= $arg->sep;
		}
		// sep будет потом...
		elseif( $show_title )
			$add_to = sprintf( $arg->title_patt, $title );

		return $add_to;
	}

}


//подгрузка постов ajax
function true_load_posts(){
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1; // следующая страница
	$args['post_status'] = 'publish';
 
	// обычно лучше использовать WP_Query, но не здесь
	query_posts( $args );
	// если посты есть
	if( have_posts() ) :
 
		// запускаем цикл
		while( have_posts() ): the_post();
 
			get_template_part( 'parts/layouts/loop-post', get_post_format() );
 
		endwhile;
 
	endif;
	die();
}
 
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');

//меняем порядок вывода полей в комментариях 
function sort_comment_fields( $fields ){
    $new_fields = array();
    $myorder = array('author','email','comment'); // ПОРЯДОК ПОЛЕЙ
 
    foreach( $myorder as $key ){
        $new_fields[ $key ] = $fields[ $key ];
        unset( $fields[ $key ] );
    }
 
    if( $fields )
        foreach( $fields as $key => $val )
            $new_fields[ $key ] = $val;
    return $new_fields;
}
add_filter('comment_form_fields', 'sort_comment_fields' );

//функция вывода tynymce в коментариях
// function mayak_editor_comments(){
// $settings = array(
//   'media_buttons'=>0,
//   'textarea_name'=>'comment',
//   'quicktags'=>0,
//   'teeny'=>0,
//   'tinymce'=> 1,
//   'textarea_rows'=>10,
// );
// $aut = wp_editor('', 'comment', $settings);
// return $aut;
// }

function wp_comments_corenavi() {
  $pages = '';
  $max = get_comment_pages_count();
  $page = get_query_var('cpage');
  if (!$page) $page = 1;
  $a['current'] = $page;
  $a['echo'] = false;

  $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
  $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

  if ($max > 1) echo '<div class="commentNavigation">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $page . ' из ' . $max . '</span>'."\r\n";
  echo $pages . paginate_comments_links($a);
  if ($max > 1) echo '</div>';
}
// logo admin bar
function my_custom_logo(){
	echo '<style type="text/css">
	#header-logo { background-image: url('. get_bloginfo('template_directory') .'/img/favicon.png) !important; }

	</style>';
}
add_action('admin_head', 'my_custom_logo');
//logo 
function my_login_logo(){
   echo '
   <style type="text/css">
        #login h1 a { background: url('. get_bloginfo('template_directory') .'/img/logo.png) no-repeat 0 0 !important; }
   	.login h1 a{
    height: 230px;
    width: 400px;
	}
    </style>';
}
add_action('login_head', 'my_login_logo');


/** УБИРАЕМ ПУНКТЫ МЕНЮ ИЗ АДМИНКИ - рабочая вариация **/
add_action( 'admin_menu', 'ats_remove_menu_items' );
function ats_remove_menu_items() {
if ( !current_user_can( 'administrator' ) ) {
// показываем пункты-ярлыки которые удаляем
	remove_menu_page('wpcf7');// Удаляем пункт "Комментарии"
	remove_menu_page('edit.php?post_type=afisha');
	remove_menu_page('edit.php?post_type=news');
	remove_menu_page('admin.php?page=acf-options');
}
}
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();
	
}

?>
<div class="flex comment-flex">
	<?php 
	if (comments_open()) { ?>
	<!-- здесь дальнейший код -->
	<?php
// получим данные из куков
	$commenter = wp_get_current_commenter();

// определим поля которые нужно вывести
	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html_req = ( $req ? " required='required'" : '' );
	$fields   =  array(
		'author' => '<p class="comment-form-author">'.'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245" placeholder="&#9998; Имя"' . $aria_req . $html_req . ' /></p>',
		'email'  => '<p class="comment-form-email">' .'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="100" placeholder="&#9993; E-mail" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',

	);
	$args = array(
		'title_reply' => '<div class="info-comment">Мы благодарны Вам за оказаное нам внимание, за оставленые Вами коментарии и отзывы!</div>',
		'fields' => $fields,
	// изменяем текст кнопки отправки 
		'label_submit'=>'Отправить комментарий',
	// удаляем сообщение со списком разрешенных HTML-тегов из-под формы комментирования
		'comment_notes_before' => '',
		'comment_notes_after' => '<div class="info-email">Ваш e-mail не будет опубликован</div>',
			// указываем собственный HTML-код для вывода поля комментария
		'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" required placeholder="&#9998; Оставить комментарий"></textarea></p>',

		);?>
		<div class="df-voice-comment-form">
			<?
			comment_form($args);?>
		</div>
		<?
	} else { ?>
	<h3>Обсуждения закрыты для данной страницы</h3>
	<?php } ?>
	<div class="df-voice-comment-list">
		<ul class="df-comment-list">
			<?
			wp_list_comments(array(	'reverse_top_level' => true));?>
		</ul>
		<?php if(function_exists('wp_comments_corenavi')) wp_comments_corenavi(); ?>
	</div>
</div>
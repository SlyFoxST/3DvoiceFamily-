<div class="registrate none">
	<div class="close-poopup">
		<div class="line-close"></div>
	</div>
	<form name="registerform" id="registerform" action="<?php bloginfo("url");?>/wp-login.php?action=register" method="post" novalidate="novalidate">
		<p class="bold"><?php _e("Авторизация",WP_HOME); ?></p>
		<input type="text" name="user_login" id="user_login" class="input" placeholder="Имя пользователя"   class="input" size="20" />
		<input type="email" name="user_email" id="user_email" placeholder="Email пользователя" class="input" size="25" />
		<input type="hidden" name="redirect_to" value="<?php bloginfo('url');?>/wp-admin/" />
		<input type="hidden" name="testcookie" value="1" />
		<p id="reg_passmail" class="bold"><?php _e("Подтверждение регистрации будет отправлено на ваш e-mail.",WP_HOME);?></p>
		<input type="submit" id="wp-submit" name="wp-submit" class="button" />
		<div class="nav-register">
			<a href="<?php bloginfo('url');?>/wp-login.php" class="poiret bold"><?php _e("Вход /",WP_HOME);?></a>
			<a href="<?php bloginfo("url")?>/wp-login.php?action=lostpassword" class="poiret bold"><?php _e("Забыли пароль?",WP_HOME);?></a>
			<a href="<?php bloginfo("url");?>" class="poiret bold">&#8592;Назад к сайту</a>
		</div>
	</form>
</div>


dqHNdOaaml

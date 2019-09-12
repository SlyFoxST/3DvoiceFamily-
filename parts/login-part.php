<div class="none-login none">
	<div class="form-login-section">
		<div class="close-poopup">
			<div class="line-close"></div>
		</div>
		<p class="bold"><?php _e("Авторизация",WP_HOME); ?></p>
		<form name="loginform" id="loginform" action="http://3dvoicefamily.ru/wp-login.php" method="post">							
				<input type="text" name="log" id="user_login" class="input"  size="20" placeholder="Имя пользователя или e-mail" />
					
				<input type="password" name="pwd" id="user_pass" class="input"  size="20" placeholder="Пароль"/>

			
			<p class="forgetmenot bold">
				<label for="rememberme">
					<input name="rememberme" type="checkbox" id="rememberme" value="forever"  /><?php _e("Запомнить меня",WP_HOME);?>
				</label>
			</p>
			<p class="submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Войти" />
				<input type="hidden" name="redirect_to" value="<?php bloginfo('url');?>/wp-admin/" />
				<input type="hidden" name="testcookie" value="1" />
			</p>
		</form>
	</div>
</div>
<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', '3df');

/** Имя пользователя MySQL */
define('DB_USER', 'admin');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '123');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

define( 'CONCATENATE_SCRIPTS', false );

	
define('WP_MEMORY_LIMIT', '256M');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'LtaxXUq<2emkH^oyoa;v.acd &NF>~=%WpjOc_oj`D jAgW>>W->H}ITG:YXC% 5');
define('SECURE_AUTH_KEY',  'zXR 2p)T.)FZm{}ew3JK(;P83RC*;dT!-mP;sb9`<Jtn:aH<|RDMhLk:Z!KYj/`a');
define('LOGGED_IN_KEY',    'W&H[2+ 2so3/]~.~zl]f^#D{,s[:)kP<8I+SzY{<uY9^{Q;%UnCP:p05!~(u.kV+');
define('NONCE_KEY',        '/Q><iL}tq7*u7f!Wc<!nDve+X`J#t7]P%r^~5]-CK>)VjokAJih BNr&2C:7I7`V');
define('AUTH_SALT',        '*rcLRQ6W?W,h!{l7hw^1m?v;9|vA?,$uW#(CSTizwA8%wEL yBK7VRdNd]9k1?.U');
define('SECURE_AUTH_SALT', ')%Hu<qxf3I>Ny9ij3uzojarF)m%[(g.HQy]Pqj|;VV/k#meJ4%^]nX$i&JVvde| ');
define('LOGGED_IN_SALT',   'W9f0ONqR)IkJ`T0xEucE6z4~AIcbPn p{UNOsd/cH,u,E!;]E;/d@%psaB_FS}V}');
define('NONCE_SALT',       '[ ]eVT&:`8|ljd4m{~OF~GG&Vgf_~)Q5qm_<xg(*iz%Ix@HV:igJ u*c G@(yuwx');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');

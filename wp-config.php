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
define('DB_NAME', 'moydom');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'kljh76RRenJh7');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '^]ith^yHFD+Z,,l<}!.pV!=Is@YXdP YkwI3R5{DiV-D$7y;m^`tg#M$=RFn#.LF');
define('SECURE_AUTH_KEY',  'ZTEua&@W7Qywu~WGs({N[3)Oro8+~H%uH0<N2b{(mmT;@1bVR&dZXo{CEc,EE2/y');
define('LOGGED_IN_KEY',    'EHz#8@Tg^gr8qZG&>p>?zJ#7I_+aXg[GaV]vaj3OM.Su8,ukz&RHE+;9h[Zpgo]*');
define('NONCE_KEY',        'a[la)?R(4L> .E_X/ia!}{f@#=ot yD:86XL*t}oQ qxlT.MRN*vNC.[1L@{k|kt');
define('AUTH_SALT',        'nW:TO8?6+8<//Me*PITqZ#E+h:8*8#N:e6~S+ht[B(;(A1?)3AmrZxS<jb~Pup~>');
define('SECURE_AUTH_SALT', 'Lo~QI4a)7u{dxD,-f[}7hXZ [d[$,bs>1 w^*3..FoRT=Trj!*cdN=M@ge],.v}a');
define('LOGGED_IN_SALT',   '<$^+!FR nXaq5<ZQ)-EH +y%!If$DaS#B&{/d}4_Ys~byFiry2W[!NrdJ)v/8$Yk');
define('NONCE_SALT',       ':fW`[uFI{<w8Ys;<:} h3O5)=%44& zL7T-q7_)c7ewXbwSm]cg$,s#8pWD:BWbb');

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
//define('WP_DEBUG', false);

// Enable WP_DEBUG mode
define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');

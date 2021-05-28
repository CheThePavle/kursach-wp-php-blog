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
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'nY9UYsJtZG#MEeK#+T.^{|XXYJwY^=Ri5NDeK`&81N:}c}@=]vZ5iU-b(JMKg$jy' );
define( 'SECURE_AUTH_KEY',  'Cy_#Rx!L9T:S~,dn z^h(Ln<lN[IT#)vlRb@KQ1Zsk#**C.6-hJ+B (a5Hb=_xD8' );
define( 'LOGGED_IN_KEY',    'gwZ.U1Jm]+$+$@v1X#`zqX ,/<T-Kx2Rf&nj=*.b3$[,V;#dNrPMAW}<9X_c!yY0' );
define( 'NONCE_KEY',        '8#]eanb[Lq$-l* M^bdR$uxfjom^c,)}*f`-Pkij:^0{#u#E`/!fJWXAY78v9bAV' );
define( 'AUTH_SALT',        '!R6Ss, ;msjh{y(gAw@y`oG3v:K-`zIgMdGT en1QdY`NC0Xv>@N8*zWC:1`V/`:' );
define( 'SECURE_AUTH_SALT', 'BZe4w%iJ:]^*2lVnB b>v:`x<~HCv690(r|eCwZug>pFYsFzJ.<TU=rBG;,/&:9$' );
define( 'LOGGED_IN_SALT',   'CO/6$wg-i-iJv{3At0|/,*AV*Ni>d[H0PPC/+TS(L?Uau@?E+{c`]I3pbCOD}uP8' );
define( 'NONCE_SALT',       'hFy11B-39^|xR[pUwZ}8rBPx}#l_8,-0.e&!-V.<0F))Q_L5!t:04h=3hTpUm}&a' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';

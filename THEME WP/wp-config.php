<?php

define( 'WP_HOME', 'https://ltm.in.ua' );
define( 'WP_SITEURL', 'https://ltm.in.ua' );

/** Имя базы данных для WordPress */
define( 'DB_NAME', '*******' );

/** Имя пользователя базы данных */
define( 'DB_USER', '*******' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '*********' );

/** Имя сервера базы данных */
define( 'DB_HOST', '*******' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );


// define( 'WP_DEBUG', false );

 // Enable WP_DEBUG mode
define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );
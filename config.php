<?php
/**
 * DevelopIA - System Configuration
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'developia_db');
define('DB_USER', 'developia_user');
define('DB_PASS', 'Ca130569!!Ca');
define('DB_CHARSET', 'utf8mb4');

define('ADMIN_EMAIL', 'contact@developia.org');
define('SITE_NAME', 'DevelopIA');
define('SITE_URL', 'http://localhost/DevelopIA');

// Session configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

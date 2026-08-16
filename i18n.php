<?php
/**
 * DevelopIA - Multi-Language Localization Engine (PHP)
 */

require_once __DIR__ . '/config.php';

$translations = json_decode(file_get_contents(__DIR__ . '/i18n.json'), true);

function get_current_lang(): string {
    $supported = ['en', 'fr', 'es', 'it', 'ru'];
    if (isset($_GET['lang']) && in_array(strtolower($_GET['lang']), $supported)) {
        $_SESSION['preferred_lang'] = strtolower($_GET['lang']);
        return strtolower($_GET['lang']);
    }
    if (isset($_SESSION['preferred_lang']) && in_array($_SESSION['preferred_lang'], $supported)) {
        return $_SESSION['preferred_lang'];
    }
    return 'en';
}

function __t(string $key, ?string $lang = null): string {
    global $translations;
    if ($lang === null) {
        $lang = get_current_lang();
    }
    
    $parts = explode('.', $key);
    $current = $translations[$lang] ?? ($translations['en'] ?? []);
    
    foreach ($parts as $part) {
        if (is_array($current) && isset($current[$part])) {
            $current = $current[$part];
        } else {
            return $key;
        }
    }
    
    return is_string($current) ? $current : $key;
}

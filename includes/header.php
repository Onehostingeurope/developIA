<?php
require_once __DIR__ . '/../i18n.php';
$lang = get_current_lang();
$current_page = $current_page ?? 'home';

// Locate compiled Tailwind CSS file in assets/
$css_file = '/style.css';
$asset_css = glob(__DIR__ . '/../assets/main-*.css');
if (!empty($asset_css)) {
    $css_file = '/assets/' . basename($asset_css[0]);
}
?>
<!DOCTYPE html>
<html class="dark" lang="<?php echo htmlspecialchars($lang); ?>">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>

    <!-- Primary SEO -->
    <title>Developia | Web Development Agency &mdash; SaaS, AI &amp; Custom App Development</title>
    <meta name="description" content="Developia builds high-performance websites, SaaS platforms, iOS/Android/Windows/Mac apps and AI integrations. Expert web design & development agency. Get a free consultation." />
    <meta name="keywords" content="web development agency, website creation, SaaS development, custom web application, AI integration, web design, iOS app development, Android app development, Windows app, Mac app, machine learning, LLM fine-tuning, full-stack development, responsive design, performance optimization" />
    <meta name="author" content="Developia" />
    <meta name="robots" content="index, follow" />
    <meta name="theme-color" content="#0055ff" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.png" />
    <link rel="shortcut icon" href="/favicon.png" />
    <link rel="apple-touch-icon" href="/favicon.png" />

    <!-- Scripts & Fonts -->
    <link rel="stylesheet" href="<?php echo htmlspecialchars($css_file); ?>"/>
    <link rel="stylesheet" href="/style.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&amp;family=Geist:wght@400;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css"/>
</head>
<body class="antialiased bg-background text-on-surface">
    <!-- TopNavBar -->
    <header class="bg-background/60 backdrop-blur-xl docked full-width top-0 sticky border-b border-outline-variant/30 shadow-[0_0_15px_rgba(0,85,255,0.1)] z-50">
        <nav class="flex justify-between items-center w-full px-margin-mobile md:px-margin-desktop py-4 max-w-container-max mx-auto">
            <a href="index.php" class="flex items-center gap-3 group">
                <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 9L5 22L9 35" stroke="#0066ee" stroke-width="2.5" stroke-linecap="round"/>
                    <path d="M13 11L13 33L22 33C28.6 33 33 28.3 33 22C33 15.7 28.6 11 22 11Z" stroke="#1a44cc" stroke-width="2.2" fill="none" stroke-linejoin="round"/>
                    <line x1="13" y1="17" x2="27" y2="17" stroke="#0055ff" stroke-width="1.5"/>
                    <circle cx="27" cy="17" r="2" fill="#0088ff"/>
                    <line x1="13" y1="22" x2="30" y2="22" stroke="#0055ff" stroke-width="1.5"/>
                    <circle cx="30" cy="22" r="2" fill="#0055ff"/>
                    <line x1="13" y1="27" x2="27" y2="27" stroke="#0055ff" stroke-width="1.5"/>
                    <circle cx="27" cy="27" r="2" fill="#0088ff"/>
                    <path d="M35 9L39 22L35 35" stroke="#0066ee" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
                <div class="flex flex-col leading-none gap-0.5">
                    <div class="flex items-baseline">
                        <span class="font-display font-extrabold text-xl text-white tracking-tight">Develop</span><span class="font-display font-extrabold text-xl tracking-tight" style="background:linear-gradient(90deg,#0055ff,#00aaff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">IA</span>
                    </div>
                    <span class="font-mono text-[10px] tracking-[0.15em]" style="color:#5577aa;">developia.org</span>
                </div>
            </a>
            <div class="hidden md:flex items-center gap-8">
                <a class="font-display text-body-md <?php echo $current_page === 'home' ? 'text-primary-fixed font-bold border-b-2 border-primary-fixed pb-1' : 'text-on-surface-variant font-medium hover:text-primary transition-colors duration-300'; ?>" href="index.php" data-i18n="nav.home"><?php echo __t('nav.home'); ?></a>
                <a class="font-display text-body-md <?php echo $current_page === 'services' ? 'text-primary-fixed font-bold border-b-2 border-primary-fixed pb-1' : 'text-on-surface-variant font-medium hover:text-primary transition-colors duration-300'; ?>" href="services.php" data-i18n="nav.services"><?php echo __t('nav.services'); ?></a>
                <a class="font-display text-body-md text-on-surface-variant font-medium hover:text-primary transition-colors duration-300" href="index.php#portfolio" data-i18n="nav.portfolio"><?php echo __t('nav.portfolio'); ?></a>
                <a class="font-display text-body-md <?php echo $current_page === 'contact' ? 'text-primary-fixed font-bold border-b-2 border-primary-fixed pb-1' : 'text-on-surface-variant font-medium hover:text-primary transition-colors duration-300'; ?>" href="contact.php" data-i18n="nav.contact"><?php echo __t('nav.contact'); ?></a>
            </div>
            <div class="flex items-center gap-4">
                <span class="material-symbols-outlined text-primary cursor-pointer active:scale-95 transition-transform" data-icon="terminal">terminal</span>
                
                <!-- Desktop Custom Glassmorphism Language Selector Dropdown -->
                <div class="relative hidden md:block">
                    <button id="lang-btn" class="flex items-center gap-1.5 px-3 py-1.5 border border-primary-fixed/40 bg-primary-fixed/5 backdrop-blur-sm hover:border-primary-fixed/80 hover:bg-primary-fixed/10 hover:shadow-[0_0_10px_rgba(0,85,255,0.2)] transition-all duration-300 rounded-sm select-none">
                        <span class="material-symbols-outlined text-sm text-primary-fixed">language</span>
                        <span id="active-lang-label" class="font-code-sm text-label-caps text-xs text-primary-fixed tracking-widest"><?php echo strtoupper($lang); ?></span>
                        <span class="material-symbols-outlined text-sm text-primary-fixed transition-transform duration-200" id="lang-caret">expand_more</span>
                    </button>
                    <div id="lang-dropdown" class="hidden absolute right-0 top-full mt-2 w-44 bg-background/95 backdrop-blur-xl border border-outline-variant/50 shadow-[0_8px_32px_rgba(0,85,255,0.15)] z-[100] overflow-hidden">
                        <a href="?lang=en" data-lang="en" class="w-full text-left px-4 py-2.5 font-code-sm text-label-caps text-xs tracking-widest text-on-surface-variant hover:text-primary hover:bg-primary-fixed/10 transition-all duration-150 flex items-center gap-3">
                            <span class="fi fi-gb" style="border-radius:2px;width:1.2em;height:0.9em;"></span> EN &mdash; English
                        </a>
                        <a href="?lang=fr" data-lang="fr" class="w-full text-left px-4 py-2.5 font-code-sm text-label-caps text-xs tracking-widest text-on-surface-variant hover:text-primary hover:bg-primary-fixed/10 transition-all duration-150 flex items-center gap-3">
                            <span class="fi fi-fr" style="border-radius:2px;width:1.2em;height:0.9em;"></span> FR &mdash; Français
                        </a>
                        <a href="?lang=es" data-lang="es" class="w-full text-left px-4 py-2.5 font-code-sm text-label-caps text-xs tracking-widest text-on-surface-variant hover:text-primary hover:bg-primary-fixed/10 transition-all duration-150 flex items-center gap-3">
                            <span class="fi fi-es" style="border-radius:2px;width:1.2em;height:0.9em;"></span> ES &mdash; Español
                        </a>
                        <a href="?lang=it" data-lang="it" class="w-full text-left px-4 py-2.5 font-code-sm text-label-caps text-xs tracking-widest text-on-surface-variant hover:text-primary hover:bg-primary-fixed/10 transition-all duration-150 flex items-center gap-3">
                            <span class="fi fi-it" style="border-radius:2px;width:1.2em;height:0.9em;"></span> IT &mdash; Italiano
                        </a>
                        <a href="?lang=ru" data-lang="ru" class="w-full text-left px-4 py-2.5 font-code-sm text-label-caps text-xs tracking-widest text-on-surface-variant hover:text-primary hover:bg-primary-fixed/10 transition-all duration-150 flex items-center gap-3">
                            <span class="fi fi-ru" style="border-radius:2px;width:1.2em;height:0.9em;"></span> RU &mdash; Русский
                        </a>
                    </div>
                </div>

                <a href="contact.php" class="hidden md:block bg-primary-fixed text-on-primary-fixed px-6 py-2 font-display text-body-md font-bold rounded hover:shadow-[0_0_10px_#0055ff] transition-all duration-300 text-center" data-i18n="nav.hire_me"><?php echo __t('nav.hire_me'); ?></a>
                <button id="mobile-menu-btn" class="md:hidden material-symbols-outlined text-on-surface text-3xl">menu</button>
            </div>
        </nav>
        
        <!-- Mobile Navigation Dropdown Menu -->
        <div id="mobile-menu" class="hidden md:hidden fixed inset-x-0 top-[73px] bg-background/95 backdrop-blur-xl border-b border-outline-variant/30 py-6 px-margin-mobile flex flex-col gap-6 z-40 transition-all duration-300">
            <div class="flex flex-col gap-4">
                <a class="font-display text-lg text-primary-fixed font-bold" href="index.php" data-i18n="nav.home"><?php echo __t('nav.home'); ?></a>
                <a class="font-display text-lg text-on-surface-variant font-medium hover:text-primary" href="services.php" data-i18n="nav.services"><?php echo __t('nav.services'); ?></a>
                <a class="font-display text-lg text-on-surface-variant font-medium hover:text-primary" href="index.php#portfolio" data-i18n="nav.portfolio"><?php echo __t('nav.portfolio'); ?></a>
                <a class="font-display text-lg text-on-surface-variant font-medium hover:text-primary" href="contact.php" data-i18n="nav.contact"><?php echo __t('nav.contact'); ?></a>
            </div>
            <div class="h-px bg-outline-variant/30 w-full"></div>
            <div class="flex flex-col gap-3">
                <span class="font-code-sm text-xs text-outline uppercase tracking-widest">Language</span>
                <div class="grid grid-cols-5 gap-2">
                    <a href="?lang=en" data-lang="en" class="flex items-center justify-center py-2 border border-primary-fixed/40 bg-primary-fixed/15 text-primary text-xs font-bold rounded-sm">EN</a>
                    <a href="?lang=fr" data-lang="fr" class="flex items-center justify-center py-2 border border-outline-variant/30 text-on-surface-variant text-xs font-medium rounded-sm">FR</a>
                    <a href="?lang=es" data-lang="es" class="flex items-center justify-center py-2 border border-outline-variant/30 text-on-surface-variant text-xs font-medium rounded-sm">ES</a>
                    <a href="?lang=it" data-lang="it" class="flex items-center justify-center py-2 border border-outline-variant/30 text-on-surface-variant text-xs font-medium rounded-sm">IT</a>
                    <a href="?lang=ru" data-lang="ru" class="flex items-center justify-center py-2 border border-outline-variant/30 text-on-surface-variant text-xs font-medium rounded-sm">RU</a>
                </div>
            </div>
            <a href="contact.php" class="w-full bg-primary-fixed text-on-primary-fixed py-3 font-display font-bold rounded text-center" data-i18n="nav.hire_me"><?php echo __t('nav.hire_me'); ?></a>
        </div>
    </header>

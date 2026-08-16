<?php
/**
 * DevelopIA - Admin CMS Dashboard (Content Management System)
 */

require_once __DIR__ . '/../config.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$i18nFile = __DIR__ . '/../i18n.json';
if (!file_exists($i18nFile)) {
    die("Error: i18n.json translations file not found.");
}

$translations = json_decode(file_get_contents($i18nFile), true);

$message = '';
$error = '';

$languages = ['en' => 'English', 'fr' => 'Français', 'es' => 'Español', 'it' => 'Italiano', 'ru' => 'Русский'];
$sections = ['nav' => 'Navigation', 'footer' => 'Footer', 'index' => 'Home Page', 'services' => 'Services Page', 'contact' => 'Contact Page'];

$selectedLang = $_GET['lang'] ?? 'en';
$selectedSection = $_GET['section'] ?? 'index';

if (!array_key_exists($selectedLang, $languages)) {
    $selectedLang = 'en';
}
if (!array_key_exists($selectedSection, $sections)) {
    $selectedSection = 'index';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_content'])) {
    if (isset($_POST['content']) && is_array($_POST['content'])) {
        foreach ($_POST['content'] as $key => $value) {
            $translations[$selectedLang][$selectedSection][$key] = $value;
        }
        
        if (file_put_contents($i18nFile, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
            $message = "Content updated successfully!";
        } else {
            $error = "Failed to write to i18n.json. Please check file permissions.";
        }
    }
}

$css_file = '/style.css';
$asset_css = glob(__DIR__ . '/../assets/main-*.css');
if (!empty($asset_css)) {
    $css_file = '/assets/' . basename($asset_css[0]);
}
?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>CMS Dashboard | DevelopIA Admin</title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($css_file); ?>"/>
    <link rel="stylesheet" href="/style.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Geist:wght@400;600;700&display=swap" rel="stylesheet"/>
</head>
<body class="bg-background text-on-surface antialiased min-h-screen">
    <!-- Admin Top Nav -->
    <header class="bg-background/80 backdrop-blur-md border-b border-outline-variant/30 px-8 py-4 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center gap-3">
            <h1 class="font-display font-bold text-xl text-white">DevelopIA Admin Dashboard</h1>
            <span class="font-code-sm text-xs bg-primary-fixed/20 text-primary-fixed px-2 py-0.5 rounded border border-primary-fixed/30">CMS Active</span>
        </div>
        <div class="flex items-center gap-4">
            <span class="font-code-sm text-xs text-outline">User: <strong class="text-white"><?php echo htmlspecialchars($_SESSION['admin_user'] ?? 'Admin'); ?></strong></span>
            <a href="index.php" class="font-code-sm text-xs text-on-surface-variant hover:text-primary">&larr; Inquiries</a>
            <a href="../index.php" target="_blank" class="font-code-sm text-xs text-on-surface-variant hover:text-primary">&rarr; View Website</a>
            <a href="index.php?action=logout" class="font-code-sm text-xs text-red-400 hover:text-red-300 ml-4">Logout</a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-8">
        <div class="mb-8">
            <h2 class="font-display text-2xl font-bold text-white mb-2">Content Manager (CMS)</h2>
            <p class="font-code-sm text-sm text-outline">Edit translation strings and page content dynamically across all supported languages.</p>
        </div>

        <?php if ($message): ?>
            <div class="bg-green-500/10 border border-green-500/30 text-green-400 p-4 rounded mb-6 text-sm font-mono flex justify-between items-center">
                <span><?php echo htmlspecialchars($message); ?></span>
                <button onclick="this.parentElement.remove()" class="text-xs">&times;</button>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-4 rounded mb-6 text-sm font-mono flex justify-between items-center">
                <span><?php echo htmlspecialchars($error); ?></span>
                <button onclick="this.parentElement.remove()" class="text-xs">&times;</button>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <!-- Sidebar Navigation: Languages & Sections -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Language Selector Card -->
                <div class="glass-panel p-6 border border-outline-variant/30 rounded">
                    <h3 class="font-display text-sm font-bold text-white mb-4 uppercase tracking-wider">// Target Language</h3>
                    <div class="flex flex-col gap-2">
                        <?php foreach ($languages as $code => $name): ?>
                            <a href="?lang=<?php echo $code; ?>&section=<?php echo $selectedSection; ?>" 
                               class="flex items-center justify-between px-4 py-3 border rounded text-sm transition-all <?php echo $selectedLang === $code ? 'bg-primary-fixed/20 border-primary-fixed text-white font-bold' : 'border-outline-variant/30 text-on-surface-variant hover:bg-surface-container-low hover:text-white'; ?>">
                                <span><?php echo $name; ?></span>
                                <span class="font-mono text-xs uppercase"><?php echo $code; ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Section Selector Card -->
                <div class="glass-panel p-6 border border-outline-variant/30 rounded">
                    <h3 class="font-display text-sm font-bold text-white mb-4 uppercase tracking-wider">// Page Sections</h3>
                    <div class="flex flex-col gap-2">
                        <?php foreach ($sections as $sec => $name): ?>
                            <a href="?lang=<?php echo $selectedLang; ?>&section=<?php echo $sec; ?>" 
                               class="flex items-center justify-between px-4 py-3 border rounded text-sm transition-all <?php echo $selectedSection === $sec ? 'bg-primary-fixed/20 border-primary-fixed text-white font-bold' : 'border-outline-variant/30 text-on-surface-variant hover:bg-surface-container-low hover:text-white'; ?>">
                                <span><?php echo $name; ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Content Editing Form -->
            <div class="lg:col-span-8">
                <div class="glass-panel p-8 border border-outline-variant/30 rounded">
                    <div class="mb-8 border-b border-outline-variant/20 pb-4">
                        <span class="font-code-sm text-xs text-primary-fixed uppercase tracking-widest">// Editing Area</span>
                        <h3 class="font-display text-xl font-bold text-white mt-1">
                            <?php echo $sections[$selectedSection]; ?> Strings (<?php echo $languages[$selectedLang]; ?>)
                        </h3>
                    </div>

                    <form method="POST" action="" class="space-y-6">
                        <input type="hidden" name="save_content" value="1"/>
                        
                        <div class="space-y-6 max-h-[600px] overflow-y-auto pr-2">
                            <?php 
                            $sectionTranslations = $translations[$selectedLang][$selectedSection] ?? [];
                            if (empty($sectionTranslations)): 
                            ?>
                                <p class="text-outline font-code-sm text-sm">No keys found in this section.</p>
                            <?php else: ?>
                                <?php foreach ($sectionTranslations as $key => $value): ?>
                                    <div class="space-y-2 border-b border-outline-variant/10 pb-4 last:border-0">
                                        <div class="flex justify-between items-center">
                                            <label class="block font-code-sm text-xs text-primary-fixed-dim uppercase tracking-wider font-semibold">
                                                <?php echo htmlspecialchars($key); ?>
                                            </label>
                                            <span class="font-code-sm text-[10px] text-outline">
                                                <?php echo htmlspecialchars($selectedSection . '.' . $key); ?>
                                            </span>
                                        </div>
                                        <?php if (strlen($value) > 80 || strpos($value, "\n") !== false): ?>
                                            <textarea name="content[<?php echo htmlspecialchars($key); ?>]" 
                                                      rows="4" 
                                                      class="w-full bg-surface-container-low border border-outline-variant rounded px-4 py-3 text-on-surface font-display text-sm focus:border-primary-fixed-dim focus:outline-none focus:ring-1 focus:ring-primary-fixed-dim transition-all outline-none resize-y"
                                            ><?php echo htmlspecialchars($value); ?></textarea>
                                        <?php else: ?>
                                            <input type="text" 
                                                   name="content[<?php echo htmlspecialchars($key); ?>]" 
                                                   value="<?php echo htmlspecialchars($value); ?>" 
                                                   class="w-full bg-surface-container-low border border-outline-variant rounded px-4 py-3 text-on-surface font-display text-sm focus:border-primary-fixed-dim focus:outline-none focus:ring-1 focus:ring-primary-fixed-dim transition-all outline-none"
                                            />
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <div class="pt-6 border-t border-outline-variant/20 flex justify-end">
                            <button type="submit" class="bg-primary-fixed text-on-primary-fixed px-10 py-3 font-display font-bold hover:shadow-[0_0_20px_#0055ff] transition-all rounded active:scale-95 flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">save</span>
                                SAVE CHANGES
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

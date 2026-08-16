<?php
/**
 * DevelopIA - Admin CMS Dashboard (Content & Media Management System)
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
$activeTab = $_GET['tab'] ?? 'content'; // 'content' or 'media'

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

// Handle text content saving
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

// Handle image upload and replacement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_media'])) {
    $target_dir = __DIR__ . '/../';
    $file_keys = [
        'hero' => 'developia_hero.jpg',
        'easydubbing' => 'easydubbing.jpg',
        'tunemusics' => 'tunemusics.png',
        'social_ai_publisher' => 'social_ai_publisher.png',
        'logo' => 'logo.png',
        'favicon' => 'favicon.png'
    ];
    
    $uploaded_count = 0;
    foreach ($file_keys as $key => $filename) {
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK) {
            $target_file = $target_dir . $filename;
            if (move_uploaded_file($_FILES[$key]['tmp_name'], $target_file)) {
                $message .= "Successfully replaced " . htmlspecialchars($filename) . ". ";
                $uploaded_count++;
            } else {
                $error .= "Failed to upload " . htmlspecialchars($filename) . ". ";
            }
        }
    }
    
    if ($uploaded_count > 0 && empty($error)) {
        $message = "All selected media files replaced successfully!";
    }
}

$css_file = '/style.css';
$asset_css = glob(__DIR__ . '/../assets/main-*.css');
if (!empty($asset_css)) {
    usort($asset_css, function($a, $b) {
        return filemtime($b) - filemtime($a);
    });
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
        <!-- Dashboard Heading & Tabs -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 border-b border-outline-variant/20 pb-6">
            <div>
                <h2 class="font-display text-2xl font-bold text-white mb-2">Content & Media Manager (CMS)</h2>
                <p class="font-code-sm text-sm text-outline">Configure dynamic content text, portfolio links, and images for the main website.</p>
            </div>
            
            <!-- Tabs -->
            <div class="flex bg-surface-container-low p-1 border border-outline-variant/30 rounded">
                <a href="?tab=content&lang=<?php echo $selectedLang; ?>&section=<?php echo $selectedSection; ?>" 
                   class="px-5 py-2 text-xs font-bold font-display rounded transition-all <?php echo $activeTab === 'content' ? 'bg-primary-fixed text-on-primary-fixed' : 'text-on-surface-variant hover:text-white'; ?>">
                    TEXT CONTENT
                </a>
                <a href="?tab=media" 
                   class="px-5 py-2 text-xs font-bold font-display rounded transition-all <?php echo $activeTab === 'media' ? 'bg-primary-fixed text-on-primary-fixed' : 'text-on-surface-variant hover:text-white'; ?>">
                    IMAGES & MEDIA
                </a>
            </div>
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

        <!-- ==================== TAB 1: TEXT CONTENT EDITOR ==================== -->
        <?php if ($activeTab === 'content'): ?>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Sidebar: Languages & Sections -->
                <div class="lg:col-span-4 space-y-6">
                    <!-- Language Selector -->
                    <div class="glass-panel p-6 border border-outline-variant/30 rounded">
                        <h3 class="font-display text-sm font-bold text-white mb-4 uppercase tracking-wider">// Target Language</h3>
                        <div class="flex flex-col gap-2">
                            <?php foreach ($languages as $code => $name): ?>
                                <a href="?tab=content&lang=<?php echo $code; ?>&section=<?php echo $selectedSection; ?>" 
                                   class="flex items-center justify-between px-4 py-3 border rounded text-sm transition-all <?php echo $selectedLang === $code ? 'bg-primary-fixed/20 border-primary-fixed text-white font-bold' : 'border-outline-variant/30 text-on-surface-variant hover:bg-surface-container-low hover:text-white'; ?>">
                                    <span><?php echo $name; ?></span>
                                    <span class="font-mono text-xs uppercase"><?php echo $code; ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Section Selector -->
                    <div class="glass-panel p-6 border border-outline-variant/30 rounded">
                        <h3 class="font-display text-sm font-bold text-white mb-4 uppercase tracking-wider">// Page Sections</h3>
                        <div class="flex flex-col gap-2">
                            <?php foreach ($sections as $sec => $name): ?>
                                <a href="?tab=content&lang=<?php echo $selectedLang; ?>&section=<?php echo $sec; ?>" 
                                   class="flex items-center justify-between px-4 py-3 border rounded text-sm transition-all <?php echo $selectedSection === $sec ? 'bg-primary-fixed/20 border-primary-fixed text-white font-bold' : 'border-outline-variant/30 text-on-surface-variant hover:bg-surface-container-low hover:text-white'; ?>">
                                    <span><?php echo $name; ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Content Form -->
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

        <!-- ==================== TAB 2: IMAGES & MEDIA MANAGER ==================== -->
        <?php elseif ($activeTab === 'media'): ?>
            <div class="glass-panel p-8 border border-outline-variant/30 rounded">
                <div class="mb-8 border-b border-outline-variant/20 pb-4">
                    <span class="font-code-sm text-xs text-primary-fixed uppercase tracking-widest">// Media Upload Center</span>
                    <h3 class="font-display text-xl font-bold text-white mt-1">Replace Website Images</h3>
                    <p class="font-code-sm text-xs text-outline mt-1">Upload new images to replace existing website assets. Ideal dimensions are recommended for layout preservation.</p>
                </div>

                <form method="POST" action="" enctype="multipart/form-data" class="space-y-8">
                    <input type="hidden" name="upload_media" value="1"/>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Hero Image Slot -->
                        <div class="bg-surface-container-low border border-outline-variant/30 rounded p-6 space-y-4">
                            <div>
                                <h4 class="font-display font-bold text-white text-sm">Main Hero Background</h4>
                                <span class="font-code-sm text-[10px] text-outline">developia_hero.jpg &bull; Recommended: 1920x1080px</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <img src="../developia_hero.jpg" class="w-24 h-16 object-cover rounded border border-outline-variant/30" alt="Current Hero"/>
                                <input type="file" name="hero" accept=".jpg,.jpeg" class="w-full text-xs text-outline file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-primary-fixed/20 file:text-primary-fixed hover:file:bg-primary-fixed/30 cursor-pointer"/>
                            </div>
                        </div>

                        <!-- Easy Dubbing Image Slot -->
                        <div class="bg-surface-container-low border border-outline-variant/30 rounded p-6 space-y-4">
                            <div>
                                <h4 class="font-display font-bold text-white text-sm">Easy Dubbing Cover</h4>
                                <span class="font-code-sm text-[10px] text-outline">easydubbing.jpg &bull; Recommended: 800x600px</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <img src="../easydubbing.jpg" class="w-24 h-16 object-cover rounded border border-outline-variant/30" alt="Current Easy Dubbing"/>
                                <input type="file" name="easydubbing" accept=".jpg,.jpeg" class="w-full text-xs text-outline file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-primary-fixed/20 file:text-primary-fixed hover:file:bg-primary-fixed/30 cursor-pointer"/>
                            </div>
                        </div>

                        <!-- TuneMusics Image Slot -->
                        <div class="bg-surface-container-low border border-outline-variant/30 rounded p-6 space-y-4">
                            <div>
                                <h4 class="font-display font-bold text-white text-sm">TuneMusics Cover</h4>
                                <span class="font-code-sm text-[10px] text-outline">tunemusics.png &bull; Recommended: 800x600px</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <img src="../tunemusics.png" class="w-24 h-16 object-cover rounded border border-outline-variant/30" alt="Current TuneMusics"/>
                                <input type="file" name="tunemusics" accept=".png" class="w-full text-xs text-outline file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-primary-fixed/20 file:text-primary-fixed hover:file:bg-primary-fixed/30 cursor-pointer"/>
                            </div>
                        </div>

                        <!-- Social AI Publisher Image Slot -->
                        <div class="bg-surface-container-low border border-outline-variant/30 rounded p-6 space-y-4">
                            <div>
                                <h4 class="font-display font-bold text-white text-sm">Social AI Publisher Cover</h4>
                                <span class="font-code-sm text-[10px] text-outline">social_ai_publisher.png &bull; Recommended: 800x600px</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <img src="../social_ai_publisher.png" class="w-24 h-16 object-cover rounded border border-outline-variant/30" alt="Current Publisher"/>
                                <input type="file" name="social_ai_publisher" accept=".png" class="w-full text-xs text-outline file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-primary-fixed/20 file:text-primary-fixed hover:file:bg-primary-fixed/30 cursor-pointer"/>
                            </div>
                        </div>

                        <!-- Logo Image Slot -->
                        <div class="bg-surface-container-low border border-outline-variant/30 rounded p-6 space-y-4">
                            <div>
                                <h4 class="font-display font-bold text-white text-sm">Website Header Logo</h4>
                                <span class="font-code-sm text-[10px] text-outline">logo.png &bull; Recommended: Transparent PNG</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <img src="../logo.png" class="w-16 h-16 object-contain rounded border border-outline-variant/30 bg-background" alt="Current Logo"/>
                                <input type="file" name="logo" accept=".png" class="w-full text-xs text-outline file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-primary-fixed/20 file:text-primary-fixed hover:file:bg-primary-fixed/30 cursor-pointer"/>
                            </div>
                        </div>

                        <!-- Favicon Image Slot -->
                        <div class="bg-surface-container-low border border-outline-variant/30 rounded p-6 space-y-4">
                            <div>
                                <h4 class="font-display font-bold text-white text-sm">Tab Favicon Icon</h4>
                                <span class="font-code-sm text-[10px] text-outline">favicon.png &bull; Recommended: 32x32px or 64x64px PNG</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <img src="../favicon.png" class="w-12 h-12 object-contain rounded border border-outline-variant/30 bg-background" alt="Current Favicon"/>
                                <input type="file" name="favicon" accept=".png" class="w-full text-xs text-outline file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-primary-fixed/20 file:text-primary-fixed hover:file:bg-primary-fixed/30 cursor-pointer"/>
                            </div>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-outline-variant/20 flex justify-end">
                        <button type="submit" class="bg-primary-fixed text-on-primary-fixed px-10 py-3 font-display font-bold hover:shadow-[0_0_20px_#0055ff] transition-all rounded active:scale-95 flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">cloud_upload</span>
                            REPLACE SELECTED IMAGES
                        </button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>

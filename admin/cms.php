<?php
/**
 * DevelopIA - Admin CMS Dashboard (Content, Media, Portfolio & Blog Management System)
 */

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$i18nFile = __DIR__ . '/../i18n.json';
$portfolioFile = __DIR__ . '/../portfolio.json';
$settingsFile = __DIR__ . '/../settings.json';

if (!file_exists($i18nFile)) {
    die("Error: i18n.json translations file not found.");
}
if (!file_exists($portfolioFile)) {
    file_put_contents($portfolioFile, json_encode([], JSON_PRETTY_PRINT));
}
if (!file_exists($settingsFile)) {
    file_put_contents($settingsFile, json_encode(['gemini_api_key' => '', 'cron_token' => 'developia_secure_token_2026'], JSON_PRETTY_PRINT));
}

$translations = json_decode(file_get_contents($i18nFile), true);
$projects = json_decode(file_get_contents($portfolioFile), true) ?: [];
$settings = json_decode(file_get_contents($settingsFile), true) ?: [];

$message = '';
$error = '';
$activeTab = $_GET['tab'] ?? 'content'; // 'content', 'media', 'portfolio', 'blog', or 'settings'

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

$pdo = getDBConnection();
$blogPosts = [];
if ($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM `blog_posts` ORDER BY `created_at` DESC");
        $stmt->execute();
        $blogPosts = $stmt->fetchAll();
    } catch (PDOException $e) {
        $error = "Failed to load blog posts: " . $e->getMessage();
    }
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

// Handle static image upload and replacement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_media'])) {
    $target_dir = __DIR__ . '/../';
    $file_keys = [
        'hero' => 'developia_hero.jpg',
        'logo' => 'logo.png',
        'favicon' => 'favicon.png'
    ];
    
    $uploaded_count = 0;
    foreach ($file_keys as $key => $filename) {
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK) {
            $target_file = $target_dir . $filename;
            if (move_uploaded_file($_FILES[$key]['tmp_name'], $target_file)) {
                $uploaded_count++;
            } else {
                $error .= "Failed to upload " . htmlspecialchars($filename) . ". ";
            }
        }
    }
    
    if ($uploaded_count > 0 && empty($error)) {
        $message = "Selected core media assets replaced successfully!";
    }
}

// Handle adding a new portfolio project
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_project'])) {
    $nextId = 1;
    foreach ($projects as $p) {
        if ($p['id'] >= $nextId) {
            $nextId = $p['id'] + 1;
        }
    }
    
    // Handle image upload
    $imageFilename = '';
    if (isset($_FILES['project_image']) && $_FILES['project_image']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['project_image']['name'], PATHINFO_EXTENSION));
        $imageFilename = "portfolio_project_" . $nextId . "." . $ext;
        $target_file = __DIR__ . '/../' . $imageFilename;
        if (!move_uploaded_file($_FILES['project_image']['tmp_name'], $target_file)) {
            $error = "Failed to upload project image.";
        }
    } else {
        $error = "Please upload a cover image for the project.";
    }
    
    if (empty($error)) {
        $newProject = [
            'id' => $nextId,
            'image' => $imageFilename,
            'link' => $_POST['project_link'],
            'title' => [
                'en' => $_POST['title_en'],
                'fr' => $_POST['title_fr'],
                'es' => $_POST['title_es'],
                'it' => $_POST['title_it'],
                'ru' => $_POST['title_ru']
            ],
            'category' => [
                'en' => $_POST['cat_en'],
                'fr' => $_POST['cat_fr'],
                'es' => $_POST['cat_es'],
                'it' => $_POST['cat_it'],
                'ru' => $_POST['cat_ru']
            ]
        ];
        
        $projects[] = $newProject;
        if (file_put_contents($portfolioFile, json_encode($projects, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
            $message = "New portfolio project added successfully!";
        } else {
            $error = "Failed to save portfolio data.";
        }
    }
}

// Handle deleting a portfolio project
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_project'])) {
    $deleteId = (int)$_POST['project_id'];
    
    $filteredProjects = [];
    foreach ($projects as $p) {
        if ($p['id'] !== $deleteId) {
            $filteredProjects[] = $p;
        } else {
            $imageFile = __DIR__ . '/../' . $p['image'];
            if (file_exists($imageFile) && strpos($p['image'], 'portfolio_project_') === 0) {
                @unlink($imageFile);
            }
        }
    }
    
    $projects = $filteredProjects;
    if (file_put_contents($portfolioFile, json_encode($projects, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
        $message = "Portfolio project deleted successfully!";
    } else {
        $error = "Failed to save portfolio updates.";
    }
}

// Handle Settings saving
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_settings'])) {
    $settings['gemini_api_key'] = $_POST['gemini_api_key'];
    $settings['cron_token'] = $_POST['cron_token'];
    
    if (file_put_contents($settingsFile, json_encode($settings, JSON_PRETTY_PRINT))) {
        $message = "Branding and API settings updated successfully!";
    } else {
        $error = "Failed to save settings file.";
    }
}

// Handle Blog CRUD saving
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_blog_post'])) {
    $post_id = $_POST['post_id'] ?? '';
    $title = $_POST['post_title'];
    $slug = $_POST['post_slug'];
    $summary = $_POST['post_summary'];
    $content = $_POST['post_content'];
    $status = $_POST['post_status'];
    
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug)));
    $slug = trim($slug, '-');
    
    if ($pdo) {
        try {
            if ($post_id) {
                $stmt = $pdo->prepare("UPDATE `blog_posts` SET `title` = :title, `slug` = :slug, `summary` = :summary, `content` = :content, `status` = :status, `published_at` = CASE WHEN :status = 'published' AND `published_at` IS NULL THEN NOW() ELSE `published_at` END WHERE `id` = :id");
                $stmt->execute([
                    ':title' => $title,
                    ':slug' => $slug,
                    ':summary' => $summary,
                    ':content' => $content,
                    ':status' => $status,
                    ':id' => $post_id
                ]);
                $message = "Blog post updated successfully!";
            } else {
                $stmt = $pdo->prepare("INSERT INTO `blog_posts` (`title`, `slug`, `summary`, `content`, `status`, `published_at`) VALUES (:title, :slug, :summary, :content, :status, CASE WHEN :status = 'published' THEN NOW() ELSE NULL END)");
                $stmt->execute([
                    ':title' => $title,
                    ':slug' => $slug,
                    ':summary' => $summary,
                    ':content' => $content,
                    ':status' => $status
                ]);
                $message = "Blog post created successfully!";
            }
            
            // Reload post list
            $stmt = $pdo->prepare("SELECT * FROM `blog_posts` ORDER BY `created_at` DESC");
            $stmt->execute();
            $blogPosts = $stmt->fetchAll();
        } catch (PDOException $e) {
            $error = "Database operation failed: " . $e->getMessage();
        }
    }
}

// Handle Blog post deleting
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_blog_post'])) {
    $post_id = (int)$_POST['post_id'];
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("DELETE FROM `blog_posts` WHERE `id` = :id");
            $stmt->execute([':id' => $post_id]);
            $message = "Blog post deleted successfully!";
            
            // Reload post list
            $stmt = $pdo->prepare("SELECT * FROM `blog_posts` ORDER BY `created_at` DESC");
            $stmt->execute();
            $blogPosts = $stmt->fetchAll();
        } catch (PDOException $e) {
            $error = "Failed to delete blog post: " . $e->getMessage();
        }
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
                <h2 class="font-display text-2xl font-bold text-white mb-2">Content, Media & Blog (CMS)</h2>
                <p class="font-code-sm text-sm text-outline">Configure translation text, media, custom portfolio projects, and automated AI blog content.</p>
            </div>
            
            <!-- Tabs -->
            <div class="flex bg-surface-container-low p-1 border border-outline-variant/30 rounded flex-wrap gap-1">
                <a href="?tab=content&lang=<?php echo $selectedLang; ?>&section=<?php echo $selectedSection; ?>" 
                   class="px-4 py-2 text-xs font-bold font-display rounded transition-all <?php echo $activeTab === 'content' ? 'bg-primary-fixed text-on-primary-fixed' : 'text-on-surface-variant hover:text-white'; ?>">
                    TEXT CONTENT
                </a>
                <a href="?tab=media" 
                   class="px-4 py-2 text-xs font-bold font-display rounded transition-all <?php echo $activeTab === 'media' ? 'bg-primary-fixed text-on-primary-fixed' : 'text-on-surface-variant hover:text-white'; ?>">
                    CORE IMAGES
                </a>
                <a href="?tab=portfolio" 
                   class="px-4 py-2 text-xs font-bold font-display rounded transition-all <?php echo $activeTab === 'portfolio' ? 'bg-primary-fixed text-on-primary-fixed' : 'text-on-surface-variant hover:text-white'; ?>">
                    PORTFOLIO
                </a>
                <a href="?tab=blog" 
                   class="px-4 py-2 text-xs font-bold font-display rounded transition-all <?php echo $activeTab === 'blog' ? 'bg-primary-fixed text-on-primary-fixed' : 'text-on-surface-variant hover:text-white'; ?>">
                    BLOG POSTS
                </a>
                <a href="?tab=settings" 
                   class="px-4 py-2 text-xs font-bold font-display rounded transition-all <?php echo $activeTab === 'settings' ? 'bg-primary-fixed text-on-primary-fixed' : 'text-on-surface-variant hover:text-white'; ?>">
                    SETTINGS & API
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

        <!-- ==================== TAB 2: CORE IMAGES & LOGO ==================== -->
        <?php elseif ($activeTab === 'media'): ?>
            <div class="glass-panel p-8 border border-outline-variant/30 rounded">
                <div class="mb-8 border-b border-outline-variant/20 pb-4">
                    <span class="font-code-sm text-xs text-primary-fixed uppercase tracking-widest">// Media Upload Center</span>
                    <h3 class="font-display text-xl font-bold text-white mt-1">Replace Site Branding & Main Banner</h3>
                    <p class="font-code-sm text-xs text-outline mt-1">Upload files to replace core assets. Recommended dimensions will prevent layouts from shifting.</p>
                </div>

                <form method="POST" action="" enctype="multipart/form-data" class="space-y-8">
                    <input type="hidden" name="upload_media" value="1"/>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-surface-container-low border border-outline-variant/30 rounded p-6 space-y-4">
                            <div>
                                <h4 class="font-display font-bold text-white text-sm">Main Hero Background</h4>
                                <span class="font-code-sm text-[10px] text-outline">developia_hero.jpg &bull; 1920x1080px</span>
                            </div>
                            <img src="../developia_hero.jpg" class="w-full h-32 object-cover rounded border border-outline-variant/30" alt="Current Hero"/>
                            <input type="file" name="hero" accept=".jpg,.jpeg" class="w-full text-xs text-outline file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-primary-fixed/20 file:text-primary-fixed hover:file:bg-primary-fixed/30 cursor-pointer"/>
                        </div>

                        <div class="bg-surface-container-low border border-outline-variant/30 rounded p-6 space-y-4">
                            <div>
                                <h4 class="font-display font-bold text-white text-sm">Website Header Logo</h4>
                                <span class="font-code-sm text-[10px] text-outline">logo.png &bull; Transparent PNG</span>
                            </div>
                            <div class="h-32 flex items-center justify-center bg-surface-container rounded border border-outline-variant/30">
                                <img src="../logo.png" class="max-h-24 max-w-full object-contain" alt="Current Logo"/>
                            </div>
                            <input type="file" name="logo" accept=".png" class="w-full text-xs text-outline file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-primary-fixed/20 file:text-primary-fixed hover:file:bg-primary-fixed/30 cursor-pointer"/>
                        </div>

                        <div class="bg-surface-container-low border border-outline-variant/30 rounded p-6 space-y-4">
                            <div>
                                <h4 class="font-display font-bold text-white text-sm">Tab Favicon Icon</h4>
                                <span class="font-code-sm text-[10px] text-outline">favicon.png &bull; 32x32px or 64x64px PNG</span>
                            </div>
                            <div class="h-32 flex items-center justify-center bg-surface-container rounded border border-outline-variant/30">
                                <img src="../favicon.png" class="w-16 h-16 object-contain" alt="Current Favicon"/>
                            </div>
                            <input type="file" name="favicon" accept=".png" class="w-full text-xs text-outline file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-primary-fixed/20 file:text-primary-fixed hover:file:bg-primary-fixed/30 cursor-pointer"/>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-outline-variant/20 flex justify-end">
                        <button type="submit" class="bg-primary-fixed text-on-primary-fixed px-10 py-3 font-display font-bold hover:shadow-[0_0_20px_#0055ff] transition-all rounded active:scale-95 flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">cloud_upload</span>
                            REPLACE IMAGES
                        </button>
                    </div>
                </form>
            </div>

        <!-- ==================== TAB 3: PORTFOLIO MANAGER ==================== -->
        <?php elseif ($activeTab === 'portfolio'): ?>
            <div class="space-y-8">
                <div class="glass-panel p-8 border border-outline-variant/30 rounded">
                    <h3 class="font-display text-lg font-bold text-white mb-6 uppercase tracking-wider">// Existing Portfolio Projects</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <?php if (empty($projects)): ?>
                            <p class="text-outline font-code-sm text-sm col-span-3">No portfolio projects configured.</p>
                        <?php else: ?>
                            <?php foreach ($projects as $proj): ?>
                                <div class="bg-surface-container-low border border-outline-variant/30 rounded overflow-hidden flex flex-col justify-between h-[300px]">
                                    <div class="relative h-40">
                                        <img src="../<?php echo htmlspecialchars($proj['image']); ?>" class="w-full h-full object-cover" alt="Project image"/>
                                        <div class="absolute inset-0 bg-black/40 flex items-start justify-end p-2">
                                            <form method="POST" action="" onsubmit="return confirm('Delete this project?')">
                                                <input type="hidden" name="delete_project" value="1"/>
                                                <input type="hidden" name="project_id" value="<?php echo $proj['id']; ?>"/>
                                                <button type="submit" class="bg-red-500/90 text-white p-2 rounded hover:bg-red-600 transition-colors flex items-center justify-center">
                                                    <span class="material-symbols-outlined text-sm">delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="p-4 space-y-2 flex-grow">
                                        <h4 class="font-display font-bold text-white text-base leading-tight"><?php echo htmlspecialchars($proj['title']['en']); ?></h4>
                                        <p class="font-code-sm text-xs text-primary-fixed uppercase tracking-wider"><?php echo htmlspecialchars($proj['category']['en']); ?></p>
                                        <a href="<?php echo htmlspecialchars($proj['link']); ?>" target="_blank" class="font-code-sm text-[11px] text-outline hover:underline truncate block"><?php echo htmlspecialchars($proj['link']); ?></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="glass-panel p-8 border border-outline-variant/30 rounded">
                    <div class="mb-6 border-b border-outline-variant/20 pb-4">
                        <span class="font-code-sm text-xs text-primary-fixed uppercase tracking-widest">// Expansion Panel</span>
                        <h3 class="font-display text-xl font-bold text-white mt-1">Add New Portfolio Project</h3>
                    </div>

                    <form method="POST" action="" enctype="multipart/form-data" class="space-y-6">
                        <input type="hidden" name="add_project" value="1"/>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <label class="block font-code-sm text-xs text-outline uppercase font-semibold">Project Redirect Link (URL)</label>
                                    <input type="url" name="project_link" required placeholder="https://..." class="w-full bg-surface-container border border-outline-variant rounded px-4 py-3 text-on-surface font-display text-sm focus:border-primary-fixed-dim focus:outline-none"/>
                                </div>
                                <div class="space-y-2">
                                    <label class="block font-code-sm text-xs text-outline uppercase font-semibold">Project Cover Image</label>
                                    <input type="file" name="project_image" required accept=".png,.jpg,.jpeg" class="w-full text-xs text-outline file:mr-4 file:py-2.5 file:px-4 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-primary-fixed/20 file:text-primary-fixed hover:file:bg-primary-fixed/30 cursor-pointer"/>
                                </div>
                            </div>
                            
                            <div class="space-y-4 bg-surface-container-low border border-outline-variant/20 rounded p-6">
                                <h4 class="font-display text-xs font-bold text-white uppercase tracking-wider mb-2">// Multi-language Project Details</h4>
                                <div class="space-y-4 max-h-[250px] overflow-y-auto pr-2">
                                    <?php foreach ($languages as $code => $name): ?>
                                        <div class="grid grid-cols-2 gap-4 border-b border-outline-variant/10 pb-3 last:border-0">
                                            <div class="space-y-1 col-span-2 font-code-sm text-[10px] text-primary-fixed uppercase tracking-wider font-bold">
                                                <?php echo $name; ?> (<?php echo strtoupper($code); ?>)
                                            </div>
                                            <div class="space-y-1">
                                                <input type="text" name="title_<?php echo $code; ?>" required placeholder="Title in <?php echo $code; ?>" class="w-full bg-surface-container border border-outline-variant rounded px-3 py-1.5 text-on-surface font-display text-xs focus:border-primary-fixed-dim focus:outline-none"/>
                                            </div>
                                            <div class="space-y-1">
                                                <input type="text" name="cat_<?php echo $code; ?>" required placeholder="Category in <?php echo $code; ?>" class="w-full bg-surface-container border border-outline-variant rounded px-3 py-1.5 text-on-surface font-display text-xs focus:border-primary-fixed-dim focus:outline-none"/>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-outline-variant/20 flex justify-end">
                            <button type="submit" class="bg-primary-fixed text-on-primary-fixed px-10 py-3 font-display font-bold hover:shadow-[0_0_20px_#0055ff] transition-all rounded active:scale-95 flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">add_box</span>
                                ADD TO PORTFOLIO
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        <!-- ==================== TAB 4: BLOG POSTS CRUD ==================== -->
        <?php elseif ($activeTab === 'blog'): ?>
            <?php
            $editPost = null;
            if (isset($_GET['edit_id'])) {
                $editId = (int)$_GET['edit_id'];
                foreach ($blogPosts as $bp) {
                    if ((int)$bp['id'] === $editId) {
                        $editPost = $bp;
                        break;
                    }
                }
            }
            ?>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Blog Listing Table -->
                <div class="lg:col-span-7 glass-panel p-6 border border-outline-variant/30 rounded">
                    <h3 class="font-display text-sm font-bold text-white mb-4 uppercase tracking-wider">// Published & Draft Articles</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left font-display border-collapse text-xs">
                            <thead>
                                <tr class="bg-surface-container border-b border-outline-variant/30 font-code-sm text-[10px] text-outline uppercase tracking-wider">
                                    <th class="p-3">Title</th>
                                    <th class="p-3">Slug</th>
                                    <th class="p-3">Status</th>
                                    <th class="p-3 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/20">
                                <?php if (empty($blogPosts)): ?>
                                    <tr>
                                        <td colspan="4" class="p-8 text-center text-outline font-code-sm">No blog posts found.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($blogPosts as $post): ?>
                                        <tr class="hover:bg-surface-container-low/40 transition-colors">
                                            <td class="p-3">
                                                <div class="font-bold text-white"><?php echo htmlspecialchars($post['title']); ?></div>
                                                <div class="text-[10px] text-outline mt-0.5">Created: <?php echo date('M d, Y', strtotime($post['created_at'])); ?></div>
                                            </td>
                                            <td class="p-3 font-mono text-outline"><?php echo htmlspecialchars($post['slug']); ?></td>
                                            <td class="p-3">
                                                <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold <?php echo $post['status'] === 'published' ? 'bg-green-500/10 text-green-400 border border-green-500/20' : 'bg-yellow-500/10 text-yellow-400 border border-yellow-500/20'; ?>">
                                                    <?php echo strtoupper($post['status']); ?>
                                                </span>
                                            </td>
                                            <td class="p-3 text-right space-x-2 whitespace-nowrap">
                                                <a href="?tab=blog&edit_id=<?php echo $post['id']; ?>" class="text-primary hover:underline text-xs font-mono">Edit</a>
                                                <form method="POST" action="" class="inline" onsubmit="return confirm('Delete this blog post?')">
                                                    <input type="hidden" name="delete_blog_post" value="1"/>
                                                    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>"/>
                                                    <button type="submit" class="text-red-400 hover:text-red-300 text-xs font-mono">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Blog Editor Form -->
                <div class="lg:col-span-5 glass-panel p-6 border border-outline-variant/30 rounded">
                    <h3 class="font-display text-sm font-bold text-white mb-4 uppercase tracking-wider">
                        <?php echo $editPost ? '// Edit Blog Post' : '// Create Blog Post'; ?>
                    </h3>
                    
                    <form method="POST" action="" class="space-y-4 text-sm">
                        <input type="hidden" name="save_blog_post" value="1"/>
                        <?php if ($editPost): ?>
                            <input type="hidden" name="post_id" value="<?php echo $editPost['id']; ?>"/>
                        <?php endif; ?>
                        
                        <div class="space-y-1">
                            <label class="block font-code-sm text-xs text-outline uppercase font-semibold">Title</label>
                            <input type="text" name="post_title" required value="<?php echo $editPost ? htmlspecialchars($editPost['title']) : ''; ?>" placeholder="Article Title" class="w-full bg-surface-container border border-outline-variant rounded px-3 py-2 text-on-surface focus:border-primary-fixed-dim focus:outline-none"/>
                        </div>

                        <div class="space-y-1">
                            <label class="block font-code-sm text-xs text-outline uppercase font-semibold">Slug (URL friendly path)</label>
                            <input type="text" name="post_slug" required value="<?php echo $editPost ? htmlspecialchars($editPost['slug']) : ''; ?>" placeholder="e.g. dynamic-saas-architectures" class="w-full bg-surface-container border border-outline-variant rounded px-3 py-2 text-on-surface font-mono text-xs focus:border-primary-fixed-dim focus:outline-none"/>
                        </div>

                        <div class="space-y-1">
                            <label class="block font-code-sm text-xs text-outline uppercase font-semibold">Summary / Subtitle</label>
                            <textarea name="post_summary" rows="2" required placeholder="Brief article description for listings..." class="w-full bg-surface-container border border-outline-variant rounded px-3 py-2 text-on-surface focus:border-primary-fixed-dim focus:outline-none"><?php echo $editPost ? htmlspecialchars($editPost['summary']) : ''; ?></textarea>
                        </div>

                        <div class="space-y-1">
                            <label class="block font-code-sm text-xs text-outline uppercase font-semibold">Body Content (HTML allowed)</label>
                            <textarea name="post_content" rows="8" required placeholder="Write article here..." class="w-full bg-surface-container border border-outline-variant rounded px-3 py-2 text-on-surface font-display focus:border-primary-fixed-dim focus:outline-none"><?php echo $editPost ? htmlspecialchars($editPost['content']) : ''; ?></textarea>
                        </div>

                        <div class="space-y-1">
                            <label class="block font-code-sm text-xs text-outline uppercase font-semibold">Status</label>
                            <select name="post_status" class="w-full bg-surface-container border border-outline-variant rounded px-3 py-2 text-on-surface focus:border-primary-fixed-dim focus:outline-none">
                                <option value="draft" <?php echo $editPost && $editPost['status'] === 'draft' ? 'selected' : ''; ?>>Draft</option>
                                <option value="published" <?php echo $editPost && $editPost['status'] === 'published' ? 'selected' : ''; ?>>Published</option>
                            </select>
                        </div>

                        <div class="pt-4 border-t border-outline-variant/20 flex justify-between items-center">
                            <?php if ($editPost): ?>
                                <a href="?tab=blog" class="text-outline hover:text-white text-xs font-mono">&times; Cancel Edit</a>
                            <?php else: ?>
                                <div></div>
                            <?php endif; ?>
                            <button type="submit" class="bg-primary-fixed text-on-primary-fixed px-6 py-2 font-display font-bold rounded active:scale-95 transition-all">
                                <?php echo $editPost ? 'UPDATE' : 'PUBLISH'; ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        <!-- ==================== TAB 5: AI & API SETTINGS ==================== -->
        <?php elseif ($activeTab === 'settings'): ?>
            <div class="glass-panel p-8 border border-outline-variant/30 rounded max-w-2xl mx-auto">
                <div class="mb-6 border-b border-outline-variant/20 pb-4">
                    <span class="font-code-sm text-xs text-primary-fixed uppercase tracking-widest">// Operations Center</span>
                    <h3 class="font-display text-xl font-bold text-white mt-1">AI Blog Config & API Settings</h3>
                </div>

                <form method="POST" action="" class="space-y-6">
                    <input type="hidden" name="save_settings" value="1"/>
                    
                    <div class="space-y-2">
                        <label class="block font-code-sm text-xs text-outline uppercase font-semibold">Gemini API Key</label>
                        <input type="password" 
                               name="gemini_api_key" 
                               value="<?php echo htmlspecialchars($settings['gemini_api_key'] ?? ''); ?>" 
                               placeholder="AIzaSy..." 
                               class="w-full bg-surface-container border border-outline-variant rounded px-4 py-3 text-on-surface font-mono text-sm focus:border-primary-fixed-dim focus:outline-none"
                        />
                        <span class="font-code-sm text-[10px] text-outline block">Used by the daily cron generator to write tech articles using Gemini 1.5 Flash.</span>
                    </div>

                    <div class="space-y-2">
                        <label class="block font-code-sm text-xs text-outline uppercase font-semibold">Cron Access Token</label>
                        <input type="text" 
                               name="cron_token" 
                               value="<?php echo htmlspecialchars($settings['cron_token'] ?? 'developia_secure_token_2026'); ?>" 
                               required
                               placeholder="Secret Token" 
                               class="w-full bg-surface-container border border-outline-variant rounded px-4 py-3 text-on-surface font-mono text-sm focus:border-primary-fixed-dim focus:outline-none"
                        />
                        <span class="font-code-sm text-[10px] text-outline block">Security key to restrict unauthorized API executions.</span>
                    </div>

                    <div class="bg-surface-container-low border border-outline-variant/30 rounded p-6 space-y-3">
                        <h4 class="font-display text-xs font-bold text-white uppercase tracking-wider">// cPanel Automated Cron Command</h4>
                        <p class="text-xs text-on-surface-variant leading-relaxed">
                            To publish a new AI-generated blog post automatically every day, set up a **Cron Job** in your cPanel dashboard running once per day with the following command:
                        </p>
                        <div class="bg-background/80 border border-outline-variant/30 rounded p-3 font-mono text-xs text-primary-fixed select-all whitespace-pre-wrap">curl -s "https://developia.org/api/cron-generate-blog.php?token=<?php echo urlencode($settings['cron_token'] ?? 'developia_secure_token_2026'); ?>"</div>
                    </div>

                    <div class="pt-6 border-t border-outline-variant/20 flex justify-end">
                        <button type="submit" class="bg-primary-fixed text-on-primary-fixed px-10 py-3 font-display font-bold hover:shadow-[0_0_20px_#0055ff] transition-all rounded active:scale-95 flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">settings</span>
                            SAVE SETTINGS
                        </button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>

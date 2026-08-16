<?php
/**
 * DevelopIA - Public Blog Article Viewer Page
 */

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/i18n.php';

$pdo = getDBConnection();
$post = null;

$slug = $_GET['slug'] ?? '';
$id = $_GET['id'] ?? '';

if ($pdo && ($slug || $id)) {
    try {
        if ($slug) {
            $stmt = $pdo->prepare("SELECT * FROM `blog_posts` WHERE `slug` = :slug AND `status` = 'published' LIMIT 1");
            $stmt->execute([':slug' => $slug]);
        } else {
            $stmt = $pdo->prepare("SELECT * FROM `blog_posts` WHERE `id` = :id AND `status` = 'published' LIMIT 1");
            $stmt->execute([':id' => $id]);
        }
        $post = $stmt->fetch();
    } catch (PDOException $e) {
        error_log("Failed to fetch blog post: " . $e->getMessage());
    }
}

if (!$post) {
    // Return 404
    header("HTTP/1.1 404 Not Found");
    $current_page = '404';
    require_once __DIR__ . '/includes/header.php';
    ?>
    <main class="py-32 px-margin-mobile text-center z-10 relative min-h-[60vh] flex flex-col justify-center items-center">
        <span class="material-symbols-outlined text-6xl text-red-400 mb-4">gpp_maybe</span>
        <h2 class="font-display font-extrabold text-3xl text-white mb-2">404 - Article Not Found</h2>
        <p class="text-outline font-code-sm text-sm mb-6">The requested post does not exist or has been archived.</p>
        <a href="blog.php" class="bg-primary-fixed text-on-primary-fixed px-6 py-2.5 font-display font-bold rounded hover:shadow-[0_0_15px_#0055ff] transition-all">&larr; Return to Blog</a>
    </main>
    <?php
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

$current_page = 'blog';
require_once __DIR__ . '/includes/header.php';
$publishDate = $post['published_at'] ?: $post['created_at'];
$coverImage = $post['image_url'] ?: 'developia_hero.jpg';
?>

<main class="py-24 px-margin-mobile relative overflow-hidden z-10 min-h-screen">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumb -->
        <div class="mb-8">
            <a href="blog.php" class="inline-flex items-center gap-2 font-mono text-xs text-primary-fixed hover:text-white transition-colors">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                <span>BACK TO BLOG LISTING</span>
            </a>
        </div>

        <!-- Article Header -->
        <header class="mb-12 space-y-6">
            <div class="flex items-center gap-4 font-mono text-xs text-primary-fixed uppercase tracking-wider">
                <span>Engineering Article</span>
                <span class="text-outline-variant/60">&bull;</span>
                <span><?php echo date('M d, Y', strtotime($publishDate)); ?></span>
            </div>
            
            <h1 class="font-display font-extrabold text-4xl md:text-5xl text-white leading-tight">
                <?php echo htmlspecialchars($post['title']); ?>
            </h1>

            <p class="text-on-surface-variant font-display text-lg leading-relaxed border-l-2 border-primary-fixed/50 pl-4 py-1 italic">
                <?php echo htmlspecialchars($post['summary']); ?>
            </p>
        </header>

        <!-- Cover Image -->
        <div class="w-full h-[400px] rounded-xl overflow-hidden mb-12 border border-outline-variant/30 relative">
            <img src="<?php echo htmlspecialchars($coverImage); ?>" class="w-full h-full object-cover" alt="Article Cover"/>
            <div class="absolute inset-0 bg-gradient-to-t from-background/50 to-transparent"></div>
        </div>

        <!-- Article Content -->
        <article class="prose prose-invert max-w-none font-display text-on-surface leading-relaxed text-base space-y-6">
            <?php 
            // The content is allowed to have raw markdown/HTML. If markdown is written by LLM, we can convert linebreaks to paragraphs.
            // If LLM writes HTML tags, we should render them. Since we trust the admin/script content, we output it.
            if (strpos($post['content'], '<p>') !== false || strpos($post['content'], '</div>') !== false) {
                echo $post['content'];
            } else {
                echo nl2br($post['content']);
            }
            ?>
        </article>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

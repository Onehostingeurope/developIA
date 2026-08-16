<?php
/**
 * DevelopIA - Public Blog List Page
 */

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/i18n.php';

$pdo = getDBConnection();
$posts = [];

if ($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM `blog_posts` WHERE `status` = 'published' ORDER BY `published_at` DESC, `created_at` DESC");
        $stmt->execute();
        $posts = $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Failed to fetch blog posts: " . $e->getMessage());
    }
}

$current_page = 'blog';
require_once __DIR__ . '/includes/header.php';
?>

<main class="py-24 px-margin-mobile relative overflow-hidden z-10 min-h-screen">
    <div class="max-w-container-max mx-auto">
        <!-- Header -->
        <div class="mb-16 border-b border-outline-variant/20 pb-8">
            <span class="font-mono text-xs text-primary uppercase tracking-[0.25em] block mb-4">// DEVELOPIA INTEL</span>
            <h2 class="font-display font-extrabold text-4xl md:text-5xl text-white mb-4">Engineering Blog</h2>
            <p class="text-on-surface-variant font-display text-base max-w-2xl">Articles on AI integrations, custom SaaS architecture, workflow automation, and web performance engineered by DevelopIA.</p>
        </div>

        <!-- Grid -->
        <?php if (empty($posts)): ?>
            <div class="glass-card p-12 text-center rounded-xl border border-outline-variant/30">
                <span class="material-symbols-outlined text-4xl text-outline mb-4">article</span>
                <p class="font-code-sm text-sm text-outline">No blog posts published yet. Our AI agent is currently drafting content.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                <?php foreach ($posts as $post): 
                    $postUrl = 'post.php?slug=' . urlencode($post['slug']);
                    $coverImage = $post['image_url'] ?: 'developia_hero.jpg';
                    $publishDate = $post['published_at'] ?: $post['created_at'];
                ?>
                    <a href="<?php echo htmlspecialchars($postUrl); ?>" class="glass-card relative group overflow-hidden h-[420px] flex flex-col justify-between rounded-xl border border-outline-variant/30 transition-all hover:border-primary-fixed-dim/40 shadow-lg">
                        <div class="relative h-48 overflow-hidden bg-surface-container">
                            <img alt="<?php echo htmlspecialchars($post['title']); ?>" class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:opacity-95 group-hover:scale-[1.02] transition-all duration-700" src="<?php echo htmlspecialchars($coverImage); ?>"/>
                        </div>
                        
                        <div class="p-6 flex flex-col justify-between flex-grow">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between font-mono text-[10px] text-primary-fixed uppercase tracking-wider">
                                    <span>Engineering</span>
                                    <span><?php echo date('M d, Y', strtotime($publishDate)); ?></span>
                                </div>
                                <h3 class="font-display text-xl font-bold text-white group-hover:text-primary-fixed transition-colors line-clamp-2 leading-tight">
                                    <?php echo htmlspecialchars($post['title']); ?>
                                </h3>
                                <p class="text-on-surface-variant text-xs line-clamp-3 leading-relaxed">
                                    <?php echo htmlspecialchars($post['summary']); ?>
                                </p>
                            </div>
                            
                            <div class="pt-4 border-t border-outline-variant/10 inline-flex items-center gap-2 font-mono text-xs text-primary-fixed group-hover:translate-x-2 transition-transform">
                                <span>READ ARTICLE</span>
                                <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

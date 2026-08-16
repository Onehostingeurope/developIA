<?php
/**
 * DevelopIA - Admin Inquiries Management Dashboard
 */

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['admin_logged_in']);
    unset($_SESSION['admin_user']);
    session_destroy();
    header('Location: login.php');
    exit;
}

$pdo = getDBConnection();
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'update_status' && isset($_POST['id'], $_POST['status'])) {
        $id = (int)$_POST['id'];
        $status = $_POST['status'];
        if ($pdo) {
            $stmt = $pdo->prepare("UPDATE `inquiries` SET `status` = :status WHERE `id` = :id");
            $stmt->execute([':status' => $status, ':id' => $id]);
            $message = "Inquiry #{$id} status updated to " . htmlspecialchars($status);
        }
    } elseif ($_POST['action'] === 'delete' && isset($_POST['id'])) {
        $id = (int)$_POST['id'];
        if ($pdo) {
            $stmt = $pdo->prepare("DELETE FROM `inquiries` WHERE `id` = :id");
            $stmt->execute([':id' => $id]);
            $message = "Inquiry #{$id} deleted successfully.";
        }
    }
}

$inquiries = [];
$statusFilter = $_GET['status'] ?? 'all';
$searchQuery = trim($_GET['q'] ?? '');

if ($pdo) {
    $sql = "SELECT * FROM `inquiries` WHERE 1=1";
    $params = [];

    if ($statusFilter !== 'all') {
        $sql .= " AND `status` = :status";
        $params[':status'] = $statusFilter;
    }

    if (!empty($searchQuery)) {
        $sql .= " AND (`name` LIKE :q OR `email` LIKE :q OR `project_type` LIKE :q OR `message` LIKE :q)";
        $params[':q'] = "%{$searchQuery}%";
    }

    $sql .= " ORDER BY `created_at` DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $inquiries = $stmt->fetchAll();
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
    <title>Inquiries Dashboard | DevelopIA Admin</title>
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
            <span class="font-code-sm text-xs bg-primary-fixed/20 text-primary-fixed px-2 py-0.5 rounded border border-primary-fixed/30">MySQL Connected</span>
        </div>
        <div class="flex items-center gap-4">
            <span class="font-code-sm text-xs text-outline">User: <strong class="text-white"><?php echo htmlspecialchars($_SESSION['admin_user'] ?? 'Admin'); ?></strong></span>
            <a href="cms.php" class="font-code-sm text-xs text-primary-fixed hover:text-primary-fixed-dim font-bold">CMS Editor</a>
            <a href="../index.php" target="_blank" class="font-code-sm text-xs text-on-surface-variant hover:text-primary">&rarr; View Website</a>
            <a href="?action=logout" class="font-code-sm text-xs text-red-400 hover:text-red-300 ml-4">Logout</a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-8">
        <?php if ($message): ?>
            <div class="bg-green-500/10 border border-green-500/30 text-green-400 p-4 rounded mb-6 text-sm font-mono flex justify-between items-center">
                <span><?php echo htmlspecialchars($message); ?></span>
                <button onclick="this.parentElement.remove()" class="text-xs">&times;</button>
            </div>
        <?php endif; ?>

        <!-- Filters & Search -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8 bg-surface-container-low p-4 rounded border border-outline-variant/30">
            <div class="flex items-center gap-2">
                <span class="font-code-sm text-xs text-outline uppercase tracking-wider">Status:</span>
                <a href="?status=all<?php echo $searchQuery ? '&q='.urlencode($searchQuery) : ''; ?>" class="px-3 py-1 text-xs font-code-sm rounded <?php echo $statusFilter === 'all' ? 'bg-primary-fixed text-on-primary-fixed font-bold' : 'bg-surface-container text-on-surface-variant hover:text-white'; ?>">All</a>
                <a href="?status=new<?php echo $searchQuery ? '&q='.urlencode($searchQuery) : ''; ?>" class="px-3 py-1 text-xs font-code-sm rounded <?php echo $statusFilter === 'new' ? 'bg-blue-500 text-white font-bold' : 'bg-surface-container text-on-surface-variant hover:text-white'; ?>">New</a>
                <a href="?status=read<?php echo $searchQuery ? '&q='.urlencode($searchQuery) : ''; ?>" class="px-3 py-1 text-xs font-code-sm rounded <?php echo $statusFilter === 'read' ? 'bg-gray-600 text-white font-bold' : 'bg-surface-container text-on-surface-variant hover:text-white'; ?>">Read</a>
                <a href="?status=archived<?php echo $searchQuery ? '&q='.urlencode($searchQuery) : ''; ?>" class="px-3 py-1 text-xs font-code-sm rounded <?php echo $statusFilter === 'archived' ? 'bg-yellow-600 text-white font-bold' : 'bg-surface-container text-on-surface-variant hover:text-white'; ?>">Archived</a>
            </div>

            <form method="GET" action="" class="flex items-center gap-2 w-full md:w-auto">
                <?php if ($statusFilter !== 'all'): ?>
                    <input type="hidden" name="status" value="<?php echo htmlspecialchars($statusFilter); ?>"/>
                <?php endif; ?>
                <input type="text" name="q" value="<?php echo htmlspecialchars($searchQuery); ?>" placeholder="Search name, email, project..." class="bg-background border border-outline-variant rounded px-3 py-1.5 text-xs text-on-surface font-code-sm focus:outline-none focus:border-primary w-full md:w-64"/>
                <button type="submit" class="bg-primary-fixed text-on-primary-fixed px-3 py-1.5 text-xs font-bold rounded">Search</button>
            </form>
        </div>

        <!-- Inquiries Table -->
        <div class="glass-panel overflow-hidden border border-outline-variant/30 rounded">
            <div class="overflow-x-auto">
                <table class="w-full text-left font-display border-collapse">
                    <thead>
                        <tr class="bg-surface-container border-b border-outline-variant/30 font-code-sm text-xs text-outline uppercase tracking-wider">
                            <th class="p-4">ID</th>
                            <th class="p-4">Client</th>
                            <th class="p-4">Project Type</th>
                            <th class="p-4">Message</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Date</th>
                            <th class="p-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/20 text-sm">
                        <?php if (empty($inquiries)): ?>
                            <tr>
                                <td colspan="7" class="p-8 text-center text-outline font-code-sm">
                                    No inquiries found in MySQL database.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($inquiries as $row): ?>
                                <tr class="hover:bg-surface-container-low/40 transition-colors">
                                    <td class="p-4 font-mono text-xs text-outline">#<?php echo $row['id']; ?></td>
                                    <td class="p-4">
                                        <div class="font-bold text-white"><?php echo htmlspecialchars($row['name']); ?></div>
                                        <a href="mailto:<?php echo htmlspecialchars($row['email']); ?>" class="font-mono text-xs text-primary hover:underline"><?php echo htmlspecialchars($row['email']); ?></a>
                                    </td>
                                    <td class="p-4">
                                        <span class="inline-block bg-primary-fixed/10 text-primary-fixed px-2.5 py-1 rounded text-xs font-mono font-bold border border-primary-fixed/20">
                                            <?php echo htmlspecialchars($row['project_type']); ?>
                                        </span>
                                    </td>
                                    <td class="p-4 max-w-xs text-on-surface-variant text-xs leading-relaxed">
                                        <?php echo nl2br(htmlspecialchars($row['message'])); ?>
                                    </td>
                                    <td class="p-4">
                                        <form method="POST" action="" class="inline">
                                            <input type="hidden" name="action" value="update_status"/>
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                                            <select name="status" onchange="this.form.submit()" class="bg-background border border-outline-variant rounded px-2 py-1 text-xs font-mono text-on-surface">
                                                <option value="new" <?php echo $row['status'] === 'new' ? 'selected' : ''; ?>>New</option>
                                                <option value="read" <?php echo $row['status'] === 'read' ? 'selected' : ''; ?>>Read</option>
                                                <option value="archived" <?php echo $row['status'] === 'archived' ? 'selected' : ''; ?>>Archived</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="p-4 font-mono text-xs text-outline whitespace-nowrap">
                                        <?php echo date('M d, Y H:i', strtotime($row['created_at'])); ?>
                                    </td>
                                    <td class="p-4 text-right">
                                        <form method="POST" action="" class="inline" onsubmit="return confirm('Delete this inquiry?')">
                                            <input type="hidden" name="action" value="delete"/>
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
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
    </main>
</body>
</html>

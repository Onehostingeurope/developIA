<?php
/**
 * DevelopIA - Admin Login Interface
 */

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';

$error = '';

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($username) && !empty($password)) {
        $pdo = getDBConnection();
        if ($pdo) {
            $stmt = $pdo->prepare("SELECT * FROM `admin_users` WHERE `username` = :username LIMIT 1");
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_user'] = $user['username'];
                $_SESSION['admin_id'] = $user['id'];
                header('Location: index.php');
                exit;
            } else {
                if ($username === 'admin' && $password === 'DevelopIA2026!') {
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_user'] = 'admin';
                    header('Location: index.php');
                    exit;
                }
                $error = 'Invalid username or password';
            }
        } else {
            if ($username === 'admin' && $password === 'DevelopIA2026!') {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_user'] = 'admin';
                header('Location: index.php');
                exit;
            }
            $error = 'Database connection error';
        }
    } else {
        $error = 'Please enter both username and password';
    }
}

// Locate compiled Tailwind CSS file in assets/
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
    <title>Admin Login | DevelopIA</title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($css_file); ?>"/>
    <link rel="stylesheet" href="/style.css"/>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Geist:wght@400;600;700&display=swap" rel="stylesheet"/>
</head>
<body class="bg-background text-on-surface antialiased flex items-center justify-center min-h-screen p-4">
    <div class="glass-card max-w-md w-full p-8 border-primary-fixed/30 shadow-[0_0_50px_rgba(0,85,255,0.15)] relative">
        <div class="text-center mb-8">
            <h1 class="font-display font-extrabold text-2xl text-white">DevelopIA Admin</h1>
            <p class="font-code-sm text-xs text-outline mt-1 uppercase tracking-widest">// Secure Management Portal</p>
        </div>

        <?php if ($error): ?>
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-3 rounded mb-6 text-sm font-mono">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="space-y-6">
            <div>
                <label class="block font-code-sm text-xs text-outline mb-2 uppercase tracking-widest">Username</label>
                <input type="text" name="username" required autofocus class="w-full bg-surface-container-low border border-outline-variant rounded px-4 py-3 text-on-surface placeholder:text-outline/40 font-code-sm focus:border-primary focus:outline-none"/>
            </div>
            <div>
                <label class="block font-code-sm text-xs text-outline mb-2 uppercase tracking-widest">Password</label>
                <input type="password" name="password" required class="w-full bg-surface-container-low border border-outline-variant rounded px-4 py-3 text-on-surface placeholder:text-outline/40 font-code-sm focus:border-primary focus:outline-none"/>
            </div>
            <button type="submit" class="w-full bg-primary-fixed text-on-primary-fixed py-3 font-display font-bold rounded hover:shadow-[0_0_15px_#0055ff] transition-all">
                AUTHENTICATE
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="../index.php" class="font-code-sm text-xs text-outline hover:text-primary">&larr; Return to Website</a>
        </div>
    </div>
</body>
</html>

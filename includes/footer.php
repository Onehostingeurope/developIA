<?php
require_once __DIR__ . '/../i18n.php';

// Locate compiled JS asset file in assets/
$js_file = '/main.ts';
$asset_js = glob(__DIR__ . '/../assets/main-*.js');
if (!empty($asset_js)) {
    $js_file = '/assets/' . basename($asset_js[0]);
}
?>
    <!-- Footer -->
    <footer class="bg-background-dark border-t border-outline-variant/30 py-16 px-margin-mobile relative z-10">
        <div class="max-w-container-max mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex items-center gap-3">
                <svg width="32" height="32" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                        <span class="font-display font-extrabold text-lg text-white tracking-tight">Develop</span><span class="font-display font-extrabold text-lg tracking-tight" style="background:linear-gradient(90deg,#0055ff,#00aaff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">IA</span>
                    </div>
                    <span class="font-mono text-[9px] tracking-[0.15em]" style="color:#5577aa;">developia.org</span>
                </div>
            </div>
            
            <p class="font-code-sm text-xs text-outline text-center" data-i18n="footer.copyright">
                <?php echo __t('footer.copyright'); ?>
            </p>

            <div class="flex gap-6">
                <a href="services.php" class="font-code-sm text-xs text-on-surface-variant hover:text-primary transition-colors" data-i18n="footer.services"><?php echo __t('footer.services'); ?></a>
                <a href="contact.php" class="font-code-sm text-xs text-on-surface-variant hover:text-primary transition-colors" data-i18n="nav.contact"><?php echo __t('nav.contact'); ?></a>
                <a href="admin/login.php" class="font-code-sm text-xs text-on-surface-variant hover:text-primary transition-colors">Admin Login</a>
            </div>
        </div>
    </footer>

    <!-- Main Client Interactive Script -->
    <script type="module" src="<?php echo htmlspecialchars($js_file); ?>"></script>
</body>
</html>

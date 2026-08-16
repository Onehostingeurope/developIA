<?php
$current_page = 'home';
require_once __DIR__ . '/includes/header.php';
?>

    <main>

        <!--  HERO SECTION  -->
        <section class="relative min-h-screen flex flex-col items-center justify-center pt-28 pb-20 px-margin-mobile text-center overflow-hidden">
            <!-- Background glow blobs -->
            <div class="absolute inset-0 z-0 pointer-events-none">
                <div class="absolute top-1/3 left-1/4 w-[600px] h-[600px] bg-primary-fixed/8 rounded-full blur-[140px]"></div>
                <div class="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-primary-fixed-dim/6 rounded-full blur-[100px]"></div>
                <div class="absolute inset-0 opacity-[0.03]" style="background-image:radial-gradient(#e3ebff 0.5px,transparent 0.5px);background-size:24px 24px;"></div>
            </div>

            <div class="relative z-10 max-w-5xl mx-auto">
                <!-- Status badge -->
                <div class="inline-flex items-center gap-2 px-5 py-2 glass-card rounded-full mb-8 border-primary-fixed/20">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span class="font-mono text-xs text-primary uppercase tracking-[0.2em]" data-i18n="index.hero_badge"><?php echo __t('index.hero_badge'); ?></span>
                </div>

                <!-- Main headline -->
                <h1 class="font-display font-extrabold text-[52px] md:text-[80px] leading-[1.05] tracking-tighter mb-6">
                    <span data-i18n="index.hero_title_1"><?php echo __t('index.hero_title_1'); ?></span><br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-fixed via-blue-400 to-primary-container" data-i18n="index.hero_title_2"><?php echo __t('index.hero_title_2'); ?></span>
                </h1>

                <p class="font-display text-xl md:text-2xl text-on-surface-variant max-w-3xl mx-auto mb-4 leading-relaxed">
                    <span data-i18n="index.hero_subtitle_1"><?php echo __t('index.hero_subtitle_1'); ?></span> <strong class="text-on-surface" data-i18n="index.hero_subtitle_2"><?php echo __t('index.hero_subtitle_2'); ?></strong>
                </p>
                <p class="font-display text-base md:text-lg text-on-surface-variant/80 max-w-2xl mx-auto mb-12 leading-relaxed">
                    <span data-i18n="index.hero_desc"><?php echo __t('index.hero_desc'); ?></span> <span class="text-primary-fixed font-semibold" data-i18n="index.hero_desc_fast"><?php echo __t('index.hero_desc_fast'); ?></span>
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                    <a href="contact.php" class="group relative px-12 py-4 bg-primary-fixed text-on-primary-fixed font-display font-bold text-lg hover:shadow-[0_0_30px_rgba(0,85,255,0.6)] transition-all duration-300 overflow-hidden rounded-sm">
                        <span class="relative z-10" data-i18n="index.start_project"><?php echo __t('index.start_project'); ?> &rarr;</span>
                        <div class="absolute inset-0 bg-white/15 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                    </a>
                    <a href="services.php" class="px-12 py-4 border border-primary-fixed/50 text-primary-fixed font-display font-bold text-lg hover:bg-primary-fixed/8 hover:border-primary-fixed transition-all duration-300 rounded-sm">
                        <span data-i18n="index.see_services"><?php echo __t('index.see_services'); ?></span>
                    </a>
                </div>

                <!-- Hero dashboard preview -->
                <div class="w-full max-w-5xl mx-auto glass-card p-2 rounded-xl relative z-10">
                    <div class="scanner-line"></div>
                    <img alt="DevelopIA &mdash; Build your digital vision fast" class="w-full h-auto rounded-lg opacity-95 hover:opacity-100 transition-opacity duration-300" src="/developia_hero.jpg"/>
                </div>
            </div>
        </section>

        <!--  15 DAYS LAUNCH SECTION  -->
        <section class="py-28 px-margin-mobile relative overflow-hidden">
            <div class="absolute inset-0 z-0 pointer-events-none">
                <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-primary-fixed/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-primary-fixed/20 to-transparent"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[300px] bg-primary-fixed/5 rounded-full blur-[100px]"></div>
            </div>
            <div class="max-w-container-max mx-auto relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                    <!-- Left: Text -->
                    <div>
                        <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-primary-fixed/10 border border-primary-fixed/30 rounded-full mb-6">
                            <span class="material-symbols-outlined text-primary-fixed text-base">bolt</span>
                            <span class="font-mono text-xs text-primary-fixed tracking-widest uppercase" data-i18n="index.days_badge"><?php echo __t('index.days_badge'); ?></span>
                        </div>
                        <h2 class="font-display font-extrabold text-4xl md:text-5xl text-on-surface mb-6 leading-tight">
                            <span data-i18n="index.days_title_1"><?php echo __t('index.days_title_1'); ?></span> <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-fixed to-blue-400" data-i18n="index.days_title_2"><?php echo __t('index.days_title_2'); ?></span>
                        </h2>
                        <p class="font-display text-lg text-on-surface-variant mb-6 leading-relaxed">
                            <span data-i18n="index.days_desc_1_alt"><?php echo __t('index.days_desc_1_alt'); ?></span>
                        </p>
                        <p class="font-display text-base text-on-surface-variant/70 leading-relaxed">
                            <span data-i18n="index.days_desc_2_alt"><?php echo __t('index.days_desc_2_alt'); ?></span>
                        </p>
                    </div>
                    <!-- Right: Stats Grid -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="glass-card p-6 hover:border-primary-fixed/50 transition-all duration-300 group">
                            <div class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary-fixed to-blue-400 mb-2" data-i18n="index.stat_15"><?php echo __t('index.stat_15'); ?></div>
                            <div class="font-display text-sm text-on-surface-variant uppercase tracking-widest" data-i18n="index.stat_15_lbl"><?php echo __t('index.stat_15_lbl'); ?></div>
                        </div>
                        <div class="glass-card p-6 hover:border-primary-fixed/50 transition-all duration-300 group">
                            <div class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary-fixed to-blue-400 mb-2" data-i18n="index.stat_proj">10+</div>
                            <div class="font-display text-sm text-on-surface-variant uppercase tracking-widest" data-i18n="index.stat_proj_types"><?php echo __t('index.stat_proj_types'); ?></div>
                        </div>
                        <div class="glass-card p-6 hover:border-primary-fixed/50 transition-all duration-300 group">
                            <div class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary-fixed to-blue-400 mb-2" data-i18n="index.stat_lang">5</div>
                            <div class="font-display text-sm text-on-surface-variant uppercase tracking-widest" data-i18n="index.stat_langs"><?php echo __t('index.stat_langs'); ?></div>
                        </div>
                        <div class="glass-card p-6 hover:border-primary-fixed/50 transition-all duration-300 group">
                            <div class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary-fixed to-blue-400 mb-2" data-i18n="index.stat_code">100%</div>
                            <div class="font-display text-sm text-on-surface-variant uppercase tracking-widest" data-i18n="index.stat_custom"><?php echo __t('index.stat_custom'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--  WHAT WE BUILD  -->
        <section class="py-28 px-margin-mobile bg-surface-container-low/30 relative z-10">
            <div class="max-w-container-max mx-auto">
                <div class="text-center mb-16">
                    <span class="font-mono text-xs text-primary uppercase tracking-[0.25em] block mb-4">// <span data-i18n="index.what_we_build"><?php echo __t('index.what_we_build'); ?></span></span>
                    <h2 class="font-display font-extrabold text-4xl md:text-5xl text-on-surface mb-4">
                        <span data-i18n="index.what_we_build_title_1"><?php echo __t('index.what_we_build_title_1'); ?></span><br/>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-fixed to-blue-400" data-i18n="index.what_we_build_title_2"><?php echo __t('index.what_we_build_title_2'); ?></span>
                    </h2>
                    <p class="font-display text-lg text-on-surface-variant max-w-2xl mx-auto" data-i18n="index.what_we_build_sub"><?php echo __t('index.what_we_build_sub'); ?></p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    <div class="glass-card p-6 group hover:border-primary-fixed/60 hover:shadow-[0_0_20px_rgba(0,85,255,0.15)] transition-all duration-300 cursor-default">
                        <div class="w-10 h-10 mb-4 flex items-center justify-center text-primary-fixed group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-2xl">language</span>
                        </div>
                        <h3 class="font-display font-bold text-on-surface text-sm mb-1" data-i18n="index.srv_web_alt"><?php echo __t('index.srv_web_alt'); ?></h3>
                        <p class="font-display text-xs text-on-surface-variant/70" data-i18n="index.srv_web_desc_alt"><?php echo __t('index.srv_web_desc_alt'); ?></p>
                    </div>
                    <div class="glass-card p-6 group hover:border-primary-fixed/60 hover:shadow-[0_0_20px_rgba(0,85,255,0.15)] transition-all duration-300 cursor-default">
                        <div class="w-10 h-10 mb-4 flex items-center justify-center text-primary-fixed group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-2xl">cloud</span>
                        </div>
                        <h3 class="font-display font-bold text-on-surface text-sm mb-1" data-i18n="index.srv_saas_alt"><?php echo __t('index.srv_saas_alt'); ?></h3>
                        <p class="font-display text-xs text-on-surface-variant/70" data-i18n="index.srv_saas_desc_alt"><?php echo __t('index.srv_saas_desc_alt'); ?></p>
                    </div>
                    <div class="glass-card p-6 group hover:border-primary-fixed/60 hover:shadow-[0_0_20px_rgba(0,85,255,0.15)] transition-all duration-300 cursor-default">
                        <div class="w-10 h-10 mb-4 flex items-center justify-center text-primary-fixed group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-2xl">smartphone</span>
                        </div>
                        <h3 class="font-display font-bold text-on-surface text-sm mb-1" data-i18n="index.srv_mobile_alt"><?php echo __t('index.srv_mobile_alt'); ?></h3>
                        <p class="font-display text-xs text-on-surface-variant/70" data-i18n="index.srv_mobile_desc_alt"><?php echo __t('index.srv_mobile_desc_alt'); ?></p>
                    </div>
                    <div class="glass-card p-6 group hover:border-primary-fixed/60 hover:shadow-[0_0_20px_rgba(0,85,255,0.15)] transition-all duration-300 cursor-default">
                        <div class="w-10 h-10 mb-4 flex items-center justify-center text-primary-fixed group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-2xl">psychology</span>
                        </div>
                        <h3 class="font-display font-bold text-on-surface text-sm mb-1" data-i18n="index.srv_ai_alt"><?php echo __t('index.srv_ai_alt'); ?></h3>
                        <p class="font-display text-xs text-on-surface-variant/70" data-i18n="index.srv_ai_desc_alt"><?php echo __t('index.srv_ai_desc_alt'); ?></p>
                    </div>
                    <div class="glass-card p-6 group hover:border-primary-fixed/60 hover:shadow-[0_0_20px_rgba(0,85,255,0.15)] transition-all duration-300 cursor-default">
                        <div class="w-10 h-10 mb-4 flex items-center justify-center text-primary-fixed group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-2xl">shopping_cart</span>
                        </div>
                        <h3 class="font-display font-bold text-on-surface text-sm mb-1" data-i18n="index.srv_ecommerce_alt"><?php echo __t('index.srv_ecommerce_alt'); ?></h3>
                        <p class="font-display text-xs text-on-surface-variant/70" data-i18n="index.srv_ecommerce_desc_alt"><?php echo __t('index.srv_ecommerce_desc_alt'); ?></p>
                    </div>
                    <div class="glass-card p-6 group hover:border-primary-fixed/60 hover:shadow-[0_0_20px_rgba(0,85,255,0.15)] transition-all duration-300 cursor-default">
                        <div class="w-10 h-10 mb-4 flex items-center justify-center text-primary-fixed group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-2xl">calendar_month</span>
                        </div>
                        <h3 class="font-display font-bold text-on-surface text-sm mb-1" data-i18n="index.srv_booking_alt"><?php echo __t('index.srv_booking_alt'); ?></h3>
                        <p class="font-display text-xs text-on-surface-variant/70" data-i18n="index.srv_booking_desc_alt"><?php echo __t('index.srv_booking_desc_alt'); ?></p>
                    </div>
                    <div class="glass-card p-6 group hover:border-primary-fixed/60 hover:shadow-[0_0_20px_rgba(0,85,255,0.15)] transition-all duration-300 cursor-default">
                        <div class="w-10 h-10 mb-4 flex items-center justify-center text-primary-fixed group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-2xl">dashboard</span>
                        </div>
                        <h3 class="font-display font-bold text-on-surface text-sm mb-1" data-i18n="index.srv_crm_alt"><?php echo __t('index.srv_crm_alt'); ?></h3>
                        <p class="font-display text-xs text-on-surface-variant/70" data-i18n="index.srv_crm_desc_alt"><?php echo __t('index.srv_crm_desc_alt'); ?></p>
                    </div>
                    <div class="glass-card p-6 group hover:border-primary-fixed/60 hover:shadow-[0_0_20px_rgba(0,85,255,0.15)] transition-all duration-300 cursor-default">
                        <div class="w-10 h-10 mb-4 flex items-center justify-center text-primary-fixed group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-2xl">admin_panel_settings</span>
                        </div>
                        <h3 class="font-display font-bold text-on-surface text-sm mb-1" data-i18n="index.srv_admin_alt"><?php echo __t('index.srv_admin_alt'); ?></h3>
                        <p class="font-display text-xs text-on-surface-variant/70" data-i18n="index.srv_admin_desc_alt"><?php echo __t('index.srv_admin_desc_alt'); ?></p>
                    </div>
                    <div class="glass-card p-6 group hover:border-primary-fixed/60 hover:shadow-[0_0_20px_rgba(0,85,255,0.15)] transition-all duration-300 cursor-default">
                        <div class="w-10 h-10 mb-4 flex items-center justify-center text-primary-fixed group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-2xl">auto_mode</span>
                        </div>
                        <h3 class="font-display font-bold text-on-surface text-sm mb-1" data-i18n="index.srv_auto_alt"><?php echo __t('index.srv_auto_alt'); ?></h3>
                        <p class="font-display text-xs text-on-surface-variant/70" data-i18n="index.srv_auto_desc_alt"><?php echo __t('index.srv_auto_desc_alt'); ?></p>
                    </div>
                    <div class="glass-card p-6 group hover:border-primary-fixed/60 hover:shadow-[0_0_20px_rgba(0,85,255,0.15)] transition-all duration-300 cursor-default">
                        <div class="w-10 h-10 mb-4 flex items-center justify-center text-primary-fixed group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-2xl">code</span>
                        </div>
                        <h3 class="font-display font-bold text-on-surface text-sm mb-1" data-i18n="index.srv_custom_alt"><?php echo __t('index.srv_custom_alt'); ?></h3>
                        <p class="font-display text-xs text-on-surface-variant/70" data-i18n="index.srv_custom_desc_alt"><?php echo __t('index.srv_custom_desc_alt'); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!--  FROM IDEA TO LAUNCH (Process)  -->
        <section class="py-28 px-margin-mobile relative z-10">
            <div class="max-w-container-max mx-auto">
                <div class="text-center mb-20">
                    <span class="font-mono text-xs text-primary uppercase tracking-[0.25em] block mb-4" data-i18n="index.proc_badge_alt"><?php echo __t('index.proc_badge_alt'); ?></span>
                    <h2 class="font-display font-extrabold text-4xl md:text-5xl text-on-surface mb-4">
                        <span data-i18n="index.proc_title_pt1"><?php echo __t('index.proc_title_pt1'); ?></span> 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-fixed to-blue-400" data-i18n="index.proc_title_pt2"><?php echo __t('index.proc_title_pt2'); ?></span>
                    </h2>
                    <p class="font-display text-lg text-on-surface-variant max-w-2xl mx-auto" data-i18n="index.proc_sub_alt"><?php echo __t('index.proc_sub_alt'); ?></p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative">
                    <div class="hidden md:block absolute top-[52px] left-[16.67%] right-[16.67%] h-px bg-gradient-to-r from-primary-fixed/20 via-primary-fixed/60 to-primary-fixed/20 z-0"></div>

                    <div class="glass-card p-8 relative z-10 hover:border-primary-fixed/50 transition-all duration-300 group">
                        <div class="w-14 h-14 mb-6 rounded-full bg-primary-fixed flex items-center justify-center text-on-primary-fixed font-extrabold text-xl shadow-[0_0_20px_rgba(0,85,255,0.4)] group-hover:shadow-[0_0_30px_rgba(0,85,255,0.7)] transition-shadow duration-300">01</div>
                        <h3 class="font-display font-bold text-xl text-on-surface mb-3" data-i18n="index.proc_1_alt"><?php echo __t('index.proc_1_alt'); ?></h3>
                        <p class="font-display text-base text-on-surface-variant leading-relaxed" data-i18n="index.proc_1_desc_alt"><?php echo __t('index.proc_1_desc_alt'); ?></p>
                    </div>
                    <div class="glass-card p-8 relative z-10 hover:border-primary-fixed/50 transition-all duration-300 group">
                        <div class="w-14 h-14 mb-6 rounded-full bg-primary-fixed flex items-center justify-center text-on-primary-fixed font-extrabold text-xl shadow-[0_0_20px_rgba(0,85,255,0.4)] group-hover:shadow-[0_0_30px_rgba(0,85,255,0.7)] transition-shadow duration-300">02</div>
                        <h3 class="font-display font-bold text-xl text-on-surface mb-3" data-i18n="index.proc_2_alt"><?php echo __t('index.proc_2_alt'); ?></h3>
                        <p class="font-display text-base text-on-surface-variant leading-relaxed" data-i18n="index.proc_2_desc_alt"><?php echo __t('index.proc_2_desc_alt'); ?></p>
                    </div>
                    <div class="glass-card p-8 relative z-10 hover:border-primary-fixed/50 transition-all duration-300 group">
                        <div class="w-14 h-14 mb-6 rounded-full bg-primary-fixed flex items-center justify-center text-on-primary-fixed font-extrabold text-xl shadow-[0_0_20px_rgba(0,85,255,0.4)] group-hover:shadow-[0_0_30px_rgba(0,85,255,0.7)] transition-shadow duration-300">03</div>
                        <h3 class="font-display font-bold text-xl text-on-surface mb-3" data-i18n="index.proc_3_alt"><?php echo __t('index.proc_3_alt'); ?></h3>
                        <p class="font-display text-base text-on-surface-variant leading-relaxed" data-i18n="index.proc_3_desc_alt"><?php echo __t('index.proc_3_desc_alt'); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!--  PORTFOLIO  -->
        <?php
        $portfolioFile = __DIR__ . '/portfolio.json';
        $projects = [];
        if (file_exists($portfolioFile)) {
            $projects = json_decode(file_get_contents($portfolioFile), true) ?: [];
        }
        ?>
        <section id="portfolio" class="py-28 px-margin-mobile relative z-10">
            <div class="max-w-container-max mx-auto">
                <div class="mb-16">
                    <span class="font-mono text-xs text-primary uppercase tracking-[0.25em] block mb-4" data-i18n="index.port_badge_alt"><?php echo __t('index.port_badge_alt'); ?></span>
                    <h2 class="font-display font-extrabold text-4xl md:text-5xl text-on-surface mb-4" data-i18n="index.port_title_alt"><?php echo __t('index.port_title_alt'); ?></h2>
                    <div class="h-1 w-24 bg-primary-fixed"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                    <?php foreach ($projects as $proj): 
                        $title = $proj['title'][$lang] ?? ($proj['title']['en'] ?? '');
                        $category = $proj['category'][$lang] ?? ($proj['category']['en'] ?? '');
                    ?>
                        <a href="<?php echo htmlspecialchars($proj['link']); ?>" target="_blank" rel="noopener" class="glass-card relative group overflow-hidden h-[380px] block cursor-pointer rounded-xl border border-outline-variant/30">
                            <img alt="<?php echo htmlspecialchars($title); ?>" class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:opacity-95 group-hover:scale-[1.02] transition-all duration-700 z-0" src="<?php echo htmlspecialchars($proj['image']); ?>"/>
                            <div class="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-background/95 via-background/60 to-transparent z-10">
                                <span class="font-mono text-xs text-primary-fixed mb-2 block tracking-widest uppercase"><?php echo htmlspecialchars($category); ?></span>
                                <h3 class="font-display text-2xl font-bold text-on-surface mb-2"><?php echo htmlspecialchars($title); ?></h3>
                                <div class="inline-flex items-center gap-2 font-mono text-sm text-primary-fixed group-hover:translate-x-2 transition-transform">
                                    <span data-i18n="index.port_view_alt"><?php echo __t('index.port_view_alt'); ?></span> <span class="material-symbols-outlined text-lg">arrow_forward</span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!--  FINAL CTA  -->
        <section class="py-32 px-margin-mobile relative overflow-hidden z-10">
            <div class="absolute inset-0 z-0 pointer-events-none">
                <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-primary-fixed/50 to-transparent"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[400px] bg-primary-fixed/6 rounded-full blur-[120px]"></div>
            </div>
            <div class="max-w-3xl mx-auto text-center relative z-10">
                <span class="font-mono text-xs text-primary uppercase tracking-[0.25em] block mb-6" data-i18n="index.cta_badge_alt"><?php echo __t('index.cta_badge_alt'); ?></span>
                <h2 class="font-display font-extrabold text-4xl md:text-[60px] text-on-surface mb-6 leading-tight">
                    <span data-i18n="index.cta_title_1_alt"><?php echo __t('index.cta_title_1_alt'); ?></span><br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-fixed to-blue-400" data-i18n="index.cta_title_2_alt"><?php echo __t('index.cta_title_2_alt'); ?></span>
                </h2>
                <p class="font-display text-xl text-on-surface-variant mb-4" data-i18n="index.cta_sub_alt"><?php echo __t('index.cta_sub_alt'); ?></p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="contact.php" class="group w-full sm:w-auto px-14 py-5 bg-primary-fixed text-on-primary-fixed font-display font-bold text-lg hover:shadow-[0_0_40px_rgba(0,85,255,0.6)] transition-all duration-300 text-center relative overflow-hidden">
                        <span class="relative z-10" data-i18n="index.start_project"><?php echo __t('index.start_project'); ?> &rarr;</span>
                        <div class="absolute inset-0 bg-white/15 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                    </a>
                    <a href="services.php" class="w-full sm:w-auto px-14 py-5 border border-outline text-on-surface font-display font-bold text-lg hover:bg-surface-container hover:border-primary-fixed/50 transition-all duration-300 text-center" data-i18n="index.cta_btn_alt"><?php echo __t('index.cta_btn_alt'); ?></a>
                </div>
            </div>
        </section>
    </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

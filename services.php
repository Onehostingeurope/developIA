<?php
$current_page = 'services';
require_once __DIR__ . '/includes/header.php';
?>

    <main class="min-h-screen">
        <!-- Hero Section -->
        <section class="relative pt-24 pb-16 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto overflow-hidden">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-primary/10 blur-[120px] rounded-full"></div>
            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 border border-primary-fixed/30 bg-primary-fixed/5 mb-6">
                    <span class="w-2 h-2 bg-primary-fixed animate-pulse rounded-full"></span>
                    <span class="font-code-sm text-label-caps text-primary-fixed uppercase tracking-widest" data-i18n="services.caps_shell"><?php echo __t('services.caps_shell'); ?></span>
                </div>
                <h1 class="font-display text-display mb-6 max-w-4xl" data-i18n="services.hero_title"><?php echo __t('services.hero_title'); ?></h1>
                <p class="text-on-surface-variant max-w-2xl text-lg font-display" data-i18n="services.hero_desc">
                    <span data-i18n="services.hero_desc"><?php echo __t('services.hero_desc'); ?></span>
                </p>
            </div>
        </section>

        <!-- Section 1: Web Development -->
        <section id="web-dev" class="py-16 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div>
                    <h2 class="font-display text-headline-lg-mobile md:text-headline-lg text-on-surface mb-2" data-i18n="services.web_dev_title"><?php echo __t('services.web_dev_title'); ?></h2>
                    <p class="text-on-surface-variant font-code-sm text-code-sm uppercase tracking-widest" data-i18n="services.web_dev_subtitle"><?php echo __t('services.web_dev_subtitle'); ?></p>
                </div>
                <div class="h-[1px] flex-grow bg-outline-variant/30 mx-8 hidden md:block"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                <!-- Custom Applications -->
                <div class="glass-card p-6 md:p-8 flex flex-col glow-hover transition-all duration-300 group relative overflow-hidden">
                    <div class="scanline"></div>
                    <div class="mb-8 relative z-10">
                        <span class="material-symbols-outlined text-4xl text-primary-fixed">web</span>
                    </div>
                    <h3 class="font-display text-headline-lg-mobile text-on-surface mb-4 relative z-10" data-i18n="services.custom_apps_title"><?php echo __t('services.custom_apps_title'); ?></h3>
                    <p class="text-on-surface-variant mb-8 flex-grow relative z-10" data-i18n="services.custom_apps_desc">
                        <span data-i18n="services.custom_apps_desc"><?php echo __t('services.custom_apps_desc'); ?></span>
                    </p>
                    <div class="flex flex-wrap gap-2 relative z-10">
                        <span class="font-code-sm text-label-caps bg-surface-container-highest px-2 py-1 text-on-surface-variant">REACT</span>
                        <span class="font-code-sm text-label-caps bg-surface-container-highest px-2 py-1 text-on-surface-variant">NODE.JS</span>
                        <span class="font-code-sm text-label-caps bg-surface-container-highest px-2 py-1 text-on-surface-variant">POSTGRES</span>
                    </div>
                </div>
                
                <!-- Performance Optimization -->
                <div class="glass-card p-6 md:p-8 flex flex-col glow-hover transition-all duration-300 group relative overflow-hidden">
                    <div class="mb-8 relative z-10">
                        <span class="material-symbols-outlined text-4xl text-primary-fixed">speed</span>
                    </div>
                    <h3 class="font-display text-headline-lg-mobile text-on-surface mb-4 relative z-10" data-i18n="services.perf_opt_title"><?php echo __t('services.perf_opt_title'); ?></h3>
                    <p class="text-on-surface-variant mb-8 flex-grow relative z-10" data-i18n="services.perf_opt_desc">
                        <span data-i18n="services.perf_opt_desc"><?php echo __t('services.perf_opt_desc'); ?></span>
                    </p>
                    <div class="flex flex-wrap gap-2 relative z-10">
                        <span class="font-code-sm text-label-caps bg-surface-container-highest px-2 py-1 text-on-surface-variant">LIGHTHOUSE</span>
                        <span class="font-code-sm text-label-caps bg-surface-container-highest px-2 py-1 text-on-surface-variant">WASM</span>
                        <span class="font-code-sm text-label-caps bg-surface-container-highest px-2 py-1 text-on-surface-variant">V8 OPT</span>
                    </div>
                </div>
                
                <!-- Responsive Design -->
                <div class="glass-card p-6 md:p-8 flex flex-col glow-hover transition-all duration-300 group relative overflow-hidden">
                    <div class="mb-8 relative z-10">
                        <span class="material-symbols-outlined text-4xl text-primary-fixed">devices</span>
                    </div>
                    <h3 class="font-display text-headline-lg-mobile text-on-surface mb-4 relative z-10" data-i18n="services.resp_design_title"><?php echo __t('services.resp_design_title'); ?></h3>
                    <p class="text-on-surface-variant mb-8 flex-grow relative z-10" data-i18n="services.resp_design_desc">
                        <span data-i18n="services.resp_design_desc"><?php echo __t('services.resp_design_desc'); ?></span>
                    </p>
                    <div class="flex flex-wrap gap-2 relative z-10">
                        <span class="font-code-sm text-label-caps bg-surface-container-highest px-2 py-1 text-on-surface-variant">GRID</span>
                        <span class="font-code-sm text-label-caps bg-surface-container-highest px-2 py-1 text-on-surface-variant">ADAPTIVE</span>
                        <span class="font-code-sm text-label-caps bg-surface-container-highest px-2 py-1 text-on-surface-variant">UI/UX</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Artificial Intelligence -->
        <section id="ai-dev" class="py-16 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto mb-24 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div>
                    <h2 class="font-display text-headline-lg-mobile md:text-headline-lg text-on-surface mb-2" data-i18n="services.ai_title"><?php echo __t('services.ai_title'); ?></h2>
                    <p class="text-on-surface-variant font-code-sm text-code-sm uppercase tracking-widest" data-i18n="services.ai_subtitle"><?php echo __t('services.ai_subtitle'); ?></p>
                </div>
                <div class="h-[1px] flex-grow bg-outline-variant/30 mx-8 hidden md:block"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
                <!-- AI Integration (Large Card) -->
                <div class="md:col-span-8 glass-card p-6 md:p-12 flex flex-col md:flex-row gap-8 glow-hover transition-all duration-300 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-primary-fixed"></div>
                    <div class="md:w-1/2 relative z-10">
                        <div class="mb-8">
                            <span class="material-symbols-outlined text-4xl text-primary-fixed">psychology</span>
                        </div>
                        <h3 class="font-display text-headline-lg-mobile text-on-surface mb-4" data-i18n="services.ai_integration_title"><?php echo __t('services.ai_integration_title'); ?></h3>
                        <p class="text-on-surface-variant mb-8 leading-relaxed" data-i18n="services.ai_integration_desc">
                            <span data-i18n="services.ai_integration_desc"><?php echo __t('services.ai_integration_desc'); ?></span>
                        </p>
                        <ul class="space-y-4">
                            <li class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary-fixed text-sm">check_circle</span>
                                <span class="font-code-sm text-on-surface" data-i18n="services.ai_pipeline"><?php echo __t('services.ai_pipeline'); ?></span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary-fixed text-sm">check_circle</span>
                                <span class="font-code-sm text-on-surface" data-i18n="services.ai_search"><?php echo __t('services.ai_search'); ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="md:w-1/2 h-64 md:h-auto glass-card border-outline-variant/30 relative overflow-hidden group rounded z-10">
                        <img alt="AI Concept" class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlFbPpXL1pnRZA8aJgiKs8clPXvK472NkesPvShkK0GZnUNSDUbSaqpnc0TmNRhPS2RmAHZ_e_dmFoiFf-c2ksGPwDohFuSjYuQJ6EgzMZIwASXLc12eFa2Nmdp-Ah5l7FHrH78VGPmdAG2o6VGMVu8U1jf6V4RWYoHyTdMJ8MCWzrXV-_A8cJAU--SgE4FE5XBKrBU76YsXl8jHj_Gibt_dB1Nv55Ot2JCKH46FJT39QZ5eysPPE5jWdWNP4oUp3K0aVXiWNJug"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
                    </div>
                </div>
                
                <!-- LLM Fine-tuning -->
                <div class="md:col-span-4 glass-card p-6 md:p-8 flex flex-col glow-hover transition-all duration-300 relative overflow-hidden">
                    <div class="mb-8 relative z-10">
                        <span class="material-symbols-outlined text-4xl text-primary-fixed">model_training</span>
                    </div>
                    <h3 class="font-display text-headline-lg-mobile text-on-surface mb-4 relative z-10" data-i18n="services.llm_title"><?php echo __t('services.llm_title'); ?></h3>
                    <p class="text-on-surface-variant mb-8 flex-grow relative z-10" data-i18n="services.llm_desc">
                        <span data-i18n="services.llm_desc"><?php echo __t('services.llm_desc'); ?></span>
                    </p>
                    <div class="pt-4 border-t border-outline-variant/20 relative z-10">
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-code-sm text-label-caps text-on-surface-variant" data-i18n="services.llm_progress"><?php echo __t('services.llm_progress'); ?></span>
                            <span class="font-code-sm text-label-caps text-primary-fixed">100%</span>
                        </div>
                        <div class="h-1 bg-surface-container-highest w-full overflow-hidden">
                            <div class="h-full bg-primary-fixed w-full"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Predictive Analytics -->
                <div class="md:col-span-12 glass-card p-6 md:p-8 flex flex-col md:flex-row items-center gap-8 glow-hover transition-all duration-300 relative overflow-hidden">
                    <div class="bg-primary-fixed/10 p-6 rounded-DEFAULT z-10 relative">
                        <span class="material-symbols-outlined text-5xl text-primary-fixed">insights</span>
                    </div>
                    <div class="flex-grow z-10 relative">
                        <h3 class="font-display text-headline-lg-mobile text-on-surface mb-2" data-i18n="services.pred_title"><?php echo __t('services.pred_title'); ?></h3>
                        <p class="text-on-surface-variant leading-relaxed" data-i18n="services.pred_desc">
                            <span data-i18n="services.pred_desc"><?php echo __t('services.pred_desc'); ?></span>
                        </p>
                    </div>
                    <a href="contact.php" class="border border-primary-fixed text-primary-fixed px-8 py-3 font-display font-bold hover:bg-primary-fixed hover:text-on-primary-fixed transition-colors whitespace-nowrap z-10 relative text-center" data-i18n="services.pred_explore">
                        <span data-i18n="services.pred_explore"><?php echo __t('services.pred_explore'); ?></span>
                    </a>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-24 px-margin-mobile md:px-margin-desktop bg-surface-container-low border-y border-outline-variant/20 relative overflow-hidden z-10">
            <div class="absolute right-0 top-0 w-1/3 h-full opacity-10 pointer-events-none">
                <div class="w-full h-full" style="background-image: radial-gradient(circle, #0055ff 1px, transparent 1px); background-size: 24px 24px;"></div>
            </div>
            <div class="max-w-container-max mx-auto text-center relative z-10">
                <h2 class="font-display text-display mb-8" data-i18n="services.cta_title"><?php echo __t('services.cta_title'); ?></h2>
                <p class="text-on-surface-variant max-w-xl mx-auto mb-12 text-lg" data-i18n="services.cta_desc">
                    <span data-i18n="services.cta_desc"><?php echo __t('services.cta_desc'); ?></span>
                </p>
                <div class="flex flex-col md:flex-row gap-4 justify-center">
                    <a href="contact.php" class="bg-primary-fixed text-on-primary-fixed px-10 py-4 font-display font-bold text-lg hover:shadow-[0_0_20px_#0055ff] transition-all text-center" data-i18n="services.cta_start"><?php echo __t('services.cta_start'); ?></a>
                    <a href="index.php#portfolio" class="border border-outline text-on-surface px-10 py-4 font-display font-bold text-lg hover:bg-surface-container-highest transition-all text-center" data-i18n="services.cta_case_studies"><?php echo __t('services.cta_case_studies'); ?></a>
                </div>
            </div>
        </section>
    </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

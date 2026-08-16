<?php
$current_page = 'contact';
require_once __DIR__ . '/includes/header.php';
?>

    <main class="min-h-screen py-20 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Content Left: Context & Details -->
            <div class="lg:col-span-5 space-y-12">
                <section>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-8 h-[1px] bg-primary-fixed-dim"></span>
                        <span class="font-code-sm text-code-sm text-primary-fixed-dim uppercase tracking-widest" data-i18n="contact.init_subtitle"><?php echo __t('contact.init_subtitle'); ?></span>
                    </div>
                    <h1 class="font-display text-display mb-6 leading-tight" data-i18n="contact.init_title"><?php echo __t('contact.init_title'); ?></h1>
                    <p class="text-on-surface-variant text-lg max-w-md leading-relaxed" data-i18n="contact.init_desc">
                        <span data-i18n="contact.init_desc"><?php echo __t('contact.init_desc'); ?></span>
                    </p>
                </section>
            </div>
            
            <!-- Content Right: Form -->
            <div class="lg:col-span-7 relative">
                <div class="glass-panel p-8 md:p-12 relative overflow-hidden">
                    <div class="scanner-line"></div>
                    <div class="mb-10 relative z-10">
                        <h3 class="font-display text-headline-lg text-primary mb-2" data-i18n="contact.new_inquiry"><?php echo __t('contact.new_inquiry'); ?></h3>
                        <p class="font-code-sm text-outline tracking-wider" data-i18n="contact.secure_protocol"><?php echo __t('contact.secure_protocol'); ?></p>
                    </div>
                    
                    <form id="secure-contact-form" action="api/submit.php" method="POST" class="space-y-8 relative z-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="group">
                                <label class="block font-code-sm text-label-caps text-outline mb-2 uppercase group-focus-within:text-primary-fixed-dim transition-colors" data-i18n="contact.lbl_name"><?php echo __t('contact.lbl_name'); ?></label>
                                <input id="client-name" name="name" required class="w-full bg-surface-container-low border border-outline-variant focus:border-primary-fixed-dim focus:ring-1 focus:ring-primary-fixed-dim rounded-none px-4 py-3 text-on-surface placeholder:text-outline/40 font-code-sm transition-all outline-none" data-i18n-placeholder="contact.ph_name" placeholder="<?php echo __t('contact.ph_name'); ?>" type="text"/>
                            </div>
                            <div class="group">
                                <label class="block font-code-sm text-label-caps text-outline mb-2 uppercase group-focus-within:text-primary-fixed-dim transition-colors" data-i18n="contact.lbl_email"><?php echo __t('contact.lbl_email'); ?></label>
                                <input id="client-email" name="email" required class="w-full bg-surface-container-low border border-outline-variant focus:border-primary-fixed-dim focus:ring-1 focus:ring-primary-fixed-dim rounded-none px-4 py-3 text-on-surface placeholder:text-outline/40 font-code-sm transition-all outline-none" data-i18n-placeholder="contact.ph_email" placeholder="<?php echo __t('contact.ph_email'); ?>" type="email"/>
                            </div>
                        </div>
                        
                        <div class="group">
                            <label class="block font-code-sm text-label-caps text-outline mb-2 uppercase group-focus-within:text-primary-fixed-dim transition-colors" data-i18n="contact.lbl_class"><?php echo __t('contact.lbl_class'); ?></label>
                            <div class="relative">
                                <select id="project-class" name="project_type" required class="w-full bg-surface-container-low border border-outline-variant focus:border-primary-fixed-dim focus:ring-1 focus:ring-primary-fixed-dim rounded-none px-4 py-3 text-on-surface font-code-sm transition-all outline-none appearance-none">
                                    <option disabled="" selected="" value="" data-i18n="contact.opt_default"><?php echo __t('contact.opt_default'); ?></option>
                                    <option value="saas_development" data-i18n="contact.opt_saas"><?php echo __t('contact.opt_saas'); ?></option>
                                    <option value="native_cross_apps" data-i18n="contact.opt_apps"><?php echo __t('contact.opt_apps'); ?></option>
                                    <option value="ai_integration" data-i18n="contact.opt_ai"><?php echo __t('contact.opt_ai'); ?></option>
                                    <option value="full_stack" data-i18n="contact.opt_fullstack"><?php echo __t('contact.opt_fullstack'); ?></option>
                                    <option value="cloud_infrastructure" data-i18n="contact.opt_cloud"><?php echo __t('contact.opt_cloud'); ?></option>
                                    <option value="consulting" data-i18n="contact.opt_consulting"><?php echo __t('contact.opt_consulting'); ?></option>
                                </select>
                                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-outline">expand_more</span>
                            </div>
                        </div>
                        
                        <div class="group">
                            <label class="block font-code-sm text-label-caps text-outline mb-2 uppercase group-focus-within:text-primary-fixed-dim transition-colors" data-i18n="contact.lbl_mission"><?php echo __t('contact.lbl_mission'); ?></label>
                            <textarea id="mission-params" name="message" required class="w-full bg-surface-container-low border border-outline-variant focus:border-primary-fixed-dim focus:ring-1 focus:ring-primary-fixed-dim rounded-none px-4 py-3 text-on-surface placeholder:text-outline/40 font-code-sm transition-all outline-none resize-none" data-i18n-placeholder="contact.ph_mission" placeholder="<?php echo __t('contact.ph_mission'); ?>" rows="5"></textarea>
                        </div>
                        
                        <div class="flex flex-col md:flex-row items-center gap-6 pt-4">
                            <button class="w-full md:w-auto px-10 py-4 bg-primary-fixed text-on-primary-fixed font-bold flex items-center justify-center gap-3 hover:shadow-[0_0_20px_rgba(0,85,255,0.5)] transition-all group active:scale-95" type="submit">
                                <span data-i18n="contact.btn_transmit"><?php echo __t('contact.btn_transmit'); ?></span>
                                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">send</span>
                            </button>
                            <p class="font-code-sm text-xs text-outline leading-tight" data-i18n="contact.disclaimer">
                                <span data-i18n="contact.disclaimer"><?php echo __t('contact.disclaimer'); ?></span>
                            </p>
                        </div>
                    </form>
                    
                    <!-- Simulated Success Screen -->
                    <div id="success-screen" class="hidden absolute inset-0 bg-background/95 backdrop-blur-xl flex flex-col items-center justify-center text-center p-8 z-30">
                        <span class="material-symbols-outlined text-[80px] text-primary-fixed-dim animate-pulse mb-6">verified_user</span>
                        <h3 class="font-display text-3xl font-bold text-primary mb-4" data-i18n="contact.success_title"><?php echo __t('contact.success_title'); ?></h3>
                        <p class="font-code-sm text-on-surface-variant max-w-md mb-8" data-i18n="contact.success_desc">
                            <span data-i18n="contact.success_desc"><?php echo __t('contact.success_desc'); ?></span>
                        </p>
                        <button id="success-reset-btn" class="border border-primary-fixed text-primary-fixed px-8 py-3 font-display font-bold hover:bg-primary-fixed/10 transition-all" data-i18n="contact.success_reset">
                            <span data-i18n="contact.success_reset"><?php echo __t('contact.success_reset'); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

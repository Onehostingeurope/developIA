import { translations } from './i18n';

/**
 * Develop IA Web Solutions - Core Interactive Engine
 * Premium tech-minimalist micro-interactions, responsive menus, and immersive visual effects.
 */

// ==========================================
// i18n Localization Engine
// ==========================================
class I18nEngine {
    private currentLang: string = 'en';
    private supportedLangs = ['en', 'fr', 'es', 'it', 'ru'];

    constructor() {
        this.init();
    }

    private init() {
        const savedLang = localStorage.getItem('preferred_lang');
        const browserLang = navigator.language.slice(0, 2).toLowerCase();
        
        if (savedLang && this.supportedLangs.includes(savedLang)) {
            this.currentLang = savedLang;
        } else if (this.supportedLangs.includes(browserLang)) {
            this.currentLang = browserLang;
        } else {
            this.currentLang = 'en';
        }
        
        // Initial application without transition animation to prevent layout flashes
        this.applyTranslations(this.currentLang, false);
        this.setupEventListeners();
    }

    private getTranslationValue(lang: string, path: string): string | undefined {
        const keys = path.split('.');
        let current: any = translations[lang];
        for (const key of keys) {
            if (current && typeof current === 'object') {
                current = current[key];
            } else {
                return undefined;
            }
        }
        return typeof current === 'string' ? current : undefined;
    }

    public applyTranslations(lang: string, animate: boolean = true) {
        if (!this.supportedLangs.includes(lang)) return;
        this.currentLang = lang;
        localStorage.setItem('preferred_lang', lang);
        document.documentElement.setAttribute('lang', lang);

        const updateElements = () => {
            // Translate standard elements
            const translatable = document.querySelectorAll('[data-i18n]');
            translatable.forEach(el => {
                const path = el.getAttribute('data-i18n');
                if (path) {
                    const val = this.getTranslationValue(lang, path);
                    if (val !== undefined) {
                        // Use textContent for option elements to avoid XSS / broken select
                        if (el.tagName === 'OPTION') {
                            el.textContent = val;
                        } else {
                            el.innerHTML = val;
                        }
                    }
                }
            });

            // Translate placeholders
            const placeholders = document.querySelectorAll('[data-i18n-placeholder]');
            placeholders.forEach(el => {
                const path = el.getAttribute('data-i18n-placeholder');
                if (path) {
                    const val = this.getTranslationValue(lang, path);
                    if (val !== undefined) {
                        el.setAttribute('placeholder', val);
                    }
                }
            });

            // Update Desktop UI states
            const activeLangLabel = document.getElementById('active-lang-label');
            if (activeLangLabel) activeLangLabel.textContent = lang.toUpperCase();

            // Highlight desktop dropdown item
            const dropdownItems = document.querySelectorAll('#lang-dropdown button[data-lang]');
            dropdownItems.forEach(btn => {
                const btnLang = btn.getAttribute('data-lang');
                if (btnLang === lang) {
                    btn.classList.add('text-primary', 'bg-primary-fixed/10');
                    btn.classList.remove('text-on-surface-variant');
                } else {
                    btn.classList.remove('text-primary', 'bg-primary-fixed/10');
                    btn.classList.add('text-on-surface-variant');
                }
            });

            // Highlight mobile buttons
            const mobileLangButtons = document.querySelectorAll('#mobile-menu button[data-lang]');
            mobileLangButtons.forEach(btn => {
                const btnLang = btn.getAttribute('data-lang');
                if (btnLang === lang) {
                    btn.classList.add('text-primary', 'border-primary-fixed/60', 'bg-primary-fixed/15');
                    btn.classList.remove('text-on-surface-variant');
                } else {
                    btn.classList.remove('text-primary', 'border-primary-fixed/60', 'bg-primary-fixed/15');
                    btn.classList.add('text-on-surface-variant');
                }
            });
        };

        if (animate) {
            // Smooth micro-animation opacity transition
            document.body.classList.add('transition-opacity', 'duration-150', 'opacity-0');
            setTimeout(() => {
                updateElements();
                setTimeout(() => {
                    document.body.classList.remove('opacity-0');
                }, 50);
            }, 150);
        } else {
            updateElements();
        }
    }

    private setupEventListeners() {
        // Desktop drop-down toggle
        const langBtn = document.getElementById('lang-btn');
        const langDropdown = document.getElementById('lang-dropdown');
        const langCaret = document.getElementById('lang-caret');

        if (langBtn && langDropdown) {
            langBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isHidden = langDropdown.classList.contains('hidden');
                if (isHidden) {
                    langDropdown.classList.remove('hidden');
                    if (langCaret) langCaret.style.transform = 'rotate(180deg)';
                } else {
                    langDropdown.classList.add('hidden');
                    if (langCaret) langCaret.style.transform = 'rotate(0deg)';
                }
            });

            // Close dropdown clicking outside
            document.addEventListener('click', () => {
                langDropdown.classList.add('hidden');
                if (langCaret) langCaret.style.transform = 'rotate(0deg)';
            });

            // Selection clicks (Desktop)
            const dropdownItems = document.querySelectorAll('#lang-dropdown button[data-lang]');
            dropdownItems.forEach(btn => {
                btn.addEventListener('click', () => {
                    const targetLang = btn.getAttribute('data-lang');
                    if (targetLang) {
                        this.applyTranslations(targetLang, true);
                    }
                });
            });
        }

        // Mobile selector clicks
        const mobileLangButtons = document.querySelectorAll('#mobile-menu button[data-lang]');
        mobileLangButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const targetLang = btn.getAttribute('data-lang');
                if (targetLang) {
                    this.applyTranslations(targetLang, true);
                }
            });
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    // Initialize localization engine
    new I18nEngine();

    
    // ==========================================
    // 1. Responsive Navigation Menu
    // ==========================================
    const mobileMenuBtn = document.getElementById('mobile-menu-btn') as HTMLButtonElement | null;
    const mobileMenu = document.getElementById('mobile-menu') as HTMLDivElement | null;
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', (e: MouseEvent) => {
            e.stopPropagation();
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                mobileMenuBtn.textContent = 'close';
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenuBtn.textContent = 'menu';
            }
        });
        
        // Close menu on resize to desktop view
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768 && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                mobileMenuBtn.textContent = 'menu';
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e: MouseEvent) => {
            const target = e.target as HTMLElement | null;
            if (target && !mobileMenu.contains(target) && !mobileMenuBtn.contains(target)) {
                mobileMenu.classList.add('hidden');
                mobileMenuBtn.textContent = 'menu';
            }
        });
    }

    // ==========================================
    // 2. Glassmorphic Radial Spotlight Hover Effect
    // ==========================================
    const glassElements = document.querySelectorAll('.glass-card, .glass-panel') as NodeListOf<HTMLElement>;
    
    glassElements.forEach(el => {
        el.addEventListener('mousemove', (e: MouseEvent) => {
            const rect = el.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            el.style.setProperty('--mouse-x', `${x}px`);
            el.style.setProperty('--mouse-y', `${y}px`);
        });
    });

    // ==========================================
    // 3. Form Focus Scanner & Transmit Overlay
    // ==========================================
    const secureForm = document.getElementById('secure-contact-form') as HTMLFormElement | null;
    const formFields = document.querySelectorAll('input, select, textarea') as NodeListOf<HTMLInputElement | HTMLSelectElement | HTMLTextAreaElement>;
    const successScreen = document.getElementById('success-screen') as HTMLDivElement | null;
    const resetBtn = document.getElementById('success-reset-btn') as HTMLButtonElement | null;

    formFields.forEach(el => {
        el.addEventListener('focus', () => {
            const container = el.closest('.glass-panel') as HTMLElement | null;
            if (container) {
                const scanner = container.querySelector('.scanner-line') as HTMLElement | null;
                if (scanner) {
                    scanner.style.animationPlayState = 'running';
                    scanner.style.opacity = '1';
                }
            }
        });
    });

    if (secureForm && successScreen) {
        secureForm.addEventListener('submit', (e: Event) => {
            e.preventDefault();
            
            // Fetch inputs for a realistic visual console log before transmitting
            const nameEl = document.getElementById('client-name') as HTMLInputElement | null;
            const emailEl = document.getElementById('client-email') as HTMLInputElement | null;
            const projectEl = document.getElementById('project-class') as HTMLSelectElement | null;
            const messageEl = document.getElementById('mission-params') as HTMLTextAreaElement | null;
            const submitBtn = secureForm.querySelector('button[type="submit"]') as HTMLButtonElement | null;
            
            const name = nameEl?.value || 'ANONYMOUS';
            const email = emailEl?.value || 'UNKNOWN';
            const project = projectEl?.value || 'UNDEFINED';
            const message = messageEl?.value || '';
            
            console.log(`[SECURE HANDSHAKE INIT] Initiating transmit protocol...`);
            console.log(`[CLIENT CLASSIFICATION] Client: ${name} | Email: ${email}`);
            console.log(`[MISSION SCHEDULING] Target Arch: ${project}`);
            
            // Interactive visual loading feedback: disable submit button and set text to TRANSMITTING with a spinning loader
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    TRANSMITTING...
                    <span class="material-symbols-outlined animate-spin text-lg">sync</span>
                `;
            }
            
            // Send AJAX payload to FormSubmit.co
            fetch('https://formsubmit.co/ajax/onehostingeurope@gmail.com', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    project_type: project,
                    message: message,
                    _subject: `New Inquiry from ${name} (Develop IA)`
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(`[TRANSMIT SUCCESS] Data uploaded. Response:`, data);
                // Show premium success transmission window
                successScreen.classList.remove('hidden');
                successScreen.classList.add('flex', 'animate-fade-in');
            })
            .catch(error => {
                console.error(`[TRANSMIT ERROR] Failed to send:`, error);
                alert('Transmission protocol encountered an error. Please try again.');
            })
            .finally(() => {
                // Restore button state
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = `
                        TRANSMIT MESSAGE
                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">send</span>
                    `;
                }
            });
        });
    }

    if (resetBtn && secureForm && successScreen) {
        resetBtn.addEventListener('click', () => {
            secureForm.reset();
            successScreen.classList.add('hidden');
            successScreen.classList.remove('flex');
        });
    }

    // ==========================================
    // 4. Subtle Parallax for Technical Visuals
    // ==========================================
    window.addEventListener('scroll', () => {
        // Select decorative images
        const parallaxImgs = document.querySelectorAll('img[src*="aida-public"]') as NodeListOf<HTMLImageElement>;
        parallaxImgs.forEach(img => {
            // Check if element is in viewport before calculating transform
            const rect = img.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                img.style.transform = `translateY(${(rect.top - window.innerHeight/2) * 0.05}px)`;
            }
        });
    });
});

/**
 * Develop IA Web Solutions - Core Interactive Engine
 * Premium tech-minimalist micro-interactions, responsive menus, and immersive visual effects.
 */

document.addEventListener('DOMContentLoaded', () => {
    
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
            const name = (document.getElementById('client-name') as HTMLInputElement | null)?.value || 'ANONYMOUS';
            const email = (document.getElementById('client-email') as HTMLInputElement | null)?.value || 'UNKNOWN';
            const project = (document.getElementById('project-class') as HTMLSelectElement | null)?.value || 'UNDEFINED';
            
            console.log(`[SECURE HANDSHAKE INIT] Initiating transmit protocol...`);
            console.log(`[CLIENT CLASSIFICATION] Client: ${name} | Email: ${email}`);
            console.log(`[MISSION SCHEDULING] Target Arch: ${project}`);
            
            // Show premium success transmission window
            successScreen.classList.remove('hidden');
            successScreen.classList.add('flex', 'animate-fade-in');
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

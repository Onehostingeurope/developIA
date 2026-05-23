import re

en_keys = {
    'days_desc_1_alt': 'We help you go from idea to live project in record time &mdash; without wasting months in endless meetings, complicated processes, or technical confusion.',
    'days_desc_2_alt': 'Whether you need a professional business website, an e-commerce platform, a SaaS product, a mobile app, an AI automation tool, or a complete custom system &mdash; DevelopIA is here to make your vision real.',
    
    'stat_15': '&lt;15',
    'stat_15_lbl': 'Days to launch',
    'stat_proj_types': 'Project types',
    'stat_langs': 'Languages',
    'stat_custom': 'Custom built',
    
    'what_we_build_title_1': 'Powerful Digital Solutions',
    'what_we_build_title_2': 'Adapted to Your Business',
    'what_we_build_sub': 'We develop everything your business needs to succeed online &mdash; designed, built, and launched at speed.',
    
    'srv_web_alt': 'Business Website',
    'srv_web_desc_alt': 'Professional, fast &amp; SEO-ready',
    'srv_saas_alt': 'SaaS Platform',
    'srv_saas_desc_alt': 'Scalable, subscription-based apps',
    'srv_mobile_alt': 'Mobile App',
    'srv_mobile_desc_alt': 'iOS, Android, Windows &amp; Mac',
    'srv_ai_alt': 'AI-Powered Tool',
    'srv_ai_desc_alt': 'LLMs, agents &amp; automation',
    'srv_ecommerce_alt': 'E-Commerce',
    'srv_ecommerce_desc_alt': 'Sell online, globally',
    'srv_booking_alt': 'Booking Platform',
    'srv_booking_desc_alt': 'Reservations &amp; scheduling',
    'srv_crm_alt': 'CRM Dashboard',
    'srv_crm_desc_alt': 'Manage clients &amp; data',
    'srv_admin_alt': 'Admin Panel',
    'srv_admin_desc_alt': 'Full control interfaces',
    'srv_auto_alt': 'Automation System',
    'srv_auto_desc_alt': 'Workflows &amp; pipelines',
    'srv_custom_alt': 'Custom Web App',
    'srv_custom_desc_alt': 'Any idea, fully custom',
    
    'proc_badge_alt': '// From Idea to Launch',
    'proc_title_alt': 'You Don&#39;t Need to Be Technical.',
    'proc_sub_alt': 'You bring the idea. We handle everything else.',
    
    'proc_1_alt': 'You Bring the Idea',
    'proc_1_desc_alt': 'Tell us what you want to build. No technical background needed &mdash; just your vision and goals.',
    'proc_2_alt': 'We Design &amp; Build',
    'proc_2_desc_alt': 'Strategy, UI/UX design, full-stack development, AI integration, hosting setup &mdash; all handled by our team.',
    'proc_3_alt': 'You Launch &amp; Grow',
    'proc_3_desc_alt': 'Your project goes live in record time. Start selling, operating, and growing &mdash; faster than ever.',
    
    'why_1_title': 'Speed that matters',
    'why_1_desc_alt': 'A good idea should not wait six months to become real. We ship in days, not months.',
    'why_2_title': 'AI-assisted development',
    'why_2_desc_alt': 'We combine AI tooling with software engineering to build smarter and faster.',
    'why_3_title': 'Modern, scalable architecture',
    'why_3_desc_alt': 'Built to grow with your business &mdash; not something you&#39;ll need to rebuild in 6 months.',
    'why_4_title': 'Business-first thinking',
    'why_4_desc_alt': 'We don&#39;t just code. We combine creativity, engineering and business strategy to build products that generate results.',
    
    'why_badge_alt': '// Why DevelopIA',
    'why_title_1_alt': 'Because today,',
    'why_title_2_alt': 'speed matters.',
    'why_sub_alt': 'DevelopIA combines creativity, software engineering, automation, and business strategy to create digital products that are modern, scalable, and ready for growth.',
    'why_cta': 'Start Today',
    
    'port_badge_alt': '// Selected Work',
    'port_title_alt': 'Projects We&#39;ve Built',
    'port_cat_1': 'AI Video Localization &amp; Dubbing',
    'port_name_1': 'Easy Dubbing',
    'port_view_alt': 'VISIT PLATFORM',
    'port_cat_2': 'Music Platform',
    'port_name_2': 'TuneMusics',
    'port_cat_3': 'AI Content &amp; Publishing',
    'port_name_3': 'Social AI Publisher',
    
    'cta_badge_alt': '// Ready to Build Something?',
    'cta_title_1_alt': 'Your next project',
    'cta_title_2_alt': 'can start today.',
    'cta_sub_alt': 'Tell us what you want to create &mdash; and we will help bring it to life.',
    'cta_btn_alt': 'View All Services',
}

fr_keys = {
    'days_desc_1_alt': 'Nous vous aidons à passer de l\'idée au projet en direct en un temps record &mdash; sans perdre des mois en réunions inutiles ou confusions techniques.',
    'days_desc_2_alt': 'Que vous ayez besoin d\'un site web professionnel, d\'un e-commerce, d\'un SaaS, d\'une app mobile ou d\'un système IA &mdash; DevelopIA est là pour réaliser votre vision.',
    'stat_15': '&lt;15',
    'stat_15_lbl': 'Jours de lancement',
    'stat_proj_types': 'Types de projets',
    'stat_langs': 'Langues',
    'stat_custom': 'Sur mesure',
    'what_we_build_title_1': 'Des Solutions Numériques Puissantes',
    'what_we_build_title_2': 'Adaptées à Votre Entreprise',
    'what_we_build_sub': 'Nous développons tout ce dont votre entreprise a besoin pour réussir en ligne &mdash; conçu, construit et lancé rapidement.',
    'srv_web_alt': 'Site Web Pro',
    'srv_web_desc_alt': 'Professionnel, rapide et optimisé SEO',
    'srv_saas_alt': 'Plateforme SaaS',
    'srv_saas_desc_alt': 'Applications évolutives sur abonnement',
    'srv_mobile_alt': 'Application Mobile',
    'srv_mobile_desc_alt': 'iOS, Android, Windows &amp; Mac',
    'srv_ai_alt': 'Outil IA',
    'srv_ai_desc_alt': 'LLMs, agents &amp; automatisation',
    'srv_ecommerce_alt': 'E-Commerce',
    'srv_ecommerce_desc_alt': 'Vendez en ligne, mondialement',
    'srv_booking_alt': 'Plateforme de Réservation',
    'srv_booking_desc_alt': 'Réservations et plannings',
    'srv_crm_alt': 'Tableau de bord CRM',
    'srv_crm_desc_alt': 'Gérez clients &amp; données',
    'srv_admin_alt': 'Panel Administrateur',
    'srv_admin_desc_alt': 'Interfaces de contrôle total',
    'srv_auto_alt': 'Système d\'Automatisation',
    'srv_auto_desc_alt': 'Workflows &amp; pipelines',
    'srv_custom_alt': 'App Web Sur Mesure',
    'srv_custom_desc_alt': 'Toute idée, 100% sur mesure',
    'proc_badge_alt': '// De l\'Idée au Lancement',
    'proc_title_alt': 'Pas Besoin d\'Être Technique.',
    'proc_sub_alt': 'Vous apportez l\'idée. Nous nous occupons du reste.',
    'proc_1_alt': 'Vous Apportez l\'Idée',
    'proc_1_desc_alt': 'Dites-nous ce que vous voulez construire. Aucune technique requise &mdash; juste votre vision.',
    'proc_2_alt': 'Nous Concevons &amp; Construisons',
    'proc_2_desc_alt': 'Stratégie, design UI/UX, développement full-stack, intégration IA, hébergement &mdash; tout est géré.',
    'proc_3_alt': 'Vous Lancez &amp; Grandissez',
    'proc_3_desc_alt': 'Votre projet est mis en ligne en un temps record. Commencez à vendre et croître &mdash; plus vite que jamais.',
    'why_1_title': 'La vitesse qui compte',
    'why_1_desc_alt': 'Une bonne idée ne devrait pas attendre 6 mois. Nous livrons en jours, pas en mois.',
    'why_2_title': 'Développement assisté par IA',
    'why_2_desc_alt': 'Nous combinons l\'IA avec l\'ingénierie logicielle pour construire plus intelligemment.',
    'why_3_title': 'Architecture moderne',
    'why_3_desc_alt': 'Conçu pour grandir avec vous &mdash; pas un système à refaire dans 6 mois.',
    'why_4_title': 'Pensée business',
    'why_4_desc_alt': 'Nous combinons créativité, ingénierie et stratégie pour générer des résultats.',
    'why_badge_alt': '// Pourquoi DevelopIA',
    'why_title_1_alt': 'Parce qu\'aujourd\'hui,',
    'why_title_2_alt': 'la vitesse compte.',
    'why_sub_alt': 'DevelopIA combine créativité, ingénierie, automatisation et stratégie pour créer des produits numériques modernes.',
    'why_cta': 'Commencer Aujourd\'hui',
    'port_badge_alt': '// Notre Travail',
    'port_title_alt': 'Projets Récents',
    'port_cat_1': 'Doublage &amp; Localisation IA',
    'port_name_1': 'Easy Dubbing',
    'port_view_alt': 'VISITER LA PLATEFORME',
    'port_cat_2': 'Plateforme Musicale',
    'port_name_2': 'TuneMusics',
    'port_cat_3': 'Contenu &amp; Publication IA',
    'port_name_3': 'Social AI Publisher',
    'cta_badge_alt': '// Prêt à Construire ?',
    'cta_title_1_alt': 'Votre prochain projet',
    'cta_title_2_alt': 'peut commencer aujourd\'hui.',
    'cta_sub_alt': 'Dites-nous ce que vous voulez créer &mdash; et nous lui donnerons vie.',
    'cta_btn_alt': 'Voir Tous Les Services',
}

es_keys = {
    'days_desc_1_alt': 'Te ayudamos a pasar de la idea al proyecto en vivo en un tiempo récord &mdash; sin desperdiciar meses en reuniones o confusión técnica.',
    'days_desc_2_alt': 'Ya sea un sitio web, e-commerce, SaaS, app móvil o sistema de IA &mdash; DevelopIA está aquí para hacer tu visión realidad.',
    'stat_15': '&lt;15',
    'stat_15_lbl': 'Días de lanzamiento',
    'stat_proj_types': 'Tipos de proyectos',
    'stat_langs': 'Idiomas',
    'stat_custom': 'Personalizado',
    'what_we_build_title_1': 'Potentes Soluciones Digitales',
    'what_we_build_title_2': 'Adaptadas a tu Negocio',
    'what_we_build_sub': 'Desarrollamos todo lo que tu negocio necesita para tener éxito en línea &mdash; diseñado, construido y lanzado rápidamente.',
    'srv_web_alt': 'Sitio Web',
    'srv_web_desc_alt': 'Profesional, rápido y listo para SEO',
    'srv_saas_alt': 'Plataforma SaaS',
    'srv_saas_desc_alt': 'Aplicaciones escalables por suscripción',
    'srv_mobile_alt': 'App Móvil',
    'srv_mobile_desc_alt': 'iOS, Android, Windows &amp; Mac',
    'srv_ai_alt': 'Herramienta de IA',
    'srv_ai_desc_alt': 'LLMs, agentes y automatización',
    'srv_ecommerce_alt': 'E-Commerce',
    'srv_ecommerce_desc_alt': 'Vende en línea, globalmente',
    'srv_booking_alt': 'Plataforma de Reservas',
    'srv_booking_desc_alt': 'Reservas y horarios',
    'srv_crm_alt': 'Panel CRM',
    'srv_crm_desc_alt': 'Gestiona clientes y datos',
    'srv_admin_alt': 'Panel de Admin',
    'srv_admin_desc_alt': 'Interfaces de control total',
    'srv_auto_alt': 'Sistema de Automatización',
    'srv_auto_desc_alt': 'Flujos de trabajo y pipelines',
    'srv_custom_alt': 'Web App a Medida',
    'srv_custom_desc_alt': 'Cualquier idea, 100% a medida',
    'proc_badge_alt': '// De la Idea al Lanzamiento',
    'proc_title_alt': 'No Necesitas Ser Técnico.',
    'proc_sub_alt': 'Tú traes la idea. Nosotros nos encargamos del resto.',
    'proc_1_alt': 'Tú Traes la Idea',
    'proc_1_desc_alt': 'Dinos qué quieres construir. No necesitas experiencia técnica &mdash; solo tu visión.',
    'proc_2_alt': 'Diseñamos y Construimos',
    'proc_2_desc_alt': 'Estrategia, diseño UI/UX, desarrollo full-stack, IA, hosting &mdash; todo gestionado.',
    'proc_3_alt': 'Lanzas y Creces',
    'proc_3_desc_alt': 'Tu proyecto sale en vivo en tiempo récord. Empieza a vender y crecer &mdash; más rápido que nunca.',
    'why_1_title': 'Velocidad que importa',
    'why_1_desc_alt': 'Una buena idea no debe esperar 6 meses. Entregamos en días, no en meses.',
    'why_2_title': 'Desarrollo asistido por IA',
    'why_2_desc_alt': 'Combinamos IA con ingeniería de software para construir más inteligentemente.',
    'why_3_title': 'Arquitectura moderna',
    'why_3_desc_alt': 'Construido para crecer contigo &mdash; no algo que debas reconstruir en 6 meses.',
    'why_4_title': 'Mentalidad de negocios',
    'why_4_desc_alt': 'Combinamos creatividad, ingeniería y estrategia para generar resultados.',
    'why_badge_alt': '// Por Qué DevelopIA',
    'why_title_1_alt': 'Porque hoy,',
    'why_title_2_alt': 'la velocidad importa.',
    'why_sub_alt': 'DevelopIA combina creatividad, ingeniería, automatización y estrategia para crear productos digitales modernos.',
    'why_cta': 'Empezar Hoy',
    'port_badge_alt': '// Nuestro Trabajo',
    'port_title_alt': 'Proyectos Recientes',
    'port_cat_1': 'Doblaje y Localización IA',
    'port_name_1': 'Easy Dubbing',
    'port_view_alt': 'VISITAR PLATAFORMA',
    'port_cat_2': 'Plataforma Musical',
    'port_name_2': 'TuneMusics',
    'port_cat_3': 'Contenido y Publicación IA',
    'port_name_3': 'Social AI Publisher',
    'cta_badge_alt': '// ¿Listo Para Construir?',
    'cta_title_1_alt': 'Tu próximo proyecto',
    'cta_title_2_alt': 'puede empezar hoy.',
    'cta_sub_alt': 'Dinos qué quieres crear &mdash; y le daremos vida.',
    'cta_btn_alt': 'Ver Todos los Servicios',
}

it_keys = {
    'days_desc_1_alt': 'Ti aiutiamo a passare dall\'idea al progetto live in tempi record &mdash; senza sprecare mesi in riunioni o confusione tecnica.',
    'days_desc_2_alt': 'Che tu abbia bisogno di un sito web, e-commerce, SaaS, app mobile o sistema IA &mdash; DevelopIA è qui per realizzare la tua visione.',
    'stat_15': '&lt;15',
    'stat_15_lbl': 'Giorni al lancio',
    'stat_proj_types': 'Tipi di progetti',
    'stat_langs': 'Lingue',
    'stat_custom': 'Su misura',
    'what_we_build_title_1': 'Potenti Soluzioni Digitali',
    'what_we_build_title_2': 'Adattate al Tuo Business',
    'what_we_build_sub': 'Sviluppiamo tutto ciò di cui il tuo business ha bisogno per avere successo online &mdash; progettato, costruito e lanciato velocemente.',
    'srv_web_alt': 'Sito Web',
    'srv_web_desc_alt': 'Professionale, veloce e pronto SEO',
    'srv_saas_alt': 'Piattaforma SaaS',
    'srv_saas_desc_alt': 'App scalabili su abbonamento',
    'srv_mobile_alt': 'App Mobile',
    'srv_mobile_desc_alt': 'iOS, Android, Windows &amp; Mac',
    'srv_ai_alt': 'Strumento IA',
    'srv_ai_desc_alt': 'LLM, agenti e automazione',
    'srv_ecommerce_alt': 'E-Commerce',
    'srv_ecommerce_desc_alt': 'Vendi online, globalmente',
    'srv_booking_alt': 'Piattaforma di Prenotazione',
    'srv_booking_desc_alt': 'Prenotazioni e orari',
    'srv_crm_alt': 'Dashboard CRM',
    'srv_crm_desc_alt': 'Gestisci clienti e dati',
    'srv_admin_alt': 'Pannello di Amministrazione',
    'srv_admin_desc_alt': 'Interfacce di controllo totale',
    'srv_auto_alt': 'Sistema di Automazione',
    'srv_auto_desc_alt': 'Flussi di lavoro e pipeline',
    'srv_custom_alt': 'Web App su Misura',
    'srv_custom_desc_alt': 'Qualsiasi idea, 100% su misura',
    'proc_badge_alt': '// Dall\'Idea al Lancio',
    'proc_title_alt': 'Non Devi Essere Tecnico.',
    'proc_sub_alt': 'Tu porti l\'idea. Noi gestiamo il resto.',
    'proc_1_alt': 'Tu Porti l\'Idea',
    'proc_1_desc_alt': 'Dicci cosa vuoi costruire. Nessun background tecnico necessario &mdash; solo la tua visione.',
    'proc_2_alt': 'Progettiamo &amp; Costruiamo',
    'proc_2_desc_alt': 'Strategia, design UI/UX, sviluppo full-stack, IA, hosting &mdash; tutto gestito.',
    'proc_3_alt': 'Lanci &amp; Cresci',
    'proc_3_desc_alt': 'Il tuo progetto va live in tempi record. Inizia a vendere e crescere &mdash; più veloce che mai.',
    'why_1_title': 'La velocità conta',
    'why_1_desc_alt': 'Una buona idea non dovrebbe aspettare 6 mesi. Consegniamo in giorni, non mesi.',
    'why_2_title': 'Sviluppo assistito da IA',
    'why_2_desc_alt': 'Combiniamo l\'IA con l\'ingegneria del software per costruire in modo più intelligente.',
    'why_3_title': 'Architettura moderna',
    'why_3_desc_alt': 'Costruito per crescere con te &mdash; non qualcosa da ricostruire in 6 mesi.',
    'why_4_title': 'Mentalità orientata al business',
    'why_4_desc_alt': 'Combiniamo creatività, ingegneria e strategia per generare risultati.',
    'why_badge_alt': '// Perché DevelopIA',
    'why_title_1_alt': 'Perché oggi,',
    'why_title_2_alt': 'la velocità conta.',
    'why_sub_alt': 'DevelopIA combina creatività, ingegneria, automazione e strategia per creare prodotti digitali moderni.',
    'why_cta': 'Inizia Oggi',
    'port_badge_alt': '// Il Nostro Lavoro',
    'port_title_alt': 'Progetti Recenti',
    'port_cat_1': 'Doppiaggio &amp; Localizzazione IA',
    'port_name_1': 'Easy Dubbing',
    'port_view_alt': 'VISITA LA PIATTAFORMA',
    'port_cat_2': 'Piattaforma Musicale',
    'port_name_2': 'TuneMusics',
    'port_cat_3': 'Contenuti &amp; Pubblicazione IA',
    'port_name_3': 'Social AI Publisher',
    'cta_badge_alt': '// Pronto a Costruire?',
    'cta_title_1_alt': 'Il tuo prossimo progetto',
    'cta_title_2_alt': 'può iniziare oggi.',
    'cta_sub_alt': 'Dicci cosa vuoi creare &mdash; e gli daremo vita.',
    'cta_btn_alt': 'Vedi Tutti i Servizi',
}

ru_keys = {
    'days_desc_1_alt': 'Мы помогаем вам перейти от идеи к живому проекту в рекордные сроки &mdash; без долгих совещаний и технической путаницы.',
    'days_desc_2_alt': 'Независимо от того, нужен ли вам сайт, e-commerce, SaaS, мобильное приложение или система ИИ &mdash; DevelopIA воплотит это в реальность.',
    'stat_15': '&lt;15',
    'stat_15_lbl': 'Дней до запуска',
    'stat_proj_types': 'Типов проектов',
    'stat_langs': 'Языков',
    'stat_custom': 'Кастомно',
    'what_we_build_title_1': 'Мощные Цифровые Решения',
    'what_we_build_title_2': 'Адаптированные для Вашего Бизнеса',
    'what_we_build_sub': 'Мы разрабатываем всё, что нужно вашему бизнесу онлайн &mdash; спроектировано, создано и запущено быстро.',
    'srv_web_alt': 'Бизнес-Сайт',
    'srv_web_desc_alt': 'Профессионально, быстро и SEO-оптимизировано',
    'srv_saas_alt': 'SaaS-Платформа',
    'srv_saas_desc_alt': 'Масштабируемые приложения по подписке',
    'srv_mobile_alt': 'Мобильное Приложение',
    'srv_mobile_desc_alt': 'iOS, Android, Windows &amp; Mac',
    'srv_ai_alt': 'ИИ-Инструмент',
    'srv_ai_desc_alt': 'LLM, агенты и автоматизация',
    'srv_ecommerce_alt': 'E-Commerce',
    'srv_ecommerce_desc_alt': 'Продавайте онлайн по всему миру',
    'srv_booking_alt': 'Платформа Бронирования',
    'srv_booking_desc_alt': 'Бронирования и расписания',
    'srv_crm_alt': 'CRM Дашборд',
    'srv_crm_desc_alt': 'Управляйте клиентами и данными',
    'srv_admin_alt': 'Админ-Панель',
    'srv_admin_desc_alt': 'Интерфейсы полного контроля',
    'srv_auto_alt': 'Система Автоматизации',
    'srv_auto_desc_alt': 'Рабочие процессы',
    'srv_custom_alt': 'Кастомное Web App',
    'srv_custom_desc_alt': 'Любая идея, 100% на заказ',
    'proc_badge_alt': '// От Идеи к Запуску',
    'proc_title_alt': 'Вам не нужно быть технарем.',
    'proc_sub_alt': 'Вы приносите идею. Мы делаем остальное.',
    'proc_1_alt': 'Вы Приносите Идею',
    'proc_1_desc_alt': 'Скажите нам, что вы хотите создать. Технические знания не нужны &mdash; только ваше видение.',
    'proc_2_alt': 'Мы Проектируем и Создаем',
    'proc_2_desc_alt': 'Стратегия, дизайн UI/UX, full-stack разработка, ИИ, хостинг &mdash; всё под контролем.',
    'proc_3_alt': 'Вы Запускаетесь и Растете',
    'proc_3_desc_alt': 'Ваш проект запускается в рекордные сроки. Начинайте продажи и рост.',
    'why_1_title': 'Скорость имеет значение',
    'why_1_desc_alt': 'Хорошая идея не должна ждать 6 месяцев. Мы доставляем за дни, а не месяцы.',
    'why_2_title': 'Разработка с помощью ИИ',
    'why_2_desc_alt': 'Мы комбинируем ИИ с инженерией для более умной разработки.',
    'why_3_title': 'Современная архитектура',
    'why_3_desc_alt': 'Создано для роста вместе с вами &mdash; не нужно переделывать через 6 месяцев.',
    'why_4_title': 'Бизнес-ориентированность',
    'why_4_desc_alt': 'Мы комбинируем творчество, инженерию и стратегию для генерации результатов.',
    'why_badge_alt': '// Почему DevelopIA',
    'why_title_1_alt': 'Потому что сегодня,',
    'why_title_2_alt': 'скорость важна.',
    'why_sub_alt': 'DevelopIA объединяет креативность, инженерию, автоматизацию и стратегию для создания современных цифровых продуктов.',
    'why_cta': 'Начать Сегодня',
    'port_badge_alt': '// Наша Работа',
    'port_title_alt': 'Недавние Проекты',
    'port_cat_1': 'ИИ Дублирование &amp; Локализация',
    'port_name_1': 'Easy Dubbing',
    'port_view_alt': 'ПОСЕТИТЬ ПЛАТФОРМУ',
    'port_cat_2': 'Музыкальная Платформа',
    'port_name_2': 'TuneMusics',
    'port_cat_3': 'ИИ Контент &amp; Публикация',
    'port_name_3': 'Social AI Publisher',
    'cta_badge_alt': '// Готовы Создать Что-то?',
    'cta_title_1_alt': 'Ваш следующий проект',
    'cta_title_2_alt': 'может начаться сегодня.',
    'cta_sub_alt': 'Скажите нам, что вы хотите создать &mdash; и мы воплотим это в жизнь.',
    'cta_btn_alt': 'Посмотреть Все Услуги',
}

def clean_html_line(line):
    # Some texts might be deeply embedded, but let's do simple replaces
    pass

def inject_html_tags():
    with open('index.html', 'r', encoding='utf-8') as f:
        html = f.read()
    
    for key, text in en_keys.items():
        # First, try strict replacement
        target1 = f'>{text}<'
        replacement1 = f' data-i18n="index.{key}">{text}<'
        
        target2 = f'>{text} <'
        replacement2 = f' data-i18n="index.{key}">{text} <'
        
        target3 = f'>{text}&mdash;'
        replacement3 = f' data-i18n="index.{key}">{text}&mdash;'

        if target1 in html:
            html = html.replace(target1, replacement1)
        elif target2 in html:
            html = html.replace(target2, replacement2)
        else:
            # Fallback: Just replace the exact string with a span if it's not inside an existing attribute
            # Be very careful not to break tags
            # We will use regex to find the text outside of tags
            
            # Simple workaround: if it's not found with exact brackets, just replace the exact text
            # provided it's a long enough distinctive string
            if text in html:
                # We'll just wrap it in a span, assuming it's safe
                html = html.replace(text, f'<span data-i18n="index.{key}">{text}</span>')
                
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(html)

def update_i18n_ts():
    with open('i18n.ts', 'r', encoding='utf-8') as f:
        content = f.read()
    
    langs_dict = {
        'en: {': en_keys,
        'fr: {': fr_keys,
        'es: {': es_keys,
        'it: {': it_keys,
        'ru: {': ru_keys
    }
    
    lines = content.split('\n')
    out_lines = []
    
    current_lang = None
    
    for line in lines:
        out_lines.append(line)
        
        for lang_start in langs_dict.keys():
            if line.strip().startswith(lang_start):
                current_lang = lang_start
                break
                
        if current_lang and line.strip().startswith('index: {'):
            # inject keys
            keys = langs_dict[current_lang]
            for k, v in keys.items():
                v = v.replace('"', '\\"')
                out_lines.append(f'      {k}: "{v}",')
            current_lang = None
            
    with open('i18n.ts', 'w', encoding='utf-8') as f:
        f.write('\n'.join(out_lines))

if __name__ == '__main__':
    inject_html_tags()
    update_i18n_ts()
    print('Translations applied completely.')

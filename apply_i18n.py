import re

en_keys = {
    'hero_badge': '15 Days &middot; Idea to Live',
    'hero_title_1': 'DevelopIA &mdash;',
    'hero_title_2': 'Your Vision, Built Fast.',
    'hero_subtitle_1': 'You have an idea.',
    'hero_subtitle_2': 'We turn it into reality.',
    'hero_desc': 'We create modern websites, SaaS platforms, mobile applications, dashboards, AI tools, and digital systems &mdash; for entrepreneurs, companies, and creators who want to move',
    'hero_desc_fast': 'fast.',
    'start_project': 'Start Your Project &rarr;',
    'see_services': 'See Our Services',
    
    'days_badge': 'Speed is our advantage',
    'days_title_1': 'Launch in',
    'days_title_2': 'Less Than 15 Days.',
    'days_desc_1': 'We help you go from idea to live project in record time, without wasting months in endless meetings, complicated processes, or technical confusion.',
    'days_desc_2': 'Whether you need a professional business website, an e-commerce platform, a SaaS product, a mobile app, an AI automation tool, or a complete custom system, DevelopIA is here to make your wish come true.',
    
    'stat_days': '&lt; 15 Days',
    'stat_days_lbl': 'Average Launch',
    'stat_proj': '10+',
    'stat_proj_lbl': 'Projects Delivered',
    'stat_lang': '5',
    'stat_lang_lbl': 'Languages Supported',
    'stat_code': '100%',
    'stat_code_lbl': 'Custom Code',
    
    'what_we_build': 'What We Build',
    'what_we_build_desc': 'We develop powerful digital solutions adapted to your business.',
    
    'srv_web': 'Business Websites',
    'srv_web_desc': 'High-performance, beautifully designed websites that convert visitors into customers.',
    'srv_saas': 'SaaS Platforms',
    'srv_saas_desc': 'Scalable software-as-a-service products with subscriptions, dashboards, and complex logic.',
    'srv_mobile': 'Mobile Apps',
    'srv_mobile_desc': 'Native iOS and Android applications for your users on the go.',
    'srv_ai': 'AI Tools',
    'srv_ai_desc': 'Custom AI integrations, LLM fine-tuning, and automation bots to 10x productivity.',
    'srv_ecommerce': 'E-Commerce',
    'srv_ecommerce_desc': 'Complete online stores with payment processing and inventory management.',
    'srv_booking': 'Booking Systems',
    'srv_booking_desc': 'Automated scheduling and reservation platforms for service businesses.',
    'srv_crm': 'Custom CRMs',
    'srv_crm_desc': 'Internal tools tailored exactly to your sales and operational workflows.',
    'srv_admin': 'Admin Dashboards',
    'srv_admin_desc': 'Powerful back-office interfaces to manage your data and analytics.',
    'srv_auto': 'Automations',
    'srv_auto_desc': 'Connecting APIs and services to automate repetitive manual tasks.',
    'srv_desktop': 'Desktop Apps',
    'srv_desktop_desc': 'Cross-platform Windows and Mac applications for heavy workflows.',
    
    'process_badge': 'How It Works',
    'process_title': 'Our Process',
    
    'proc_1': 'Idea &amp; Strategy',
    'proc_1_desc': 'We listen to your vision and define the exact technical requirements to build it.',
    'proc_2': 'Design &amp; Build',
    'proc_2_desc': 'We design the UI/UX and develop the code simultaneously for maximum speed.',
    'proc_3': 'Launch &amp; Grow',
    'proc_3_desc': 'We deploy your project to production, fully optimized and ready for users.',
    
    'why_badge': 'Why Choose Us',
    'why_title': 'Because today, speed matters.',
    
    'why_1': 'Lightning Fast',
    'why_1_desc': 'We ship production-ready code in days, not months.',
    'why_2': 'Premium Quality',
    'why_2_desc': 'We don&#39;t compromise on design or performance.',
    'why_3': 'Latest Tech',
    'why_3_desc': 'Built with cutting-edge frameworks and AI.',
    'why_4': 'All-in-One',
    'why_4_desc': 'Design, frontend, backend, and deployment included.',
    
    'port_badge': 'Our Work',
    'port_title': 'Recent Projects',
    'port_view': 'View Project &rarr;',
    
    'cta_title_new': 'Your next project can start today.',
    'cta_subtitle_new': 'DevelopIA &mdash; We develop your ideas into reality.',
}

fr_keys = {
    'hero_badge': '15 Jours &middot; De l&#39;idée au Lancement',
    'hero_title_1': 'DevelopIA &mdash;',
    'hero_title_2': 'Votre Vision, Réalisée Rapidement.',
    'hero_subtitle_1': 'Vous avez une idée.',
    'hero_subtitle_2': 'Nous la transformons en réalité.',
    'hero_desc': 'Nous créons des sites web modernes, plateformes SaaS, applications mobiles, tableaux de bord, outils IA et systèmes numériques &mdash; pour les entrepreneurs et créateurs qui veulent avancer',
    'hero_desc_fast': 'vite.',
    'start_project': 'Démarrer Votre Projet &rarr;',
    'see_services': 'Voir Nos Services',
    
    'days_badge': 'La rapidité est notre atout',
    'days_title_1': 'Lancement en',
    'days_title_2': 'Moins de 15 Jours.',
    'days_desc_1': 'Nous vous aidons à passer de l&#39;idée au projet en un temps record, sans perdre des mois en réunions inutiles ou en confusions techniques.',
    'days_desc_2': 'Que vous ayez besoin d&#39;un site vitrine professionnel, d&#39;une boutique e-commerce, d&#39;un SaaS, d&#39;une app mobile, d&#39;une IA ou d&#39;un système sur mesure, DevelopIA réalise votre souhait.',
    
    'stat_days': '&lt; 15 Jours',
    'stat_days_lbl': 'Lancement Moyen',
    'stat_proj': '10+',
    'stat_proj_lbl': 'Projets Livrés',
    'stat_lang': '5',
    'stat_lang_lbl': 'Langues Supportées',
    'stat_code': '100%',
    'stat_code_lbl': 'Code Sur Mesure',
    
    'what_we_build': 'Ce Que Nous Construisons',
    'what_we_build_desc': 'Nous développons des solutions numériques puissantes adaptées à votre entreprise.',
    
    'srv_web': 'Sites Web d&#39;Entreprise',
    'srv_web_desc': 'Des sites web très performants et magnifiquement conçus qui convertissent vos visiteurs.',
    'srv_saas': 'Plateformes SaaS',
    'srv_saas_desc': 'Produits logiciels évolutifs avec abonnements, tableaux de bord et logique complexe.',
    'srv_mobile': 'Applications Mobiles',
    'srv_mobile_desc': 'Applications iOS et Android natives pour vos utilisateurs en déplacement.',
    'srv_ai': 'Outils IA',
    'srv_ai_desc': 'Intégrations IA personnalisées, affinage LLM et bots pour décupler votre productivité.',
    'srv_ecommerce': 'E-Commerce',
    'srv_ecommerce_desc': 'Boutiques en ligne complètes avec traitement des paiements et gestion des stocks.',
    'srv_booking': 'Systèmes de Réservation',
    'srv_booking_desc': 'Plateformes automatisées de planification pour les entreprises de services.',
    'srv_crm': 'CRM Sur Mesure',
    'srv_crm_desc': 'Outils internes adaptés exactement à vos flux opérationnels et de vente.',
    'srv_admin': 'Tableaux de Bord',
    'srv_admin_desc': 'Interfaces back-office puissantes pour gérer vos données et analyses.',
    'srv_auto': 'Automatisations',
    'srv_auto_desc': 'Connexion d&#39;APIs et de services pour automatiser les tâches manuelles répétitives.',
    'srv_desktop': 'Applications de Bureau',
    'srv_desktop_desc': 'Applications Windows et Mac multiplateformes pour les flux de travail lourds.',
    
    'process_badge': 'Comment Ça Marche',
    'process_title': 'Notre Processus',
    
    'proc_1': 'Idée &amp; Stratégie',
    'proc_1_desc': 'Nous écoutons votre vision et définissons les exigences techniques pour la construire.',
    'proc_2': 'Design &amp; Développement',
    'proc_2_desc': 'Nous concevons l&#39;UI/UX et développons le code simultanément pour une vitesse maximale.',
    'proc_3': 'Lancement &amp; Croissance',
    'proc_3_desc': 'Nous déployons votre projet en production, entièrement optimisé et prêt.',
    
    'why_badge': 'Pourquoi Nous Choisir',
    'why_title': 'Car aujourd&#39;hui, la vitesse compte.',
    
    'why_1': 'Ultra Rapide',
    'why_1_desc': 'Nous livrons du code prêt pour la production en jours, pas en mois.',
    'why_2': 'Qualité Premium',
    'why_2_desc': 'Nous ne faisons aucun compromis sur le design ni sur les performances.',
    'why_3': 'Dernières Technologies',
    'why_3_desc': 'Conçu avec les frameworks de pointe et l&#39;Intelligence Artificielle.',
    'why_4': 'Tout En Un',
    'why_4_desc': 'Design, frontend, backend et déploiement inclus.',
    
    'port_badge': 'Nos Travaux',
    'port_title': 'Projets Récents',
    'port_view': 'Voir le Projet &rarr;',
    
    'cta_title_new': 'Votre prochain projet peut commencer aujourd&#39;hui.',
    'cta_subtitle_new': 'DevelopIA &mdash; Nous transformons vos idées en réalité.',
}

es_keys = {
    'hero_badge': '15 Días &middot; De la Idea al Lanzamiento',
    'hero_title_1': 'DevelopIA &mdash;',
    'hero_title_2': 'Tu Visión, Creada Rápido.',
    'hero_subtitle_1': 'Tienes una idea.',
    'hero_subtitle_2': 'Nosotros la hacemos realidad.',
    'hero_desc': 'Creamos sitios web modernos, plataformas SaaS, aplicaciones móviles, paneles de control, herramientas de IA y sistemas digitales &mdash; para emprendedores que quieren avanzar',
    'hero_desc_fast': 'rápido.',
    'start_project': 'Iniciar Tu Proyecto &rarr;',
    'see_services': 'Ver Nuestros Servicios',
    
    'days_badge': 'La velocidad es nuestra ventaja',
    'days_title_1': 'Lanzamiento en',
    'days_title_2': 'Menos de 15 Días.',
    'days_desc_1': 'Te ayudamos a pasar de la idea al proyecto en vivo en un tiempo récord, sin desperdiciar meses en reuniones interminables o confusiones técnicas.',
    'days_desc_2': 'Ya sea que necesites un sitio web profesional, comercio electrónico, SaaS, una app móvil, IA o un sistema personalizado, DevelopIA está aquí para hacerlo realidad.',
    
    'stat_days': '&lt; 15 Días',
    'stat_days_lbl': 'Lanzamiento Promedio',
    'stat_proj': '10+',
    'stat_proj_lbl': 'Proyectos Entregados',
    'stat_lang': '5',
    'stat_lang_lbl': 'Idiomas Soportados',
    'stat_code': '100%',
    'stat_code_lbl': 'Código Personalizado',
    
    'what_we_build': 'Lo Que Construimos',
    'what_we_build_desc': 'Desarrollamos soluciones digitales potentes adaptadas a tu negocio.',
    
    'srv_web': 'Sitios Web',
    'srv_web_desc': 'Sitios web de alto rendimiento y bellamente diseñados que convierten a tus visitantes.',
    'srv_saas': 'Plataformas SaaS',
    'srv_saas_desc': 'Productos de software como servicio escalables con suscripciones y paneles.',
    'srv_mobile': 'Aplicaciones Móviles',
    'srv_mobile_desc': 'Aplicaciones nativas de iOS y Android para tus usuarios en movimiento.',
    'srv_ai': 'Herramientas de IA',
    'srv_ai_desc': 'Integraciones de IA, ajuste fino de LLM y bots de automatización.',
    'srv_ecommerce': 'E-Commerce',
    'srv_ecommerce_desc': 'Tiendas en línea completas con procesamiento de pagos y gestión de inventario.',
    'srv_booking': 'Sistemas de Reservas',
    'srv_booking_desc': 'Plataformas de programación y reservas para empresas de servicios.',
    'srv_crm': 'CRM Personalizados',
    'srv_crm_desc': 'Herramientas internas adaptadas exactamente a tus flujos operativos.',
    'srv_admin': 'Paneles de Administración',
    'srv_admin_desc': 'Potentes interfaces back-office para gestionar tus datos y análisis.',
    'srv_auto': 'Automatizaciones',
    'srv_auto_desc': 'Conexión de APIs y servicios para automatizar tareas manuales repetitivas.',
    'srv_desktop': 'Aplicaciones de Escritorio',
    'srv_desktop_desc': 'Aplicaciones multiplataforma para Windows y Mac para flujos de trabajo pesados.',
    
    'process_badge': 'Cómo Funciona',
    'process_title': 'Nuestro Proceso',
    
    'proc_1': 'Idea y Estrategia',
    'proc_1_desc': 'Escuchamos tu visión y definimos los requisitos técnicos exactos.',
    'proc_2': 'Diseño y Desarrollo',
    'proc_2_desc': 'Diseñamos la UI/UX y desarrollamos el código simultáneamente.',
    'proc_3': 'Lanzamiento y Crecimiento',
    'proc_3_desc': 'Implementamos tu proyecto en producción, optimizado y listo para usar.',
    
    'why_badge': 'Por Qué Elegirnos',
    'why_title': 'Porque hoy, la velocidad importa.',
    
    'why_1': 'Ultra Rápido',
    'why_1_desc': 'Entregamos código listo para producción en días, no en meses.',
    'why_2': 'Calidad Premium',
    'why_2_desc': 'No comprometemos el diseño ni el rendimiento.',
    'why_3': 'Última Tecnología',
    'why_3_desc': 'Construido con frameworks de vanguardia e Inteligencia Artificial.',
    'why_4': 'Todo en Uno',
    'why_4_desc': 'Diseño, frontend, backend e implementación incluidos.',
    
    'port_badge': 'Nuestro Trabajo',
    'port_title': 'Proyectos Recientes',
    'port_view': 'Ver Proyecto &rarr;',
    
    'cta_title_new': 'Tu próximo proyecto puede comenzar hoy.',
    'cta_subtitle_new': 'DevelopIA &mdash; Convertimos tus ideas en realidad.',
}

it_keys = {
    'hero_badge': '15 Giorni &middot; Dall&#39;Idea al Lancio',
    'hero_title_1': 'DevelopIA &mdash;',
    'hero_title_2': 'La Tua Visione, Costruita Veloce.',
    'hero_subtitle_1': 'Hai un&#39;idea.',
    'hero_subtitle_2': 'Noi la trasformiamo in realtà.',
    'hero_desc': 'Creiamo siti web moderni, piattaforme SaaS, app mobili, dashboard, strumenti IA e sistemi digitali &mdash; per imprenditori e creatori che vogliono muoversi',
    'hero_desc_fast': 'veloci.',
    'start_project': 'Inizia il Tuo Progetto &rarr;',
    'see_services': 'Vedi i Nostri Servizi',
    
    'days_badge': 'La velocità è il nostro vantaggio',
    'days_title_1': 'Lancio in',
    'days_title_2': 'Meno di 15 Giorni.',
    'days_desc_1': 'Ti aiutiamo a passare dall&#39;idea al progetto live in tempi record, senza sprecare mesi in riunioni infinite o confusione tecnica.',
    'days_desc_2': 'Che tu abbia bisogno di un sito web, un e-commerce, un SaaS, un&#39;app mobile, un&#39;IA o un sistema su misura, DevelopIA realizza il tuo desiderio.',
    
    'stat_days': '&lt; 15 Giorni',
    'stat_days_lbl': 'Lancio Medio',
    'stat_proj': '10+',
    'stat_proj_lbl': 'Progetti Consegnati',
    'stat_lang': '5',
    'stat_lang_lbl': 'Lingue Supportate',
    'stat_code': '100%',
    'stat_code_lbl': 'Codice Personalizzato',
    
    'what_we_build': 'Cosa Costruiamo',
    'what_we_build_desc': 'Sviluppiamo potenti soluzioni digitali adattate al tuo business.',
    
    'srv_web': 'Siti Web',
    'srv_web_desc': 'Siti web ad alte prestazioni che convertono i visitatori in clienti.',
    'srv_saas': 'Piattaforme SaaS',
    'srv_saas_desc': 'Prodotti software-as-a-service scalabili con abbonamenti e logica complessa.',
    'srv_mobile': 'App Mobili',
    'srv_mobile_desc': 'Applicazioni native iOS e Android per i tuoi utenti in movimento.',
    'srv_ai': 'Strumenti IA',
    'srv_ai_desc': 'Integrazioni IA personalizzate, fine-tuning LLM e bot di automazione.',
    'srv_ecommerce': 'E-Commerce',
    'srv_ecommerce_desc': 'Negozi online completi con elaborazione pagamenti e gestione inventario.',
    'srv_booking': 'Sistemi di Prenotazione',
    'srv_booking_desc': 'Piattaforme di programmazione automatizzata per le aziende di servizi.',
    'srv_crm': 'CRM Personalizzati',
    'srv_crm_desc': 'Strumenti interni adattati esattamente ai tuoi flussi operativi e di vendita.',
    'srv_admin': 'Dashboard di Amministrazione',
    'srv_admin_desc': 'Potenti interfacce back-office per gestire i tuoi dati e analisi.',
    'srv_auto': 'Automazioni',
    'srv_auto_desc': 'Connessione di API e servizi per automatizzare compiti manuali ripetitivi.',
    'srv_desktop': 'App Desktop',
    'srv_desktop_desc': 'Applicazioni multipiattaforma Windows e Mac per flussi di lavoro pesanti.',
    
    'process_badge': 'Come Funziona',
    'process_title': 'Il Nostro Processo',
    
    'proc_1': 'Idea &amp; Strategia',
    'proc_1_desc': 'Ascoltiamo la tua visione e definiamo i requisiti tecnici per costruirla.',
    'proc_2': 'Design &amp; Sviluppo',
    'proc_2_desc': 'Progettiamo la UI/UX e sviluppiamo il codice simultaneamente per la massima velocità.',
    'proc_3': 'Lancio &amp; Crescita',
    'proc_3_desc': 'Implementiamo il tuo progetto in produzione, ottimizzato e pronto per gli utenti.',
    
    'why_badge': 'Perché Sceglierci',
    'why_title': 'Perché oggi, la velocità conta.',
    
    'why_1': 'Ultra Veloce',
    'why_1_desc': 'Consegniamo codice pronto per la produzione in giorni, non in mesi.',
    'why_2': 'Qualità Premium',
    'why_2_desc': 'Non scendiamo a compromessi su design o prestazioni.',
    'why_3': 'Ultima Tecnologia',
    'why_3_desc': 'Costruito con framework all&#39;avanguardia e Intelligenza Artificiale.',
    'why_4': 'Tutto Incluso',
    'why_4_desc': 'Design, frontend, backend e implementazione inclusi.',
    
    'port_badge': 'Il Nostro Lavoro',
    'port_title': 'Progetti Recenti',
    'port_view': 'Vedi Progetto &rarr;',
    
    'cta_title_new': 'Il tuo prossimo progetto può iniziare oggi.',
    'cta_subtitle_new': 'DevelopIA &mdash; Trasformiamo le tue idee in realtà.',
}

ru_keys = {
    'hero_badge': '15 &#1044;&#1085;&#1077;&#1081; &middot; &#1054;&#1090; &#1048;&#1076;&#1077;&#1080; &#1076;&#1086; &#1047;&#1072;&#1087;&#1091;&#1089;&#1082;&#1072;',
    'hero_title_1': 'DevelopIA &mdash;',
    'hero_title_2': '&#1042;&#1072;&#1096;&#1077; &#1042;&#1080;&#1076;&#1077;&#1085;&#1080;&#1077;, &#1057;&#1086;&#1079;&#1076;&#1072;&#1085;&#1086; &#1041;&#1099;&#1089;&#1090;&#1088;&#1086;.',
    'hero_subtitle_1': '&#1059; &#1074;&#1072;&#1089; &#1077;&#1089;&#1090;&#1090; &#1080;&#1076;&#1077;&#1090;.',
    'hero_subtitle_2': '&#1052;&#1099; &#1074;&#1086;&#1087;&#1083;&#1086;&#1097;&#1072;&#1077;&#1084; &#1077;&#1077; &#1074; &#1088;&#1077;&#1072;&#1083;&#1090;&#1085;&#1086;&#1089;&#1090;&#1090;.',
    'hero_desc': '&#1052;&#1099; &#1089;&#1086;&#1079;&#1076;&#1072;&#1077;&#1084; &#1089;&#1086;&#1074;&#1088;&#1077;&#1084;&#1077;&#1085;&#1085;&#1099;&#1077; &#1074;&#1077;&#1073;-&#1089;&#1072;&#1081;&#1090;&#1099;, SaaS-&#1087;&#1083;&#1072;&#1090;&#1092;&#1086;&#1088;&#1084;&#1099;, &#1084;&#1086;&#1073;&#1080;&#1083;&#1090;&#1085;&#1099;&#1077; &#1087;&#1088;&#1080;&#1083;&#1086;&#1078;&#1077;&#1085;&#1080;&#1090;, AI-&#1080;&#1085;&#1089;&#1090;&#1088;&#1091;&#1084;&#1077;&#1085;&#1090;&#1099; &mdash; &#1076;&#1083;&#1090; &#1090;&#1077;&#1093;, &#1082;&#1090;&#1086; &#1093;&#1086;&#1095;&#1077;&#1090; &#1076;&#1074;&#1080;&#1073;&#1072;&#1090;&#1090;&#1089;&#1090;',
    'hero_desc_fast': '&#1073;&#1099;&#1089;&#1090;&#1088;&#1086;.',
    'start_project': '&#1053;&#1072;&#1095;&#1072;&#1090;&#1090; &#1055;&#1088;&#1086;&#1077;&#1082;&#1090; &rarr;',
    'see_services': '&#1053;&#1072;&#1096;&#1080; &#1059;&#1089;&#1083;&#1091;&#1073;&#1080;',
    
    'days_badge': '&#1057;&#1082;&#1086;&#1088;&#1086;&#1089;&#1090;&#1090; - &#1085;&#1072;&#1096;&#1077; &#1087;&#1088;&#1077;&#1080;&#1084;&#1091;&#1097;&#1077;&#1089;&#1090;&#1074;&#1086;',
    'days_title_1': '&#1047;&#1072;&#1087;&#1091;&#1089;&#1082; &#1074;',
    'days_title_2': '&#1052;&#1077;&#1085;&#1077;&#1077; &#1063;&#1077;&#1084; 15 &#1044;&#1085;&#1077;&#1081;.',
    'days_desc_1': '&#1052;&#1099; &#1087;&#1086;&#1084;&#1086;&#1073;&#1072;&#1077;&#1084; &#1074;&#1072;&#1084; &#1087;&#1077;&#1088;&#1077;&#1081;&#1090;&#1080; &#1086;&#1090; &#1080;&#1076;&#1077;&#1080; &#1082; &#1078;&#1080;&#1074;&#1086;&#1084;&#1091; &#1087;&#1088;&#1086;&#1077;&#1082;&#1090;&#1091; &#1074; &#1088;&#1077;&#1082;&#1086;&#1088;&#1076;&#1085;&#1099;&#1077; &#1089;&#1088;&#1086;&#1082;&#1080;.',
    'days_desc_2': '&#1053;&#1091;&#1078;&#1077;&#1085; &#1083;&#1080; &#1074;&#1072;&#1084; &#1074;&#1077;&#1073;-&#1089;&#1072;&#1081;&#1090;, SaaS, &#1084;&#1086;&#1073;&#1080;&#1083;&#1090;&#1085;&#1086;&#1077; &#1087;&#1088;&#1080;&#1083;&#1086;&#1078;&#1077;&#1085;&#1080;&#1077; &#1080;&#1083;&#1080; &#1048;&#1048;-&#1080;&#1085;&#1089;&#1090;&#1088;&#1091;&#1084;&#1077;&#1085;&#1090;, DevelopIA &#1079;&#1076;&#1077;&#1089;&#1090;, &#1095;&#1090;&#1086;&#1073;&#1099; &#1089;&#1076;&#1077;&#1083;&#1072;&#1090;&#1090; &#1101;&#1090;&#1086;.',
    
    'stat_days': '&lt; 15 &#1044;&#1085;&#1077;&#1081;',
    'stat_days_lbl': '&#1057;&#1088;&#1077;&#1076;&#1085;&#1080;&#1081; &#1047;&#1072;&#1087;&#1091;&#1089;&#1082;',
    'stat_proj': '10+',
    'stat_proj_lbl': '&#1055;&#1088;&#1086;&#1077;&#1082;&#1090;&#1086;&#1074;',
    'stat_lang': '5',
    'stat_lang_lbl': '&#1071;&#1079;&#1099;&#1082;&#1086;&#1074;',
    'stat_code': '100%',
    'stat_code_lbl': '&#1050;&#1072;&#1089;&#1090;&#1086;&#1084;&#1085;&#1099;&#1081; &#1050;&#1086;&#1076;',
    
    'what_we_build': '&#1063;&#1090;&#1086; &#1052;&#1099; &#1057;&#1086;&#1079;&#1076;&#1072;&#1077;&#1084;',
    'what_we_build_desc': '&#1052;&#1099; &#1088;&#1072;&#1079;&#1088;&#1072;&#1073;&#1072;&#1090;&#1099;&#1074;&#1072;&#1077;&#1084; &#1084;&#1086;&#1097;&#1085;&#1099;&#1077; &#1094;&#1080;&#1092;&#1088;&#1086;&#1074;&#1099;&#1077; &#1088;&#1077;&#1096;&#1077;&#1085;&#1080;&#1090;.',
    
    'srv_web': '&#1042;&#1077;&#1073;-&#1057;&#1072;&#1081;&#1090;&#1099;',
    'srv_web_desc': '&#1042;&#1099;&#1089;&#1086;&#1082;&#1086;&#1087;&#1088;&#1086;&#1080;&#1079;&#1074;&#1086;&#1076;&#1080;&#1090;&#1077;&#1083;&#1090;&#1085;&#1099;&#1077; &#1089;&#1072;&#1081;&#1090;&#1099;, &#1082;&#1086;&#1090;&#1086;&#1088;&#1099;&#1077; &#1082;&#1086;&#1085;&#1074;&#1077;&#1088;&#1090;&#1080;&#1088;&#1091;&#1092;&#1090;.',
    'srv_saas': 'SaaS-&#1055;&#1083;&#1072;&#1090;&#1092;&#1086;&#1088;&#1084;&#1099;',
    'srv_saas_desc': '&#1052;&#1072;&#1089;&#1096;&#1090;&#1072;&#1073;&#1080;&#1088;&#1091;&#1077;&#1084;&#1099;&#1077; SaaS-&#1087;&#1088;&#1086;&#1076;&#1091;&#1082;&#1090;&#1099; &#1089; &#1087;&#1086;&#1076;&#1087;&#1080;&#1089;&#1082;&#1072;&#1084;&#1080;.',
    'srv_mobile': '&#1052;&#1086;&#1073;&#1080;&#1083;&#1090;&#1085;&#1099;&#1077; &#1055;&#1088;&#1080;&#1083;&#1086;&#1078;&#1077;&#1085;&#1080;&#1090;',
    'srv_mobile_desc': '&#1053;&#1072;&#1090;&#1080;&#1074;&#1085;&#1099;&#1077; iOS &#1080; Android &#1087;&#1088;&#1080;&#1083;&#1086;&#1078;&#1077;&#1085;&#1080;&#1090;.',
    'srv_ai': 'AI-&#1048;&#1085;&#1089;&#1090;&#1088;&#1091;&#1084;&#1077;&#1085;&#1090;&#1099;',
    'srv_ai_desc': '&#1048;&#1085;&#1090;&#1077;&#1073;&#1088;&#1072;&#1094;&#1080;&#1090; &#1048;&#1048; &#1080; &#1073;&#1086;&#1090;&#1099; &#1072;&#1074;&#1090;&#1086;&#1084;&#1072;&#1090;&#1080;&#1079;&#1072;&#1094;&#1080;&#1080;.',
    'srv_ecommerce': 'E-Commerce',
    'srv_ecommerce_desc': '&#1055;&#1086;&#1083;&#1085;&#1099;&#1077; &#1080;&#1085;&#1090;&#1077;&#1088;&#1085;&#1077;&#1090;-&#1084;&#1072;&#1073;&#1072;&#1079;&#1080;&#1085;&#1099;.',
    'srv_booking': '&#1057;&#1080;&#1089;&#1090;&#1077;&#1084;&#1099; &#1041;&#1088;&#1086;&#1085;&#1080;&#1088;&#1086;&#1074;&#1072;&#1085;&#1080;&#1090;',
    'srv_booking_desc': '&#1040;&#1074;&#1090;&#1086;&#1084;&#1072;&#1090;&#1080;&#1079;&#1080;&#1088;&#1086;&#1074;&#1072;&#1085;&#1085;&#1099;&#1077; &#1087;&#1083;&#1072;&#1090;&#1092;&#1086;&#1088;&#1084;&#1099; &#1073;&#1088;&#1086;&#1085;&#1080;&#1088;&#1086;&#1074;&#1072;&#1085;&#1080;&#1090;.',
    'srv_crm': 'CRM &#1057;&#1080;&#1089;&#1090;&#1077;&#1084;&#1099;',
    'srv_crm_desc': '&#1042;&#1085;&#1091;&#1090;&#1088;&#1077;&#1085;&#1085;&#1080;&#1077; &#1080;&#1085;&#1089;&#1090;&#1088;&#1091;&#1084;&#1077;&#1085;&#1090;&#1099; &#1076;&#1083;&#1090; &#1074;&#1072;&#1096;&#1080;&#1093; &#1087;&#1088;&#1086;&#1094;&#1077;&#1089;&#1089;&#1086;&#1074;.',
    'srv_admin': '&#1040;&#1076;&#1084;&#1080;&#1085;-&#1055;&#1072;&#1085;&#1077;&#1083;&#1080;',
    'srv_admin_desc': '&#1052;&#1086;&#1097;&#1085;&#1099;&#1077; &#1080;&#1085;&#1090;&#1077;&#1088;&#1092;&#1077;&#1081;&#1089;&#1099; &#1076;&#1083;&#1090; &#1091;&#1087;&#1088;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1090; &#1076;&#1072;&#1085;&#1085;&#1099;&#1084;&#1080;.',
    'srv_auto': '&#1040;&#1074;&#1090;&#1086;&#1084;&#1072;&#1090;&#1080;&#1079;&#1072;&#1094;&#1080;&#1080;',
    'srv_auto_desc': '&#1055;&#1086;&#1076;&#1082;&#1083;&#1102;&#1095;&#1077;&#1085;&#1080;&#1077; API &#1080; &#1089;&#1077;&#1088;&#1074;&#1080;&#1089;&#1086;&#1074;.',
    'srv_desktop': '&#1044;&#1077;&#1089;&#1082;&#1090;&#1086;&#1087;&#1085;&#1099;&#1077; &#1055;&#1088;&#1080;&#1083;&#1086;&#1078;&#1077;&#1085;&#1080;&#1090;',
    'srv_desktop_desc': '&#1050;&#1088;&#1086;&#1089;&#1089;&#1087;&#1083;&#1072;&#1090;&#1092;&#1086;&#1088;&#1084;&#1077;&#1085;&#1085;&#1099;&#1077; Windows &#1080; Mac &#1087;&#1088;&#1080;&#1083;&#1086;&#1078;&#1077;&#1085;&#1080;&#1090;.',
    
    'process_badge': '&#1050;&#1072;&#1082; &#1069;&#1090;&#1086; &#1056;&#1072;&#1073;&#1086;&#1090;&#1072;&#1077;&#1090;',
    'process_title': '&#1053;&#1072;&#1096; &#1055;&#1088;&#1086;&#1094;&#1077;&#1089;&#1089;',
    
    'proc_1': '&#1048;&#1076;&#1077;&#1090; &#1080; &#1057;&#1090;&#1088;&#1072;&#1090;&#1077;&#1073;&#1080;&#1090;',
    'proc_1_desc': '&#1052;&#1099; &#1089;&#1083;&#1091;&#1096;&#1072;&#1077;&#1084; &#1074;&#1072;&#1096;&#1077; &#1074;&#1080;&#1076;&#1077;&#1085;&#1080;&#1077; &#1080; &#1086;&#1087;&#1088;&#1077;&#1076;&#1077;&#1083;&#1090;&#1077;&#1084; &#1090;&#1077;&#1093;&#1085;&#1080;&#1095;&#1077;&#1089;&#1082;&#1080;&#1077; &#1090;&#1088;&#1077;&#1073;&#1086;&#1074;&#1072;&#1085;&#1080;&#1090;.',
    'proc_2': '&#1044;&#1080;&#1079;&#1072;&#1081;&#1085; &#1080; &#1050;&#1086;&#1076;',
    'proc_2_desc': '&#1052;&#1099; &#1088;&#1072;&#1079;&#1088;&#1072;&#1073;&#1072;&#1090;&#1099;&#1074;&#1072;&#1077;&#1084; UI/UX &#1080; &#1087;&#1080;&#1096;&#1077;&#1084; &#1082;&#1086;&#1076; &#1086;&#1076;&#1085;&#1086;&#1074;&#1088;&#1077;&#1084;&#1077;&#1085;&#1085;&#1086;.',
    'proc_3': '&#1047;&#1072;&#1087;&#1091;&#1089;&#1082; &#1080; &#1056;&#1086;&#1089;&#1090;',
    'proc_3_desc': '&#1052;&#1099; &#1088;&#1072;&#1079;&#1074;&#1077;&#1088;&#1090;&#1099;&#1074;&#1072;&#1077;&#1084; &#1074;&#1072;&#1096; &#1087;&#1088;&#1086;&#1077;&#1082;&#1090; &#1074; &#1087;&#1088;&#1086;&#1076;&#1072;&#1082;&#1096;&#1077;&#1085;.',
    
    'why_badge': '&#1055;&#1086;&#1095;&#1077;&#1084;&#1091; &#1052;&#1099;',
    'why_title': '&#1055;&#1086;&#1090;&#1086;&#1084;&#1091; &#1095;&#1090;&#1086; &#1089;&#1082;&#1086;&#1088;&#1086;&#1089;&#1090;&#1090; &#1074;&#1072;&#1078;&#1085;&#1072;.',
    
    'why_1': '&#1052;&#1086;&#1083;&#1085;&#1080;&#1077;&#1085;&#1086;&#1089;&#1085;&#1086;',
    'why_1_desc': '&#1052;&#1099; &#1076;&#1086;&#1089;&#1090;&#1072;&#1074;&#1083;&#1090;&#1077;&#1084; &#1082;&#1086;&#1076; &#1079;&#1072; &#1076;&#1085;&#1080;, &#1072; &#1085;&#1077; &#1084;&#1077;&#1089;&#1090;&#1094;&#1099;.',
    'why_2': '&#1055;&#1088;&#1077;&#1084;&#1080;&#1091;&#1084; &#1050;&#1072;&#1095;&#1077;&#1089;&#1090;&#1074;&#1086;',
    'why_2_desc': '&#1052;&#1099; &#1085;&#1077; &#1080;&#1076;&#1077;&#1084; &#1085;&#1072; &#1082;&#1086;&#1084;&#1087;&#1088;&#1086;&#1084;&#1080;&#1089;&#1089;&#1099;.',
    'why_3': '&#1053;&#1086;&#1074;&#1099;&#1077; &#1058;&#1077;&#1093;&#1085;&#1086;&#1083;&#1086;&#1073;&#1080;&#1080;',
    'why_3_desc': '&#1055;&#1086;&#1089;&#1090;&#1088;&#1086;&#1077;&#1085;&#1086; &#1089; &#1087;&#1086;&#1084;&#1086;&#1097;&#1090;&#1102; &#1048;&#1048;.',
    'why_4': '&#1042;&#1089;&#1077; &#1042;&#1082;&#1083;&#1102;&#1095;&#1077;&#1085;&#1086;',
    'why_4_desc': '&#1044;&#1080;&#1079;&#1072;&#1081;&#1085;, frontend, backend &#1080; &#1076;&#1077;&#1087;&#1083;&#1086;&#1081;.',
    
    'port_badge': '&#1053;&#1072;&#1096;&#1072; &#1056;&#1072;&#1073;&#1086;&#1090;&#1072;',
    'port_title': '&#1053;&#1077;&#1076;&#1072;&#1074;&#1085;&#1080;&#1077; &#1055;&#1088;&#1086;&#1077;&#1082;&#1090;&#1099;',
    'port_view': '&#1057;&#1084;&#1086;&#1090;&#1088;&#1077;&#1090;&#1090; &#1055;&#1088;&#1086;&#1077;&#1082;&#1090; &rarr;',
    
    'cta_title_new': '&#1042;&#1072;&#1096; &#1089;&#1083;&#1077;&#1076;&#1091;&#1102;&#1097;&#1080;&#1081; &#1087;&#1088;&#1086;&#1077;&#1082;&#1090; &#1084;&#1086;&#1078;&#1077;&#1090; &#1085;&#1072;&#1095;&#1072;&#1090;&#1090;&#1089;&#1090; &#1089;&#1077;&#1073;&#1086;&#1076;&#1085;&#1090;.',
    'cta_subtitle_new': 'DevelopIA &mdash; &#1052;&#1099; &#1074;&#1086;&#1087;&#1083;&#1086;&#1097;&#1072;&#1077;&#1084; &#1074;&#1072;&#1096;&#1080; &#1080;&#1076;&#1077;&#1080; &#1074; &#1088;&#1077;&#1072;&#1083;&#1090;&#1085;&#1086;&#1089;&#1090;&#1090;.',
}

def inject_html_tags():
    with open('index.html', 'r', encoding='utf-8') as f:
        html = f.read()
    
    for key, text in en_keys.items():
        if text in html:
            target = f'>{text}<'
            replacement = f' data-i18n="index.{key}">{text}<'
            if target in html:
                html = html.replace(target, replacement)
            else:
                html = html.replace(text, f'<span data-i18n="index.{key}">{text}</span>')
                
    # some tricky html entities fixes for the exact replacement
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(html)

def update_i18n_ts():
    with open('i18n.ts', 'r', encoding='utf-8') as f:
        content = f.read()
    
    # We will find the `index: {` for each language and insert our keys
    def insert_keys(lang_content, keys_dict):
        # find the index block
        match = re.search(r'index:\s*\{', lang_content)
        if not match: return lang_content
        
        insert_pos = match.end()
        
        lines = []
        for k, v in keys_dict.items():
            # escape double quotes
            v = v.replace('"', '\\"')
            lines.append(f'      {k}: "{v}",')
            
        insertion = '\n' + '\n'.join(lines)
        return lang_content[:insert_pos] + insertion + lang_content[insert_pos:]

    # It's better to do this manually via python regex
    
    langs_dict = {
        'en: {': en_keys,
        'fr: {': fr_keys,
        'es: {': es_keys,
        'it: {': it_keys,
        'ru: {': ru_keys
    }
    
    # Since we can't reliably parse the whole file with simple regex, let's process line by line
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
    print('Translations applied.')

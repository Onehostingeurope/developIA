export interface TranslationSchema {
  nav: {
    home: string;
    services: string;
    portfolio: string;
    contact: string;
    hire_me: string;
  };
  footer: {
    copyright: string;
    services: string;
    privacy: string;
    terms: string;
  };
  index: {
    status: string;
    hero_title: string;
    hero_desc: string;
    view_services: string;
    get_in_touch: string;
    tech_title: string;
    tech_desc: string;
    tech_update: string;
    tech_optimized: string;
    tech_integrated: string;
    tech_computational: string;
    tech_scalable: string;
    tech_card1_desc: string;
    tech_card2_desc: string;
    tech_card3_desc: string;
    tech_card4_desc: string;
    selected_work: string;
    work_dubbing_caps: string;
    work_dubbing_title: string;
    work_dubbing_visit: string;
    work_tunes_caps: string;
    work_tunes_title: string;
    work_social_caps: string;
    work_social_title: string;
    cta_title: string;
    cta_desc: string;
    cta_start: string;
    cta_consultation: string;
  };
  services: {
    caps_shell: string;
    hero_title: string;
    hero_desc: string;
    web_dev_title: string;
    web_dev_subtitle: string;
    custom_apps_title: string;
    custom_apps_desc: string;
    perf_opt_title: string;
    perf_opt_desc: string;
    resp_design_title: string;
    resp_design_desc: string;
    ai_title: string;
    ai_subtitle: string;
    ai_integration_title: string;
    ai_integration_desc: string;
    ai_pipeline: string;
    ai_search: string;
    llm_title: string;
    llm_desc: string;
    llm_progress: string;
    pred_title: string;
    pred_desc: string;
    pred_explore: string;
    cta_title: string;
    cta_desc: string;
    cta_start: string;
    cta_case_studies: string;
  };
  contact: {
    init_subtitle: string;
    init_title: string;
    init_desc: string;
    access_points: string;
    email_label: string;
    new_inquiry: string;
    secure_protocol: string;
    lbl_name: string;
    ph_name: string;
    lbl_email: string;
    ph_email: string;
    lbl_class: string;
    opt_default: string;
    opt_saas: string;
    opt_apps: string;
    opt_ai: string;
    opt_fullstack: string;
    opt_cloud: string;
    opt_consulting: string;
    lbl_mission: string;
    ph_mission: string;
    btn_transmit: string;
    disclaimer: string;
    success_title: string;
    success_desc: string;
    success_reset: string;
  };
}

export const translations: Record<string, TranslationSchema> = {
  en: {
    nav: {
      home: "Home",
      services: "Services",
      portfolio: "Portfolio",
      contact: "Contact",
      hire_me: "Hire Me"
    },
    footer: {
      copyright: "© 2026 DEVELOPIA. ENGINEERED FOR INNOVATION.",
      services: "Services",
      privacy: "Privacy",
      terms: "Terms"
    },
    index: {
      status: "Systems Online & Optimizing",
      hero_title: "Engineering the Future of <br/>Web & AI",
      hero_desc: "Custom web solutions and intelligent AI integrations tailored for your business. We build the architecture for tomorrow's digital economy.",
      view_services: "View Services",
      get_in_touch: "Get in Touch",
      tech_title: "The Tech Stack",
      tech_desc: "Harnessing the most robust and innovative technologies to build scalable, high-performance applications.",
      tech_update: "LATEST_UPDATE: 2026.05",
      tech_optimized: "Status: Optimized",
      tech_integrated: "Status: Integrated",
      tech_computational: "Status: Computational",
      tech_scalable: "Status: Scalable",
      tech_card1_desc: "Modern frontend architecture for seamless user experiences and SEO performance.",
      tech_card2_desc: "Integrating advanced LLMs for intelligent agents, RAG, and automated reasoning.",
      tech_card3_desc: "Custom machine learning models for predictive analytics and data recognition.",
      tech_card4_desc: "PostgreSQL and Vector DBs ensuring data integrity and ultra-fast retrieval.",
      selected_work: "Selected Work",
      work_dubbing_caps: "AI VIDEO LOCALIZATION & DUBBING",
      work_dubbing_title: "Easy Dubbing",
      work_dubbing_visit: "VISIT PLATFORM",
      work_tunes_caps: "MUSIC PLATFORM",
      work_tunes_title: "TuneMusics",
      work_social_caps: "AI CONTENT & PUBLISHING",
      work_social_title: "Social AI Publisher",
      cta_title: "Ready to build the next breakthrough?",
      cta_desc: "Whether you're looking for a bespoke AI integration or a world-class web application, we're here to engineer your success.",
      cta_start: "Start Project",
      cta_consultation: "Consultation"
    },
    services: {
      caps_shell: "Capabilities Shell v2.4",
      hero_title: "Engineering the Future of Intelligence.",
      hero_desc: "Bridging the gap between architectural stability and cutting-edge AI innovation. We build high-performance digital ecosystems for technical founders.",
      web_dev_title: "Web Development",
      web_dev_subtitle: "01 / ARCHITECTURE & PERFORMANCE",
      custom_apps_title: "Custom Applications",
      custom_apps_desc: "Bespoke software solutions built with scalable architectures and enterprise-grade security protocols for complex business logic.",
      perf_opt_title: "Performance Optimization",
      perf_opt_desc: "Eliminating bottlenecks through rigorous auditing, asset minification, and advanced caching strategies to achieve sub-second load times.",
      resp_design_title: "Responsive Design",
      resp_design_desc: "Fluid interfaces that maintain structural integrity across all viewports, from mobile devices to ultra-wide desktop monitors.",
      ai_title: "Artificial Intelligence",
      ai_subtitle: "02 / NEURAL SYSTEMS & INTEGRATION",
      ai_integration_title: "AI Integration",
      ai_integration_desc: "Embedding machine learning models directly into existing workflows. We automate cognitive tasks, enhancing productivity through seamless API connectivity and custom agentic frameworks.",
      ai_pipeline: "Automated Data Pipelines",
      ai_search: "Cognitive Search Engines",
      llm_title: "LLM Fine-tuning",
      llm_desc: "Adapting foundational Large Language Models to your proprietary datasets, ensuring specialized domain knowledge and brand-aligned tone.",
      llm_progress: "TRAINING PROGRESS",
      pred_title: "Predictive Analytics",
      pred_desc: "Leveraging historical data to forecast future trends. We build custom dashboards that visualize complex probabilities into actionable business intelligence using advanced regression and classification models.",
      pred_explore: "EXPLORE MODELS",
      cta_title: "Ready to Scale?",
      cta_desc: "Schedule a technical consultation to audit your current stack and identify AI opportunities.",
      cta_start: "START PROJECT",
      cta_case_studies: "VIEW CASE STUDIES"
    },
    contact: {
      init_subtitle: "Initialization",
      init_title: "Ready to start your next project?",
      init_desc: "Architecture-first engineering for high-performance AI integration. Let's discuss your technical requirements and build something revolutionary.",
      access_points: "System Access Points",
      email_label: "Electronic Mail",
      new_inquiry: "New Inquiry",
      secure_protocol: "SECURE TRANSMISSION PROTOCOL ACTIVATED",
      lbl_name: "Client_Name",
      ph_name: "e.g. Satoshi Nakamoto",
      lbl_email: "Client_Email",
      ph_email: "name@developia.org",
      lbl_class: "Project_Classification",
      opt_default: "Select Architecture Type",
      opt_saas: "SaaS Development",
      opt_apps: "Application iOS, Android, Windows, Mac",
      opt_ai: "AI / Machine Learning Integration",
      opt_fullstack: "Full-Stack Ecosystem Development",
      opt_cloud: "Enterprise Cloud Infrastructure",
      opt_consulting: "Technical Strategy & Architecture",
      lbl_mission: "Mission_Parameters",
      ph_mission: "Define the scope, objectives, and technical constraints of your project...",
      btn_transmit: "TRANSMIT MESSAGE",
      disclaimer: "By transmitting, you acknowledge that your data will be processed via secure channels for project evaluation only.",
      success_title: "Transmission Successful",
      success_desc: "Your project parameters have been uploaded via secure handshake. Our agentic team will initialize matching evaluation modules.",
      success_reset: "INITIALIZE NEW HANDSHAKE"
    }
  },
  fr: {
    nav: {
      home: "Accueil",
      services: "Services",
      portfolio: "Portfolio",
      contact: "Contact",
      hire_me: "Engagez-moi"
    },
    footer: {
      copyright: "© 2026 DEVELOPIA. CONÇU POUR L'INNOVATION.",
      services: "Services",
      privacy: "Confidentialité",
      terms: "Conditions"
    },
    index: {
      status: "Systèmes en ligne & optimisés",
      hero_title: "Façonner l'avenir du <br/>Web & de l'IA",
      hero_desc: "Solutions web sur mesure et intégrations d'IA intelligentes adaptées à votre entreprise. Nous construisons l'architecture de l'économie numérique de demain.",
      view_services: "Voir les services",
      get_in_touch: "Contactez-nous",
      tech_title: "La pile technique",
      tech_desc: "Exploiter les technologies les plus robustes et innovantes pour créer des applications évolutives et performantes.",
      tech_update: "DERNIÈRE_MAJ : 2026.05",
      tech_optimized: "Statut : Optimisé",
      tech_integrated: "Statut : Intégré",
      tech_computational: "Statut : Calculatoire",
      tech_scalable: "Statut : Évolutif",
      tech_card1_desc: "Architecture frontend moderne pour des expériences utilisateur fluides et des performances SEO.",
      tech_card2_desc: "Intégration de LLM avancés pour des agents intelligents, du RAG et du raisonnement automatisé.",
      tech_card3_desc: "Modèles de machine learning sur mesure pour l'analyse prédictive et la reconnaissance de données.",
      tech_card4_desc: "PostgreSQL et bases de données vectorielles garantissant l'intégrité des données et une récupération ultra-rapide.",
      selected_work: "Projets sélectionnés",
      work_dubbing_caps: "LOCALISATION & DOUBLAGE VIDÉO PAR IA",
      work_dubbing_title: "Easy Dubbing",
      work_dubbing_visit: "VISITER LA PLATEFORME",
      work_tunes_caps: "PLATEFORME MUSICALE",
      work_tunes_title: "TuneMusics",
      work_social_caps: "CONTENU & ÉDITION PAR IA",
      work_social_title: "Social AI Publisher",
      cta_title: "Prêt à créer la prochaine innovation ?",
      cta_desc: "Que vous recherchiez une intégration d'IA sur mesure ou une application web de classe mondiale, nous sommes là pour concevoir votre succès.",
      cta_start: "Démarrer le projet",
      cta_consultation: "Consultation"
    },
    services: {
      caps_shell: "Capabilities Shell v2.4",
      hero_title: "Concevoir l'avenir de l'intelligence.",
      hero_desc: "Combler le fossé entre la stabilité architecturale et l'innovation d'IA de pointe. Nous construisons des écosystèmes numériques de haute performance pour les fondateurs techniques.",
      web_dev_title: "Développement Web",
      web_dev_subtitle: "01 / ARCHITECTURE & PERFORMANCES",
      custom_apps_title: "Applications sur mesure",
      custom_apps_desc: "Solutions logicielles sur mesure construites avec des architectures évolutives et des protocoles de sécurité d'entreprise pour une logique métier complexe.",
      perf_opt_title: "Optimisation des performances",
      perf_opt_desc: "Élimination des goulots d'étranglement grâce à un audit rigoureux, une minification des ressources et des stratégies de cache avancées pour des temps de chargement inférieurs à la seconde.",
      resp_design_title: "Design adaptatif",
      resp_design_desc: "Interfaces fluides qui maintiennent l'intégrité structurelle sur tous les écrans, des appareils mobiles aux moniteurs de bureau ultra-larges.",
      ai_title: "Intelligence Artificielle",
      ai_subtitle: "02 / SYSTÈMES NEURONAUX & INTÉGRATION",
      ai_integration_title: "Intégration d'IA",
      ai_integration_desc: "Intégration directe de modèles de machine learning dans les flux de travail existants. Nous automatisons les tâches cognitives, améliorant la productivité grâce à une connectivité API transparente et des frameworks d'agents personnalisés.",
      ai_pipeline: "Pipelines de données automatisés",
      ai_search: "Moteurs de recherche cognitive",
      llm_title: "Réglage fin de LLM",
      llm_desc: "Adaptation des grands modèles de langage fondamentaux à vos ensembles de données propriétaires, garantissant des connaissances spécialisées et un ton aligné sur la marque.",
      llm_progress: "PROGRESSION DE L'ENTRAÎNEMENT",
      pred_title: "Analyse prédictive",
      pred_desc: "Exploitation des données historiques pour prévoir les tendances futures. Nous construisons des tableaux de bord personnalisés qui visualisent des probabilités complexes en intelligence économique exploitable à l'aide de modèles de régression et de classification avancés.",
      pred_explore: "EXPLORER LES MODÈLES",
      cta_title: "Prêt à passer à l'échelle ?",
      cta_desc: "Planifiez une consultation technique pour auditer votre infrastructure actuelle et identifier les opportunités d'IA.",
      cta_start: "DÉMARRER LE PROJET",
      cta_case_studies: "VOIR LES ÉTUDES DE CAS"
    },
    contact: {
      init_subtitle: "Initialisation",
      init_title: "Prêt à démarrer votre prochain projet ?",
      init_desc: "Ingénierie axée sur l'architecture pour une intégration d'IA haute performance. Discutons de vos exigences techniques et créons quelque chose de révolutionnaire.",
      access_points: "Points d'accès au système",
      email_label: "Courrier électronique",
      new_inquiry: "Nouvelle demande",
      secure_protocol: "PROTOCOLE DE TRANSMISSION SÉCURISÉ ACTIVÉ",
      lbl_name: "Client_Name",
      ph_name: "ex. Satoshi Nakamoto",
      lbl_email: "Client_Email",
      ph_email: "name@developia.org",
      lbl_class: "Project_Classification",
      opt_default: "Sélectionner le type d'architecture",
      opt_saas: "Développement SaaS",
      opt_apps: "Application iOS, Android, Windows, Mac",
      opt_ai: "Intégration d'IA / Machine Learning",
      opt_fullstack: "Développement d'écosystème Full-Stack",
      opt_cloud: "Infrastructure Cloud d'entreprise",
      opt_consulting: "Stratégie & architecture technique",
      lbl_mission: "Mission_Parameters",
      ph_mission: "Définissez la portée, les objectifs et les contraintes techniques de votre projet...",
      btn_transmit: "TRANSMETTRE LE MESSAGE",
      disclaimer: "En transmettant, vous reconnaissez que vos données seront traitées via des canaux sécurisés uniquement pour l'évaluation du projet.",
      success_title: "Transmission réussie",
      success_desc: "Vos paramètres de projet ont été téléchargés via une liaison sécurisée. Notre équipe d'agents initialisera les modules d'évaluation correspondants.",
      success_reset: "INITIALISER UNE NOUVELLE LIAISON"
    }
  },
  es: {
    nav: {
      home: "Inicio",
      services: "Servicios",
      portfolio: "Portfolio",
      contact: "Contacto",
      hire_me: "Contrátame"
    },
    footer: {
      copyright: "© 2026 DEVELOPIA. INGENIERÍA PARA LA INNOVACIÓN.",
      services: "Servicios",
      privacy: "Privacidad",
      terms: "Términos"
    },
    index: {
      status: "Sistemas en línea y optimizados",
      hero_title: "Ingeniería del futuro de <br/>Web y IA",
      hero_desc: "Soluciones web a medida e integraciones de IA inteligentes adaptadas a su negocio. Construimos la arquitectura para la economía digital del mañana.",
      view_services: "Ver servicios",
      get_in_touch: "Ponerse en contacto",
      tech_title: "La pila tecnológica",
      tech_desc: "Aprovechando las tecnologías más robustas e innovadoras para crear aplicaciones escalables y de alto rendimiento.",
      tech_update: "ÚLTIMA_ACT : 2026.05",
      tech_optimized: "Estado: Optimizado",
      tech_integrated: "Estado: Integrado",
      tech_computational: "Estado: Computacional",
      tech_scalable: "Estado: Escalable",
      tech_card1_desc: "Arquitectura frontend moderna para experiencias de usuario fluidas y rendimiento SEO.",
      tech_card2_desc: "Integración de LLM avanzados para agentes inteligentes, RAG y razonamiento automatizado.",
      tech_card3_desc: "Modelos de aprendizaje automático a medida para análisis predictivo y reconocimiento de datos.",
      tech_card4_desc: "PostgreSQL y BD vectoriales que garantizan la integridad de los datos y recuperación ultrarrápida.",
      selected_work: "Trabajos seleccionados",
      work_dubbing_caps: "LOCALIZACIÓN Y DOBLAGE DE VIDEO POR IA",
      work_dubbing_title: "Easy Dubbing",
      work_dubbing_visit: "VISITAR PLATAFORMA",
      work_tunes_caps: "PLATAFORMA DE MÚSICA",
      work_tunes_title: "TuneMusics",
      work_social_caps: "CONTENIDO Y PUBLICACIÓN POR IA",
      work_social_title: "Social AI Publisher",
      cta_title: "¿Listo para construir el próximo avance?",
      cta_desc: "Ya sea que busque una integración de IA a medida o una aplicación web de clase mundial, estamos aquí para diseñar su éxito.",
      cta_start: "Iniciar proyecto",
      cta_consultation: "Consulta"
    },
    services: {
      caps_shell: "Capabilities Shell v2.4",
      hero_title: "Ingeniería del futuro de la inteligencia.",
      hero_desc: "Cerrando la brecha entre la estabilidad arquitectural y la innovación de IA de vanguardia. Construimos ecosistemas digitales de alto rendimiento para fundadores técnicos.",
      web_dev_title: "Desarrollo Web",
      web_dev_subtitle: "01 / ARQUITECTURA Y RENDIMIENTO",
      custom_apps_title: "Aplicaciones a medida",
      custom_apps_desc: "Soluciones de software a medida creadas con arquitecturas escalables y protocolos de seguridad de nivel empresarial para lógica de negocios compleja.",
      perf_opt_title: "Optimización del rendimiento",
      perf_opt_desc: "Eliminación de cuellos de botella mediante auditorías rigurosas, minificación de recursos y estrategias de almacenamiento en caché avanzadas para lograr tiempos de carga de menos de un segundo.",
      resp_design_title: "Diseño responsivo",
      resp_design_desc: "Interfaces fluidas que mantienen la integridad estructural en todas las pantallas, desde dispositivos móviles hasta monitores de escritorio ultra anchos.",
      ai_title: "Inteligencia Artificial",
      ai_subtitle: "02 / SISTEMAS NEURONALES E INTEGRACIÓN",
      ai_integration_title: "Integración de IA",
      ai_integration_desc: "Integración directa de modelos de aprendizaje automático en flujos de trabajo existentes. Automatizamos tareas cognitivas, mejorando la productividad mediante conectividad API fluida y marcos de agentes personalizados.",
      ai_pipeline: "Tuberías de datos automatizadas",
      ai_search: "Motores de búsqueda cognitiva",
      llm_title: "Ajuste fino de LLM",
      llm_desc: "Adaptación de modelos de lenguaje grandes fundamentales a sus conjuntos de datos patentados, garantizando un conocimiento de dominio especializado y un tono alineado con la marca.",
      llm_progress: "PROGRESO DEL ENTRENAMIENTO",
      pred_title: "Análisis predictivo",
      pred_desc: "Aprovechamiento de datos históricos para pronosticar tendencias futuras. Creamos paneles personalizados que visualizan probabilidades complejas en inteligencia empresarial procesable mediante modelos avanzados de regresión y clasificación.",
      pred_explore: "EXPLORAR MODELOS",
      cta_title: "¿Listo para escalar?",
      cta_desc: "Programe una consulta técnica para auditar su pila actual e identificar oportunidades de IA.",
      cta_start: "INICIAR PROYECTO",
      cta_case_studies: "VER ESTUDIOS DE CASO"
    },
    contact: {
      init_subtitle: "Inicialización",
      init_title: "¿Listo para comenzar su próximo proyecto?",
      init_desc: "Ingeniería enfocada en la arquitectura para la integración de IA de alto rendimiento. Hablemos de sus requisitos técnicos y construyamos algo revolucionario.",
      access_points: "Puntos de acceso al sistema",
      email_label: "Correo electrónico",
      new_inquiry: "Nueva consulta",
      secure_protocol: "PROTOCOLO DE TRANSMISIÓN SEGURO ACTIVADO",
      lbl_name: "Client_Name",
      ph_name: "por ejemplo, Satoshi Nakamoto",
      lbl_email: "Client_Email",
      ph_email: "name@developia.org",
      lbl_class: "Project_Classification",
      opt_default: "Seleccionar tipo de arquitectura",
      opt_saas: "Desarrollo de SaaS",
      opt_apps: "Application iOS, Android, Windows, Mac",
      opt_ai: "Integración de IA / Aprendizaje Automático",
      opt_fullstack: "Desarrollo de ecosistema Full-Stack",
      opt_cloud: "Infraestructura en la nube empresarial",
      opt_consulting: "Estrategia y arquitectura técnica",
      lbl_mission: "Mission_Parameters",
      ph_mission: "Defina el alcance, los objetivos y las restricciones técnicas de su proyecto...",
      btn_transmit: "TRANSMITIR MENSAJE",
      disclaimer: "Al transmitir, usted reconoce que sus datos serán procesados a través de canales seguros únicamente para la evaluación del proyecto.",
      success_title: "Transmisión exitosa",
      success_desc: "Los parámetros de su proyecto se han cargado mediante un protocolo de enlace seguro. Nuestro equipo de agentes inicializará los módulos de evaluación correspondientes.",
      success_reset: "INICIALIZAR NUEVO PROTOCOLO DE ENLACE"
    }
  },
  it: {
    nav: {
      home: "Home",
      services: "Servizi",
      portfolio: "Portfolio",
      contact: "Contatti",
      hire_me: "Assumimi"
    },
    footer: {
      copyright: "© 2026 DEVELOPIA. INGEGNERE PER L'INNOVAZIONE.",
      services: "Servizi",
      privacy: "Privacy",
      terms: "Termini"
    },
    index: {
      status: "Sistemi online e ottimizzati",
      hero_title: "Ingegnerizzare il futuro del <br/>Web e dell'IA",
      hero_desc: "Soluzioni web personalizzate e integrazioni IA intelligenti su misura per il tuo business. Costruiamo l'architettura per l'economia digitale di domani.",
      view_services: "Vedi i servizi",
      get_in_touch: "Contattaci",
      tech_title: "Il Tech Stack",
      tech_desc: "Sfruttare le tecnologie più robuste e innovative per creare applicazioni scalabili e ad alte prestazioni.",
      tech_update: "ULTIMO_AGGIORNAMENTO: 2026.05",
      tech_optimized: "Stato: Ottimizzato",
      tech_integrated: "Stato: Integrato",
      tech_computational: "Stato: Computazionale",
      tech_scalable: "Stato: Scalabile",
      tech_card1_desc: "Architettura frontend moderna per esperienze utente fluide e prestazioni SEO.",
      tech_card2_desc: "Integrazione di LLM avanzati per agenti intelligenti, RAG e ragionamento automatizzato.",
      tech_card3_desc: "Modelli di machine learning personalizzati per analisi predittiva e riconoscimento dei dati.",
      tech_card4_desc: "PostgreSQL e DB vettoriali che garantiscono l'integrità dei dati e un recupero ultra-veloce.",
      selected_work: "Lavori selezionati",
      work_dubbing_caps: "LOCALIZZAZIONE E DOPPIAGGIO VIDEO IA",
      work_dubbing_title: "Easy Dubbing",
      work_dubbing_visit: "VISITA LA PIATTAFORMA",
      work_tunes_caps: "PIATTAFORMA MUSICALE",
      work_tunes_title: "TuneMusics",
      work_social_caps: "CONTENUTO E PUBBLICAZIONE IA",
      work_social_title: "Social AI Publisher",
      cta_title: "Pronto a realizzare la prossima svolta?",
      cta_desc: "Che tu stia cercando un'integrazione IA su misura o un'applicazione web di livello mondiale, siamo qui per ingegnerizzare il tuo successo.",
      cta_start: "Inizia progetto",
      cta_consultation: "Consulenza"
    },
    services: {
      caps_shell: "Capabilities Shell v2.4",
      hero_title: "Ingegnerizzare il futuro dell'intelligenza.",
      hero_desc: "Colmare il divario tra stabilità architetturale e innovazione IA all'avanguardia. Costruiamo ecosistemi digitali ad alte prestazioni per fondatori tecnici.",
      web_dev_title: "Sviluppo Web",
      web_dev_subtitle: "01 / ARCHITETTURA E PRESTAZIONI",
      custom_apps_title: "Applicazioni personalizzate",
      custom_apps_desc: "Soluzioni software su misura create con architetture scalabili e protocolli di sicurezza di livello enterprise per logica di business complessa.",
      perf_opt_title: "Ottimizzazione delle prestazioni",
      perf_opt_desc: "Eliminazione dei colli di bottiglia attraverso controlli rigorosi, minimizzazione delle risorse e strategie di caching avanzate per ottenere tempi di caricamento inferiori al secondo.",
      resp_design_title: "Design responsive",
      resp_design_desc: "Interfacce fluide che mantengono l'integrità strutturale su tutti i viewport, dai dispositivi mobili ai monitor desktop ultra-wide.",
      ai_title: "Artificial Intelligence",
      ai_subtitle: "02 / SISTEMI NEURALI E INTEGRAZIONE",
      ai_integration_title: "Integrazione IA",
      ai_integration_desc: "Integrazione di modelli di machine learning direttamente nei flussi di lavoro esistenti. Automatisiamo compiti cognitivi, migliorando la produttività attraverso una connettività API fluida e framework agenziali personalizzati.",
      ai_pipeline: "Pipeline di dati automatizzate",
      ai_search: "Motori di ricerca cognitiva",
      llm_title: "Fine-tuning di LLM",
      llm_desc: "Adattamento di Large Language Models di base ai tuoi dataset proprietari, garantendo una conoscenza specialistica del dominio e un tono allineato al brand.",
      llm_progress: "PROGRESSO DELL'ALLENAMENTO",
      pred_title: "Analisi predittiva",
      pred_desc: "Sfruttare i dati storici per prevedere le tendenze future. Costruiamo dashboard personalizzate che visualizzano probabilità complesse in business intelligence fruibile utilizzando modelli avanzati di regressione e classificazione.",
      pred_explore: "EXPLORE MODELS",
      cta_title: "Pronto a scalare?",
      cta_desc: "Pianifica una consulenza tecnica per verificare il tuo stack attuale e identificare opportunità IA.",
      cta_start: "INIZIA PROGETTO",
      cta_case_studies: "VEDI GLI STUDI DI CASO"
    },
    contact: {
      init_subtitle: "Inizializzazione",
      init_title: "Pronto a iniziare il tuo prossimo progetto?",
      init_desc: "Ingegneria basata sull'architettura per un'integrazione IA ad alte prestazioni. Discutiamo i tuoi requisiti tecnici e realizziamo qualcosa di rivoluzionario.",
      access_points: "Punti di accesso al sistema",
      email_label: "Posta elettronica",
      new_inquiry: "Nuova richiesta",
      secure_protocol: "PROTOCOLLO DI TRASMISSIONE SICURO ATTIVATO",
      lbl_name: "Client_Name",
      ph_name: "es. Satoshi Nakamoto",
      lbl_email: "Client_Email",
      ph_email: "name@developia.org",
      lbl_class: "Project_Classification",
      opt_default: "Seleziona il tipo di architettura",
      opt_saas: "Sviluppo SaaS",
      opt_apps: "Application iOS, Android, Windows, Mac",
      opt_ai: "Integrazione IA / Machine Learning",
      opt_fullstack: "Sviluppo ecosistema Full-Stack",
      opt_cloud: "Infrastruttura cloud aziendale",
      opt_consulting: "Strategia e architettura tecnica",
      lbl_mission: "Mission_Parameters",
      ph_mission: "Definisci lo scopo, gli obiettivi e i vincoli tecnici del tuo progetto...",
      btn_transmit: "TRASMETTI IL MESSAGGIO",
      disclaimer: "Trasmettendo, riconosci che i tuoi dati saranno elaborati tramite canali sicuri solo per la valutazione del progetto.",
      success_title: "Trasmissione completata con successo",
      success_desc: "I parametri del tuo progetto sono stati caricati tramite handshake sicuro. Il nostro team agenziale inizializzerà i moduli di valutazione corrispondenti.",
      success_reset: "INIZIALIZZA NUOVO HANDSHAKE"
    }
  },
  ru: {
    nav: {
      home: "Главная",
      services: "Услуги",
      portfolio: "Портфолио",
      contact: "Контакты",
      hire_me: "Нанять меня"
    },
    footer: {
      copyright: "© 2026 DEVELOPIA. СПРОЕКТИРОВАНО ДЛЯ ИННОВАЦИЙ.",
      services: "Услуги",
      privacy: "Конфиденциальность",
      terms: "Условия"
    },
    index: {
      status: "Системы онлайн и оптимизированы",
      hero_title: "Проектирование будущего <br/>Web & AI",
      hero_desc: "Индивидуальные веб-решения и интеллектуальная интеграция искусственного интеллекта, адаптированные для вашего бизнеса. Мы строим архитектуру для цифровой экономики завтрашнего дня.",
      view_services: "Посмотреть услуги",
      get_in_touch: "Связаться",
      tech_title: "Технологический стек",
      tech_desc: "Использование наиболее надежных и инновационных технологий для создания масштабируемых и высокопроизводительных приложений.",
      tech_update: "ПОСЛЕДНЕЕ_ОБНОВЛЕНИЕ: 2026.05",
      tech_optimized: "Статус: Оптимизирован",
      tech_integrated: "Статус: Интегрирован",
      tech_computational: "Статус: Вычислительный",
      tech_scalable: "Статус: Масштабируемый",
      tech_card1_desc: "Современная фронтенд-архитектура для бесшовного пользовательского опыта и SEO-оптимизации.",
      tech_card2_desc: "Интеграция передовых LLM для интеллектуальных агентов, RAG и автоматизированных рассуждений.",
      tech_card3_desc: "Индивидуальные модели машинного обучения для предиктивной аналитики и распознавания данных.",
      tech_card4_desc: "PostgreSQL и векторные БД, обеспечивающие целостность данных и сверхбыстрый поиск.",
      selected_work: "Избранные работы",
      work_dubbing_caps: "ЛОКАЛИЗАЦИЯ И ДУБЛЯЖ ВИДЕО НА БАЗЕ ИИ",
      work_dubbing_title: "Easy Dubbing",
      work_dubbing_visit: "ПОСЕТИТЬ ПЛАТФОРМУ",
      work_tunes_caps: "МУЗЫКАЛЬНАЯ ПЛАТФОРМА",
      work_tunes_title: "TuneMusics",
      work_social_caps: "ИИ КОНТЕНТ И ПУБЛИКАЦИЯ",
      work_social_title: "Social AI Publisher",
      cta_title: "Готовы создать следующий прорыв?",
      cta_desc: "Если вам нужна индивидуальная интеграция искусственного интеллекта или веб-приложение мирового класса, мы здесь, чтобы спроектировать ваш успех.",
      cta_start: "Начать проект",
      cta_consultation: "Консультация"
    },
    services: {
      caps_shell: "Capabilities Shell v2.4",
      hero_title: "Проектирование будущего интеллекта.",
      hero_desc: "Преодоление разрыва между архитектурной стабильностью и передовыми инновациями в области искусственного интеллекта. Мы создаем высокопроизводительные цифровые экосистемы для технических основателей.",
      web_dev_title: "Веб-разработка",
      web_dev_subtitle: "01 / АРХИТЕКТУРА И ПРОИЗВОДИТЕЛЬНОСТЬ",
      custom_apps_title: "Индивидуальные приложения",
      custom_apps_desc: "Индивидуальные программные решения, созданные с использованием масштабируемой архитектуры и протоколов безопасности корпоративного уровня для сложной бизнес-логики.",
      perf_opt_title: "Оптимизация производительности",
      perf_opt_desc: "Устранение узких мест за счет тщательного аудита, минификации ресурсов и передовых стратегий кэширования для достижения субсекундного времени загрузки.",
      resp_design_title: "Адаптивный дизайн",
      resp_design_desc: "Гибкие интерфейсы, сохраняющие структурную целостность на любых экранах, от мобильных устройств до сверхшироких мониторов.",
      ai_title: "Искусственный интеллект",
      ai_subtitle: "02 / НЕЙРОННЫЕ СИСТЕМЫ И ИНТЕГРАЦИЯ",
      ai_integration_title: "Интеграция ИИ",
      ai_integration_desc: "Внедрение моделей машинного обучения непосредственно в существующие рабочие процессы. Мы автоматизируем когнитивные задачи, повышая производительность за счет бесшовного подключения по API и специализированных агентных сред.",
      ai_pipeline: "Автоматизированные конвейеры данных",
      ai_search: "Когнитивные поисковые системы",
      llm_title: "Тонкая настройка LLM",
      llm_desc: "Адаптация базовых больших языковых моделей к вашим проприетарным наборам данных, обеспечивающая специализированные знания в предметной области и соответствие фирменному стилю.",
      llm_progress: "ПРОГРЕСС ОБУЧЕНИЯ",
      pred_title: "Предиктивная аналитика",
      pred_desc: "Использование исторических данных для прогнозирования будущих тенденций. Мы создаем индивидуальные панели мониторинга, которые визуализируют сложные вероятности в практически применимую бизнес-аналитику с использованием передовых моделей регрессии и классификации.",
      pred_explore: "ИССЛЕДОВАТЬ МОДЕЛИ",
      cta_title: "Готовы к масштабированию?",
      cta_desc: "Запланируйте техническую консультацию для аудита вашего текущего стека и выявления возможностей применения ИИ.",
      cta_start: "НАЧАТЬ ПРОЕКТ",
      cta_case_studies: "ПОСМОТРЕТЬ КЕЙСЫ"
    },
    contact: {
      init_subtitle: "Инициализация",
      init_title: "Готовы начать свой следующий проект?",
      init_desc: "Проектирование с упором на архитектуру для высокопроизводительной интеграции ИИ. Давайте обсудим ваши технические требования и создадим что-то революционное.",
      access_points: "Точки доступа к системе",
      email_label: "Электронная почта",
      new_inquiry: "Новый запрос",
      secure_protocol: "ПРОТОКОЛ БЕЗОПАСНОЙ ПЕРЕДАЧИ АКТИВИРОВАН",
      lbl_name: "Client_Name",
      ph_name: "например, Сатоши Накамото",
      lbl_email: "Client_Email",
      ph_email: "name@developia.org",
      lbl_class: "Project_Classification",
      opt_default: "Выберите тип архитектуры",
      opt_saas: "Разработка SaaS",
      opt_apps: "Application iOS, Android, Windows, Mac",
      opt_ai: "Интеграция ИИ / Машинного обучения",
      opt_fullstack: "Разработка Full-Stack экосистем",
      opt_cloud: "Облачная инфраструктура предприятия",
      opt_consulting: "Техническая стратегия и архитектура",
      lbl_mission: "Mission_Parameters",
      ph_mission: "Определите масштабы, цели и технические ограничения вашего проекта...",
      btn_transmit: "ОТПРАВИТЬ СООБЩЕНИЕ",
      disclaimer: "Отправляя сообщение, вы подтверждаете, что ваши данные будут обрабатываться по безопасным каналам только для оценки проекта.",
      success_title: "Передача успешна",
      success_desc: "Параметры вашего проекта были загружены через безопасное рукопожатие. Наша агентная команда инициализирует соответствующие модули оценки.",
      success_reset: "ИНИЦИАЛИЗИРОВАТЬ НОВОЕ РУКОПОЖАТИЕ"
    }
  }
};

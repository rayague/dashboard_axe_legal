<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Balises Meta Essentielles -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- Compatibilité Internet Explorer -->

    <!-- Titre SEO Optimisé (Très Important) -->
    <title>Axe Legal - Cabinet d'Avocats d'Affaires &amp; Juristes Experts au Bénin</title>

    <!-- Description Meta (CRUCIALE pour le clic) -->
    <meta name="description" content="Cabinet d'avocats d'affaires à [Ville, Bénin]. Expertise en droit des affaires, fiscalité, droit des sociétés, contrats et contentieux. Solutions juridiques sur-mesure pour les entreprises.">

    <!-- Balises pour les Robots des Moteurs de Recherche -->
    <meta name="robots" content="index, follow"><!-- Demande l'indexation et le suivi des liens -->
    <meta name="googlebot" content="index, follow">

    <!-- Auteur et Droits d'Auteur -->
    <meta name="author" content="Axe Legal">
    <meta name="copyright" content="Axe Legal">

    <!-- Canonical URL (Évite le contenu dupliqué) -->
    <link rel="canonical" href="https://www.axe-legal.bj/">

    <!-- Favicon & Icônes pour tous les appareils -->
    <link rel="icon" type="image/x-icon" href="{{ asset('front/assets/images/image8.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/assets/images/image8.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/assets/images/image8.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/assets/images/image8.png') }}">
    <link rel="manifest" href="assets/site.webmanifest">

    <!-- Open Graph Meta Tags (Pour les réseaux sociaux : Facebook, LinkedIn, etc.) -->
    <meta property="og:title" content="Axe Legal - Cabinet d'Avocats d'Affaires au Bénin">
    <meta property="og:description" content="Votre partenaire juridique de confiance au Bénin. Expertise en droit des affaires, droit des sociétés et contentieux pour les professionnels.">
    <meta property="og:image" content="{{ asset('front/assets/images/image8.png') }}"><!-- Image optimisée 1200x630px -->
    <meta property="og:url" content="https://www.axe-legal.bj/">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Axe Legal">
    <meta property="og:locale" content="fr_FR">

    <!-- Twitter Card Meta Tags (Pour Twitter) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@CompteTwitterAxeLegal"><!-- @ à remplacer -->
    <meta name="twitter:title" content="Axe Legal - Cabinet d'Avocats d'Affaires au Bénin">
    <meta name="twitter:description" content="Expertise juridique pour les entreprises au Bénin. Droit des affaires, contrats, fiscalité.">
    <meta name="twitter:image" content="https://www.axe-legal.bj/chemin/vers/image-twitter.jpg">

    <!-- Feuilles de style et Polices -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/main.css">

    <!-- Schema.org Structured Data (JSON-LD) - TRÈS IMPORTANT -->
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "LegalService",
        "name": "Axe Legal",
        "description": "Cabinet d'avocats d'affaires et juristes experts au Bénin",
        "url": "https://www.axe-legal.bj/",
        "telephone": "+229 XX XX XX XX",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "[Adresse]",
            "addressLocality": "[Cotonou, Parakou...]",
            "addressCountry": "BJ"
        },
        "openingHours": "Mo-Fr 08:00-18:00",
        "areaServed": "Bénin",
        "serviceType": "Droit des affaires, Droit des sociétés, Droit fiscal, Droit des contrats, Contentieux commercial"
        }
    </script>


    <style>
        :root {
            --primary-blue: #1E5AA8;
            --secondary-blue: #2B74D4;
            --accent-blue: #4A90E2;
            --light-blue: #E8F2FF;
            --dark-gray: #2C2C2C;
            --medium-gray: #6B7280;
            --light-gray: #F8FAFC;
            --white: #FFFFFF;
            --text-dark: #1F2937;
            --text-medium: #4B5563;
            --text-light: #6B7280;
            --border-light: #E5E7EB;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            --gradient-blue: linear-gradient(135deg, #1E5AA8 0%, #2B74D4 100%);
            --gradient-light: linear-gradient(135deg, #E8F2FF 0%, #F8FAFC 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            font-size: 16px;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.7;
            color: var(--text-dark);
            background: var(--white);
            overflow-x: hidden;
        }

        /* Typography */
        .font-display {
            font-family: 'Playfair Display', serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            line-height: 1.2;
            color: var(--text-dark);
        }

        /* Header Navigation */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(25px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .header.scrolled {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(25px);
            border-bottom: 1px solid var(--border-light);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
            gap: 0.5rem;
        }

        .logo-container {
            display: flex;
            align-items: center;
            z-index: 1001;
            flex-shrink: 0;
        }

        .logo-image {
            height: 40px;
            width: auto;
            transition: transform 0.3s ease;
            filter: brightness(1) contrast(1);
        }

        .header.scrolled .logo-image {
            filter: brightness(1) contrast(1);
        }

        .logo-image:hover {
            transform: scale(1.05);
        }

        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary-blue);
            letter-spacing: -0.5px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 0;
            align-items: center;
            margin: 0;
            padding: 0;
            flex: 1;
            justify-content: center;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.6rem 0.8rem;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            position: relative;
            white-space: nowrap;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header.scrolled .nav-link {
            color: var(--text-dark);
            text-shadow: none;
            font-weight: 500;
            letter-spacing: normal;
        }

        .nav-link i {
            font-size: 0.95rem;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .header.scrolled .nav-link i {
            filter: none;
        }

        .nav-link:hover i {
            opacity: 1;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--gradient-blue);
            transition: all 0.3s ease;
            transform: translateX(-50%);
            border-radius: 2px;
            box-shadow: 0 0 8px rgba(30, 90, 168, 0.3);
        }

        .header.scrolled .nav-link::after {
            background: var(--gradient-blue);
            box-shadow: 0 0 8px rgba(30, 90, 168, 0.3);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 70%;
        }

        .nav-link:hover {
            color: var(--primary-blue);
            transform: translateY(-1px);
        }

        .header.scrolled .nav-link:hover {
            color: var(--primary-blue);
        }

        .nav-cta {
            margin-left: 0.5rem;
            flex-shrink: 0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.6rem 1rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--gradient-blue);
            color: var(--white);
            border: none;
            box-shadow: var(--shadow-md);
        }

        .header.scrolled .btn-primary {
            background: var(--gradient-blue);
            color: var(--white);
            border: none;
            box-shadow: var(--shadow-md);
            text-shadow: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .header.scrolled .btn-primary:hover {
            box-shadow: var(--shadow-xl);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
        }

        .header.scrolled .btn-secondary {
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
            text-shadow: none;
        }

        .btn-secondary:hover {
            background: var(--primary-blue);
            color: var(--white);
            transform: translateY(-2px);
        }

        .header.scrolled .btn-secondary:hover {
            background: var(--primary-blue);
            color: var(--white);
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            flex-direction: column;
            gap: 0.25rem;
            cursor: pointer;
            padding: 0.75rem;
            background: transparent;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            z-index: 1001;
        }

        .mobile-menu-btn:hover {
            background: var(--light-blue);
        }

        .mobile-menu-btn span {
            width: 28px;
            height: 3px;
            background: var(--primary-blue);
            border-radius: 2px;
            transition: all 0.3s ease;
            transform-origin: center;
        }

        .mobile-menu-btn.active span:nth-child(1) {
            transform: rotate(45deg) translate(7px, 7px);
        }

        .mobile-menu-btn.active span:nth-child(2) {
            opacity: 0;
            transform: scale(0);
        }

        .mobile-menu-btn.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        /* Mobile Menu */
        .mobile-menu {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100vw;
            height: 100vh;
            background: #FFFFFF !important;
            transform: translateX(-100%);
            opacity: 0;
            visibility: visible;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 70px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: auto;
        }


        .mobile-menu.active {
            transform: translateX(0);
            opacity: 1;
            visibility: visible;
            background: #FFFFFF !important;
        }

        .mobile-nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
            width: 100%;
        }

        .mobile-nav-item {
            margin: 1rem 0;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .mobile-menu.active .mobile-nav-item {
            opacity: 1;
            transform: translateY(0);
        }

        .mobile-nav-item:nth-child(1) { transition-delay: 0.1s; }
        .mobile-nav-item:nth-child(2) { transition-delay: 0.2s; }
        .mobile-nav-item:nth-child(3) { transition-delay: 0.3s; }
        .mobile-nav-item:nth-child(4) { transition-delay: 0.4s; }
        .mobile-nav-item:nth-child(5) { transition-delay: 0.5s; }
        .mobile-nav-item:nth-child(6) { transition-delay: 0.6s; }
        .mobile-nav-item:nth-child(7) { transition-delay: 0.7s; }

        .mobile-nav-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 1.5rem 2rem;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            border-radius: 12px;
            margin: 0 2rem;
        }

        .mobile-nav-link i {
            font-size: 1.3rem;
            opacity: 0.8;
        }

        .mobile-nav-link:hover {
            color: var(--primary-blue);
            background: var(--light-blue);
            transform: translateX(10px);
        }

        .mobile-nav-link:hover i {
            opacity: 1;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .nav-menu {
                gap: 0.1rem;
            }

            .nav-link {
                padding: 0.6rem 0.6rem;
                font-size: 0.8rem;
            }

            .btn {
                padding: 0.6rem 0.8rem;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 1024px) {
            .nav-menu {
                gap: 0.1rem;
            }

            .nav-link {
                padding: 0.5rem 0.4rem;
                font-size: 0.75rem;
            }

            .nav-link span {
                display: none;
            }

            .nav-link i {
                font-size: 1rem;
            }

            .btn {
                padding: 0.6rem 0.8rem;
                font-size: 0.75rem;
            }
        }

        @media (max-width: 768px) {
            .nav-container {
                padding: 0 0.75rem;
            }

            .nav-menu {
                display: none;
            }

            .nav-cta {
                display: none;
            }

            .mobile-menu-btn {
                display: flex;
            }
        }

        @media (max-width: 480px) {
            .nav-container {
                padding: 0 0.5rem;
            }

            .mobile-nav-link {
                font-size: 1rem;
                padding: 1.25rem 1.5rem;
                margin: 0 1rem;
            }
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: var(--gradient-light);
            position: relative;
            overflow: hidden;
            padding-top: 70px;
            margin-top: 30px;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: -50%;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1.5" fill="%231E5AA8" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
            animation: heroPattern 20s linear infinite;
        }

        @keyframes heroPattern {
            0% { transform: translateX(0); }
            100% { transform: translateX(-20px); }
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            height: calc(100vh - 70px);
        }

        .hero-content {
            z-index: 2;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--light-blue);
            color: var(--primary-blue);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(30, 90, 168, 0.2);
        }

        .hero-title {
            font-size: clamp(2.2rem, 4.5vw, 3.5rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            color: var(--text-dark);
        }

        .hero-title .highlight {
            color: var(--primary-blue);
            position: relative;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: clamp(1.8rem, 6vw, 2.5rem);
                line-height: 1.2;
                margin-bottom: 1rem;
            }

            .hero-subtitle {
                font-size: 1rem;
                margin-bottom: 1.5rem;
                padding: 0 0.5rem;
            }

            .hero-cta {
                flex-direction: column;
                gap: 0.75rem;
            }

            .hero-cta .btn {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: clamp(1.6rem, 7vw, 2.2rem);
                line-height: 1.3;
            }

            .hero-subtitle {
                font-size: 0.95rem;
                padding: 0 0.75rem;
                margin-bottom: 1.5rem;
                line-height: 1.5;
            }
        }

        .hero-subtitle {
            font-size: 1.1rem;
            color: var(--text-medium);
            margin-bottom: 2rem;
            line-height: 1.6;
            max-width: 600px;
        }

        .hero-cta {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .hero-visual {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .hero-image {
            background: var(--gradient-blue);
            border-radius: 20px;
            height: 400px;
            width: 100%;
            max-width: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
            color: var(--white);
            box-shadow: var(--shadow-xl);
            position: relative;
            overflow: hidden;
        }

        .hero-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="lines" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 0,10 l 10,0" stroke="%23ffffff" stroke-width="0.5" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23lines)"/></svg>');
        }

        /* Trust Indicators */
        .trust-section {
            padding: 3rem 2rem;
            background: var(--white);
            border-bottom: 1px solid var(--border-light);
        }

        .trust-container {
            max-width: 1400px;
            margin: 0 auto;
            text-align: center;
        }

        .trust-title {
            font-size: 1rem;
            color: var(--text-light);
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .trust-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            align-items: center;
        }

        .trust-item {
            padding: 1.5rem;
            background: var(--light-gray);
            border-radius: 15px;
            transition: all 0.3s ease;
            border: 1px solid var(--border-light);
        }

        .trust-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .trust-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--primary-blue);
        }

        .trust-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .trust-desc {
            font-size: 0.9rem;
            color: var(--text-medium);
        }

        /* Services Section */
        .services {
            padding: 6rem 2rem;
            background: var(--light-gray);
        }

        .services-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--light-blue);
            color: var(--primary-blue);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--text-medium);
            line-height: 1.6;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: var(--white);
            padding: 2.5rem;
            border-radius: 20px;
            border: 1px solid var(--border-light);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-blue);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: var(--light-blue);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .service-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }

        .service-card:hover .service-icon {
            background: var(--primary-blue);
            color: var(--white);
            transform: scale(1.1);
        }

        .service-title {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .service-description {
            color: var(--text-medium);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .service-features {
            list-style: none;
        }

        .service-features li {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            color: var(--text-medium);
        }

        .service-features li::before {
            content: '✓';
            color: var(--primary-blue);
            font-weight: bold;
        }

        /* About Section */
        .about {
            padding: 6rem 2rem;
            background: var(--white);
        }

        .about-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            padding: 0 2rem;
        }

        .about-content h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            margin-bottom: 1.5rem;
        }

        .about-content p {
            margin-bottom: 1.5rem;
            color: var(--text-medium);
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .about-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .about-feature {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .about-feature-icon {
            width: 50px;
            height: 50px;
            background: var(--light-blue);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--primary-blue);
            flex-shrink: 0;
        }

        .about-feature-content h4 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .about-feature-content p {
            font-size: 0.9rem;
            color: var(--text-medium);
            margin: 0;
        }

        .about-visual {
            position: relative;
        }

        .about-image {
            background: var(--gradient-blue);
            border-radius: 20px;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: var(--white);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            position: relative;
        }

        .about-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20px;
        }

        .about-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(30, 90, 168, 0.8) 0%, rgba(43, 116, 212, 0.6) 100%);
            z-index: 1;
        }

        .about-image .image-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            text-align: center;
            color: var(--white);
        }

        .about-image .image-overlay h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--white);
        }

        .about-image .image-overlay p {
            font-size: 1rem;
            opacity: 0.9;
            color: var(--white);
        }

        /* Stats Section */
        .stats {
            padding: 6rem 2rem;
            background: var(--gradient-blue);
            color: var(--white);
        }

        .stats-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-top: 2rem;
        }

        .stat-item {
            text-align: center;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .stat-item.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .stat-number {
            display: block;
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--white);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .stat-label {
            font-size: 1.1rem;
            font-weight: 500;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
                padding: 0 1rem;
            }

            .stat-number {
                font-size: 2.5rem;
            }

            .stat-label {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
                padding: 0 0.75rem;
            }

            .stat-number {
                font-size: 2rem;
                margin-bottom: 0.75rem;
            }

            .stat-label {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 360px) {
            .stats-grid {
                gap: 1rem;
                padding: 0 0.5rem;
            }

            .stat-number {
                font-size: 1.8rem;
                margin-bottom: 0.5rem;
            }

            .stat-label {
                font-size: 0.85rem;
            }
        }

        /* Team Section */
        .team {
            padding: 6rem 2rem;
            background: var(--light-gray);
        }

        .team-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        @media (min-width: 768px) {
            .team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1200px) {
            .team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .team-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--border-light);
            transition: all 0.4s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }

        .team-image {
            height: 280px;
            background: var(--gradient-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .team-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }

        .team-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white" opacity="0.1"/><circle cx="80" cy="80" r="2" fill="white" opacity="0.1"/><circle cx="40" cy="60" r="1" fill="white" opacity="0.1"/></svg>');
            z-index: 1;
        }

        .team-info {
            padding: 2rem;
        }

        .team-name {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .team-role {
            color: var(--primary-blue);
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .team-description {
            color: var(--text-medium);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .team-contact {
            display: flex;
            gap: 1rem;
        }

        .team-contact a {
            width: 35px;
            height: 35px;
            background: var(--light-blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-blue);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .team-contact a:hover {
            background: var(--primary-blue);
            color: var(--white);
            transform: translateY(-2px);
        }

        /* Process Section */
        .process {
            padding: 6rem 2rem;
            background: var(--white);
        }

        .process-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .process-timeline {
            margin-top: 4rem;
            position: relative;
        }

        .process-timeline::before {
            display: none;
        }

        .process-item {
            display: flex;
            flex-direction: column !important;
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
        }

        .process-number {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 60px;
            background: var(--gradient-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 800;
            font-size: 1.3rem;
            box-shadow: var(--shadow-lg);
            z-index: 2;
            transition: all 0.3s ease;
        }

        .process-item:hover .process-number {
            transform: translateX(-50%) scale(1.1);
            box-shadow: 0 8px 25px rgba(30, 90, 168, 0.4);
        }

        .process-content {
            flex: 1;
            padding: 2.5rem;
            background: var(--white);
            border-radius: 20px;
            position: relative;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            width: 100%;
            transition: all 0.3s ease;
        }

        .process-item:hover .process-content {
            transform: translateY(-5px);
            box-shadow: var(--shadow-xl);
        }

        .process-title {
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            color: var(--text-dark);
            font-weight: 700;
            margin-top: 1rem;
            transition: color 0.3s ease;
        }

        .process-item:hover .process-title {
            color: var(--primary-blue);
        }

        .process-description {
            color: var(--text-medium);
            line-height: 1.7;
            font-size: 1.1rem;
        }

        .process-image {
            width: 100%;
            height: 200px;
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .process-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 6rem 2rem;
            background: var(--light-blue);
        }

        .testimonials-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .testimonial-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 20px;
            border: 1px solid var(--border-light);
            position: relative;
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .testimonial-quote {
            font-size: 1.1rem;
            line-height: 1.6;
            color: var(--text-medium);
            margin-bottom: 1.5rem;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .testimonial-avatar {
            width: 50px;
            height: 50px;
            background: var(--gradient-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 600;
            overflow: hidden;
        }

        .testimonial-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .testimonial-info h4 {
            font-size: 1rem;
            margin-bottom: 0.25rem;
            color: var(--text-dark);
        }

        .testimonial-info p {
            font-size: 0.9rem;
            color: var(--text-light);
            margin: 0;
        }

        /* Contact Section */
        .contact {
            padding: 6rem 2rem;
            background: var(--white);
        }

        .contact-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            padding: 0 2rem;
        }

        .contact-info {
            background: var(--light-gray);
            padding: 3rem;
            border-radius: 20px;
        }

        .contact-info h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .contact-info p {
            color: var(--text-medium);
            margin-bottom: 2rem;
        }

        .contact-items {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-blue);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.2rem;
        }

        .contact-details h4 {
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
            color: var(--text-dark);
        }

        .contact-details p {
            color: var(--text-medium);
            margin: 0;
        }

        .contact-form {
            background: var(--white);
            padding: 3rem;
            border-radius: 20px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-lg);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            border: 2px solid var(--border-light);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--white);
            color: var(--text-dark);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(30, 90, 168, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        /* Footer */
        .footer {
            background: var(--text-dark);
            color: var(--white);
            padding: 4rem 2rem 2rem;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h4 {
            color: var(--white);
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .footer-section p,
        .footer-section a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            line-height: 1.8;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--white);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-social {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .footer-social a:hover {
            background: var(--primary-blue);
            transform: translateY(-2px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .slide-in-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .slide-in-left.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .slide-in-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .slide-in-right.visible {
            opacity: 1;
            transform: translateX(0);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .nav-menu {
                gap: 0.1rem;
            }

            .nav-link {
                padding: 0.6rem 0.6rem;
                font-size: 0.8rem;
            }

            .btn {
                padding: 0.6rem 0.8rem;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 1024px) {
            .nav-menu {
                gap: 0.1rem;
            }

            .nav-link {
                padding: 0.5rem 0.4rem;
                font-size: 0.75rem;
            }

            .nav-link span {
                display: none;
            }

            .nav-link i {
                font-size: 1rem;
            }

            .btn {
                padding: 0.6rem 0.8rem;
                font-size: 0.75rem;
            }
        }

        @media (max-width: 768px) {
            .nav-container {
                padding: 0 0.75rem;
            }

            .nav-menu {
                display: none;
            }

            .nav-cta {
                display: none;
            }

            .mobile-menu-btn {
                display: flex;
            }
        }

        @media (max-width: 480px) {
            .nav-container {
                padding: 0 0.5rem;
            }

            .mobile-nav-link {
                font-size: 1rem;
                padding: 1.25rem 1.5rem;
                margin: 0 1rem;
            }
        }

        /* Responsive Design for other sections */
        @media (max-width: 1024px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: center;
            }

            .hero-visual {
                order: -1;
            }

            .about-container {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .contact-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .process-timeline::before {
                display: none;
            }

            .process-item {
                flex-direction: column !important;
                text-align: center;
            }

            .process-content {
                margin: 0 !important;
                max-width: 100%;
            }

            .process-number {
                position: relative;
                transform: none;
                margin-bottom: 2rem;
                margin-top: 0;
            }
        }

        @media (max-width: 768px) {
            .hero-container {
                padding: 2rem 1.5rem;
                min-height: auto;
                gap: 2rem;
            }

            .hero-content {
                padding: 0;
            }

            .hero-visual {
                order: -1;
                height: 300px;
            }

            .hero-image {
                height: 300px;
                font-size: 4rem;
            }
        }

        @media (max-width: 480px) {
            .hero-container {
                padding: 1.5rem 1rem;
                gap: 1.5rem;
            }

            .hero-visual {
                height: 250px;
            }

            .hero-image {
                height: 250px;
                font-size: 3rem;
            }
        }

        /* Utility Classes */
        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .text-right { text-align: right; }
        .mb-1 { margin-bottom: 0.25rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-3 { margin-bottom: 1rem; }
        .mb-4 { margin-bottom: 1.5rem; }
        .mt-1 { margin-top: 0.25rem; }
        .mt-2 { margin-top: 0.5rem; }
        .mt-3 { margin-top: 1rem; }
        .mt-4 { margin-top: 1.5rem; }

        /* Loading Animation */
        .loading {
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Smooth transitions for all interactive elements */
        * {
            transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Animations spécifiques pour le processus */
        .process-item {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .process-item.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .process-item:nth-child(1) { transition-delay: 0.1s; }
        .process-item:nth-child(2) { transition-delay: 0.2s; }
        .process-item:nth-child(3) { transition-delay: 0.3s; }
        .process-item:nth-child(4) { transition-delay: 0.4s; }
        .process-item:nth-child(5) { transition-delay: 0.5s; }

        .process-number {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 60px;
            background: var(--gradient-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 800;
            font-size: 1.3rem;
            box-shadow: var(--shadow-lg);
            z-index: 2;
            transition: all 0.3s ease;
        }

        .stat-item:nth-child(1) { transition-delay: 0.1s; }
        .stat-item:nth-child(2) { transition-delay: 0.2s; }
        .stat-item:nth-child(3) { transition-delay: 0.3s; }
        .stat-item:nth-child(4) { transition-delay: 0.4s; }

        @media (max-width: 768px) {
            .services-container,
            .about-container,
            .team-container,
            .process-container,
            .testimonials-container,
            .contact-container {
                padding: 0 1rem;
            }

            .hero,
            .services,
            .about,
            .team,
            .process,
            .testimonials,
            .contact {
                padding: 3rem 1rem;
            }

            .hero-cta {
                flex-direction: column;
                align-items: center;
            }

            .services-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .team-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .testimonials-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .about-features {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .trust-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }

            .service-card,
            .team-card,
            .testimonial-card {
                padding: 1.5rem;
            }

            .contact-form,
            .contact-info {
                padding: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .services-container,
            .about-container,
            .team-container,
            .process-container,
            .testimonials-container,
            .contact-container {
                padding: 0 0.75rem;
            }

            .hero,
            .services,
            .about,
            .team,
            .process,
            .testimonials,
            .contact {
                padding: 2rem 0.75rem;
            }

            .about-container {
                padding: 0 1rem;
            }

            .about-content {
                padding: 0 0.5rem;
            }

            .about-features {
                gap: 1.5rem;
                margin-top: 2rem;
            }

            .about-feature {
                padding: 1rem;
                margin: 0 0.25rem;
            }

            .hero-title {
                font-size: clamp(1.6rem, 7vw, 2.2rem);
                line-height: 1.3;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .service-card,
            .team-card,
            .testimonial-card {
                padding: 1.25rem;
                margin: 0 0.5rem;
                border-radius: 15px;
            }

            .contact-form,
            .contact-info {
                padding: 1.25rem;
                margin: 0 0.5rem;
            }

            .whatsapp-question {
                padding: 1rem;
                margin: 0 0.5rem;
                border-radius: 10px;
            }

            .trust-section {
                padding: 2rem 0.75rem;
            }

            .trust-grid {
                gap: 1rem;
            }

            .trust-item {
                padding: 1rem;
                margin: 0 0.5rem;
            }

            .stats-grid {
                gap: 1rem;
                padding: 0 0.75rem;
            }

            .stat-item {
                padding: 1.5rem 1rem;
            }
        }

        @media (max-width: 360px) {
            .services-container,
            .about-container,
            .team-container,
            .process-container,
            .testimonials-container,
            .contact-container {
                padding: 0 0.5rem;
            }

            .hero,
            .services,
            .about,
            .team,
            .process,
            .testimonials,
            .contact {
                padding: 1.5rem 0.5rem;
            }

            .service-card,
            .team-card,
            .testimonial-card {
                padding: 1rem;
                margin: 0 0.25rem;
            }

            .contact-form,
            .contact-info {
                padding: 1rem;
                margin: 0 0.25rem;
            }

            .whatsapp-question {
                padding: 0.75rem;
                margin: 0 0.25rem;
            }

            .trust-section {
                padding: 1.5rem 0.5rem;
            }

            .trust-item {
                padding: 0.75rem;
                margin: 0 0.25rem;
            }
        }

        /* WhatsApp Questions Styles */
        .whatsapp-questions {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .whatsapp-question {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: var(--light-gray);
            border: 1px solid var(--border-light);
            border-radius: 12px;
            text-decoration: none;
            color: var(--text-dark);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .whatsapp-question::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--gradient-blue);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .whatsapp-question:hover {
            background: var(--light-blue);
            border-color: var(--primary-blue);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .whatsapp-question:hover::before {
            transform: scaleY(1);
        }

        .question-icon {
            font-size: 2rem;
            flex-shrink: 0;
            z-index: 1;
            position: relative;
        }

        .question-content {
            flex: 1;
            z-index: 1;
            position: relative;
        }

        .question-content h4 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: var(--primary-blue);
            font-weight: 600;
        }

        .question-content p {
            font-size: 0.9rem;
            color: var(--text-medium);
            margin: 0;
            line-height: 1.4;
        }

        @media (max-width: 768px) {
            .whatsapp-question {
                flex-direction: column;
                text-align: center;
                padding: 1.25rem;
            }

            .question-icon {
                font-size: 1.75rem;
                margin-bottom: 0.75rem;
            }

            .question-content h4 {
                font-size: 1rem;
                margin-bottom: 0.5rem;
            }

            .question-content p {
                font-size: 0.85rem;
            }
        }

        /* Team Creation Styles */
        .team-creation {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .team-creation::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .team-creation-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            z-index: 1;
            position: relative;
        }

        .team-creation-text {
            z-index: 1;
            position: relative;
        }

        .team-creation-text h4 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .team-creation-text p {
            font-size: 0.9rem;
            opacity: 0.9;
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header" id="header">
        <div class="nav-container">
            <div class="logo-container">
                <img src="{{ asset('front/assets/images/image8.png') }}" alt="Axe Legal Logo" class="logo-image">
            </div>

            <nav class="nav-menu">
                <li class="nav-item"><a href="{{ route('welcome') }}" class="nav-link"><i class="fas fa-home"></i><span>Accueil</span></a></li>
                <li class="nav-item"><a href="{{ route('services') }}" class="nav-link"><i class="fas fa-gavel"></i><span>Services</span></a></li>
                <li class="nav-item"><a href="{{ route('equipe') }}" class="nav-link"><i class="fas fa-users"></i><span>Équipe</span></a></li>
                <li class="nav-item"><a href="{{ route('processus') }}" class="nav-link"><i class="fas fa-tasks"></i><span>Processus</span></a></li>
                <li class="nav-item"><a href="{{ route('temoignage') }}" class="nav-link"><i class="fas fa-comments"></i><span>Témoignages</span></a></li>
                <li class="nav-item"><a href="{{ route('consultation') }}" class="nav-link active"><i class="fas fa-envelope"></i><span>Contact</span></a></li>
            </nav>

            <div class="nav-cta">
                <a href="{{ route('legalTech') }}" class="btn btn-primary"> <i class="fas fa-gavel"></i>Legal Tech</a>
            </div>

            <button class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Ouvrir le menu de navigation" title="Ouvrir le menu de navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <div class="mobile-menu" id="mobile-menu">
            <ul class="mobile-nav-menu">
                <li class="mobile-nav-item"><a href="{{ route('welcome') }}" class="mobile-nav-link"><i class="fas fa-home"></i>Accueil</a></li>
                <li class="mobile-nav-item"><a href="{{ route('services') }}" class="mobile-nav-link"><i class="fas fa-gavel"></i>Services</a></li>
                <li class="mobile-nav-item"><a href="{{ route('equipe') }}" class="mobile-nav-link"><i class="fas fa-users"></i>Équipe</a></li>
                <li class="mobile-nav-item"><a href="{{ route('processus') }}" class="mobile-nav-link"><i class="fas fa-tasks"></i>Processus</a></li>
                <li class="mobile-nav-item"><a href="{{ route('temoignage') }}" class="mobile-nav-link"><i class="fas fa-comments"></i>Témoignages</a></li>
                <li class="mobile-nav-item"><a href="{{ route('contact') }}" class="mobile-nav-link"><i class="fas fa-envelope"></i>Contact</a></li>
                <li class="mobile-nav-item"><a href="{{ route('consultation') }}" class="mobile-nav-link"><i class="fas fa-phone"></i>Consultation Gratuite</a></li>
            </ul>
        </div>
    </header>

<!-- Hero Section - Contact Focused -->
<section id="accueil" class="hero" style="
    background:
        linear-gradient(135deg, rgba(30, 90, 168, 0.9) 0%, rgba(43, 116, 212, 0.8) 50%, rgba(74, 144, 226, 0.9) 100%),
        url('{{ asset('front/assets/images/image6.jpg') }}') center/cover no-repeat;
    padding: 4rem 1rem;
    min-height: 85vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
">
    <!-- Background Pattern Overlay -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 100 100&quot;><defs><pattern id=&quot;dots&quot; width=&quot;20&quot; height=&quot;20&quot; patternUnits=&quot;userSpaceOnUse&quot;><circle cx=&quot;10&quot; cy=&quot;10&quot; r=&quot;1&quot; fill=&quot;white&quot; opacity=&quot;0.1&quot;/></pattern></defs><rect width=&quot;100&quot; height=&quot;100&quot; fill=&quot;url(%23dots)&quot;/></svg>');
        z-index: 1;
    "></div>

    <div class="hero-container" style="max-width: 1400px; margin: 0 auto; display: grid; grid-template-columns: 1fr; gap: 3rem; text-align: center; position: relative; z-index: 2;">

        <!-- Contact Introduction -->
        <div class="contact-intro" style="max-width: 800px; margin: 0 auto;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 0.75rem 1.5rem; border-radius: 50px; margin-bottom: 2rem; font-size: 0.9rem; font-weight: 600; color: var(--primary-blue); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.2);">
                <span><i class="fas fa-phone"></i></span> Consultation Gratuite
            </div>

            <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 800; line-height: 1.1; margin-bottom: 1.5rem; color: var(--white); font-family: 'Playfair Display', serif; text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);">
                Votre <span style="background: linear-gradient(135deg, #FFD700, #FFA500); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-shadow: none;">Partenaire</span> Juridique
            </h1>

            <p style="font-size: clamp(1rem, 2.5vw, 1.2rem); line-height: 1.6; color: rgba(255, 255, 255, 0.9); margin-bottom: 3rem; max-width: 600px; margin-left: auto; margin-right: auto; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);">
                Prêt à discuter de vos besoins juridiques ? Notre approche en 5 étapes garantit un accompagnement sur mesure.
            </p>
        </div>

        <!-- Process Steps Preview - ADAPTÉ POUR CONSULTATION -->
        <div class="process-steps-preview" style="
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
            padding: 0 1rem;
        ">


        </div>


    </div>
</section>



<!-- Section Prise de Rendez-vous -->
<section id="rendezvous" class="appointment-section" style="
    padding: 5rem 1rem;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">

        <!-- En-tête -->
        <div class="appointment-header" style="text-align: center; margin-bottom: 4rem;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: var(--primary-blue); color: white; padding: 0.75rem 1.5rem; border-radius: 50px; margin-bottom: 1.5rem; font-size: 0.9rem; font-weight: 600;">
                <span><i class="fas fa-calendar-check"></i></span> Prise de Rendez-vous
            </div>

            <h2 style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 700; color: var(--primary-blue); margin-bottom: 1rem; font-family: 'Playfair Display', serif;">
                Prenez Rendez-vous en Ligne
            </h2>

            <p style="font-size: 1.1rem; color: var(--text-dark); max-width: 600px; margin: 0 auto; line-height: 1.6;">
                Choisissez la date et l'heure qui vous conviennent pour une consultation avec nos experts juridiques.
            </p>
        </div>

        <!-- Formulaire de Rendez-vous -->
        <div class="appointment-form-container" style="
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 800px;
            margin: 0 auto;
        ">

            <!-- Indicateur de progression -->
            <div class="form-progress" style="
                display: flex;
                background: #f8f9fa;
                padding: 1.5rem 2rem;
                border-bottom: 1px solid #e9ecef;
            ">
                <div class="progress-step active" style="flex: 1; text-align: center; position: relative;">
                    <div style="width: 40px; height: 40px; background: var(--primary-blue); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem; font-weight: 600;">1</div>
                    <span style="font-size: 0.9rem; font-weight: 600; color: var(--primary-blue);">Date & Heure</span>
                </div>
                <div class="progress-step" style="flex: 1; text-align: center; position: relative;">
                    <div style="width: 40px; height: 40px; background: #dee2e6; color: #6c757d; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem; font-weight: 600;">2</div>
                    <span style="font-size: 0.9rem; font-weight: 600; color: #6c757d;">Informations</span>
                </div>
                <div class="progress-step" style="flex: 1; text-align: center; position: relative;">
                    <div style="width: 40px; height: 40px; background: #dee2e6; color: #6c757d; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem; font-weight: 600;">3</div>
                    <span style="font-size: 0.9rem; font-weight: 600; color: #6c757d;">Confirmation</span>
                </div>
            </div>

            <!-- Étape 1 : Date et Heure -->
            <div class="form-step active" id="step1" style="padding: 2rem;">
                <h3 style="color: var(--primary-blue); margin-bottom: 2rem; font-size: 1.5rem;">Choisissez la date et l'heure</h3>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <!-- Sélecteur de Date -->
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--text-dark);">
                            <i class="fas fa-calendar-alt"></i> Date souhaitée
                        </label>
                        <input type="date" id="appointment-date" name="date" style="
                            width: 100%;
                            padding: 1rem;
                            border: 2px solid #e9ecef;
                            border-radius: 10px;
                            font-size: 1rem;
                            transition: all 0.3s ease;
                        " onfocus="this.style.borderColor='var(--primary-blue)'; this.style.boxShadow='0 0 0 3px rgba(30, 90, 168, 0.1)'"
                        onblur="this.style.borderColor='#e9ecef'; this.style.boxShadow='none'">
                    </div>

                    <!-- Sélecteur d'Heure -->
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--text-dark);">
                            <i class="fas fa-clock"></i> Heure souhaitée
                        </label>
                        <select id="appointment-time" name="time" style="
                            width: 100%;
                            padding: 1rem;
                            border: 2px solid #e9ecef;
                            border-radius: 10px;
                            font-size: 1rem;
                            background: white;
                            transition: all 0.3s ease;
                        " onfocus="this.style.borderColor='var(--primary-blue)'; this.style.boxShadow='0 0 0 3px rgba(30, 90, 168, 0.1)'"
                        onblur="this.style.borderColor='#e9ecef'; this.style.boxShadow='none'">
                            <option value="">Sélectionnez une heure</option>
                            <option value="09:00">09:00 - 09:30</option>
                            <option value="09:30">09:30 - 10:00</option>
                            <option value="10:00">10:00 - 10:30</option>
                            <option value="10:30">10:30 - 11:00</option>
                            <option value="11:00">11:00 - 11:30</option>
                            <option value="14:00">14:00 - 14:30</option>
                            <option value="14:30">14:30 - 15:00</option>
                            <option value="15:00">15:00 - 15:30</option>
                            <option value="15:30">15:30 - 16:00</option>
                            <option value="16:00">16:00 - 16:30</option>
                        </select>
                    </div>
                </div>

                <!-- Type de Consultation -->
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; margin-bottom: 1rem; font-weight: 600; color: var(--text-dark);">
                        <i class="fas fa-video"></i> Type de consultation
                    </label>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div class="consultation-type" style="
                            padding: 1.5rem;
                            border: 2px solid #e9ecef;
                            border-radius: 10px;
                            text-align: center;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        " onclick="selectConsultationType(this, 'presentiel')">
                            <div style="font-size: 2rem; margin-bottom: 0.5rem; color: var(--primary-blue);">
                                <i class="fas fa-user"></i>
                            </div>
                            <h4 style="margin-bottom: 0.5rem; color: var(--text-dark);">Présentiel</h4>
                            <p style="font-size: 0.9rem; color: #6c757d; margin: 0;">À notre cabinet</p>
                        </div>
                        <div class="consultation-type" style="
                            padding: 1.5rem;
                            border: 2px solid #e9ecef;
                            border-radius: 10px;
                            text-align: center;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        " onclick="selectConsultationType(this, 'telephonique')">
                            <div style="font-size: 2rem; margin-bottom: 0.5rem; color: var(--primary-blue);">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h4 style="margin-bottom: 0.5rem; color: var(--text-dark);">Téléphonique</h4>
                            <p style="font-size: 0.9rem; color: #6c757d; margin: 0;">Appel vocal</p>
                        </div>
                    </div>
                </div>

                <button onclick="nextStep(2)" style="
                    width: 100%;
                    background: var(--primary-blue);
                    color: white;
                    border: none;
                    padding: 1rem 2rem;
                    border-radius: 10px;
                    font-size: 1.1rem;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(30, 90, 168, 0.3)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                    Suivant <i class="fas fa-arrow-right"></i>
                </button>
            </div>

            <!-- Étape 2 : Informations Personnelles -->
            <div class="form-step" id="step2" style="padding: 2rem; display: none;">
                @include('partials.flash')
                <form method="POST" action="{{ route('consultation.submit') }}" id="consultationMultiStepForm">
                    @csrf
                    <input type="hidden" name="scheduled_at" id="scheduled_at" value="">
                <h3 style="color: var(--primary-blue); margin-bottom: 2rem; font-size: 1.5rem;">Vos informations</h3>
                <form action="">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                        <div>
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--text-dark);">Prénom *</label>
                            <input type="text" name="first_name" required style="width: 100%; padding: 1rem; border: 2px solid #e9ecef; border-radius: 10px;">
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--text-dark);">Nom *</label>
                            <input type="text" name="name" required style="width: 100%; padding: 1rem; border: 2px solid #e9ecef; border-radius: 10px;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                        <div>
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--text-dark);">Email *</label>
                            <input type="email" name="email" required style="width: 100%; padding: 1rem; border: 2px solid #e9ecef; border-radius: 10px;">
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--text-dark);">Téléphone *</label>
                            <input type="tel" name="phone" required style="width: 100%; padding: 1rem; border: 2px solid #e9ecef; border-radius: 10px;">
                        </div>
                    </div>
                </form>
                    <div style="margin-bottom: 2rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--text-dark);">Objet de la consultation *</label>
                    <textarea name="subject" rows="4" placeholder="Décrivez brièvement la raison de votre consultation..." style="
                        width: 100%;
                        padding: 1rem;
                        border: 2px solid #e9ecef;
                        border-radius: 10px;
                        resize: vertical;
                        font-family: inherit;
                    "></textarea>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <button onclick="prevStep(1)" style="
                        flex: 1;
                        background: #6c757d;
                        color: white;
                        border: none;
                        padding: 1rem;
                        border-radius: 10px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    ">
                        <i class="fas fa-arrow-left"></i> Retour
                    </button>
                    <button onclick="nextStep(3)" style="
                        flex: 2;
                        background: var(--primary-blue);
                        color: white;
                        border: none;
                        padding: 1rem;
                        border-radius: 10px;
                        font-size: 1.1rem;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    ">
                        Confirmer le Rendez-vous <i class="fas fa-check"></i>
                    </button>
                </div>
            </div>

            <!-- Étape 3 : Confirmation -->
            <div class="form-step" id="step3" style="padding: 3rem; text-align: center; display: none;">
                <div style="width: 80px; height: 80px; background: #28a745; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; font-size: 2rem;">
                    <i class="fas fa-check"></i>
                </div>

                <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.8rem;">Rendez-vous Confirmé !</h3>

                <p style="color: var(--text-dark); margin-bottom: 2rem; font-size: 1.1rem;">
                    Votre demande de rendez-vous a été enregistrée avec succès.
                    Notre équipe vous contactera dans les plus brefs délais pour confirmation.
                </p>

                <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 10px; margin-bottom: 2rem; text-align: left;">
                    <h4 style="color: var(--primary-blue); margin-bottom: 1rem;">Récapitulatif :</h4>
                    <div id="appointment-summary"></div>
                </div>

                <button onclick="resetForm()" style="
                    background: var(--primary-blue);
                    color: white;
                    border: none;
                    padding: 1rem 2rem;
                    border-radius: 10px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                ">
                    Prendre un Nouveau Rendez-vous
                </button>
            </div>
        </div>

        <!-- Informations de Contact -->
        <div style="text-align: center; margin-top: 3rem; color: #6c757d;">
            <p>Vous préférez prendre rendez-vous par téléphone ?</p>
            <a href="tel:+2290197747593" style="color: var(--primary-blue); font-weight: 600; text-decoration: none; font-size: 1.2rem;">
                <i class="fas fa-phone"></i> +229 01 97 74 75 93
            </a>
        </div>
    </div>
</section>



    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>AXE LEGAL</h4>
                    <p>
                        Cabinet d'affaires spécialisé dans l'accompagnement juridique des entreprises
                        et particuliers au Bénin.
                    </p>

                    <p><strong>Composition de l'équipe :</strong></p>
                    <ul class="footer-links">
                        <li>
                            <i class="fas fa-user-tie" style="margin-right: 6px; color: #004080;"></i>
                            L'Associé-Gérant
                        </li>
                        <li>
                            <i class="fas fa-coins" style="margin-right: 6px; color: #004080;"></i>
                            La Cellule de l'Intelligence Fiscale
                        </li>
                        <li>
                            <i class="fas fa-balance-scale" style="margin-right: 6px; color: #004080;"></i>
                            La Cellule des Actes Juridiques et de la Gouvernance d'Entreprise
                        </li>
                        <li>
                            <i class="fas fa-chart-line" style="margin-right: 6px; color: #004080;"></i>
                            La Cellule de Traitement de l'Information Financière
                        </li>
                    </ul>

                    <div class="footer-social">
                        <a href="https://www.facebook.com/profile.php?id=100092728800155" title="Facebook" target="_blank">
                            <i class="fab fa-facebook-square" style="font-size: 1.4rem; color: #4267B2;"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/axe-legal-0134991b2/" title="LinkedIn" target="_blank">
                            <i class="fab fa-linkedin" style="font-size: 1.4rem; color: #0A66C2;"></i>
                        </a>
                    </div>
                </div>


               <div class="footer-section">
                    <h4>Nos Prestations</h4>
                    <p><strong>Nous travaillons sous :</strong></p>
                    <ul class="footer-links">
                        <li><i class="fas fa-check-circle" style="margin-right: 6px; color: #00bfa6;"></i> Prestations sous contrat de trois mois au moins avec paiement mensuel ou trimestriel</li>
                        <li><i class="fas fa-check-circle" style="margin-right: 6px; color: #00bfa6;"></i> Prestation instantanée avec paiement à la tâche ou par mission</li>
                    </ul>
                </div>


                <div class="footer-section">
                    <h4>Informations Légales</h4>
                    <ul class="footer-links">
                        <li>
                            <i class="fas fa-briefcase" style="margin-right: 6px; color: #004080;"></i>
                            <strong>Registre du commerce :</strong> RB/ABC/20 B 3095
                        </li>
                        <li>
                            <i class="fas fa-id-card" style="margin-right: 6px; color: #004080;"></i>
                            <strong>Identifiant fiscal :</strong> 3202011436651
                        </li>
                    </ul>
                </div>


                <div class="footer-section">
                    <h4>Contact</h4>
                    <p><strong>Adresse :</strong><br>
                    Godomey échangeur, en direction Calavi-Cotonou, côté opposé à la mosquée.<br>
                    Bénin</p>
                    <p><strong>Téléphone :</strong><br>
                    +229 01 97 74 75 93<br>
                    +229 01 65 65 68 25<br>
                    +229 01 40 66 69 38</p>
                    <p><a href="https://maps.app.goo.gl/5b6RALZhyXMQQavh6" target="_blank" style="color: var(--primary-blue);">📍 Voir sur Google Maps</a></p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>
                    &copy; 2025 AXE LEGAL - Cabinet d'Affaires. Tous droits réservés. |
                    Développement web par Ray Ague
                </p>
            </div>
        </div>
    </footer>






    <script>
// Gestion des étapes du formulaire
function nextStep(step) {
    document.querySelectorAll('.form-step').forEach(el => el.style.display = 'none');
    document.getElementById('step' + step).style.display = 'block';

    // Mise à jour de la progression
    document.querySelectorAll('.progress-step').forEach((el, index) => {
        if (index < step) {
            el.querySelector('div').style.background = 'var(--primary-blue)';
            el.querySelector('div').style.color = 'white';
            el.querySelector('span').style.color = 'var(--primary-blue)';
        } else {
            el.querySelector('div').style.background = '#dee2e6';
            el.querySelector('div').style.color = '#6c757d';
            el.querySelector('span').style.color = '#6c757d';
        }
    });
}

function prevStep(step) {
    nextStep(step);
}

// Sélection du type de consultation
function selectConsultationType(element, type) {
    document.querySelectorAll('.consultation-type').forEach(el => {
        el.style.borderColor = '#e9ecef';
        el.style.background = 'white';
    });
    element.style.borderColor = 'var(--primary-blue)';
    element.style.background = '#f0f7ff';
}

// Réinitialisation du formulaire
function resetForm() {
    document.querySelectorAll('.form-step').forEach(el => el.style.display = 'none');
    document.getElementById('step1').style.display = 'block';
    document.querySelectorAll('.consultation-type').forEach(el => {
        el.style.borderColor = '#e9ecef';
        el.style.background = 'white';
    });

    // Réinitialiser la progression
    document.querySelectorAll('.progress-step').forEach((el, index) => {
        if (index === 0) {
            el.querySelector('div').style.background = 'var(--primary-blue)';
            el.querySelector('div').style.color = 'white';
            el.querySelector('span').style.color = 'var(--primary-blue)';
        } else {
            el.querySelector('div').style.background = '#dee2e6';
            el.querySelector('div').style.color = '#6c757d';
            el.querySelector('span').style.color = '#6c757d';
        }
    });
}
</script>
    <script>
        // Header scroll effect
            const header = document.getElementById('header');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenuBtn.classList.toggle('active');
            mobileMenu.classList.toggle('active');
        });

        // Close mobile menu when clicking on links
        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenuBtn.classList.remove('active');
                mobileMenu.classList.remove('active');
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 70;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active navigation link highlighting
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');

            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                if (window.scrollY >= sectionTop) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');

                    // Animate counters when stats section is visible
                    if (entry.target.classList.contains('stats') || entry.target.closest('.stats')) {
                        animateCounters();
                    }
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right, .process-item, .stats').forEach(el => {
            observer.observe(el);
        });

        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const increment = target / 100;
                let current = 0;

                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        if (target === 98) {
                            // Pourcentage avec décimal
                            counter.textContent = current.toFixed(1);
                        } else {
                        counter.textContent = Math.floor(current);
                        }
                        requestAnimationFrame(updateCounter);
                    } else {
                        if (target === 98) {
                            counter.textContent = target + '%';
                    } else {
                        counter.textContent = target;
                        }
                    }
                };

                updateCounter();
            });
        }

        // Form handling
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);

            // Simulate form submission
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.innerHTML = '⏳ Envoi en cours...';
            submitBtn.disabled = true;

            // Simulate API call
            setTimeout(() => {
                submitBtn.innerHTML = '✅ Demande envoyée !';
                submitBtn.style.background = '#10B981';

                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.style.background = '';
                    submitBtn.disabled = false;
                    this.reset();

                    // Show success message
                    alert('Votre demande a été envoyée avec succès ! Nous vous recontacterons dans les plus brefs délais.');
                }, 2000);
            }, 1500);
        });
            // Multi-step form navigation
            window.nextStep = function(step) {
                document.querySelectorAll('.form-step').forEach(s => s.style.display = 'none');
                document.getElementById('step' + step).style.display = 'block';
            }

            // Before submit, populate scheduled_at with date + time
            const consultForm = document.getElementById('consultationMultiStepForm');
            if (consultForm) {
                consultForm.addEventListener('submit', function(e) {
                    const date = document.getElementById('appointment-date')?.value;
                    const time = document.getElementById('appointment-time')?.value;
                    const hidden = document.getElementById('scheduled_at');
                    if (date && time && hidden) {
                        hidden.value = date + ' ' + time;
                    }
                });
            }


        // Initialize loading animations
        document.addEventListener('DOMContentLoaded', () => {
            // Remove loading class from hero elements after page load
            setTimeout(() => {
                document.querySelectorAll('.loading').forEach(el => {
                    el.classList.remove('loading');
                });
            }, 100);
        });

        // Performance optimization
        let ticking = false;

        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateAnimations);
                ticking = true;
            }
        }

        function updateAnimations() {
            ticking = false;
        }

        window.addEventListener('scroll', requestTick);

        // Service card hover effects
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px) scale(1.02)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Team card interactions
        document.querySelectorAll('.team-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                const image = card.querySelector('.team-image');
                image.style.transform = 'scale(1.05)';
            });

            card.addEventListener('mouseleave', () => {
                const image = card.querySelector('.team-image');
                image.style.transform = 'scale(1)';
            });
        });

        // Testimonial carousel (optional enhancement)
        const testimonialCards = document.querySelectorAll('.testimonial-card');
        let currentTestimonial = 0;

        function rotateTestimonials() {
            testimonialCards.forEach((card, index) => {
                if (index === currentTestimonial) {
                    card.style.transform = 'scale(1.05)';
                    card.style.boxShadow = '0 25px 50px rgba(30, 90, 168, 0.15)';
                } else {
                    card.style.transform = 'scale(1)';
                    card.style.boxShadow = '';
                }
            });

            currentTestimonial = (currentTestimonial + 1) % testimonialCards.length;
        }

        // Rotate testimonials every 5 seconds
        setInterval(rotateTestimonials, 5000);

        // Initialize first testimonial highlight
        if (testimonialCards.length > 0) {
            testimonialCards[0].style.transform = 'scale(1.05)';
            testimonialCards[0].style.boxShadow = '0 25px 50px rgba(30, 90, 168, 0.15)';
        }
    </script>
</body>
</html>

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



        /* Styles responsive pour mobile */
@media (max-width: 768px) {
    .formations-section {
        padding: 3rem 0.5rem !important;
    }

    .formations-grid {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }

    .formation-filters {
        gap: 0.5rem !important;
    }

    .filter-btn {
        padding: 0.6rem 1rem !important;
        font-size: 0.8rem !important;
    }

    .advantages-section {
        padding: 2rem 1rem !important;
    }

    .advantages-section > div {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
}

@media (max-width: 480px) {
    .formations-header h2 {
        font-size: 1.6rem !important;
    }

    .formation-card {
        margin: 0 0.5rem !important;
    }

    .formation-card > div:last-child {
        padding: 1.5rem !important;
    }

    .buy-btn {
        padding: 0.6rem 1rem !important;
        font-size: 0.9rem !important;
    }
}

/* Animation des cartes */
.formation-card {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
}

/* Style des boutons de filtre actifs */
.filter-btn.active {
    transform: translateY(-2px) !important;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2) !important;
}

/* Support du mode sombre */
@media (prefers-color-scheme: dark) {
    .formations-section {
        background: #1a202c !important;
        color: white;
    }

    .formation-card {
        background: #2d3748 !important;
        border-color: #4a5568 !important;
    }

    .advantages-section {
        background: #2d3748 !important;
    }

    .formation-card h3,
    .formation-card p,
    .advantages-section h3,
    .advantages-section p {
        color: #e2e8f0 !important;
    }
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
                <li class="nav-item"><a href="{{ route('services') }}" class="nav-link active"><i class="fas fa-gavel"></i><span>Services</span></a></li>
                <li class="nav-item"><a href="{{ route('equipe') }}" class="nav-link"><i class="fas fa-users"></i><span>Équipe</span></a></li>
                <li class="nav-item"><a href="{{ route('processus') }}" class="nav-link"><i class="fas fa-tasks"></i><span>Processus</span></a></li>
                <li class="nav-item"><a href="{{ route('temoignage') }}" class="nav-link"><i class="fas fa-comments"></i><span>Témoignages</span></a></li>
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link"><i class="fas fa-envelope"></i><span>Contact</span></a></li>
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

    <!-- Hero Section - Services Focused -->
    <section id="accueil" class="hero" style="
        background:
            linear-gradient(135deg, rgba(30, 90, 168, 0.9) 0%, rgba(43, 116, 212, 0.8) 50%, rgba(74, 144, 226, 0.9) 100%),
            url('{{ asset('front/assets/images/image4.jpg') }}') center/cover no-repeat;
        padding: 4rem 2rem;
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

            <!-- Services Introduction -->
            <div class="services-intro" style="max-width: 800px; margin: 0 auto;">

                <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 800; line-height: 1.1; margin-bottom: 1.5rem; color: var(--white); font-family: 'Playfair Display', serif; text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);">
                    Des <span style="background: linear-gradient(135deg, #FFD700, #FFA500); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-shadow: none;">Solutions</span> Juridiques d'Excellence
                </h1>

                <p style="font-size: 1.2rem; line-height: 1.6; color: rgba(255, 255, 255, 0.9); margin-bottom: 3rem; max-width: 600px; margin-left: auto; margin-right: auto; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);">
                    Une gamme complète de services juridiques adaptés aux besoins des entreprises et des particuliers, avec une approche personnalisée.
                </p>
            </div>
        </div>
    </section>
    <!-- Services Section -->
    <section id="services" class="services">
        <div class="services-container">
            <div class="section-header fade-in">
                <div class="section-badge"><i class="fas fa-scale-balanced"></i> Nos Expertises</div>
                <h2 class="section-title">Services Juridiques Complets</h2>
                <p class="section-subtitle">
                    Une gamme complète de services juridiques adaptés aux besoins des entreprises
                    et des particuliers, avec une approche personnalisée et des résultats garantis.
                </p>
            </div>

            <div class="services-grid">
                <div class="service-card fade-in">
                    <div class="service-icon">
                        <img src="{{ asset('front/assets/images/image1.jpg') }}" alt="Droit des Affaires" loading="lazy">
                    </div>
                    <h3 class="service-title">Droit des Affaires</h3>
                    <p class="service-description">
                        Accompagnement complet des entreprises dans leur création, développement et transformation.
                    </p>
                    <ul class="service-features">
                        <li>Création et structuration de sociétés</li>
                        <li>Gouvernance d'entreprise</li>
                        <li>Fusions et acquisitions</li>
                        <li>Contrats commerciaux</li>
                        <li>Propriété intellectuelle</li>
                    </ul>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon">
                        <img src="{{ asset('front/assets/images/image2.jpg') }}" alt="Fiscalité" loading="lazy">
                    </div>
                    <h3 class="service-title">Fiscalité</h3>
                    <p class="service-description">
                        Optimisation fiscale et défense de vos intérêts face à l'administration fiscale.
                    </p>
                    <ul class="service-features">
                        <li>Conseil en optimisation fiscale</li>
                        <li>Défense en cas de redressement</li>
                        <li>Déclarations fiscales</li>
                        <li>Contentieux fiscal</li>
                        <li>Audit fiscal</li>
                    </ul>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon">
                        <img src="{{ asset('front/assets/images/image3.jpg') }}" alt="Droit Immobilier" loading="lazy">
                    </div>
                    <h3 class="service-title">Droit Immobilier</h3>
                    <p class="service-description">
                        Sécurisation de vos transactions immobilières et résolution des litiges fonciers.
                    </p>
                    <ul class="service-features">
                        <li>Vérification des titres fonciers</li>
                        <li>Rédaction d'actes de vente</li>
                        <li>Baux commerciaux et d'habitation</li>
                        <li>Contentieux immobilier</li>
                        <li>Copropriété</li>
                    </ul>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon">
                        <img src="{{ asset('front/assets/images/image4.jpg') }}" alt="Droit du Travail" loading="lazy">
                    </div>
                    <h3 class="service-title">Droit du Travail</h3>
                    <p class="service-description">
                        Gestion optimale des relations sociales et accompagnement RH complet.
                    </p>
                    <ul class="service-features">
                        <li>Rédaction de contrats de travail</li>
                        <li>Procédures disciplinaires</li>
                        <li>Négociation collective</li>
                        <li>Contentieux prud'homal</li>
                        <li>Formation en droit social</li>
                    </ul>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon">
                        <img src="{{ asset('front/assets/images/image5.jpg') }}" alt="Recouvrement" loading="lazy">
                    </div>
                    <h3 class="service-title">Recouvrement</h3>
                    <p class="service-description">
                        Recovery efficace de vos créances avec une approche amiable et judiciaire.
                    </p>
                    <ul class="service-features">
                        <li>Recouvrement amiable</li>
                        <li>Procédures judiciaires</li>
                        <li>Saisies conservatoires</li>
                        <li>Négociation d'échéanciers</li>
                        <li>Suivi post-recouvrement</li>
                    </ul>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon">
                        <img src="{{ asset('front/assets/images/image6.jpg') }}" alt="Marchés Publics" loading="lazy">
                    </div>
                    <h3 class="service-title">Marchés Publics</h3>
                    <p class="service-description">
                        Expertise complète en marchés publics et contentieux administratif.
                    </p>
                    <ul class="service-features">
                        <li>Préparation des offres</li>
                        <li>Recours en annulation</li>
                        <li>Exécution des contrats</li>
                        <li>Contentieux administratif</li>
                        <li>Conseil en commande publique</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="about-container">
            <div class="about-content slide-in-left">
                <div class="section-badge"><i class="fas fa-book"></i> Notre Histoire</div>
                <h2>Excellence et Innovation Juridique</h2>
                <p>
                    Fondé en 2008, Axe Legal s'est imposé comme l'un des cabinets d'avocats les plus respectés
                    du Bénin. Notre mission est de fournir des solutions juridiques innovantes et sur mesure
                    à nos clients, qu'ils soient entrepreneurs, entreprises ou particuliers.
                </p>
                <p>
                    Nous combinons une expertise technique pointue avec une approche humaine et personnalisée,
                    garantissant à nos clients un accompagnement de qualité à chaque étape de leur parcours juridique.
                </p>

<div class="about-features">
    <div class="about-feature">
        <div class="about-feature-icon"><i class="fas fa-bullseye"></i></div>
        <div class="about-feature-content">
            <h4>Approche Stratégique</h4>
            <p>Solutions personnalisées et conseil stratégique adapté à vos enjeux</p>
        </div>
    </div>
    <div class="about-feature">
        <div class="about-feature-icon"><i class="fas fa-bolt"></i></div>
        <div class="about-feature-content">
            <h4>Réactivité</h4>
            <p>Réponse rapide et traitement efficace de vos dossiers urgents</p>
        </div>
    </div>
    <div class="about-feature">
        <div class="about-feature-icon"><i class="fas fa-handshake"></i></div>
        <div class="about-feature-content">
            <h4>Accompagnement</h4>
            <p>Suivi personnalisé et relation de confiance sur le long terme</p>
        </div>
    </div>
    <div class="about-feature">
        <div class="about-feature-icon"><i class="fas fa-trophy"></i></div>
        <div class="about-feature-content">
            <h4>Excellence</h4>
            <p>Standards de qualité élevés et expertise reconnue du marché</p>
        </div>
    </div>
</div>

            </div>

            <div class="about-visual slide-in-right">
                <div class="about-image">
                    <img src="{{ asset('front/assets/images/about-photo.jpeg') }}" alt="Cabinet Axe Legal - Équipe professionnelle" loading="lazy">
                    <div class="image-overlay">
                        <h3>Excellence Juridique</h3>
                        <p>15 ans d'expérience au service de nos clients</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section Formations Juridiques -->
<section id="formations" class="formations-section" style="
    padding: 5rem 1rem;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    min-height: 100vh;
">
    <div class="container" style="max-width: 1400px; margin: 0 auto;">

        <!-- En-tête -->
        <div class="formations-header" style="text-align: center; margin-bottom: 4rem;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: var(--primary-blue); color: white; padding: 0.75rem 1.5rem; border-radius: 50px; margin-bottom: 1.5rem; font-size: 0.9rem; font-weight: 600;">
                <span><i class="fas fa-graduation-cap"></i></span> Formations Juridiques
            </div>

            <h2 style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 700; color: var(--primary-blue); margin-bottom: 1rem; font-family: 'Playfair Display', serif;">
                Développez vos Compétences Juridiques
            </h2>

            <p style="font-size: 1.1rem; color: var(--text-dark); max-width: 700px; margin: 0 auto 2rem; line-height: 1.6;">
                Des formations expertes créées par nos juristes pour vous accompagner dans la maîtrise du droit.
                <strong>Apprenez à votre rythme et renforcez vos compétences.</strong>
            </p>

            <!-- Filtres par catégorie -->
            <div class="formation-filters" style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 2rem;">
                <button class="filter-btn active" data-filter="all" style="
                    background: var(--primary-blue);
                    color: white;
                    border: none;
                    padding: 0.75rem 1.5rem;
                    border-radius: 25px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                ">Toutes les formations</button>
                <button class="filter-btn" data-filter="entreprise" style="
                    background: #e3f2fd;
                    color: var(--primary-blue);
                    border: 2px solid var(--primary-blue);
                    padding: 0.75rem 1.5rem;
                    border-radius: 25px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                ">Droit des Entreprises</button>
                <button class="filter-btn" data-filter="immobilier" style="
                    background: #e8f5e8;
                    color: #2e7d32;
                    border: 2px solid #2e7d32;
                    padding: 0.75rem 1.5rem;
                    border-radius: 25px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                ">Droit Immobilier</button>
                <button class="filter-btn" data-filter="numerique" style="
                    background: #f3e5f5;
                    color: #7b1fa2;
                    border: 2px solid #7b1fa2;
                    padding: 0.75rem 1.5rem;
                    border-radius: 25px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                ">Droit du Numérique</button>
            </div>
        </div>

        <!-- Grille des formations -->
        <div class="formations-grid" style="
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        ">

            <!-- Formation 1 - Droit des Entreprises -->
            <div class="formation-card" data-category="entreprise" style="
                background: white;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                border: 1px solid #e9ecef;
            ">
                <!-- Badge populaire -->
                <div style="position: absolute; top: 1rem; right: 1rem; background: #ff6b6b; color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600; z-index: 2;">
                    <i class="fas fa-fire"></i> Populaire
                </div>

                <!-- Image de la formation -->
                <div style="height: 200px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); position: relative; overflow: hidden;">
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
                        <i class="fas fa-building" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.9;"></i>
                        <h4 style="margin: 0; font-size: 1.2rem; font-weight: 600;">ENTREPRISE</h4>
                    </div>
                </div>

                <!-- Contenu de la formation -->
                <div style="padding: 2rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.4rem; font-weight: 700;">
                        Création et Gestion d'Entreprise
                    </h3>

                    <p style="color: var(--text-dark); margin-bottom: 1.5rem; line-height: 1.6;">
                        Maîtrisez les aspects juridiques de la création d'entreprise, de la rédaction des statuts à la gestion quotidienne.
                    </p>

                    <!-- Détails de la formation -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-clock" style="color: var(--primary-blue);"></i>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">8h de formation</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-play-circle" style="color: var(--primary-blue);"></i>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">24 leçons</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-certificate" style="color: var(--primary-blue);"></i>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">Certification</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-infinity" style="color: var(--primary-blue);"></i>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">Accès à vie</span>
                        </div>
                    </div>

                    <!-- Niveau et évaluation -->
                    <div style="display: flex; justify-content: between; align-items: center; margin-bottom: 1.5rem;">
                        <div>
                            <span style="background: #e3f2fd; color: var(--primary-blue); padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">Débutant</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <div style="color: #FFD700;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">(4.5/5)</span>
                        </div>
                    </div>

                    <!-- Prix et CTA -->
                    <div style="display: flex; justify-content: between; align-items: center;">
                        <div>
   <span style="font-size: 1.8rem; font-weight: 700; color: var(--primary-blue);">45.000 FCFA</span>
    <span style="text-decoration: line-through; color: #6c757d; margin-left: 0.5rem;">65.000 FCFA</span>
                        </div>
                        <button class="buy-btn" style="
                            background: var(--primary-blue);
                            color: white;
                            border: none;
                            padding: 0.75rem 1.5rem;
                            border-radius: 10px;
                            font-weight: 600;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 5px 15px rgba(30, 90, 168, 0.3)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            <i class="fas fa-shopping-cart"></i> Acheter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Formation 2 - Droit Immobilier -->
            <div class="formation-card" data-category="immobilier" style="
                background: white;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                border: 1px solid #e9ecef;
            ">
                <!-- Image de la formation -->
                <div style="height: 200px; background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); position: relative; overflow: hidden;">
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
                        <i class="fas fa-home" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.9;"></i>
                        <h4 style="margin: 0; font-size: 1.2rem; font-weight: 600;">IMMOBILIER</h4>
                    </div>
                </div>

                <!-- Contenu de la formation -->
                <div style="padding: 2rem;">
                    <h3 style="color: #2e7d32; margin-bottom: 1rem; font-size: 1.4rem; font-weight: 700;">
                        Investissement Immobilier Légal
                    </h3>

                    <p style="color: var(--text-dark); margin-bottom: 1.5rem; line-height: 1.6;">
                        Apprenez les aspects juridiques de l'investissement immobilier, contrats, fiscalité et gestion locative.
                    </p>

                    <!-- Détails de la formation -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-clock" style="color: #2e7d32;"></i>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">6h de formation</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-play-circle" style="color: #2e7d32;"></i>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">18 leçons</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-certificate" style="color: #2e7d32;"></i>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">Certification</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-infinity" style="color: #2e7d32;"></i>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">Accès à vie</span>
                        </div>
                    </div>

                    <!-- Niveau et évaluation -->
                    <div style="display: flex; justify-content: between; align-items: center; margin-bottom: 1.5rem;">
                        <div>
                            <span style="background: #e8f5e8; color: #2e7d32; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">Intermédiaire</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <div style="color: #FFD700;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">(5.0/5)</span>
                        </div>
                    </div>

                    <!-- Prix et CTA -->
                    <div style="display: flex; justify-content: between; align-items: center;">
                        <div>
                            <span style="font-size: 1.8rem; font-weight: 700; color: #2e7d32;">55.000 FCFA</span>
                        </div>
                        <button class="buy-btn" style="
                            background: #2e7d32;
                            color: white;
                            border: none;
                            padding: 0.75rem 1.5rem;
                            border-radius: 10px;
                            font-weight: 600;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 5px 15px rgba(46, 125, 50, 0.3)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            <i class="fas fa-shopping-cart"></i> Acheter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Formation 3 - Droit du Numérique -->
            <div class="formation-card" data-category="numerique" style="
                background: white;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                border: 1px solid #e9ecef;
            ">
                <!-- Badge nouveau -->
                <div style="position: absolute; top: 1rem; right: 1rem; background: #667eea; color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600; z-index: 2;">
                    <i class="fas fa-star"></i> Nouveau
                </div>

                <!-- Image de la formation -->
                <div style="height: 200px; background: linear-gradient(135deg, #ff6b6b 0%, #ff8e8e 100%); position: relative; overflow: hidden;">
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
                        <i class="fas fa-laptop-code" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.9;"></i>
                        <h4 style="margin: 0; font-size: 1.2rem; font-weight: 600;">NUMÉRIQUE</h4>
                    </div>
                </div>

                <!-- Contenu de la formation -->
                <div style="padding: 2rem;">
                    <h3 style="color: #7b1fa2; margin-bottom: 1rem; font-size: 1.4rem; font-weight: 700;">
                        RGPD et Protection des Données
                    </h3>

                    <p style="color: var(--text-dark); margin-bottom: 1.5rem; line-height: 1.6;">
                        Maîtrisez le RGPD, protégez les données personnelles et assurez la conformité de votre entreprise.
                    </p>

                    <!-- Détails de la formation -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-clock" style="color: #7b1fa2;"></i>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">5h de formation</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-play-circle" style="color: #7b1fa2;"></i>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">15 leçons</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-certificate" style="color: #7b1fa2;"></i>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">Certification</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-infinity" style="color: #7b1fa2;"></i>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">Accès à vie</span>
                        </div>
                    </div>

                    <!-- Niveau et évaluation -->
                    <div style="display: flex; justify-content: between; align-items: center; margin-bottom: 1.5rem;">
                        <div>
                            <span style="background: #f3e5f5; color: #7b1fa2; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">Avancé</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <div style="color: #FFD700;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span style="font-size: 0.9rem; color: var(--text-dark);">(4.8/5)</span>
                        </div>
                    </div>

                    <!-- Prix et CTA -->
                    <div style="display: flex; justify-content: between; align-items: center;">
 <div>
    <span style="font-size: 1.8rem; font-weight: 700; color: #7b1fa2;">35.000 FCFA</span>
    <span style="text-decoration: line-through; color: #6c757d; margin-left: 0.5rem;">50.000 FCFA</span>
</div>
                        <button class="buy-btn" style="
                            background: #7b1fa2;
                            color: white;
                            border: none;
                            padding: 0.75rem 1.5rem;
                            border-radius: 10px;
                            font-weight: 600;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 5px 15px rgba(123, 31, 162, 0.3)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            <i class="fas fa-shopping-cart"></i> Acheter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section avantages -->
        <div class="advantages-section" style="
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            text-align: center;
        ">
            <h3 style="color: var(--primary-blue); margin-bottom: 2rem; font-size: 1.8rem;">Pourquoi choisir nos formations ?</h3>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                <div>
                    <div style="width: 60px; height: 60px; background: #e3f2fd; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.5rem; color: var(--primary-blue);">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4 style="color: var(--primary-blue); margin-bottom: 0.5rem;">Experts Juridiques</h4>
                    <p style="color: var(--text-dark); font-size: 0.9rem;">Formations créées par des avocats et juristes expérimentés</p>
                </div>

                <div>
                    <div style="width: 60px; height: 60px; background: #e8f5e8; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.5rem; color: #2e7d32;">
                        <i class="fas fa-play-circle"></i>
                    </div>
                    <h4 style="color: #2e7d32; margin-bottom: 0.5rem;">Vidéos HD</h4>
                    <p style="color: var(--text-dark); font-size: 0.9rem;">Contenu vidéo professionnel et supports téléchargeables</p>
                </div>

                <div>
                    <div style="width: 60px; height: 60px; background: #f3e5f5; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.5rem; color: #7b1fa2;">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4 style="color: #7b1fa2; margin-bottom: 0.5rem;">Support Dédié</h4>
                    <p style="color: var(--text-dark); font-size: 0.9rem;">Équipe de support pour répondre à vos questions</p>
                </div>

                <div>
                    <div style="width: 60px; height: 60px; background: #fff3cd; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.5rem; color: #856404;">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4 style="color: #856404; margin-bottom: 0.5rem;">Certification</h4>
                    <p style="color: var(--text-dark); font-size: 0.9rem;">Certificat de réussite reconnu</p>
                </div>
            </div>
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



    document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const formationCards = document.querySelectorAll('.formation-card');

    // Filtrage des formations
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            formationCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // Animation des cartes
    formationCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.boxShadow = '0 20px 50px rgba(0, 0, 0, 0.15)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 10px 40px rgba(0, 0, 0, 0.1)';
        });
    });

    // Gestion des paiements et du modal
    const buyBtns = document.querySelectorAll('.buy-btn');
    buyBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            const card = this.closest('.formation-card');
            const title = card.querySelector('h3').textContent;
            const price = card.querySelector('span:nth-child(1)').textContent;

            // Création du modal avec styles intégrés
            const modal = document.createElement('div');
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.8);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                padding: 20px;
            `;

            modal.innerHTML = `
                <div style="
                    background: white;
                    padding: 1rem;
                    border-radius: 10px;
                    width: 90%;
                    max-width: 550px;
                    max-height: 90vh;
                    overflow-y: auto;
                    position: relative;
                ">
                    <h3 style="margin-bottom: 1.5rem; color: var(--primary-blue); font-size: 1.5rem;">
                        Commander la formation "${title}"
                    </h3>

                    <p style="font-size: 1.2rem; color: var(--primary-blue); margin-bottom: 1.5rem;">
                        Prix: ${price}
                    </p>

                    <div style="margin-bottom: 2rem; padding: 1rem; background: #f8f9fa; border-radius: 8px;">
                        <p style="margin-bottom: 1rem; color: #666;">Pour accéder à cette formation:</p>
                        <ol style="padding-left: 1.2rem;">
                            <li style="margin-bottom: 0.5rem;">Effectuez le paiement via WAVE ou MOOV Money au:
                                <br><strong style="color: var(--primary-blue); font-size: 1.1rem;">+229 01 97 74 75 93</strong>
                            </li>
                            <li style="margin-bottom: 0.5rem;">Remplissez le formulaire ci-dessous</li>
                            <li>Joignez la capture d'écran de votre paiement</li>
                        </ol>
                    </div>

                    <form id="payment-form" style="display: flex; flex-direction: column; gap: 1rem;">
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <label style="font-weight: 600; color: #333;">Nom complet *</label>
                            <input type="text" required style="
                                width: 100%;
                                padding: 0.75rem;
                                border: 1px solid #ddd;
                                border-radius: 5px;
                                font-size: 1rem;
                            ">
                        </div>

                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <label style="font-weight: 600; color: #333;">Email *</label>
                            <input type="email" required style="
                                width: 100%;
                                padding: 0.75rem;
                                border: 1px solid #ddd;
                                border-radius: 5px;
                                font-size: 1rem;
                            ">
                        </div>

                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <label style="font-weight: 600; color: #333;">Téléphone *</label>
                            <input type="tel" required style="
                                width: 100%;
                                padding: 0.75rem;
                                border: 1px solid #ddd;
                                border-radius: 5px;
                                font-size: 1rem;
                            ">
                        </div>

                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <label style="font-weight: 600; color: #333;">Capture d'écran du paiement *</label>
                            <input type="file" required accept="image/*" style="
                                width: 100%;
                                padding: 0.5rem;
                                border: 1px solid #ddd;
                                border-radius: 5px;
                                font-size: 1rem;
                            ">
                        </div>

                        <div style="
                            display: flex;
                            gap: 1rem;
                            margin-top: 1rem;
                        ">
                            <button type="submit" style="
                                background: var(--primary-blue);
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 5px;
                                font-weight: 600;
                                cursor: pointer;
                                flex: 1;
                            ">Envoyer</button>

                            <button type="button" onclick="this.closest('div').parentElement.parentElement.parentElement.remove()" style="
                                background: #6c757d;
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 5px;
                                font-weight: 600;
                                cursor: pointer;
                            ">Annuler</button>
                        </div>
                    </form>
                </div>
            `;

            document.body.appendChild(modal);

            // Gestion de la soumission du formulaire
            modal.querySelector('#payment-form').addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Merci pour votre commande ! Une fois le paiement vérifié, vous recevrez les accès par email dans les plus brefs délais.');
                modal.remove();
            });
        });
    });
});


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

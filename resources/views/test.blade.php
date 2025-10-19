<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Axe Legal</title>
    <style>
        /* Styles de base */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        /* Header */
        header {
            background: #2c3e50;
            color: white;
            padding: 1rem;
        }

        /* Navigation */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
        }

        /* Menu mobile */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            padding: 10px;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #2c3e50;
            padding: 20px;
        }

        /* Contenu principal */
        main {
            padding: 20px;
        }

        /* Media queries */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .mobile-menu.active {
                display: block;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">Axe Legal</div>
            <div class="nav-links">
                <a href="#accueil">Accueil</a>
                <a href="#services">Services</a>
                <a href="#contact">Contact</a>
            </div>
            <button class="mobile-menu-btn" id="mobile-menu-btn">
                <span>Menu</span>
            </button>
        </nav>

        <div class="mobile-menu" id="mobile-menu">
            <a href="#accueil">Accueil</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
        </div>
    </header>

    <main>
        <h1>Bienvenue chez Axe Legal</h1>
        <p>Cabinet d'avocats d'affaires au Bénin.</p>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menu mobile
        const mobileMenuBtn = document.querySelector('#mobile-menu-btn');
        const mobileMenu = document.querySelector('#mobile-menu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('active');
            });

            // Fermer le menu si on clique sur un lien
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.remove('active');
                });
            });
        }
    });
    </script>
</body>
</html>

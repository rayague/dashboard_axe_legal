<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Non Trouvée | Axe Legal</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* Animation de fond */
        body::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: moveBackground 20s linear infinite;
            opacity: 0.3;
        }

        @keyframes moveBackground {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        .container {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 2rem;
            max-width: 800px;
            width: 100%;
        }

        .logo {
            margin-bottom: 2rem;
            animation: fadeInDown 0.8s ease-out;
        }

        .logo-text {
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .logo-subtitle {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.9);
            margin-top: 0.5rem;
            letter-spacing: 2px;
        }

        .error-code {
            font-size: 10rem;
            font-weight: 900;
            color: white;
            text-shadow: 4px 4px 8px rgba(0,0,0,0.3);
            line-height: 1;
            margin-bottom: 1rem;
            animation: bounce 2s infinite;
            background: linear-gradient(45deg, #ffffff, #e0e7ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        .error-icon {
            font-size: 6rem;
            color: white;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInDown 0.8s ease-out 0.2s both;
        }

        .error-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            animation: fadeInUp 0.8s ease-out 0.3s both;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .error-message {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.95);
            margin-bottom: 3rem;
            line-height: 1.8;
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }

        .buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 0.8s ease-out 0.5s both;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: white;
            color: #1e3a8a;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .btn-primary:hover {
            background: #f0f4ff;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        .btn-secondary {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 2px solid white;
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        }

        .features {
            margin-top: 3rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            animation: fadeInUp 0.8s ease-out 0.6s both;
        }

        .feature-card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 15px;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            background: rgba(255,255,255,0.25);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .feature-card i {
            font-size: 2.5rem;
            color: white;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            font-size: 1.1rem;
            color: white;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.9);
            line-height: 1.6;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .error-code {
                font-size: 6rem;
            }

            .error-title {
                font-size: 1.8rem;
            }

            .error-message {
                font-size: 1rem;
            }

            .logo-text {
                font-size: 2rem;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .features {
                grid-template-columns: 1fr;
            }
        }

        /* Decorative elements */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            animation: float 6s ease-in-out infinite;
        }

        .circle-1 {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .circle-2 {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .circle-3 {
            width: 80px;
            height: 80px;
            bottom: 15%;
            left: 15%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-30px) rotate(180deg);
            }
        }
    </style>
</head>
<body>
    <!-- Decorative circles -->
    <div class="circle circle-1"></div>
    <div class="circle circle-2"></div>
    <div class="circle circle-3"></div>

    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <div class="logo-text">
                <i class="fas fa-gavel"></i> AXE LEGAL
            </div>
            <div class="logo-subtitle">Cabinet d'Avocats & Conseil Juridique</div>
        </div>

        <!-- Error Icon -->
        <div class="error-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>

        <!-- Error Code -->
        <div class="error-code">404</div>

        <!-- Error Title -->
        <h1 class="error-title">Page Non Trouvée</h1>

        <!-- Error Message -->
        <p class="error-message">
            Oups ! Il semblerait que la page que vous recherchez n'existe pas ou a été déplacée.<br>
            Pas de panique, nous sommes là pour vous aider à retrouver votre chemin.
        </p>

        <!-- Buttons -->
        <div class="buttons">
            <a href="{{ url('/') }}" class="btn btn-primary">
                <i class="fas fa-home"></i>
                Retour à l'accueil
            </a>
            <a href="{{ route('administration') }}" class="btn btn-secondary">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
        </div>

        <!-- Features -->
        <div class="features">
            <div class="feature-card">
                <i class="fas fa-balance-scale"></i>
                <h3>Services Juridiques</h3>
                <p>Conseil juridique personnalisé pour tous vos besoins</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-robot"></i>
                <h3>Legal-Tech IA</h3>
                <p>Solutions innovantes d'intelligence artificielle juridique</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-users"></i>
                <h3>Équipe d'Experts</h3>
                <p>Avocats qualifiés à votre service</p>
            </div>
        </div>
    </div>
</body>
</html>

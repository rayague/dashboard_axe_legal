<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Connexion - Axe Legal Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', sans-serif;
                background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                position: relative;
            }

            /* Animated background elements */
            .bg-decoration {
                position: absolute;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 50%;
                animation: float 6s ease-in-out infinite;
            }

            .bg-decoration:nth-child(1) {
                width: 300px;
                height: 300px;
                top: -150px;
                left: -150px;
                animation-delay: 0s;
            }

            .bg-decoration:nth-child(2) {
                width: 200px;
                height: 200px;
                top: 20%;
                right: -100px;
                animation-delay: 2s;
            }

            .bg-decoration:nth-child(3) {
                width: 150px;
                height: 150px;
                bottom: -75px;
                left: 30%;
                animation-delay: 4s;
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(10deg); }
            }

            .container {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(20px);
                border-radius: 24px;
                padding: 2rem;
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
                text-align: center;
                max-width: 400px;
                width: 90%;
                position: relative;
                z-index: 10;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .logo-container {
                margin-bottom: 1.5rem;
            }

            .logo {
                width: 80px;
                height: 80px;
                background: linear-gradient(135deg, #1e3a8a, #3b82f6);
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1rem;
                position: relative;
                box-shadow: 0 10px 30px rgba(30, 58, 138, 0.3);
            }

            .logo::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 40px;
                height: 40px;
                background: white;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .logo::after {
                content: '⚖️';
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 24px;
                z-index: 1;
            }

            .company-name {
                font-size: 2.2rem;
                font-weight: 700;
                background: linear-gradient(135deg, #1e3a8a, #3b82f6);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin-bottom: 0.5rem;
                letter-spacing: -0.02em;
            }

            .tagline {
                color: #64748b;
                font-size: 1rem;
                margin-bottom: 1.5rem;
                font-weight: 500;
            }

            .login-form {
                text-align: left;
                margin-bottom: 1rem;
            }

            .form-group {
                margin-bottom: 1.2rem;
            }

            .form-label {
                display: block;
                font-weight: 600;
                color: #374151;
                margin-bottom: 0.5rem;
                font-size: 0.9rem;
            }

            .form-input {
                width: 100%;
                padding: 0.75rem 1rem;
                border: 2px solid #e5e7eb;
                border-radius: 12px;
                font-size: 0.95rem;
                background: rgba(255, 255, 255, 0.8);
                transition: all 0.3s ease;
                outline: none;
            }

            .form-input:focus {
                border-color: #3b82f6;
                background: white;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            }

            .form-input:invalid {
                border-color: #ef4444;
            }

            .error-message {
                color: #ef4444;
                font-size: 0.8rem;
                margin-top: 0.5rem;
                display: block;
            }

            .success-message {
                background: rgba(34, 197, 94, 0.1);
                color: #16a34a;
                padding: 0.75rem;
                border-radius: 8px;
                font-size: 0.9rem;
                margin-bottom: 1rem;
                border: 1px solid rgba(34, 197, 94, 0.2);
            }

            .remember-me {
                display: flex;
                align-items: center;
                margin-bottom: 1.5rem;
            }

            .remember-me input {
                margin-right: 0.5rem;
                width: 16px;
                height: 16px;
                accent-color: #3b82f6;
            }

            .remember-me label {
                font-size: 0.9rem;
                color: #64748b;
                cursor: pointer;
            }

            .login-btn {
                background: linear-gradient(135deg, #1e3a8a, #3b82f6);
                color: white;
                border: none;
                padding: 0.875rem 2rem;
                border-radius: 16px;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                width: 100%;
                box-shadow: 0 8px 25px rgba(30, 58, 138, 0.3);
                position: relative;
                overflow: hidden;
            }

            .login-btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                transition: left 0.5s;
            }

            .login-btn:hover::before {
                left: 100%;
            }

            .login-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 12px 35px rgba(30, 58, 138, 0.4);
            }

            .login-btn:active {
                transform: translateY(0);
            }

            .forgot-password {
                text-align: center;
                margin-top: 1rem;
            }

            .forgot-password a {
                color: #3b82f6;
                text-decoration: none;
                font-size: 0.9rem;
                font-weight: 500;
                transition: color 0.3s ease;
            }

            .forgot-password a:hover {
                color: #1e3a8a;
            }

            .footer {
                position: absolute;
                bottom: 2rem;
                left: 50%;
                transform: translateX(-50%);
                color: rgba(255, 255, 255, 0.8);
                font-size: 0.9rem;
                text-align: center;
                z-index: 10;
            }

            .developer-credit {
                margin-top: 0.5rem;
                font-size: 0.8rem;
                opacity: 0.7;
            }

            /* Responsive design */
            @media (max-width: 640px) {
                .container {
                    padding: 1.5rem;
                    margin: 1rem;
                }

                .company-name {
                    font-size: 1.8rem;
                }

                .tagline {
                    font-size: 0.9rem;
                    margin-bottom: 1rem;
                }

                .login-btn {
                    padding: 0.75rem 1.5rem;
                    font-size: 0.95rem;
                }
            }

            /* Loading animation for the logo */
            @keyframes pulse {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.05); }
            }

            .logo {
                animation: pulse 3s ease-in-out infinite;
            }
        </style>
    </head>
    <body>
        <!-- Animated background decorations -->
        <div class="bg-decoration"></div>
        <div class="bg-decoration"></div>
        <div class="bg-decoration"></div>

        <!-- Main container -->
        <div class="container">
            <div class="logo-container">
                <div class="logo"></div>
                <h1 class="company-name">Axe Legal</h1>
                <p class="tagline">Connectez-vous à votre espace</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Adresse email</label>
                    <input
                        id="email"
                        class="form-input"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="votre-email@exemple.com"
                    />
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input
                        id="password"
                        class="form-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Votre mot de passe"
                    />
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <!-- <div class="remember-me">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                    >
                    <label for="remember_me">Se souvenir de moi</label>
                </div> -->

                <!-- Submit Button -->
                <button type="submit" class="login-btn">
                    Se connecter
                </button>

                <!-- Forgot Password Link -->
                <!-- @if (Route::has('password.request'))
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">
                            Mot de passe oublié ?
                        </a>
                    </div>
                @endif -->
            </form>
        </div>

        <!-- Footer with developer credit -->
        <div class="footer">
            <div>© {{ date('Y') }} Axe Legal - Tous droits réservés</div>
            <div class="developer-credit">Réalisé par Ray Ague</div>
        </div>
    </body>
</html>

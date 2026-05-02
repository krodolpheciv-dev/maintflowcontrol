<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Connexion | {{ config('app.name', 'Able Pro') }}</title>
    
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Connexion à votre espace {{ config('app.name') }}" />
    <meta name="author" content="Phoenixcoded" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- [Favicon] -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />

    <!-- [Stylesheets] -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/inter/inter.css') }}" id="main-font-link" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />
    
    <!-- [Custom CSS for login] -->
    <style>
        .auth-main {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .auth-wrapper.v1 {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .auth-wrapper.v1 .auth-form {
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
        }
        
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            border: none;
            animation: fadeInUp 0.5s ease;
        }

        
.auth-main .auth-wrapper.v1 .auth-form {
  flex-direction: column;
  background: none !important;
} 
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .auth-form .card-body {
            padding: 2.5rem;
        }
        
        .form-control {
            height: 48px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.1);
        }
        
        .btn-primary {
            height: 48px;
            border-radius: 8px;
            font-weight: 600;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .btn-primary:active::after {
            width: 300px;
            height: 300px;
        }
        
        .alert-danger {
            border-radius: 8px;
            border-left: 4px solid #dc3545;
            background-color: #fff;
            color: #721c24;
            padding: 1rem;
            margin-bottom: 1.5rem;
            animation: slideIn 0.3s ease;
        }
        
        .alert-success {
            border-radius: 8px;
            border-left: 4px solid #28a745;
            background-color: #fff;
            color: #155724;
            padding: 1rem;
            margin-bottom: 1.5rem;
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .saprator {
            position: relative;
            text-align: center;
            margin: 1.5rem 0;
        }
        
        .saprator span {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .input-group-text {
            background: transparent;
            border-right: none;
            border-color: #e0e0e0;
        }
        
        .input-group .form-control {
            border-left: none;
            border-color: #e0e0e0;
        }
        
        .input-group:focus-within {
            border-radius: 8px;
        }
        
        .input-group:focus-within .input-group-text {
            border-color: #667eea;
        }
        
        .input-group:focus-within .form-control {
            border-color: #667eea;
        }
        
        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            color: #6c757d;
            transition: color 0.3s ease;
        }
        
        .password-toggle:hover {
            color: #667eea;
        }
        
        .form-check-input:checked {
            background-color: #667eea;
            border-color: #667eea;
        }
        
        .form-check-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.1);
        }
        
        .text-primary {
            color: #667eea !important;
        }
        
        .text-primary:hover {
            color: #764ba2 !important;
            text-decoration: none;
        }
        
        /* Responsive adjustments */
        @media (max-width: 576px) {
            .auth-form .card-body {
                padding: 1.5rem;
            }
            
            .saprator span {
                font-size: 24px;
            }
        }
    </style>
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" 
      data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
    
    <!-- [ Pre-loader ] -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <div class="auth-main">
        <div class="auth-wrapper v1">
            <div class="auth-form">
                <div class="card">
                    <div class="card-body">
                        
                        <!-- Logo -->
                        <div class="text-center mb-4">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/images/gestiot.svg') }}" alt="{{ config('app.name') }}" height="50" />
                            </a>
                        </div>

                        <!-- Titre -->
                        <div class="saprator my-3">
                            <label style="font-weight: 700; color: #4680ff;background: var(--bs-card-bg);z-index: 5;font-size: 1.1rem;
  padding: 8px 24px;">Bienvenue</label>
                        </div>
                        <p class="text-center text-muted mb-4">Connectez-vous pour accéder à votre espace</p>

                        <!-- Messages d'erreur -->
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="d-flex">
                                    <i class="ti ti-alert-circle me-2"></i>
                                    <div>
                                        @foreach($errors->all() as $error)
                                            <p class="mb-0">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="d-flex">
                                    <i class="ti ti-check-circle me-2"></i>
                                    <div>{{ session('status') }}</div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Formulaire de connexion -->
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-500">Adresse email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent border-end-0">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                    <input type="email" 
                                           class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           placeholder="exemple@email.com"
                                           required 
                                           autofocus
                                           autocomplete="email">
                                </div>
                                @error('email')
                                    <span class="text-danger small mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Mot de passe -->
                            <div class="mb-3">
                                <label for="password" class="form-label fw-500">Mot de passe</label>
                                <div class="position-relative">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-end-0">
                                            <i class="ti ti-lock"></i>
                                        </span>
                                        <input type="password" 
                                               class="form-control border-start-0 @error('password') is-invalid @enderror" 
                                               id="password" 
                                               name="password" 
                                               placeholder="••••••••"
                                               required 
                                               autocomplete="current-password">
                                    </div>
                                    <span class="password-toggle" onclick="togglePassword()">
                                        <i class="ti ti-eye" id="toggleIcon"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="text-danger small mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Sélection du projet (optionnel) -->
                            @if(isset($projects) && $projects->count() > 0)
                            <div class="mb-3">
                                <label for="project_id" class="form-label fw-500">Sélectionner le projet</label>
                                <select class="form-select @error('project_id') is-invalid @enderror" 
                                        id="project_id"  
                                        name="project_id">
                                    <option value="" disabled selected>Choisir un projet</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                            {{ $project->nom_projet }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                    <span class="text-danger small mt-1">{{ $message }}</span>
                                @enderror
                                <small class="text-muted" style="display:none;">Vous pourrez changer de projet plus tard</small>
                            </div>
                            @endif

                            <!-- Options -->
                            <div class="d-flex mt-3 justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           name="remember" 
                                           id="remember" 
                                           {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-muted" for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-primary fw-500">
                                        Mot de passe oublié?
                                    </a>
                                @endif
                            </div>

                            <!-- Bouton de connexion -->
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary" id="loginButton">
                                    <span class="spinner-border spinner-border-sm d-none" id="loginSpinner" role="status"></span>
                                    <span id="loginText">Se connecter</span>
                                </button>
                            </div>

                            <!-- Lien d'inscription (si activé) -->
                            @if (Route::has('register'))
                            <div class="text-center mt-4">
                                <span class="text-muted">Pas encore de compte?</span>
                                <a href="{{ route('register') }}" class="text-primary fw-500 ms-1">
                                    Créer un compte
                                </a>
                            </div>
                            @endif
                        </form>

                        <!-- Social Login (optionnel) -->
                        <div class="text-center mt-4 d-none">
                            <div class="saprator-text">
                                <span class="text-muted">ou connectez-vous avec</span>
                            </div>
                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <button type="button" class="btn btn-outline-secondary" onclick="socialLogin('google')">
                                    <img src="{{ asset('assets/images/authentication/google.svg') }}" alt="Google" height="20" />
                                </button>
                                <button type="button" class="btn btn-outline-secondary" onclick="socialLogin('facebook')">
                                    <img src="{{ asset('assets/images/authentication/facebook.svg') }}" alt="Facebook" height="20" />
                                </button>
                                <button type="button" class="btn btn-outline-secondary" onclick="socialLogin('twitter')">
                                    <img src="{{ asset('assets/images/authentication/twitter.svg') }}" alt="Twitter" height="20" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/i18next.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/i18nextHttpBackend.min.js') }}"></script>
    <script src="{{ asset('assets/js/icon/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/multi-lang.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('ti-eye');
                toggleIcon.classList.add('ti-eye-off');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('ti-eye-off');
                toggleIcon.classList.add('ti-eye');
            }
        }

        // Loading state on form submit
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const button = document.getElementById('loginButton');
            const spinner = document.getElementById('loginSpinner');
            const text = document.getElementById('loginText');
            
            button.disabled = true;
            spinner.classList.remove('d-none');
            text.textContent = 'Connexion en cours...';
        });

        // Social login placeholder
        function socialLogin(provider) {
            alert(`Connexion avec ${provider} sera bientôt disponible`);
        }

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Remove my-5 class from card on small screens
        if (window.innerWidth < 768) {
            document.querySelector('.card').classList.remove('my-5');
        }
    </script>
</body>
</html>
@extends('auth.layouts.auth')

@section('title', 'Connexion')
@section('logo-text', 'GestIOT')
@section('logo-subtitle', 'Plateforme de gestion de projets')

@section('content')
    <div class="auth-title">Connexion</div>
    <div class="auth-subtitle">Connectez-vous à votre espace de travail</div>

    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf

        <div class="form-group">
            <label for="email">Adresse email <span class="required">*</span></label>
            <div class="input-wrapper">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="admin@test.com" required autofocus>
            </div>
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Mot de passe <span class="required">*</span></label>
            <div class="input-wrapper">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password" name="password" placeholder="password" required>
                <button type="button" id="togglePassword" class="toggle-password-btn" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #a0b0c0; padding: 0; font-size: 16px; transition: color 0.2s;">
                    <i class="fas fa-eye" id="eyeIcon"></i>
                </button>
            </div>
            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="checkbox-row">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Se souvenir de moi</label>
        </div>

       
        <button type="submit" class="btn-primary" id="submitBtn">
            <span id="btnText">
                <i class="fas fa-sign-in-alt me-2"></i>&nbsp;&nbsp;Se connecter
            </span>
            <span id="btnSpinner" style="display: none;">
                <i class="fas fa-spinner fa-spin me-2"></i>&nbsp;&nbsp;Connexion...
            </span>
        </button>
    </form>

    <div class="auth-links">
        <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
        <span class="separator">·</span>
        <a href="{{ route('register') }}">Créer un compte</a>
    </div>

    @push('styles')
    <style>
    </style>
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion de l'affichage du mot de passe
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                if (type === 'text') {
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                    this.style.color = '#2b6cb0';
                } else {
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                    this.style.color = '#a0b0c0';
                }
            });

            // Désactivation automatique du mode texte après 30s
            let timeout;
            passwordInput.addEventListener('focus', function() {
                clearTimeout(timeout);
            });

            passwordInput.addEventListener('blur', function() {
                timeout = setTimeout(() => {
                    if (this.getAttribute('type') === 'text') {
                        this.setAttribute('type', 'password');
                        eyeIcon.classList.remove('fa-eye-slash');
                        eyeIcon.classList.add('fa-eye');
                        togglePassword.style.color = '#a0b0c0';
                    }
                }, 30000);
            });

            // Gestion du spinner dans le bouton
            const loginForm = document.getElementById('loginForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');

            loginForm.addEventListener('submit', function() {
                // Cacher le texte, afficher le spinner
                btnText.style.display = 'none';
                btnSpinner.style.display = 'inline';
                
                // Désactiver le bouton
                submitBtn.disabled = true;
            });

            // Si erreur de validation, on remet le bouton normal 
            @if($errors->any())
                btnText.style.display = 'inline';
                btnSpinner.style.display = 'none';
                submitBtn.disabled = false;
            @endif
        });
    </script>
    @endpush
@endsection
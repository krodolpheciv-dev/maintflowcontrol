@extends('auth.layouts.auth')

@section('title', 'Inscription')
@section('logo-text', 'GestIOT')
@section('logo-subtitle', 'Créez votre compte')
@section('card-class', 'wide')

@section('content')
    <div class="auth-title">Créer un compte</div>
    <div class="auth-subtitle">Renseignez vos informations pour vous inscrire</div>

    <form method="POST" action="{{ route('register') }}" id="registerForm">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <label for="nom">Nom <span class="required">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" placeholder="Votre nom" required autofocus>
                </div>
                @error('nom')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="prenom">Prénom <span class="required">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" placeholder="Votre prénom" required>
                </div>
                @error('prenom')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="email">Adresse email <span class="required">*</span></label>
            <div class="input-wrapper">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="exemple@domaine.com" required>
            </div>
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="contact">Contact <span class="required">*</span></label>
            <div class="input-wrapper">
                <i class="fas fa-phone input-icon"></i>
                <input type="text" id="contact" name="contact" value="{{ old('contact') }}" placeholder="+225 XX XX XX XX" required>
            </div>
            @error('contact')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="password">Mot de passe <span class="required">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" placeholder="Minimum 8 caractères" required>
                </div>
                @error('password')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer <span class="required">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-check-circle input-icon"></i>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmez" required>
                </div>
            </div>
        </div>

        <div class="checkbox-row">
            <input type="checkbox" id="conditions" name="conditions" required>
            <label for="conditions">
                J'accepte les <a href="#" style="color: #2b6cb0; text-decoration: none; font-weight: 500;">conditions d'utilisation</a>
            </label>
        </div>
        @error('conditions')
            <div class="field-error" style="margin-top: -10px; margin-bottom: 14px;">{{ $message }}</div>
        @enderror

        
        <button type="submit" class="btn-primary" id="submitBtn">
            <span id="btnText">
                <i class="fas fa-user-plus me-2"></i>&nbsp;&nbsp;Créer mon compte
            </span>
            <span id="btnSpinner" style="display: none;">
                <i class="fas fa-spinner fa-spin me-2"></i>&nbsp;&nbsp;Inscription en cours...
            </span>
        </button>
    </form>

    <div class="auth-links">
        Déjà un compte ? <a href="{{ route('login') }}">Se connecter</a>
    </div>

    @push('styles')
    <style>
    </style>
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const registerForm = document.getElementById('registerForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');

            
            registerForm.addEventListener('submit', function() {
                
                btnText.style.display = 'none';
                btnSpinner.style.display = 'inline';
                
                
                submitBtn.disabled = true;
            });

           
            @if($errors->any())
                btnText.style.display = 'inline';
                btnSpinner.style.display = 'none';
                submitBtn.disabled = false;
            @endif
        });
    </script>
    @endpush
@endsection
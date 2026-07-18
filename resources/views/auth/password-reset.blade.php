@extends('auth.layouts.auth')

@section('title', 'Nouveau mot de passe')
@section('logo-text', 'GestIOT')
@section('logo-subtitle', 'Créez un nouveau mot de passe')

@section('content')
    <div class="auth-title">Nouveau mot de passe</div>
    <div class="auth-subtitle">Créez un nouveau mot de passe sécurisé pour votre compte</div>

    <form method="POST" action="{{ route('password.update') }}" id="resetPasswordForm">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label for="email">Adresse email <span class="required">*</span></label>
            <div class="input-wrapper">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" value="{{ $email ?? old('email') }}" placeholder="exemple@domaine.com" required readonly>
            </div>
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Nouveau mot de passe <span class="required">*</span></label>
            <div class="input-wrapper">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password" name="password" placeholder="Minimum 8 caractères" required>
            </div>
            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmer le mot de passe <span class="required">*</span></label>
            <div class="input-wrapper">
                <i class="fas fa-check-circle input-icon"></i>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmez" required>
            </div>
        </div>

        
        <button type="submit" class="btn-primary" id="submitBtn">
            <span id="btnText">
                <i class="fas fa-save me-2"></i>&nbsp;&nbsp;Réinitialiser le mot de passe
            </span>
            <span id="btnSpinner" style="display: none;">
                <i class="fas fa-spinner fa-spin me-2"></i>&nbsp;&nbsp;Réinitialisation...
            </span>
        </button>
    </form>

    <div class="auth-links">
        <a href="{{ route('login') }}"><i class="fas fa-arrow-left me-1"></i>&nbsp;&nbsp;Retour à la connexion</a>
    </div>

    @push('styles')
    <style>
    </style>
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const resetPasswordForm = document.getElementById('resetPasswordForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');

           
            resetPasswordForm.addEventListener('submit', function() {
               
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
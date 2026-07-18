@extends('auth.layouts.auth')

@section('title', 'Mot de passe oublié')
@section('logo-text', 'GestIOT')
@section('logo-subtitle', 'Réinitialisation du mot de passe')

@section('content')
    <div class="auth-title">Mot de passe oublié</div>
    <div class="auth-subtitle">Entrez votre email pour recevoir un lien de réinitialisation</div>

    <form method="POST" action="{{ route('password.email') }}" id="resetForm">
        @csrf

        <div class="form-group">
            <label for="email">Adresse email <span class="required">*</span></label>
            <div class="input-wrapper">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="exemple@domaine.com" required autofocus>
            </div>
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

    
        <button type="submit" class="btn-primary" id="submitBtn">
            <span id="btnText">
                <i class="fas fa-paper-plane me-2"></i>&nbsp;&nbsp;Envoyer le lien
            </span>
            <span id="btnSpinner" style="display: none;">
                <i class="fas fa-spinner fa-spin me-2"></i>&nbsp;&nbsp;Envoi en cours...
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
            const resetForm = document.getElementById('resetForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');

            
            resetForm.addEventListener('submit', function() {
                
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
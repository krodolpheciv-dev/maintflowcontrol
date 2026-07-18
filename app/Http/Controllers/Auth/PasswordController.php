<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;

class PasswordController extends Controller
{
    // Affiche le formulaire de demande (Email)
    public function showLinkRequestForm()
    {
        return view('auth.password-request');
    }

    // Affiche le formulaire de nouveau mot de passe
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.password-reset')->with([
            'token' => $token, 
            'email' => $request->email
        ]);
    }

    // Envoie l'email via le Broker
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email'    => 'Veuillez entrer une adresse email valide.',
            'email.exists'   => 'Cette adresse email n\'est pas enregistrée.',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Le lien de réinitialisation a été envoyé à votre adresse email.')
            : back()->withErrors(['email' => 'Impossible d\'envoyer le lien de réinitialisation.']);
    }

    // Valide et change le mot de passe
    public function reset(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ], [
            'token.required'     => 'Le token de réinitialisation est invalide.',
            'email.required'     => 'L\'adresse email est obligatoire.',
            'email.email'        => 'Veuillez entrer une adresse email valide.',
            'email.exists'       => 'Cette adresse email n\'est pas enregistrée.',
            'password.required'  => 'Le mot de passe est obligatoire.',
            'password.min'       => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Votre mot de passe a été réinitialisé avec succès.')
            : back()->withErrors(['email' => 'Le lien de réinitialisation est invalide ou a expiré.']);
    }
}
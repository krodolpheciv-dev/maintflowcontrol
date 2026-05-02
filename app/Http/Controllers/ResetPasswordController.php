<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetPasswordController extends Controller
{
    //

     // Affiche le formulaire de réinitialisation
    public function showResetForm($token, Request $request)
    {
        $email = $request->query('email'); // récupère ?email=xxx
        return view('auth.resetmotdepasse', compact('token', 'email'));
    }

    // Traitement du formulaire
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8', // confirmation doit être password_confirmation
            'token' => 'required'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('dashboard')->with('success', 'Mot de passe réinitialisé avec succès.');
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }
}

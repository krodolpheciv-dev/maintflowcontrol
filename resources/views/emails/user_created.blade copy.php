<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="background:#f4f6f9; font-family:Arial; padding:30px;">

<div style="max-width:600px; margin:auto; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.05);">

    <div style="background:#0d6efd; padding:20px; text-align:center; color:white;">
        <h2>Bienvenue {{ $user->prenom }}</h2>
    </div>

    <div style="padding:30px;">

        <p>Votre compte a été créé avec succès.</p>

        <p>
            Cliquez sur le bouton ci-dessous pour définir votre mot de passe :
        </p>

        <div style="text-align:center; margin:30px 0;">
            <a href="{{ url('reset-password/'.$token.'?email='.$user->email) }}"
               style="background:#0d6efd; color:white; padding:12px 25px; text-decoration:none; border-radius:5px;">
                Définir mon mot de passe
            </a>
        </div>

        <p style="font-size:12px; color:#666;">
            Ce lien expirera automatiquement pour des raisons de sécurité.
        </p>

    </div>

    <div style="background:#f1f1f1; padding:15px; text-align:center; font-size:12px;">
        © {{ date('Y') }} {{ config('app.name') }}
    </div>

</div>

</body>
</html>

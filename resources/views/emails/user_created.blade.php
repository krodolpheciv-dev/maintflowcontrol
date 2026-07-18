<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activation de votre compte</title>
    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, Helvetica, sans-serif;
            padding: 30px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .header {
            background: #2b6cb0;
            padding: 30px 20px;
            text-align: center;
            color: white;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
        }
        .content p {
            color: #333;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background: #2b6cb0;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn:hover {
            background: #1a4f8b;
        }
        .footer {
            background: #f1f1f1;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .text-center {
            text-align: center;
        }
        .mt-3 {
            margin-top: 20px;
        }
        .mb-3 {
            margin-bottom: 20px;
        }
        .small {
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Bienvenue {{ $user->prenom }} {{ $user->nom }}</h2>
        </div>

        <div class="content">
            <p>Bonjour <strong>{{ $user->prenom }}</strong>,</p>
            
            <p>Votre compte a été créé avec succès sur la plateforme <strong>{{ config('app.name') }}</strong>.</p>

            <p>Pour activer votre compte et définir votre mot de passe, cliquez sur le bouton ci-dessous :</p>

            <div class="text-center mt-3 mb-3">
                <a href="{{ $url ?? url('reset-password/'.$token.'?email='.$user->email) }}" class="btn">
                    Définir mon mot de passe
                </a>
            </div>

            <p class="small">
                Ce lien est valable <strong>24 heures</strong>. Passé ce délai, vous devrez faire une nouvelle demande.
            </p>

            <p class="small">
                Si le bouton ne fonctionne pas, copiez ce lien dans votre navigateur :<br>
                <span style="word-break: break-all; color: #2b6cb0;">
                    {{ $url ?? url('reset-password/'.$token.'?email='.$user->email) }}
                </span>
            </p>

            <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">

            <p style="font-size: 13px; color: #888;">
                Si vous n'êtes pas à l'origine de cette demande, ignorez simplement cet email.
            </p>
        </div>

        <div class="footer">
            © {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.
        </div>
    </div>
</body>
</html>
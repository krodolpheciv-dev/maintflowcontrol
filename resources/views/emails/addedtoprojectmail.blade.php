<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="background:#f4f6f9; font-family:Arial; padding:30px;">

<div style="max-width:600px; margin:auto; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.05);">

    <!-- Header -->
    <div style="background:#0d6efd; padding:20px; text-align:center; color:white;">
        <h2>Bonjour {{ $user->prenom }}</h2>
    </div>

    <!-- Content -->
    <div style="padding:30px;">
        <p>Vous avez été ajouté aux projets suivants :</p>

        <ul>
            @foreach($projects as $project)
                <li>
                    <strong>{{ $project->nom }}</strong> - Rôle : 
                    @php
                        $roleName = \App\Models\Role::find($project->pivot->role_id)->name;
                    @endphp
                    {{ $roleName }}
                </li>
            @endforeach
        </ul>

        <p>
            Votre rôle global dans l’application est : <strong>{{ $globalRole }}</strong>
        </p>

        <p>
            Connectez-vous pour voir vos projets et commencer à travailler :
        </p>

        <div style="text-align:center; margin:30px 0;">
            <a href="{{ url('/login') }}"
               style="background:#0d6efd; color:white; padding:12px 25px; text-decoration:none; border-radius:5px;">
                Se connecter
            </a>
        </div>
    </div>

    <!-- Footer -->
    <div style="background:#f1f1f1; padding:15px; text-align:center; font-size:12px;">
        © {{ date('Y') }} {{ config('app.name') }}
    </div>

</div>
</body>
</html>

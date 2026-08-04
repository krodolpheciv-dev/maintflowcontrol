<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Validation de requête</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #f8f9fa; padding: 20px; text-align: center; border-radius: 8px; }
        .status { padding: 10px; border-radius: 4px; text-align: center; font-weight: bold; margin: 20px 0; }
        .status-validated { background: #d4edda; color: #155724; }
        .status-rejected { background: #f8d7da; color: #721c24; }
        .details { background: #f8f9fa; padding: 15px; border-radius: 4px; margin: 15px 0; }
        .footer { text-align: center; font-size: 12px; color: #666; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Notification de validation</h2>
        </div>

        <div class="status {{ $decision === 'validee' ? 'status-validated' : 'status-rejected' }}">
            {{ $decision === 'validee' ? 'Requête validée' : 'Requête refusée' }}
        </div>

        <div class="details">
            <p><strong>N° Demande :</strong> {{ $validation->ticket }}</p>
            <p><strong>Site :</strong> {{ $validation->site_code }}</p>
            <p><strong>Incident :</strong> {{ $validation->incident_type_libelle }}</p>
            <p><strong>Description :</strong> {{ $validation->description }}</p>
            @if($validation->comment)
                <p><strong>Commentaire :</strong> {{ $validation->comment }}</p>
            @endif
            <p><strong>Validé par :</strong> {{ $validation->validated_by_name }}</p>
            <p><strong>Date :</strong> {{ $validation->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <div class="footer">
            <p>Ce message est un envoi automatique, merci de ne pas y répondre.</p>
        </div>
    </div>
</body>
</html>
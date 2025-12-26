<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Certificat d'Enregistrement BRNY</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            color: #333;
            padding: 20px;
        }
        .container {
            border: 10px solid #ddd;
            padding: 40px;
            position: relative;
            height: 90%;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .logo {
            font-size: 30px;
            font-weight: bold;
            color: #d32f2f;
            margin-bottom: 10px;
        }
        .title {
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 5px;
        }
        .subtitle {
            font-size: 14px;
            color: #666;
        }
        .content {
            margin-top: 30px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            border-bottom: 2px solid #d32f2f;
            padding-bottom: 5px;
            margin-bottom: 15px;
            margin-top: 20px;
            width: 100%;
        }
        .row {
            width: 100%;
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
            color: #555;
        }
        .value {
            display: inline-block;
        }
        .qr-code {
            position: absolute;
            top: 40px;
            right: 40px;
            text-align: center;
        }
        .qr-img {
            width: 120px;
            height: 120px;
            border: 1px solid #ccc;
            padding: 5px;
        }
        .footer {
            position: absolute;
            bottom: 40px;
            left: 40px;
            right: 40px;
            text-align: center;
            font-size: 12px;
            color: #888;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        .signature {
            margin-top: 40px;
            text-align: right;
            padding-right: 50px;
        }
        .stamp {
            border: 3px solid #d32f2f;
            color: #d32f2f;
            font-weight: bold;
            padding: 10px 20px;
            display: inline-block;
            transform: rotate(-10deg);
            opacity: 0.8;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="qr-code">
            @if($vehicle->marking && $vehicle->marking->qr_path)
                <img src="{{ public_path('storage/' . $vehicle->marking->qr_path) }}" class="qr-img">
                <div style="font-size: 10px; margin-top: 5px;">{{ $vehicle->marking->code }}</div>
            @endif
        </div>

        <div class="header">
            <div class="logo">BRNY ANTIVOL</div>
            <div class="title">Certificat d'Enregistrement</div>
            <div class="subtitle">Système de Sécurisation et d'Identification de Véhicules</div>
        </div>

        <div class="content">
            <div class="section-title">INFORMATIONS DU VÉHICULE</div>
            <div class="row">
                <span class="label">Immatriculation:</span>
                <span class="value" style="font-size: 18px; font-weight: bold;">{{ $vehicle->plate_number }}</span>
            </div>
            <div class="row">
                <span class="label">Marque / Modèle:</span>
                <span class="value">{{ $vehicle->brand->name }} {{ $vehicle->model->name }}</span>
            </div>
            <div class="row">
                <span class="label">Numéro VIN:</span>
                <span class="value">{{ $vehicle->vin }}</span>
            </div>
            <div class="row">
                <span class="label">Année / Couleur:</span>
                <span class="value">{{ $vehicle->manufacture_year }} / {{ $vehicle->color }}</span>
            </div>

            <div class="section-title">PROPRIÉTAIRE ENREGISTRÉ</div>
            <div class="row">
                <span class="label">Nom Complet:</span>
                <span class="value">{{ $vehicle->owner->first_name }} {{ $vehicle->owner->last_name }}</span>
            </div>
            <div class="row">
                <span class="label">Téléphone:</span>
                <span class="value">{{ $vehicle->owner->phone }}</span>
            </div>
            <div class="row">
                <span class="label">Adresse:</span>
                <span class="value">{{ $vehicle->owner->commune }}, {{ $vehicle->owner->city->name ?? '' }}</span>
            </div>

            <div class="section-title">DÉTAILS DU MARQUAGE</div>
            <div class="row">
                <span class="label">Code Unique:</span>
                <span class="value" style="font-family: monospace; font-size: 16px;">{{ $vehicle->marking->code ?? 'N/A' }}</span>
            </div>
            <div class="row">
                <span class="label">Date de Marquage:</span>
                <span class="value">{{ $vehicle->marking->marked_at ? $vehicle->marking->marked_at->format('d/m/Y') : date('d/m/Y') }}</span>
            </div>
            <div class="row">
                <span class="label">Statut:</span>
                <span class="value" style="color: green; font-weight: bold;">PROTÉGÉ / ENREGISTRÉ</span>
            </div>
        </div>

        <div class="signature">
            <div class="stamp">CERTIFIÉ CONFORME</div>
            <p style="margin-top: 10px; font-size: 12px;">L'Agent Certificateur</p>
        </div>

        <div class="footer">
            <p>Ce document atteste que le véhicule décrit ci-dessus a été enregistré dans la base de données nationale BRNY.</p>
            <p>En cas de vol, signalez-le immédiatement sur notre plateforme ou contactez les autorités.</p>
            <p>Généré le {{ date('d/m/Y à H:i') }}</p>
        </div>
    </div>
</body>
</html>

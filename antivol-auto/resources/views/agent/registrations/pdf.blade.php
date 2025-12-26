<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reçu d'Enregistrement - {{ $registration->registration_number }}</title>
    <style>
        body {
            font-family: sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #3b82f6;
            padding-bottom: 20px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #3b82f6;
            margin-bottom: 5px;
        }
        .subtitle {
            font-size: 14px;
            color: #666;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            background-color: #f3f4f6;
            padding: 8px;
            margin-bottom: 10px;
            border-left: 4px solid #3b82f6;
        }
        .row {
            margin-bottom: 8px;
        }
        .label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
        }
        .value {
            display: inline-block;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #999;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">ANTIVOL AUTO</div>
        <div class="subtitle">Reçu Officiel d'Enregistrement</div>
        <div style="margin-top: 10px; font-size: 18px; font-weight: bold;">
            #{{ $registration->registration_number }}
        </div>
    </div>

    <div class="section">
        <div class="section-title">Informations Propriétaire</div>
        <div class="row">
            <span class="label">Nom Complet:</span>
            <span class="value">{{ $registration->owner->first_name }} {{ $registration->owner->last_name }}</span>
        </div>
        <div class="row">
            <span class="label">Téléphone:</span>
            <span class="value">{{ $registration->owner->phone }}</span>
        </div>
        <div class="row">
            <span class="label">Adresse:</span>
            <span class="value">
                {{ $registration->owner->city->name ?? "" }}, 
                {{ $registration->owner->communeRel->name ?? $registration->owner->commune ?? "" }}
            </span>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Informations Véhicule</div>
        <div class="row">
            <span class="label">Marque / Modèle:</span>
            <span class="value">
                {{ $registration->vehicle->brand->name ?? "N/A" }} 
                {{ $registration->vehicle->model->name ?? "" }}
            </span>
        </div>
        <div class="row">
            <span class="label">Année:</span>
            <span class="value">{{ $registration->vehicle->manufacture_year }}</span>
        </div>
        <div class="row">
            <span class="label">Couleur:</span>
            <span class="value">{{ $registration->vehicle->color }}</span>
        </div>
        <div class="row">
            <span class="label">Immatriculation:</span>
            <span class="value" style="font-weight: bold;">{{ $registration->vehicle->plate_number }}</span>
        </div>
        <div class="row">
            <span class="label">N° Châssis:</span>
            <span class="value">{{ $registration->vehicle->chassis_number }}</span>
        </div>
        <div class="row">
            <span class="label">Gravure Rétroviseur:</span>
            <span class="value">{{ $registration->vehicle->mirror_engraving_code ?? "Non renseigné" }}</span>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Statut & Validation</div>
        <div class="row">
            <span class="label">Date d'enregistrement:</span>
            <span class="value">{{ $registration->created_at->format("d/m/Y H:i") }}</span>
        </div>
        <div class="row">
            <span class="label">Statut Actuel:</span>
            <span class="value">{{ $registration->status }}</span>
        </div>
    </div>

    <div class="footer">
        <p>Ce document atteste de l'enregistrement du véhicule dans la base de données nationale Antivol Auto.</p>
        <p>Généré le {{ date("d/m/Y à H:i") }}</p>
    </div>
</body>
</html>


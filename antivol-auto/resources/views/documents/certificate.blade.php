<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Certificat de Marquage Antivol</title>
    <style>
        body {
            font-family: sans-serif;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            color: #1a56db;
        }
        .subtitle {
            font-size: 14px;
            color: #666;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            background-color: #f0f0f0;
            padding: 5px;
            margin-bottom: 10px;
        }
        .row {
            margin-bottom: 5px;
        }
        .label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #999;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
        .signature-box {
            margin-top: 40px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Certificat de Marquage Antivol</div>
        <div class="subtitle">Attestation officielle d'enregistrement</div>
    </div>

    <div class="section">
        <div class="section-title">Informations du Véhicule</div>
        <div class="row">
            <span class="label">Immatriculation:</span> {{ $vehicle->license_plate }}
        </div>
        <div class="row">
            <span class="label">Marque:</span> {{ $vehicle->brand->name }}
        </div>
        <div class="row">
            <span class="label">Modèle:</span> {{ $vehicle->model }}
        </div>
        <div class="row">
            <span class="label">Année:</span> {{ $vehicle->year }}
        </div>
        <div class="row">
            <span class="label">Couleur:</span> {{ $vehicle->color }}
        </div>
        <div class="row">
            <span class="label">Numéro de Série (VIN):</span> {{ $vehicle->vin }}
        </div>
    </div>

    <div class="section">
        <div class="section-title">Propriétaire</div>
        <div class="row">
            <span class="label">Nom:</span> {{ $owner->last_name }} {{ $owner->first_name }}
        </div>
        <div class="row">
            <span class="label">Email:</span> {{ $owner->email }}
        </div>
        <div class="row">
            <span class="label">Téléphone:</span> {{ $owner->phone }}
        </div>
    </div>

    <div class="section">
        <div class="section-title">Détails du Marquage</div>
        <div class="row">
            <span class="label">Code Unique:</span> {{ $marking->code }}
        </div>
        <div class="row">
            <span class="label">Date d'enregistrement:</span> {{ $vehicle->created_at->format("d/m/Y") }}
        </div>
        <div class="row">
            <span class="label">Agent:</span> {{ $agent->name }}
        </div>
    </div>

    <div class="qr-code">
        <p>Scannez pour vérifier le statut</p>
        <!-- Placeholder for QR Code if we were generating it dynamically in the PDF -->
        <!-- In a real scenario, we would embed the base64 image of the QR code here -->
        <div style="border: 1px solid #000; width: 100px; height: 100px; margin: 0 auto; display: flex; align-items: center; justify-content: center;">
            QR CODE
        </div>
        <p>{{ $marking->code }}</p>
    </div>

    <div class="signature-box">
        <p>Fait le {{ $date }}</p>
        <p>Signature de l'agent agréé</p>
        <br><br>
        <p>_________________________</p>
    </div>

    <div class="footer">
        Ce document atteste que le véhicule mentionné ci-dessus a été enregistré dans notre base de données nationale de marquage antivol.
        <br>
        BRNY Antivol Auto - www.brny-antivol.com
    </div>
</body>
</html>

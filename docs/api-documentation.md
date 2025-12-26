# Documentation API - BATELA RETROVISEUR NA YO

## URL de base

```
http://localhost/api/v1
```

En production, remplacer par l'URL de votre serveur.

## Authentification

L'API utilise Laravel Sanctum pour l'authentification. Les endpoints protégés nécessitent un token Bearer dans le header:

```
Authorization: Bearer {votre-token}
```

---

## Endpoints publics

### 1. Demander un code OTP (Clients)

**POST** `/otp/request`

Demande un code OTP pour l'authentification client par téléphone.

**Body:**
```json
{
  "phone": "+243981234567"
}
```

**Réponse (200 OK):**
```json
{
  "message": "OTP sent successfully",
  "expires_in": 300
}
```

---

### 2. Vérifier le code OTP

**POST** `/otp/verify`

Vérifie le code OTP et retourne un token d'authentification.

**Body:**
```json
{
  "phone": "+243981234567",
  "otp": "123456"
}
```

**Réponse (200 OK):**
```json
{
  "token": "1|abc123...",
  "user": {
    "id": 1,
    "phone": "+243981234567",
    "role": "client"
  }
}
```

---

### 3. Vérification publique (QR Code)

**GET** `/verify/{token}`

Vérifie un véhicule via le token QR code sans authentification.

**Paramètres URL:**
- `token` : Token unique du QR code

**Réponse (200 OK):**
```json
{
  "valid": true,
  "vehicle": {
    "plate": "CA-123-ABC",
    "brand": "Toyota",
    "model": "Corolla",
    "year": 2020,
    "status": "active"
  },
  "owner": {
    "name": "Jean Dupont",
    "phone": "+243981234567"
  }
}
```

---

## Authentification Agent/Admin

### 4. Connexion (Email/Password)

**POST** `/auth/login`

Authentification pour les agents et administrateurs.

**Body:**
```json
{
  "email": "agent@example.com",
  "password": "password123"
}
```

**Réponse (200 OK):**
```json
{
  "token": "2|xyz789...",
  "user": {
    "id": 2,
    "name": "Agent Smith",
    "email": "agent@example.com",
    "role": "agent"
  }
}
```

---

### 5. Déconnexion

**POST** `/auth/logout`

🔒 Nécessite authentification

Invalide le token actuel.

**Réponse (200 OK):**
```json
{
  "message": "Logged out successfully"
}
```

---

## Gestion des dossiers (Registrations)

### 6. Lister les dossiers

**GET** `/registrations`

🔒 Nécessite authentification

Liste tous les dossiers d'enregistrement.

**Paramètres de requête (optionnels):**
- `page` : Numéro de page (défaut: 1)
- `per_page` : Résultats par page (défaut: 15)
- `status` : Filtrer par statut (`pending`, `active`, `stolen`)

**Réponse (200 OK):**
```json
{
  "data": [
    {
      "id": 1,
      "plate": "CA-123-ABC",
      "status": "active",
      "owner": {
        "name": "Jean Dupont",
        "phone": "+243981234567"
      },
      "vehicle": {
        "brand": "Toyota",
        "model": "Corolla",
        "year": 2020
      },
      "created_at": "2025-12-20T10:30:00Z"
    }
  ],
  "meta": {
    "current_page": 1,
    "total": 42,
    "per_page": 15
  }
}
```

---

### 7. Créer un nouveau dossier

**POST** `/registrations`

🔒 Nécessite authentification (rôle: agent)

Crée un nouveau dossier d'enregistrement.

**Body:**
```json
{
  "owner": {
    "name": "Jean Dupont",
    "phone": "+243981234567",
    "city": "Kinshasa",
    "commune": "Gombe",
    "neighborhood": "Centre-ville"
  },
  "vehicle": {
    "plate": "CA-123-ABC",
    "brand": "Toyota",
    "model": "Corolla",
    "year": 2020,
    "color": "Noir",
    "chassis_number": "JT2BF18K8X0123456"
  }
}
```

**Réponse (201 Created):**
```json
{
  "id": 1,
  "status": "pending",
  "qr_token": "abc123xyz789",
  "created_at": "2025-12-26T08:45:00Z"
}
```

---

### 8. Voir un dossier spécifique

**GET** `/registrations/{id}`

🔒 Nécessite authentification

Récupère les détails d'un dossier.

**Paramètres URL:**
- `id` : ID du dossier

**Réponse (200 OK):**
```json
{
  "id": 1,
  "plate": "CA-123-ABC",
  "status": "active",
  "qr_token": "abc123xyz789",
  "owner": {
    "name": "Jean Dupont",
    "phone": "+243981234567",
    "city": "Kinshasa",
    "commune": "Gombe",
    "neighborhood": "Centre-ville"
  },
  "vehicle": {
    "brand": "Toyota",
    "model": "Corolla",
    "year": 2020,
    "color": "Noir",
    "chassis_number": "JT2BF18K8X0123456"
  },
  "photos": [
    {
      "type": "plate",
      "url": "/storage/photos/plate_123.jpg"
    },
    {
      "type": "mirror",
      "url": "/storage/photos/mirror_123.jpg"
    }
  ],
  "created_at": "2025-12-20T10:30:00Z",
  "validated_at": "2025-12-21T14:20:00Z"
}
```

---

### 9. Mettre à jour un dossier

**PUT** `/registrations/{id}`

🔒 Nécessite authentification (rôle: agent)

Met à jour les informations d'un dossier.

**Body:** (champs modifiables uniquement)
```json
{
  "owner": {
    "phone": "+243987654321"
  },
  "vehicle": {
    "color": "Bleu"
  }
}
```

**Réponse (200 OK):**
```json
{
  "id": 1,
  "status": "active",
  "updated_at": "2025-12-26T09:00:00Z"
}
```

---

### 10. Valider un dossier

**POST** `/registrations/{id}/validate`

🔒 Nécessite authentification (rôle: admin)

Valide un dossier et change son statut à "active".

**Paramètres URL:**
- `id` : ID du dossier

**Réponse (200 OK):**
```json
{
  "id": 1,
  "status": "active",
  "validated_at": "2025-12-26T09:15:00Z"
}
```

---

## Gestion des photos

### 11. Télécharger des photos

**POST** `/registrations/{id}/photos`

🔒 Nécessite authentification (rôle: agent)

Télécharge des photos pour un dossier (plaque, rétroviseur gravé).

**Body (multipart/form-data):**
- `type` : Type de photo (`plate` ou `mirror`)
- `photo` : Fichier image (JPEG, PNG)

**Exemple avec curl:**
```bash
curl -X POST \
  -H "Authorization: Bearer {token}" \
  -F "type=plate" \
  -F "photo=@/path/to/plate.jpg" \
  http://localhost/api/v1/registrations/1/photos
```

**Réponse (201 Created):**
```json
{
  "id": 1,
  "type": "plate",
  "url": "/storage/photos/plate_123.jpg",
  "uploaded_at": "2025-12-26T09:30:00Z"
}
```

---

## Recherche

### 12. Rechercher un véhicule

**GET** `/search`

🔒 Nécessite authentification

Recherche un véhicule par plaque, gravure ou téléphone.

**Paramètres de requête:**
- `q` : Terme de recherche (plaque, gravure ou téléphone)

**Exemple:**
```
GET /search?q=CA-123-ABC
```

**Réponse (200 OK):**
```json
{
  "results": [
    {
      "id": 1,
      "plate": "CA-123-ABC",
      "status": "active",
      "owner": {
        "name": "Jean Dupont",
        "phone": "+243981234567"
      },
      "vehicle": {
        "brand": "Toyota",
        "model": "Corolla"
      }
    }
  ],
  "count": 1
}
```

---

## Codes de réponse

- `200 OK` : Requête réussie
- `201 Created` : Ressource créée avec succès
- `400 Bad Request` : Données invalides
- `401 Unauthorized` : Token manquant ou invalide
- `403 Forbidden` : Permissions insuffisantes
- `404 Not Found` : Ressource non trouvée
- `422 Unprocessable Entity` : Erreur de validation
- `500 Internal Server Error` : Erreur serveur

## Format des erreurs

```json
{
  "message": "Description de l'erreur",
  "errors": {
    "field_name": [
      "Message d'erreur spécifique"
    ]
  }
}
```

---

## Notes importantes

- Tous les endpoints retournent du JSON
- Les dates sont au format ISO 8601 (UTC)
- Les numéros de téléphone doivent être au format international (+243...)
- Taille maximale des photos: 5MB
- Formats acceptés pour les photos: JPEG, PNG
- Rate limiting: 60 requêtes par minute par utilisateur authentifié

---

## Exemples de code

### JavaScript (Fetch API)

```javascript
// Connexion
const login = async () => {
  const response = await fetch('http://localhost/api/v1/auth/login', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      email: 'agent@example.com',
      password: 'password123'
    })
  });
  const data = await response.json();
  return data.token;
};

// Créer un dossier
const createRegistration = async (token, data) => {
  const response = await fetch('http://localhost/api/v1/registrations', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${token}`
    },
    body: JSON.stringify(data)
  });
  return await response.json();
};
```

### PHP (Guzzle)

```php
use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'http://localhost/api/v1/']);

// Connexion
$response = $client->post('auth/login', [
    'json' => [
        'email' => 'agent@example.com',
        'password' => 'password123'
    ]
]);
$data = json_decode($response->getBody(), true);
$token = $data['token'];

// Lister les dossiers
$response = $client->get('registrations', [
    'headers' => [
        'Authorization' => 'Bearer ' . $token
    ]
]);
$registrations = json_decode($response->getBody(), true);
```

---

## Contact & Support

Pour toute question ou problème avec l'API, veuillez contacter l'équipe de développement ou ouvrir une issue sur le dépôt GitHub.

# 📄 Système de Demande de Documents - Documentation

## Date : 19 Octobre 2025

---

## 🎯 Vue d'ensemble

Le système permet aux utilisateurs de demander des documents juridiques depuis la page `/legal-tech` et permet aux administrateurs de gérer ces demandes depuis le dashboard.

---

## 🗂️ Structure de la Base de Données

### Table `document_requests`

| Colonne | Type | Description |
|---------|------|-------------|
| `id` | BIGINT | Identifiant unique |
| `document_type` | VARCHAR(255) | Type : immobilier, travail, entreprise |
| `document_title` | VARCHAR(255) | Titre du document demandé |
| `nom` | VARCHAR(255) | Nom du client |
| `prenom` | VARCHAR(255) | Prénom du client |
| `email` | VARCHAR(255) | Email de contact |
| `telephone` | VARCHAR(20) | Numéro de téléphone |
| `entreprise` | VARCHAR(255) NULL | Nom de l'entreprise (optionnel) |
| `description` | TEXT | Détails de la demande (min 20 caractères) |
| `statut` | ENUM | Statut : en_attente, en_cours, traite, rejete |
| `note_admin` | TEXT NULL | Notes internes (visibles admin uniquement) |
| `created_at` | TIMESTAMP | Date de création |
| `updated_at` | TIMESTAMP | Date de modification |

---

## 📂 Fichiers Créés

### **1. Migration**
```
database/migrations/2025_10_19_000302_create_document_requests_table.php
```

### **2. Modèle**
```
app/Models/DocumentRequest.php
```
**Méthodes helpers :**
- `getStatutBadgeAttribute()` - Badge HTML du statut
- `getDocumentTypeNameAttribute()` - Nom formaté du type de document

### **3. Contrôleur**
```
app/Http/Controllers/DocumentRequestController.php
```
**Méthodes :**
- `index()` - Liste toutes les demandes (dashboard)
- `show($documentRequest)` - Détails d'une demande
- `store(Request $request)` - Créer une demande (API JSON)
- `updateStatut(Request $request, $documentRequest)` - Modifier le statut
- `destroy($documentRequest)` - Supprimer une demande

### **4. Vues Dashboard**
```
resources/views/dashboard/document-requests/
├── index.blade.php  (Liste des demandes)
└── show.blade.php   (Détails d'une demande)
```

### **5. Modal Formulaire**
Intégré dans `resources/views/legalTech.blade.php`
- Modal responsive avec formulaire complet
- Validation en temps réel
- Messages d'erreur/succès
- Envoi AJAX

---

## 🔗 Routes

### **Routes Publiques**
```php
POST /document-request → store() (Soumettre demande)
```

### **Routes Dashboard (Auth)**
```php
GET    /dashboard/legal-tech/demandes → index() (Liste)
GET    /dashboard/legal-tech/demandes/{id} → show() (Détails)
PUT    /dashboard/legal-tech/demandes/{id}/statut → updateStatut() (Modifier statut)
DELETE /dashboard/legal-tech/demandes/{id} → destroy() (Supprimer)
```

---

## 🎨 Interface Utilisateur (Legal Tech Page)

### **Bouton "Demander ce document"**
- Situé sous l'affichage du PDF
- Ouvre un modal avec formulaire complet

### **Modal Formulaire**
**Champs :**
- ✅ Nom * (requis)
- ✅ Prénom * (requis)
- ✅ Email * (requis, format email)
- ✅ Téléphone * (requis)
- ⭕ Entreprise (optionnel)
- ✅ Description * (requis, min 20 caractères)
- 🔒 Document Type (caché, auto-rempli)
- 🔒 Document Title (caché, auto-rempli)

**Fonctionnalités :**
- Focus styling (border bleue)
- Validation frontend
- Envoi AJAX
- Loading state sur bouton
- Messages succès/erreur
- Auto-fermeture après 3s si succès

---

## 📊 Dashboard - Vue Index

### **Statistiques**
4 cartes affichant :
1. **En Attente** (warning) - Demandes non traitées
2. **En Cours** (info) - Demandes en traitement
3. **Traités** (success) - Demandes terminées
4. **Total** (primary) - Toutes les demandes

### **Table des Demandes**
Colonnes :
- ID
- Client (nom + prénom + entreprise)
- Type (badge avec icône)
- Document (titre tronqué)
- Contact (email + téléphone)
- Statut (badge coloré)
- Date (format dd/mm/yyyy)
- Actions (Voir / Supprimer)

**Features :**
- Pagination (20 par page)
- Hover effects
- Confirmation avant suppression
- Empty state si aucune demande

---

## 📋 Dashboard - Vue Détails

### **Section 1 : Informations Client**
- Nom complet
- Entreprise
- Email (cliquable mailto:)
- Téléphone (cliquable tel:)

### **Section 2 : Détails Demande**
- Type de document (badge)
- Titre du document
- Description complète
- Date de demande (+ relative time)

### **Section 3 : Notes Internes**
- Textarea pour notes admin
- Visible uniquement par les admins
- Bouton "Enregistrer les notes"

### **Sidebar 1 : Statut**
- Badge du statut actuel (grand)
- Select pour changer le statut
- 4 options : en_attente, en_cours, traite, rejete
- Bouton "Mettre à jour"

### **Sidebar 2 : Actions Rapides**
- 📧 Envoyer Email (mailto:)
- 📞 Appeler (tel:)
- 🖨️ Imprimer

### **Sidebar 3 : Infos Système**
- ID de la demande
- Date de création
- Date de modification

---

## 🔄 Workflow

### **1. Utilisateur visite /legal-tech**
```
1. Clique sur un bouton (Immobilier/Travail/Entreprise)
2. Le PDF s'affiche
3. Clique sur "Demander ce document"
4. Modal s'ouvre avec formulaire
5. Remplit le formulaire
6. Clique "Envoyer ma demande"
```

### **2. Envoi AJAX**
```javascript
fetch('/document-request', {
    method: 'POST',
    body: FormData
})
→ DocumentRequestController@store()
→ Validation
→ Création en base
→ Response JSON
```

### **3. Admin dans Dashboard**
```
1. Va sur /dashboard/legal-tech/demandes
2. Voit la liste des demandes
3. Clique sur "Voir détails"
4. Change le statut (en_attente → en_cours → traite)
5. Ajoute des notes internes
6. Peut contacter le client (email/téléphone)
```

---

## ✅ Validation

### **Règles de Validation (Backend)**
```php
'document_type' => 'required|in:immobilier,travail,entreprise',
'document_title' => 'required|string|max:255',
'nom' => 'required|string|max:255',
'prenom' => 'required|string|max:255',
'email' => 'required|email|max:255',
'telephone' => 'required|string|max:20',
'entreprise' => 'nullable|string|max:255',
'description' => 'required|string|min:20',
```

### **Messages d'Erreur Personnalisés**
- "Le nom est obligatoire."
- "L'email doit être valide."
- "La description doit contenir au moins 20 caractères."

---

## 🎨 Styles et UX

### **Modal**
- Background : rgba(0,0,0,0.7)
- Width : 600px max
- Border-radius : 15px
- Header gradient bleu
- Bouton fermeture (×) en haut à droite
- Fermeture en cliquant en dehors

### **Formulaire**
- Grid 2 colonnes pour nom/prénom et email/téléphone
- Border bleu au focus
- Placeholders explicites
- Min 20 caractères pour description
- Boutons stylisés avec hover effects

### **Dashboard**
- Design cohérent avec SB Admin 2
- Cards avec border-left coloré
- Badges pour statuts
- Icons Font Awesome
- Tables responsive

---

## 📞 API Response

### **Succès**
```json
{
    "success": true,
    "message": "✅ Votre demande a été envoyée avec succès ! Nous vous contacterons dans les plus brefs délais."
}
```

### **Erreur (Validation)**
```json
{
    "success": false,
    "message": "Erreur de validation",
    "errors": {
        "email": ["L'email doit être valide."],
        "description": ["La description doit contenir au moins 20 caractères."]
    }
}
```

---

## 🚀 Utilisation

### **Pour tester :**

1. **Page publique :**
   - http://127.0.0.1:8000/legal-tech
   - Cliquez sur Immobilier/Travail/Entreprise
   - Cliquez "Demander ce document"
   - Remplissez le formulaire
   - Soumettez

2. **Dashboard admin :**
   - http://127.0.0.1:8000/dashboard/legal-tech/demandes
   - Connectez-vous si nécessaire
   - Voir la liste des demandes
   - Cliquez sur l'œil pour voir les détails
   - Changez le statut
   - Ajoutez des notes

---

## 📝 Notes Importantes

1. **Sécurité :**
   - Routes dashboard protégées par middleware `auth`
   - CSRF token sur tous les formulaires
   - Validation stricte des données

2. **Performance :**
   - Pagination (20 items par page)
   - Index sur document_type et statut recommandé

3. **Notifications :**
   - TODO : Ajouter email de confirmation au client
   - TODO : Notifier admin par email à chaque nouvelle demande

4. **Améliorations futures :**
   - Système de notification en temps réel
   - Export CSV/PDF des demandes
   - Filtres avancés (par date, type, statut)
   - Historique des changements de statut

---

## 🎉 Résultat

**Le système est maintenant opérationnel ! 🚀**

✅ Migration créée et exécutée  
✅ Modèle avec helpers  
✅ Contrôleur avec toutes les méthodes  
✅ Routes configurées  
✅ Modal formulaire intégré  
✅ Vue dashboard index avec stats  
✅ Vue dashboard détails complète  
✅ Validation frontend + backend  
✅ Messages de succès/erreur  

**Les utilisateurs peuvent demander des documents et les admins peuvent gérer les demandes ! 📄✨**

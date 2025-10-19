# 🧪 Guide de Test - Système de Demande de Documents

## 📋 Prérequis

✅ Migration exécutée : `document_requests` table créée  
✅ Routes enregistrées : 5 routes (1 publique + 4 dashboard)  
✅ Contrôleur créé : `DocumentRequestController`  
✅ Modèle créé : `DocumentRequest`  
✅ Vues créées : `index.blade.php` + `show.blade.php`  
✅ Modal intégré : Dans `legalTech.blade.php`  
✅ Lien sidebar : Ajouté dans le dashboard  

---

## 🚀 Test 1 : Soumettre une Demande (Page Publique)

### Étapes :

1. **Accéder à la page Legal Tech**
   ```
   URL : http://127.0.0.1:8000/legal-tech
   ```

2. **Sélectionner un type de document**
   - Cliquez sur l'un des 3 boutons :
     * 🏠 **Immobilier**
     * 💼 **Droit du Travail**
     * 🏢 **Entreprise**
   - Le PDF correspondant s'affiche

3. **Ouvrir le formulaire de demande**
   - Cliquez sur le bouton **"Demander ce document"**
   - Le modal s'ouvre avec un formulaire

4. **Remplir le formulaire**
   ```
   Nom : Dupont
   Prénom : Jean
   Email : jean.dupont@email.com
   Téléphone : 0601020304
   Entreprise : Tech Solutions (optionnel)
   Description : Je souhaite obtenir ce document pour une transaction immobilière concernant un bien situé à Paris.
   ```
   > ⚠️ **Important** : La description doit faire au moins 20 caractères

5. **Soumettre**
   - Cliquez sur **"Envoyer ma demande"**
   - Le bouton affiche "Envoi en cours..." avec un spinner
   - Un message vert de succès apparaît :
     ```
     ✅ Votre demande a été envoyée avec succès ! 
     Nous vous contacterons dans les plus brefs délais.
     ```
   - Le modal se ferme automatiquement après 3 secondes

### ✅ Résultat Attendu :
- Formulaire validé
- Enregistrement dans la table `document_requests`
- Message de confirmation visible
- Modal fermé automatiquement

---

## 📊 Test 2 : Voir les Demandes dans le Dashboard

### Étapes :

1. **Se connecter au dashboard**
   ```
   URL : http://127.0.0.1:8000/administration
   Login : [votre email admin]
   Password : [votre mot de passe]
   ```

2. **Accéder aux demandes**
   - Dans le sidebar, cherchez la section **"GESTION"**
   - Cliquez sur **"Demandes de Documents"** (icône 📥 rose)
   - URL : `http://127.0.0.1:8000/dashboard/legal-tech/demandes`

3. **Vérifier la page index**
   - **Statistiques** : 4 cartes en haut affichant :
     * En Attente (jaune)
     * En Cours (bleu)
     * Traités (vert)
     * Total (bleu foncé)
   - **Table** : Liste de toutes les demandes avec :
     * ID
     * Client (nom + prénom + entreprise)
     * Type (badge Immobilier/Travail/Entreprise)
     * Document (titre)
     * Contact (email + téléphone)
     * Statut (badge)
     * Date
     * Actions (👁️ Voir / 🗑️ Supprimer)

### ✅ Résultat Attendu :
- La demande soumise apparaît dans la table
- Statut : "En Attente" (badge jaune)
- Compteur "En Attente" = 1
- Compteur "Total" = 1

---

## 📝 Test 3 : Voir les Détails d'une Demande

### Étapes :

1. **Dans la liste des demandes**
   - Cliquez sur l'icône 👁️ **"Voir"** d'une demande

2. **Page de détails affichée**
   - URL : `http://127.0.0.1:8000/dashboard/legal-tech/demandes/{id}`

3. **Vérifier les informations**

   **Section principale (gauche) :**
   - ✅ Informations Client
     * Nom complet
     * Entreprise
     * Email (cliquable)
     * Téléphone (cliquable)
   
   - ✅ Détails de la Demande
     * Type de document (badge coloré)
     * Titre du document
     * Description complète
     * Date de demande
   
   - ✅ Notes Internes
     * Textarea vide
     * Bouton "Enregistrer les notes"

   **Sidebar (droite) :**
   - ✅ Gestion du Statut
     * Badge actuel (grand)
     * Select avec 4 options
     * Bouton "Mettre à jour"
   
   - ✅ Actions Rapides
     * 📧 Envoyer Email (vert)
     * 📞 Appeler (bleu)
     * 🖨️ Imprimer (gris)
   
   - ✅ Informations Système
     * ID de la demande
     * Date de création
     * Date de modification

### ✅ Résultat Attendu :
- Toutes les infos de la demande affichées
- Statut actuel : "En Attente"
- Email cliquable ouvre le client mail
- Téléphone cliquable lance l'appel

---

## 🔄 Test 4 : Changer le Statut d'une Demande

### Étapes :

1. **Sur la page de détails**
   - Dans le sidebar "Gestion du Statut"
   - Ouvrir le select dropdown

2. **Changer le statut**
   ```
   En Attente → En Cours
   ```
   - Sélectionner **"En Cours"**
   - Cliquer sur **"Mettre à jour le statut"**

3. **Vérifier**
   - Message de succès en haut : ✅ "Statut mis à jour avec succès"
   - Badge change de couleur :
     * En Attente = Jaune
     * En Cours = Bleu
     * Traité = Vert
     * Rejeté = Rouge
   - Page rechargée avec nouveau statut

4. **Retourner à la liste**
   - Cliquer sur "Retour à la liste"
   - Vérifier que la demande a maintenant le badge "En Cours"
   - Compteur "En Cours" = 1
   - Compteur "En Attente" = 0

### ✅ Résultat Attendu :
- Statut mis à jour en base
- Badge coloré changé
- Compteurs actualisés
- Message de confirmation visible

---

## 📝 Test 5 : Ajouter des Notes Internes

### Étapes :

1. **Sur la page de détails**
   - Section "Notes Internes" (en bas à gauche)

2. **Ajouter une note**
   ```
   Client prioritaire - Transaction urgente
   Contact préférentiel : Email
   Envoyer le document au format PDF + Word
   ```
   - Taper la note dans le textarea
   - Cliquer sur **"Enregistrer les notes"**

3. **Vérifier**
   - Message de succès : ✅ "Notes enregistrées avec succès"
   - Notes visibles dans le textarea
   - Date de modification actualisée dans le sidebar

### ✅ Résultat Attendu :
- Notes enregistrées en base (champ `note_admin`)
- Visible uniquement aux admins
- Non visible aux clients

---

## 🗑️ Test 6 : Supprimer une Demande

### Étapes :

1. **Depuis la page de détails**
   - En haut à droite, bouton rouge **"Supprimer"**
   - Cliquer dessus

2. **Confirmation**
   - Popup JavaScript : "Êtes-vous sûr de vouloir supprimer cette demande ?"
   - Cliquer **OK**

3. **Vérifier**
   - Redirection vers la liste
   - Message de succès : ✅ "Demande supprimée avec succès"
   - Demande n'apparaît plus dans la table
   - Compteurs actualisés

### ✅ Résultat Attendu :
- Demande supprimée de la base
- Redirection vers la liste
- Message de confirmation
- Compteurs mis à jour

---

## ⚠️ Test 7 : Validation du Formulaire

### Test 7.1 - Champs Obligatoires

**Test :**
1. Ouvrir le modal
2. Laisser des champs vides
3. Tenter de soumettre

**Résultat attendu :**
- Navigateur bloque la soumission
- Message "Veuillez remplir ce champ" sur les champs requis

### Test 7.2 - Email Invalide

**Test :**
```
Email : jean.dupont@invalid
```

**Résultat attendu :**
- Message "Veuillez inclure un '@' dans l'adresse e-mail"

### Test 7.3 - Description Trop Courte

**Test :**
```
Description : Trop court
```

**Résultat attendu :**
- Message backend : "La description doit contenir au moins 20 caractères."
- Affiché dans le div `#formMessage` en rouge

### Test 7.4 - Type de Document Invalide

**Test via Postman/cURL :**
```bash
curl -X POST http://127.0.0.1:8000/document-request \
  -d "document_type=invalid&document_title=Test&nom=Test&prenom=Test&email=test@test.com&telephone=0601020304&description=Description de test minimum 20 caractères"
```

**Résultat attendu :**
```json
{
  "success": false,
  "message": "Le type de document sélectionné est invalide."
}
```

---

## 📞 Test 8 : Actions Rapides

### Test 8.1 - Envoyer Email

**Test :**
1. Page de détails
2. Cliquer sur **"📧 Envoyer Email"**

**Résultat attendu :**
- Ouvre le client mail (Outlook, Gmail, etc.)
- Email pré-rempli : `mailto:jean.dupont@email.com`

### Test 8.2 - Appeler

**Test :**
1. Page de détails
2. Cliquer sur **"📞 Appeler"**

**Résultat attendu :**
- Sur mobile : Ouvre l'application téléphone
- Sur PC : Propose d'ouvrir une app (Skype, Teams, etc.)
- Numéro pré-rempli : `tel:0601020304`

### Test 8.3 - Imprimer

**Test :**
1. Page de détails
2. Cliquer sur **"🖨️ Imprimer"**

**Résultat attendu :**
- Ouvre la fenêtre d'impression du navigateur
- Aperçu de la page de détails

---

## 🔍 Test 9 : Pagination

### Étapes :

1. **Créer plusieurs demandes**
   - Soumettre 25 demandes depuis le formulaire public
   - Ou via Tinker :
   ```php
   php artisan tinker
   for ($i = 1; $i <= 25; $i++) {
       \App\Models\DocumentRequest::create([
           'document_type' => 'immobilier',
           'document_title' => 'Document Test ' . $i,
           'nom' => 'Nom' . $i,
           'prenom' => 'Prenom' . $i,
           'email' => 'test' . $i . '@example.com',
           'telephone' => '0601020304',
           'description' => 'Description de test pour la demande numéro ' . $i,
           'statut' => 'en_attente'
       ]);
   }
   ```

2. **Vérifier la pagination**
   - Aller sur `/dashboard/legal-tech/demandes`
   - Page 1 : 20 demandes affichées
   - En bas : Liens de pagination (« Previous | 1 | 2 | Next »)
   - Cliquer sur "2" ou "Next"
   - Page 2 : 5 demandes restantes

### ✅ Résultat Attendu :
- 20 items par page
- Navigation entre pages fonctionnelle
- Compteur correct dans les stats

---

## 🎨 Test 10 : Responsive Design

### Test sur Mobile (ou DevTools)

1. **Ouvrir DevTools** (F12)
2. **Mode responsive** (Ctrl+Shift+M)
3. **iPhone 12 / 390x844**

**Vérifier :**
- ✅ Modal centré et responsive
- ✅ Formulaire lisible
- ✅ Table scrollable horizontalement
- ✅ Stats empilées verticalement
- ✅ Sidebar passe en dessous sur mobile
- ✅ Boutons pleine largeur

---

## 📊 Test 11 : Vérification Base de Données

### Via phpMyAdmin ou MySQL CLI

```sql
-- Voir toutes les demandes
SELECT * FROM document_requests;

-- Compter par statut
SELECT statut, COUNT(*) as total 
FROM document_requests 
GROUP BY statut;

-- Voir les demandes récentes
SELECT id, nom, prenom, document_type, statut, created_at 
FROM document_requests 
ORDER BY created_at DESC 
LIMIT 10;

-- Voir les demandes avec notes
SELECT id, nom, prenom, statut, note_admin 
FROM document_requests 
WHERE note_admin IS NOT NULL;
```

---

## 🐛 Tests d'Erreurs

### Test A - Route inexistante

**URL :**
```
http://127.0.0.1:8000/dashboard/legal-tech/demandes/99999
```

**Résultat attendu :**
- Page 404 Laravel
- Ou message "Demande non trouvée"

### Test B - Soumission sans CSRF

**Test via cURL sans token :**
```bash
curl -X POST http://127.0.0.1:8000/document-request
```

**Résultat attendu :**
- Erreur 419 : "Page Expired"
- Protection CSRF active

### Test C - Accès dashboard sans authentification

**URL :**
```
http://127.0.0.1:8000/dashboard/legal-tech/demandes
```
(En navigation privée ou déconnecté)

**Résultat attendu :**
- Redirection vers `/login`
- Middleware `auth` actif

---

## ✅ Checklist Complète

### Fonctionnalités
- [ ] Modal s'ouvre correctement
- [ ] Formulaire pré-remplit document_type et document_title
- [ ] Validation frontend fonctionne
- [ ] Envoi AJAX réussi
- [ ] Message de succès affiché
- [ ] Modal se ferme après 3s
- [ ] Demande enregistrée en base
- [ ] Lien sidebar visible et cliquable
- [ ] Page index affiche les stats
- [ ] Table affiche toutes les demandes
- [ ] Pagination fonctionne (20/page)
- [ ] Page détails affiche toutes les infos
- [ ] Changement de statut fonctionne
- [ ] Notes internes enregistrées
- [ ] Suppression fonctionne avec confirmation
- [ ] Actions rapides (email/tel/print) fonctionnent

### Sécurité
- [ ] Routes dashboard protégées par auth
- [ ] CSRF token sur tous les formulaires
- [ ] Validation backend stricte
- [ ] Notes admin non visibles aux clients
- [ ] Email/téléphone non exposés publiquement

### UX
- [ ] Design cohérent avec le dashboard
- [ ] Loading states visibles
- [ ] Messages de succès/erreur clairs
- [ ] Responsive mobile
- [ ] Hover effects sur boutons
- [ ] Badges colorés lisibles
- [ ] Icons cohérents (FontAwesome)

---

## 🎉 Si tous les tests passent...

**Le système est 100% opérationnel ! 🚀**

Vous avez maintenant :
✅ Un formulaire de demande public  
✅ Un système de gestion admin complet  
✅ Des statistiques en temps réel  
✅ Un workflow de suivi (en_attente → en_cours → traite)  
✅ Des notes internes pour communication d'équipe  
✅ Une interface responsive et professionnelle  

**Prochaines étapes suggérées :**
1. Ajouter notifications par email
2. Exporter les demandes en CSV/PDF
3. Ajouter filtres (par date, type, statut)
4. Créer dashboard de reporting
5. Intégrer système de ticket support

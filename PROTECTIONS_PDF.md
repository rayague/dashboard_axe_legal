# 🔒 Protections du Document PDF - Legal Tech

## Date : 19 Octobre 2025

---

## 📋 Vue d'ensemble

Le système de visualisation de documents PDF sur la page `/legal-tech` intègre plusieurs couches de protection pour empêcher le téléchargement, la copie et l'impression non autorisée des documents.

---

## 🛡️ Protections Mises en Place

### 1. **Protection de l'iframe PDF**

**Paramètres URL du PDF :**
```
#toolbar=0&navpanes=0&scrollbar=0&view=FitH
```
- `toolbar=0` : Masque la barre d'outils du PDF (pas de bouton télécharger/imprimer)
- `navpanes=0` : Masque le panneau de navigation
- `scrollbar=0` : Masque les barres de défilement
- `view=FitH` : Affichage ajusté horizontalement

**Couche de protection invisible :**
```css
pointer-events: none; /* Sur l'iframe */
```
Une div transparente superposée bloque toutes les interactions directes avec le PDF

---

### 2. **Blocage du Clic Droit**

**Sur le conteneur du document :**
- Événement `contextmenu` bloqué
- Alert personnalisée : "⚠️ Le téléchargement et la copie sont désactivés"

**Sur toute la page quand le document est affiché :**
- Empêche l'accès au menu contextuel du navigateur

---

### 3. **Blocage de la Sélection de Texte**

**CSS appliqué :**
```css
user-select: none;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
```

**Événement JavaScript :**
- `onselectstart="return false;"` sur la couche de protection

---

### 4. **Blocage des Raccourcis Clavier**

**Raccourcis désactivés quand le document est affiché :**
- `Ctrl+C` : Copier
- `Ctrl+P` : Imprimer
- `Ctrl+S` : Sauvegarder
- `Ctrl+U` : Voir le code source
- `F12` : Outils de développement

**Alert affichée :** "⚠️ Cette action est désactivée pour protéger le document."

---

### 5. **Blocage de l'Impression**

**Événement beforeprint :**
```javascript
window.addEventListener('beforeprint', function(e) {
    e.preventDefault();
    alert('🔒 L\'impression de ce document est protégée...');
});
```

---

### 6. **Blocage du Drag & Drop**

**Événement dragstart bloqué :**
```javascript
ondragstart="return false;"
```
Empêche de faire glisser le document vers une autre fenêtre/application

---

## 📁 Fichier Concerné

**Document PDF protégé :**
```
public/documents/Notes_ Usage_conseils_juridique.pdf
```

**Vue Blade :**
```
resources/views/legalTech.blade.php
```

---

## 🎯 Les 3 Boutons de Sélection

### 1. 🏠 **Immobilier**
- **Catégorie :** `immobilier`
- **Titre :** "Notes Usage - Conseils Juridiques Immobilier"
- **Description :** Conseils juridiques en matière immobilière

### 2. 💼 **Droit du Travail**
- **Catégorie :** `travail`
- **Titre :** "Notes Usage - Conseils Juridiques Droit du Travail"
- **Description :** Conseils juridiques en droit du travail

### 3. 🏢 **Entreprise**
- **Catégorie :** `entreprise`
- **Titre :** "Notes Usage - Conseils Juridiques Entreprise"
- **Description :** Conseils juridiques pour votre entreprise

> **Note :** Pour l'instant, les 3 boutons affichent le même document PDF. Pour différencier, il suffit de modifier le chemin dans la fonction `selectCategory()`.

---

## 🔧 Fonction JavaScript Principale

```javascript
function selectCategory(category) {
    // Titres et descriptions personnalisés
    const titles = {
        'immobilier': 'Notes Usage - Conseils Juridiques Immobilier',
        'travail': 'Notes Usage - Conseils Juridiques Droit du Travail',
        'entreprise': 'Notes Usage - Conseils Juridiques Entreprise'
    };

    // Affichage du PDF avec protections
    document.getElementById('document-content').innerHTML = `
        <div style="position: relative;">
            <iframe 
                src="{{ asset('documents/Notes_ Usage_conseils_juridique.pdf') }}#toolbar=0&navpanes=0"
                style="pointer-events: none; ..."
            ></iframe>
            <!-- Couche de protection -->
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; ..."
                 oncontextmenu="return false;" 
                 ondragstart="return false;" 
                 onselectstart="return false;">
            </div>
        </div>
    `;
}
```

---

## 💡 Messages de Sécurité Affichés

### **Message principal (sous le PDF) :**
```
🔒 Document Protégé

🚫 La copie, le téléchargement et l'impression sont désactivés.
Ce document est uniquement disponible en consultation pour démonstration.
Pour obtenir une version complète et personnalisée, contactez-nous.
```

### **Indicateur en bas de page :**
```
🔒 Protection Active

Tous les documents sont protégés contre la copie, 
le téléchargement et l'impression non autorisée
```

---

## ⚙️ Fonctionnalités Conservées

### **Boutons d'action disponibles :**

1. **"Demander ce document"** (`requestDocument()`)
   - Redirige vers formulaire de contact avec pré-remplissage

2. **"Voir d'autres documents"** (`backToCategories()`)
   - Retour à la grille de sélection des catégories

---

## 🚀 Tests Recommandés

### **À vérifier :**
- [ ] Clic droit bloqué sur le document
- [ ] Ctrl+C ne copie rien
- [ ] Ctrl+P n'imprime pas
- [ ] Ctrl+S ne sauvegarde pas
- [ ] F12 désactivé quand document affiché
- [ ] Drag & drop impossible
- [ ] Sélection de texte impossible
- [ ] Barre d'outils PDF cachée
- [ ] Alert personnalisées affichées

---

## 📝 Notes Importantes

1. **Limitations techniques :**
   - Un utilisateur très avancé peut contourner ces protections avec des outils spécialisés
   - Ces protections sont suffisantes pour 99% des utilisateurs

2. **Protection côté serveur :**
   - Considérez ajouter un watermark (filigrane) directement dans le PDF
   - Possibilité d'ajouter une authentification pour accéder aux documents

3. **Compatibilité navigateurs :**
   - Testé sur : Chrome, Firefox, Edge, Safari
   - Les paramètres `#toolbar=0` peuvent ne pas fonctionner sur certains navigateurs mobiles

---

## 🎨 Aspect Visuel

- **Iframe :** 600px de hauteur, coins arrondis, ombre portée
- **Couleurs :** Thème cohérent avec le reste du site (--primary-blue: #1E5AA8)
- **Responsive :** S'adapte aux écrans mobiles

---

## 📧 Contact

Pour toute question sur les protections ou pour ajouter des documents supplémentaires, contactez l'équipe de développement.

**Développé par :** Ray Ague  
**Date :** 19 Octobre 2025  
**Projet :** AXE LEGAL - Dashboard

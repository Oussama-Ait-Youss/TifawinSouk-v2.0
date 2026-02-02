#  TifawinSouk – Plateforme de Gestion du Commerce Local

##  Présentation du Projet

**TifawinSouk** est une application web développée avec **Laravel** visant à digitaliser les opérations d’une PME marocaine spécialisée dans le commerce local.  
La plateforme permet la gestion complète des produits, fournisseurs et commandes, tout en offrant une vitrine publique pour les clients.

Le projet est réalisé dans un cadre **pédagogique** avec pour objectif l’application des **bonnes pratiques Laravel**.

---

##  Objectifs du Projet

L’application couvre deux espaces principaux :

###  Back-Office (Admin)
- Gestion des catégories
- Gestion des produits
- Gestion des fournisseurs
- Suivi du stock
- Gestion des commandes
- Tableau de bord administratif

###  Front-Office (Client)
- Navigation du catalogue
- Recherche et filtrage des produits
- Gestion du panier
- Passage de commande
- Suivi des commandes

---

##  Fonctionnalités Principales

###  Authentification & Sécurité
- Inscription et connexion des utilisateurs
- Rôles : **Admin / Client**
- Accès restreint aux routes `/admin` via Middleware

---

###  Gestion du Catalogue (Admin)

- CRUD des **Catégories**
- CRUD des **Produits**
- CRUD des **Fournisseurs**
- Upload et modification des images produits
- Soft Delete des produits
- Gestion manuelle du stock
- Détection des produits à stock critique

---

###  Expérience Client

- Consultation des catégories
- Recherche de produits par nom
- Affichage détaillé d’un produit
- Panier dynamique (Session)
- Validation de commande sécurisée
- Historique et suivi des commandes

---

##  Gestion des Commandes

- Validation du panier avec transaction SQL
- Figer le prix au moment de la commande
- Décrémentation automatique du stock
- Statuts de commande :
  - En attente
  - Expédiée
  - Livrée
  - Annulée

---

##  Règles Métier & Validation

### Produits
- Prix ≥ 0
- Référence unique
- Catégorie et fournisseur obligatoires

### Images
- Formats autorisés : `jpg`, `jpeg`, `png`
- Taille maximale : **2 Mo**

### Utilisateurs & Fournisseurs
- Email unique
- Champs obligatoires validés

### Commandes
- Utilisation de `DB::transaction`
- Stock mis à jour uniquement si la commande réussit

---

##  Modélisation des Données

- Relations **1:N** :
  - Catégorie → Produits
  - Fournisseur → Produits
  - Utilisateur → Commandes

- Relations **N:N** :
  - Commandes ↔ Produits (via `order_items`)

---

##  Contraintes Techniques

| Élément | Choix |
|-------|------|
| Framework | Laravel (dernière version stable) |
| Authentification | Laravel Breeze |
| Base de données | SQLite / MySQL |
| ORM | Eloquent |
| Sécurité | Middleware |
| Soft Deletes | Oui |
| Cache | Requêtes fréquentes |
| Tests | Performance & validation |

---

##  Installation du Projet
```
git clone https://github.com/your-username/tifawin-souk.git
cd tifawin-souk
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

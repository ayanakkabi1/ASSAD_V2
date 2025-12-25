# 🦁 Zoo ASSAD – Projet PHP Orienté Objet

Projet académique réalisé dans le cadre de l’apprentissage de **PHP orienté objet (POO)** et **PDO**, consistant à développer un site web dynamique pour un zoo virtuel nommé **ASSAD**, à l’occasion de la CAN 2025 au Maroc.

Le projet permet de gérer :

* les utilisateurs (admin, guide, visiteur),
* les animaux et leurs habitats,
* les visites guidées et leurs étapes,
* les réservations,
* les statistiques administrateur.

---

## 🎯 Objectifs pédagogiques

* Comprendre la programmation orientée objet en PHP
* Utiliser PDO avec requêtes préparées
* Structurer un projet PHP proprement
* Gérer l’authentification et les rôles
* Manipuler une base de données MySQL
* Sécuriser les accès par session
* Mettre en place un CRUD complet

---

## 🧱 Technologies utilisées

* **PHP 8+**
* **MySQL**
* **PDO**
* **HTML / CSS (simple)**
* Serveur local : XAMPP / WAMP / Laragon

---

## 📁 Structure du projet

```
zoo_assad_poo/
│── index.php
│── inscription.php
│── connexion.php
│── dashboard_admin.php
│── dashboard_guide.php
│── dashboard_visiteur.php
│── animaux.php
│── visites.php
│
├── classes/
│   ├── Database.php
│   ├── Utilisateur.php
│   ├── Animal.php
│   ├── Habitat.php
│   ├── VisiteGuidee.php
│   ├── EtapeVisite.php
│   ├── Reservation.php
│   └── Statistiques.php
│
└── sql/
    └── assad.sql
```

---

## 🗄️ Base de données

Nom de la base :

```
assad
```

Tables principales :

* utilisateurs
* animaux
* habitats
* visitesguidees
* etapesvisite
* reservations

Un compte **admin** doit être inséré manuellement avec un mot de passe hashé.

Exemple :

```php
password_hash("admin123", PASSWORD_DEFAULT);
```

---

## 👤 Rôles utilisateurs

### Admin

* Gère les animaux
* Gère les habitats
* Consulte les statistiques
* Accède à toutes les pages sécurisées

### Guide

* Crée ses visites guidées
* Ajoute les étapes
* Consulte les réservations
* Peut être **non approuvé** par défaut

### Visiteur

* S’inscrit
* Consulte les animaux
* Réserve une visite
* Consulte son historique de réservations

---

## 🔐 Sécurité

✔ Sessions PHP
✔ Vérification du rôle
✔ Accès restreint par page
✔ Mots de passe hashés
✔ Requêtes préparées PDO
✔ Validation serveur des formulaires

---

## 🚀 Fonctionnalités par challenge

### ✅ Challenge 1 — Structure du projet

* Arborescence claire
* Fichiers PHP principaux
* Base de données créée

### ✅ Challenge 2 — Classe Database

* Connexion PDO centralisée
* Réutilisable dans toutes les classes

### ✅ Challenge 3 — Classe Utilisateur

* Encapsulation (attributs privés)
* Getters / setters
* Création utilisateur
* Recherche par email
* Vérification mot de passe

### ✅ Challenge 4 — Inscription

* Formulaire avec validation
* Choix du rôle
* Mot de passe hashé
* Guide non approuvé par défaut

### ✅ Challenge 5 — Connexion

* Authentification sécurisée
* Gestion des sessions
* Redirection selon le rôle
* Vérification guide approuvé

### ✅ Challenge 6 — Animaux & Habitats

* Classes Animal et Habitat
* Jointure SQL
* Filtrage
* Affichage propre

### ✅ Challenge 7 — CRUD Admin

* Ajouter / modifier / supprimer animaux
* Gestion habitats
* Accès réservé à l’admin

### ✅ Challenge 8 — Visites guidées

* Création de visites
* Association à un guide
* Gestion des étapes
* Annulation de visite

### ✅ Challenge 9 — Réservations

* Réservation par visiteur
* Capacité gérée
* Historique visiteur
* Liste des réservations côté guide

### ✅ Challenge 10 — Statistiques

* Nombre total de visiteurs
* Nombre d’animaux
* Visites les plus réservées
* Accès sécurisé admin

---

## ▶️ Installation

1. Cloner le projet :

```bash
git clone https://github.com/votre-compte/zoo_assad_poo.git
```

2. Copier dans :

```
htdocs/ (XAMPP)
```

3. Importer la base :

```
sql/assad.sql
```

4. Modifier la connexion si besoin :

```php
classes/Database.php
```

5. Lancer :

```
http://localhost/zoo_assad_poo
```

---

## 🧪 Compte de test

Admin :

```
Email : admin@zoo.com
Mot de passe : admin123
```

---

## 📌 Remarques

* Projet volontairement simple pour débutant
* Code clair et lisible
* Facilement améliorable (MVC, Bootstrap, JS, sécurité avancée)
* Conforme aux exigences pédagogiques

---

## 👨‍💻 Auteur

Projet réalisé par : **AYA NAKKABI**
Formation : Développement Web 
Année : 2025


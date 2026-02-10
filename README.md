#  VTC Réservation - Système de Gestion de Courses

Application web de réservation de courses VTC (Véhicule de Transport avec Chauffeur) développée avec une architecture MVC en PHP.

![PHP](https://img.shields.io/badge/PHP-7.4+-blue)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-orange)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4.x-purple)
![License](https://img.shields.io/badge/License-MIT-green)

##  Description

Plateforme complète de gestion de courses VTC permettant aux clients de réserver des trajets et aux chauffeurs de gérer leurs courses. Le système calcule automatiquement les tarifs en fonction de la distance et gère l'attribution des chauffeurs disponibles.

##  Fonctionnalités

### Gestion des Courses
- Réservation de courses avec sélection date/heure
- Calcul automatique du tarif (forfait + prix au km)
- Suivi des trajets (adresse départ/arrivée)
- Statuts : En attente, En cours, Terminée, Annulée

### Gestion des Chauffeurs
- CRUD complet (Create, Read, Update, Delete)
- Informations : nom, prénom, téléphone, véhicule, immatriculation
- Gestion de la disponibilité
- Historique des courses par chauffeur

### Gestion des Clients
- ✅ CRUD complet
- ✅ Profils clients avec coordonnées complètes
- ✅ Historique des réservations
- ✅ Suivi des courses actives

### Interface Utilisateur
- Design responsive Bootstrap 4
- Navigation intuitive
- Formulaires de réservation simplifiés
- Tableaux de bord avec statistiques

##  Stack Technique

**Backend**
- PHP 7.4+
- MySQL 5.7+ / MariaDB 10.4+
- PDO (PHP Data Objects)
- Architecture MVC

**Frontend**
- HTML5 / CSS3
- Bootstrap 4
- JavaScript (vanilla)

**Serveur**
- Apache 2.4
- XAMPP (développement local)

##  Structure du Projet
```
vtc-reservation/
├── controleur/              # Contrôleurs MVC
│   ├── chauffeur.php
│   ├── client.php
│   └── course.php
├── modele/                  # Modèles (logique métier)
│   └── modele.php           # Fonctions base de données
├── vue/                     # Vues (templates)
│   ├── chauffeur/
│   ├── client/
│   └── course/
├── sql/                     # Scripts SQL
│   └── vtc_reservation.sql
├── css/                     # Styles
├── images/                  # Images
└── index.php                # Point d'entrée
```

##  Installation

### Prérequis
- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- Apache avec mod_rewrite
- XAMPP recommandé pour environnement local

### Étapes d'installation

1. **Cloner le projet**
```bash
git clone https://github.com/ton-username/vtc-reservation.git
cd vtc-reservation
```

2. **Placer dans le répertoire web**
```bash
# Pour XAMPP
cp -r . C:/xampp/htdocs/vtc-reservation/
```

3. **Créer la base de données**
- Ouvrir phpMyAdmin : `http://localhost/phpmyadmin`
- Créer une nouvelle base : `vtc_reservation`
- Importer le fichier : `sql/vtc_reservation.sql`

4. **Configurer la connexion**
- Éditer `modele/modele.php`
- Vérifier les paramètres de connexion :
```php
$host = 'localhost';
$dbname = 'vtc_reservation';
$username = 'root';
$password = '';
```

5. **Accéder à l'application**
```
http://localhost/vtc-reservation/
```

##  Utilisation

### Réserver une course
1. Accéder à "Courses" → "Nouvelle réservation"
2. Sélectionner un client et un chauffeur disponible
3. Renseigner l'adresse de départ et d'arrivée
4. Choisir la date et l'heure
5. Le tarif est calculé automatiquement
6. Enregistrer la réservation

### Gérer les chauffeurs
1. Menu "Chauffeurs" → "Ajouter un chauffeur"
2. Remplir : nom, prénom, téléphone, véhicule, immatriculation
3. Modifier ou supprimer via les boutons d'action

### Gérer les clients
1. Menu "Clients" → "Ajouter un client"
2. Renseigner les informations complètes
3. Consulter l'historique des courses par client

##  Schéma de la Base de Données
```sql
-- Table CHAUFFEUR
- id_chauffeur (PK, AUTO_INCREMENT)
- nom, prenom, telephone
- voiture, immatriculation
- disponibilite (0/1)

-- Table CLIENT
- id_client (PK, AUTO_INCREMENT)
- nom, prenom, telephone
- adresse, code_postal, ville

-- Table COURSE
- id_course (PK, AUTO_INCREMENT)
- id_chauffeur (FK)
- id_client (FK)
- adresse_depart, adresse_arrivee
- date_course, heure_course
- prix, distance
- statut (en_attente, en_cours, terminee, annulee)
```

##  Sécurité

- Requêtes préparées PDO (protection injection SQL)
- À implémenter : Authentification utilisateur
- À implémenter : Validation côté serveur renforcée
- À implémenter : Protection CSRF

##  Roadmap / Améliorations Futures

- [ ] Système d'authentification (login/logout)
- [ ] Gestion des rôles (admin, chauffeur, client)
- [ ] Calcul de distance via API Google Maps
- [ ] Notifications par email/SMS
- [ ] Interface de suivi en temps réel
- [ ] Historique et statistiques avancées
- [ ] Export PDF des factures
- [ ] Application mobile (React Native)

##  Problèmes Connus

- Les calculs de tarifs sont basiques (forfait + distance simple)
- Pas de vérification de disponibilité horaire des chauffeurs
- Interface d'administration limitée

##  Contexte du Projet

Projet réalisé dans le cadre du **BTS SIO SLAM** (Services Informatiques aux Organisations - Solutions Logicielles et Applications Métiers) en alternance chez **Abby Ambers**.

**Objectifs pédagogiques :**
- Maîtriser l'architecture MVC
- Développer un CRUD complet
- Gérer une base de données relationnelle
- Créer une interface utilisateur responsive

##  Auteur

**Kerim** - Étudiant BTS SIO SLAM 2ème année    
📧 Contact : [kocakerimpro@gmail.com]

##  Remerciements

- Bootstrap pour le framework CSS
- La communauté PHP pour les ressources


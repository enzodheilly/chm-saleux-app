<p align="center">
  <img src="public/images/favicon/icon2.png" width="160" alt="Logo CHM Saleux" />
</p>

<h1 align="center">CHM Saleux — Plateforme du club</h1>

<p align="center">
  Site officiel et back-office de gestion du <strong>Centre d'Haltérophilie et Musculation de Saleux</strong>,
  club affilié à la Fédération Française d'Haltérophilie Musculation (FFHM).
  <br>
  <em>Vitrine publique, inscription des licences en ligne, espace adhérent et administration du club.</em>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Symfony-7.3-000000?style=for-the-badge&logo=symfony&logoColor=white"/>
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img src="https://img.shields.io/badge/MySQL-8.0-005C84?style=for-the-badge&logo=mysql&logoColor=white"/>
  <img src="https://img.shields.io/badge/API_Platform-4.x-1CADE4?style=for-the-badge"/>
  <img src="https://img.shields.io/badge/Licence-Propriétaire-lightgrey?style=for-the-badge"/>
</p>

---

## 📋 À propos

CHM Saleux est le site web officiel du club, développé sur mesure pour remplacer une gestion papier/tableur par une plateforme unique. Il sert à la fois de **vitrine publique** (présentation du club, actualités, compétitions, tarifs) et d'**outil de gestion interne** pour le bureau : suivi des adhérents, traitement des demandes de licence avec paiement en ligne, présences aux séances, et communication.

L'architecture suit le pattern MVC de Symfony : les pages du site public et l'espace adhérent sont rendues côté serveur avec Twig, tandis qu'une API REST (API Platform + JWT) expose les mêmes données pour une consommation externe (application mobile).

---

## 🛠️ Stack technique

| Domaine               | Technologies                                                          |
| :--------------------- | :--------------------------------------------------------------------- |
| **Backend**            | Symfony 7.3, PHP 8.2+, Doctrine ORM                                   |
| **Frontend web**       | Twig, CSS, JavaScript (vanilla ES6, sans framework front)             |
| **Base de données**    | MySQL 8.0                                                             |
| **API / Mobile**       | API Platform, authentification JWT (LexikJWTAuthenticationBundle)     |
| **Authentification**   | Formulaire classique + OAuth Google, 2FA (TOTP + codes de secours)    |
| **Paiement en ligne**  | API HelloAsso (Checkout Intents)                                      |
| **Anti-abus**          | Cloudflare Turnstile, rate limiting par action, géo-blocage           |
| **PDF / QR codes**     | Dompdf, Endroid QR Code                                               |
| **Outils**             | Composer, npm, Doctrine Migrations                                    |

---

## ⚙️ Fonctionnalités

### 🌐 Site public

- Page d'accueil, présentation du club, de l'équipe encadrante et des pratiques (haltérophilie, loisir & musculation).
- Actualités et résultats de compétitions.
- Grille tarifaire des licences et formules d'abonnement.
- FAQ, page de contact, boîte à idées, partenaires, page d'inscription à une séance d'essai.
- Inscription à la newsletter.
- Pages légales (mentions légales, CGU, confidentialité) éditables depuis l'administration.

### 📝 Demande de licence en ligne

- Formulaire multi-étapes (formule, pratiquant, tarif réduit, réduction familiale, mode de règlement).
- Calcul automatique et centralisé du tarif exact selon la formule, l'âge du pratiquant, la période d'inscription (grille dégressive) et les réductions applicables.
- Paiement en ligne sécurisé via **HelloAsso** (Checkout Intent), ou règlement au club.
- Détection des doublons de demande (même email, nom/prénom ou téléphone).
- Emails de confirmation et pages de suivi (paiement en attente, échec, confirmation).

### 👤 Espace adhérent

- Tableau de bord personnel : statut de licence, historique des séances.
- Suivi des présences (check-in) aux entraînements.
- Programmes et routines d'entraînement personnalisés, séances enregistrées (séries, répétitions, charges).
- Gestion du profil et des préférences de compte.

### 🔐 Authentification & sécurité

- Connexion classique (email + mot de passe) ou via **Google OAuth**, avec vérification d'email par code.
- **Double authentification (2FA)** par application TOTP, avec codes de secours, pour les comptes du bureau.
- Réinitialisation de mot de passe sécurisée (jeton à usage unique, expiration).
- Protection anti-bot (Cloudflare Turnstile), limitation de débit (rate limiting) sur les formulaires sensibles (connexion, inscription, mot de passe oublié...).
- Verrouillage temporaire de compte après plusieurs échecs de connexion, historique des mots de passe (anti-réutilisation).
- Géo-blocage configurable de l'accès au back-office.
- Journalisation des événements de sécurité (connexions, échecs, actions sensibles), avec pseudonymisation des emails dans les logs.

### 🛠️ Back-office administrateur

Interface de gestion réservée au bureau et aux encadrants (rôles hiérarchisés : membre du staff / super-administrateur) :

- Gestion des adhérents, des athlètes et des demandes de licence (validation, suivi FFHM).
- Suivi des présences et des séances d'essai.
- Gestion des compétitions et de leurs résultats.
- Bibliothèque d'exercices et de modèles de programmes d'entraînement.
- Gestion du matériel et des équipements du club.
- Espace documents (documents administratifs du club).
- Actualités, campagnes newsletter, retours/avis des adhérents.
- Boutique/merchandising, bannières d'information du site.
- Pages légales éditables, réglages généraux du site.
- Gestion des comptes staff et des permissions, avec journal de sécurité dédié.

### 📱 API & mobile

- API REST exposée via API Platform, authentification par JWT (avec refresh token).
- Endpoints dédiés : profil, licences, programmes, routines, séances, présences, QR code, articles.
- Pensée pour une consommation par une future application mobile, en parallèle du site web.

---

## 📂 Structure du projet

```
├── config/                # Configuration Symfony (sécurité, packages, routes)
├── migrations/             # Historique des migrations de base de données (Doctrine)
├── public/                 # Point d'entrée web, assets statiques
├── src/
│   ├── Controller/
│   │   ├── Front/          # Pages publiques et espace adhérent
│   │   ├── Admin/          # Back-office administrateur
│   │   ├── Api/             # Endpoints REST (API Platform)
│   │   └── Security/       # Connexion, inscription, mots de passe, OAuth
│   ├── Entity/              # Modèle de données (Doctrine)
│   ├── Repository/          # Requêtes personnalisées
│   ├── Security/            # Authenticators, contrôles d'accès custom
│   ├── Service/              # Logique métier (tarifs, paiement, logs, mails...)
│   ├── Form/                 # Formulaires Symfony
│   └── EventSubscriber/      # Abonnés aux événements du kernel
├── templates/                # Vues Twig (front, admin, emails)
└── translations/              # Traductions (messages système, sécurité)
```

---

## 🚀 Installation en local

### Prérequis

- PHP 8.2 ou supérieur, avec les extensions courantes (ctype, iconv, pdo_mysql...)
- Composer
- Node.js & npm
- Un serveur MySQL 8.0

### 1. Cloner le projet

```bash
git clone https://github.com/enzodheilly/chm-saleux-app.git
cd chm-saleux-app
```

### 2. Installer les dépendances

```bash
composer install
npm install
```

### 3. Configurer l'environnement

Copiez le fichier d'exemple et renseignez vos propres valeurs (base de données, mailer, OAuth Google, HelloAsso, Turnstile, JWT...) :

```bash
cp .env.example .env.local
```

Chaque variable est documentée directement dans `.env.example`.

### 4. Générer les clés JWT (API)

```bash
php bin/console lexik:jwt:generate-keypair
```

### 5. Créer la base de données

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### 6. Lancer le serveur

```bash
symfony server:start
# ou
php -S localhost:8000 -t public/
```

L'application est alors accessible sur `http://localhost:8000`.

---

## 🔧 Commandes utiles

```bash
# Lancer les tests de syntaxe des templates
php bin/console lint:twig templates/

# Vider le cache
php bin/console cache:clear

# Générer une nouvelle migration après modification d'une entité
php bin/console make:migration

# Lister les routes
php bin/console debug:router
```

---

## 📄 Licence

Projet propriétaire — tous droits réservés au CHM Saleux. Non destiné à la redistribution.

<p align="center">
Développé pour le CHM Saleux 🏋️
</p>

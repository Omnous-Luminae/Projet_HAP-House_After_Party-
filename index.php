<?php
require_once __DIR__ . '/Projet_HAP(House_After_Party)/config/db.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>House After Party</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <!-- Lightbox CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', Arial, sans-serif;
            background: #f7f7f9;
        }
        header {
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            height: 70px;
            box-shadow: 0 2px 8px rgba(80,0,80,0.04);
        }
        .logo {
            display: flex;
            align-items: center;
            font-weight: bold;
            font-size: 1.3em;
            color: #a100b8;
            text-decoration: none;
        }
        .logo-icon {
            background: #a100b8;
            color: #fff;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-size: 1.2em;
        }
        nav {
            display: flex;
            gap: 30px;
        }
        nav a {
            text-decoration: none;
            color: #3d0066;
            font-weight: 500;
            padding: 8px 18px;
            border-radius: 10px;
            transition: background 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        nav a.active, nav a:hover {
            background: #f3e6fa;
            color: #a100b8;
        }
        .btn-login {
            background: #fff;
            border: 1px solid #bbb;
            border-radius: 8px;
            padding: 8px 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-login:hover {
            background: #f3e6fa;
            color: #a100b8;
            border-color: #a100b8;
        }
        .hero {
            background: linear-gradient(90deg, #a100b8 0%, #4b006e 100%);
            color: #fff;
            text-align: center;
            padding: 100px 20px 80px 20px;
            position: relative;
            overflow: hidden;
        }
        .hero h1 {
            font-size: 3.5em;
            margin: 0 0 18px 0;
            font-weight: 700;
            letter-spacing: 2px;
        }
        .hero h2 {
            font-size: 1.7em;
            margin: 0 0 18px 0;
            font-weight: 400;
        }
        .hero p {
            font-size: 1.2em;
            margin-bottom: 32px;
        }
        .hero .hero-btns {
            display: flex;
            justify-content: center;
            gap: 24px;
            margin-top: 30px;
        }
        .hero .hero-btns a {
            background: #fff;
            color: #a100b8;
            border: none;
            border-radius: 8px;
            padding: 16px 38px;
            font-size: 1.15em;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(80,0,80,0.08);
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        }
        .hero .hero-btns a:hover {
            background: #f3e6fa;
            color: #4b006e;
            box-shadow: 0 4px 16px rgba(80,0,80,0.12);
        }
        .hero-bg {
            position: absolute;
            right: -120px;
            bottom: -80px;
            width: 500px;
            opacity: 0.13;
            z-index: 0;
        }
        .section {
            background: #fff;
            margin-top: -40px;
            border-radius: 32px 32px 0 0;
            padding: 60px 0 40px 0;
            box-shadow: 0 -2px 16px rgba(80,0,80,0.04);
        }
        .section h2 {
            text-align: center;
            font-size: 2.2em;
            margin-bottom: 12px;
        }
        .section p {
            text-align: center;
            color: #555;
            font-size: 1.1em;
            margin-bottom: 40px;
        }
        .cards {
            display: flex;
            justify-content: center;
            gap: 32px;
            flex-wrap: wrap;
            margin-top: 30px;
        }
        .card {
            background: #faf7fd;
            border-radius: 18px;
            box-shadow: 0 2px 8px rgba(80,0,80,0.06);
            padding: 32px 28px;
            width: 260px;
            min-height: 120px;
            text-align: center;
            font-size: 1.05em;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .card-icon {
            font-size: 2.2em;
            margin-bottom: 12px;
        }
        @media (max-width: 900px) {
            .cards { flex-direction: column; align-items: center; }
            .hero-bg { display: none; }
        }
        .gallery-section {
            background: #f7f7f9;
            padding: 50px 0 60px 0;
        }
        .gallery-section h2 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 24px;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 18px;
        }
        .gallery a img {
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(80,0,80,0.08);
            width: 180px;
            height: 120px;
            object-fit: cover;
            transition: transform 0.2s;
        }
        .gallery a img:hover {
            transform: scale(1.04);
        }
        footer {
            background: #fff;
            text-align: center;
            color: #888;
            padding: 24px 0 12px 0;
            font-size: 1em;
            margin-top: 60px;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    <header>
        <a href="#" class="logo">
            <span class="logo-icon">🎵</span> HAP
        </a>
        <nav>
            <a href="#" class="active">🏠 Accueil</a>
            <a href="#">📅 Annonces</a>
            <a href="#">🗺️ Carte</a>
            <a href="#">🎵 Boîtes de nuit</a>
            <a href="#">👤 Blog</a>
            <a href="Projet_HAP(House_After_Party)/forms/Saison.form.php">🗓️ Saisons</a>
        </nav>
        <button class="btn-login">Se connecter</button>
    </header>
    <section class="hero">
        <h1>House After Party</h1>
        <h2>Avec nous les soirées peuvent s'arroser</h2>
        <p>
            Découvrez des logements meublés exceptionnels à deux pas des meilleures boîtes de nuit.<br>
            Parfait pour vos befores et afters !
        </p>
        <div class="hero-btns">
            <a href="#">Voir les logements</a>
            <a href="Projet_HAP(House_After_Party)/forms/Saison.form.php">Gérer les saisons</a>
        </div>
        <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=800&q=80" alt="Soirée" class="hero-bg">
    </section>
    <section class="section">
        <h2>Pourquoi choisir HAP&nbsp;?</h2>
        <p>
            Nous sélectionnons les meilleurs logements pour que vos soirées soient inoubliables
        </p>
        <div class="cards">
            <div class="card">
                <span class="card-icon">🏙️</span>
                Logements proches des boîtes de nuit
            </div>
            <div class="card">
                <span class="card-icon">🎉</span>
                Ambiance garantie pour vos afters
            </div>
            <div class="card">
                <span class="card-icon">🛎️</span>
                Réservation simple et rapide
            </div>
            <div class="card">
                <span class="card-icon">💬</span>
                Service client réactif
            </div>
        </div>
    </section>
    <section class="gallery-section">
        <h2>Ambiance HAP en images</h2>
        <div class="gallery">
            <a href="Projet_HAP(House_After_Party)/images/image.png" data-lightbox="hap-gallery" data-title="Soirée 1">
                <img src="Projet_HAP(House_After_Party)/images/image.png" alt="Soirée 1">
            </a>
            <!-- Ajoute d'autres images ici si besoin -->
        </div>
    </section>
    <footer>
        &copy; <?= date('Y') ?> House After Party &mdash; Tous droits réservés.
    </footer>
    <!-- Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>
</html>

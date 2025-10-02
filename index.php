<?php
// filepath: c:\xampp\php\Projet_HAP\index.php

require_once __DIR__ . '/config/db.php';

// Autoload simple
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $paths = [
        __DIR__ . '/classes/' . $class . '.php',
        __DIR__ . '/classes/' . $class . '/' . $class . '.php', // Ajout pour Saison/Saison.php etc.
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

$entities = [
    'Biens', 'Commune', 'Compose', 'Dispose', 'Evenement', 'Locataire',
    'Personne_Morale', 'Personne_Physique', 'Prestation', 'PtsInteret',
    'Reservation', 'Saison', 'Tarif', 'TypeBien', 'TypeEvenement', 'TypePtsInteret'
];

// Gestion du formulaire Saison
$saisonMessage = '';
$saisons = [];
try {
    $pdo = $pdo ?? null;
    if ($pdo) {
        $saisonObj = new Saison(null, null, $pdo);

        // Ajout d'une saison
        if (isset($_POST['add_saison'])) {
            $lib_saison = trim($_POST['lib_saison'] ?? '');
            if ($lib_saison !== '') {
                if ($saisonObj->createSaison($lib_saison)) {
                    $saisonMessage = "Saison ajoutée avec succès.";
                } else {
                    $saisonMessage = "Erreur lors de l'ajout.";
                }
            }
        }

        // Suppression d'une saison
        if (isset($_POST['delete_saison']) && isset($_POST['id_saison'])) {
            $id = intval($_POST['id_saison']);
            if ($saisonObj->deleteSaison($id)) {
                $saisonMessage = "Saison supprimée avec succès.";
            } else {
                $saisonMessage = "Erreur lors de la suppression.";
            }
        }

        // Modification d'une saison
        if (isset($_POST['edit_saison']) && isset($_POST['id_saison']) && isset($_POST['lib_saison_edit'])) {
            $id = intval($_POST['id_saison']);
            $lib_saison_edit = trim($_POST['lib_saison_edit']);
            if ($lib_saison_edit !== '') {
                if ($saisonObj->updateSaison($id, $lib_saison_edit)) {
                    $saisonMessage = "Saison modifiée avec succès.";
                } else {
                    $saisonMessage = "Erreur lors de la modification.";
                }
            }
        }

        // Récupération des saisons
        $saisons = $saisonObj->readAllSaison();
    }
} catch (Exception $e) {
    $saisonMessage = "Erreur : " . $e->getMessage();
}

// Traitement du formulaire générique (autres entités)
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['entity']) && !isset($_POST['add_saison'])) {
    $entity = $_POST['entity'];
    $action = $_POST['action'] ?? '';
    $value = $_POST['value'] ?? '';
    $message = "[$entity] Action : $action, Valeur : $value (à implémenter)";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>House After Party</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
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
            padding: 80px 20px 60px 20px;
        }
        .hero h1 {
            font-size: 3em;
            margin: 0 0 18px 0;
            font-weight: 700;
        }
        .hero h2 {
            font-size: 1.5em;
            margin: 0 0 18px 0;
            font-weight: 400;
        }
        .hero p {
            font-size: 1.1em;
            margin-bottom: 32px;
        }
        .hero .hero-btns {
            display: flex;
            justify-content: center;
            gap: 24px;
        }
        .hero .hero-btns button {
            background: #fff;
            color: #a100b8;
            border: none;
            border-radius: 8px;
            padding: 14px 32px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .hero .hero-btns button:hover {
            background: #f3e6fa;
            color: #4b006e;
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
        }
        @media (max-width: 900px) {
            .cards { flex-direction: column; align-items: center; }
        }
        form { border:1px solid #ccc; padding:10px; margin-bottom:10px; }
        .entity-title { font-weight:bold; }
        .saison-list { margin-top: 20px; }
        .saison-list table { border-collapse: collapse; width: 100%; max-width: 400px; margin: 0 auto; }
        .saison-list th, .saison-list td { border: 1px solid #ccc; padding: 8px 12px; text-align: center; }
        .saison-list th { background: #f3e6fa; }
        .saison-success { color: green; text-align: center; }
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
            <button>Voir les logements</button>
            <button></button>
        </div>
    </section>
    <section class="section">
        <h2>Pourquoi choisir HAP&nbsp;?</h2>
        <p>
            Nous sélectionnons les meilleurs logements pour que vos soirées soient inoubliables
        </p>
        <div class="cards">
            <div class="card">Logements proches des boîtes de nuit</div>
            <div class="card">Ambiance garantie pour vos afters</div>
            <div class="card">Réservation simple et rapide</div>
            <div class="card">Service client réactif</div>
        </div>
    </section>

    <section class="section">
        <h2>Ajouter une Saison</h2>
        <?php if ($saisonMessage): ?>
            <div class="saison-success"><?= htmlspecialchars($saisonMessage) ?></div>
        <?php endif; ?>
        <form method="post">
            <label for="lib_saison">Nom de la saison :</label>
            <input type="text" id="lib_saison" name="lib_saison" required>
            <input type="submit" name="add_saison" value="Ajouter">
        </form>
        <div class="saison-list">
            <h3>Liste des saisons</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($saisons as $saison): ?>
                    <tr>
                        <td><?= htmlspecialchars($saison['id_saison']) ?></td>
                        <td>
                            <?php if (isset($_POST['edit_mode']) && $_POST['edit_mode'] == $saison['id_saison']): ?>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="id_saison" value="<?= htmlspecialchars($saison['id_saison']) ?>">
                                    <input type="text" name="lib_saison_edit" value="<?= htmlspecialchars($saison['lib_saison']) ?>" required>
                                    <button type="submit" name="edit_saison">Enregistrer</button>
                                </form>
                            <?php else: ?>
                                <?= htmlspecialchars($saison['lib_saison']) ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (isset($_POST['edit_mode']) && $_POST['edit_mode'] == $saison['id_saison']): ?>
                                <!-- Rien, on est en mode édition -->
                            <?php else: ?>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="id_saison" value="<?= htmlspecialchars($saison['id_saison']) ?>">
                                    <button type="submit" name="edit_mode" value="<?= htmlspecialchars($saison['id_saison']) ?>">Modifier</button>
                                </form>
                                <form method="post" style="display:inline;" onsubmit="return confirm('Supprimer cette saison ?');">
                                    <input type="hidden" name="id_saison" value="<?= htmlspecialchars($saison['id_saison']) ?>">
                                    <button type="submit" name="delete_saison">Supprimer</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </section>

    <?php if ($message): ?>
        <p style="color:green"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <?php foreach ($entities as $entity): ?>
        <form method="post">
            <span class="entity-title"><?= htmlspecialchars($entity) ?></span><br>
            <input type="hidden" name="entity" value="<?= htmlspecialchars($entity) ?>">
            <label>Valeur (ex: nom ou id) : 
                <input type="text" name="value" required>
            </label>
            <select name="action">
                <option value="create">Créer</option>
                <option value="read">Lire</option>
                <option value="update">Modifier</option>
                <option value="delete">Supprimer</option>
            </select>
            <button type="submit">Valider</button>
        </form>
    <?php endforeach; ?>
    <p>Adapte les champs et le traitement selon la structure de chaque entité.</p>
</body>
</html>
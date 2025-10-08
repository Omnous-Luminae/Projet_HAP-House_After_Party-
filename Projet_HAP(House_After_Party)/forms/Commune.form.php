<?php
require_once __DIR__ . '/../config/db.php';

$message = '';

try {
    $pdo = $pdo ?? null;
    if ($pdo) {
        // Récupération des communes (limit for performance)
        $communes = $pdo->query('SELECT id_commune, code_insee, nom_commune, cp_commune FROM Commune ORDER BY nom_commune LIMIT 100')->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Exception $e) {
    $message = "Erreur : " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Communes</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', Arial, sans-serif; background: #f7f7f9; margin: 0; }
        .container { max-width: 1000px; margin: 40px auto; background: #fff; border-radius: 18px; box-shadow: 0 2px 16px rgba(80,0,80,0.06); padding: 40px 30px; }
        h2 { text-align: center; margin-bottom: 28px; }
        .commune-list { margin-top: 20px; }
        .commune-list table { border-collapse: collapse; width: 100%; }
        .commune-list th, .commune-list td { border: 1px solid #ccc; padding: 8px 12px; text-align: center; }
        .commune-list th { background: #f3e6fa; }
        .success { color: green; text-align: center; margin-bottom: 18px; }
        .back-link { display: block; margin-bottom: 18px; color: #a100b8; text-decoration: none; font-weight: 600; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <a href="../../../../index.php" class="back-link">&larr; Retour à l'accueil</a>
        <h2>Liste des Communes (premières 100)</h2>
        <?php if ($message): ?>
            <div class="success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <div class="commune-list">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Code INSEE</th>
                    <th>Nom</th>
                    <th>Code Postal</th>
                </tr>
                <?php foreach ($communes as $c): ?>
                    <tr>
                        <td><?= htmlspecialchars($c['id_commune']) ?></td>
                        <td><?= htmlspecialchars($c['code_insee']) ?></td>
                        <td><?= htmlspecialchars($c['nom_commune']) ?></td>
                        <td><?= htmlspecialchars($c['cp_commune']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>

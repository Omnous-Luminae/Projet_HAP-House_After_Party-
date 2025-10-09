<?php
require_once __DIR__ . '/../config/db.php';

$message = '';

try {
    $pdo = $pdo ?? null;
    if ($pdo) {
        // Ajout d'un type d'événement
        if (isset($_POST['add_type_evenement'])) {
            $lib = trim($_POST['lib_type_evenement'] ?? '');
            if ($lib !== '') {
                $stmt = $pdo->prepare('INSERT INTO Type_Evenement (lib_type_evenement) VALUES (?)');
                $stmt->execute([$lib]);
                $message = "Type d'événement ajouté avec succès.";
            }
        }

        // Suppression d'un type d'événement
        if (isset($_POST['delete_type_evenement']) && isset($_POST['id_type_evenement'])) {
            $id = intval($_POST['id_type_evenement']);
            $stmt = $pdo->prepare('DELETE FROM Type_Evenement WHERE id_type_evenement = ?');
            $stmt->execute([$id]);
            $message = "Type d'événement supprimé avec succès.";
        }

        // Récupération des types
        $types = $pdo->query('SELECT * FROM Type_Evenement ORDER BY id_type_evenement DESC')->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Exception $e) {
    $message = "Erreur : " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Types d'Événements</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', Arial, sans-serif; background: #f7f7f9; margin: 0; }
        .container { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 18px; box-shadow: 0 2px 16px rgba(80,0,80,0.06); padding: 40px 30px; }
        h2 { text-align: center; margin-bottom: 28px; }
        form { display: flex; gap: 10px; margin-bottom: 20px; justify-content: center; }
        input[type="text"] { flex: 1; padding: 8px; border-radius: 6px; border: 1px solid #ccc; }
        input[type="submit"], button { background: #a100b8; color: #fff; border: none; border-radius: 6px; padding: 8px 18px; font-weight: 600; cursor: pointer; }
        input[type="submit"]:hover, button:hover { background: #4b006e; }
        .type-list { margin-top: 20px; }
        .type-list table { border-collapse: collapse; width: 100%; }
        .type-list th, .type-list td { border: 1px solid #ccc; padding: 8px 12px; text-align: center; }
        .type-list th { background: #f3e6fa; }
        .success { color: green; text-align: center; margin-bottom: 18px; }
        .back-link { display: block; margin-bottom: 18px; color: #a100b8; text-decoration: none; font-weight: 600; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <a href="../index.php" class="back-link">&larr; Retour à l'accueil</a>
        <h2>Gestion des Types d'Événements</h2>
        <?php if ($message): ?>
            <div class="success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form method="post">
            <input type="text" id="lib_type_evenement" name="lib_type_evenement" placeholder="Nom du type d'événement" required>
            <input type="submit" name="add_type_evenement" value="Ajouter">
        </form>
        <div class="type-list">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($types as $t): ?>
                    <tr>
                        <td><?= htmlspecialchars($t['id_type_evenement']) ?></td>
                        <td><?= htmlspecialchars($t['lib_type_evenement']) ?></td>
                        <td>
                            <form method="post" style="display:inline;" onsubmit="return confirm('Supprimer ce type ?');">
                                <input type="hidden" name="id_type_evenement" value="<?= htmlspecialchars($t['id_type_evenement']) ?>">
                                <button type="submit" name="delete_type_evenement">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>

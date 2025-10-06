<?php

require_once __DIR__ . '/../config/db.inc.php';

 

$sql = "SELECT * FROM photos ORDER BY date_upload DESC";

$stmt = $pdo->query($sql);

$photos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

 

<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Galerie de photos</title>

</head>

<body>

    <h2>Galerie d’images</h2>

    <?php if ($photos): ?>

        <?php foreach ($photos as $photo): ?>

            <div style="display:inline-block; margin:10px;">

                <img src="<?= htmlspecialchars($photo['chemin']) ?>" width="200" alt="photo">

            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <p>Aucune photo enregistrée.</p>

    <?php endif; ?>

</body>

</html>
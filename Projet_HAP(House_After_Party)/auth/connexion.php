<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../classes/Locataire/Locataire.php';

session_start();

// Générer le captcha
if (!isset($_SESSION['captcha_num1'])) {
    $_SESSION['captcha_num1'] = rand(1, 10);
    $_SESSION['captcha_num2'] = rand(1, 10);
    $_SESSION['captcha_sum'] = $_SESSION['captcha_num1'] + $_SESSION['captcha_num2'];
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $captcha = intval($_POST['captcha'] ?? 0);

    if ($email !== '' && $password !== '' && $captcha !== 0) {
        if ($captcha !== $_SESSION['captcha_sum']) {
            $message = "Captcha incorrect.";
        } else {
            $pdo = $pdo ?? null;
            if ($pdo) {
                $locataireObj = new Locataire(null, null, null, null, null, null, null, null, null, $pdo);
                $stmt = $pdo->prepare("SELECT * FROM Locataire WHERE email_locataire = :email");
                $stmt->execute(['email' => $email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password_locataire'])) {
                    // Authentification réussie
                    $_SESSION['user_id'] = $user['id_locataire'];
                    $_SESSION['user_name'] = $user['nom_locataire'];
                    // Régénérer le captcha après connexion réussie
                    unset($_SESSION['captcha_num1'], $_SESSION['captcha_num2'], $_SESSION['captcha_sum']);
                    header('Location: /index.php');
                    exit;
                } else {
                    $message = "Email ou mot de passe incorrect.";
                }
            } else {
                $message = "Erreur de connexion à la base de données.";
            }
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <style>
        .robot-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
        }
        .robot-btn input[type="checkbox"] {
            width: 22px;
            height: 22px;
        }
        .connexion-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <?php if ($message): ?>
            <p style="color: red;"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <label for="email">Email :</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <div class="robot-btn">
                <input type="checkbox" id="not_robot" name="not_robot">
                <label for="not_robot"><strong>Je ne suis pas un robot</strong></label>
            </div>

            <label for="captcha">Combien font <?= $_SESSION['captcha_num1'] ?> + <?= $_SESSION['captcha_num2'] ?> ?</label><br>
            <input type="number" id="captcha" name="captcha" required><br><br>

            <input type="submit" class="connexion-btn" name="login" value="Se connecter" disabled>
        </form>
        <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a>.</p>
    </div>
    <script>
        // Désactive le bouton tant que la case n'est pas cochée
        const checkbox = document.getElementById('not_robot');
        const submitBtn = document.querySelector('.connexion-btn');
        checkbox.addEventListener('change', function() {
            submitBtn.disabled = !this.checked;
        });
    </script>
</body>
</html>

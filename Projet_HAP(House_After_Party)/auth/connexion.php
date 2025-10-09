<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../classes/Locataire/Locataire.php';
require_once __DIR__ . '/../classes/Animateur/Animateur.php';

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
                $animateurObj = new Animateur($pdo);

                // Vérifier dans Locataire
                $stmt = $pdo->prepare("SELECT * FROM Locataire WHERE email_locataire = :email");
                $stmt->execute(['email' => $email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user['password_locataire'])) {
                    // Authentification réussie Locataire
                    $_SESSION['user_id'] = $user['id_locataire'];
                    $_SESSION['user_name'] = $user['nom_locataire'];
                    $_SESSION['role'] = 'locataire';
                    unset($_SESSION['captcha_num1'], $_SESSION['captcha_num2'], $_SESSION['captcha_sum']);
                    header('Location: /index.php');
                    exit;
                } else {
                    // Vérifier dans Animateur
                    $animateur = $animateurObj->authenticateAnimateur($email, $password);
                    if ($animateur) {
                        $_SESSION['user_id'] = $animateur['id_animateur'];
                        $_SESSION['user_name'] = $animateur['nom_animateur'];
                        $_SESSION['role'] = 'animateur';
                        unset($_SESSION['captcha_num1'], $_SESSION['captcha_num2'], $_SESSION['captcha_sum']);
                        header('Location: /apropos.php');
                        exit;
                    } else {
                        $message = "Email ou mot de passe incorrect.";
                    }
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
    <link rel="stylesheet" href="../Css/style.css">
</head>
<body>
    <div class="auth-container">
        <h2>Connexion</h2>
        <?php if ($message): ?>
            <div class="message error">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>
        <form method="post" action="" class="auth-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="robot-btn">
                <input type="checkbox" id="not_robot" name="not_robot">
                <label for="not_robot"><strong>Je ne suis pas un robot</strong></label>
            </div>

            <div class="form-group">
                <label for="captcha">Combien font <?= $_SESSION['captcha_num1'] ?> + <?= $_SESSION['captcha_num2'] ?> ?</label>
                <input type="number" id="captcha" name="captcha" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary connexion-btn" name="login" value="Se connecter" disabled>Se connecter</button>
        </form>
        <div class="auth-link">
            <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a>.</p>
        </div>
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

<?php
session_start();
require_once "../users.php";

if(isset($_POST['submit'])){

    $email = ($_POST['email']);
    $password = $_POST['password'];

    // Find user by email
    $user = User::findByEmail($email);

    if($user){
        // check password 
        if($user->password === $password){
            // save session info
            $_SESSION['user'] = $user->username;
            $_SESSION['role'] = $user->role;

            // redirect to dashboard
            if($user->role == 'journalist'){
                header("Location: ../journalist/indexxx.php");
                exit;
            }else{
                header("location: ../index.php");
                exit;
            }
            
        } else {
            $error = "Mot de passe incorrect";
        }
    } else {
        $error = "Aucun compte trouvé avec ce email";
    }

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Apex Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/auth.css">
</head>
<body>
    <div class="auth-container">
        <!-- Left Panel -->
        <div class="auth-left">
            <div class="brand-section">
                <div class="logo-large">
                    <h1>APEX</h1>
                    <p>MANAGEMENT</p>
                </div>
                <p class="brand-tagline">La plateforme de gestion eSport de référence</p>
                <div class="brand-features">
                    <div class="feature-item">
                        <span class="feature-icon">⚡</span>
                        <span>Gestion en temps réel</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">🔒</span>
                        <span>Sécurité maximale</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">📊</span>
                        <span>Analytics avancés</span>
                    </div>
                </div>
            </div>
            <div class="geometric-pattern"></div>
        </div>

        <!-- Right Panel -->
        <div class="auth-right">
            <div class="auth-form-container">
                <div class="form-header">
                    <h2>Connexion</h2>
                    <p>Accédez à votre espace</p>
                </div>

                <?php if (isset($error)): ?>
                    <div class="error-message">
                        ❌ <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <form class="auth-form" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="votre@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                    </div>


                    <button name="submit" type="submit" class="btn-submit">
                        <span>Se connecter</span>
                        <span class="arrow">→</span>
                    </button>
                </form>

                <div class="divider"><span>OU</span></div>

                <a href="../visitor/indexx.php" class="btn-public">
                    <span>👁️</span>
                    <span>Continuer en mode visiteur</span>
                </a>

                <div class="form-footer">
                    <p>Vous n'avez pas de compte ? <a href="signup.php">Créer un compte</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
session_start();
require_once "../users.php";

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if(empty($username) || empty($email) || empty($password) || empty($role)){
            echo "<p>Veuillez entrer tous les champs</p>";
        }else{
            $joueur = new User($username, $email, $password, $role);
            $joueur->create();

            header("Location: signup.php");
            exit;
        }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - Apex Management</title>
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
                <p class="brand-tagline">Rejoignez la plateforme de référence</p>
                <div class="brand-features">
                    <div class="feature-item">
                        <span class="feature-icon">👑</span>
                        <span>Accès administrateur</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">📰</span>
                        <span>Profil journaliste</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">👁️</span>
                        <span>Accès public gratuit</span>
                    </div>
                </div>
            </div>
            <div class="geometric-pattern"></div>
        </div>

        <!-- Right Panel -->
        <div class="auth-right">
            <div class="auth-form-container">
                <div class="form-header">
                    <h2>Créer un compte</h2>
                    <p>Choisissez votre type d'accès</p>
                </div>

                <?php if (isset($error)): ?>
                    <div class="error-message">
                        ❌ <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <form class="auth-form" method="POST">
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" id="name" name="username" placeholder="Jean Dupont" required value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="votre@email.com" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" required minlength="6">
                        <span class="field-hint">Au moins 6 caractères</span>
                    </div>

                    <div class="form-group">
                        <label>Type de compte</label>
                        <div class="radio-group">
                            <label class="radio-item">
                                <input type="radio" name="role" value="admin" required>
                                <div class="radio-content">
                                    <span class="radio-icon">👑</span>
                                    <div>
                                        <strong>Administrateur</strong>
                                        <p>Gestion complète de la plateforme</p>
                                    </div>
                                </div>
                            </label>

                            <label class="radio-item">
                                <input type="radio" name="role" value="journalist" required>
                                <div class="radio-content">
                                    <span class="radio-icon">📰</span>
                                    <div>
                                        <strong>Journaliste</strong>
                                        <p>Accès aux données privées et analytics</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="terms" required>
                            <span>J'accepte les <a href="#" style="color: var(--color-accent-blue);">conditions d'utilisation</a></span>
                        </label>
                    </div>

                    <button name="submit" type="submit" class="btn-submit">
                        <span>Créer mon compte</span>
                        <span class="arrow">→</span>
                    </button>
                </form>

                <div class="divider"><span>OU</span></div>

                <a href="visitor-index.php" class="btn-public">
                    <span>👁️</span>
                    <span>Accéder en mode visiteur</span>
                </a>

                <div class="form-footer">
                    <p>Vous avez déjà un compte ? <a href="login.php">Se connecter</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
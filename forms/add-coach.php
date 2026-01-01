<?php
require_once "../coach.php";

$listcoaches = Coach::getAll();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nationnality = $_POST['nationnality'];
    $anneesexperience = $_POST['anneesexperience'];

    if(empty($name) || empty($email) || empty($nationnality) || empty($anneesexperience)){
        echo "<p>Veuillez entrer tous les champs</p>";
    }
    else{
        $coach = new Coach($name, $nationnality, $email, $anneesexperience);
        $coach->create();

            header("Location: ../coaches.php");
            exit;
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Coach - Apex Management</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="../styles/forms.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <h1>APEX<span>MANAGEMENT</span></h1>
            </div>
            
            <nav class="nav-menu">
                <a href="../index.php" class="nav-item">
                    <span class="icon">📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="../players.php" class="nav-item">
                    <span class="icon">🎮</span>
                    <span>Joueurs</span>
                </a>
                <a href="../coaches.php" class="nav-item active">
                    <span class="icon">👔</span>
                    <span>Coachs</span>
                </a>
                <a href="../teams.php" class="nav-item">
                    <span class="icon">🏆</span>
                    <span>Équipes</span>
                </a>
                <a href="../contracts.php" class="nav-item">
                    <span class="icon">📝</span>
                    <span>Contrats</span>
                </a>
                <a href="../transfers.php" class="nav-item">
                    <span class="icon">💸</span>
                    <span>Transferts</span>
                </a>
            </nav>

            <div class="user-profile">
                <div class="user-avatar">AD</div>
                <div class="user-info">
                    <p class="user-name">Admin</p>
                    <p class="user-role">Gestionnaire</p>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="top-bar">
                <div>
                    <a href="../coaches.php" class="back-link">← Retour aux coachs</a>
                    <h2 class="page-title">Ajouter un Coach</h2>
                </div>
            </header>

            <div class="content-wrapper">
                <div class="form-container">
                    <form class="entity-form" action="add-coach.php" method="post">
                        <!-- Personal Information Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">👤</div>
                                <h3 class="section-title">Informations Personnelles</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="nom">Nom complet *</label>
                                    <input type="text" id="nom" name="name" placeholder="Ex: Jonas Gundersen" required>
                                </div>

                                <div class="form-field">
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" name="email" placeholder="Ex: devilwalk@fnatic.com" required>
                                </div>

                                <div class="form-field">
                                    <label for="email">Nationnality *</label>
                                    <input type="text" id="email" name="nationnality" placeholder="Ex: Brazilian" required>
                                </div>

                                <div class="form-field">
                                    <label for="annees_experience">Années d'expérience *</label>
                                    <input type="number" id="annees_experience" name="anneesexperience" placeholder="Ex: 8" min="0" max="30" required>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" class="btn-secondary" onclick="window.location.href='../coaches.php'">Annuler</button>
                            <button type="reset" class="btn-secondary">Réinitialiser</button>
                            <button name="submit" type="submit" class="btn-primary">✓ Créer le coach</button>
                        </div>
                    </form>

                    <!-- Preview Card -->
                    <div class="preview-card">
                        <div class="preview-header">
                            <h3>Aperçu de la carte</h3>
                        </div>
                        <div class="preview-body">
                            <div class="preview-avatar coach">CO</div>
                            <h4 class="preview-name">Nouveau Coach</h4>
                            <p class="preview-role">Style - Jeu</p>
                            <div class="preview-experience">0 ans d'expérience</div>
                            <p class="preview-hint">Les informations s'afficheront au fur et à mesure que vous remplissez le formulaire</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
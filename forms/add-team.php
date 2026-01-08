<?php
session_start();
require_once "../equipe.php";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $manager = $_POST['manager'];
    $budget = $_POST['budget'];

    if(empty($name) || empty($manager) || empty($budget)){
        echo "<p>Veuillez entrer tous les champs</p>";
    }else{
        $equipe = new Equipe($name, $budget, $manager);
        $equipe->create();

        header("Location: ../teams.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Équipe - Apex Management</title>
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
                <a href="../coaches.php" class="nav-item">
                    <span class="icon">👔</span>
                    <span>Coachs</span>
                </a>
                <a href="../teams.php" class="nav-item active">
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
                    <a href="../teams.php" class="back-link">← Retour aux équipes</a>
                    <h2 class="page-title">Créer une Équipe</h2>
                </div>
            </header>

            <div class="content-wrapper">
                <div class="form-container">
                    <form class="entity-form" action="add-team.php" method="post">
                        <!-- Team Information Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">🏆</div>
                                <h3 class="section-title">Informations de l'Équipe</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="nom">Nom de l'équipe *</label>
                                    <input type="text" id="nom" name="name" placeholder="Ex: Team Vitality" required>
                                </div>

                                <div class="form-field">
                                    <label for="manager">Manager</label>
                                    <input type="text" id="manager" name="manager" placeholder="Ex: Nicolas Maurer" required>
                                </div>

                                <div class="form-field">
                                    <label for="budget">Budget total (€) *</label>
                                    <input type="number" id="budget" name="budget" placeholder="Ex: 15500000" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn-secondary" onclick="window.location.href='../teams.php'">Annuler</button>
                            <button type="reset" class="btn-secondary">Réinitialiser</button>
                            <button name="submit" type="submit" class="btn-primary">✓ Créer l'équipe</button>
                        </div>
                    </form>

                    <!-- Preview Card -->
                    <div class="preview-card">
                        <div class="preview-header">
                            <h3>Aperçu de la carte</h3>
                        </div>
                        <div class="preview-body">
                            <div class="preview-logo">TM</div>
                            <h4 class="preview-name">Nouvelle Équipe</h4>
                            <p class="preview-role">Jeu(x)</p>
                            <div class="preview-manager">Manager</div>
                            <div class="preview-budget">0 €</div>
                            <p class="preview-hint">Les informations s'afficheront au fur et à mesure que vous remplissez le formulaire</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
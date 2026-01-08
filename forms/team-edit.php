<?php
require_once "../equipe.php";
session_start();

$teamId = $_GET['id'];

$teamData = Equipe::getById($teamId);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $budget = $_POST['budget'];
    $manager = $_POST['manager'];

    $team = new Equipe($name, $budget, $manager, $teamId);
    $team->Update();
    header("Location: ../teams.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier <?php echo htmlspecialchars($teamData['name']); ?> - Apex Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="../styles/forms.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <h1>APEX<span>MANAGEMENT</span></h1>
            </div>
            
            <nav class="nav-menu">
                <a href="admin-index.php" class="nav-item">
                    <span class="icon">📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="admin-players.php" class="nav-item">
                    <span class="icon">🎮</span>
                    <span>Joueurs</span>
                </a>
                <a href="admin-coaches.php" class="nav-item">
                    <span class="icon">👔</span>
                    <span>Coachs</span>
                </a>
                <a href="admin-teams.php" class="nav-item active">
                    <span class="icon">🏆</span>
                    <span>Équipes</span>
                </a>
                <a href="admin-contracts.php" class="nav-item">
                    <span class="icon">📝</span>
                    <span>Contrats</span>
                </a>
                <a href="admin-transfers.php" class="nav-item">
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
                    <h2 class="page-title">Modifier</h2>
                </div>
            </header>

            <div class="content-wrapper">
                <div class="form-container">
                    <form class="entity-form" action="team-edit.php?id=<?= $teamData['id'] ?>" method="post">
                        <!-- Team Information Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">🏆</div>
                                <h3 class="section-title">Informations de l'Équipe</h3>
                            </div>
                            <div class="form-grid">
                                
                                <div class="form-field">
                                    <input type="hidden" name="id" value="<?= $teamData['id'] ?>">
                                    <label for="nom">Nouveau nom de l'équipe *</label>
                                    <input value="<?= htmlspecialchars($teamData['name']) ?>" type="text" id="nom" name="name" placeholder="Ex: Team Vitality" required>
                                </div>

                                <div class="form-field">
                                    <label for="manager">Nouveau Manager</label>
                                    <input value="<?= htmlspecialchars($teamData['manager']) ?>" type="text" id="manager" name="manager" placeholder="Ex: Nicolas Maurer" required>
                                </div>

                                <div class="form-field">
                                    <label for="budget">Nouveau budget total (€) *</label>
                                    <input value="<?= htmlspecialchars($teamData['budget']) ?>" type="number" id="budget" name="budget" placeholder="Ex: 15500000" required>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <a href="../teams.php" class="btn-secondary">Annuler</a>
                            <button type="reset" class="btn-secondary">Réinitialiser</button>
                            <button name="submit" type="submit" class="btn-primary">✓ Enregistrer les modifications</button>
                        </div>
                    </form>
                   
                </div>
            </div>
        </main>
    </div>

</body>
</html>
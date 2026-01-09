<?php
require_once "../joueur.php";
session_start();

$playerid = $_GET['id'];
$playerdata = Joueur::getById($playerid);

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nationnality = $_POST['nationnality'];
    $role = $_POST['role'];
    $valeur = $_POST['valeur'];

    $player = new Joueur($name, $nationnality, $email, $role, $valeur, null, $playerid);
    $player->Update();

    header("location: ../players.php");
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
                    <a href="../players.php" class="back-link">← Retour aux joueurs</a>
                    <h2 class="page-title">Modifier</h2>
                </div>
            </header>

            <div class="content-wrapper">
                <div class="form-container">
                    <form class="entity-form" action="edit-player.php?id=<?= $playerdata['id'] ?>" method="post">
                        <!-- Team Information Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">🏆</div>
                                <h3 class="section-title">Informations de l'Équipe</h3>
                            </div>
                            <div class="form-grid">
                                
                                <div class="form-field">
                                    <input type="hidden" name="id" value="<?= $playerdata['id'] ?>">
                                    <label for="nom">Nouveau nom du joueur *</label>
                                    <input value="<?= htmlspecialchars($playerdata['name']) ?>" type="text" id="nom" name="name" placeholder="Ex: Team Vitality" required>
                                </div>

                                <div class="form-field">
                                    <label for="manager">Nouveau Email</label>
                                    <input value="<?= htmlspecialchars($playerdata['email']) ?>" type="email" id="manager" name="email" placeholder="Ex: Nicolas Maurer" required>
                                </div>

                                <div class="form-field">
                                    <label for="manager">Nouvelle nationnality</label>
                                    <input value="<?= htmlspecialchars($playerdata['nationnality']) ?>" type="text" id="manager" name="nationnality" placeholder="Ex: Nicolas Maurer" required>
                                </div>

                                <div class="form-field">
                                    <label for="manager">Nouveau role</label>
                                    <input value="<?= htmlspecialchars($playerdata['role']) ?>" type="text" id="manager" name="role" placeholder="Ex: Nicolas Maurer" required>
                                </div>

                                <div class="form-field">
                                    <label for="budget">Nouvelle valeur marchande (€) *</label>
                                    <input value="<?= htmlspecialchars($playerdata['valeur_marchande']) ?>" type="number" id="budget" name="valeur" placeholder="Ex: 15500000" required>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <a href="../players.php" class="btn-secondary">Annuler</a>
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
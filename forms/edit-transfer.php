<?php
require_once "../transfer.php";
require_once "../contrat.php";
session_start();

$transferid = $_GET['id'];
$transferdata = Transfer::getById($transferid);

if(isset($_POST['submit'])){
    $salaire = $_POST['salaire'];
    $clause = $_POST['clause'];
    $date_fin = $_POST['date_fin'];
    $statut = $_POST['statut'];
    
    $result = Transfer::updatePlayerTransfer($transferid, $salaire, $clause, $date_fin, $statut);

    header("location: ../transfers.php");
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
                    <form class="entity-form" action="edit-transfer.php?id=<?= $transferdata['id'] ?>" method="post">
                        <!-- Team Information Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">🏆</div>
                                <h3 class="section-title">Informations de l'Équipe</h3>
                            </div>
                            <div class="form-grid">
                                
                                <div class="form-field">
                                    <label for="statut">Nouveay statut *</label>
                                    <select id="statut" name="statut" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="COMPLETED">COMPLETED</option>
                                        <option value="IN PROGRESS">IN PROGRESS</option>
                                        <option value="CANCELED">CANCELED</option>
                                    </select>
                                    <span class="field-hint">Nouveau statut du transfer</span>
                                </div>

                                <div class="form-field">
                                    <label for="valeur_marchande">Salaire (€) *</label>
                                    <input type="number" id="valeur_marchande" name="salaire" placeholder="Ex: 2500000" required>
                                </div>

                                <div class="form-field">
                                    <label for="valeur_marchande">Clause de rachat (€) *</label>
                                    <input type="number" id="valeur_marchande" name="clause" placeholder="Ex: 2500000" required>
                                </div>

                                <div class="form-field">
                                    <label for="date_fin">Date de fin du contrat *</label>
                                    <input type="date" id="date_fin" name="date_fin" required>
                                    <span class="field-hint">Date d'expiration du contrat</span>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <a href="../transfers.php" class="btn-secondary">Annuler</a>
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
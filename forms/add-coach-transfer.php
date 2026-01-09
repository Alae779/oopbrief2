<?php

require_once "../equipe.php";
require_once "../joueur.php";
require_once "../transfer.php";
require_once "../coach.php";
session_start();
        $listEquipe = Equipe::getAll();
        $listJoueur = Joueur::getAll();
        $listcoach = Coach::getAll();
        
        if(isset($_POST['submit'])){
            $coach_id = $_POST['coach'];
            $equipe_depart = $_POST['equipe_depart'];
            $equipe_arrive = $_POST['equipe_arrivee'];
            $salaire = $_POST['salaire'];
            $clause_rachat = $_POST['clause'];
            $date_fin = $_POST['date_fin'];
            $statut = $_POST['statut'];

            if(empty($coach_id) || empty($equipe_depart) || empty($equipe_arrive)){
                echo "Veuillez remplir tous les champs";
            }else{
                $transfer = new Transfer($equipe_depart, $equipe_arrive, $statut);
                $result = $transfer->executeCoachTransfer($coach_id, $salaire, $clause_rachat, $date_fin);

                if($result === true){
                    header("location: ../transfers.php");
                    exit;
                }else{
                    echo "error";
                }
            }
        }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Transfert - Apex Management</title>
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
                <a href="../teams.php" class="nav-item">
                    <span class="icon">🏆</span>
                    <span>Équipes</span>
                </a>
                <a href="../contracts.php" class="nav-item">
                    <span class="icon">📝</span>
                    <span>Contrats</span>
                </a>
                <a href="../transfers.php" class="nav-item active">
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
                    <a href="../transfers.php" class="back-link">← Retour aux transferts</a>
                    <h2 class="page-title">Nouveau Transfert</h2>
                </div>
            </header>

            <div class="content-wrapper">
                <div class="form-container">
                    <form class="entity-form" action="add-coach-transfer.php" method="post">
                        <!-- Player Selection Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">👤</div>
                                <h3 class="section-title">Coach Transféré</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field full-width">
                                    <label for="joueur">Coach *</label>
                                    <select id="joueur" name="coach" required>
                                        <option value="">Sélectionner un coach...</option>
                                        <?php foreach($listcoach as $coach) { ?>
                                        <option value="<?= $coach['coachid'] ?>"><?= $coach['coachname'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="field-hint">Seuls les joueurs sous contrat apparaissent</span>
                                </div>
                            </div>
                        </div>

                        <!-- Teams Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">🔄</div>
                                <h3 class="section-title">Équipes Concernées</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="equipe_depart">Équipe de départ *</label>
                                    <select id="equipe_depart" name="equipe_depart" required>
                                        <option value="">Sélectionner...</option>
                                        <?php foreach($listEquipe as $equ) { ?>
                                        <option value="<?= $equ['id'] ?>"><?= $equ['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="field-hint">L'équipe actuelle du joueur</span>
                                </div>

                                <div class="form-field">
                                    <label for="equipe_arrivee">Équipe d'arrivée *</label>
                                    <select id="equipe_arrivee" name="equipe_arrivee" required>
                                        <option value="">Sélectionner...</option>
                                        <?php foreach($listEquipe as $equ) { ?>
                                        <option value="<?= $equ['id'] ?>"><?= $equ['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="field-hint">La nouvelle équipe du joueur</span>
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

                                <div class="form-field">
                                    <label for="statut">Statut *</label>
                                    <select id="statut" name="statut" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="COMPLETED">COMPLETED</option>
                                        <option value="IN PROGRESS">IN PROGRESS</option>
                                        <option value="CANCELED">CANCELED</option>
                                    </select>
                                    <span class="field-hint">Statut actuelle du transfer</span>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" class="btn-secondary" onclick="window.location.href='../transfers.php'">Annuler</button>
                            <button type="reset" class="btn-secondary">Réinitialiser</button>
                            <button name="submit" type="submit" class="btn-primary">✓ Créer le transfert</button>
                        </div>
                    </form>

                    <!-- Preview Card -->
                    <div class="preview-card">
                        <div class="preview-header">
                            <h3>Résumé du transfert</h3>
                        </div>
                        <div class="preview-body">
                            <div class="preview-transfer-id">TR-2025-XXXX</div>
                            <div class="transfer-summary">
                                <div class="summary-item">
                                    <span class="summary-label">Joueur</span>
                                    <span class="summary-value">Non sélectionné</span>
                                </div>
                                <div class="summary-route">
                                    <div class="route-team">Départ</div>
                                    <div class="route-arrow">→</div>
                                    <div class="route-team">Arrivée</div>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">Montant</span>
                                    <span class="summary-value highlight">0 €</span>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">Statut</span>
                                    <span class="summary-value">—</span>
                                </div>
                            </div>
                            <p class="preview-hint">Les informations s'afficheront au fur et à mesure que vous remplissez le formulaire</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
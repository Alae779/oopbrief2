<?php

require_once "../equipe.php";
require_once "../joueur.php";

        $listEquipe = Equipe::getAll();
    
        if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $nationnality = $_POST['nationnality'];
        $email = $_POST['email'];
        $equipe = $_POST['equipe'];
        $role = $_POST['role'];
        $valeurmarchande = $_POST['valeurmarchande'];

        if(empty($name) || empty($nationnality) || empty($email) || empty($equipe) || empty($role) || empty($valeurmarchande)){
            echo "<p>Veuillez entrer tous les champs</p>";
        }else{
            $joueur = new Joueur($name, $nationnality, $email, $role, $valeurmarchande);
            $joueur->create();

            header("Location: ../players.php");
            exit;
        }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Joueur - Apex Management</title>
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
                <a href="../players.php" class="nav-item active">
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
                    <a href="../players.php" class="back-link">← Retour aux joueurs</a>
                    <h2 class="page-title">Ajouter un Joueur</h2>
                </div>
            </header>

            <div class="content-wrapper">
                <div class="form-container">
                    <form class="entity-form" action="add-player.php" method="post">
                        <!-- Personal Information Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">👤</div>
                                <h3 class="section-title">Informations Personnelles</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="nom">Nom</label>
                                    <input type="text" id="nom" name="name" placeholder="Ex: Mathieu Herbaut" required>
                                </div>

                                <div class="form-field">
                                    <label for="pseudo">Nationnality</label>
                                    <input type="text" id="pseudo" name="nationnality" placeholder="Ex: ZywOo" required>
                                </div>

                                <div class="form-field">
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" name="email" placeholder="Ex: zywoo@vitality.gg" required>
                                </div>

                                <div class="form-field">
                                    <label for="nationalite">Equipe</label>
                                    <select id="nationalite" name="equipe" required>
                                        <option value="">Sélectionner...</option>
                                        <?php foreach($listEquipe as $equ) { ?>
                                        <option value="<?= $equ['id'] ?>"><?= $equ['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="fo  rm-field">
                                    <label for="email">Role *</label>
                                    <input type="text" id="email" name="role" placeholder="Ex: zywoo@vitality.gg" required>
                                </div>

                                <div class="form-field">
                                    <label for="valeur_marchande">Valeur marchande (€) *</label>
                                    <input type="number" id="valeur_marchande" name="valeurmarchande" placeholder="Ex: 2500000" step="1000" min="0" required>
                                </div>
                                
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" class="btn-secondary" onclick="window.location.href='../players.php'">Annuler</button>
                            <button type="reset" class="btn-secondary">Réinitialiser</button>
                            <button name="submit" type="submit" class="btn-primary">✓ Créer le joueur</button>
                        </div>
                    </form>

                    <!-- Preview Card -->
                    <div class="preview-card">
                        <div class="preview-header">
                            <h3>Aperçu de la carte</h3>
                        </div>
                        <div class="preview-body">
                            <div class="preview-avatar">JR</div>
                            <h4 class="preview-name">Nouveau Joueur</h4>
                            <p class="preview-role">Rôle - Jeu</p>
                            <div class="preview-value">0 €</div>
                            <p class="preview-hint">Les informations s'afficheront au fur et à mesure que vous remplissez le formulaire</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
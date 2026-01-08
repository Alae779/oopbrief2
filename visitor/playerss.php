<?php
require_once "../joueur.php";
require_once "../formater.php";

session_start();

$playerslist = Joueur::getAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joueurs - Apex Management</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="../styles/players.css">
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
                <a href="indexx.php" class="nav-item">
                    <span class="icon">📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="playerss.php" class="nav-item active">
                    <span class="icon">🎮</span>
                    <span>Joueurs</span>
                </a>
                <a href="coachess.php" class="nav-item">
                    <span class="icon">👔</span>
                    <span>Coachs</span>
                </a>
                <a href="teamss.php" class="nav-item">
                    <span class="icon">🏆</span>
                    <span>Équipes</span>
                </a>
                <a href="contracts.php" class="nav-item">
                    <span class="icon">📝</span>
                    <span>Contrats</span>
                </a>
                <a href="transfers.php" class="nav-item">
                    <span class="icon">💸</span>
                    <span>Transferts</span>
                </a>
            </nav>

            <div class="user-profile">
                <div class="user-avatar">AD</div>
                <div class="user-info">
                    <p class="user-name">Journalist</p>
                    <p class="user-role">Gestionnaire</p>
                </div>
                <div class="team-badge">
                    <a href="../forms/logout.php">LOG OUT</a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="top-bar">
                <h2 class="page-title">Gestion des Joueurs</h2>
            </header>

            <div class="content-wrapper">
                <!-- Filters and Search -->
                <div class="filters-section">
                    <div class="search-bar">
                        <input type="text" placeholder="🔍 Rechercher un joueur..." class="search-input">
                    </div>
                    <div class="filters-row">
                        <select class="filter-select">
                            <option value="">Tous les jeux</option>
                            <option value="cs2">CS2</option>
                            <option value="lol">League of Legends</option>
                            <option value="valorant">Valorant</option>
                            <option value="dota2">Dota 2</option>
                        </select>
                        <select class="filter-select">
                            <option value="">Tous les rôles</option>
                            <option value="awp">AWP</option>
                            <option value="rifler">Rifler</option>
                            <option value="mid">Mid</option>
                            <option value="adc">ADC</option>
                            <option value="support">Support</option>
                        </select>
                        <select class="filter-select">
                            <option value="">Toutes les nationalités</option>
                            <option value="fr">🇫🇷 France</option>
                            <option value="es">🇪🇸 Espagne</option>
                            <option value="kr">🇰🇷 Corée du Sud</option>
                            <option value="br">🇧🇷 Brésil</option>
                        </select>
                        <button class="btn-secondary">Réinitialiser</button>
                    </div>
                </div>

                <!-- Players Grid -->
                <div class="players-container">
                    <?php foreach($playerslist as $player) { ?>
                    <div class="player-card-detailed">
                        <div class="player-card-header">
                            <div class="player-avatar-large">ZW</div>
                            <div class="player-flag-large"></div>
                            <span class="player-status-dot active"></span>
                        </div>
                        <div class="player-card-body">
                            <h3 class="player-name-large"><?= $player['name'] ?></h3>
                            <p class="player-email"><?= $player['email'] ?></p>
                            <div class="player-tags">
                                <span class="tag">AWP</span>
                                <span class="tag">CS2</span>
                            </div>
                            <div class="player-stats-row">
                                <div class="stat-item">
                                    <span class="stat-label">Équipe</span>
                                    <span class="stat-value-small">Vitality</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Valeur</span>
                                    <span class="stat-value-small highlight"><?= Formater::currency($player['valeur_marchande']) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="player-card-footer">
                            <button class="btn-icon-small">👁️</button>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>
        </main>
    </div>
</body>
</html>
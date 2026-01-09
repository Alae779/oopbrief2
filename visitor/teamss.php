<?php
require_once "../equipe.php";
require_once "../formater.php";
session_start();
$listEquipe = Equipe::getAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Équipes - Apex Management</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="../styles/teams.css">
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
                <a href="playerss.php" class="nav-item">
                    <span class="icon">🎮</span>
                    <span>Joueurs</span>
                </a>
                <a href="coachess.php" class="nav-item">
                    <span class="icon">👔</span>
                    <span>Coachs</span>
                </a>
                <a href="teamss.php" class="nav-item active">
                    <span class="icon">🏆</span>
                    <span>Équipes</span>
                </a>
                <a href="contratt.php" class="nav-item">
                    <span class="icon">📝</span>
                    <span>Contrats</span>
                </a>
                <a href="transferr.php" class="nav-item">
                    <span class="icon">💸</span>
                    <span>Transferts</span>
                </a>
            </nav>

            <div class="user-profile">
                <div class="user-avatar">AD</div>
                <div class="user-info">
                    <p class="user-name">Visitor</p>
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
                <h2 class="page-title">Gestion des Équipes</h2>
            </header>

            <div class="content-wrapper">
                <!-- Search Bar -->
                <div class="search-section">
                    <input type="text" placeholder="🔍 Rechercher une équipe..." class="search-input">
                    <select class="filter-select">
                        <option value="">Tous les jeux</option>
                        <option value="cs2">CS2</option>
                        <option value="lol">League of Legends</option>
                        <option value="valorant">Valorant</option>
                        <option value="dota2">Dota 2</option>
                    </select>
                </div>

                <!-- Teams Grid -->
                <div class="teams-grid">
                    <!-- Team Card 2 -->
                     <?php foreach($listEquipe as $equ){ ?>
                    <div class="team-card">
                        <div class="team-header-banner" style="background: linear-gradient(135deg, #0f1923, #2b4a66);">
                            <div class="team-logo">G2</div>
                        </div>
                        <div class="team-body">
                            <h3 class="team-name"><?= $equ['name'] ?></h3>
                            <p class="team-game">🎮 Multi-jeux</p>
                            
                            <div class="team-info-grid">
                                <div class="info-item">
                                    <span class="info-label">Manager</span>
                                    <span class="info-value"><?= $equ['manager'] ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Budget</span>
                                    <span class="info-value highlight"><?= Formater::currency($equ['budget']) ?></span>
                                </div>
                            </div>

                            <div class="team-stats">
                                <div class="stat-box">
                                    <span class="stat-number">15</span>
                                    <span class="stat-text">Joueurs</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">4</span>
                                    <span class="stat-text">Coachs</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">12</span>
                                    <span class="stat-text">Contrats</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>
        </main>
    </div>
</body>
</html>
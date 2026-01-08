<?php
require_once "../coach.php";
require_once "../formater.php";
$listcoaches = Coach::getAll();
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coachs - Apex Management</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="../styles/coaches.css">
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
                <a href="coachess.php" class="nav-item active">
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
                <h2 class="page-title">Gestion des Coachs</h2>
            </header>

            <div class="content-wrapper">
                <!-- Filters and Search -->
                <div class="filters-section">
                    <div class="search-bar">
                        <input type="text" placeholder="🔍 Rechercher un coach..." class="search-input">
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
                            <option value="">Toutes les équipes</option>
                            <option value="vitality">Vitality</option>
                            <option value="g2">G2 Esports</option>
                            <option value="kc">Karmine Corp</option>
                        </select>
                        <select class="filter-select">
                            <option value="">Expérience</option>
                            <option value="junior">0-2 ans</option>
                            <option value="mid">3-5 ans</option>
                            <option value="senior">5+ ans</option>
                        </select>
                        <button class="btn-secondary">Réinitialiser</button>
                    </div>
                </div>

                <!-- Coaches Grid -->
                <div class="coaches-container">
                    <!-- Coach Card 1 -->
                     <?php foreach($listcoaches as $coach) { ?>
                    <div class="coach-card-detailed">
                        <div class="coach-card-header">
                            <div class="coach-avatar-large">DP</div>
                            <div class="coach-flag-large"></div>
                            <span class="coach-status-dot active"></span>
                        </div>
                        <div class="coach-card-body">
                            <h3 class="coach-name-large"><?= $coach['name'] ?></h3>
                            <p class="coach-email"><?= $coach['email'] ?></p>
                            
                            <div class="coach-specialties">
                                <span class="specialty-badge">CS2</span>
                                <span class="specialty-badge">Stratégie</span>
                                <span class="specialty-badge">IGL</span>
                            </div>

                            <div class="coach-info-grid">
                                <div class="info-item">
                                    <span class="info-icon">🏆</span>
                                    <div>
                                        <span class="info-label">Équipe actuelle</span>
                                        <span class="info-value">Fnatic</span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">⏱️</span>
                                    <div>
                                        <span class="info-label">Expérience</span>
                                        <span class="info-value"><?= $coach['annees_experience'] ?> ans</span>
                                    </div>
                                </div>
                            </div>

                            <div class="coach-achievements">
                                <p class="achievements-label">Palmarès :</p>
                                <div class="achievements-list">
                                    <div class="achievement-item">🥇 Major Champion x2</div>
                                    <div class="achievement-item">🏆 IEM Katowice</div>
                                    <div class="achievement-item">⭐ BLAST Winner</div>
                                </div>
                            </div>

                        </div>
                        <div class="coach-card-footer">
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
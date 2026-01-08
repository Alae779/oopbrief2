<?php

session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apex Management - Dashboard</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/dashboard.css">
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
                <a href="index.php" class="nav-item active">
                    <span class="icon">📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="players.php" class="nav-item">
                    <span class="icon">🎮</span>
                    <span>Joueurs</span>
                </a>
                <a href="coaches.php" class="nav-item">
                    <span class="icon">👔</span>
                    <span>Coachs</span>
                </a>
                <a href="teams.php" class="nav-item">
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
                    <p class="user-name">Admin</p>
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
                <h2 class="page-title">Dashboard</h2>
                <div class="header-actions">
                    <button class="btn-icon">🔔</button>
                    <button class="btn-icon">⚙️</button>
                </div>
            </header>

            <div class="content-wrapper">
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">🎮</div>
                        <div class="stat-info">
                            <p class="stat-label">Joueurs Actifs</p>
                            <h3 class="stat-value">247</h3>
                            <span class="stat-change positive">+12%</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">👔</div>
                        <div class="stat-info">
                            <p class="stat-label">Coachs</p>
                            <h3 class="stat-value">48</h3>
                            <span class="stat-change positive">+5%</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">🏆</div>
                        <div class="stat-info">
                            <p class="stat-label">Équipes</p>
                            <h3 class="stat-value">32</h3>
                            <span class="stat-change neutral">0%</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">💸</div>
                        <div class="stat-info">
                            <p class="stat-label">Transferts (Mois)</p>
                            <h3 class="stat-value">15</h3>
                            <span class="stat-change negative">-3%</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Transfers -->
                <div class="section-card">
                    <div class="section-header">
                        <h3>Derniers Transferts</h3>
                        <a href="transfers.php" class="btn-link">Voir tout →</a>
                    </div>
                    <div class="transfers-list">
                        <div class="transfer-item">
                            <div class="transfer-player">
                                <div class="player-avatar">KR</div>
                                <div>
                                    <p class="player-name">Kennyy_S</p>
                                    <p class="player-role">AWP - CS2</p>
                                </div>
                            </div>
                            <div class="transfer-route">
                                <span class="team-badge">G2</span>
                                <span class="arrow">→</span>
                                <span class="team-badge">Vitality</span>
                            </div>
                            <div class="transfer-amount">850K €</div>
                            <span class="status-badge completed">Complété</span>
                        </div>

                        <div class="transfer-item">
                            <div class="transfer-player">
                                <div class="player-avatar">FZ</div>
                                <div>
                                    <p class="player-name">Freeze</p>
                                    <p class="player-role">Mid - LoL</p>
                                </div>
                            </div>
                            <div class="transfer-route">
                                <span class="team-badge">KC</span>
                                <span class="arrow">→</span>
                                <span class="team-badge">Fnatic</span>
                            </div>
                            <div class="transfer-amount">1.2M €</div>
                            <span class="status-badge pending">En cours</span>
                        </div>

                        <div class="transfer-item">
                            <div class="transfer-player">
                                <div class="player-avatar">MX</div>
                                <div>
                                    <p class="player-name">Mixwell</p>
                                    <p class="player-role">Rifler - Valorant</p>
                                </div>
                            </div>
                            <div class="transfer-route">
                                <span class="team-badge">Heretics</span>
                                <span class="arrow">→</span>
                                <span class="team-badge">G2</span>
                            </div>
                            <div class="transfer-amount">650K €</div>
                            <span class="status-badge completed">Complété</span>
                        </div>
                    </div>
                </div>

                <!-- Top Players by Value -->
                <div class="section-card">
                    <div class="section-header">
                        <h3>Top Joueurs - Valeur Marchande</h3>
                        <a href="players.php" class="btn-link">Voir tout →</a>
                    </div>
                    <div class="players-grid">
                        <div class="player-card">
                            <div class="player-header">
                                <div class="player-avatar large">ZW</div>
                                <div class="player-flag">🇫🇷</div>
                            </div>
                            <h4 class="player-name">ZywOo</h4>
                            <p class="player-position">AWP - CS2</p>
                            <p class="player-team">Vitality</p>
                            <div class="player-value">2.5M €</div>
                        </div>

                        <div class="player-card">
                            <div class="player-header">
                                <div class="player-avatar large">CP</div>
                                <div class="player-flag">🇰🇷</div>
                            </div>
                            <h4 class="player-name">Caps</h4>
                            <p class="player-position">Mid - LoL</p>
                            <p class="player-team">G2 Esports</p>
                            <div class="player-value">2.2M €</div>
                        </div>

                        <div class="player-card">
                            <div class="player-header">
                                <div class="player-avatar large">TZ</div>
                                <div class="player-flag">🇪🇸</div>
                            </div>
                            <h4 class="player-name">TenZ</h4>
                            <p class="player-position">Duelist - Valorant</p>
                            <p class="player-team">Sentinels</p>
                            <div class="player-value">1.8M €</div>
                        </div>

                        <div class="player-card">
                            <div class="player-header">
                                <div class="player-avatar large">RK</div>
                                <div class="player-flag">🇫🇷</div>
                            </div>
                            <h4 class="player-name">Rekkles</h4>
                            <p class="player-position">ADC - LoL</p>
                            <p class="player-team">Karmine Corp</p>
                            <div class="player-value">1.6M €</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
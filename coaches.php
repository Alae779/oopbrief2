<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coachs - Apex Management</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="styles/coaches.css">
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
                <a href="index.php" class="nav-item">
                    <span class="icon">📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="players.php" class="nav-item">
                    <span class="icon">🎮</span>
                    <span>Joueurs</span>
                </a>
                <a href="coaches.php" class="nav-item active">
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
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="top-bar">
                <h2 class="page-title">Gestion des Coachs</h2>
                <div class="header-actions">
                    <a href="forms/add-coach.php" class="btn-primary">+ Ajouter Coach</a>
                </div>
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
                    <div class="coach-card-detailed">
                        <div class="coach-card-header">
                            <div class="coach-avatar-large">DP</div>
                            <div class="coach-flag-large">🇸🇪</div>
                            <span class="coach-status-dot active"></span>
                        </div>
                        <div class="coach-card-body">
                            <h3 class="coach-name-large">Devilwalk</h3>
                            <p class="coach-email">devilwalk@fnatic.com</p>
                            
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
                                        <span class="info-value">8 ans</span>
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

                            <div class="coach-stats-bar">
                                <div class="stat-bar-item">
                                    <span class="stat-bar-label">Win Rate</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 68%"></div>
                                    </div>
                                    <span class="stat-bar-value">68%</span>
                                </div>
                            </div>
                        </div>
                        <div class="coach-card-footer">
                            <button class="btn-icon-small">👁️</button>
                            <button class="btn-icon-small">✏️</button>
                            <button class="btn-icon-small danger">🗑️</button>
                        </div>
                    </div>

                    <!-- Coach Card 2 -->
                    <div class="coach-card-detailed">
                        <div class="coach-card-header">
                            <div class="coach-avatar-large">ZN</div>
                            <div class="coach-flag-large">🇰🇷</div>
                            <span class="coach-status-dot active"></span>
                        </div>
                        <div class="coach-card-body">
                            <h3 class="coach-name-large">Zefa</h3>
                            <p class="coach-email">zefa@t1.kr</p>
                            
                            <div class="coach-specialties">
                                <span class="specialty-badge">LoL</span>
                                <span class="specialty-badge">Draft</span>
                                <span class="specialty-badge">Mental</span>
                            </div>

                            <div class="coach-info-grid">
                                <div class="info-item">
                                    <span class="info-icon">🏆</span>
                                    <div>
                                        <span class="info-label">Équipe actuelle</span>
                                        <span class="info-value">T1</span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">⏱️</span>
                                    <div>
                                        <span class="info-label">Expérience</span>
                                        <span class="info-value">10 ans</span>
                                    </div>
                                </div>
                            </div>

                            <div class="coach-achievements">
                                <p class="achievements-label">Palmarès :</p>
                                <div class="achievements-list">
                                    <div class="achievement-item">🥇 Worlds Champion</div>
                                    <div class="achievement-item">🏆 LCK Winner x3</div>
                                    <div class="achievement-item">⭐ MSI Champion</div>
                                </div>
                            </div>

                            <div class="coach-stats-bar">
                                <div class="stat-bar-item">
                                    <span class="stat-bar-label">Win Rate</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 75%"></div>
                                    </div>
                                    <span class="stat-bar-value">75%</span>
                                </div>
                            </div>
                        </div>
                        <div class="coach-card-footer">
                            <button class="btn-icon-small">👁️</button>
                            <button class="btn-icon-small">✏️</button>
                            <button class="btn-icon-small danger">🗑️</button>
                        </div>
                    </div>

                    <!-- Coach Card 3 -->
                    <div class="coach-card-detailed">
                        <div class="coach-card-header">
                            <div class="coach-avatar-large">CB</div>
                            <div class="coach-flag-large">🇺🇸</div>
                            <span class="coach-status-dot active"></span>
                        </div>
                        <div class="coach-card-body">
                            <h3 class="coach-name-large">Chet</h3>
                            <p class="coach-email">chet@nrg.gg</p>
                            
                            <div class="coach-specialties">
                                <span class="specialty-badge">Valorant</span>
                                <span class="specialty-badge">Tactique</span>
                                <span class="specialty-badge">Anti-strat</span>
                            </div>

                            <div class="coach-info-grid">
                                <div class="info-item">
                                    <span class="info-icon">🏆</span>
                                    <div>
                                        <span class="info-label">Équipe actuelle</span>
                                        <span class="info-value">NRG Esports</span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">⏱️</span>
                                    <div>
                                        <span class="info-label">Expérience</span>
                                        <span class="info-value">6 ans</span>
                                    </div>
                                </div>
                            </div>

                            <div class="coach-achievements">
                                <p class="achievements-label">Palmarès :</p>
                                <div class="achievements-list">
                                    <div class="achievement-item">🥇 Masters Winner</div>
                                    <div class="achievement-item">🏆 VCT Americas</div>
                                    <div class="achievement-item">⭐ Champions Top 4</div>
                                </div>
                            </div>

                            <div class="coach-stats-bar">
                                <div class="stat-bar-item">
                                    <span class="stat-bar-label">Win Rate</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 71%"></div>
                                    </div>
                                    <span class="stat-bar-value">71%</span>
                                </div>
                            </div>
                        </div>
                        <div class="coach-card-footer">
                            <button class="btn-icon-small">👁️</button>
                            <button class="btn-icon-small">✏️</button>
                            <button class="btn-icon-small danger">🗑️</button>
                        </div>
                    </div>

                    <!-- Coach Card 4 -->
                    <div class="coach-card-detailed">
                        <div class="coach-card-header">
                            <div class="coach-avatar-large">BL</div>
                            <div class="coach-flag-large">🇩🇰</div>
                            <span class="coach-status-dot active"></span>
                        </div>
                        <div class="coach-card-body">
                            <h3 class="coach-name-large">Blade</h3>
                            <p class="coach-email">blade@vitality.fr</p>
                            
                            <div class="coach-specialties">
                                <span class="specialty-badge">CS2</span>
                                <span class="specialty-badge">Analyse</span>
                                <span class="specialty-badge">T-Side</span>
                            </div>

                            <div class="coach-info-grid">
                                <div class="info-item">
                                    <span class="info-icon">🏆</span>
                                    <div>
                                        <span class="info-label">Équipe actuelle</span>
                                        <span class="info-value">Vitality</span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">⏱️</span>
                                    <div>
                                        <span class="info-label">Expérience</span>
                                        <span class="info-value">12 ans</span>
                                    </div>
                                </div>
                            </div>

                            <div class="coach-achievements">
                                <p class="achievements-label">Palmarès :</p>
                                <div class="achievements-list">
                                    <div class="achievement-item">🥇 Major Champion</div>
                                    <div class="achievement-item">🏆 IEM Winner x4</div>
                                    <div class="achievement-item">⭐ BLAST Champion</div>
                                </div>
                            </div>

                            <div class="coach-stats-bar">
                                <div class="stat-bar-item">
                                    <span class="stat-bar-label">Win Rate</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 73%"></div>
                                    </div>
                                    <span class="stat-bar-value">73%</span>
                                </div>
                            </div>
                        </div>
                        <div class="coach-card-footer">
                            <button class="btn-icon-small">👁️</button>
                            <button class="btn-icon-small">✏️</button>
                            <button class="btn-icon-small danger">🗑️</button>
                        </div>
                    </div>

                    <!-- Coach Card 5 -->
                    <div class="coach-card-detailed">
                        <div class="coach-card-header">
                            <div class="coach-avatar-large">YS</div>
                            <div class="coach-flag-large">🇫🇷</div>
                            <span class="coach-status-dot inactive"></span>
                        </div>
                        <div class="coach-card-body">
                            <h3 class="coach-name-large">YellOwStaR</h3>
                            <p class="coach-email">yellowstar@kc.fr</p>
                            
                            <div class="coach-specialties">
                                <span class="specialty-badge">LoL</span>
                                <span class="specialty-badge">Vision</span>
                                <span class="specialty-badge">Support</span>
                            </div>

                            <div class="coach-info-grid">
                                <div class="info-item">
                                    <span class="info-icon">🏆</span>
                                    <div>
                                        <span class="info-label">Équipe actuelle</span>
                                        <span class="info-value">Karmine Corp</span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">⏱️</span>
                                    <div>
                                        <span class="info-label">Expérience</span>
                                        <span class="info-value">5 ans</span>
                                    </div>
                                </div>
                            </div>

                            <div class="coach-achievements">
                                <p class="achievements-label">Palmarès :</p>
                                <div class="achievements-list">
                                    <div class="achievement-item">🥇 LEC Champion x5</div>
                                    <div class="achievement-item">🏆 Worlds Semi-Final</div>
                                    <div class="achievement-item">⭐ All-Star</div>
                                </div>
                            </div>

                            <div class="coach-stats-bar">
                                <div class="stat-bar-item">
                                    <span class="stat-bar-label">Win Rate</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 65%"></div>
                                    </div>
                                    <span class="stat-bar-value">65%</span>
                                </div>
                            </div>
                        </div>
                        <div class="coach-card-footer">
                            <button class="btn-icon-small">👁️</button>
                            <button class="btn-icon-small">✏️</button>
                            <button class="btn-icon-small danger">🗑️</button>
                        </div>
                    </div>

                    <!-- Coach Card 6 -->
                    <div class="coach-card-detailed">
                        <div class="coach-card-header">
                            <div class="coach-avatar-large">GZ</div>
                            <div class="coach-flag-large">🇧🇷</div>
                            <span class="coach-status-dot active"></span>
                        </div>
                        <div class="coach-card-body">
                            <h3 class="coach-name-large">guerri</h3>
                            <p class="coach-email">guerri@loud.gg</p>
                            
                            <div class="coach-specialties">
                                <span class="specialty-badge">Valorant</span>
                                <span class="specialty-badge">Mentalité</span>
                                <span class="specialty-badge">Rotation</span>
                            </div>

                            <div class="coach-info-grid">
                                <div class="info-item">
                                    <span class="info-icon">🏆</span>
                                    <div>
                                        <span class="info-label">Équipe actuelle</span>
                                        <span class="info-value">LOUD</span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">⏱️</span>
                                    <div>
                                        <span class="info-label">Expérience</span>
                                        <span class="info-value">4 ans</span>
                                    </div>
                                </div>
                            </div>

                            <div class="coach-achievements">
                                <p class="achievements-label">Palmarès :</p>
                                <div class="achievements-list">
                                    <div class="achievement-item">🥇 Champions Winner</div>
                                    <div class="achievement-item">🏆 Masters x2</div>
                                    <div class="achievement-item">⭐ VCT Americas</div>
                                </div>
                            </div>

                            <div class="coach-stats-bar">
                                <div class="stat-bar-item">
                                    <span class="stat-bar-label">Win Rate</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 77%"></div>
                                    </div>
                                    <span class="stat-bar-value">77%</span>
                                </div>
                            </div>
                        </div>
                        <div class="coach-card-footer">
                            <button class="btn-icon-small">👁️</button>
                            <button class="btn-icon-small">✏️</button>
                            <button class="btn-icon-small danger">🗑️</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
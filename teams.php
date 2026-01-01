<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Équipes - Apex Management</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="styles/teams.css">
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
                <a href="coaches.php" class="nav-item">
                    <span class="icon">👔</span>
                    <span>Coachs</span>
                </a>
                <a href="teams.php" class="nav-item active">
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
                <h2 class="page-title">Gestion des Équipes</h2>
                <div class="header-actions">
                    <a href="forms/add-team.php" class="btn-primary">+ Créer Équipe</a>
                </div>
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
                    <!-- Team Card 1 -->
                    <div class="team-card">
                        <div class="team-header-banner" style="background: linear-gradient(135deg, #ff6b00, #ff8c00);">
                            <div class="team-logo">VIT</div>
                        </div>
                        <div class="team-body">
                            <h3 class="team-name">Team Vitality</h3>
                            <p class="team-game">🎮 CS2 & LoL</p>
                            
                            <div class="team-info-grid">
                                <div class="info-item">
                                    <span class="info-label">Manager</span>
                                    <span class="info-value">Nicolas Maurer</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Budget</span>
                                    <span class="info-value highlight">15.5M €</span>
                                </div>
                            </div>

                            <div class="team-stats">
                                <div class="stat-box">
                                    <span class="stat-number">12</span>
                                    <span class="stat-text">Joueurs</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">3</span>
                                    <span class="stat-text">Coachs</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">8</span>
                                    <span class="stat-text">Contrats</span>
                                </div>
                            </div>

                            <div class="team-roster">
                                <p class="roster-label">Roster principal :</p>
                                <div class="roster-avatars">
                                    <div class="mini-avatar" title="ZywOo">ZW</div>
                                    <div class="mini-avatar" title="apEX">AX</div>
                                    <div class="mini-avatar" title="Magisk">MG</div>
                                    <div class="mini-avatar" title="flameZ">FL</div>
                                    <div class="mini-avatar" title="Spinx">SP</div>
                                    <div class="mini-avatar-more">+7</div>
                                </div>
                            </div>
                        </div>
                        <div class="team-footer">
                            <button class="btn-team-action">👁️ Voir</button>
                            <button class="btn-team-action">✏️ Éditer</button>
                            <button class="btn-team-action danger">🗑️</button>
                        </div>
                    </div>

                    <!-- Team Card 2 -->
                    <div class="team-card">
                        <div class="team-header-banner" style="background: linear-gradient(135deg, #0f1923, #2b4a66);">
                            <div class="team-logo">G2</div>
                        </div>
                        <div class="team-body">
                            <h3 class="team-name">G2 Esports</h3>
                            <p class="team-game">🎮 Multi-jeux</p>
                            
                            <div class="team-info-grid">
                                <div class="info-item">
                                    <span class="info-label">Manager</span>
                                    <span class="info-value">Carlos Rodriguez</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Budget</span>
                                    <span class="info-value highlight">18.2M €</span>
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

                            <div class="team-roster">
                                <p class="roster-label">Roster principal :</p>
                                <div class="roster-avatars">
                                    <div class="mini-avatar" title="Caps">CP</div>
                                    <div class="mini-avatar" title="NiKo">NK</div>
                                    <div class="mini-avatar" title="m0NESY">MN</div>
                                    <div class="mini-avatar" title="HooXi">HX</div>
                                    <div class="mini-avatar" title="huNter">HT</div>
                                    <div class="mini-avatar-more">+10</div>
                                </div>
                            </div>
                        </div>
                        <div class="team-footer">
                            <button class="btn-team-action">👁️ Voir</button>
                            <button class="btn-team-action">✏️ Éditer</button>
                            <button class="btn-team-action danger">🗑️</button>
                        </div>
                    </div>

                    <!-- Team Card 3 -->
                    <div class="team-card">
                        <div class="team-header-banner" style="background: linear-gradient(135deg, #1a1f4d, #4169e1);">
                            <div class="team-logo">KC</div>
                        </div>
                        <div class="team-body">
                            <h3 class="team-name">Karmine Corp</h3>
                            <p class="team-game">🎮 LoL & Valorant</p>
                            
                            <div class="team-info-grid">
                                <div class="info-item">
                                    <span class="info-label">Manager</span>
                                    <span class="info-value">Kameto</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Budget</span>
                                    <span class="info-value highlight">12.8M €</span>
                                </div>
                            </div>

                            <div class="team-stats">
                                <div class="stat-box">
                                    <span class="stat-number">10</span>
                                    <span class="stat-text">Joueurs</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">2</span>
                                    <span class="stat-text">Coachs</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">9</span>
                                    <span class="stat-text">Contrats</span>
                                </div>
                            </div>

                            <div class="team-roster">
                                <p class="roster-label">Roster principal :</p>
                                <div class="roster-avatars">
                                    <div class="mini-avatar" title="Rekkles">RK</div>
                                    <div class="mini-avatar" title="Caliste">CL</div>
                                    <div class="mini-avatar" title="113">113</div>
                                    <div class="mini-avatar" title="Targamas">TG</div>
                                    <div class="mini-avatar" title="SAKEN">SK</div>
                                    <div class="mini-avatar-more">+5</div>
                                </div>
                            </div>
                        </div>
                        <div class="team-footer">
                            <button class="btn-team-action">👁️ Voir</button>
                            <button class="btn-team-action">✏️ Éditer</button>
                            <button class="btn-team-action danger">🗑️</button>
                        </div>
                    </div>

                    <!-- Team Card 4 -->
                    <div class="team-card">
                        <div class="team-header-banner" style="background: linear-gradient(135deg, #1a1a1a, #ff4655);">
                            <div class="team-logo">SEN</div>
                        </div>
                        <div class="team-body">
                            <h3 class="team-name">Sentinels</h3>
                            <p class="team-game">🎮 Valorant</p>
                            
                            <div class="team-info-grid">
                                <div class="info-item">
                                    <span class="info-label">Manager</span>
                                    <span class="info-value">Rob Moore</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Budget</span>
                                    <span class="info-value highlight">9.5M €</span>
                                </div>
                            </div>

                            <div class="team-stats">
                                <div class="stat-box">
                                    <span class="stat-number">7</span>
                                    <span class="stat-text">Joueurs</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">2</span>
                                    <span class="stat-text">Coachs</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">6</span>
                                    <span class="stat-text">Contrats</span>
                                </div>
                            </div>

                            <div class="team-roster">
                                <p class="roster-label">Roster principal :</p>
                                <div class="roster-avatars">
                                    <div class="mini-avatar" title="TenZ">TZ</div>
                                    <div class="mini-avatar" title="Zekken">ZK</div>
                                    <div class="mini-avatar" title="Sacy">SC</div>
                                    <div class="mini-avatar" title="pANcada">PN</div>
                                    <div class="mini-avatar" title="johnqt">JQ</div>
                                    <div class="mini-avatar-more">+2</div>
                                </div>
                            </div>
                        </div>
                        <div class="team-footer">
                            <button class="btn-team-action">👁️ Voir</button>
                            <button class="btn-team-action">✏️ Éditer</button>
                            <button class="btn-team-action danger">🗑️</button>
                        </div>
                    </div>

                    <!-- Team Card 5 -->
                    <div class="team-card">
                        <div class="team-header-banner" style="background: linear-gradient(135deg, #000000, #ffcc00);">
                            <div class="team-logo">NaVi</div>
                        </div>
                        <div class="team-body">
                            <h3 class="team-name">Natus Vincere</h3>
                            <p class="team-game">🎮 CS2 & Dota 2</p>
                            
                            <div class="team-info-grid">
                                <div class="info-item">
                                    <span class="info-label">Manager</span>
                                    <span class="info-value">Andrey Gorodenskiy</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Budget</span>
                                    <span class="info-value highlight">14.3M €</span>
                                </div>
                            </div>

                            <div class="team-stats">
                                <div class="stat-box">
                                    <span class="stat-number">11</span>
                                    <span class="stat-text">Joueurs</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">3</span>
                                    <span class="stat-text">Coachs</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">10</span>
                                    <span class="stat-text">Contrats</span>
                                </div>
                            </div>

                            <div class="team-roster">
                                <p class="roster-label">Roster principal :</p>
                                <div class="roster-avatars">
                                    <div class="mini-avatar" title="s1mple">S1</div>
                                    <div class="mini-avatar" title="Aleksib">AL</div>
                                    <div class="mini-avatar" title="iM">IM</div>
                                    <div class="mini-avatar" title="jL">JL</div>
                                    <div class="mini-avatar" title="b1t">B1</div>
                                    <div class="mini-avatar-more">+6</div>
                                </div>
                            </div>
                        </div>
                        <div class="team-footer">
                            <button class="btn-team-action">👁️ Voir</button>
                            <button class="btn-team-action">✏️ Éditer</button>
                            <button class="btn-team-action danger">🗑️</button>
                        </div>
                    </div>

                    <!-- Team Card 6 -->
                    <div class="team-card">
                        <div class="team-header-banner" style="background: linear-gradient(135deg, #ff6200, #ff8533);">
                            <div class="team-logo">FNC</div>
                        </div>
                        <div class="team-body">
                            <h3 class="team-name">Fnatic</h3>
                            <p class="team-game">🎮 LoL & CS2</p>
                            
                            <div class="team-info-grid">
                                <div class="info-item">
                                    <span class="info-label">Manager</span>
                                    <span class="info-value">Sam Mathews</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Budget</span>
                                    <span class="info-value highlight">13.7M €</span>
                                </div>
                            </div>

                            <div class="team-stats">
                                <div class="stat-box">
                                    <span class="stat-number">13</span>
                                    <span class="stat-text">Joueurs</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">3</span>
                                    <span class="stat-text">Coachs</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">11</span>
                                    <span class="stat-text">Contrats</span>
                                </div>
                            </div>

                            <div class="team-roster">
                                <p class="roster-label">Roster principal :</p>
                                <div class="roster-avatars">
                                    <div class="mini-avatar" title="Razork">RZ</div>
                                    <div class="mini-avatar" title="Humanoid">HM</div>
                                    <div class="mini-avatar" title="KRIMZ">KR</div>
                                    <div class="mini-avatar" title="flusha">FL</div>
                                    <div class="mini-avatar" title="nicoodoz">NC</div>
                                    <div class="mini-avatar-more">+8</div>
                                </div>
                            </div>
                        </div>
                        <div class="team-footer">
                            <button class="btn-team-action">👁️ Voir</button>
                            <button class="btn-team-action">✏️ Éditer</button>
                            <button class="btn-team-action danger">🗑️</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joueurs - Apex Management</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="styles/players.css">
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
                <a href="players.php" class="nav-item active">
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
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="top-bar">
                <h2 class="page-title">Gestion des Joueurs</h2>
                <div class="header-actions">
                    <a href="forms/add-player.php" class="btn-primary">+ Ajouter Joueur</a>
                </div>
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
                    <div class="player-card-detailed">
                        <div class="player-card-header">
                            <div class="player-avatar-large">ZW</div>
                            <div class="player-flag-large">🇫🇷</div>
                            <span class="player-status-dot active"></span>
                        </div>
                        <div class="player-card-body">
                            <h3 class="player-name-large">ZywOo</h3>
                            <p class="player-email">zywoo@vitality.gg</p>
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
                                    <span class="stat-value-small highlight">2.5M €</span>
                                </div>
                            </div>
                        </div>
                        <div class="player-card-footer">
                            <button class="btn-icon-small">👁️</button>
                            <button class="btn-icon-small">✏️</button>
                            <button class="btn-icon-small danger">🗑️</button>
                        </div>
                    </div>

                    <div class="player-card-detailed">
                        <div class="player-card-header">
                            <div class="player-avatar-large">CP</div>
                            <div class="player-flag-large">🇩🇰</div>
                            <span class="player-status-dot active"></span>
                        </div>
                        <div class="player-card-body">
                            <h3 class="player-name-large">Caps</h3>
                            <p class="player-email">caps@g2esports.com</p>
                            <div class="player-tags">
                                <span class="tag">Mid</span>
                                <span class="tag">LoL</span>
                            </div>
                            <div class="player-stats-row">
                                <div class="stat-item">
                                    <span class="stat-label">Équipe</span>
                                    <span class="stat-value-small">G2 Esports</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Valeur</span>
                                    <span class="stat-value-small highlight">2.2M €</span>
                                </div>
                            </div>
                        </div>
                        <div class="player-card-footer">
                            <button class="btn-icon-small">👁️</button>
                            <button class="btn-icon-small">✏️</button>
                            <button class="btn-icon-small danger">🗑️</button>
                        </div>
                    </div>

                    <div class="player-card-detailed">
                        <div class="player-card-header">
                            <div class="player-avatar-large">TZ</div>
                            <div class="player-flag-large">🇨🇦</div>
                            <span class="player-status-dot active"></span>
                        </div>
                        <div class="player-card-body">
                            <h3 class="player-name-large">TenZ</h3>
                            <p class="player-email">tenz@sentinels.gg</p>
                            <div class="player-tags">
                                <span class="tag">Duelist</span>
                                <span class="tag">Valorant</span>
                            </div>
                            <div class="player-stats-row">
                                <div class="stat-item">
                                    <span class="stat-label">Équipe</span>
                                    <span class="stat-value-small">Sentinels</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Valeur</span>
                                    <span class="stat-value-small highlight">1.8M €</span>
                                </div>
                            </div>
                        </div>
                        <div class="player-card-footer">
                            <button class="btn-icon-small">👁️</button>
                            <button class="btn-icon-small">✏️</button>
                            <button class="btn-icon-small danger">🗑️</button>
                        </div>
                    </div>

                    <div class="player-card-detailed">
                        <div class="player-card-header">
                            <div class="player-avatar-large">RK</div>
                            <div class="player-flag-large">🇸🇪</div>
                            <span class="player-status-dot active"></span>
                        </div>
                        <div class="player-card-body">
                            <h3 class="player-name-large">Rekkles</h3>
                            <p class="player-email">rekkles@karminecorp.fr</p>
                            <div class="player-tags">
                                <span class="tag">ADC</span>
                                <span class="tag">LoL</span>
                            </div>
                            <div class="player-stats-row">
                                <div class="stat-item">
                                    <span class="stat-label">Équipe</span>
                                    <span class="stat-value-small">Karmine Corp</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Valeur</span>
                                    <span class="stat-value-small highlight">1.6M €</span>
                                </div>
                            </div>
                        </div>
                        <div class="player-card-footer">
                            <button class="btn-icon-small">👁️</button>
                            <button class="btn-icon-small">✏️</button>
                            <button class="btn-icon-small danger">🗑️</button>
                        </div>
                    </div>

                    <div class="player-card-detailed">
                        <div class="player-card-header">
                            <div class="player-avatar-large">S1</div>
                            <div class="player-flag-large">🇺🇦</div>
                            <span class="player-status-dot active"></span>
                        </div>
                        <div class="player-card-body">
                            <h3 class="player-name-large">s1mple</h3>
                            <p class="player-email">s1mple@navi.gg</p>
                            <div class="player-tags">
                                <span class="tag">AWP</span>
                                <span class="tag">CS2</span>
                            </div>
                            <div class="player-stats-row">
                                <div class="stat-item">
                                    <span class="stat-label">Équipe</span>
                                    <span class="stat-value-small">Natus Vincere</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Valeur</span>
                                    <span class="stat-value-small highlight">2.3M €</span>
                                </div>
                            </div>
                        </div>
                        <div class="player-card-footer">
                            <button class="btn-icon-small">👁️</button>
                            <button class="btn-icon-small">✏️</button>
                            <button class="btn-icon-small danger">🗑️</button>
                        </div>
                    </div>

                    <div class="player-card-detailed">
                        <div class="player-card-header">
                            <div class="player-avatar-large">FK</div>
                            <div class="player-flag-large">🇧🇷</div>
                            <span class="player-status-dot inactive"></span>
                        </div>
                        <div class="player-card-body">
                            <h3 class="player-name-large">FalleN</h3>
                            <p class="player-email">fallen@imperial.gg</p>
                            <div class="player-tags">
                                <span class="tag">IGL</span>
                                <span class="tag">CS2</span>
                            </div>
                            <div class="player-stats-row">
                                <div class="stat-item">
                                    <span class="stat-label">Équipe</span>
                                    <span class="stat-value-small">Imperial</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Valeur</span>
                                    <span class="stat-value-small highlight">950K €</span>
                                </div>
                            </div>
                        </div>
                        <div class="player-card-footer">
                            <button class="btn-icon-small">👁️</button>
                            <button class="btn-icon-small">✏️</button>
                            <button class="btn-icon-small danger">🗑️</button>
                        </div>
                    </div>

                    <div class="player-card-detailed">
                        <div class="player-card-header">
                            <div class="player-avatar-large">FK</div>
                            <div class="player-flag-large">🇰🇷</div>
                            <span class="player-status-dot active"></span>
                        </div>
                        <div class="player-card-body">
                            <h3 class="player-name-large">Faker</h3>
                            <p class="player-email">faker@t1.gg</p>
                            <div class="player-tags">
                                <span class="tag">Mid</span>
                                <span class="tag">LoL</span>
                            </div>
                            <div class="player-stats-row">
                                <div class="stat-item">
                                    <span class="stat-label">Équipe</span>
                                    <span class="stat-value-small">T1</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Valeur</span>
                                    <span class="stat-value-small highlight">3.0M €</span>
                                </div>
                            </div>
                        </div>
                        <div class="player-card-footer">
                            <button class="btn-icon-small">👁️</button>
                            <button class="btn-icon-small">✏️</button>
                            <button class="btn-icon-small danger">🗑️</button>
                        </div>
                    </div>

                    <div class="player-card-detailed">
                        <div class="player-card-header">
                            <div class="player-avatar-large">MX</div>
                            <div class="player-flag-large">🇪🇸</div>
                            <span class="player-status-dot active"></span>
                        </div>
                        <div class="player-card-body">
                            <h3 class="player-name-large">Mixwell</h3>
                            <p class="player-email">mixwell@g2.gg</p>
                            <div class="player-tags">
                                <span class="tag">Rifler</span>
                                <span class="tag">Valorant</span>
                            </div>
                            <div class="player-stats-row">
                                <div class="stat-item">
                                    <span class="stat-label">Équipe</span>
                                    <span class="stat-value-small">G2 Esports</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Valeur</span>
                                    <span class="stat-value-small highlight">750K €</span>
                                </div>
                            </div>
                        </div>
                        <div class="player-card-footer">
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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrats - Apex Management</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="styles/contracts.css">
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
                <a href="teams.php" class="nav-item">
                    <span class="icon">🏆</span>
                    <span>Équipes</span>
                </a>
                <a href="contracts.php" class="nav-item active">
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
                <h2 class="page-title">Gestion des Contrats</h2>
                <div class="header-actions">
                    <a href="forms/add-contract.php" class="btn-primary">+ Nouveau Contrat</a>
                </div>
            </header>

            <div class="content-wrapper">
                <!-- Stats Overview -->
                <div class="contract-stats-grid">
                    <div class="contract-stat-card">
                        <div class="stat-icon-contract active">✓</div>
                        <div>
                            <p class="stat-label">Actifs</p>
                            <h3 class="stat-value">186</h3>
                        </div>
                    </div>
                    <div class="contract-stat-card">
                        <div class="stat-icon-contract expiring">⏰</div>
                        <div>
                            <p class="stat-label">Expire < 6 mois</p>
                            <h3 class="stat-value">32</h3>
                        </div>
                    </div>
                    <div class="contract-stat-card">
                        <div class="stat-icon-contract expired">✕</div>
                        <div>
                            <p class="stat-label">Expirés</p>
                            <h3 class="stat-value">48</h3>
                        </div>
                    </div>
                    <div class="contract-stat-card">
                        <div class="stat-icon-contract total">💰</div>
                        <div>
                            <p class="stat-label">Salaires Mensuels</p>
                            <h3 class="stat-value">2.4M €</h3>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="contract-filters">
                    <button class="filter-btn active">Tous</button>
                    <button class="filter-btn">Actifs</button>
                    <button class="filter-btn">Expire < 6 mois</button>
                    <button class="filter-btn">Expirés</button>
                    <select class="filter-select">
                        <option value="">Toutes les équipes</option>
                        <option value="vitality">Vitality</option>
                        <option value="g2">G2 Esports</option>
                        <option value="kc">Karmine Corp</option>
                    </select>
                </div>

                <!-- Contracts List -->
                <div class="contracts-list">
                    <!-- Contract Card 1 -->
                    <div class="contract-card">
                        <div class="contract-header">
                            <div class="contract-id">
                                <span class="id-label">ID</span>
                                <span class="id-value">CTR-2025-1842</span>
                            </div>
                            <span class="status-badge active">Actif</span>
                        </div>

                        <div class="contract-body">
                            <div class="contract-section member-section">
                                <div class="section-icon">👤</div>
                                <div class="section-content">
                                    <p class="section-label">Membre</p>
                                    <div class="member-info">
                                        <div class="member-avatar">ZW</div>
                                        <div>
                                            <h4 class="member-name">ZywOo</h4>
                                            <p class="member-role">Joueur - AWP</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section team-section">
                                <div class="section-icon">🏆</div>
                                <div class="section-content">
                                    <p class="section-label">Équipe</p>
                                    <div class="team-badge-large">
                                        <span class="team-logo-small">VIT</span>
                                        <span class="team-name-small">Team Vitality</span>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section financial-section">
                                <div class="financial-grid">
                                    <div class="financial-item">
                                        <span class="financial-label">💰 Salaire mensuel</span>
                                        <span class="financial-value">35,000 €</span>
                                    </div>
                                    <div class="financial-item">
                                        <span class="financial-label">💎 Clause de rachat</span>
                                        <span class="financial-value">2.5M €</span>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section dates-section">
                                <div class="dates-grid">
                                    <div class="date-item">
                                        <span class="date-label">📅 Début</span>
                                        <span class="date-value">01/01/2024</span>
                                    </div>
                                    <div class="date-item">
                                        <span class="date-label">📅 Fin</span>
                                        <span class="date-value expiring">31/12/2025</span>
                                    </div>
                                    <div class="date-item">
                                        <span class="date-label">⏱️ Durée restante</span>
                                        <span class="date-value highlight">12 mois</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contract-footer">
                            <button class="btn-contract-action">📄 Voir PDF</button>
                            <button class="btn-contract-action">✏️ Modifier</button>
                            <button class="btn-contract-action">🔄 Renouveler</button>
                            <button class="btn-contract-action danger">❌ Résilier</button>
                        </div>
                    </div>

                    <!-- Contract Card 2 -->
                    <div class="contract-card">
                        <div class="contract-header">
                            <div class="contract-id">
                                <span class="id-label">ID</span>
                                <span class="id-value">CTR-2025-1841</span>
                            </div>
                            <span class="status-badge warning">Expire bientôt</span>
                        </div>

                        <div class="contract-body">
                            <div class="contract-section member-section">
                                <div class="section-icon">👔</div>
                                <div class="section-content">
                                    <p class="section-label">Membre</p>
                                    <div class="member-info">
                                        <div class="member-avatar">DP</div>
                                        <div>
                                            <h4 class="member-name">Devilwalk</h4>
                                            <p class="member-role">Coach - CS2</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section team-section">
                                <div class="section-icon">🏆</div>
                                <div class="section-content">
                                    <p class="section-label">Équipe</p>
                                    <div class="team-badge-large">
                                        <span class="team-logo-small">G2</span>
                                        <span class="team-name-small">G2 Esports</span>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section financial-section">
                                <div class="financial-grid">
                                    <div class="financial-item">
                                        <span class="financial-label">💰 Salaire mensuel</span>
                                        <span class="financial-value">18,000 €</span>
                                    </div>
                                    <div class="financial-item">
                                        <span class="financial-label">💎 Clause de rachat</span>
                                        <span class="financial-value">—</span>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section dates-section">
                                <div class="dates-grid">
                                    <div class="date-item">
                                        <span class="date-label">📅 Début</span>
                                        <span class="date-value">15/03/2024</span>
                                    </div>
                                    <div class="date-item">
                                        <span class="date-label">📅 Fin</span>
                                        <span class="date-value warning">28/02/2025</span>
                                    </div>
                                    <div class="date-item">
                                        <span class="date-label">⏱️ Durée restante</span>
                                        <span class="date-value warning">2 mois</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contract-footer">
                            <button class="btn-contract-action">📄 Voir PDF</button>
                            <button class="btn-contract-action">✏️ Modifier</button>
                            <button class="btn-contract-action primary">🔄 Renouveler</button>
                            <button class="btn-contract-action danger">❌ Résilier</button>
                        </div>
                    </div>

                    <!-- Contract Card 3 -->
                    <div class="contract-card">
                        <div class="contract-header">
                            <div class="contract-id">
                                <span class="id-label">ID</span>
                                <span class="id-value">CTR-2024-1654</span>
                            </div>
                            <span class="status-badge expired">Expiré</span>
                        </div>

                        <div class="contract-body">
                            <div class="contract-section member-section">
                                <div class="section-icon">👤</div>
                                <div class="section-content">
                                    <p class="section-label">Membre</p>
                                    <div class="member-info">
                                        <div class="member-avatar">CP</div>
                                        <div>
                                            <h4 class="member-name">Caps</h4>
                                            <p class="member-role">Joueur - Mid</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section team-section">
                                <div class="section-icon">🏆</div>
                                <div class="section-content">
                                    <p class="section-label">Équipe</p>
                                    <div class="team-badge-large">
                                        <span class="team-logo-small">G2</span>
                                        <span class="team-name-small">G2 Esports</span>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section financial-section">
                                <div class="financial-grid">
                                    <div class="financial-item">
                                        <span class="financial-label">💰 Salaire mensuel</span>
                                        <span class="financial-value">42,000 €</span>
                                    </div>
                                    <div class="financial-item">
                                        <span class="financial-label">💎 Clause de rachat</span>
                                        <span class="financial-value">2.2M €</span>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section dates-section">
                                <div class="dates-grid">
                                    <div class="date-item">
                                        <span class="date-label">📅 Début</span>
                                        <span class="date-value">01/06/2023</span>
                                    </div>
                                    <div class="date-item">
                                        <span class="date-label">📅 Fin</span>
                                        <span class="date-value expired">31/05/2024</span>
                                    </div>
                                    <div class="date-item">
                                        <span class="date-label">⏱️ Durée restante</span>
                                        <span class="date-value expired">Terminé</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contract-footer">
                            <button class="btn-contract-action">📄 Voir PDF</button>
                            <button class="btn-contract-action disabled" disabled>✏️ Modifier</button>
                            <button class="btn-contract-action">🔄 Renouveler</button>
                            <button class="btn-contract-action">🗄️ Archiver</button>
                        </div>
                    </div>

                    <!-- Contract Card 4 -->
                    <div class="contract-card">
                        <div class="contract-header">
                            <div class="contract-id">
                                <span class="id-label">ID</span>
                                <span class="id-value">CTR-2025-1755</span>
                            </div>
                            <span class="status-badge active">Actif</span>
                        </div>

                        <div class="contract-body">
                            <div class="contract-section member-section">
                                <div class="section-icon">👤</div>
                                <div class="section-content">
                                    <p class="section-label">Membre</p>
                                    <div class="member-info">
                                        <div class="member-avatar">TZ</div>
                                        <div>
                                            <h4 class="member-name">TenZ</h4>
                                            <p class="member-role">Joueur - Duelist</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section team-section">
                                <div class="section-icon">🏆</div>
                                <div class="section-content">
                                    <p class="section-label">Équipe</p>
                                    <div class="team-badge-large">
                                        <span class="team-logo-small">SEN</span>
                                        <span class="team-name-small">Sentinels</span>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section financial-section">
                                <div class="financial-grid">
                                    <div class="financial-item">
                                        <span class="financial-label">💰 Salaire mensuel</span>
                                        <span class="financial-value">38,000 €</span>
                                    </div>
                                    <div class="financial-item">
                                        <span class="financial-label">💎 Clause de rachat</span>
                                        <span class="financial-value">1.8M €</span>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section dates-section">
                                <div class="dates-grid">
                                    <div class="date-item">
                                        <span class="date-label">📅 Début</span>
                                        <span class="date-value">10/02/2024</span>
                                    </div>
                                    <div class="date-item">
                                        <span class="date-label">📅 Fin</span>
                                        <span class="date-value">10/02/2027</span>
                                    </div>
                                    <div class="date-item">
                                        <span class="date-label">⏱️ Durée restante</span>
                                        <span class="date-value highlight">26 mois</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contract-footer">
                            <button class="btn-contract-action">📄 Voir PDF</button>
                            <button class="btn-contract-action">✏️ Modifier</button>
                            <button class="btn-contract-action">🔄 Renouveler</button>
                            <button class="btn-contract-action danger">❌ Résilier</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
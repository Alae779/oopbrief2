<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferts - Apex Management</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="styles/transfers.css">
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
                <a href="contracts.php" class="nav-item">
                    <span class="icon">📝</span>
                    <span>Contrats</span>
                </a>
                <a href="transfers.php" class="nav-item active">
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
                <h2 class="page-title">Gestion des Transferts</h2>
                <div class="header-actions">
                    <a href="forms/add-transfer.php" class="btn-primary">+ Nouveau Transfert</a>
                </div>
            </header>

            <div class="content-wrapper">
                <!-- Stats Overview -->
                <div class="transfer-stats-grid">
                    <div class="transfer-stat-card">
                        <div class="stat-icon-transfer completed">✓</div>
                        <div>
                            <p class="stat-label">Complétés</p>
                            <h3 class="stat-value">142</h3>
                        </div>
                    </div>
                    <div class="transfer-stat-card">
                        <div class="stat-icon-transfer pending">⏳</div>
                        <div>
                            <p class="stat-label">En Cours</p>
                            <h3 class="stat-value">28</h3>
                        </div>
                    </div>
                    <div class="transfer-stat-card">
                        <div class="stat-icon-transfer cancelled">✕</div>
                        <div>
                            <p class="stat-label">Annulés</p>
                            <h3 class="stat-value">15</h3>
                        </div>
                    </div>
                    <div class="transfer-stat-card">
                        <div class="stat-icon-transfer total">💰</div>
                        <div>
                            <p class="stat-label">Volume Total</p>
                            <h3 class="stat-value">42.5M €</h3>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="transfers-filters">
                    <button class="filter-btn active">Tous</button>
                    <button class="filter-btn">Complétés</button>
                    <button class="filter-btn">En Cours</button>
                    <button class="filter-btn">Annulés</button>
                </div>

                <!-- Transfers Timeline -->
                <div class="transfers-timeline">
                    <div class="timeline-item">
                        <div class="timeline-date">31 DÉC 2025</div>
                        <div class="timeline-content">
                            <div class="transfer-card-full">
                                <div class="transfer-header-full">
                                    <div class="transfer-code">TR-2025-1542</div>
                                    <span class="status-badge completed">Complété</span>
                                </div>
                                <div class="transfer-body-full">
                                    <div class="transfer-player-info">
                                        <div class="player-avatar-medium">ZW</div>
                                        <div>
                                            <h4>ZywOo</h4>
                                            <p class="player-role-transfer">AWP - CS2</p>
                                        </div>
                                    </div>
                                    <div class="transfer-flow">
                                        <div class="team-box departure">
                                            <span class="team-label">DÉPART</span>
                                            <span class="team-name">G2 Esports</span>
                                        </div>
                                        <div class="transfer-arrow-large">→</div>
                                        <div class="team-box arrival">
                                            <span class="team-label">ARRIVÉE</span>
                                            <span class="team-name">Vitality</span>
                                        </div>
                                    </div>
                                    <div class="transfer-amount-box">
                                        <span class="amount-label">MONTANT</span>
                                        <span class="amount-value">2.5M €</span>
                                    </div>
                                </div>
                                <div class="transfer-footer-full">
                                    <button class="btn-secondary-small">📄 Détails</button>
                                    <button class="btn-secondary-small">📥 Export PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-date">28 DÉC 2025</div>
                        <div class="timeline-content">
                            <div class="transfer-card-full">
                                <div class="transfer-header-full">
                                    <div class="transfer-code">TR-2025-1541</div>
                                    <span class="status-badge pending">En cours</span>
                                </div>
                                <div class="transfer-body-full">
                                    <div class="transfer-player-info">
                                        <div class="player-avatar-medium">FZ</div>
                                        <div>
                                            <h4>Freeze</h4>
                                            <p class="player-role-transfer">Mid - LoL</p>
                                        </div>
                                    </div>
                                    <div class="transfer-flow">
                                        <div class="team-box departure">
                                            <span class="team-label">DÉPART</span>
                                            <span class="team-name">Karmine Corp</span>
                                        </div>
                                        <div class="transfer-arrow-large">→</div>
                                        <div class="team-box arrival">
                                            <span class="team-label">ARRIVÉE</span>
                                            <span class="team-name">Fnatic</span>
                                        </div>
                                    </div>
                                    <div class="transfer-amount-box">
                                        <span class="amount-label">MONTANT</span>
                                        <span class="amount-value">1.2M €</span>
                                    </div>
                                </div>
                                <div class="transfer-footer-full">
                                    <button class="btn-secondary-small">📄 Détails</button>
                                    <button class="btn-primary-small">✓ Valider</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-date">25 DÉC 2025</div>
                        <div class="timeline-content">
                            <div class="transfer-card-full">
                                <div class="transfer-header-full">
                                    <div class="transfer-code">TR-2025-1540</div>
                                    <span class="status-badge completed">Complété</span>
                                </div>
                                <div class="transfer-body-full">
                                    <div class="transfer-player-info">
                                        <div class="player-avatar-medium">MX</div>
                                        <div>
                                            <h4>Mixwell</h4>
                                            <p class="player-role-transfer">Rifler - Valorant</p>
                                        </div>
                                    </div>
                                    <div class="transfer-flow">
                                        <div class="team-box departure">
                                            <span class="team-label">DÉPART</span>
                                            <span class="team-name">Heretics</span>
                                        </div>
                                        <div class="transfer-arrow-large">→</div>
                                        <div class="team-box arrival">
                                            <span class="team-label">ARRIVÉE</span>
                                            <span class="team-name">G2 Esports</span>
                                        </div>
                                    </div>
                                    <div class="transfer-amount-box">
                                        <span class="amount-label">MONTANT</span>
                                        <span class="amount-value">650K €</span>
                                    </div>
                                </div>
                                <div class="transfer-footer-full">
                                    <button class="btn-secondary-small">📄 Détails</button>
                                    <button class="btn-secondary-small">📥 Export PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-date">20 DÉC 2025</div>
                        <div class="timeline-content">
                            <div class="transfer-card-full">
                                <div class="transfer-header-full">
                                    <div class="transfer-code">TR-2025-1539</div>
                                    <span class="status-badge cancelled">Annulé</span>
                                </div>
                                <div class="transfer-body-full">
                                    <div class="transfer-player-info">
                                        <div class="player-avatar-medium">CP</div>
                                        <div>
                                            <h4>Caps</h4>
                                            <p class="player-role-transfer">Mid - LoL</p>
                                        </div>
                                    </div>
                                    <div class="transfer-flow">
                                        <div class="team-box departure">
                                            <span class="team-label">DÉPART</span>
                                            <span class="team-name">G2 Esports</span>
                                        </div>
                                        <div class="transfer-arrow-large">→</div>
                                        <div class="team-box arrival">
                                            <span class="team-label">ARRIVÉE</span>
                                            <span class="team-name">T1</span>
                                        </div>
                                    </div>
                                    <div class="transfer-amount-box">
                                        <span class="amount-label">MONTANT</span>
                                        <span class="amount-value">1.8M €</span>
                                    </div>
                                </div>
                                <div class="transfer-footer-full">
                                    <button class="btn-secondary-small">📄 Détails</button>
                                    <button class="btn-secondary-small">🗑️ Archiver</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-date">15 DÉC 2025</div>
                        <div class="timeline-content">
                            <div class="transfer-card-full">
                                <div class="transfer-header-full">
                                    <div class="transfer-code">TR-2025-1538</div>
                                    <span class="status-badge completed">Complété</span>
                                </div>
                                <div class="transfer-body-full">
                                    <div class="transfer-player-info">
                                        <div class="player-avatar-medium">S1</div>
                                        <div>
                                            <h4>s1mple</h4>
                                            <p class="player-role-transfer">AWP - CS2</p>
                                        </div>
                                    </div>
                                    <div class="transfer-flow">
                                        <div class="team-box departure">
                                            <span class="team-label">DÉPART</span>
                                            <span class="team-name">Falcons</span>
                                        </div>
                                        <div class="transfer-arrow-large">→</div>
                                        <div class="team-box arrival">
                                            <span class="team-label">ARRIVÉE</span>
                                            <span class="team-name">Natus Vincere</span>
                                        </div>
                                    </div>
                                    <div class="transfer-amount-box">
                                        <span class="amount-label">MONTANT</span>
                                        <span class="amount-value">2.3M €</span>
                                    </div>
                                </div>
                                <div class="transfer-footer-full">
                                    <button class="btn-secondary-small">📄 Détails</button>
                                    <button class="btn-secondary-small">📥 Export PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<?php
require_once "../contrat.php";
require_once "../formater.php";
session_start();
$playercontractslist = Contrat::getAll();
$coachcontractslist = Contrat::getAlll();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrats - Apex Management</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="../styles/contracts.css">
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
                <a href="teamss.php" class="nav-item">
                    <span class="icon">🏆</span>
                    <span>Équipes</span>
                </a>
                <a href="contractt.php" class="nav-item active">
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
                <h2 class="page-title">Gestion des Contrats</h2>
            </header>

            <div class="content-wrapper">
                <!-- Stats Overview -->
                <!-- <div class="contract-stats-grid">
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
                </div> -->

                <!-- Contracts List -->
                <div class="contracts-list">
                    <?php foreach($playercontractslist as $c) { ?>
                    <!-- Contract Card 1 -->
                    <div class="contract-card">
                        <div class="contract-header">
                            <div class="contract-id">
                                <span class="id-label">ID</span>
                                <span class="id-value"><?= $c['id'] ?></span>
                            </div>
                        </div>

                        <div class="contract-body">
                            <div class="contract-section member-section">
                                <div class="section-icon">👤</div>
                                <div class="section-content">
                                    <p class="section-label">Joueur</p>
                                    <div class="member-info">
                                        <div>
                                            <h4 class="member-name"><?= $c['joueur_name'] ?></h4>
                                            <p class="member-role"><?= $c['role'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section team-section">
                                <div class="section-icon">🏆</div>
                                <div class="section-content">
                                    <p class="section-label">Équipe</p>
                                    <div class="team-badge-large">
                                        <span class="team-name-small"><?= $c['equipe_name'] ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section financial-section">
                                <div class="financial-grid">
                                    <div class="financial-item">
                                        <span class="financial-label">💰 Salaire</span>
                                        <span class="financial-value"><?= Formater::currency($c['salaire']) ?></span>
                                    </div>
                                    <div class="financial-item">
                                        <span class="financial-label">💎 Clause de rachat</span>
                                        <span class="financial-value"><?= Formater::currency($c['clause_rachat']) ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section dates-section">
                                <div class="dates-grid">
                                    <div class="date-item">
                                        <span class="date-label">📅 Fin</span>
                                        <span class="date-value expiring"><?= $c['date_fin'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="contract-footer">
                            <button class="btn-contract-action">📄 Voir PDF</button>
                            <button class="btn-contract-action">✏️ Modifier</button>
                            <button class="btn-contract-action">🔄 Renouveler</button>
                            <button class="btn-contract-action danger">❌ Résilier</button>
                        </div> -->
                    </div>
                    <?php } ?>

                    <!-- Contract Card 2 -->
                     <?php foreach($coachcontractslist as $co) { ?>
                    <div class="contract-card">
                        <div class="contract-header">
                            <div class="contract-id">
                                <span class="id-label">ID</span>
                                <span class="id-value"><?= $co['id'] ?></span>
                            </div>
                        </div>

                        <div class="contract-body">
                            <div class="contract-section member-section">
                                <div class="section-icon">👔</div>
                                <div class="section-content">
                                    <p class="section-label">Coach</p>
                                    <div class="member-info">
                                        <div>
                                            <h4 class="member-name"><?= $co['coach_name'] ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section team-section">
                                <div class="section-icon">🏆</div>
                                <div class="section-content">
                                    <p class="section-label">Équipe</p>
                                    <div class="team-badge-large">
                                        <span class="team-name-small"><?= $co['equipe_name'] ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section financial-section">
                                <div class="financial-grid">
                                    <div class="financial-item">
                                        <span class="financial-label">💰 Salaire</span>
                                        <span class="financial-value"><?= Formater::currency($co['salaire']) ?></span>
                                    </div>
                                    <div class="financial-item">
                                        <span class="financial-label">💎 Clause de rachat</span>
                                        <span class="financial-value"><?= Formater::currency($co['clause_rachat']) ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="contract-section dates-section">
                                <div class="dates-grid">
                                    <div class="date-item">
                                        <span class="date-label">📅 Fin</span>
                                        <span class="date-value warning"><?= $co['date_fin'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="contract-footer">
                            <button class="btn-contract-action">📄 Voir PDF</button>
                            <button class="btn-contract-action">✏️ Modifier</button>
                            <button class="btn-contract-action primary">🔄 Renouveler</button>
                            <button class="btn-contract-action danger">❌ Résilier</button>
                        </div> -->
                    </div>
                    <?php } ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<?php
require_once "../connection.php";
require_once "../transfer.php";
require_once "../coach.php";
require_once "../joueur.php";
require_once "../contrat.php";
require_once "../formater.php";
session_start();
$listtransfer = Transfer::getThree();
$listcoachtransfer = Transfer::getThreee();
$playerslist = Joueur::getFour();
$playercount = Joueur::getCount();
$coachcount = Coach::getCount();
$teamcount = Equipe::getCount();
$transfercount = Transfer::getCount();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apex Management - Dashboard</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
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
                <a href="indexxx.php" class="nav-item active">
                    <span class="icon">📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="playersss.php" class="nav-item">
                    <span class="icon">🎮</span>
                    <span>Joueurs</span>
                </a>
                <a href="coachesss.php" class="nav-item">
                    <span class="icon">👔</span>
                    <span>Coachs</span>
                </a>
                <a href="teamsss.php" class="nav-item">
                    <span class="icon">🏆</span>
                    <span>Équipes</span>
                </a>
                <a href="contrattt.php" class="nav-item">
                    <span class="icon">📝</span>
                    <span>Contrats</span>
                </a>
                <a href="transferrr.php" class="nav-item">
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
                            <h3 class="stat-value"><?= $playercount['total'] ?></h3>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">👔</div>
                        <div class="stat-info">
                            <p class="stat-label">Coachs</p>
                            <h3 class="stat-value"><?= $coachcount['total'] ?></h3>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">🏆</div>
                        <div class="stat-info">
                            <p class="stat-label">Équipes</p>
                            <h3 class="stat-value"><?= $teamcount['total'] ?></h3>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">💸</div>
                        <div class="stat-info">
                            <p class="stat-label">Transferts</p>
                            <h3 class="stat-value"><?= $transfercount['total'] ?></h3>
                        </div>
                    </div>
                </div>

                <!-- Recent Transfers -->
                <div class="section-card">
                    <div class="section-header">
                        <h3>Derniers Joueurs Transferts</h3>
                        <a href="transfers.php" class="btn-link">Voir tout →</a>
                    </div>
                    <div class="transfers-list">
                        <?php foreach($listtransfer as $transfer) { ?>
                        <div class="transfer-item">
                            <div class="transfer-player">
                                <div>
                                    <p class="player-name"><?= $transfer['joueur'] ?></p>
                                    <p class="player-role">AWP - CS2</p>
                                </div>
                            </div>
                            <div class="transfer-route">
                                <span class="team-badge"><?= $transfer['equipe_depart'] ?></span>
                                <span class="arrow">→</span>
                                <span class="team-badge"><?= $transfer['equipe_arrivee'] ?></span>
                            </div>
                            <div class="transfer-amount"><?= Formater::currency($transfer['montant']) ?></div>
                            <?php
                            $status_class = '';
                            if(strtolower($transfer['statut']) === 'completed') {
                                    $status_class = 'completed';
                                    } elseif(strtolower($transfer['statut']) === 'in progress') {
                                        $status_class = 'pending';
                                    } elseif(strtolower($transfer['statut']) === 'canceled') {
                                        $status_class = 'cancelled';
                            }
                            ?>
                            <span class="status-badge <?= $status_class ?>"><?= $transfer['statut'] ?></span>
                        </div>
                        <?php } ?>
                    </div>
                </div>




                <div class="section-card">
                    <div class="section-header">
                        <h3>Derniers Coachs Transferts</h3>
                        <a href="transfers.php" class="btn-link">Voir tout →</a>
                    </div>
                    <div class="transfers-list">
                        <?php foreach($listcoachtransfer as $transfer) { ?>
                        <div class="transfer-item">
                            <div class="transfer-player">
                                <div>
                                    <p class="player-name"><?= $transfer['coach'] ?></p>
                                </div>
                            </div>
                            <div class="transfer-route">
                                <span class="team-badge"><?= $transfer['equipe_depart'] ?></span>
                                <span class="arrow">→</span>
                                <span class="team-badge"><?= $transfer['equipe_arrivee'] ?></span>
                            </div>
                            <?php
                            $status_class = '';
                            if(strtolower($transfer['statut']) === 'completed') {
                                    $status_class = 'completed';
                                    } elseif(strtolower($transfer['statut']) === 'in progress') {
                                        $status_class = 'pending';
                                    } elseif(strtolower($transfer['statut']) === 'canceled') {
                                        $status_class = 'cancelled';
                            }
                            ?>
                            <span class="status-badge <?= $status_class ?>"><?= $transfer['statut'] ?></span>
                        </div>
                        <?php } ?>
                    </div>
                </div>



                <!-- Top Players by Value -->
                <div class="section-card">
                    <div class="section-header">
                        <h3>Top Joueurs - Valeur Marchande</h3>
                        <a href="players.php" class="btn-link">Voir tout →</a>
                    </div>
                    <div class="players-grid">
                        <?php foreach($playerslist as $player) { ?>
                        <div class="player-card">
                            <div class="player-header">
                                <div class="player-avatar large">PL</div>
                            </div>
                            <h4 class="player-name"><?= $player['playername'] ?></h4>
                            <p class="player-team"><?= $player['teamname'] ?></p>
                            <div class="player-value"><?= Formater::currency($player['valeur_marchande']) ?></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
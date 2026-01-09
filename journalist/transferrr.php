<?php

session_start();
require_once "../connection.php";
require_once "../transfer.php";
require_once "../contrat.php";
require_once "../formater.php";

$listtransfer = Transfer::getAll();
$listcoachtransfer = Transfer::getAlll();



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferts - Apex Management</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="../styles/transfers.css">
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
                <a href="indexxx.php" class="nav-item">
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
                <a href="transferrr.php" class="nav-item active">
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
                <h2 class="page-title">Gestion des Transferts</h2>
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

                <!-- Transfers Timeline -->
                <div class="transfers-timeline">
                    <?php foreach($listtransfer as $transfer) { ?>
                    <div class="timeline-item">
                        <div class="timeline-date">31 DÉC 2025</div>
                        <div class="timeline-content">
                            <div class="transfer-card-full">
                                <div class="transfer-header-full">
                                    <div class="transfer-code">JOUEUR</div>
                                    <?php
                                        // Calculer la classe CSS selon le statut
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
                                <div class="transfer-body-full">
                                    <div class="transfer-player-info">
                                        <div class="player-avatar-medium">ZW</div>
                                        <div>
                                            <h4><?= $transfer['joueur'] ?></h4>
                                        </div>
                                    </div>
                                    <div class="transfer-flow">
                                        <div class="team-box departure">
                                            <span class="team-label">DÉPART</span>
                                            <span class="team-name"><?= $transfer['equipe_depart'] ?></span>
                                        </div>
                                        <div class="transfer-arrow-large">→</div>
                                        <div class="team-box arrival">
                                            <span class="team-label">ARRIVÉE</span>
                                            <span class="team-name"><?= $transfer['equipe_arrivee'] ?></span>
                                        </div>
                                    </div>
                                    <div class="transfer-amount-box">
                                        <span class="amount-label">MONTANT</span>
                                        <span class="amount-value"><?= Formater::currency($transfer['montant']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>


                    <?php foreach($listcoachtransfer as $coachtransfer) { ?>
                        
                    <div class="timeline-item">
                        <div class="timeline-date">25 DÉC 2025</div>
                        <div class="timeline-content">
                            <div class="transfer-card-full">
                                <div class="transfer-header-full">
                                    <div class="transfer-code">COACH</div>
                                    <?php
                                        // Calculer la classe CSS selon le statut
                                        $status_class = '';
                                        if(strtolower($coachtransfer['statut']) === 'completed') {
                                            $status_class = 'completed';
                                        } elseif(strtolower($coachtransfer['statut']) === 'in progress') {
                                            $status_class = 'pending';
                                        } elseif(strtolower($coachtransfer['statut']) === 'canceled') {
                                            $status_class = 'cancelled';    
                                        }
                                    ?>
                                    <span class="status-badge <?= $status_class ?>"> <?= $coachtransfer['statut'] ?></span>
                                </div>
                                <div class="transfer-body-full">
                                    <div class="transfer-player-info">
                                        <div class="player-avatar-medium">MX</div>
                                        <div>
                                            <h4><?= $coachtransfer['coach'] ?></h4>
                                        </div>
                                    </div>
                                    <div class="transfer-flow">
                                        <div class="team-box departure">
                                            <span class="team-label">DÉPART</span>
                                            <span class="team-name"><?= $coachtransfer['equipe_depart'] ?></span>
                                        </div>
                                        <div class="transfer-arrow-large">→</div>
                                        <div class="team-box arrival">
                                            <span class="team-label">ARRIVÉE</span>
                                            <span class="team-name"><?= $coachtransfer['equipe_arrivee'] ?></span>
                                        </div>
                                    </div>
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
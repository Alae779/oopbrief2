<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Coach - Apex Management</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="../styles/forms.css">
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
                <a href="../index.php" class="nav-item">
                    <span class="icon">📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="../players.php" class="nav-item">
                    <span class="icon">🎮</span>
                    <span>Joueurs</span>
                </a>
                <a href="../coaches.php" class="nav-item active">
                    <span class="icon">👔</span>
                    <span>Coachs</span>
                </a>
                <a href="../teams.php" class="nav-item">
                    <span class="icon">🏆</span>
                    <span>Équipes</span>
                </a>
                <a href="../contracts.php" class="nav-item">
                    <span class="icon">📝</span>
                    <span>Contrats</span>
                </a>
                <a href="../transfers.php" class="nav-item">
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
                <div>
                    <a href="../coaches.php" class="back-link">← Retour aux coachs</a>
                    <h2 class="page-title">Ajouter un Coach</h2>
                </div>
            </header>

            <div class="content-wrapper">
                <div class="form-container">
                    <form class="entity-form" action="../coaches.php" method="post">
                        <!-- Personal Information Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">👤</div>
                                <h3 class="section-title">Informations Personnelles</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="nom">Nom complet *</label>
                                    <input type="text" id="nom" name="nom" placeholder="Ex: Jonas Gundersen" required>
                                </div>

                                <div class="form-field">
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" name="email" placeholder="Ex: devilwalk@fnatic.com" required>
                                </div>

                                <div class="form-field">
                                    <label for="nationalite">Nationalité *</label>
                                    <select id="nationalite" name="nationalite" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="france">🇫🇷 France</option>
                                        <option value="espagne">🇪🇸 Espagne</option>
                                        <option value="coree">🇰🇷 Corée du Sud</option>
                                        <option value="usa">🇺🇸 États-Unis</option>
                                        <option value="bresil">🇧🇷 Brésil</option>
                                        <option value="suede">🇸🇪 Suède</option>
                                        <option value="danemark">🇩🇰 Danemark</option>
                                    </select>
                                </div>

                                <div class="form-field">
                                    <label for="annees_experience">Années d'expérience *</label>
                                    <input type="number" id="annees_experience" name="annees_experience" placeholder="Ex: 8" min="0" max="30" required>
                                </div>
                            </div>
                        </div>

                        <!-- Coaching Information Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">🎯</div>
                                <h3 class="section-title">Informations de Coaching</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="jeu">Jeu principal *</label>
                                    <select id="jeu" name="jeu" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="cs2">Counter-Strike 2</option>
                                        <option value="lol">League of Legends</option>
                                        <option value="valorant">Valorant</option>
                                        <option value="dota2">Dota 2</option>
                                        <option value="overwatch">Overwatch 2</option>
                                    </select>
                                </div>

                                <div class="form-field">
                                    <label for="style_coaching">Style de coaching *</label>
                                    <select id="style_coaching" name="style_coaching" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="strategique">Stratégique</option>
                                        <option value="mental">Mental Coach</option>
                                        <option value="analytique">Analytique</option>
                                        <option value="tactique">Tactique</option>
                                        <option value="performance">Performance</option>
                                    </select>
                                </div>

                                <div class="form-field full-width">
                                    <label for="equipe">Équipe actuelle</label>
                                    <select id="equipe" name="equipe">
                                        <option value="">Aucune (Disponible)</option>
                                        <option value="vitality">Team Vitality</option>
                                        <option value="g2">G2 Esports</option>
                                        <option value="kc">Karmine Corp</option>
                                        <option value="fnatic">Fnatic</option>
                                        <option value="navi">Natus Vincere</option>
                                        <option value="sentinels">Sentinels</option>
                                    </select>
                                </div>

                                <div class="form-field full-width">
                                    <label for="specialites">Spécialités</label>
                                    <div class="checkbox-group">
                                        <label class="checkbox-item">
                                            <input type="checkbox" name="specialites[]" value="strategie">
                                            <span>Stratégie</span>
                                        </label>
                                        <label class="checkbox-item">
                                            <input type="checkbox" name="specialites[]" value="draft">
                                            <span>Draft / Pick & Ban</span>
                                        </label>
                                        <label class="checkbox-item">
                                            <input type="checkbox" name="specialites[]" value="analyse">
                                            <span>Analyse Anti-Strat</span>
                                        </label>
                                        <label class="checkbox-item">
                                            <input type="checkbox" name="specialites[]" value="mental">
                                            <span>Préparation Mentale</span>
                                        </label>
                                        <label class="checkbox-item">
                                            <input type="checkbox" name="specialites[]" value="igl">
                                            <span>Formation IGL</span>
                                        </label>
                                        <label class="checkbox-item">
                                            <input type="checkbox" name="specialites[]" value="rotation">
                                            <span>Rotations</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Financial Information Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">💰</div>
                                <h3 class="section-title">Informations Financières</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="salaire">Salaire mensuel estimé (€)</label>
                                    <input type="number" id="salaire" name="salaire" placeholder="Ex: 18000" step="100" min="0">
                                    <span class="field-hint">Optionnel - sera défini dans le contrat</span>
                                </div>
                            </div>
                        </div>

                        <!-- Achievements Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">🏆</div>
                                <h3 class="section-title">Palmarès & Achievements</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field full-width">
                                    <label for="palmares">Principaux titres</label>
                                    <textarea id="palmares" name="palmares" rows="4" placeholder="Ex: Major Champion 2024, IEM Katowice Winner, BLAST Premier Champion..."></textarea>
                                    <span class="field-hint">Un titre par ligne</span>
                                </div>

                                <div class="form-field">
                                    <label for="win_rate">Win Rate (%)</label>
                                    <input type="number" id="win_rate" name="win_rate" placeholder="Ex: 68" min="0" max="100">
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">📝</div>
                                <h3 class="section-title">Informations Complémentaires</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field full-width">
                                    <label for="biographie">Biographie / Notes</label>
                                    <textarea id="biographie" name="biographie" rows="4" placeholder="Parcours, philosophie de coaching, expériences notables..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" class="btn-secondary" onclick="window.location.href='../coaches.php'">Annuler</button>
                            <button type="reset" class="btn-secondary">Réinitialiser</button>
                            <button type="submit" class="btn-primary">✓ Créer le coach</button>
                        </div>
                    </form>

                    <!-- Preview Card -->
                    <div class="preview-card">
                        <div class="preview-header">
                            <h3>Aperçu de la carte</h3>
                        </div>
                        <div class="preview-body">
                            <div class="preview-avatar coach">CO</div>
                            <h4 class="preview-name">Nouveau Coach</h4>
                            <p class="preview-role">Style - Jeu</p>
                            <div class="preview-experience">0 ans d'expérience</div>
                            <p class="preview-hint">Les informations s'afficheront au fur et à mesure que vous remplissez le formulaire</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
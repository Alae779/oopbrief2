<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Contrat - Apex Management</title>
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
                <a href="../coaches.php" class="nav-item">
                    <span class="icon">👔</span>
                    <span>Coachs</span>
                </a>
                <a href="../teams.php" class="nav-item">
                    <span class="icon">🏆</span>
                    <span>Équipes</span>
                </a>
                <a href="../contracts.php" class="nav-item active">
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
                    <a href="../contracts.php" class="back-link">← Retour aux contrats</a>
                    <h2 class="page-title">Nouveau Contrat</h2>
                </div>
            </header>

            <div class="content-wrapper">
                <div class="form-container">
                    <form class="entity-form" action="../contracts.php" method="post">
                        <!-- Parties Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">👥</div>
                                <h3 class="section-title">Parties Contractantes</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="type_membre">Type de membre *</label>
                                    <select id="type_membre" name="type_membre" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="joueur">Joueur</option>
                                        <option value="coach">Coach</option>
                                    </select>
                                </div>

                                <div class="form-field">
                                    <label for="membre">Membre *</label>
                                    <select id="membre" name="membre" required>
                                        <option value="">Sélectionner un membre...</option>
                                        <optgroup label="Joueurs">
                                            <option value="joueur_1">ZywOo (AWP - CS2)</option>
                                            <option value="joueur_2">Caps (Mid - LoL)</option>
                                            <option value="joueur_3">TenZ (Duelist - Valorant)</option>
                                            <option value="joueur_4">s1mple (AWP - CS2)</option>
                                            <option value="joueur_5">Faker (Mid - LoL)</option>
                                        </optgroup>
                                        <optgroup label="Coachs">
                                            <option value="coach_1">Devilwalk (CS2)</option>
                                            <option value="coach_2">Zefa (LoL)</option>
                                            <option value="coach_3">Chet (Valorant)</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-field full-width">
                                    <label for="equipe">Équipe *</label>
                                    <select id="equipe" name="equipe" required>
                                        <option value="">Sélectionner une équipe...</option>
                                        <option value="vitality">Team Vitality</option>
                                        <option value="g2">G2 Esports</option>
                                        <option value="kc">Karmine Corp</option>
                                        <option value="fnatic">Fnatic</option>
                                        <option value="navi">Natus Vincere</option>
                                        <option value="sentinels">Sentinels</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Financial Terms Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">💰</div>
                                <h3 class="section-title">Conditions Financières</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="salaire_mensuel">Salaire mensuel (€) *</label>
                                    <input type="number" id="salaire_mensuel" name="salaire_mensuel" placeholder="Ex: 35000" step="100" min="0" required>
                                </div>

                                <div class="form-field">
                                    <label for="salaire_annuel">Salaire annuel (€)</label>
                                    <input type="number" id="salaire_annuel" name="salaire_annuel" placeholder="Calculé automatiquement" readonly>
                                    <span class="field-hint">Calcul automatique : mensuel × 12</span>
                                </div>

                                <div class="form-field">
                                    <label for="clause_rachat">Clause de rachat (€)</label>
                                    <input type="number" id="clause_rachat" name="clause_rachat" placeholder="Ex: 2500000" step="10000" min="0">
                                    <span class="field-hint">Montant pour libérer le joueur</span>
                                </div>

                                <div class="form-field">
                                    <label for="prime_signature">Prime à la signature (€)</label>
                                    <input type="number" id="prime_signature" name="prime_signature" placeholder="Ex: 50000" step="1000" min="0">
                                </div>

                                <div class="form-field full-width">
                                    <label for="bonus">Bonus de performance</label>
                                    <textarea id="bonus" name="bonus" rows="3" placeholder="Ex: 10000€ par titre majeur remporté, 5000€ par MVP..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Contract Duration Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">📅</div>
                                <h3 class="section-title">Durée du Contrat</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="date_debut">Date de début *</label>
                                    <input type="date" id="date_debut" name="date_debut" required>
                                </div>

                                <div class="form-field">
                                    <label for="date_fin">Date de fin *</label>
                                    <input type="date" id="date_fin" name="date_fin" required>
                                </div>

                                <div class="form-field">
                                    <label for="duree">Durée</label>
                                    <input type="text" id="duree" name="duree" placeholder="Calculée automatiquement" readonly>
                                    <span class="field-hint">Calcul automatique en mois</span>
                                </div>

                                <div class="form-field">
                                    <label>
                                        <input type="checkbox" name="renouvellement_auto" value="1">
                                        Renouvellement automatique
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Legal Terms Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">⚖️</div>
                                <h3 class="section-title">Clauses Légales</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field full-width">
                                    <label for="clauses_specifiques">Clauses spécifiques</label>
                                    <textarea id="clauses_specifiques" name="clauses_specifiques" rows="4" placeholder="Conditions de résiliation, clause de non-concurrence, période d'essai, etc."></textarea>
                                </div>

                                <div class="form-field">
                                    <label for="preavis_resiliation">Préavis de résiliation (jours)</label>
                                    <input type="number" id="preavis_resiliation" name="preavis_resiliation" placeholder="Ex: 90" min="0">
                                </div>

                                <div class="form-field">
                                    <label for="periode_essai">Période d'essai (jours)</label>
                                    <input type="number" id="periode_essai" name="periode_essai" placeholder="Ex: 30" min="0">
                                </div>
                            </div>
                        </div>

                        <!-- Benefits Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">🎁</div>
                                <h3 class="section-title">Avantages & Bénéfices</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field full-width">
                                    <label>Avantages inclus</label>
                                    <div class="checkbox-group">
                                        <label class="checkbox-item">
                                            <input type="checkbox" name="avantages[]" value="logement">
                                            <span>Logement fourni</span>
                                        </label>
                                        <label class="checkbox-item">
                                            <input type="checkbox" name="avantages[]" value="transport">
                                            <span>Frais de transport</span>
                                        </label>
                                        <label class="checkbox-item">
                                            <input type="checkbox" name="avantages[]" value="materiel">
                                            <span>Matériel gaming</span>
                                        </label>
                                        <label class="checkbox-item">
                                            <input type="checkbox" name="avantages[]" value="assurance">
                                            <span>Assurance santé</span>
                                        </label>
                                        <label class="checkbox-item">
                                            <input type="checkbox" name="avantages[]" value="nutritionniste">
                                            <span>Suivi nutritionniste</span>
                                        </label>
                                        <label class="checkbox-item">
                                            <input type="checkbox" name="avantages[]" value="psychologue">
                                            <span>Suivi psychologique</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-field full-width">
                                    <label for="autres_avantages">Autres avantages</label>
                                    <textarea id="autres_avantages" name="autres_avantages" rows="3" placeholder="Description des autres avantages..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Notes Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">📝</div>
                                <h3 class="section-title">Notes & Observations</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field full-width">
                                    <label for="notes">Notes internes</label>
                                    <textarea id="notes" name="notes" rows="4" placeholder="Notes pour la gestion interne, points à surveiller..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" class="btn-secondary" onclick="window.location.href='../contracts.php'">Annuler</button>
                            <button type="reset" class="btn-secondary">Réinitialiser</button>
                            <button type="submit" class="btn-primary">✓ Créer le contrat</button>
                        </div>
                    </form>

                    <!-- Preview Card -->
                    <div class="preview-card">
                        <div class="preview-header">
                            <h3>Résumé du contrat</h3>
                        </div>
                        <div class="preview-body">
                            <div class="preview-contract-id">CTR-2025-XXXX</div>
                            <div class="contract-summary">
                                <div class="summary-item">
                                    <span class="summary-label">Membre</span>
                                    <span class="summary-value">Non sélectionné</span>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">Équipe</span>
                                    <span class="summary-value">Non sélectionnée</span>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">Salaire mensuel</span>
                                    <span class="summary-value">0 €</span>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">Durée</span>
                                    <span class="summary-value">—</span>
                                </div>
                            </div>
                            <p class="preview-hint">Les informations s'afficheront au fur et à mesure que vous remplissez le formulaire</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
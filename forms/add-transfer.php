<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Transfert - Apex Management</title>
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
                <a href="../contracts.php" class="nav-item">
                    <span class="icon">📝</span>
                    <span>Contrats</span>
                </a>
                <a href="../transfers.php" class="nav-item active">
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
                    <a href="../transfers.php" class="back-link">← Retour aux transferts</a>
                    <h2 class="page-title">Nouveau Transfert</h2>
                </div>
            </header>

            <div class="content-wrapper">
                <div class="form-container">
                    <form class="entity-form" action="../transfers.php" method="post">
                        <!-- Player Selection Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">👤</div>
                                <h3 class="section-title">Joueur Transféré</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field full-width">
                                    <label for="joueur">Joueur *</label>
                                    <select id="joueur" name="joueur" required>
                                        <option value="">Sélectionner un joueur...</option>
                                        <option value="1">ZywOo (AWP - CS2) - Vitality</option>
                                        <option value="2">Caps (Mid - LoL) - G2 Esports</option>
                                        <option value="3">TenZ (Duelist - Valorant) - Sentinels</option>
                                        <option value="4">s1mple (AWP - CS2) - Natus Vincere</option>
                                        <option value="5">Faker (Mid - LoL) - T1</option>
                                        <option value="6">Rekkles (ADC - LoL) - Karmine Corp</option>
                                    </select>
                                    <span class="field-hint">Seuls les joueurs sous contrat apparaissent</span>
                                </div>
                            </div>
                        </div>

                        <!-- Teams Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">🔄</div>
                                <h3 class="section-title">Équipes Concernées</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="equipe_depart">Équipe de départ *</label>
                                    <select id="equipe_depart" name="equipe_depart" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="vitality">Team Vitality</option>
                                        <option value="g2">G2 Esports</option>
                                        <option value="kc">Karmine Corp</option>
                                        <option value="fnatic">Fnatic</option>
                                        <option value="navi">Natus Vincere</option>
                                        <option value="sentinels">Sentinels</option>
                                    </select>
                                    <span class="field-hint">L'équipe actuelle du joueur</span>
                                </div>

                                <div class="form-field">
                                    <label for="equipe_arrivee">Équipe d'arrivée *</label>
                                    <select id="equipe_arrivee" name="equipe_arrivee" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="vitality">Team Vitality</option>
                                        <option value="g2">G2 Esports</option>
                                        <option value="kc">Karmine Corp</option>
                                        <option value="fnatic">Fnatic</option>
                                        <option value="navi">Natus Vincere</option>
                                        <option value="sentinels">Sentinels</option>
                                        <option value="freeagent">Free Agent (aucune équipe)</option>
                                    </select>
                                    <span class="field-hint">La nouvelle équipe du joueur</span>
                                </div>
                            </div>
                        </div>

                        <!-- Financial Details Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">💰</div>
                                <h3 class="section-title">Détails Financiers</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="montant">Montant du transfert (€) *</label>
                                    <input type="number" id="montant" name="montant" placeholder="Ex: 2500000" step="10000" min="0" required>
                                    <span class="field-hint">Montant versé par l'équipe d'arrivée</span>
                                </div>

                                <div class="form-field">
                                    <label for="type_transfert">Type de transfert *</label>
                                    <select id="type_transfert" name="type_transfert" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="transfert_definitif">Transfert définitif</option>
                                        <option value="pret">Prêt avec option d'achat</option>
                                        <option value="pret_sec">Prêt sec</option>
                                        <option value="echange">Échange de joueurs</option>
                                        <option value="free">Agent libre</option>
                                    </select>
                                </div>

                                <div class="form-field">
                                    <label for="commission_agent">Commission agent (%)</label>
                                    <input type="number" id="commission_agent" name="commission_agent" placeholder="Ex: 10" step="0.1" min="0" max="100">
                                </div>

                                <div class="form-field">
                                    <label for="frais_supplementaires">Frais supplémentaires (€)</label>
                                    <input type="number" id="frais_supplementaires" name="frais_supplementaires" placeholder="Ex: 50000" step="1000" min="0">
                                    <span class="field-hint">Frais annexes, bonus, etc.</span>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Terms Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">📊</div>
                                <h3 class="section-title">Modalités de Paiement</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="modalite_paiement">Modalité *</label>
                                    <select id="modalite_paiement" name="modalite_paiement" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="immediat">Paiement immédiat</option>
                                        <option value="echelonne">Paiement échelonné</option>
                                        <option value="clause">Déclenchement de clause</option>
                                    </select>
                                </div>

                                <div class="form-field">
                                    <label for="nombre_echeances">Nombre d'échéances</label>
                                    <input type="number" id="nombre_echeances" name="nombre_echeances" placeholder="Ex: 3" min="1" max="12">
                                    <span class="field-hint">Pour paiement échelonné uniquement</span>
                                </div>

                                <div class="form-field full-width">
                                    <label for="calendrier_paiement">Calendrier de paiement</label>
                                    <textarea id="calendrier_paiement" name="calendrier_paiement" rows="3" placeholder="Ex: 1M€ immédiat, 1M€ après 6 mois, 500k€ après 1 an"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Transfer Status Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">📅</div>
                                <h3 class="section-title">État & Dates</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label for="statut">Statut du transfert *</label>
                                    <select id="statut" name="statut" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="en_negociation">En négociation</option>
                                        <option value="en_cours">En cours</option>
                                        <option value="complete">Complété</option>
                                        <option value="annule">Annulé</option>
                                    </select>
                                </div>

                                <div class="form-field">
                                    <label for="date_transfert">Date du transfert</label>
                                    <input type="date" id="date_transfert" name="date_transfert">
                                    <span class="field-hint">Date effective du mouvement</span>
                                </div>

                                <div class="form-field">
                                    <label for="date_annonce">Date d'annonce publique</label>
                                    <input type="date" id="date_annonce" name="date_annonce">
                                </div>

                                <div class="form-field">
                                    <label>
                                        <input type="checkbox" name="visite_medicale" value="1">
                                        Visite médicale effectuée
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Contract Impact Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">📝</div>
                                <h3 class="section-title">Impact sur le Contrat</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field full-width">
                                    <label>Action sur le contrat existant *</label>
                                    <div class="radio-group">
                                        <label class="radio-item">
                                            <input type="radio" name="action_contrat" value="resilier" required>
                                            <span>Résilier le contrat actuel</span>
                                        </label>
                                        <label class="radio-item">
                                            <input type="radio" name="action_contrat" value="transferer">
                                            <span>Transférer le contrat à la nouvelle équipe</span>
                                        </label>
                                        <label class="radio-item">
                                            <input type="radio" name="action_contrat" value="nouveau">
                                            <span>Créer un nouveau contrat</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-field">
                                    <label>
                                        <input type="checkbox" name="creer_nouveau_contrat" value="1">
                                        Créer automatiquement le nouveau contrat
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Details Section -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">📋</div>
                                <h3 class="section-title">Détails Complémentaires</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-field full-width">
                                    <label for="clauses_particulieres">Clauses particulières</label>
                                    <textarea id="clauses_particulieres" name="clauses_particulieres" rows="3" placeholder="Clause de revente, pourcentage sur futur transfert, etc."></textarea>
                                </div>

                                <div class="form-field full-width">
                                    <label for="notes">Notes & observations</label>
                                    <textarea id="notes" name="notes" rows="4" placeholder="Contexte du transfert, négociations spéciales, points importants..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" class="btn-secondary" onclick="window.location.href='../transfers.php'">Annuler</button>
                            <button type="reset" class="btn-secondary">Réinitialiser</button>
                            <button type="submit" class="btn-primary">✓ Créer le transfert</button>
                        </div>
                    </form>

                    <!-- Preview Card -->
                    <div class="preview-card">
                        <div class="preview-header">
                            <h3>Résumé du transfert</h3>
                        </div>
                        <div class="preview-body">
                            <div class="preview-transfer-id">TR-2025-XXXX</div>
                            <div class="transfer-summary">
                                <div class="summary-item">
                                    <span class="summary-label">Joueur</span>
                                    <span class="summary-value">Non sélectionné</span>
                                </div>
                                <div class="summary-route">
                                    <div class="route-team">Départ</div>
                                    <div class="route-arrow">→</div>
                                    <div class="route-team">Arrivée</div>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">Montant</span>
                                    <span class="summary-value highlight">0 €</span>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">Statut</span>
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
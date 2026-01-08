<?php
require_once "connection.php";
require_once "joueur.php";
require_once "equipe.php";
require_once "financialEngine.php";

class Transfer {
    private ?PDO $con = null;
    private ?int $id = null;
    private int $joueur_id;
    private int $equipe_depart_id;
    private int $equipe_arrive_id;
    private float $montant;
    private string $status;

    public function __construct(int $joueur_id, int $equipe_depart_id, int $equipe_arrive_id, float $montant, string $status)
    {
        $this->con = Database::getInstance()->getConnection();
        $this->joueur_id = $joueur_id;
        $this->equipe_depart_id = $equipe_depart_id;
        $this->equipe_arrive_id = $equipe_arrive_id;
        $this->montant = $montant;
        $this->status = $status;
    }

    /**
     * Exécute le transfert complet avec transaction PDO
     * Retourne true si succès, false ou message d'erreur si échec
     */
    public function executeTransfer() {
        try {
            // ========================================
            // ÉTAPE 1 : BEGIN TRANSACTION
            // ========================================
            $this->con->beginTransaction();

            // ========================================
            // ÉTAPE 2 : RÉCUPÉRER LES DONNÉES NÉCESSAIRES
            // ========================================
            
            // Récupérer la valeur marchande du joueur (= montant du transfert)
            $valeurMarchande = Joueur::getValeurMarchande($this->joueur_id);
            
            if ($valeurMarchande === null) {
                throw new Exception("Joueur introuvable");
            }

            // Mettre à jour le montant avec la valeur marchande
            $this->montant = $valeurMarchande;

            // Récupérer les équipes
            $equipeDepart = Equipe::getById($this->equipe_depart_id);
            $equipeArrivee = Equipe::getById($this->equipe_arrive_id);

            if (!$equipeDepart || !$equipeArrivee) {
                throw new Exception("Une des équipes est introuvable");
            }

            // Vérifier que les équipes sont différentes
            if ($this->equipe_depart_id === $this->equipe_arrive_id) {
                throw new Exception("Les équipes de départ et d'arrivée doivent être différentes");
            }

            // ========================================
            // ÉTAPE 3 : UTILISER FINANCIALENGINE POUR CALCULER LE COÛT TOTAL
            // ========================================
            
            $financial = new FinancialEngine();
            $totalCost = $financial->CheckSolvabilite($equipeArrivee['budget'], $this->montant);

            // Vérifier la solvabilité
            if ($totalCost === false) {
                throw new Exception("Budget insuffisant pour l'équipe d'arrivée. Budget disponible: " . 
                                    number_format($equipeArrivee['budget'], 2) . " €, Coût total requis: " . 
                                    number_format($this->montant * 1.15, 2) . " €");
            }

            // ========================================
            // ÉTAPE 4 : UPDATE ÉQUIPE DE DÉPART (REÇOIT L'ARGENT)
            // ========================================
            
            $stmt = $this->con->prepare("UPDATE equipes SET budget = budget + :montant WHERE id = :id");
            $stmt->execute([
                ':montant' => $this->montant,
                ':id' => $this->equipe_depart_id
            ]);

            // ========================================
            // ÉTAPE 5 : UPDATE ÉQUIPE D'ARRIVÉE (PAIE AVEC FRAIS)
            // ========================================
            
            $stmt = $this->con->prepare("UPDATE equipes SET budget = budget - :totalCost WHERE id = :id");
            $stmt->execute([
                ':totalCost' => $totalCost,
                ':id' => $this->equipe_arrive_id
            ]);

            // ========================================
            // ÉTAPE 6 : UPDATE JOUEUR (CHANGER D'ÉQUIPE)
            // ========================================
            
            $stmt = $this->con->prepare("UPDATE joueurs SET equipe_id = :equipe_id WHERE id = :id");
            $stmt->execute([
                ':equipe_id' => $this->equipe_arrive_id,
                ':id' => $this->joueur_id
            ]);

            // ========================================
            // ÉTAPE 7 : INSERT DANS LA TABLE TRANSFERTS (LOG)
            // ========================================
            
            $stmt = $this->con->prepare(
                "INSERT INTO transferts(joueur_id, equipe_depart_id, equipe_arrivee_id, montant, statut) 
                 VALUES(:joueur_id, :depart, :arrivee, :montant, :statut)"
            );
            $stmt->execute([
                ':joueur_id' => $this->joueur_id,
                ':depart' => $this->equipe_depart_id,
                ':arrivee' => $this->equipe_arrive_id,
                ':montant' => $this->montant,
                ':statut' => 'completed'
            ]);

            // ========================================
            // ÉTAPE 8 : COMMIT - TOUT S'EST BIEN PASSÉ !
            // ========================================
            
            $this->con->commit();
            return true;

        } catch (Exception $e) {
            
            // ========================================
            // ÉTAPE 9 : ROLLBACK - UNE ERREUR EST SURVENUE
            // ========================================
            
            // Annuler toutes les modifications
            $this->con->rollBack();
            
            // Retourner le message d'erreur
            return $e->getMessage();
        }
    }

    /**
     * Récupérer tous les transferts
     */
    public static function getAll(): array {
        $con = Database::getInstance()->getConnection();
        $sql = "SELECT t.*, 
                       j.name as joueur_name,
                       ed.name as equipe_depart_name,
                       ea.name as equipe_arrivee_name
                FROM transferts t
                LEFT JOIN joueurs j ON t.joueur_id = j.id
                LEFT JOIN equipes ed ON t.equipe_depart_id = ed.id
                LEFT JOIN equipes ea ON t.equipe_arrivee_id = ea.id
                ORDER BY t.id DESC";
        
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupérer un transfert par ID
     */
    public static function getById(int $id): ?array {
        $con = Database::getInstance()->getConnection();
        $stmt = $con->prepare("SELECT * FROM transferts WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $transfert = $stmt->fetch(PDO::FETCH_ASSOC);
        return $transfert ?: null;
    }
}

?>
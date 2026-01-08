<?php
require_once "connection.php";
require_once "joueur.php";
require_once "equipe.php";
require_once "contrat.php";
require_once "financialEngine.php";

class Transfer{
    private ?PDO $con=null;
    private ?int $id = null;
    private ?int $joueur_id = null;
    private ?int $coach_id = null;
    private int $equipe_depart_id;
    private int $equipe_arrive_id;
    private ?float $montant = null;
    private string $status;

    public function __construct(int $equipe_depart_id,int $equipe_arrive_id,string $status, ?int $joueur_id = null, ?float $montant = null)
    {
        $this->con = Database::getInstance()->getConnection();

        $this->joueur_id = $joueur_id;
        $this->equipe_depart_id = $equipe_depart_id;
        $this->equipe_arrive_id = $equipe_arrive_id;
        $this->montant = $montant;
        $this->status = $status;
    }

    public function executeTransfer(float $salaire, float $clause_rachat, $date_fin){
        try{
            $this->con->beginTransaction();

            $valeurMarchande = Joueur::getValeurMarchande($this->joueur_id);
            if($valeurMarchande === null) {
                throw new Exception("Joiueur introuvable!");
            }

            $this->montant = $valeurMarchande;

            $equipe_depart = Equipe::getById($this->equipe_depart_id);
            $equipe_arrive = Equipe::getById($this->equipe_arrive_id);

            if(!$equipe_depart || !$equipe_arrive){
                throw new Exception("L'un des equipes est introuvable!");
            }

            if ($this->equipe_depart_id === $this->equipe_arrive_id) {
                throw new Exception("Les équipes de départ et d'arrivée doivent être différentes");
            }

            $financial = new FinancialEngine();
            $totalcost = $financial->CheckSolvabilite($equipe_arrive['budget'], $this->montant);

            if($totalcost === false){
                throw new Exception("Budget insuffisant pour l'équipe d'arrivée!");
            }


            $newBudgetDepart = $equipe_depart['budget'] + $this->montant;

            $stmt = $this->con->prepare("UPDATE equipes SET budget = :newbudget WHERE id = :id");
            $stmt->execute([
                ':newbudget' => $newBudgetDepart,
                ':id' => $this->equipe_depart_id
            ]);

            $newBudgetArrivee = $equipe_arrive['budget'] - $totalcost;
            $stmt = $this->con->prepare("UPDATE equipes SET budget = :newbudget WHERE id = :id");
            $stmt->execute([
                ':newbudget' => $newBudgetArrivee,
                ':id' => $this->equipe_arrive_id
            ]);

            
            $stmt = $this->con->prepare("UPDATE joueurs SET equipe_id = :equipe_id WHERE id = :id");
            $stmt->execute([
                ':equipe_id' => $this->equipe_arrive_id,
                ':id' => $this->joueur_id
            ]);

            $stmt = $this->con->prepare("INSERT INTO transferts(joueur_id, equipe_depart_id, equipe_arrivee_id, montant, statut)
                    VALUES(:joueur_id, :depart, :arrive, :montant, :statut)");
            $stmt->execute([
                ':joueur_id' => $this->joueur_id,
                ':depart' => $this->equipe_depart_id,
                ':arrive' => $this->equipe_arrive_id,
                ':montant' => $totalcost,
                ':statut' => "Completed"
            ]);

            // delete old contrat
            Contrat::deleteByJoueur($this->joueur_id, $this->equipe_depart_id);

            $contrat = new Contrat($this->joueur_id, null, $this->equipe_arrive_id, $salaire, $clause_rachat, $date_fin);
            $contrat->Create();

            $this->con->commit();
            return true;
        }
        catch (Exception $e) {
            $this->con->rollBack();
            return $e->getMessage();
        }
    }

    public static function getAll(){
        $con = Database::getInstance()->getConnection();
        $sql = "SELECT j.name AS joueur, ed.name AS equipe_depart, ea.name AS equipe_arrivee, t.montant, statut FROM transferts t
                INNER JOIN joueurs j 
                ON j.id = t.joueur_id
                INNER JOIN equipes ed 
                ON ed.id = t.equipe_depart_id
                INNER JOIN equipes ea 
                ON ea.id = t.equipe_arrivee_id";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }













    public function executeCoachTransfer(int $coach_id, float $salaire, float $clause_rachat, $date_fin){
        try{
            $this->con->beginTransaction();

            $equipe_depart = Equipe::getById($this->equipe_depart_id);
            $equipe_arrive = Equipe::getById($this->equipe_arrive_id);

            if(!$equipe_depart || !$equipe_arrive){
                throw new Exception("L'un des equipes est introuvable!");
            }

            if ($this->equipe_depart_id === $this->equipe_arrive_id) {
                throw new Exception("Les équipes de départ et d'arrivée doivent être différentes");
            }


            $stmt = $this->con->prepare("UPDATE coaches SET equipe_id = :equipe_id WHERE id = :id");
            $stmt->execute([
                ':equipe_id' => $this->equipe_arrive_id,
                ':id' => $coach_id
            ]);

            $stmt = $this->con->prepare("INSERT INTO transferts(coach_id, equipe_depart_id, equipe_arrivee_id, statut)
                    VALUES(:coach_id, :depart, :arrive, :statut)");
            $stmt->execute([
                ':coach_id' => $coach_id,
                ':depart' => $this->equipe_depart_id,
                ':arrive' => $this->equipe_arrive_id,
                ':statut' => "Completed"
            ]);



            Contrat::deleteByCoach($coach_id, $this->equipe_depart_id);

            $contrat = new Contrat(null, $coach_id,$this->equipe_arrive_id, $salaire, $clause_rachat, $date_fin);
            $contrat->Create();



            $this->con->commit();
            return true;
        }
        catch (Exception $e) {
            $this->con->rollBack();
            return $e->getMessage();
        }
    }





    public static function getAlll(){
        $con = Database::getInstance()->getConnection();
        $sql = "SELECT c.name AS coach, ed.name AS equipe_depart, ea.name AS equipe_arrivee, statut FROM transferts t
                INNER JOIN coaches c 
                ON c.id = t.coach_id
                INNER JOIN equipes ed 
                ON ed.id = t.equipe_depart_id
                INNER JOIN equipes ea 
                ON ea.id = t.equipe_arrivee_id";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }










}


?>
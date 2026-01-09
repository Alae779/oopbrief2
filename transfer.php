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




    public static function getById(int $id)  {
        $con = Database::getInstance()->getConnection();
        $stmt = $con->prepare("SELECT * FROM transferts WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $transfer = $stmt->fetch(PDO::FETCH_ASSOC);
        return $transfer;
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
                throw new Exception("Budget insuffisant pour l'equipe d'arrivée!");
            }

           if(strtolower($this->status) === 'completed'){

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

                // delete old contrat
                Contrat::deleteByJoueur($this->joueur_id, $this->equipe_depart_id);

                $contrat = new Contrat($this->joueur_id, null, $this->equipe_arrive_id, $salaire, $clause_rachat, $date_fin);
                $contrat->Create();

           } 


            

            $stmt = $this->con->prepare("INSERT INTO transferts(joueur_id, equipe_depart_id, equipe_arrivee_id, montant, statut)
                    VALUES(:joueur_id, :depart, :arrive, :montant, :statut)");
            $stmt->execute([
                ':joueur_id' => $this->joueur_id,
                ':depart' => $this->equipe_depart_id,
                ':arrive' => $this->equipe_arrive_id,
                ':montant' => $totalcost,
                ':statut' => $this->status,
            ]);

            

            $this->con->commit();
            return true;
        }
        catch (Exception $e) {
            $this->con->rollBack();
            return $e->getMessage();
        }
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

            if(strtolower($this->status)  === 'completed'){

                $stmt = $this->con->prepare("UPDATE coaches SET equipe_id = :equipe_id WHERE id = :id");
                $stmt->execute([
                    ':equipe_id' => $this->equipe_arrive_id,
                    ':id' => $coach_id
                ]);

                Contrat::deleteByCoach($coach_id, $this->equipe_depart_id);

                $contrat = new Contrat(null, $coach_id,$this->equipe_arrive_id, $salaire, $clause_rachat, $date_fin);
                $contrat->Create();


            }


            

            $stmt = $this->con->prepare("INSERT INTO transferts(coach_id, equipe_depart_id, equipe_arrivee_id, statut)
                    VALUES(:coach_id, :depart, :arrive, :statut)");
            $stmt->execute([
                ':coach_id' => $coach_id,
                ':depart' => $this->equipe_depart_id,
                ':arrive' => $this->equipe_arrive_id,
                ':statut' => $this->status,
            ]);



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
        $sql = "SELECT t.id as transferid, j.name AS joueur, ed.name AS equipe_depart, ea.name AS equipe_arrivee, t.montant, statut FROM transferts t
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

    public static function getAllCompleted(){
        $con = Database::getInstance()->getConnection();
        $sql = "SELECT t.id as transferid, j.name AS joueur, ed.name AS equipe_depart, ea.name AS equipe_arrivee, t.montant, statut FROM transferts t
                INNER JOIN joueurs j 
                ON j.id = t.joueur_id
                INNER JOIN equipes ed 
                ON ed.id = t.equipe_depart_id
                INNER JOIN equipes ea
                ON ea.id = t.equipe_arrivee_id
                WHERE statut = 'COMPLETED' ";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }


    public static function getAlll(){
        $con = Database::getInstance()->getConnection();
        $sql = "SELECT t.id as transferid, c.name AS coach, ed.name AS equipe_depart, ea.name AS equipe_arrivee, statut FROM transferts t
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

    public static function getAlllCompleted(){
        $con = Database::getInstance()->getConnection();
        $sql = "SELECT t.id as transferid, c.name AS coach, ed.name AS equipe_depart, ea.name AS equipe_arrivee, statut FROM transferts t
                INNER JOIN coaches c 
                ON c.id = t.coach_id
                INNER JOIN equipes ed 
                ON ed.id = t.equipe_depart_id
                INNER JOIN equipes ea 
                ON ea.id = t.equipe_arrivee_id
                WHERE statut = 'COMPLETED' ";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }



    public static function getThree(){
        $con = Database::getInstance()->getConnection();
        $sql = "SELECT t.id as transferid, j.name AS joueur, ed.name AS equipe_depart, ea.name AS equipe_arrivee, t.montant, statut FROM transferts t
                INNER JOIN joueurs j 
                ON j.id = t.joueur_id
                INNER JOIN equipes ed 
                ON ed.id = t.equipe_depart_id
                INNER JOIN equipes ea 
                ON ea.id = t.equipe_arrivee_id
                ORDER BY transferid DESC LIMIT 3";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public static function getThreeCompleted(){
        $con = Database::getInstance()->getConnection();
        $sql = "SELECT t.id as transferid, j.name AS joueur, ed.name AS equipe_depart, ea.name AS equipe_arrivee, t.montant, statut FROM transferts t
                INNER JOIN joueurs j 
                ON j.id = t.joueur_id
                INNER JOIN equipes ed 
                ON ed.id = t.equipe_depart_id
                INNER JOIN equipes ea 
                ON ea.id = t.equipe_arrivee_id
                WHERE statut = 'COMPLETED'
                ORDER BY transferid DESC LIMIT 3";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }


    public static function getThreee(){
        $con = Database::getInstance()->getConnection();
        $sql = "SELECT t.id as transferid, c.name AS coach, ed.name AS equipe_depart, ea.name AS equipe_arrivee, statut FROM transferts t
                INNER JOIN coaches c 
                ON c.id = t.coach_id
                INNER JOIN equipes ed 
                ON ed.id = t.equipe_depart_id
                INNER JOIN equipes ea 
                ON ea.id = t.equipe_arrivee_id
                ORDER BY transferid LIMIT 3";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public static function getThreeeCompleted(){
        $con = Database::getInstance()->getConnection();
        $sql = "SELECT t.id as transferid, c.name AS coach, ed.name AS equipe_depart, ea.name AS equipe_arrivee, statut FROM transferts t
                INNER JOIN coaches c 
                ON c.id = t.coach_id
                INNER JOIN equipes ed 
                ON ed.id = t.equipe_depart_id
                INNER JOIN equipes ea 
                ON ea.id = t.equipe_arrivee_id
                WHERE statut = 'COMPLETED'
                ORDER BY transferid LIMIT 3";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public static function getCount(){
        $con = Database::getInstance()->getConnection();
        $sql = "SELECT COUNT(id) as total FROM transferts";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }


    public static function updatePlayerTransfer($transfer_id, float $salaire, float $clause_rachat, string $date_fin, string $new_statut){
        $con = Database::getInstance()->getConnection();

        try{
            $con->beginTransaction();

            $stmt = $con->prepare("SELECT * FROM transferts WHERE id = :id AND joueur_id IS NOT NULL");
            $stmt->execute([':id' => $transfer_id]);
            $transfert = $stmt->fetch(PDO::FETCH_ASSOC);

            $joueur_id = $transfert['joueur_id'];
            $equipe_depart_id = $transfert['equipe_depart_id'];
            $equipe_arrive_id = $transfert['equipe_arrivee_id'];


            if(strtolower($new_statut) === 'completed'){

                $valeurMarchande = Joueur::getValeurMarchande($joueur_id);
                if($valeurMarchande === null){
                    throw new Exception('Joueur introuvable!');
                }

                $equipe_depart = Equipe::getById($equipe_depart_id);
                $equipe_arrive = Equipe::getById($equipe_arrive_id);

                $financial = new FinancialEngine();
                $totalcost = $financial->CheckSolvabilite($equipe_arrive['budget'], $valeurMarchande);

                if($totalcost === false){
                    throw new Exception("Budget insuffisant");
                }
                
                $newBudgetDepart = $equipe_depart['budget'] + $valeurMarchande;
                $stmt = $con->prepare("UPDATE equipes SET budget = :newbudget WHERE id = :id");
                $stmt->execute([
                        ':newbudget' => $newBudgetDepart,
                        ':id' => $equipe_depart_id
                    ]);
                

                $newBudgetArrivee = $equipe_arrive['budget'] - $totalcost;
                $stmt = $con->prepare("UPDATE equipes SET budget = :newbudget WHERE id = :id");
                $stmt->execute([
                        ':newbudget' => $newBudgetArrivee,
                        ':id' => $equipe_arrive_id
                    ]);

                $stmt = $con->prepare("UPDATE joueurs SET equipe_id = :equipe_id WHERE id = :id");
                $stmt->execute([
                    ':equipe_id' => $equipe_arrive_id,
                    ':id' => $joueur_id
                ]);

                Contrat::deleteByJoueur($joueur_id, $equipe_depart_id);
                $contrat = new Contrat($joueur_id, null, $equipe_arrive_id, $salaire, $clause_rachat, $date_fin);
                $contrat->Create();

            }



            $stmt = $con->prepare("UPDATE transferts SET statut = :statut WHERE id = :id");
            $stmt->execute([
                'statut' => $new_statut,
                ':id' => $transfer_id,
            ]);

            $con->commit();
            return true;
        }
        catch (Exception $e){
            $con->rollBack();
            return $e->getMessage();
        }
    }








    public static function updateCoachTransfer($transfer_id, float $salaire, float $clause_rachat, string $date_fin, string $new_statut){
        $con = Database::getInstance()->getConnection();

        try{
            $con->beginTransaction();

            $stmt = $con->prepare("SELECT * FROM transferts WHERE id = :id AND coach_id IS NOT NULL");
            $stmt->execute([':id' => $transfer_id]);
            $transfert = $stmt->fetch(PDO::FETCH_ASSOC);

            $coach_id = $transfert['coach_id'];
            $equipe_depart_id = $transfert['equipe_depart_id'];
            $equipe_arrive_id = $transfert['equipe_arrivee_id'];


            if(strtolower($new_statut) === 'completed'){
                $stmt = $con->prepare("UPDATE coaches SET equipe_id = :equipe_id WHERE id = :id");
                $stmt->execute([
                    ':equipe_id' => $equipe_arrive_id,
                    ':id' => $coach_id
                ]);

                Contrat::deleteByCoach($coach_id, $equipe_depart_id);
                $contrat = new Contrat(null, $coach_id, $equipe_arrive_id, $salaire, $clause_rachat, $date_fin);
                $contrat->Create();

            }

            

            $stmt = $con->prepare("UPDATE transferts SET statut = :statut WHERE id = :id");
            $stmt->execute([
                ':id' => $transfer_id,
                ':statut' => $new_statut
            ]);

            

            $con->commit();
            return true;
        }
        catch (Exception $e){
            $con->rollBack();
            return $e->getMessage();
        }
    }





}


?>
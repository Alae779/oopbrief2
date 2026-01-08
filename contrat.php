<?php

require_once "connection.php";
class Contrat{
    private ?PDO $con=null;
    private ?int $id = null;
    private ?int $joueur_id = null;
    private ?int $coach_id = null;
    private int $equipe_id;
    private float $salaire;
    private float $clause_rachat;
    private $date_fin;

    public function __construct(?int $joueur_id, ?int $coach_id, int $equipe_id, float $salaire, float $clause_rachat, $date_fin)
    {
        $this->con = Database::getInstance()->getConnection();
        $this->joueur_id = $joueur_id;
        $this->coach_id = $coach_id;
        $this->equipe_id = $equipe_id;
        $this->salaire = $salaire;
        $this->clause_rachat = $clause_rachat;
        $this->date_fin = $date_fin;
    }

    public function Create(){
        $sql = "INSERT INTO contrats(joueur_id, coach_id, equipe_id, salaire, date_fin, clause_rachat)
                VALUES(:joueur_id, :coach_id, :equipe_id, :salaire, :date_fin, :clause_rachat)";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            'joueur_id' => $this->joueur_id,
            'coach_id' => $this->coach_id,
            'equipe_id' => $this->equipe_id,
            'salaire' => $this->salaire,
            'date_fin' => $this->date_fin,
            'clause_rachat' => $this->clause_rachat,
        ]);
    }



    public static function deleteByJoueur(int $joueur_id, int $equipe_id){
        $con = Database::getInstance()->getConnection();
        $stmt = $con->prepare("DELETE FROM contrats WHERE joueur_id = :joueur_id AND equipe_id = :equipe_id");
        return $stmt->execute([
            ':joueur_id' => $joueur_id,
            ':equipe_id' => $equipe_id,
        ]);
    }



    public static function deleteByCoach(int $coach_id, int $equipe_id){
        $con = Database::getInstance()->getConnection();
        $stmt = $con->prepare("DELETE FROM contrats WHERE coach_id = :coach_id AND equipe_id = :equipe_id");
        return $stmt->execute([
            ':coach_id' => $coach_id,
            ':equipe_id' => $equipe_id,
        ]);
    }

    public static function getAll(){
        $con = Database::getInstance()->getConnection();
        $stmt = $con->prepare("SELECT c.*, j.name as joueur_name, co.name as coach_name, e.name as equipe_name FROM contrats c
                LEFT JOIN joueurs j ON c.joueur_id = j.id
                LEFT JOIN coaches co ON c.coach_id = co.id
                LEFT JOIN equipes e ON c.equipe_id = e.id");
        
    }

}

?>
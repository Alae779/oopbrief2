<?php
require_once "person.php";
require_once "connection.php";
class Joueur extends Person{
    private PDO $con;
    private ?int $id = null;
    private string $email;
    private string $role;
    private float $valeurmarchande;
    private ?int $equipeId = null;

    private float $signingBonus = 0;
    private float $monthlySalary = 0;

    public function __construct(string $name,string $nationnality, string $email,string $role,float $valeurmarchande, ?int $equipeId = null, ?int $id = null)
    {
        parent::__construct($name, $nationnality);
        $this->con = Database::getInstance()->getConnection();
        $this->id = $id;
        $this->email = $email;
        $this->role = $role;
        $this->valeurmarchande = $valeurmarchande;
        $this->equipeId = $equipeId;
    }

    // public function getAnnualCost(float $salary): float {
    //     $signingBonus = 0;
    //     return ($salary * 12) + $signingBonus;
    // }

    public function getAnnualCost(float $salary): float {
        $this->monthlySalary = $salary;
        return ($this->monthlySalary * 12) + $this->signingBonus;
    }

    public function setSigningBonus(float $bonus): void {
        $this->signingBonus = $bonus;
    }


        // Récupérer un joueur par son ID
    public static function getById(int $id): ?array {
        $con = Database::getInstance()->getConnection();
        $stmt = $con->prepare("SELECT * FROM joueurs WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $joueur = $stmt->fetch(PDO::FETCH_ASSOC);
        return $joueur ?: null;
    }

    // Récupérer uniquement la valeur marchande d'un joueur
    public static function getValeurMarchande(int $id): ?float {
        $con = Database::getInstance()->getConnection();
        $stmt = $con->prepare("SELECT valeur_marchande FROM joueurs WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetchColumn();
        return $result !== false ? (float)$result : null;
    }



    public static function getAll(){
        $con = Database::getInstance()->getConnection();
        $sqll = "SELECT joueurs.id as playerid, joueurs.name as playername, equipes.name as teamname, email, valeur_marchande FROM joueurs
                LEFT JOIN equipes ON equipe_id = equipes.id";
        $stmt = $con->prepare($sqll);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }


    public static function getFour(){
        $con = Database::getInstance()->getConnection();
        $sqll = "SELECT joueurs.id as playerid, joueurs.name as playername, equipes.name as teamname, email, valeur_marchande FROM joueurs
                LEFT JOIN equipes ON equipe_id = equipes.id
                ORDER BY playerid LIMIT 4";
        $stmt = $con->prepare($sqll);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public static function getCount(){
        $con = Database::getInstance()->getConnection();
        $sqll = "SELECT COUNT(name) as total FROM joueurs";
        $stmt = $con->prepare($sqll);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }


    public function Update(){
        $sql = "UPDATE joueurs SET name = :name, email = :email, nationnality = :nationnality, role = :role, valeur_marchande = :valeur_marchande
                WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':nationnality' => $this->nationnality,
            ':role' => $this->role,
            ':valeur_marchande' => $this->valeurmarchande,
            ':id' => $this->id
        ]);
    }

    public function Create(){
        $sql = "INSERT INTO joueurs(name, email, nationnality, role, valeur_marchande, equipe_id)
            VALUES (:name, :email, :nationnality, :role, :valeurmarchande, :equipe_id)";

        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':nationnality' => $this->nationnality,
            ':role' => $this->role,
            ':valeurmarchande' => $this->valeurmarchande,
            ':equipe_id' => $this->equipeId,
        ]);
    }

}

?>
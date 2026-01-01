<?php
require_once "person.php";
require_once "connection.php";
class Joueur extends Person{
    private PDO $con;
    private ?int $id = null;
    private string $email;
    private string $role;
    private float $valeurmarchande;
    private $pr_sign;
    private $frais_deplacement;

    public function __construct(string $name,string $nationnality,string $email,string $role,float $valeurmarchande)
    {
        parent::__construct($name, $nationnality);
        $this->con = Database::getInstance()->getConnection();
        $this->email = $email;
        $this->role = $role;
        $this->valeurmarchande = $valeurmarchande;
    }

    public static function getAll(){
        $con = Database::getInstance()->getConnection();
        $sqll = "SELECT * FROM joueurs";
        $stmt = $con->prepare($sqll);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function Create(){
        $sql = "INSERT INTO joueurs(name, email, nationnality, role, valeur_marchande)
            VALUES (:name, :email, :nationnality, :role, :valeurmarchande)";

        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':nationnality' => $this->nationnality,
            ':role' => $this->role,
            ':valeurmarchande' => $this->valeurmarchande,
        ]);
    }

}

?>
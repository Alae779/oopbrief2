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
        $this->con = Database::getInstance()->getConnection();
        $this->email = $email;
        $this->role = $role;
        $this->valeurmarchande = $valeurmarchande;
    }

    public function Create(){
        $sql = "INSERT INTO equipes(name, budget, manager)
            VALUES (:name, :budget, :manager)";

        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':name' => $this->name,
            ':budget' => $this->budget,
            ':manager' => $this->manager,
        ]);
    }

}

?>
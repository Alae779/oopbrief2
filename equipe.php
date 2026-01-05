<?php
require_once "person.php";
require_once "connection.php";
class Equipe{
    private ?PDO $con=null;
    private ?int $id = null;
    private string $name;
    private float $budget;
    private string $manager;

    public function __construct(string $name,float $budget,string $manager,?int $id = null)
    {
        
        $this->con = Database::getInstance()->getConnection();

        $this->name = $name;
        $this->budget = $budget;
        $this->manager = $manager;
        $this->id = $id;
    }

    public static function getAll(){
        $con = Database::getInstance()->getConnection();
        $sqll = "SELECT * FROM equipes";
        $stmt = $con->prepare($sqll);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
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

    public function Update(){
        $sq = "UPDATE equipes SET name = :name, budget = :budget, manager = :manager
        WHERE id = :id";
        $stmt = $this->con->prepare($sq);
        return $stmt->execute([
            ':name' => $this->name,
            ':budget' => $this->budget,
            ':manager' => $this->manager,
            ':id' => $this->id,
        ]);
    }

    public static function getById(int $id): ?array {
    $con = Database::getInstance()->getConnection();
    $stmt = $con->prepare("SELECT * FROM equipes WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $team = $stmt->fetch(PDO::FETCH_ASSOC);
    return $team ?: null;
}


}

?>
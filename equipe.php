<?php
require_once "person.php";
require_once "connection.php";
class Equipe{
    static ?PDO $con=null;
    private ?int $id = null;
    private string $name;
    private float $budget;
    private string $manager;

    public function __construct(string $name,float $budget,string $manager)
    {
        
        self::$con = Database::getInstance()->getConnection();

        $this->name = $name;
        $this->budget = $budget;
        $this->manager = $manager;
    }

    public static function getAll(){
        self::$con = Database::getInstance()->getConnection();
        $sqll = "SELECT * FROM equipes";
        $stmt = self::$con->prepare($sqll);
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



}

?>
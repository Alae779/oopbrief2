<?php
require_once "connection.php";
require_once "person.php";
class Coach extends Person{
    private PDO $con;
    private ?int $id = null;
    private string $email;
    private int $anneesexperience;
    private ?int $equipeId = null;

    private float $monthlySalary = 0;
    private float $fraisDeplacement = 0;

    public function __construct(string $name,string $nationnality, string $email,int $anneesexperience, ?int $equipeId = null)
    {
        parent::__construct($name, $nationnality);
        $this->con = Database::getInstance()->getConnection();
        $this->email = $email;
        $this->anneesexperience = $anneesexperience;
        $this->equipeId = $equipeId;
    }

    public function getAnnualCost(float $salary): float {
        $this->monthlySalary = $salary;
        return ($this->monthlySalary * 12) + $this->fraisDeplacement;
    }

    public function setFraisDeplacement(float $frais): void {
        $this->fraisDeplacement = $frais;
    }

    public static function getAll(){
        $con = Database::getInstance()->getConnection();
        $sqll = "SELECT coaches.id as coachid, coaches.name as coachname, equipes.name as teamname, email, nationnality, annees_experience FROM coaches
                LEFT JOIN equipes ON equipe_id = equipes.id";
        $stmt = $con->prepare($sqll);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function Create(){
        $sql = "INSERT INTO coaches(name, email, nationnality, annees_experience, equipe_id)
                VALUES(:name, :email, :nationnality, :anneesexperience, :equipe_id)";
        
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':nationnality' => $this->nationnality,
            ':anneesexperience' => $this->anneesexperience,
            ':equipe_id' => $this->equipeId
        ]);
    }
}

?>
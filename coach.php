<?php
require_once "connection.php";
require_once "person.php";
class Coach extends Person{
    private PDO $con;
    private ?int $id = null;
    private string $email;
    private int $anneesexperience;
    public function __construct(string $name,string $nationnality,string $email,int $anneesexperience)
    {
        parent::__construct($name, $nationnality);
        $this->con = Database::getInstance()->getConnection();
        $this->email = $email;
        $this->anneesexperience = $anneesexperience;
        
    
    }

    public static function getAll(){
        $con = Database::getInstance()->getConnection();
        $sqll = "SELECT * FROM coaches";
        $stmt = $con->prepare($sqll);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function Create(){
        $sql = "INSERT INTO coaches(name, email, nationnality, annees_experience)
                VALUES(:name, :email, :nationnality, :anneesexperience)";
        
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':nationnality' => $this->nationnality,
            ':anneesexperience' => $this->anneesexperience,
        ]);
    }
}

?>
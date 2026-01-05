<?php
require_once "connection.php";
class User {
    private PDO $con;
    private ?int $id = null;
    public string $username;
    public string $email;
    public string $password;
    public string $role;

    public function __construct(string $username,string $email,string $password,string $role)
    {   
        $this->con = Database::getInstance()->getConnection();
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function Create(){
        $sql = "INSERT INTO users(username, email, password, role)
            VALUES (:username, :email, :password, :role)";

        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':username' => $this->username,
            ':email' => $this->email,
            ':password' => $this->password,
            ':role' => $this->role,
        ]);
    }
    
    public static function findByEmail(string $email): ?User {
    $con = Database::getInstance()->getConnection();
    $stmt = $con->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if($data){
        $user = new User($data['username'], $data['email'], $data['password'], $data['role']);
        $user->id = $data['id'];
        return $user;
    }
    return null;

}
}

?>
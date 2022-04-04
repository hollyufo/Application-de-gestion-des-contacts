<?php
include('./config/db.php');
// user class
class user extends Database{

    public $id;
    public $username;
    public $password;
    public $created_at;
    public $last_login;
    


    


    public function read(){
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO " . $this->table . " SET name=:name, email=:email, password=:password, created_at=:created_at";
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":created_at", $this->created_at);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function update(){
        $query = "UPDATE " . $this->table . " SET name=:name, email=:email, password=:password WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->id = htmlspecialchars(strip_tags($this->id));
    }

    // check if user exist
    public static function find_user($username){
        return 'Ok Method for '.$username;
        /* $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } */
    }
}


if(isset($_GET['check'])){
    $username = $_POST['username'];
    echo User::find_user($username);
}







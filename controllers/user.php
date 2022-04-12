<?php
include('./config/db.php');
// login user session
class User extends Database{
    // user properties
    public $id;
    public $username;
    public $password;
    public $created_at;
    public $last_login;

    // sanitize user input
    public function sanitize($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // create user
    public function create(){

        // sanitize user input
        $this->username = $this->sanitize($this->username);
        $this->password = $this->sanitize($this->password);
        // password encryption
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->created_at = date(DATE_RFC822);
        $this->last_login = date(DATE_RFC822);
        $sql = "INSERT INTO users VALUES(NULL, '$this->username','$this->created_at','$this->last_login', '$this->password')";
        $result = $this->connect()->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    // login user
    public function login(){
        $this->username = $this->sanitize($this->username);
        $this->password = $this->sanitize($this->password);
        $sql = "SELECT * FROM users WHERE username = '$this->username'";
        $result = $this->connect()->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if(password_verify($this->password, $row['password'])){
                $_SESSION['username'] = $this->username;
                $_SESSION['id'] = $row['id'];
                $_SESSION['created_at'] = $row['created_at'];
                $_SESSION['last_login'] = $row['last_login'];
                $_SESSION['logged_in'] = true;
                header('location: contact.php');
                // updating last login
                $this->last_login = date(DATE_RFC822);
                $sql = "UPDATE users SET lastonline = '$this->last_login' WHERE username = '$this->username'";
                $result = $this->connect()->query($sql);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    // logout user
    public function logout(){
        session_destroy();
        header('location: index.php');
    }
    
}


// if(isset($_GET['check'])){
//     $username = $_POST['username'];
//     echo User::find_user($username);







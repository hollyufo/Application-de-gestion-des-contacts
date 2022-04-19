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
        $this->created_at = date('DATE_RFC822');
        $this->last_login = date('DATE_RFC822');
        // check if username already exists
        $sql = "SELECT * FROM users WHERE username = '$this->username'";
        $result = $this->connect()->query($sql);
        if($result->num_rows > 0){
            echo '<div class="alert alert-danger" role="alert">
            Username already exists
            </div>';
        }else{
            //password encryption
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            // insert user into database
            $sql = "INSERT INTO users VALUES (NULL, '$this->username', '$this->created_at', '$this->last_login', '$this->password')";
            if($this->connect()->query($sql)){
                echo '<div class="alert alert-success" role="alert">
                Your account has been created. <a class="btn btn-dark" href="./login.html">Login here</a>
                </div>';
            }else{
                echo '<div class="alert alert-success" role="alert">
                Error: '.$this->connect()->error.'
                </div>';
            }
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
                session_start();
                $_SESSION['username'] = $this->username;
                $_SESSION['id'] = $row['userid'];
                $_SESSION['created_at'] = $row['signup'];
                $_SESSION['last_login'] = $row['lastonline'];
                $_SESSION['logged_in'] = true;
                header('location: contact.php');
                // updating last login
                $this->last_login = date(DATE_RFC822);
                $sql = "UPDATE users SET lastonline = '$this->last_login' WHERE username = '$this->username'";
                $result = $this->connect()->query($sql);
                return true;
            }else{  
                header('location: login.php?password=error');
            }
        }else{
            header('location: login.php?error=username');
        }
    }
    // logout user
    public function logout(){
        session_destroy();
        header('location: index.php');
    }
    // check if user exist
    public function check_user(){
        $this->username = $this->sanitize($this->username);
        $sql = "SELECT * FROM users WHERE username = '$this->username'";
        $result = $this->connect()->query($sql);
        if($result->num_rows > 0){
            return false;
        }else{
            return true;
        }
    }
}


// if(isset($_GET['check'])){
//     $username = $_POST['username'];
//     echo User::find_user($username);







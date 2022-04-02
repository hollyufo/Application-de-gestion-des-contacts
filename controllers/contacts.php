<?php
class contact{
    public $id;
    public $name;
    public $email;
    public $phone;
    public $address;
    
    // fetching data from db
    protected function getalluser(){
        $sql = "SELECT * FROM contacts";
        $result = $this->connect()->query($sql);
        $nrows = $result->num_rows;
        if ($nrows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
        else{
            echo 'no records';
        }
    }
    //////////////////
    public function showalluser(){
        $datas = $this->getalluser();
        foreach ($datas as $data) {
            echo $data['fname']." ";
            echo $data['PASSWORD']."<br>";
        }
    }
    //  inserting dat
    public function adduser($name, $password){

        // senetizing data
        $name = htmlspecialchars($name);
        $name = stripslashes($name);
        $name = trim($name);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users VALUES (NULL,'$name','$password')";
        $result = $this->connect()->query($sql);
        if ($result === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    public function delete($id){
        $sql = "DELETE FROM users WHERE id='$id';";
        $result = $this->connect()->query($sql);
    }
}
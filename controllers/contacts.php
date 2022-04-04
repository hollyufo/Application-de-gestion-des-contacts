<?php
include('./config/db.php');
class contact extends Database {
    public $id;
    public $name;
    public $email;
    public $phone;
    public $address;
    //finding user in database
    public function find_contact($id) {
        $sql = "SELECT * FROM contacts WHERE contactid = '$id'";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
    }
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
    public function showallcontact(){
        $datas = $this->getalluser();
        return $datas;
    }
    //  inserting dat
    public function addContact($name, $phone, $email, $address){
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $sql = "INSERT INTO contacts VALUES (NULL,'$this->name','$this->phone','$this->email','$this->address')";
        $result = $this->connect()->query($sql);
        if ($result === TRUE) {
            header('location: contact.php?edit=true');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    public function delete($id){
        $sql = "DELETE FROM users WHERE id='$id';";
        $result = $this->connect()->query($sql);
    }
    //update data
    public function update($id, $name, $phone, $email, $address){
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $sql = "UPDATE contacts SET name='$this->name', phone='$this->phone', email='$this->email', address='$this->address' WHERE contactid='$this->id'";
        $result = $this->connect()->query($sql);
    }
}
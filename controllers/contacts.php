<?php
include('./config/db.php');
class contact extends Database {
    // settin up properties
    public $id;
    public $fullname;
    public $phone;
    public $email;
    public $address;
    public $user_id;

    // sanitize user input
    public function sanitize($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // show all contacts
    public function show(){
        $sql = "SELECT * FROM contacts WHERE userid = '$this->user_id'";
        $result = $this->connect()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '<tr>
                <td>'.$row['contactid'].'</td>
                <td>'.$row['fullname'].'</td>
                <td>'.$row['phone'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['address'].'</td>
                <td>
                <a href="./edit.php?id='.$row['contactid'].'" class="btn btn-dark">Edit</a>
                <a href="./delete.php?id='.$row['contactid'].'" class="btn btn-danger">Delete</a>
                </td>
                </tr>';
            }
        }else{
            echo '<div class="alert alert-danger" role="alert">
            No contacts found
            </div>';
        }
    }
    // add contact
    public function add(){
        // sanitize user input
        $this->fullname = $this->sanitize($this->fullname);
        $this->phone = $this->sanitize($this->phone);
        $this->email = $this->sanitize($this->email);
        $this->address = $this->sanitize($this->address);
        $this->user_id = $this->sanitize($this->user_id);
        // insert contact into database
        $sql = "INSERT INTO contacts VALUES (NULL, '$this->fullname', '$this->phone', '$this->email', '$this->address', '$this->user_id')";
        if($this->connect()->query($sql)){
            header('location: contact.php?contact=added');
        }else{
            echo '<div class="alert alert-success" role="alert">
            Error: '.$this->connect()->error.'
            </div>';
        }
    }
    // delete contact
    public function delete(){
        $sql = "DELETE FROM contacts WHERE contactid = '$this->id'";
        if($this->connect()->query($sql)){
            header('location: ./contact.php?deleted=true');
            echo '<div class="alert alert-success" role="alert">
            Contact has been deleted. <a class="btn btn-dark" href="./contacts.php">View contacts</a>
            </div>';
        }else{
            echo '<div class="alert alert-success" role="alert">
            Error: '.$this->connect()->error.'
            </div>';
        }
    }
    // find contact
    public function find(){
        $sql = "SELECT * FROM contacts WHERE contactid = '$this->id'";
        $result = $this->connect()->query($sql);
        return $result->fetch_assoc();
    }
    // update contact
    public function update(){
        // sanitize user input
        $this->fullname = $this->sanitize($this->fullname);
        $this->phone = $this->sanitize($this->phone);
        $this->email = $this->sanitize($this->email);
        $this->address = $this->sanitize($this->address);
        $this->user_id = $this->sanitize($this->user_id);
        // update contact
        $sql = "UPDATE contacts SET fullname = '$this->fullname', phone = '$this->phone', email = '$this->email', address = '$this->address' WHERE contactid = '$this->id'";
        if($this->connect()->query($sql)){
            header('location: ./contact.php?updated=true');
        }else{
            echo '<div class="alert alert-success" role="alert">
            Error: '.$this->connect()->error.'
            </div>';
        }
    }
}
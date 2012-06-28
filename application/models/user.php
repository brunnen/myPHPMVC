<?php

class User extends Model{

    public $id;
    public $email;
    public $password;
    public $name;
    
    
    public function __construct($email, $password, $name) {
        parent::__construct();
        
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
    }
    
    public function save(){
        if($this->id){
            $st = $this->dbh->prepare("UPDATE users SET email = :email, password = :password, name = :name WHERE id = :id");
            $pass = array(
                ':id' => $this->id,
                ':email' => $this->email,
                ':password' => $this->password,
                ':name' => $this->name
            );
        } else {
            $st = $this->dbh->prepare("INSERT INTO users (email, password, name) VALUES(:email, :password, :name)");
            $pass = array(
                ':email' => $this->email,
                ':password' => $this->password,
                ':name' => $this->name
            );
        }
        return $st->execute($pass);
    }
    
    static public function getRegistry($id){
        $m = new Model();
        
        $st = $m->dbh->prepare("SELECT * FROM users WHERE id = :id");
        $pass = array(
            ':id' => $id
        );
        $st->execute($pass);
        $row = $st->fetch(PDO::FETCH_OBJ);
        
        return $row;
    }
}
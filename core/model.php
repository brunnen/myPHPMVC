<?php
class Model{
    public $dbh;
    
    public function __construct() {
        try{
            $this->dbh = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}

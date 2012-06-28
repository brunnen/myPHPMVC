<?php
class SecureController{
    
    static function isConnected(){
        return isset($_SESSION['id']) ? true : false;
    }
    
    static function logout(){
        unset($_SESSION['id']);
    }
    
    public function authenticate(){
        $m = new Model();
        
        $st = $m->dbh->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $pass = array(
            ':email' => $_POST['email'],
            ':password' => $_POST['password']
        );
        $st->execute($pass);
        $row = $st->fetch(PDO::FETCH_OBJ);
        
        if ( $row ){
            $_SESSION['id'] = $row->id;
            
            $view = new View('index.php');
            $view->content = "The user {$_POST['email']} has logged in!";
            $view->render();
        } else {
            $view = new View('index.php');
            $view->content = new View('login.php');
            $view->content->content = "There was a problem loging in";
            $view->render();
        }
    }
}
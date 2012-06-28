<?php

class IndexController {

    
    public function index() {
        $view = new View('index.php');
        $view->content = new View('home.php');
        $view->content->content = "YEAYYYYYYYYYY, content!!!";
        $view->render();

    }

    public function register() {
        $view = new View('index.php');
        $view->content = new View('register.php');
        $view->content->content = "YEAYYYYYYYYYY, content!!!";
        $view->render();

    }
    
    public function create() {

        $user = new User($_POST['email'], $_POST['password'], $_POST['name']);
        if ($user->save()) {
            $view = new View('index.php');
            $view->content = "The new contact {$_POST['name']} has been saved!";
            $view->render();
        } else {
            $view = new View('index.php');
            $view->content = new View('register.php');
            $view->content->content = "There was a problem saving the contact {$_POST['name']} ";
            $view->render();
        }

    }
    
    public function login(){
        $view = new View('index.php');
        $view->content = new View('login.php');
        $view->content->content = "YEAYYYYYYYYYY, content!!!";
        $view->render();
    }
    
    public function logout(){
        SecureController::logout();
        
        $view = new View('index.php');
        $view->content = "User has logged out!";
        $view->render();
    }
    
    public function edit($id){
        $user = User::getRegistry($id);

        $view = new View('index.php');
        $view->content = new View('edit.php');
        $view->content->user = $user;
        $view->render();

    }
    
    public function save($id) {
        $user = User::getRegistry($id);
        $updatedUser = new User($_POST['email'], $_POST['password'], $_POST['name']);
        $updatedUser->id = $id;
        
        if($updatedUser->save()){
            $view = new View('index.php');
            $view->content = new View('edit.php');
            $view->content->content = "Congratulations, action saved";
            $view->content->user = $updatedUser;
            $view->render();
        } else {
            $view = new View('index.php');
            $view->content = new View('edit.php');
            $view->content->content = "There was a problem saving the register";
            $view->content->user = $updatedUser;
            $view->render();
        }
    }
}
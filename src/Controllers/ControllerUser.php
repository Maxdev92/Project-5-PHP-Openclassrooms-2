<?php 

namespace App\Controllers;

use App\Service\View;
use App\Manager\RegisterManager;

class ControllerUser extends ControllerAbstract{

  public function __construct(){
    $this->registerManager = new RegisterManager;
  }
 
    public function login(){
      $hash = PASSWORD_DEFAULT;
      if(isset($_POST['login']) 
      && isset($_POST['username']) && !empty($_POST['username']) 
      && isset($_POST['password']) && !empty($_POST['password'])
      && password_verify($_POST['password'], $hash))
      {
        session_start();
        $_SESSION['username'];
        $this->_view = new View('accueil', 'accueil');
        $this->_view->generate();
      }
      else{
        if( isset($_POST['username']) && empty($_POST['username']) 
        ||  isset($_POST['password']) && empty($_POST['password'])
        ||  !password_verify($_POST['password'], $hash)){
        }
          $_SESSION["error"] = "Informations manquantes ou incorrectes";
        $this->_view = new View('user', 'login');
        $this->_view->generate();
      }
 

    }

    public function register(){  

      if(isset($_POST['register']) 
      && isset($_POST['username']) && !empty($_POST['username'])
      && isset($_POST['email']) && !empty($_POST['email'])
      && isset($_POST['password']) && !empty($_POST['password']) ){
        $this->registerManager->register('username', 'email', 'password');
      }
      else{
        if( isset($_POST['username']) && empty($_POST['username'])
        ||  isset($_POST['email']) && empty($_POST['email'])
        ||  isset($_POST['password']) && empty($_POST['password'])){
          $_SESSION["error"] = "Informations manquantes ou incorrectes";
          }
          $this->_view = new View('user', 'Register');
          $this->_view->generate();
        }
      }
 
    public function details($sql){
 
        $query = $this->connection->query($sql);
 
        $row = $query->fetch_array();
 
        return $row;       
    }
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}
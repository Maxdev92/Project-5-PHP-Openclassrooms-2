<?php 

namespace App\Controllers;

use App\Service\View;

class ControllerUser extends ControllerAbstract{

 
    public function login(){
      if(isset($_POST['login']) 
      && isset($_POST['username']) && !empty($_POST['username']) 
      && isset($_POST['password']) && !empty($_POST['password']) ){
        // onva véririfer qu'un utilisateur existe avec ces credentials

         //si il existe, on le connecte
         // $_session["user"]= "maxime"

         //sinon pn le renoi à la page de login avec un message d'erreur
       /*  $username = $user->escape_string($_POST['username']);
        $password = $user->escape_string($_POST['password']);
       
        $auth = $user->check_login($username, $password);
       
        if(!$auth){
          $_SESSION['message'] = 'Pseudo ou mot de passe invalide';
            header(''); 
        }
        else{
          $_SESSION['user'] = $auth;
          header(''); 
        }*/
      }
      else{
        if( isset($_POST['username']) && empty($_POST['username']) 
        ||  isset($_POST['password']) && empty($_POST['password'])){
          $_SESSION["error"] = "veuillez renseigner toutes les informations";
        }
        $this->_view = new View('user', 'login');
        $this->_view->generate();
       
      }
 
       /*  $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        } */
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
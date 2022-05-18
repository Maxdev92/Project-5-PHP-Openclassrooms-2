<?php 

namespace App\Controllers;

use App\Service\View;
use App\Manager\UserManager;
use Exception;
use PDOException;

class ControllerUser extends ControllerAbstract{

  public function __construct(){
    $this->userManager = new UserManager;
  }
 
    public function login(){
      
      if(isset($_POST['login']) 
      && isset($_POST['username']) && !empty($_POST['username']) 
      && isset($_POST['password']) && !empty($_POST['password']))
      { 
        //on vérifie qu'un utilisateur existe avec ce mot de pass et ce login
        //on va faire une requette en bdd pour chercher l'utilisateur
       
        if($this->userManager->login($_POST['username'], $_POST['password'])){
          //on le connecte
        $this->addFlash("success", "Connexion reussie, bienvenue " . $_SESSION["username"]. ".");
        if(isset($_SESSION["redirect"])){
          $redirect = $_SESSION["redirect"];
          unset($_SESSION["redirect"]);
          header("Location:" . $redirect);exit;
        }
        $this->renderview('accueil','accueil' );
        }
        else{
          $this->addFlash("error", "Le pseudo ou le mot de passe est faux");
          $this->renderview('user','login' );
        }
    
     
      }
      else{
        if( isset($_POST['username']) && empty($_POST['username']) 
        ||  isset($_POST['password']) && empty($_POST['password']))
        $this->addFlash("error",  "Informations manquantes ou incorrectes") ;
        //Detecte si provient de la page d'un article, si oui redirection apres connexion
        // dd($_SERVER["HTTP_REFERER"]);
        $url_components = parse_url($_SERVER["HTTP_REFERER"]);
  
        if(isset($url_components['query'])){
          parse_str($url_components['query'], $params);
        if( $params["module"] =="post"
        &&  $params["action"] =="article" 
        && isset($params["id"])){
          $_SESSION["redirect"]= $_SERVER["HTTP_REFERER"];
          // dd($_SESSION);
        }
        }
        
        // dd("pas ok");
        $this->_view = new View('user', 'login');
        $this->_view->generate();
      }
 

    }

    public function register(){  

      if(isset($_POST['register']) 
      && isset($_POST['username']) && !empty($_POST['username'])
      && isset($_POST['email']) && !empty($_POST['email'])
      && isset($_POST['password']) && !empty($_POST['password']) ){
        try{
          //
           if($this->userManager->register($_POST['username'], $_POST['email'], $_POST['password'])){
          $this->addFlash("success", "Inscription réussie, vous pouvez vous connecter");
          $this->renderview('user', 'login');
            }else{
          $this->addFlash("error", "une erreur est survenue");
          $this->renderview('user', 'register');
        }

        }catch(PDOException $e){
          $this->addFlash("error", "Le pseudo ou l'email éxiste déjà.");
          $this->renderview('user', 'register');
        }//mettre un catch pour  attraper l'exeption des chmps
          //message de succès et redirection vers la page de login
       
      }
      else{
        if( isset($_POST['username']) && empty($_POST['username'])
        ||  isset($_POST['email']) && empty($_POST['email'])
        ||  isset($_POST['password']) && empty($_POST['password'])){
          $_SESSION["error"] = "Informations manquantes ou incorrectes";
          }
          $this->renderview('user','register' );
        }
      }
 
    public function details($sql){
 
        $query = $this->connection->query($sql);
 
        $row = $query->fetch_array();
 
        return $row;       
    }
    
    public function deconnexion(){
      $this->addFlash("success", "Déconnexion reussie, à bientôt " . $_SESSION["username"] . ".");
      UserManager::disConnectUser();
 
      $this->renderview('accueil','accueil' );

    }

    public function cvDownload(){
      $file="CV_Maxime_Schubas.pdf";
      if(file_exists($file)) {
        header('Content-Description: CV Maxime');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        flush(); // Flush system output buffer
        readfile($file);
        die();
    } else {
        http_response_code(404);
      die();
    }
    }

    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}
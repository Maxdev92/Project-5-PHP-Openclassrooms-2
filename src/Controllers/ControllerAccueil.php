<?php
namespace App\Controllers;

use App\Manager\ArticleManager;
use App\Service\View;

/**
 *
 */
class ControllerAccueil extends ControllerAbstract
{ 
  private $_articleManager;
  private $_view;


  public function accueil(){
    $this->_articleManager = new ArticleManager();
    $articles = $this->_articleManager->getArticles();
    $this->_view = new View('accueil', 'Accueil');
    $this->_view->generate(array('article' => $articles));
  }

  public function error($errorMsg){
    $this->_view = new View('accueil','Error');
    $this->_view->generate(array('errorMsg' => $errorMsg));
  }
  public function sendMail(){
    // dd($_POST);
    try {
      $this->checkFormValidity($_POST);
       //vérifier si tous les champs existent
          $destinataire = 'maxime.schubas@gmail.com';
      // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
      $expediteur = 'adresse@fai.com'; //mail du formulaire
      $name= "name"; //name du formulaire

      $objet = 'BlogMaxime, nouveau message'; // Objet du message
      $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
      $headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
      $headers .= 'From: "Nom_de_expediteur"<'.$name.'>'."\n"; // Expediteur
      $headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire// Copie cachée Bcc        
      $message = 'Un Bonjour de Developpez.com!'; // message du formulaire
      if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
      {
          $this->addFlash("success", 'Votre message a bien été envoyé ');
      }
      else // Non envoyé
      {
          $this->addFlash("error", "Votre message n'a pas pu être envoyé");
      }
    } catch (\Exception $e){
      $this->addFlash("error",$e->getMessage());
    }finally{
      $this->accueil();
    }
   

  }

  /**
   * @param array data données du formulaire
   * 
   * @throws Exception
   */
  private function checkFormValidity(array $data):void{
    if( empty($data["name"]) || empty($data["email"]) || empty($data["message"])){
      throw new \Exception("Veuillez remplir tout le formulaire");
    }
    if( empty($data["accept"]) ){
      throw new \Exception("Veuillez accepter nos conditions d'utilisation");
    }

    if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
      throw new \Exception("l'email n'est pas au bon format");
    } 
  }
}


 ?>

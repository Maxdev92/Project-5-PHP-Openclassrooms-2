<?php
namespace App\Controllers;

use App\Models\ArticleManager;
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
}














 ?>

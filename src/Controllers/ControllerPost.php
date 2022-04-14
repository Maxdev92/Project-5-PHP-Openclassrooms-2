<?php
namespace App\Controllers;

use App\Manager\ArticleManager;
use App\Service\View;
use Exception;

class ControllerPost extends ControllerAbstract

{
  private $_articleManager;
  private $_view;

  public function listPost(){
    $this->_articleManager = new ArticleManager;
    $articles = $this->_articleManager->getArticles();
    $this->_view = new View('post', 'listPost');
    $this->_view->generatePost(array('articles' => $articles));
  }
  //fonction pour afficher un article
  public function article()
  {
    if (isset($_GET['id'], $_GET['id'])) {
      $this->_articleManager = new ArticleManager;
      $article = $this->_articleManager->getArticle($_GET['id']);
      $this->_view = new View('post', 'SinglePost');
      $this->_view->generatePost(array('article' => $article));
    }else{
      throw new Exception("Veuillez renseigner l'id pour accèder à cette page");
    }

  }

  //fonction pour afficher le formulaire de création d'un article
  public function createPost()
  {
    
      $this->_view = new View('post','CreatePost');
      $this->_view->generateForm();


  }


  //fonction pour insérer un aticle
    //en bdd
      public function store()
      {
        $this->_articleManager = new ArticleManager;
        $article = $this->_articleManager->createArticle();
        $articles = $this->_articleManager->getArticles();
        $this->_view = new View('accueil','Accueil');
        $this->_view->generate(array('article' => $articles));
      }




}

 ?>

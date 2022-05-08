<?php
namespace App\Controllers;

use App\Manager\ArticleManager;
use App\Manager\CommentManager;
use App\Service\View;
use Exception;

class ControllerPost extends ControllerAbstract

{
  private $_articleManager;
  private $_commentManager;
  private $_view;
   public function __construct()
   {
    $this->_articleManager = new ArticleManager;
    $this->_commentManager = new CommentManager;
   }

  public function listPost(){

    $articles = $this->_articleManager->getArticles();
    $countComments = [];
    foreach($articles as $article){
      $countComments[$article->getId()] = $this->_commentManager->getCountComment($article->getId());;
    }
    $this->_view = new View('post', 'listPost');
    $this->_view->generatePost(array('articles' => $articles, 'countComments' => $countComments));
  }
  //fonction pour afficher un article
  public function article()
  {
    if (isset($_GET['id'])) {
      $article = $this->_articleManager->getArticle($_GET['id']);
      $comments = $this->_commentManager->getComments($_GET['id']);
      $this->_view = new View('post', 'SinglePost');
      //ajouter comments dans le tableau
      $this->_view->generatePost(['article' => $article,'comments' => $comments]);
    }else{
      throw new Exception("Erreur de chargement des articles et commentaires");
    }

  }

  public function moderation()
  {  
    if ($this->isAdmin()){
      try {
      $waitComments = $this->_commentManager->getWaitComments();
      $this->_view = new View('post', 'Moderation');
      // dd($waitComments);
      $this->_view->generatePost(['waitComments' => $waitComments]);
      }
      catch (\PDOException $e){
         throw new Exception("Erreur de chargement des commentaires à valider", 0, $e);
      }
    }else{
      throw new Exception("Vous n'avez pas l'autorisation pour cette action.");

    }

  }

  //fonction pour afficher le formulaire de création d'un article
  public function createPost()
  {
    if ($this->isAdmin()){
      $this->_view = new View('post','CreatePost');
      $this->_view->generateForm();

    }else{
      throw new Exception("Vous n'avez pas l'autorisation pour cette action.");
    }
  }

  public function creatCom(){
    //si connectté
    $this->_commentManager->createCom();
  }

  public function validateComment()
  {
    if ($this->isAdmin() && isset($_GET['id'])){
      $this->_commentManager->allowComment($_GET['id']);
      $this->_view = new View('post', 'moderation');

    }else{
      throw new Exception("Vous n'avez pas l'autorisation pour cette action.");
    }
  }


  public function denyComment(){

    if ($this->isAdmin() && isset($_GET['id'])){
      $this->_commentManager->denyComment('id');
      $this->_view = new View('post', 'moderation');

    }else{
      throw new Exception("Vous n'avez pas l'autorisation pour cette action.");
    }

  
  }

  //fonction pour insérer un aticle
    //en bdd
      public function store()
      {
        if ($this->isAdmin()){

        try {
        $articles = $this->_articleManager->createArticle();
        $articles = $this->_articleManager->getArticles();
        $this->_view = new View('accueil','Accueil');
        $this->_view->generate(array('article' => $articles));
        }
        catch (\PDOException $e){
          throw new Exception("Erreur d'insertion de l'article", 0, $e);
       }
      }else{
        throw new Exception("Vous n'avez pas l'autorisation pour cette action.");
      }
    }





}

 ?>

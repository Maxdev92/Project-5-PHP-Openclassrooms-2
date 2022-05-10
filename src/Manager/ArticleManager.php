<?php
namespace App\Manager;

use App\Models\Article;

/**
 *
 */
class ArticleManager extends AbstractManager
{

  //gréer la fonction qui va recuperer
  //tous les articles dans la bdd
  public function getArticles(){
    return $this->getAll('article', Article::class);
  }

  public function getArticle($id){
      return $this->getOne('article', Article::class, $id);
    }

  public function createArticle(){
      return $this->createPost();
    }

    protected function createPost()
  {
    $req = self::$_bdd->prepare("INSERT INTO article (title, chapo, content, creationDate) VALUES (?, ?, ?, NOW())");
    $req->execute(array($_POST['title'], $_POST['chapo'], $_POST['content']));

    $req->closeCursor();
  }
}





 ?>

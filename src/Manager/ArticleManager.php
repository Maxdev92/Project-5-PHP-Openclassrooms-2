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
      return $this->createPost('article', Article::class);
    }

    protected function createPost($table, $obj)
  {
    $req = self::$_bdd->prepare("INSERT INTO ".$table." (title, content, creationDate) VALUES (?, ?, ?)");
    $req->execute(array($_POST['title'], $_POST['content'], date("Y.d.m")));

    $req->closeCursor();
  }
}





 ?>

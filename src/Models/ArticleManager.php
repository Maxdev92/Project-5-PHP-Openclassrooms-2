<?php
namespace App\Models;

use App\Models\Article;

/**
 *
 */
class ArticleManager extends Model
{

  //gréer la fonction qui va recuperer
  //tous les articles dans la bdd
  public function getArticles(){
  return $this->getAll('article', Article::class);
  }

  public function getArticle($id){
      return $this->getPost('article', Article::class, $id);
    }

  public function createArticle(){
      return $this->createPost('article', Article::class);
    }

}





 ?>

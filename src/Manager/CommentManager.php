<?php

namespace App\Manager;
use App\Models\Comment;

class CommentManager extends AbstractManager

{
   
  public function getComments($postId){
    return $this->getAll('comment', Comment::class ,"WHERE status = 1 and postId =".$postId);
  }

  public function getCountComment($postId){ int:
    return $this->getCount('comment', Comment::class, "WHERE status = 1 and postId =".$postId);
  }

  public function getCountWaitComment(){ int:
    return $this->getCount('comment', Comment::class, "WHERE status = 0");
  }

  public function getWaitComments(){
      return $this->getAll('comment', Comment::class ,"WHERE status = 0");
      }
    
  public function getComment($id, $author, $content){
        return $this->getCom('comment', Comment::class, $id);
      }
  
      
  public function changeComment($postId, $author, $comment, $commentId){

       $req = self::$_bdd->prepare("UPDATE comment SET author = ?, comment = ?, comment_date = NOW() WHERE id = ? AND post_id = ?");
  
        $req->execute(array($author, $comment, $commentId, $postId));
  
        return $req;
  
    } 

    public function allowComment($commentId){
      $req = self::$_bdd->prepare("UPDATE comment SET status = 1 where id = ?");

      $req->execute(array($commentId));

      return $req;
      $req->closeCursor();

  }

  public function denyComment($commentId){

     $req = self::$_bdd->prepare("DELETE comment FROM comment WHERE id = ?");

      $req->execute(array($commentId));

      return $req;
      $req->closeCursor();

  }

    protected function getCom($table, $obj, $id)
  {
    $var = [];
    $req = self::$_bdd->prepare("SELECT id, author, content, DATE_FORMAT(date, '%d/%m/%Y à %Hh%imin%ss') AS date FROM " .$table. " WHERE id = ?");
    $req->execute(array($id));
    while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }

  
  public function createCom()
  {
    $req = self::$_bdd->prepare("INSERT INTO comment (postId, content, author, creationDate) VALUES (?, ?, ?, NOW())");
    $req->execute(array($_POST['id'], $_POST['content'], $_SESSION['id']));

    $req->closeCursor();
  }
   
}


    
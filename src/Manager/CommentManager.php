<?php

namespace App\Manager;
use App\Models\Comment;

class CommentManager extends AbstractMAnager

{
   
  public function getComments(){
    return $this->getAll('comment', Comment::class);
    }
  
    public function getComment($id, $author, $content){
        return $this->getCom('comment', Comment::class, $id);
      }
  
    public function createComment($postId, $content, $author, $creation_date){
        return $this->createCom('comment', Comment::class, $postId);
      }
      
    public function changeComment($postId, $author, $comment, $commentId){

        $db = $this->DbConnect::getInstance();
        $comment = $db->prepare("UPDATE comments SET author = ?, comment = ?, comment_date = NOW() WHERE id = ? AND post_id = ?");
  
        $affectedComment = $comment->execute(array($author, $comment, $commentId, $postId));
  
        return $affectedComment;
  
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
  
  protected function createCom($table, $obj)
  {
    $req = self::$_bdd->prepare("INSERT INTO ".$table." (post_id, content, author, creation_date) VALUES (?, ?, ?, ?)");
    $req->execute(array($_POST['author'], $_POST['content'], date("d.m.Y")));

    $req->closeCursor();
  }
   
}

    
    
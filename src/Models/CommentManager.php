<?php

namespace App\Models;
use App\Models\Comment;

class CommentManager extends Model 

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

        $db = $this->getBdd();
        $comment = $db->prepare("UPDATE comments SET author = ?, comment = ?, comment_date = NOW() WHERE id = ? AND post_id = ?");
  
        $affectedComment = $comment->execute(array($author, $comment, $commentId, $postId));
  
        return $affectedComment;
  
    } 
   
}

    
    
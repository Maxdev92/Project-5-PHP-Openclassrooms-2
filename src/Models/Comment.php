<?php
namespace App\Models;


/**
 *
 */
class Comment extends AbstractModel
{
  private $_post_id;
  private $_comment;
  private $_author;
  private $_comment_date;

  //setters

  public function setPostId($post_id)
  {
    if (is_int($post_id)) {
      $this->_post_id = $post_id;
    }
  }

  public function setComment($comment)
  {
    if (is_string($comment)) {
      $this->_comment = $comment;
    }
  }

  public function setAuthor($author)
  {
    if (is_string($author)) {
      $this->_author = $author;
    }

  }

  public function setCommentDate($comment_date)
  {
      $this->_comment_date = $comment_date;

  }

  //getters
  public function id()
  {
    return $this->_id;
  }

  public function postId()
  {
    return $this->_post_id;
  }

  public function comment()
  {
    return $this->_comment;
  }

  public function author()
  {
    return $this->_author;
  }

  public function comment_date()
  {
    return $this->_comment_date;
  }


}

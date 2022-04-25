<?php
namespace App\Models;

use App\Manager\UserManager;

/**
 *
 */
class Comment extends AbstractModel
{
  private $_content;
  private $post_id;
  private $_author;
  private $_creation_date;

  //setters
  public function getPostId(){
    return $this->post_id;
  }
  
  public function setPostId($post_id){
    $this->post_id = $post_id;
  }
  public function setContent(string $content)
  {
  
      $this->_content = $content;
  
  }

  public function setAuthor(int $author)
  {
      
      $this->_author = UserManager::getUser($author)->getUsername();
  }

  public function setCreationDate( $creation_date)
  {
      $this->_creation_date = $this->formatDateTime($creation_date);
  }

  //getters
  public function getId()
  {
    return $this->_id;
  }


  public function getContent()
  {
    return $this->_content;
  }

  public function getAuthor()
  {
    return $this->_author;
  }

  public function getCreationDate()
  {
    return $this->_creation_date;
  }


}

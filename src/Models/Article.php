<?php
namespace App\Models;


/**
 *
 */
class Article extends AbstractModel
{
  private $_title;
  private $_content;
  private $_creation_date;

  //setters

  public function setTitle($title)
  {
    if (is_string($title)) {
      $this->_title = $title;
    }
  }

  public function setContent($content)
  {
    if (is_string($content)) {
      $this->_content = $content;
    }
  }

  public function setDate($date)
  {
      $this->_creation_date = $date;

  }

  //getters
 

  public function getTitle()
  {
    return $this->_title;
  }

  public function getContent()
  {
    return $this->_content;
  }

  public function getCreationDate()
  {
    return $this->_creation_date;
  }



}












 ?>

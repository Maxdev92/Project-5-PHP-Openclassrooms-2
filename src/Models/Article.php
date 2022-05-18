<?php
namespace App\Models;

use App\Contract\ToArrayable;

/**
 *
 */
class Article extends AbstractModel implements ToArrayable
{
  private $_title;
  private $_chapo;
  private $_content;
  private $_creation_date;
  private $_modified_at;

  //setters

  public function setTitle($title)
  {
    if (is_string($title)) {
      $this->_title = $title;
    }
  }

  public function setChapo(string $chapo)
  {
      $this->_chapo = $chapo;
  }

  public function setContent($content)
  {
    if (is_string($content)) {
      $this->_content = $content;
    }
  }

  public function setCreationDate($date)
  {
      $this->_creation_date = $this->formatDate($date);

  }

  public function setModifiedAt(string $modifiedAt)
  {
    $this->_modified_at = $this->formatDate($modifiedAt);
  }


  //getters
 

  public function getTitle()
  {
    return $this->_title;
  }

  public function getChapo()
  {
    return $this->_chapo;
  }

  public function getContent()
  {
    return $this->_content;
  }

  public function getCreationDate()
  {
    return $this->_creation_date;
  }

  public function getModifiedAt()
  {
    return $this->_modified_at;
  }

  public function toArray(): array{
    return [
      'title' => $this->getTitle(),
      'chapo' => $this->getChapo(),
      'content' => $this->getContent(),
      'id' => $this->getId(),
      'modifiedAt' => $this->getModifiedAt(),
      'createdAt' => $this->getCreationDate()
    ];
  }


}



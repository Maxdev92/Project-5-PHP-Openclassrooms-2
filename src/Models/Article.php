<?php
namespace App\Models;


/**
 *
 */
class Article extends Model
{

  private $_id;
  private $_title;
  private $_content;
  private $_creation_date;

  public function __construct(array $data){
    $this->hydrate($data);
  }

  //hydratation
  public function hydrate(array $data){
    foreach ($data as $key => $value) {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  //setters

  public function setId($id)
  {
    $id = (int) $id;
    if ($id > 0) {
      $this->_id = $id;
    }
  }

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
  public function id()
  {
    return $this->_id;
  }

  public function title()
  {
    return $this->_title;
  }

  public function content()
  {
    return $this->_content;
  }

  public function creation_date()
  {
    return $this->_creation_date;
  }



}












 ?>

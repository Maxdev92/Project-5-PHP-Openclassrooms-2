<?php 

namespace App\Models;

abstract class AbstractModel{
  private $_id;

  public function __construct(array $data){
    foreach ($data as $key => $value) {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }
  public function setId($id)
  {
    $id = (int) $id;
    if ($id > 0) {
      $this->_id = $id;
    }
  }

  public function getId(){
    return $this->_id;
  }

  public function formatDateTime(string $datetime): string{
    return (new \DateTime($datetime))->format("d/m/Y à H:i");
  }
  public function formatDate(string $datetime) :string{
    return (new \DateTime($datetime))->format("d/m/Y");
  }
}
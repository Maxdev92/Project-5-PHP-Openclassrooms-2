<?php
namespace App\Controllers;

use App\Service\View;

abstract class ControllerAbstract{
  public function __call($action, $params){
   (new ControllerAccueil)->error( "l'action : $action, n'existe pas");
  }

  /**
   * fonction qui rend la vue
   * @param string $module
   */
  public function renderview(string $module, string $action, ?array $data= null): void{
    $this->_view = new View($module, $action);
    $this->_view->generate($data);
  }

  public function addFlash(string $key, string $message){
    $_SESSION[$key] = $message;
  }


  public function isAdmin(): bool
  {
     return isset($_SESSION['role']) && $_SESSION['role'] == "admin";
  }

}
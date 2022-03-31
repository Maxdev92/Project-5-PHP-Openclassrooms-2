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
  protected function renderview(string $module, string $action, ?array $data= null): void{
    $this->_view = new View($module, $action);
    $this->_view->generate($data);
  }

}
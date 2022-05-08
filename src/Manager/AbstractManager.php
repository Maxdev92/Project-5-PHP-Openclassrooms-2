<?php
namespace App\Manager;

use App\Service\DbConnect;

abstract class AbstractManager
{

  static $_bdd;

  //connexion a la bdd
  public function __construct(){
    static::$_bdd = DbConnect::getInstance();
  }


  //creation de la methode
  //de récupération de liste d'elements
  //dans la bdd

  protected function getAll(string $table,string $obj,string $where=null){

    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM '.$table.' '.$where.' ORDER BY id desc');
    $req->execute();

    //on crée la variable data qui
    //va contenir les données
    while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
      // var contiendra les données sous forme d'objets
      $var[] = new $obj($data);
    }
   
    return $var;
    $req->closeCursor();


  }

  protected function getCount(string $table,string $obj,string $where=null){

    $var = [];
    $req = self::$_bdd->prepare('SELECT count(*) as count FROM '.$table.' '.$where.'');
    $req->execute();

    //on crée la variable data qui
    //va contenir les données
    $data = $req->fetch();
      // var contiendra les données sous forme d'objets
   
    return $data["count"];
    $req->closeCursor();


  }


  static protected function getOne($table, $obj, $id): mixed
  {
    $var = [];
    $req = static::$_bdd->prepare("SELECT * FROM ".$table." WHERE id = ?");
    $req->execute(array((int)$id));
    while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
      $var = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }

  

  

 

 



}
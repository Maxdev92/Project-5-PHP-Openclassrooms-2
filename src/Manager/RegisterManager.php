<?php

namespace App\Manager;

class RegisterManager extends AbstractMAnager
{


  public function register($username, $email, $password)
  {
  $hash = PASSWORD_DEFAULT;
  $password = password_hash($password, $hash);
    $req = self::$_bdd->prepare
    ("INSERT INTO user(username, email, password, role, created_at) values('?, ?, ?, ?, ?')");  
    $req->execute($username, $email, $hash, 'user', date("Y.d.m"));
    $req->closeCursor();
  
  }


}
